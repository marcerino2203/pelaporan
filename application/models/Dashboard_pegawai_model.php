<?php
class Dashboard_pegawai_model extends CI_MODEL
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
        $this->db->where('aduan.id_keterangan_status', 1);
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
    function proses($data, $id)
    {
        if ($this->db->insert('status_aduan', $data['status'])) {

            $this->db->where('id_aduan', $id);
            $this->db->update('aduan', $data['new_status']);

            return true;
        } else {
            return false;
        }
    }


    function add_laporan($data)
    {
        if ($this->db->insert('aduan', $data['aduan'])) {
            $data['status'] += array('id_aduan' => $this->db->insert_id());
            if ($this->db->insert('status_aduan', $data['status'])) {
            } else {
                return false;
            }
            return true;
        } else {
            return false;
        }
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
}
