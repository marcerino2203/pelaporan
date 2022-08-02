<?php
class Admin_model extends CI_MODEL
{
    function get_instansi()
    {
        $this->db->select('id_instansi,nama,alamat,alamat,telp');
        $this->db->from('instansi');
        $data = $this->db->get();
        return $data;
    }
    function get_count()
    {
        $this->db->select('instansi.id_instansi,count(nomor_aduan) as jumlah');
        $this->db->from('instansi');
        $this->db->join('jenis_aduan', 'jenis_aduan.id_instansi=instansi.id_instansi');
        $this->db->join('aduan', 'aduan.id_jenis_aduan=jenis_aduan.id_jenis_aduan');
        $data = $this->db->get();
        return $data;
    }
    function get_laporan_status($id_instansi, $id_keterangan_status)
    {
        $this->db->select('*');
        $this->db->from('aduan');
        $this->db->join('jenis_aduan', 'jenis_aduan.id_jenis_aduan=aduan.id_jenis_aduan');
        $this->db->join('instansi', 'instansi.id_instansi=jenis_aduan.id_instansi');
        $this->db->where('instansi.id_instansi', $id_instansi);
        $this->db->where('aduan.id_keterangan_status', $id_keterangan_status);
        $data = $this->db->get();
        return $data;
    }
    function get_details_instansi($id_instansi)
    {
        $this->db->select('id_instansi,nama,alamat,alamat,telp');
        $this->db->from('instansi');
        $this->db->where('id_instansi', $id_instansi);
        $data = $this->db->get();
        return $data;
    }
    function get_laporan_detail($id_aduan)
    {
        $this->db->select('*');
        $this->db->from('aduan');
        $this->db->join('jenis_aduan', 'jenis_aduan.id_jenis_aduan=aduan.id_jenis_aduan');
        $this->db->where('id_aduan', $id_aduan);
        $data['laporan'] = $this->db->get();

        $this->db->select('*');
        $this->db->from('aduan');
        $this->db->join('status_aduan', 'status_aduan.id_aduan=aduan.id_aduan');
        $this->db->join('keterangan_status', 'keterangan_status.id_keterangan_status=status_aduan.id_keterangan_status');
        $this->db->where('aduan.id_aduan', $id_aduan);
        $data['status'] = $this->db->get();

        return $data;
    }
}
