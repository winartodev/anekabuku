<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Kategori extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();		
            $this->load->helper('text');
            $this->load->model('model_buku');
            $this->load->model('model_kategori');
        }
        
        public function subcat($id) 
        {
            $data['buku'] = $this->model_buku->get_buku_by_kategori($id, 'tbl_kategori');
            $data['kategori'] = $this->model_kategori->get_data();
            $this->load->view('templates/guest/header.php');
            $this->load->view('templates/guest/sidebar.php', $data);
            $this->load->view('guest/kategori.php', $data);
            $this->load->view('templates/guest/footer.php');
        }
    }
    