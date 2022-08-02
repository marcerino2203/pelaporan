<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_proses_controler extends CI_Controller
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
		$data['count'] = $this->admin_model->get_count();
		$this->load->view('admin/laporan_proses/index', $data);
	}
	public function detail($id_instansi)
	{
		$data['laporan'] = $this->admin_model->get_laporan_status($id_instansi, 3);
		$data['instansi'] = $this->admin_model->get_details_instansi($id_instansi);
		$this->load->view('admin/laporan_proses/detail', $data);
	}
	public function detail_laporan($id_aduan)
	{
		$data['laporan_detail'] = $this->admin_model->get_laporan_detail($id_aduan);
		$this->load->view('admin/laporan_proses/detail_laporan', $data);
	}
}
