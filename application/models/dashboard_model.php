<?php
class Dashboard_model extends CI_MODEL
{
    function get_data()
    {
    }
    function add_laporan($data)
    {
        if ($this->db->insert('aduan', $data)) {
            return true;
        } else {
            return false;
        }
    }
    function get_laporan($data)
    {
        $this->db->select('*');
        $this->db->from('aduan');
        $this->db->where('id_masyarakat', $data);
        $data = $this->db->get();
        return $data;
        // $query = $this->db->get();
        // return $query->result();
    }
    function get_code()
    {
        return $this->db->query("SELECT nomor_aduan FROM aduan ORDER BY nomor_aduan DESC LIMIT 1");
    }
    function delete_laporan($id)
    {
        $this->db->where('id_aduan', $id);
        $this->db->delete('aduan');
        return true;
    }
}
