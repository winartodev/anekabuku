<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Petugas extends CI_Controller 
    {
        public function __construct()
        {
            parent::__construct();		
            $this->load->model('model_petugas');
            $this->load->library('form_validation');
        }

        public function index() 
        {
            $data['petugas'] = $this->model_petugas->get_data();
            $this->load->view('templates/admin/header.php');
            $this->load->view('templates/admin/sidebar.php');
            $this->load->view('admin/petugas.php', $data);
            $this->load->view('templates/admin/footer.php');
        }

        public function add_petugas() 
        {
            $data['get_number'] = $this->model_petugas->generate_number();
            $this->load->view('templates/admin/header.php');
            $this->load->view('templates/admin/sidebar.php');
            $this->load->view('admin/form_insert_petugas.php', $data);
            $this->load->view('templates/admin/footer.php');
        }

        public function info_petugas($id)
        {
            $where = array('id_petugas' => $id);
            $data['petugas'] = $this->model_petugas->info_petugas($where, 'tbl_petugas');
            $this->load->view('templates/admin/header.php');
            $this->load->view('templates/admin/sidebar.php');
            $this->load->view('admin/info_petugas.php', $data);
            $this->load->view('templates/admin/footer.php');
        }

        public function edit_petugas($id) 
        {
            $where = array('id_petugas' => $id);
            $data['petugas'] = $this->model_petugas->form_edit($where, 'tbl_petugas');
            $this->load->view('templates/admin/header.php');
            $this->load->view('templates/admin/sidebar.php');
            $this->load->view('admin/form_edit_petugas.php', $data);
            $this->load->view('templates/admin/footer.php');
        }

        public function insert_petugas() 
        {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) 
            {
                $this->add_petugas();
            } 
            else 
            {
                $id_petugas     = $this->input->post('id_petugas');
                $nama_petugas   = $this->input->post('nama_petugas');
                $telp_petugas   = $this->input->post('telp_petugas');
                $alamat         = $this->input->post('alamat');
                $foto           = $_FILES['foto']['name'];

                if ($foto == "") 
                {
                    $config ['full_path']   = './assets/upload/petugas/default.jpg';
                    $config ['file_name']   = 'default.jpg';
                    $this->load->library('upload', $config);
                    $foto=$this->upload->data('file_name');
                } 

                $data = array(
                    'id_petugas'    => $id_petugas,
                    'nama_petugas'  => $nama_petugas,
                    'tlp_petugas'   => $telp_petugas,
                    'alamat'        => $alamat,
                    'foto'          => $foto,
                    'password'      => md5($id_petugas)
                );

                $this->model_petugas->insert_data($data, 'tbl_petugas');

                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        <b>Data petugas Berhasil di Tambah.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');

                redirect(base_url('admin/petugas'));
            }
        }

        public function update_petugas() 
        {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) 
            {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <b>Data petugas Gagal di Ubah.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');

                redirect(base_url('admin/petugas'));
            } 
            else 
            {
                $id_petugas     = $this->input->post('id_petugas');
                $nama_petugas   = $this->input->post('nama_petugas');
                $telp_petugas   = $this->input->post('telp_petugas');
                $alamat         = $this->input->post('alamat');
                $foto           = $_FILES['foto']['name'];

                if ($foto) 
                {
                    $config ['upload_path']     = './assets/upload/petugas';
                    $config ['file_name']       = strval($id_petugas); 
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
                    'nama_petugas'  => $nama_petugas,
                    'tlp_petugas'   => $telp_petugas,
                    'alamat'        => $alamat,
                    'foto'          => $foto
                );

                $where = array('id_petugas' => $id_petugas);

                $this->model_petugas->update_data($where, $data, 'tbl_petugas');

                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        <b>Data petugas Berhasil di Ubah.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');

                redirect(base_url('admin/petugas'));
            }
        }

        public function delete_petugas($id) 
        {
            $this->model_petugas->delete_data($id, 'tbl_petugas');

            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <b>Data petugas Berhasil di Hapus.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');

            redirect(base_url('admin/petugas'));
        }

        public function _rules() 
        {
            $this->form_validation->set_rules('id_petugas', 'id_petugas', 'required');
            $this->form_validation->set_rules('nama_petugas', 'nama_petugas', 'required');
            $this->form_validation->set_rules('telp_petugas', 'telp_petugas', 'required');
            $this->form_validation->set_rules('alamat', 'alamat', 'required');
        }


    }