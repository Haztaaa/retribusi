<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Retribusi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();

		date_default_timezone_set('Asia/Makassar');
	}
	public function index()
	{
		$data['title'] = 'Halaman Data Retribusi';

		$id_user = $this->session->userdata('id_user');
		$level = $this->session->userdata('level');
		if ($level == 'Pegawai') {
			$data['sektor'] = $this->db->query("SELECT * FROM sektor WHERE id_user = '$id_user'")->result_array();
		} else {
			$data['sektor'] = $this->db->query("SELECT * FROM sektor ")->result_array();
		}
		$today = date('Y-m-D');


		$data['pengguna'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
		$id_sektor = $this->input->get('sektor');

		$data['pedagang'] = $this->db->query("SELECT *,s.id_sektor FROM pedagang p INNER JOIN sektor s ON p.id_sektor = s.id_sektor WHERE p.id_sektor ='$id_sektor'")->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('retribusi/index.php', $data);
		$this->load->view('templates/footer', $data);
	}
	public function bayar()
	{
		$tgl_pembayaran       = $this->input->post('tgl_pembayaran');
		$id_pedagang       = $this->input->post('id_pedagang');
		$cekzz       = $this->input->post('cek');
		$nominal       = $this->input->post('nominal');
		$sektor      = $this->input->post('sektor');
		$sql = $this->db->query("SELECT tgl_pembayaran FROM pembayaran where tgl_pembayaran ='$tgl_pembayaran' AND id_pedagang ='$id_pedagang'");
		$cek = $sql->num_rows();

		$sql1 = $this->db->query("SELECT tgl_tunggakan FROM tunggakan where tgl_tunggakan ='$tgl_pembayaran' AND id_pedagang ='$id_pedagang'");
		$cek1 = $sql1->num_rows();

		if ($cek > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
               Tanggal Pembayaran Atau Tanggal Tunggakan Sudah Ada!
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>');
			if ($cekzz) {
				redirect(base_url() . "retribusi?sektor=" . $sektor);
			} else {
				redirect(base_url() . "retribusi/detail/" . $id_pedagang);
			}
		} elseif ($cek1 > 0) {

			$this->db->where('id_pedagang', $id_pedagang);
			$this->db->where('tgl_tunggakan', $tgl_pembayaran);
			$this->db->delete('tunggakan');

			$data = array(
				'id_pedagang'	      => $id_pedagang,
				'tgl_pembayaran' => $tgl_pembayaran,
				'nominal' => $nominal,
			);

			$this->db->insert('pembayaran', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
		   Pembayaran Berhasil !
				<a href="#" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">×</span>
				</a>
			</div>');
			if ($cekzz) {
				redirect(base_url() . "retribusi?sektor=" . $sektor);
			} else {
				redirect(base_url() . "retribusi/detail/" . $id_pedagang);
			}
		} else {
			$data = array(
				'id_pedagang'	      => $id_pedagang,
				'tgl_pembayaran' => $tgl_pembayaran,
				'nominal' => $nominal,
			);

			$this->db->insert('pembayaran', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				   Pembayaran Retribusi berhasil
						<a href="#" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</a>
					</div>');
			if ($cekzz) {
				redirect(base_url() . "retribusi?sektor=" . $sektor);
			} else {
				redirect(base_url() . "retribusi/detail/" . $id_pedagang);
			}
		}
	}
	public function tdk_bayar()
	{
		$tgl_tunggakan       = $this->input->post('tgl_tunggakan');
		$id_pedagang       = $this->input->post('id_pedagang');
		$tagihan       = $this->input->post('tagihan');
		$sektor      = $this->input->post('sektor');
		$cekzz       = $this->input->post('cek');


		$sql = $this->db->query("SELECT tgl_pembayaran FROM pembayaran where tgl_pembayaran ='$tgl_tunggakan' AND id_pedagang ='$id_pedagang'");
		$cek = $sql->num_rows();

		$sql1 = $this->db->query("SELECT tgl_tunggakan FROM tunggakan where tgl_tunggakan ='$tgl_tunggakan' AND id_pedagang ='$id_pedagang'");
		$cek1 = $sql1->num_rows();

		if ($cek > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
               Tanggal Tunggakan Atau Pembayaran Sudah Ada!
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>');
			if ($cekzz) {
				redirect(base_url() . "retribusi?sektor=" . $sektor);
			} else {
				redirect(base_url() . "retribusi/detail/" . $id_pedagang);
			}
		} elseif ($cek1 > 0) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
               Tanggal Tunggakan Atau Pembayaran Sudah Ada!
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>');
			if ($cekzz) {
				redirect(base_url() . "retribusi?sektor=" . $sektor);;
			} else {
				redirect(base_url() . "retribusi/detail/" . $id_pedagang);
			}
		} else {
			$data = array(
				'id_pedagang'	      => $id_pedagang,
				'tgl_tunggakan' => $tgl_tunggakan,
				'total' => $tagihan,
			);

			$this->db->insert('tunggakan', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
				   tunggakan Retribusi berhasil
						<a href="#" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
						</a>
					</div>');
			if ($cekzz) {
				redirect(base_url() . "retribusi?sektor=" . $sektor);
			} else {
				redirect(base_url() . "retribusi/detail/" . $id_pedagang);
			}
		}
	}

	public function hapus()
	{
		$id = $this->input->post('hapus');

		$this->db->where('id_setoran', $id);
		$this->db->delete('setoran');
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Hapus data setoran berhasil!
             <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">×</span>
             </a>
         </div>');
		redirect('retribusi');
	}
	public function detail($id)
	{
		date_default_timezone_set('Asia/Makassar');


		$data['title'] = 'Halaman Detail Pembayaran';
		$data['data'] = $this->db->query("SELECT *,s.id_sektor FROM pedagang p INNER JOIN sektor s ON p.id_sektor = s.id_sektor WHERE p.id_pedagang = '$id'")->row_array();
		$bulan = $this->input->post('bulan');
		if (!empty($bulan)) {
			$data['pem'] = $this->db->query("SELECT *,pd.id_pedagang FROM pembayaran p INNER JOIN pedagang pd ON p.id_pedagang = pd.id_pedagang WHERE p.id_pedagang = '$id' AND MONTH(p.tgl_pembayaran) = $bulan ")->result_array();
			$data['tunggakan'] = $this->db->query("SELECT *,pd.id_pedagang FROM tunggakan t INNER JOIN pedagang pd ON t.id_pedagang = pd.id_pedagang WHERE t.id_pedagang = '$id' AND MONTH(t.tgl_tunggakan) = $bulan ")->result_array();
			$data['total'] = $this->db->query("SELECT *,pd.id_pedagang FROM tunggakan t INNER JOIN pedagang pd ON t.id_pedagang = pd.id_pedagang WHERE t.id_pedagang = '$id' AND MONTH(t.tgl_tunggakan) = $bulan ")->num_rows();
		} else {
			$data['pem'] = $this->db->query("SELECT *,pd.id_pedagang FROM pembayaran p INNER JOIN pedagang pd ON p.id_pedagang = pd.id_pedagang WHERE p.id_pedagang = '$id' AND MONTH(p.tgl_pembayaran) = MONTH(CURRENT_DATE())")->result_array();
			$data['tunggakan'] = $this->db->query("SELECT *,pd.id_pedagang FROM tunggakan t INNER JOIN pedagang pd ON t.id_pedagang = pd.id_pedagang WHERE t.id_pedagang = '$id' AND MONTH(t.tgl_tunggakan) = MONTH(CURRENT_DATE())")->result_array();
			$data['total'] = $this->db->query("SELECT *,pd.id_pedagang FROM tunggakan t INNER JOIN pedagang pd ON t.id_pedagang = pd.id_pedagang WHERE t.id_pedagang = '$id' AND MONTH(t.tgl_tunggakan) = MONTH(CURRENT_DATE())")->num_rows();
		}
		// $list = array();
		// $month = 5;
		// $year = 2023;

		// for ($d = 1; $d <= 31; $d++) {
		// 	$time = mktime(12, 0, 0, $month, $d, $year);
		// 	if (date('m', $time) == $month)
		// 		$list[] = date('Y-m-d', $time);
		// }
		$data['bulan'] = $bulan;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('retribusi/detail', $data);
		$this->load->view('templates/footer', $data);
	}
	public function get($id)
	{
		$data = $this->db->get_where('setoran', ['id_setoran' => $id])->row();
		//echo "<pre>";echo print_r($data);echo "</pre>";die();
		echo json_encode($data);
	}
	public function cari()
	{
		$id_pedagang = $_GET['id_pedagang'];

		$result['pedagang']					= $this->db->query("SELECT * FROM pedagang WHERE id_pedagang = '$id_pedagang'")->result();

		echo json_encode($result);
	}
}
