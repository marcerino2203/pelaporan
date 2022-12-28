<?php

class Aduanlist_nonlog_model extends CI_Model{
    
    public function get_list()
    {
        $hasil=$this->db->query("SELECT * FROM nonlog_aduan");

        return $hasil;
    }

}