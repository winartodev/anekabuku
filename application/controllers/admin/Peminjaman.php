<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Peminjaman extends CI_Controller 
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

            $this->load->model('model_peminjaman');
        }

        public function verifikasi() 
        {
            $id_peminjaman      = $this->input->post('id_peminjaman');
            $id_petugas         = $this->input->post('id_petugas');
            $id_anggota         = $this->input->post('id_anggota');
            $id_buku            = $this->input->post('id_buku');
            $jumlah_buku        = $this->input->post('jumlah_buku');
            $tanggal_pinjam     = $this->input->post('tanggal_pinjam');
            $tanggal_kembali    = $this->input->post('tanggal_kembali');
            
            $data = array(
                'id_peminjaman'     => $id_peminjaman,
                'id_petugas'     => $id_petugas,
                'id_anggota'        => $id_anggota,
                'id_buku'           => $id_buku,
                'jumlah_buku'       => $jumlah_buku,
                'tanggal_pinjam'    => $tanggal_pinjam,
                'tanggal_kembali'   => $tanggal_kembali
            );

            $where = array(
                'id_anggota'    => $id_anggota,
                'id_buku'       => $id_buku
            );

            $this->model_peminjaman->insert_data($data, 'tbl_peminjaman');
            
            $this->model_peminjaman->delete_data($where, 'tbl_list_pinjaman');

            $anggota = $this->db->get('tbl_anggota')->row();

            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <b>Data peminjaman Berhasil di Hapus.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');


            redirect(base_url('admin/anggota/info_anggota/'). $anggota->id_anggota);
        }

        public function delete_list_pinjaman($id) 
        {
            $where = array('id_buku' => $id);

            $this->model_peminjaman->delete_data($where, 'tbl_list_pinjaman');

            $anggota = $this->db->get('tbl_anggota')->row();

            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <b>Data peminjaman Berhasil di Hapus.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');

            redirect(base_url('admin/anggota/info_anggota/'). $anggota->id_anggota);
        }   


        public function delete_pinjaman($id) 
        {
            $where = array('id_peminjaman' => $id);

            $this->model_peminjaman->delete_data($where, 'tbl_peminjaman');

            $anggota = $this->db->get('tbl_anggota')->row();

            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <b>Data peminjaman Berhasil di Hapus.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');

            redirect(base_url('admin/pengembalian/detail/'). $anggota->id_anggota);
        }   

    }