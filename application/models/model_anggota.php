<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Model_Anggota extends CI_Model 
    {
        public function get_data() 
        {
            return $this->db->get('tbl_anggota')->result();
        }

        public function insert_data($data, $table) 
        {
            $this->db->insert($table, $data);
        }

        public function form_edit($id, $table) 
        {
            return $this->db->get_where($table, $id)->result();
        }

        public function user_info($id, $table) 
        {
            return $this->db->get_where($table, $id)->result();
        }

        public function count_anggota() 
        {
            return $this->db->get('tbl_anggota')->num_rows();
        }

        public function info_anggota($id, $table) 
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
            $data = $this->db->get_where($table,['id_anggota' => $id])->row();
            
            $this->db->delete($table, ['id_anggota' => $id]);

            if ($data->foto != "default.jpg")
            {
                $filename = explode(".", $data->foto)[0];
                return array_map('unlink', glob(FCPATH."assets/upload/anggota/$filename.*"));
            }
        }

        public function generate_number() 
        {
            $this->db->select_max('id_anggota');

            $last_number = $this->db->get('tbl_anggota')->row_array()['id_anggota'];
            $row_number = $this->db->get('tbl_anggota')->num_rows();

            if ($row_number > 0) {
                $number = (int) substr($last_number, 4, 4);
                $number++;
            } else {
                $number = 1;
            } 
            
            $year = date("y");
            $month = date('m');

            $new_number = $year. $month. sprintf('%03s', $number); 

            return $new_number;
        }

    }