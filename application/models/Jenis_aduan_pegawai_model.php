<?php
class Jenis_aduan_pegawai_model extends CI_MODEL
{
    function get_jenis_aduan($data)
    {
        $this->db->select('*');
        $this->db->from('jenis_aduan');
        $this->db->join('pegawai', 'pegawai.id_instansi=jenis_aduan.id_instansi');
        $this->db->where('pegawai.id_pegawai', $data);
        $data = $this->db->get();
        return $data;
    }
    function get_code()
    {
        return $this->db->query("SELECT nomor_aduan FROM aduan ORDER BY nomor_aduan DESC LIMIT 1");
    }
    function add_jenis_laporan($data)
    {
        if ($this->db->insert('jenis_aduan', $data['jenis_laporan'])) {
            return true;
        } else {
            return false;
        }
    }
}
