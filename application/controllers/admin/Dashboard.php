<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Dashboard extends CI_Controller 
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

            $this->load->model('model_buku');
            $this->load->model('model_anggota');
            $this->load->model('model_petugas');
        }

        public function index()
        {
            $data['buku'] = $this->model_buku->count_buku();
            $data['anggota'] = $this->model_anggota->count_anggota();
            $data['petugas'] = $this->model_petugas->count_petugas();
            $this->load->view('templates/admin/header.php');
            $this->load->view('templates/admin/sidebar.php');
            $this->load->view('admin/dashboard.php', $data);
            $this->load->view('templates/admin/footer.php');
        }

    }