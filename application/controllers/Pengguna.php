<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {
    public function __construct(){
		parent::__construct();
		if($this->session->userdata('level')!='admin'){
			redirect('home');
		}
	}
	public function index()
	{
        $this->db->from('user');
        $this->db->order_by('nama','ASC');
        $user = $this->db->get()->result_array();
        $data = array(
            'judul_halaman' => 'Kasir RC | Data Pengguna',
            'user'          => $user,
        );
		$this->template->load('template','pengguna_index',$data);
	}
    Public function simpan(){
        $cek = $this->db->from('user')->where('username',$this->input->post('username'))->get()->result_array();
        if($cek==NULL){
            $data = array(
                'username'  => $this->input->post('username',),
                'password'  => md5($this->input->post('password',)),
                'nama'      => $this->input->post('nama',),
                'level'     => $this->input->post('level',),
            );
            $this->db->insert('user',$data);
            $this->session->set_flashdata('notif','
			<div class="alert alert-success" role="alert">
			Berhasil Menambahkan
			</div>');
        }else{
			$this->session->set_flashdata('notif','
			<div class="alert alert-danger" role="alert">
			Username Sudah Digunakan
			</div>');
        }
        redirect('pengguna');
    }
    public function hapus($id_user){
        $where = array('id_user' => $id_user);
        $this->db->delete('user',$where);
        $this->session->set_flashdata('notif','
			<div class="alert alert-danger" role="alert">
			Berhasil Menghapus
			</div>');
        redirect('pengguna');
    }
    public function edit($id_user){
        $this->db->from('user')->where('id_user',$id_user);
        $user = $this->db->get()->row();
        $data = array(
            'judul_halaman' => 'Kasir RC | Edit Data',
            'user'          => $user,
        );
		$this->template->load('template','pengguna_edit',$data);
    }
    public function update(){
		$data = array(
			'nama' 		=> $this->input->post('nama'),
			'level'		=> $this->input->post('level'),
		);
		$where = array('id_user' => $this->input->post('id_user'));
		$this->db->update('user',$data,$where);
        $this->session->set_flashdata('notif','
        <div class="alert alert-success" role="alert">
        Berhasil Mengedit User
        </div>');
        redirect('pengguna');
    }
    public function reset($id_user){
        $data = array(
			'password' 		=> md5('1234'),
		);
		$where = array('id_user' => $id_user);
		$this->db->update('user',$data,$where);
        $this->session->set_flashdata('notif','
        <div class="alert alert-danger" role="alert">
        Password Direset Menjadi "1234"
        </div>');
        redirect('pengguna');
    }
}
