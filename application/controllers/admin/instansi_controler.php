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
	public function register_instansi()
	{
		$this->load->view('admin/instansi/register_instansi');
	}
	public function add_instansi()
	{
		$data['data_instansi'] = array(
			'nama' => $this->input->post('nama_instansi'),
			'telp' => $this->input->post('Telepon'),
			'alamat' => $this->input->post('alamat')
		);
		if ($this->admin_model->add_instansi($data)) {
			redirect('admin/instansi_controler');
		}
	}
}
