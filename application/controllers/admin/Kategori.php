<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Kategori extends CI_Controller 
    {
        public function __construct()
        {
            parent::__construct();		
            $this->load->model('model_kategori');
            $this->load->library('form_validation');
        }

        public function index() 
        {
            $data['kategori'] = $this->model_kategori->get_data();
            $this->load->view('templates/admin/header.php');
            $this->load->view('templates/admin/sidebar.php');
            $this->load->view('admin/kategori.php', $data);
            $this->load->view('templates/admin/footer.php');
        }

        public function add_kategori() 
        {
            $this->load->view('templates/admin/header.php');
            $this->load->view('templates/admin/sidebar.php');
            $this->load->view('admin/form_insert_kategori.php');
            $this->load->view('templates/admin/footer.php');
        }

        public function edit_kategori($id) 
        {
            $where = array( 'id_kategori' => $id );

            $data['kategori'] = $this->model_kategori->form_edit($where, 'tbl_kategori');
            
            $this->load->view('templates/admin/header.php');
            $this->load->view('templates/admin/sidebar.php');
            $this->load->view('admin/form_edit_kategori.php', $data);
            $this->load->view('templates/admin/footer.php');
        }

        public function insert_kategori() 
        {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) 
            {
                $this->add_kategori();
            } 
            else 
            {
                $nama_kategori = $this->input->post('nama_kategori');

                $data = array (
                    'nama_kategori' => $nama_kategori
                );

                $this->model_kategori->insert_data($data, 'tbl_kategori');

                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                                <b>Data Kategori berhasil di Tambah.</b>
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>');

                redirect(base_url('admin/kategori'));
            }

        }

        public function update_kategori() 
        {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) 
            {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <b>Data Kategori Gagal di Ubah.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');

                redirect(base_url('admin/kategori'));
            } 
            else 
            {
                $id_kategori    = $this->input->post('id_kategori');
                $nama_kategori  = $this->input->post('nama_kategori');

                $data = array (
                    'id_kategori'   => $id_kategori,
                    'nama_kategori' => $nama_kategori
                );

                $where = array (
                    'id_kategori' => $id_kategori
                );

                $this->model_kategori->update_data($where, $data, 'tbl_kategori');

                $this->session->set_flashdata('pesan', '<div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                                <b>Data Kategori berhasil di Ubah.</b>
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>');

                redirect(base_url('admin/kategori'));
            }
        }

        public function delete_kategori($id) 
        {
            $where = array ('id_kategori' => $id);

            $this->model_kategori->delete_data($where, 'tbl_kategori');

            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <b>Data Kategori Berhasil di Hapus.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');

            redirect(base_url('admin/kategori'));
        }

        public function _rules() 
        {
            $this->form_validation->set_rules('nama_kategori', 'nama kategori', 'required');
        }

    }