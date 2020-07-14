<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Model_Kategori extends CI_Model 
    {
        public function get_data() 
        {
            return $this->db->get('tbl_kategori')->result();
        }

        public function insert_data($data, $table) 
        {
            $this->db->insert($table, $data);
        }

        public function form_edit($id, $table) 
        {
            return $this->db->get_where($table, $id)->result();
        }

        public function update_data($id, $data, $table)
        {
            $this->db->where($id);
            $this->db->update($table, $data);
        }

        public function delete_data($id, $table) 
        {
            $this->db->delete($table, $id);
        }

        public function generate_number() 
        {
            $this->db->select_max('id_kategori');

            $last_number = $this->db->get('tbl_kategori')->row_array()['id_kategori'];
            $row_number = $this->db->get('tbl_kategori')->num_rows();

            if ($row_number > 0) {
                $number = (int) substr($last_number, 4, 4);
                $number++;
            } else {
                $number = 1;
            } 
            
            $str = "CAT";

            $new_number = $str. sprintf('%03s', $number); 

            return $new_number;
        }

    }