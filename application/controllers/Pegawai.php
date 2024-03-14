<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
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
        $data['title'] = 'Halaman pegawai';
        $data['pegawai'] = $this->db->query("SELECT * FROM user WHERE level !='Admin'")->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pegawai/index.php', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah()
    {
        $data['title'] = 'Halaman Tambah Pegawai';

        $this->form_validation->set_rules('nama_pegawai', 'Nama pegawai', 'required');
        $this->form_validation->set_rules('nama_pengguna', 'nama_pengguna', 'required');
        $this->form_validation->set_rules('kata_sandi', 'Kata Sandi', 'required');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');



        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pegawai/tambah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $nama_pegawai              = $this->input->post('nama_pegawai');
            $nama_pengguna                        = $this->input->post('nama_pengguna');
            $kata_sandi                  = $this->input->post('kata_sandi');
            $no_hp                  = $this->input->post('no_hp');
            $alamat                      = $this->input->post('alamat');
            $level                      = $this->input->post('level');

            $data = array(
                'nama'          => $nama_pegawai,
                'username' => $nama_pengguna,
                'password' => $kata_sandi,
                'no_hp' => $no_hp,
                'alamat'              => $alamat,
                'level' => $level,
            );

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Tambah data pegawai berhasil
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>');
            redirect('pegawai');
        }
    }
    public function ubah($id)
    {
        $data['title'] = 'Halaman Ubah Pegawai';
        $user = 'Pegawai';
        $data['pegawai'] = $this->db->query("SELECT * FROM user  WHERE id_user ='$id' AND level !='Admin'")->row_array();

        $this->form_validation->set_rules('nama_pegawai', 'Nama pegawai', 'required');
        $this->form_validation->set_rules('nama_pengguna', 'nama_pengguna', 'required');
        $this->form_validation->set_rules('kata_sandi', 'Kata Sandi', 'required');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');



        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('pegawai/ubah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $nama_pegawai              = $this->input->post('nama_pegawai');
            $nama_pengguna                        = $this->input->post('nama_pengguna');
            $kata_sandi                  = $this->input->post('kata_sandi');
            $no_hp                  = $this->input->post('no_hp');
            $alamat                      = $this->input->post('alamat');
            $level                      = $this->input->post('level');
            $data = array(
                'nama'          => $nama_pegawai,
                'username' => $nama_pengguna,
                'password' => $kata_sandi,
                'no_hp' => $no_hp,
                'alamat'              => $alamat,
                'level'              => $level,

            );
            $this->db->where('id_user', $id);
            $this->db->update('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Ubah data pegawai berhasil
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>');
            redirect('pegawai');
        }
    }
    public function hapus()
    {
        $id = $this->input->post('hapus');

        $this->db->where('id_user', $id);
        $this->db->delete('user');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Hapus data pegawai berhasil!
             <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">×</span>
             </a>
         </div>');
        redirect('pegawai');
    }
    public function get($id)
    {
        $data = $this->db->get_where('user', ['id_user' => $id])->row();
        //echo "<pre>";echo print_r($data);echo "</pre>";die();
        echo json_encode($data);
    }
}
