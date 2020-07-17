<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Guest extends CI_Controller 
    {
        public function __construct()
        {
            parent::__construct();		
            $this->load->model('model_auth');
        }

        public function login() 
        {
            $this->load->view('templates/auth_templates/header');
            $this->load->view('login.php');
            $this->load->view('templates/auth_templates/footer');
        }

        public function auth() {
            $this->_rules();
    
            if ($this->form_validation->run() == FALSE) {
                $this->login();
            } else {
                $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
                $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
         
                $cek_petugas=$this->model_auth->auth_petugas($username,$password);
                $cek_anggota=$this->model_auth->auth_anggota($username,$password);
    
                if ($cek_petugas->num_rows() > 0){
                    $this->session->set_userdata('role_id','1');
                    $data=$cek_petugas->row_array();
                    if ($data['role_id'] == '1') {
                        $this->session->set_userdata('masuk',TRUE);
                        $this->session->set_userdata('id_petugas',$data['id_petugas']);
                        $this->session->set_userdata('nama_petugas',$data['nama_petugas']);
                        $this->session->set_userdata('tlp_petugas',$data['tlp_petugas']);
                        $this->session->set_userdata('alamat',$data['alamat']);
                        $this->session->set_userdata('foto',$data['foto']);
                        $this->session->set_userdata('password',$data['password']);
                        redirect(base_url('admin/dashboard'));
                    }               
                }else if ($cek_anggota->num_rows() > 0) {
                    $this->session->set_userdata('role_id','2');
                    $data=$cek_anggota->row_array();
                    if ($data['role_id'] == '2') {
                        $this->session->set_userdata('masuk',TRUE);
                        $this->session->set_userdata('id_anggota',$data['id_anggota']);
                        $this->session->set_userdata('nama_anggota',$data['nama_anggota']);
                        $this->session->set_userdata('tlp_anggota',$data['tlp_anggota']);
                        $this->session->set_userdata('alamat',$data['alamat']);
                        $this->session->set_userdata('foto',$data['foto']);
                        $this->session->set_userdata('password',$data['password']);
                        redirect(base_url('anggota/dashboard'));
                    }
                } else {
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                            <b>Username atau Password Salah.</b>
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>');
                    $this->login();
                }
            }
        }
    
        public function logout() {
            $this->session->sess_destroy();
            redirect(base_url('guest/login'));
        }
    
        public function _rules() {
            $this->form_validation->set_rules('username', '','required');
            $this->form_validation->set_rules('password', '','required');
        }
    }