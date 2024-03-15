<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suara extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('level')==NULL){
			redirect('auth');
		}
	}
	public function index()
	{
        $this->db->from('suara');
        $suara = $this->db->get()->result_array();
		$data = array(
			'judul_halaman' => 'Rekap Suara Pilpres 2024',
            'suara'         => $suara,
		);
		$this->template->load('template','rekap',$data);
	}
    public function simpan(){
        $data = array(
            'total_suara_20'                => $total = $this->input->post('total_suara_20'),
            'total_suara_sah_20'            => $total_sah = $this->input->post('total_suara_sah_20'),
            'total_suara_tidak_sah_20'      => $total_tdk_sah = $this->input->post('total_suara_tidak_sah_20'),
            'suara_no1'                     => $no1 = $this->input->post('suara_no1'),
            'suara_no2'                     => $no2 = $this->input->post('suara_no2'),
            'suara_no3'                     => $no3 = $this->input->post('suara_no3'),
            'nama_tps'                      => $this->input->post('nama_tps'),
        );
        if($total != $total_sah+$total_tdk_sah){
            $this->session->set_flashdata('notif','
            <div class="alert alert-danger" role="alert">
            Jumlah Suara Tidak Valid
            </div>');
        }elseif($total_sah != $no1+$no2+$no3){
            $this->session->set_flashdata('notif','
            <div class="alert alert-danger" role="alert">
            Jumlah Suara Sah Tidak Valid
            </div>');
        }else{
            $this->db->insert('suara',$data);
            $this->session->set_flashdata('notif','
            <div class="alert alert-success" role="alert">
            Berhasil Menginput Suara
            </div>');
        }
    redirect('suara');
    }
}
