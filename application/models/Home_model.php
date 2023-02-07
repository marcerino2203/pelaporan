<?php

class Home_model extends CI_Model
{

    public function add_aduan($data)
    {
        $this->db->insert('nonlog_aduan', $data['aduan']);
    }

    /*public function upload(){
    $config['upload_path']      = './assets/gambar/';
    $config['allowed_types']    = 'jpg|png|jpeg';
    $config['max_size']         = '10000';
    $config['remove_space']     = TRUE;
  
    $this->load->library('upload', $config); // Load konfigurasi uploadnya
    if($this->upload->do_upload('gambar')){ // Lakukan upload dan Cek jika proses upload berhasil
      // Jika berhasil :
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      // Jika gagal :
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
         }
    }

    public function add_aduan($upload) {
        date_default_timezone_set('Asia/Jakarta');
        $data = array (
            'tgl_lapor'         => date('Y-m-d'),
            'nama_pelapor'      => $this->input->post('nama_pelapor'),
            'no_pelapor'        => $this->input->post('no_pelapor'),
            'lokasi_kerusakan'  => $this->input->post('lokasi_kerusakan'),
            'keterangan'        => $this->input->post('keterangan'),
            'gbr_lokasi'        => $upload['file']['file_name']
        );

        $this->db->insert('nonlog_aduan',$data);
    }*/
}
