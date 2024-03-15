<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function index()
	{
		$data = array(
			'judul_halaman' => 'Login | Kasir RC',
		);
		$this->load->view('login',$data);
	}
    public function login(){
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $this->db->from('user')->where('username',$username);
        $cek = $this->db->get()->row();
        if($cek==NULL){
            $this->session->set_flashdata('notif','
			<div class="alert alert-danger" role="alert">
			Username Tidak Ditemukan
			</div>');
            redirect('auth');
        }else if($cek->password==$password){
            $data = array(
                'id_user'   => $cek->id_user,
                'username'  => $cek->username,
                'level'     => $cek->level,
                'nama'      => $cek->nama,
            ); 
            $this->session->set_userdata($data);
            redirect('home');
        }else{
            $this->session->set_flashdata('notif','
			<div class="alert alert-danger" role="alert">
			Password salah 
			</div>');
            redirect('auth');
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('auth');
    }
}
