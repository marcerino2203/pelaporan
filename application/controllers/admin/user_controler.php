<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_controler extends CI_Controller
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
		$data['warga'] = $this->admin_model->get_warga();
		$data['pegawai'] = $this->admin_model->get_pegawai();
		$this->load->view('admin/user/index', $data);
	}
	public function register_user()
	{
		$data['instansi'] = $this->admin_model->get_instansi();
		$this->load->view('admin/user/register_user', $data);
	}
	public function add_user()
	{
		$data['user'] = array(
			'no_pegawai' => $this->input->post('nomor_pegawai'),
			'nama' => $this->input->post('nama_lengkap'),
			'alamat' => $this->input->post('alamat'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'id_instansi' => $this->input->post('instansi'),
			'id_akses' => 2
		);
		if ($this->admin_model->add_user($data)) {
			redirect('admin/user_controler');
		}
	}
}
