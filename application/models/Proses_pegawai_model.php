<?php
class Proses_pegawai_model extends CI_MODEL
{
    function get_laporan($data)
    {
        $this->db->select('*, keterangan_status.keterangan as status');
        $this->db->from('pegawai');
        $this->db->join('instansi', 'instansi.id_instansi=pegawai.id_instansi');
        $this->db->join('jenis_aduan', 'jenis_aduan.id_instansi=instansi.id_instansi');
        $this->db->join('aduan', 'aduan.id_jenis_aduan=jenis_aduan.id_jenis_aduan');
        $this->db->join('keterangan_status', 'aduan.id_keterangan_status=keterangan_status.id_keterangan_status');
        $this->db->where('pegawai.id_pegawai', $data);
        $this->db->where('aduan.id_keterangan_status', 3);
        $data = $this->db->get();
        return $data;
    }
    function get_detail_laporan($data)
    {
        $this->db->select('aduan.id_aduan,aduan.nomor_aduan,aduan.tanggal,aduan.lokasi,aduan.gambar,aduan.id_masyarakat,aduan.id_keterangan_status,aduan.keterangan,jenis_aduan.keterangan as jenis_aduan, masyarakat.nama');
        $this->db->from('aduan');
        $this->db->join('jenis_aduan', 'aduan.id_jenis_aduan=jenis_aduan.id_jenis_aduan');
        $this->db->join('masyarakat', 'aduan.id_masyarakat=masyarakat.id_masyarakat');
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
