<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('level')==NULL){
			redirect('auth');
		}
	}
	public function index()
	{
        $this->db->from('pelanggan');
        $this->db->order_by('nama','ASC');
        $user = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => 'Kasir RC | Data Pelanggan',
            'user'          => $user,
        );
		$this->template->load('template','pelanggan_index',$data);
	}
    Public function simpan(){
            $data = array(
                'nama'      => $this->input->post('nama',),
                'alamat'    => $this->input->post('alamat',),
                'telp'      => $this->input->post('telp',),
            );
            $this->db->insert('pelanggan',$data);
            $this->session->set_flashdata('notif','
			<div class="alert alert-success" role="alert">
			Berhasil Menambahkan Pelanggan
			</div>');
        redirect('pelanggan');
    }
    public function hapus($id_pelanggan){
        $where = array('id_pelanggan' => $id_pelanggan);
        $this->db->delete('pelanggan',$where);
        $this->session->set_flashdata('notif','
			<div class="alert alert-danger" role="alert">
			Berhasil Menghapus Produk
			</div>');
        redirect('pelanggan');
    }
    public function edit($id_pelanggan){
        $this->db->from('pelanggan')->where('id_pelanggan',$id_pelanggan);
        $user = $this->db->get()->row();
        $data = array(
            'judul_halaman' => 'Kasir RC | Edit Data',
            'user'          => $user,
        );
		$this->template->load('template','pelanggan_edit',$data);
    }
    public function update(){
		$data = array(
            'nama'     => $this->input->post('nama'),
            'alamat'      => $this->input->post('alamat'),
            'telp'     => $this->input->post('telp'),
		);
		$where = array('id_pelanggan' => $this->input->post('id_pelanggan'));
		$this->db->update('pelanggan',$data,$where);
        $this->session->set_flashdata('notif','
        <div class="alert alert-success" role="alert">
        Berhasil Mengedit Pelanggan
        </div>');
        redirect('pelanggan');
    }
}
