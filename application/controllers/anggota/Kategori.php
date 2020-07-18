<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Kategori extends CI_Controller
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
            
            $this->load->helper('text');
            $this->load->model('model_buku');
            $this->load->model('model_kategori');
            $this->load->model('model_peminjaman');
        }
        
        public function subcat($id) 
        {
            $data['buku']       = $this->model_buku->get_buku_by_kategori($id, 'tbl_kategori');
            $data['kategori']   = $this->model_kategori->get_data();
            $data['count_list'] = $this->model_peminjaman->count_list_peminjaman();
            $this->load->view('templates/anggota/header.php');
            $this->load->view('templates/anggota/sidebar.php', $data);
            $this->load->view('anggota/kategori.php', $data);
            $this->load->view('templates/anggota/footer.php');
        }

        public function add_to_list($id) 
        {
            $buku = $this->db->get_where('tbl_buku',['id_buku' => $id])->row();

            $data = array(
                            'id_anggota'    => $this->session->userdata('id_anggota'),
                            'id_buku'       => $buku->id_buku,
                            'jumlah_buku'   => 1
                        );

            $this->model_peminjaman->insert_data($data, 'tbl_list_pinjaman');

            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                                                        <b>Buku Masuk Ke Dalam List Pinjaman.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');

            redirect(base_url('anggota/kategori/subcat/').$buku->id_kategori);
        }
    }
    