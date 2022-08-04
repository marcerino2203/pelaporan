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
	public function detail($id_user, $id_akses)
	{
		$data['detail_user'] = $this->admin_model->get_user_details($id_user, $id_akses);
		$data['id_akses'] = $id_akses;
		$this->load->view('admin/user/detail', $data);
	}
	public function edit($id_user, $id_akses)
	{
		$data['detail_user'] = $this->admin_model->get_user_details($id_user, $id_akses);
		$data['instansi'] = $this->admin_model->get_instansi();
		$data['akses'] = $this->admin_model->get_akses();
		$data['id_akses'] = $id_akses;
		$this->load->view('admin/user/edit', $data);
	}
	public function edit_user($form)
	{
		if ($form == 1) {
			$data['data_pegawai'] = array(
				'no_pegawai' => $this->input->post('nomor_pegawai'),
				'nama' => $this->input->post('nama_lengkap'),
				'alamat' => $this->input->post('alamat'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'id_instansi' => $this->input->post('instansi')
			);
			$data['id_pegawai'] = array(
				'id_pegawai' => $this->input->post('id_pegawai')
			);
			if ($this->admin_model->edit_user($data)) {
				redirect('admin/user_controler/edit/' . $this->input->post('id_pegawai') . '/' . $this->input->post('id_akses'));
			}
		} else if ($form == 2) {
			$data['data_pegawai'] = array(
				'id_akses' => $this->input->post('akses')
			);
			$data['id_pegawai'] = array(
				'id_pegawai' => $this->input->post('id_pegawai')
			);

			if ($this->admin_model->edit_user($data)) {
				redirect('admin/user_controler/edit/' . $this->input->post('id_pegawai') . '/' . $this->input->post('akses'));
			}
		}
	}
}
