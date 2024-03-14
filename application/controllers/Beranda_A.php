<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda_A extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		if ($this->session->userdata('level') == 'Pegawai') {
			redirect('retribusi');
		}
		date_default_timezone_set('Asia/Makassar');
	}
	public function index()
	{

		$data['title'] = 'Halaman Beranda';
		$tgl = date('Y-m-d');
		$tahun = date('Y');
		$bulan = date('m');

		$tglss = $this->input->post('tgl');



		if ($tglss == NULL) {
			$data['hari'] = 'Hari Ini';
			$data['lunas'] = $this->db->query("SELECT * FROM pembayaran WHERE tgl_pembayaran = '$tgl'")->num_rows();
			$data['tunggakan'] = $this->db->query("SELECT * FROM tunggakan WHERE tgl_tunggakan = '$tgl'")->num_rows();
			$data['nominal'] = $this->db->query("SELECT SUM(total)	 FROM tunggakan WHERE tgl_tunggakan = '$tgl'")->row_array();
			$data['nom'] = $this->db->query("SELECT SUM(nominal)	 FROM pembayaran WHERE tgl_pembayaran = '$tgl'")->row_array();
		} else {
			$data['hari'] = $tglss;
			$data['lunas'] = $this->db->query("SELECT * FROM pembayaran WHERE tgl_pembayaran = '$tglss'")->num_rows();
			$data['tunggakan'] = $this->db->query("SELECT * FROM tunggakan WHERE tgl_tunggakan = '$tglss'")->num_rows();
			$data['nominal'] = $this->db->query("SELECT SUM(total)	 FROM tunggakan WHERE tgl_tunggakan = '$tglss'")->row_array();
			$data['nom'] = $this->db->query("SELECT SUM(nominal)	 FROM pembayaran WHERE tgl_pembayaran = '$tglss'")->row_array();
		}


		$list = array();
		$month = $bulan;
		$year = $tahun;

		for ($d = 1; $d <= 31; $d++) {
			$time = mktime(12, 0, 0, $month, $d, $year);
			if (date('m', $time) == $month)
				$list[] = date('d', $time);
		}
		// echo "<pre>";
		// print_r($list);
		// echo "</pre>";
		$a = implode(" ", $list);
		$data['dates'] = $list;



		$jan = $this->db->query("SELECT * FROM pembayaran WHERE MONTH(tgl_pembayaran) = MONTH('2023-01-01')")->num_rows();
		$feb = $this->db->query("SELECT * FROM pembayaran WHERE MONTH(tgl_pembayaran) = MONTH('2023-02-01')")->num_rows();
		$mar = $this->db->query("SELECT * FROM pembayaran WHERE MONTH(tgl_pembayaran) = MONTH('2023-03-01')")->num_rows();
		$apr = $this->db->query("SELECT * FROM pembayaran WHERE MONTH(tgl_pembayaran) = MONTH('2023-04-01')")->num_rows();
		$mei = $this->db->query("SELECT * FROM pembayaran WHERE MONTH(tgl_pembayaran) = MONTH('2023-05-01')")->num_rows();
		$jun = $this->db->query("SELECT * FROM pembayaran WHERE MONTH(tgl_pembayaran) = MONTH('2023-06-01')")->num_rows();
		$jul = $this->db->query("SELECT * FROM pembayaran WHERE MONTH(tgl_pembayaran) = MONTH('2023-07-01')")->num_rows();
		$agu = $this->db->query("SELECT * FROM pembayaran WHERE MONTH(tgl_pembayaran) = MONTH('2023-08-01')")->num_rows();
		$sep = $this->db->query("SELECT * FROM pembayaran WHERE MONTH(tgl_pembayaran) = MONTH('2023-09-01')")->num_rows();
		$okt = $this->db->query("SELECT * FROM pembayaran WHERE MONTH(tgl_pembayaran) = MONTH('2023-10-01')")->num_rows();
		$nov = $this->db->query("SELECT * FROM pembayaran WHERE MONTH(tgl_pembayaran) = MONTH('2023-11-01')")->num_rows();
		$des = $this->db->query("SELECT * FROM pembayaran WHERE MONTH(tgl_pembayaran) = MONTH('2023-12-01')")->num_rows();

		$jan1 = $this->db->query("SELECT * FROM tunggakan WHERE MONTH(tgl_tunggakan) = MONTH('2023-01-01')")->num_rows();
		$feb1 = $this->db->query("SELECT * FROM tunggakan WHERE MONTH(tgl_tunggakan) = MONTH('2023-02-01')")->num_rows();
		$mar1 = $this->db->query("SELECT * FROM tunggakan WHERE MONTH(tgl_tunggakan) = MONTH('2023-03-01')")->num_rows();
		$apr1 = $this->db->query("SELECT * FROM tunggakan WHERE MONTH(tgl_tunggakan) = MONTH('2023-04-01')")->num_rows();
		$mei1 = $this->db->query("SELECT * FROM tunggakan WHERE MONTH(tgl_tunggakan) = MONTH('2023-05-01')")->num_rows();
		$jun1 = $this->db->query("SELECT * FROM tunggakan WHERE MONTH(tgl_tunggakan) = MONTH('2023-06-01')")->num_rows();
		$jul1 = $this->db->query("SELECT * FROM tunggakan WHERE MONTH(tgl_tunggakan) = MONTH('2023-07-01')")->num_rows();
		$agu1 = $this->db->query("SELECT * FROM tunggakan WHERE MONTH(tgl_tunggakan) = MONTH('2023-08-01')")->num_rows();
		$sep1 = $this->db->query("SELECT * FROM tunggakan WHERE MONTH(tgl_tunggakan) = MONTH('2023-09-01')")->num_rows();
		$okt1 = $this->db->query("SELECT * FROM tunggakan WHERE MONTH(tgl_tunggakan) = MONTH('2023-10-01')")->num_rows();
		$nov1 = $this->db->query("SELECT * FROM tunggakan WHERE MONTH(tgl_tunggakan) = MONTH('2023-11-01')")->num_rows();
		$des1 = $this->db->query("SELECT * FROM tunggakan WHERE MONTH(tgl_tunggakan) = MONTH('2023-12-01')")->num_rows();

		$lunas = array();
		array_push($lunas, $jan, $feb, $mar, $apr, $mei, $jun, $jul, $agu, $sep, $okt, $nov, $des);
		$tunggak = array();
		array_push($tunggak, $jan1, $feb1, $mar1, $apr1, $mei1, $jun1, $jul1, $agu1, $sep1, $okt1, $nov1, $des1);
		// var_dump($lunas);
		// die;

		$data['lunss'] = $lunas;
		$data['tunggak'] = $tunggak;

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('beranda/index.php', $data);
		$this->load->view('templates/footer', $data);
	}
	public function bulan()
	{
		$bulan = $this->input->post('bulan');
		$data =  [
			'bulan' => $bulan
		];
		$this->db->where('id_bulan', '1');
		$this->db->update('bulan', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		Berhasil!
			 <a href="#" class="close" data-dismiss="alert" aria-label="Close">
				 <span aria-hidden="true">×</span>
			 </a>
		 </div>');
		redirect('Beranda_A');
	}
}
