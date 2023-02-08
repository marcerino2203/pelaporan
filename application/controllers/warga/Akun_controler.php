<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun_controler extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('akses') != "warga" && $this->session->userdata('akses') != "master") {
			redirect('login_controler');
		};
	}
	public function index()
	{
		$this->load->view('warga/akun/index');
	}

	public function detail_user($id_user)
	{
		$data['detail_user'] = $this->warga_model->get_detail_warga($id_user);
		$this->load->view('warga/akun/index', $data);
	}
}
