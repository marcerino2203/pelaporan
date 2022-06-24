<?php
class Login_model extends CI_MODEL
{
    function cek_login_masyarakat($data)
    {
        $this->db->select('*');
        $this->db->from('masyarakat');
        $this->db->join('akses', 'akses.id_akses=masyarakat.id_akses');
        $this->db->where($data);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }
    function cek_login_pegawai($data)
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->join('akses', 'akses.id_akses=pegawai.id_akses');
        $this->db->where($data);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }
}
