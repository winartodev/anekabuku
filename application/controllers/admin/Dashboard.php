<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Dashboard extends CI_Controller 
    {
        public function __construct()
        {
            parent::__construct();		
            $this->load->model('model_buku');
        }

        public function index()
        {
            $data['buku'] = $this->model_buku->count_buku();
            $this->load->view('templates/admin/header.php');
            $this->load->view('templates/admin/sidebar.php');
            $this->load->view('admin/dashboard.php', $data);
            $this->load->view('templates/admin/footer.php');
        }

    }