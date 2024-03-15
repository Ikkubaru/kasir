<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('level')==NULL){
			redirect('auth');
		}
	}
	public function index()
	{
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date('y-m-d');
        $this->db->select('*');
        $this->db->join('pelanggan', 'penjualan.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->from('penjualan')->order_by('penjualan.tanggal', 'DESC')->where('penjualan.tanggal', $tanggal);
        $user = $this->db->get()->result_array();
        // menampilkan data pelanggan ke modal
        $this->db->from('pelanggan')->order_by('nama','ASC');
        $pelanggan = $this->db->get()->result_array();
        // 
		$data = array(
			'judul_halaman' => 'Kasir RC | Penjualan',
            'user'          => $user,
            'pelanggan'     => $pelanggan,
		);
		$this->template->load('template','penjualan_index',$data);
	}
    public function transaksi($id_pelanggan){
        date_default_timezone_set("Asia/Jakarta");
        $tanggal = date('Y-m ');
        $this->db->from('penjualan');
        $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')",$tanggal);
        $jumlah = $this->db->count_all_results();
        $nota = date('ymd').$jumlah+1;
        // mengambil data produk
        $this->db->from('produk')->where('stok >',0)->order_by('nama','ASC');
        $produk = $this->db->get()->result_array();
        // menampilkan nama pelanggan 
        $this->db->from('pelanggan')->where('id_pelanggan',$id_pelanggan);
        $namaPelanggan = $this->db->get()->row()->nama;
        // menampilkan data ke detail penjualan
        $this->db->from('detail_penjualan');
        $this->db->join('produk','detail_penjualan.id_produk=produk.id_produk','left');
        $this->db->where('detail_penjualan.kode_penjualan',$nota);
        $detail = $this->db->get()->result_array();
		$data = array(
			'judul_halaman' => 'Kasir RC | Transaksi Penjualan',
            'nota'          => $nota,
            'produk'        => $produk,
            'id_pelanggan'  => $id_pelanggan,
            'nama_pelanggan'=> $namaPelanggan,
            'detail'        => $detail,
		);
		$this->template->load('template','penjualan_transaksi',$data);
    }
    public function tambahKeranjang(){
        $this->db->from('detail_penjualan');
        $this->db->where('id_produk',$this->input->post('id_produk'));
        $this->db->where('kode_penjualan',$this->input->post('kode_penjualan'));
        $cek = $this->db->get()->result_array();
        if($cek<>NULL){
            $this->session->set_flashdata('notif','
            <div class="alert alert-danger" role="alert">
            Produk Sudah Dipilih
            </div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
        $this->db->from('produk')->where('id_produk',$this->input->post('id_produk'));
        $harga = $this->db->get()->row()->harga;
        $this->db->from('produk')->where('id_produk',$this->input->post('id_produk'));
        $stokLama = $this->db->get()->row()->stok;
        $stokSekarang = $stokLama - $this->input->post('jumlah');
        $subTotal = $this->input->post('jumlah')*$harga;
        $data = array(
            'kode_penjualan'    => $this->input->post('kode_penjualan'),
            'id_produk'         => $this->input->post('id_produk'),
            'jumlah'            => $this->input->post('jumlah'),
            'sub_total'         => $subTotal,
        );
        if($stokLama>=$this->input->post('jumlah')){
            $this->db->insert('detail_penjualan',$data);
            $data2 = array(
                'stok'  => $stokSekarang,
            );
            $where = array(
                'id_produk' => $this->input->post('id_produk'),
            );
            $this->db->update('produk',$data2,$where);
            $this->session->set_flashdata('notif','
            <div class="alert alert-success" role="alert">
            Berhasil Menambahkan Produk Ke Keranjang
            </div>');    
        }else{
            $this->session->set_flashdata('notif','
            <div class="alert alert-danger" role="alert">
            Produk Yang Dipilih Tidak Mencukupi
            </div>');  
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function hapus($id_detail,$id_produk){
        $this->db->from('detail_penjualan')->where('id_detail',$id_detail);
        $jumlah = $this->db->get()->row()->jumlah;
        $this->db->from('produk')->where('id_produk',$id_produk);
        $stokLama = $this->db->get()->row()->stok;
        $stokSekarang = $jumlah +$stokLama;
        $data2 = array(
            'stok'  => $stokSekarang,
        );
        $where = array(
            'id_produk' => $id_produk,
        );
        $this->db->update('produk',$data2,$where);

        $where = array('id_detail' => $id_detail);
        $this->db->delete('detail_penjualan',$where);
        $this->session->set_flashdata('notif','
			<div class="alert alert-danger" role="alert">
			Berhasil Menghapus
			</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function bayar(){
        $data = array(
            'kode_penjualan'    => $this->input->post('kode_penjualan',),
            'id_pelanggan'      => $this->input->post('id_pelanggan',),
            'total_harga'       => $this->input->post('total_harga',),
            'tanggal'           => date('Y-m-d'),
        );
        $this->db->insert('penjualan',$data);
        $this->session->set_flashdata('notif','
        <div class="alert alert-success" role="alert">
        Penjualan Berhasil
        </div>');
        redirect('penjualan/invoice/'.$this->input->post('kode_penjualan',));
    }
    public function invoice($kode_penjualan){
        $this->db->select('*');
        $this->db->join('pelanggan', 'penjualan.id_pelanggan = pelanggan.id_pelanggan', 'left');
        $this->db->from('penjualan')->order_by('penjualan.tanggal', 'DESC')->where('penjualan.kode_penjualan', $kode_penjualan);
        $penjualan = $this->db->get()->row();
        // data dari tabel detail
        $this->db->from('detail_penjualan');
        $this->db->join('produk','detail_penjualan.id_produk=produk.id_produk','left');
        $this->db->where('detail_penjualan.kode_penjualan',$kode_penjualan);
        $detail = $this->db->get()->result_array();

        $data = array(
			'judul_halaman' => 'Kasir RC | Invoice',
            'nota'          => $kode_penjualan,
            'penjualan'     => $penjualan,
            'detail'        => $detail,
		);
        $this->template->load('template','invoice',$data);
    }
}
