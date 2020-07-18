<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Pengembalian extends CI_Controller 
    {
        public function __construct()
        {
            parent::__construct();		

            if ($this->session->userdata('role_id') != '1') 
            {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <b>Anda Belum Login.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
                redirect(base_url('guest/login'));
            }

            $this->load->model('model_peminjaman');
            $this->load->model('model_anggota');
        }

        public function index() 
        {
            $data['anggota'] = $this->model_anggota->get_data();
            $this->load->view('templates/admin/header.php');
            $this->load->view('templates/admin/sidebar.php');
            $this->load->view('admin/pengembalian.php', $data);
            $this->load->view('templates/admin/footer.php');
        }

        
        public function detail($id) 
        {
            $where = array('id_anggota' => $id);
            $data['anggota'] = $this->model_anggota->info_anggota($where, 'tbl_anggota');
            $data['pengembalian'] = $this->model_peminjaman->get_pinjaman_buku_per_user($id);
            $this->load->view('templates/admin/header.php');
            $this->load->view('templates/admin/sidebar.php');
            $this->load->view('admin/info_pengembalian.php', $data);
            $this->load->view('templates/admin/footer.php');
        }
    }