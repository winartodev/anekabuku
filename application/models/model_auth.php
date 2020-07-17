<?php
class Model_Auth extends CI_Model {
    function auth_anggota ($username,$password)
    {
        $query=$this->db->query("SELECT * FROM tbl_anggota WHERE id_anggota='$username' AND password=MD5('$password') LIMIT 1");
        return $query;
    }
    
    function auth_petugas($username,$password)
    {
        $query=$this->db->query("SELECT * FROM tbl_petugas WHERE id_petugas='$username' AND password=MD5('$password') LIMIT 1");
        return $query;
    }
}