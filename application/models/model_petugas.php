<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Model_Petugas extends CI_Model 
    {
        public function get_data() 
        {
            return $this->db->get('tbl_petugas')->result();
        }

        public function insert_data($data, $table) 
        {
            $this->db->insert($table, $data);
        }

        public function form_edit($id, $table) 
        {
            return $this->db->get_where($table, $id)->result();
        }

        public function count_petugas() 
        {
            return $this->db->get('tbl_petugas')->num_rows();
        }

        public function info_petugas($id, $table) 
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
            $data = $this->db->get_where($table,['id_petugas' => $id])->row();
            
            $this->db->delete($table, ['id_petugas' => $id]);

            if ($data->foto != "default.jpg")
            {
                $filename = explode(".", $data->foto)[0];
                return array_map('unlink', glob(FCPATH."assets/upload/petugas/$filename.*"));
            }
        }

        public function generate_number() 
        {
            $this->db->select_max('id_petugas');

            $last_number = $this->db->get('tbl_petugas')->row_array()['id_petugas'];
            $row_number = $this->db->get('tbl_petugas')->num_rows();

            if ($row_number > 0) {
                $number = (int) substr($last_number, 4, 4);
                $number++;
            } else {
                $number = 1;
            } 
            
            $year = date("y");
            $role = 'P01';

            $new_number = $role. $year. sprintf('%03s', $number); 

            return $new_number;
        }

    }