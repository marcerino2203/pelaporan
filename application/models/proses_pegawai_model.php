<?php
class Proses_pegawai_model extends CI_MODEL
{
    function get_laporan($data)
    {
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->join('instansi', 'instansi.id_instansi=pegawai.id_instansi');
        $this->db->join('aduan', 'aduan.id_instansi=instansi.id_instansi');
        $this->db->where('pegawai.id_pegawai', $data);
        $this->db->where('aduan.id_keterangan_status', 3);
        $data = $this->db->get();
        return $data;
    }
    function get_detail_laporan($data)
    {
        $this->db->select('*');
        $this->db->from('aduan');
        $this->db->where($data['id_aduan']);
        $data = $this->db->get();
        return $data;
    }
    function get_status_laporan($data)
    {
        $this->db->select('*');
        $this->db->from('aduan');
        $this->db->join('status_aduan', 'status_aduan.id_aduan=aduan.id_aduan');
        $this->db->join('keterangan_status', 'keterangan_status.id_keterangan_status=status_aduan.id_keterangan_status');
        $this->db->where($data['id_aduan']);
        $data = $this->db->get();
        return $data;
    }
    function selesai($data, $id)
    {
        if ($this->db->insert('status_aduan', $data['status'])) {

            $this->db->where('id_aduan', $id);
            $this->db->update('aduan', $data['new_status']);

            return true;
        } else {
            return false;
        }
    }
}
