<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Anggota extends CI_Controller 
    {
        public function __construct()
        {
            parent::__construct();		
            $this->load->model('model_anggota');
            $this->load->library('form_validation');
        }

        public function index() 
        {
            $data['anggota'] = $this->model_anggota->get_data();
            $this->load->view('templates/admin/header.php');
            $this->load->view('templates/admin/sidebar.php');
            $this->load->view('admin/anggota.php', $data);
            $this->load->view('templates/admin/footer.php');
        }

        public function add_anggota() 
        {
            $data['get_number'] = $this->model_anggota->generate_number();
            $this->load->view('templates/admin/header.php');
            $this->load->view('templates/admin/sidebar.php');
            $this->load->view('admin/form_insert_anggota.php', $data);
            $this->load->view('templates/admin/footer.php');
        }

        public function info_anggota($id)
        {
            $where = array('id_anggota' => $id);
            $data['anggota'] = $this->model_anggota->info_anggota($where, 'tbl_anggota');
            $this->load->view('templates/admin/header.php');
            $this->load->view('templates/admin/sidebar.php');
            $this->load->view('admin/info_anggota.php', $data);
            $this->load->view('templates/admin/footer.php');
        }

        public function edit_anggota($id) 
        {
            $where = array('id_anggota' => $id);
            $data['anggota'] = $this->model_anggota->form_edit($where, 'tbl_anggota');
            $this->load->view('templates/admin/header.php');
            $this->load->view('templates/admin/sidebar.php');
            $this->load->view('admin/form_edit_anggota.php', $data);
            $this->load->view('templates/admin/footer.php');
        }

        public function insert_anggota() 
        {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) 
            {
                $this->add_anggota();
            } 
            else 
            {
                $id_anggota     = $this->input->post('id_anggota');
                $nama_anggota   = $this->input->post('nama_anggota');
                $telp_anggota   = $this->input->post('telp_anggota');
                $alamat         = $this->input->post('alamat');
                $foto           = $_FILES['foto']['name'];

                if ($foto == "") 
                {
                    $config ['full_path']   = './assets/upload/anggota/default.jpg';
                    $config ['file_name']   = 'default.jpg';
                    $this->load->library('upload', $config);
                    $foto=$this->upload->data('file_name');
                } 

                $data = array(
                    'id_anggota'    => $id_anggota,
                    'nama_anggota'  => $nama_anggota,
                    'tlp_anggota'   => $telp_anggota,
                    'alamat'        => $alamat,
                    'foto'          => $foto,
                    'password'      => md5($id_anggota)
                );

                $this->model_anggota->insert_data($data, 'tbl_anggota');

                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        <b>Data Anggota Berhasil di Tambah.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');

                redirect(base_url('admin/anggota'));
            }
        }

        public function update_anggota() 
        {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) 
            {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <b>Data Anggota Gagal di Ubah.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');

                redirect(base_url('admin/anggota'));
            } 
            else 
            {
                $id_anggota     = $this->input->post('id_anggota');
                $nama_anggota   = $this->input->post('nama_anggota');
                $telp_anggota   = $this->input->post('telp_anggota');
                $alamat         = $this->input->post('alamat');
                $foto           = $_FILES['foto']['name'];

                if ($foto) 
                {
                    $config ['upload_path']     = './assets/upload/anggota';
                    $config ['file_name']       = strval($id_anggota); 
                    $config ['allowed_types']   = 'jpg|jpeg|png|gif';
                    $config ['overwrite']       = TRUE; 

                    $this->load->library('upload', $config);

                    if($this->upload->do_upload('foto')) 
                    {
                        $foto=$this->upload->data('file_name');  
                        //$this->db->set('foto', $foto);                     
                    }
                }  
                else 
                {                   
                    $foto         = $this->input->post('old_image');
                }

                $data = array(
                    'nama_anggota'  => $nama_anggota,
                    'tlp_anggota'   => $telp_anggota,
                    'alamat'        => $alamat,
                    'foto'          => $foto
                );

                $where = array('id_anggota' => $id_anggota);

                $this->model_anggota->update_data($where, $data, 'tbl_anggota');

                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        <b>Data Anggota Berhasil di Ubah.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');

                redirect(base_url('admin/anggota'));
            }
        }

        public function delete_anggota($id) 
        {
            $this->model_anggota->delete_data($id, 'tbl_anggota');

            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <b>Data anggota Berhasil di Hapus.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');

            redirect(base_url('admin/anggota'));
        }

        public function _rules() 
        {
            $this->form_validation->set_rules('id_anggota', 'id_anggota', 'required');
            $this->form_validation->set_rules('nama_anggota', 'nama_anggota', 'required');
            $this->form_validation->set_rules('telp_anggota', 'telp_anggota', 'required');
            $this->form_validation->set_rules('alamat', 'alamat', 'required');
        }


    }