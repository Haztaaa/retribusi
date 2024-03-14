<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sektor extends CI_Controller
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
        $data['title'] = 'Halaman sektor';
        $data['sektor'] = $this->db->query("SELECT *,u.id_user FROM sektor s INNER JOIN user u ON s.id_user = u.id_user")->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('sektor/index.php', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah()
    {
        $data['title'] = 'Halaman Tambah Sektor';
        $data['user'] = $this->db->query("SELECT * FROM USER WHERE level = 'Pegawai'")->result();

        $this->form_validation->set_rules('nama_sektor', 'Nama sektor', 'required');
        $this->form_validation->set_rules('tagihan', 'Tagihan', 'required');
        $this->form_validation->set_rules('user', 'Penagih', 'required');



        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('sektor/tambah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $nama_sektor              = $this->input->post('nama_sektor');
            $tagihan                        = $this->input->post('tagihan');
            $user                        = $this->input->post('user');


            $data = array(
                'nama_sektor'          => $nama_sektor,
                'tagihan' => $tagihan,
                'id_user' => $user

            );

            $this->db->insert('sektor', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Tambah data sektor berhasil
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>');
            redirect('sektor');
        }
    }
    public function ubah($id)
    {
        $data['title'] = 'Halaman Ubah sektor';
        $data['user'] = $this->db->query("SELECT * FROM USER WHERE level = 'Pegawai'")->result();
        $data['sektor'] = $this->db->query("SELECT * FROM sektor WHERE id_sektor='$id'")->row_array();
        $this->form_validation->set_rules('nama_sektor', 'Nama sektor', 'required');
        $this->form_validation->set_rules('tagihan', 'Tagihan', 'required');
        $this->form_validation->set_rules('user', 'Penagih', 'required');




        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('sektor/ubah', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $nama_sektor              = $this->input->post('nama_sektor');
            $tagihan                        = $this->input->post('tagihan');
            $user                        = $this->input->post('user');


            $data = array(
                'nama_sektor'          => $nama_sektor,
                'tagihan' => $tagihan,
                'id_user' => $user


            );
            $this->db->where('id_sektor', $id);
            $this->db->update('sektor', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Ubah data sektor berhasil
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>');
            redirect('sektor');
        }
    }
    public function hapus()
    {
        $id = $this->input->post('hapus');

        $this->db->where('id_sektor', $id);
        $this->db->delete('sektor');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Hapus data sektor berhasil!
             <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">×</span>
             </a>
         </div>');
        redirect('sektor');
    }
    public function get($id)
    {
        $data = $this->db->get_where('sektor', ['id_sektor' => $id])->row();
        //echo "<pre>";echo print_r($data);echo "</pre>";die();
        echo json_encode($data);
    }
}
