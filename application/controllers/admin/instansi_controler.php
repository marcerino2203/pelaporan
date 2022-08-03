<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Instansi_controler extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		if ($this->session->userdata('akses') != "admin") {
			redirect('login_controler');
		};
	}
	public function index()
	{
		$data['instansi'] = $this->admin_model->get_instansi();
		$data['count_pegawai'] = $this->admin_model->get_count_pegawai();
		$data['count'] = $this->admin_model->get_count();
		$this->load->view('admin/instansi/index', $data);
	}
}
