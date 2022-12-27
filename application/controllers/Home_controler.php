<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_controler extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('home_model');
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

	public function add_aduan()
	{
		$this->load->model('Home_model');
		date_default_timezone_set('Asia/Jakarta');
		$data['aduan'] = array(
			'tgl_lapor' => date('Y-m-d'),
			'nama_pelapor' => $this->input->post('nama_pelapor'),
			'no_pelapor' => $this->input->post('no_pelapor'),
			'lokasi_kerusakan' => $this->input->post('lokasi_kerusakan'),
			'keterangan' => $this->input->post('keterangan')
		);

		$this->Home_model->add_aduan($data);
			redirect('Home_controler');

	}

}
