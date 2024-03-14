<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
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
	public function lunas()
	{
		$data['title'] = 'Halaman Laporan Lunas';
		$data['sektor'] = $this->db->get('sektor')->result_array();

		$id_sektor = $this->input->post('sektor');
		$bulan = $this->input->post('bulan');
		if ($bulan == NULL) {
			$data['pedagang'] = $this->db->query("SELECT *,s.id_sektor,pm.id_pedagang FROM pedagang p INNER JOIN sektor s ON p.id_sektor = s.id_sektor INNER JOIN pembayaran pm ON p.id_pedagang = pm.id_pedagang WHERE p.id_sektor ='$id_sektor' ORDER BY pm.tgl_pembayaran DESC")->result_array();
		} else {
			$data['pedagang'] = $this->db->query("SELECT *,s.id_sektor,pm.id_pedagang FROM pedagang p INNER JOIN sektor s ON p.id_sektor = s.id_sektor INNER JOIN pembayaran pm ON p.id_pedagang = pm.id_pedagang WHERE p.id_sektor ='$id_sektor' AND MONTH(pm.tgl_pembayaran) = $bulan ORDER BY pm.tgl_pembayaran DESC")->result_array();
		}

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('laporan/lunas.php', $data);
		$this->load->view('templates/footer', $data);
	}
	public function tunggak()
	{
		$data['title'] = 'Halaman Laporan Tunggak';
		$data['sektor'] = $this->db->get('sektor')->result_array();

		$bulan = $this->input->post('bulan');
		$id_sektor = $this->input->post('sektor');
		if ($bulan == NULL) {
			$data['pedagang'] = $this->db->query("SELECT *,s.id_sektor,t.id_pedagang FROM pedagang p INNER JOIN sektor s ON p.id_sektor = s.id_sektor INNER JOIN tunggakan t ON p.id_pedagang = t.id_pedagang WHERE p.id_sektor ='$id_sektor' ORDER BY t.tgl_tunggakan DESC")->result_array();
		} else {
			$data['pedagang'] = $this->db->query("SELECT *,s.id_sektor,t.id_pedagang FROM pedagang p INNER JOIN sektor s ON p.id_sektor = s.id_sektor INNER JOIN tunggakan t ON p.id_pedagang = t.id_pedagang WHERE p.id_sektor ='$id_sektor' AND MONTH(t.tgl_tunggakan) = $bulan ORDER BY t.tgl_tunggakan DESC")->result_array();
		}


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('laporan/tunggak.php', $data);
		$this->load->view('templates/footer', $data);
	}
	public function semua()
	{
		$data['title'] = 'Halaman Laporan Tunggak';
		$data['sektor'] = $this->db->get('sektor')->result_array();

		$tgl = $this->input->post('tgl');


		$data['tgl'] = $tgl;
		if ($tgl == NULL) {
			$data['status'] = 'false';
			$data['pedagang'] = $this->db->query("SELECT *,s.id_sektor FROM pedagang p  JOIN sektor s ON p.id_sektor = s.id_sektor   GROUP BY s.id_sektor")->result_array();
		} else {
			$data['status'] = 'true';
			$data['tanggal'] = $tgl;
			$data['pedagang'] = $this->db->query("SELECT *,s.id_sektor FROM pedagang p  JOIN sektor s ON p.id_sektor = s.id_sektor    GROUP BY s.id_sektor")->result_array();
		}


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('laporan/semua.php', $data);
		$this->load->view('templates/footer', $data);
	}
}
