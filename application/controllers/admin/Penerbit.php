<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Penerbit extends CI_Controller 
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

            $this->load->model('model_penerbit');
            $this->load->library('form_validation');
        }

        public function index() 
        {
            $data['penerbit'] = $this->model_penerbit->get_data();
            $this->load->view('templates/admin/header.php');
            $this->load->view('templates/admin/sidebar.php');
            $this->load->view('admin/penerbit.php', $data);
            $this->load->view('templates/admin/footer.php');
        }

        public function add_penerbit() 
        {
            $data['get_number'] = $this->model_penerbit->generate_number();
            $this->load->view('templates/admin/header.php');
            $this->load->view('templates/admin/sidebar.php');
            $this->load->view('admin/form_insert_penerbit.php', $data);
            $this->load->view('templates/admin/footer.php');
        }

        public function edit_penerbit($id) 
        {
            $where = array('id_penerbit' => $id);
            $data['penerbit'] = $this->model_penerbit->form_edit($where, 'tbl_penerbit');
            $this->load->view('templates/admin/header.php');
            $this->load->view('templates/admin/sidebar.php');
            $this->load->view('admin/form_edit_penerbit.php', $data);
            $this->load->view('templates/admin/footer.php');
        }

        public function insert_penerbit() 
        {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) 
            {
                $this->add_penerbit();
            } 
            else 
            {
                $id_penerbit        = $this->input->post('id_penerbit');
                $nama_penerbit      = $this->input->post('nama_penerbit');
                $telp_penerbit      = $this->input->post('telp_penerbit');
                $alamat_penerbit    = $this->input->post('alamat_penerbit');

                $data = array(
                    'id_penerbit'       => $id_penerbit,
                    'nama_penerbit'     => $nama_penerbit,
                    'telp_penerbit'     => $telp_penerbit,
                    'alamat_penerbit'   => $alamat_penerbit
                );

                $this->model_penerbit->insert_data($data, 'tbl_penerbit');

                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        <b>Data Penerbit Berhasil di Tambah.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');

                redirect(base_url('admin/penerbit'));
            }
        }

        public function update_penerbit() 
        {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) 
            {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <b>Data Penerbit Gagal di Ubah.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');

                redirect(base_url('admin/penerbit'));
            } 
            else 
            {
                $id_penerbit        = $this->input->post('id_penerbit');
                $nama_penerbit      = $this->input->post('nama_penerbit');
                $telp_penerbit      = $this->input->post('telp_penerbit');
                $alamat_penerbit    = $this->input->post('alamat_penerbit');

                $data = array(
                    'nama_penerbit'     => $nama_penerbit,
                    'telp_penerbit'     => $telp_penerbit,
                    'alamat_penerbit'   => $alamat_penerbit
                );

                $where = array(
                    'id_penerbit' => $id_penerbit
                );

                $this->model_penerbit->update_data($where, $data, 'tbl_penerbit');

                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        <b>Data Penerbit Barhasil di Ubah.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');

                redirect(base_url('admin/penerbit'));
            }
        }

        public function delete_penerbit($id) 
        {
            $where = array('id_penerbit' => $id);

            $this->model_penerbit->delete_data($where, 'tbl_penerbit');

            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <b>Data Penerbit Berhasil di Hapus.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');

            redirect(base_url('admin/penerbit'));
        }

        public function _rules() 
        {
            $this->form_validation->set_rules('id_penerbit', 'id penerbit', 'required');
            $this->form_validation->set_rules('nama_penerbit', 'nama penerbit', 'required');
        }

    }