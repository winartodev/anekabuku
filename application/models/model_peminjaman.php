<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Model_Peminjaman extends CI_Model 
    {
        public function get_data_in_list_peminjaman() 
        {
            return $this->db->from('tbl_list_pinjaman') -> join('tbl_buku', 'tbl_buku.id_buku = tbl_list_pinjaman.id_buku')
                                                        -> join('tbl_penerbit', 'tbl_penerbit.id_penerbit = tbl_buku.id_penerbit')
                                                        -> get()->result();
        }

        public function insert_data($data, $table) 
        {
            $this->db->insert($table, $data);
        }

        public function count_list_peminjaman() 
        {
            return $this->db->get('tbl_list_pinjaman')->num_rows();
        }

        public function check_duplicate($id, $table) 
        {
            return $this->db->get_where($table, $id);
        }

        public function delete_data($id, $table) 
        {
            $this->db->delete($table, $id);
        }
    }