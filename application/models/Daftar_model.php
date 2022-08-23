<?php
    class Daftar_model extends CI_MODEL{
        function add($data){
            if($this->db->insert('masyarakat',$data)){
                return true;
            }else{
                return false;
            }
            
        }
    }
?>