<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Kategori extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            
            if ($this->session->userdata('role_id') != '2') 
            {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <b>Anda Belum Login.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
                redirect(base_url('guest/login'));
            }
            
            $this->load->helper('text');
            $this->load->model('model_buku');
            $this->load->model('model_kategori');
        }
        
        public function subcat($id) 
        {
            $data['buku'] = $this->model_buku->get_buku_by_kategori($id, 'tbl_kategori');
            $data['kategori'] = $this->model_kategori->get_data();
            $this->load->view('templates/anggota/header.php');
            $this->load->view('templates/anggota/sidebar.php', $data);
            $this->load->view('anggota/kategori.php', $data);
            $this->load->view('templates/anggota/footer.php');
        }
    }
    