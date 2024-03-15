<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('level')==NULL){
			redirect('auth');
		}
	}
	public function index()
	{
		// penjualan per hari 
		date_default_timezone_set('Asia/Jakarta');
		$tanggal = date('Y-m-d');
		$this->db->select('sum(total_harga) as total');
		$this->db->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m-%d')",$tanggal);
		$today = $this->db->get()->row()->total;

		$this->db->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m-%d')",$tanggal);
		$transaksi = $this->db->count_all_results();
		$produk = $this->db->from('produk')->count_all_results();
		//data untuk chart
		$tanggal = date('Y-m',);
		$this->db->select('sum(total_harga) as total')->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m')",$tanggal);
		$month = $this->db->get()->row()->total;

		$tanggal = date('Y-m',strtotime("-1 Months"));
		$this->db->select('sum(total_harga) as total')->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m')",$tanggal);
		$month1 = $this->db->get()->row()->total;

		$tanggal = date('Y-m',strtotime("-2 Months"));
		$this->db->select('sum(total_harga) as total')->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m')",$tanggal);
		$month2 = $this->db->get()->row()->total;

		$tanggal = date('Y-m',strtotime("-3 Months"));
		$this->db->select('sum(total_harga) as total')->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m')",$tanggal);
		$month3 = $this->db->get()->row()->total;

		$tanggal = date('Y-m',strtotime("-4 Months"));
		$this->db->select('sum(total_harga) as total')->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m')",$tanggal);
		$month4 = $this->db->get()->row()->total;

		$tanggal = date('Y-m',strtotime("-5 Months"));
		$this->db->select('sum(total_harga) as total')->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m')",$tanggal);
		$month5 = $this->db->get()->row()->total;
		// 
		$month_now = date('M');
		$month_1 = date('M', strtotime("-1 Months"));
		$month_2 = date('M', strtotime("-2 Months"));
		$month_3 = date('M', strtotime("-3 Months"));
		$month_4 = date('M', strtotime("-4 Months"));
		$month_5 = date('M', strtotime("-5 Months"));

	
		$data = array(
			'judul_halaman' 	=> 'Dashboard',
			'today'				=> $today,
			'month' 			=> $month,
			'transaksi' 		=> $transaksi,
			'produk' 			=> $produk,
			// 
			'month_now' 	=> $month_now,
			'month_1' 		=> $month_1,
			'month_2' 		=> $month_2,
			'month_3' 		=> $month_3,
			'month_4' 		=> $month_4,
			'month_5' 		=> $month_5,
			// 
			'month1' 		=>$month1,
			'month2' 		=>$month2,
			'month3' 		=>$month3,
			'month4' 		=>$month4,
			'month5' 		=>$month5,
		);

		$this->template->load('template','beranda',$data);
	}
}
