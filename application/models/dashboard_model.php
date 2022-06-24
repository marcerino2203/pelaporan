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
    function delete_laporan($id_aduan)
    {
        $this->db->select('*');
        $this->db->from('aduan');
        $this->db->join('status_aduan', 'status_aduan.id_aduan=aduan.id_aduan');
        $this->db->where('aduan.id_aduan', $id_aduan);
        $result = $this->db->count_all_results();
        if ($result <= 1) {
            $this->db->where('id_aduan', $id_aduan);
            $this->db->delete('status_aduan');

            $this->db->where('id_aduan', $id_aduan);
            $this->db->delete('aduan');
            return true;
        } else {
            return false;
        }
    }
    function get_detail_laporan($id_aduan)
    {
        $this->db->select('*');
        $this->db->from('aduan');
        $this->db->where('aduan.id_aduan', $id_aduan);
        $data = $this->db->get();
        return $data;
    }
    function get_status_laporan($id_aduan)
    {
        $this->db->select('*');
        $this->db->from('aduan');
        $this->db->join('status_aduan', 'status_aduan.id_aduan=aduan.id_aduan');
        $this->db->join('keterangan_status', 'keterangan_status.id_keterangan_status=status_aduan.id_keterangan_status');
        $this->db->where('aduan.id_aduan', $id_aduan);
        $data = $this->db->get();
        return $data;
    }
}
