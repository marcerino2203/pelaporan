<?php

class Home_model extends CI_Model{
    
    public function get_list($data)
    {
        $this->db->select('*');
        $this->db->from('nonlog_aduan');
        $data = $this->db->get();
        return $data;
    }

}