<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Model_Buku extends CI_Model 
    {
        public function get_data() 
        {
            return $this->db->from('tbl_buku')  -> join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_buku.id_kategori')
                                                -> join('tbl_penerbit', 'tbl_penerbit.id_penerbit = tbl_buku.id_penerbit')
                                                -> get()->result();
        }

        public function insert_data($data, $table) 
        {
            $this->db->insert($table, $data);
        }

        public function count_buku() 
        {
            return $this->db->get('tbl_buku')->num_rows();
        }

        public function info_buku($id, $table) 
        {
            return $this->db->from($table)  -> join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_buku.id_kategori')
                                            -> join('tbl_penerbit', 'tbl_penerbit.id_penerbit = tbl_buku.id_penerbit')
                                            -> where('id_buku', $id)
                                            -> get()->result();
        } 

        public function form_edit($id, $table) 
        {   
            $this->db->where($id);
            return $this->db->from($table)  -> join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_buku.id_kategori')
                                            -> join('tbl_penerbit', 'tbl_penerbit.id_penerbit = tbl_buku.id_penerbit')
                                            -> get()->result();
        }

        public function delete_data($id, $table) 
        {
            $data = $this->db->get_where($table,['id_buku' => $id])->row();
            
            $this->db->delete($table, ['id_buku' => $id]);

            if ($data->gambar != "default.jpg")
            {
                $filename = explode(".", $data->gambar)[0];
                return array_map('unlink', glob(FCPATH."assets/upload/$filename.*"));
            }
        }

        public function update_data($id, $data, $table)
        {
            $this->db->where($id);
            $this->db->update($table, $data);
        }

        public function get_buku_by_kategori($id, $table) 
        {
            return $this->db->from($table)  -> join('tbl_buku', 'tbl_buku.id_kategori = tbl_kategori.id_kategori')
                                            -> where('tbl_kategori.id_kategori', $id)
                                            -> get()->result();
        }
    }