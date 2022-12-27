<?php

class Home_model extends CI_Model{
    
    public function add_aduan($data)
    {
        $this->db->insert('nonlog_aduan',$data['aduan']);
    }

}