<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class User extends CI_Controller 
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

            $this->load->model('model_anggota');
            $this->load->model('model_kategori');
            $this->load->model('model_peminjaman');
        }

        public function info($id) 
        {
            $where = array('id_anggota' => $id);
            $data['anggota']    = $this->model_anggota->user_info($where, 'tbl_anggota');
            $data['kategori']   = $this->model_kategori->get_data();
            $data['count_list'] = $this->model_peminjaman->count_list_peminjaman();
            $this->load->view('templates/anggota/header.php');
            $this->load->view('templates/anggota/sidebar.php', $data);
            $this->load->view('anggota/user.php');
            $this->load->view('templates/anggota/footer.php');
        }
    }