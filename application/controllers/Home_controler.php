<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_controler extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('Home_model');
		// if ($this->session->userdata('akses') != "warga" && $this->session->userdata('akses') != "master") {
		// 	redirect('login_controler');
		// };
	}
	public function index()
	{
		if ($this->session->userdata('akses') == "warga") {
			redirect('warga/dashboard_controler');
		} else if ($this->session->userdata('akses') == "pegawai") {
			redirect('pegawai/dashboard_controler');
		} else if ($this->session->userdata('akses') == "admin") {
			redirect('admin/dashboard_controler');
		} else {
			$this->load->view('home/index');
		};
	}

	// public function add_aduan()
	// {
	// 	date_default_timezone_set('Asia/Jakarta');
	// 	$this->load->model('home_model');
	// 	$tgl_lapor = date('Y-m-d');
	// 	$nama_pelapor =  $this->input->post('nama_pelapor');
	// 	$no_pelapor =  $this->input->post('no_pelapor');
	// 	$lokasi_kerusakan = $this->input->post('lokasi_kerusakan');
	// 	$keterangan = $this->input->post('keterangan');

	// 	$this->home_model->add_aduan($tgl_lapor,$nama_pelapor,$no_pelapor,$lokasi_kerusakan,$keterangan);
	// 	redirect('Home_controler');
	// }

	public function upload(){
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

	public function add_aduan()
	{
		$this->load->model('Home_model');
		date_default_timezone_set('Asia/Jakarta');
		$data['aduan'] = array(
			'tgl_lapor' 		=> date('Y-m-d'),
			'nama_pelapor' 		=> $this->input->post('nama_pelapor'),
			'no_pelapor' 		=> $this->input->post('no_pelapor'),
			'lokasi_kerusakan' 	=> $this->input->post('lokasi_kerusakan'),
			'keterangan' 		=> $this->input->post('keterangan'),
			'gbr_lokasi'        => $upload['file']['file_name']
		);

		$this->Home_model->add_aduan($data);
			redirect('Home_controler');

	}

	/*public function add_aduan() {

		$this->load->model('Home_model');
		$data = array();

		if($this->input->post('submit')){ // Jika user menekan tombol Submit (Simpan) pada form
      // lakukan upload file dengan memanggil function upload yang ada di GambarModel.php
      		$upload = $this->Home_model->upload();
      
      		if($upload['result'] == "success"){ // Jika proses upload sukses
         	// Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
        		$this->Home_model->add_aduan($upload);
        
        redirect('gambar'); // Redirect kembali ke halaman awal / halaman view data
      		}else{ // Jika proses upload gagal
        			$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
      			}
    	}

    	redirect('Home_controler');
	}*/


}
