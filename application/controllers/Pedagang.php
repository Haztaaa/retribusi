<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pedagang extends CI_Controller
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
        $data['title'] = 'Halaman Pedagang';
        $data['page'] =  $this->uri->segment(1);
        $data['sektor'] = $this->db->get('sektor')->result_array();
        $data['pengguna'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $id_sektor = $this->input->post('sektor');
        $data['pedagang'] = $this->db->query("SELECT *,s.id_sektor FROM pedagang p INNER JOIN sektor s ON p.id_sektor = s.id_sektor WHERE p.id_sektor ='$id_sektor'")->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pedagang/index.php', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah()
    {
        $data['title'] = 'Halaman Tambah Pedagang';
        $data['sektor'] = $this->db->query("SELECT * FROM sektor")->result();

        $this->form_validation->set_rules('nama_pedagang', 'Nama Pedagang', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'trim|integer|required|min_length[16]|max_length[16]');
        $this->form_validation->set_rules('no_rekening', 'No Rekening', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_lapak', 'No Lapak', 'required');
        $this->form_validation->set_rules('sektor', 'Sektor', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pedagang/tambah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $nama_pedagang              = $this->input->post('nama_pedagang');
            $nik                        = $this->input->post('nik');
            $no_rekening                = $this->input->post('no_rekening');
            $tgl_lahir                  = $this->input->post('tgl_lahir');
            $alamat                     = $this->input->post('alamat');
            $no_lapak                   = $this->input->post('no_lapak');
            $sektor                     = $this->input->post('sektor');


            $data = array(
                'nama_pedagang'          => $nama_pedagang,
                'nik' => $nik,
                'no_rekening' => $no_rekening,
                'tgl_lahir' => $tgl_lahir,
                'alamat'              => $alamat,
                'no_lapak' => $no_lapak,
                'id_sektor' => $sektor,

            );

            $this->db->insert('pedagang', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Tambah Data Pedagang berhasil
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>');
            redirect('pedagang');
        }
    }
    public function ubah($id)
    {
        $data['title'] = 'Halaman Ubah Pedagang';
        $data['dat_pedagang'] = $this->db->query("SELECT * FROM pedagang WHERE id_pedagang = '$id'")->row_array();
        $data['sektor'] = $this->db->query("SELECT * FROM sektor")->result_array();
        $this->form_validation->set_rules('nama_pedagang', 'Nama Pedagang', 'required');
        $this->form_validation->set_rules('nik', 'Nik', 'trim|integer|required|min_length[16]|max_length[16]');
        $this->form_validation->set_rules('no_rekening', 'No Rekening', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_lapak', 'No Lapak', 'required');
        $this->form_validation->set_rules('sektor', 'Sektor', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pedagang/ubah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $nama_pedagang              = $this->input->post('nama_pedagang');
            $nik                        = $this->input->post('nik');
            $no_rekening                = $this->input->post('no_rekening');
            $tgl_lahir                  = $this->input->post('tgl_lahir');
            $alamat                      = $this->input->post('alamat');
            $no_lapak                  = $this->input->post('no_lapak');
            $sektor                      = $this->input->post('sektor');


            $data = array(
                'nama_pedagang'          => $nama_pedagang,
                'nik' => $nik,
                'no_rekening' => $no_rekening,
                'tgl_lahir' => $tgl_lahir,
                'alamat'              => $alamat,
                'no_lapak' => $no_lapak,
                'id_sektor' => $sektor,

            );
            $this->db->where('id_pedagang', $id);
            $this->db->update('pedagang', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
             Ubah Data Pedagang berhasil
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>');
            redirect('pedagang');
        }
    }
    public function hapus()
    {
        $id = $this->input->post('hapus');

        $this->db->where('id_pedagang', $id);
        $this->db->delete('pedagang');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Hapus data pedagang berhasil!
             <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">×</span>
             </a>
         </div>');
        redirect('pedagang');
    }
    public function get($id)
    {
        $data = $this->db->get_where('pedagang', ['id_pedagang' => $id])->row();
        //echo "<pre>";echo print_r($data);echo "</pre>";die();
        echo json_encode($data);
    }
}
