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
}
