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
    function get_instansi_detail($id_instansi)
    {
        $this->db->select('id_instansi,nama,alamat,alamat,telp');
        $this->db->from('instansi');
        $this->db->where('id_instansi', $id_instansi);
        $data = $this->db->get();
        return $data;
    }
    function get_warga()
    {
        $this->db->select('*');
        $this->db->from('masyarakat');
        $this->db->join('akses', 'akses.id_akses=masyarakat.id_akses');
        $data = $this->db->get();
        return $data;
    }
    function get_pegawai()
    {
        $this->db->select('*');
        $this->db->from('Pegawai');
        $this->db->join('akses', 'akses.id_akses=pegawai.id_akses');
        $data = $this->db->get();
        return $data;
    }
    function get_akses()
    {
        $this->db->select('*');
        $this->db->from('akses');
        $data = $this->db->get();
        return $data;
    }
    function get_user_details($id_user, $id_akses)
    {
        if ($id_akses != 3) {
            $this->db->select('*');
            $this->db->from('Pegawai');
            $this->db->join('akses', 'akses.id_akses=pegawai.id_akses');
            $this->db->where('pegawai.id_pegawai', $id_user);
            $data = $this->db->get();
            return $data;
        } else {
            $this->db->select('*');
            $this->db->from('masyarakat');
            $this->db->join('akses', 'akses.id_akses=masyarakat.id_akses');
            $this->db->where('masyarakat.id_masyarakat', $id_user);
            $data = $this->db->get();
            return $data;
        }
    }
    function get_count()
    {
        $this->db->select('instansi.id_instansi,count(nomor_aduan) as jumlah');
        $this->db->from('instansi');
        $this->db->join('jenis_aduan', 'jenis_aduan.id_instansi=instansi.id_instansi');
        $this->db->join('aduan', 'aduan.id_jenis_aduan=jenis_aduan.id_jenis_aduan');
        $this->db->group_by('instansi.id_instans');
        $data = $this->db->get();
        return $data;
    }
    function get_count_pegawai_DISABLE()
    {
        $this->db->select('instansi.id_instansi,count(pegawai.id_pegawai) as jumlah_pegawai');
        $this->db->from('instans');
        $this->db->join('pegawai', 'pegawai.id_instansi=instansi.id_instansi');
        $data = $this->db->get();
        return $data;
    }
    function get_count_pegawai()
    {
        $this->db->select('instansi.id_instansi,(SELECT COUNT(id_pegawai)FROM pegawai WHERE pegawai.id_instansi=instansi.id_instansi ) as jumlah_pegawai');
        $this->db->from('instansi');
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
    function add_user($data)
    {
        if ($this->db->insert('pegawai', $data['user'])) {
            return true;
        } else {
            return false;
        }
    }
    function add_instansi($data)
    {
        if ($this->db->insert('instansi', $data['data_instansi'])) {
            return true;
        } else {
            return false;
        }
    }
    function edit_user($data)
    {
        $this->db->set($data['data_pegawai']);
        $this->db->where($data['id_pegawai']);
        $this->db->update('pegawai');
        return true;
    }
}
