<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_controler extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
	}
	public function index()
	{
		$data['laporan'] = $this->dashboard_model->get_laporan($this->session->userdata('id'));
		$data['last_code'] = $this->dashboard_model->get_code();
		$this->load->view('dashboard/index', $data);
	}
	public function detail($id)
	{
		$data['laporan'] = $this->dashboard_model->get_detail_laporan($id);
		$data['status'] = $this->dashboard_model->get_status_laporan($id);
		$this->load->view('dashboard/detail', $data);
	}
	public function buat_laporan()
	{
		$data = array(
			'nomor_aduan' => $this->input->post('nomor_aduan'),
			'tanggal' => date('Y-m-d'),
			'id_masyarakat' => $this->session->userdata('id'),
			'lokasi' => $this->input->post('lokasi'),
			'isi' => $this->input->post('keterangan')
		);
		if ($this->dashboard_model->add_laporan($data)) {
			redirect('dashboard_controler');
		}
	}
	public function hapus_laporan($id)
	{
		if ($this->dashboard_model->delete_laporan($id)) {
			redirect('dashboard_controler');
		}
	}
}
