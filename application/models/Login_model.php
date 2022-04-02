<?php
    class Login_model extends CI_MODEL{
        function cek_login($data){
            $this->db->select('*');
            $this->db->from('masyarakat');
            $this->db->where($data);
            $this->db->limit(1);
            $query = $this->db->get();
            if ($query->num_rows() == 0) {
                return FALSE;
                // return 1;
            } else {
                return $query->result();
                // return 2;
            }
        }
    }
?>