<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('level')!='admin'){
			redirect('home');
		}
	}
	public function index()
	{
        $this->db->from('produk');
        $this->db->order_by('nama','ASC');
        $user = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => 'Kasir RC | Data Produk',
            'user'          => $user,
        );
		$this->template->load('template','produk_index',$data);
	}
    Public function simpan(){
        $cek = $this->db->from('produk')->where('kode_produk',$this->input->post('kode_produk'))->get()->result_array();
        if($cek==NULL){
            $data = array(
                'kode_produk'  => $this->input->post('kode_produk',),
                'stok'      => $this->input->post('stok',),
                'harga'     => $this->input->post('harga',),
                'nama'     => $this->input->post('nama',),
            );
            $this->db->insert('produk',$data);
            $this->session->set_flashdata('notif','
			<div class="alert alert-success" role="alert">
			Berhasil Menambahkan Produk
			</div>');
        }else{
			$this->session->set_flashdata('notif','
			<div class="alert alert-danger" role="alert">
			Kode Produk Sudah Digunakan
			</div>');
        }
        redirect('produk');
    }
    public function hapus($id_produk){
        $where = array('id_produk' => $id_produk);
        $this->db->delete('produk',$where);
        $this->session->set_flashdata('notif','
			<div class="alert alert-danger" role="alert">
			Berhasil Menghapus Produk
			</div>');
        redirect('produk');
    }
    public function edit($id_produk){
        $this->db->from('produk')->where('id_produk',$id_produk);
        $user = $this->db->get()->row();
        $data = array(
            'judul_halaman' => 'Kasir RC | Edit Data',
            'user'          => $user,
        );
		$this->template->load('template','produk_edit',$data);
    }
    public function update(){
		$data = array(
            'kode_produk'   => $this->input->post('kode_produk',),
            'stok'          => $this->input->post('stok',),
            'harga'         => $this->input->post('harga',),
            'nama'          => $this->input->post('nama',),
		);
		$where = array('id_produk' => $this->input->post('id_produk'));
		$this->db->update('produk',$data,$where);
        $this->session->set_flashdata('notif','
        <div class="alert alert-success" role="alert">
        Berhasil Mengedit Produk
        </div>');
        redirect('produk');
    }
}
