<?php

class Dashboard extends CI_Controller 
{
    public function index()
    {
        $this->load->view('templates/admin/header.php');
        $this->load->view('templates/admin/sidebar.php');
        $this->load->view('admin/dashboard.php');
        $this->load->view('templates/admin/footer.php');
    }

}