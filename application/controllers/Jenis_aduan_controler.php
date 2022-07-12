<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_aduan_controler extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('jenis_aduan_pegawai_model');
		if ($this->session->userdata('akses') != "pegawai" && $this->session->userdata('akses') != "admin") {
			redirect('login_controler');
		};
	}
	public function index()
	{
		$data['jenis_aduan'] = $this->jenis_aduan_pegawai_model->get_jenis_aduan($this->session->userdata('id'));
		$data['last_code'] = $this->jenis_aduan_pegawai_model->get_code();
		$this->load->view('jenis_aduan_pegawai/index', $data);
	}
	public function detail($id)
	{
	}
	public function buat_jenis_aduan()
	{
	}
	public function hapus_jenis_aduan($id)
	{
	}
}
