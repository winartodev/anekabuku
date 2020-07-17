<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Buku extends CI_Controller 
    {
        public function __construct()
        {
            parent::__construct();		
            $this->load->model('model_buku');
            $this->load->model('model_kategori');
        }

        public function keranjang_buku() 
        {
            $data['buku'] = $this->model_buku->get_data();
            $data['kategori'] = $this->model_kategori->get_data();
            $this->load->view('templates/anggota/header.php');
            $this->load->view('templates/anggota/sidebar.php',$data);
            $this->load->view('anggota/keranjang_buku.php', $data);
            $this->load->view('templates/anggota/footer.php');
        }
    }