<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Buku extends CI_Controller 
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

            $this->load->model(array('model_buku', 'model_penerbit', 'model_kategori'));
            $this->load->library('form_validation');
        }

        public function index() 
        {
            $data['buku'] = $this->model_buku->get_data();
            $this->load->view('templates/admin/header.php');
            $this->load->view('templates/admin/sidebar.php');
            $this->load->view('admin/buku.php', $data);
            $this->load->view('templates/admin/footer.php');
        }

        public function add_buku() 
        {
            $data['penerbit'] = $this->model_penerbit->get_data();
            $data['kategori'] = $this->model_kategori->get_data();
            $this->load->view('templates/admin/header.php');
            $this->load->view('templates/admin/sidebar.php');
            $this->load->view('admin/form_insert_buku.php', $data);
            $this->load->view('templates/admin/footer.php');
        }

        public function info_buku($id)
        {
            $data['buku'] = $this->model_buku->info_buku($id, 'tbl_buku');
            $this->load->view('templates/admin/header.php');
            $this->load->view('templates/admin/sidebar.php');
            $this->load->view('admin/info_buku.php', $data);
            $this->load->view('templates/admin/footer.php');
        }

        public function edit_buku($id) 
        {
            $where = array('id_buku' => $id);
            $data['buku']       = $this->model_buku->form_edit($where, 'tbl_buku');
            $data['kategori']   = $this->model_kategori->get_data();
            $data['penerbit']   = $this->model_penerbit->get_data();
            $this->load->view('templates/admin/header.php');
            $this->load->view('templates/admin/sidebar.php');
            $this->load->view('admin/form_edit_buku.php', $data);
            $this->load->view('templates/admin/footer.php');
        }

        public function insert_buku() 
        {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) 
            {
                $this->add_buku();
            } 
            else 
            {
                $isbn           = $this->input->post('isbn');
                $kategori       = $this->input->post('kategori');
                $penerbit       = $this->input->post('penerbit');
                $judul          = $this->input->post('judul_buku');
                $tahun_terbit   = $this->input->post('tahun_terbit');
                $pengarang      = $this->input->post('pengarang');
                $jumlah_halaman = $this->input->post('jumlah_halaman');
                $stok           = $this->input->post('stok');
                $deskripsi      = $this->input->post('deskripsi');
                $gambar         = $_FILES['gambar']['name'];

                if ($gambar == "") 
                {
                    $config ['full_path']   = './assets/upload/default.jpg';
                    $config ['file_name']   = 'default.jpg';
                    $this->load->library('upload', $config);
                    $gambar=$this->upload->data('file_name');
                } 
                else 
                {
                    $config ['upload_path']     = './assets/upload';
                    $config ['file_name']       = strval($isbn); 
                    $config ['allowed_types']   = 'jpg|jpeg|png|gif';
                    $config ['overwrite']       = TRUE; 

                    $this->load->library('upload', $config);

                    if(!$this->upload->do_upload('gambar')) 
                    {
                                                       
                    } 
                    else 
                    {
                        $gambar=$this->upload->data('file_name');
                    }
                }

                $data = array(
                    'id_buku'           => $isbn,
                    'id_kategori'       => $kategori,
                    'id_penerbit'       => $penerbit,
                    'judul_buku'        => $judul,
                    'tahun_terbit_buku' => $tahun_terbit,
                    'nama_pengarang'    => $pengarang,
                    'jumlah_halaman'    => $jumlah_halaman,
                    'stok_buku'         => $stok,
                    'deskripsi_buku'    => $deskripsi,
                    'gambar'            => $gambar
                );

                $this->model_buku->insert_data($data, 'tbl_buku');

                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        <b>Data Buku Berhasil di Tambah.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');

                redirect(base_url('admin/buku'));
            }
        }

        public function update_buku() 
        {
            $this->_rules();

            if ($this->form_validation->run() == FALSE) 
            {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <b>Data Buku Gagal di Ubah.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');

                redirect(base_url('admin/buku'));
            } 
            else 
            {
                $isbn           = $this->input->post('isbn');
                $kategori       = $this->input->post('kategori');
                $penerbit       = $this->input->post('penerbit');
                $judul          = $this->input->post('judul_buku');
                $tahun_terbit   = $this->input->post('tahun_terbit');
                $pengarang      = $this->input->post('pengarang');
                $jumlah_halaman = $this->input->post('jumlah_halaman');
                $stok           = $this->input->post('stok');
                $deskripsi      = $this->input->post('deskripsi');
                $gambar         = $_FILES['gambar']['name'];

                if ($gambar) 
                {
                    $config ['upload_path']     = './assets/upload/';
                    $config ['file_name']       = strval($isbn); 
                    $config ['allowed_types']   = 'jpg|jpeg|png|gif';
                    $config ['overwrite']       = TRUE; 

                    $this->load->library('upload', $config);

                    if($this->upload->do_upload('gambar')) 
                    {
                        $gambar=$this->upload->data('file_name');  
                        //$this->db->set('gambar', $gambar);                     
                    }
                }  
                else 
                {                   
                    $gambar         = $this->input->post('old_image');
                }

                $data = array(
                    'id_kategori'       => $kategori,
                    'id_penerbit'       => $penerbit,
                    'judul_buku'        => $judul,
                    'tahun_terbit_buku' => $tahun_terbit,
                    'nama_pengarang'    => $pengarang,
                    'jumlah_halaman'    => $jumlah_halaman,
                    'stok_buku'         => $stok,
                    'deskripsi_buku'    => $deskripsi,
                    'gambar'            => $gambar
                );

                $where = array('id_buku' => $isbn);

                $this->model_buku->update_data($where, $data, 'tbl_buku');

                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        <b>Data Buku berhasil di Ubah.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');

                redirect(base_url('admin/buku'));
            }
        }

        public function delete_buku($id) 
        {
            $this->model_buku->delete_data($id, 'tbl_buku');

            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <b>Data Buku berhasil di Hapus.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');

            redirect(base_url('admin/buku'));
        }

        public function _rules() 
        {
            $this->form_validation->set_rules('isbn', 'ISBN', 'required');
            $this->form_validation->set_rules('kategori', 'kategori', 'required');
            $this->form_validation->set_rules('penerbit', 'penerbit', 'required');
            $this->form_validation->set_rules('judul_buku', 'judul buku', 'required');
            $this->form_validation->set_rules('tahun_terbit', 'tahun terbit', 'required');
            $this->form_validation->set_rules('pengarang', 'pengarang', 'required');
            $this->form_validation->set_rules('jumlah_halaman', 'jumlah halaman', 'required');
            $this->form_validation->set_rules('stok', 'stok', 'required');
            $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
        }


    }