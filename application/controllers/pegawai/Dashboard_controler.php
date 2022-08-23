<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_controler extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_pegawai_model');
		if ($this->session->userdata('akses') != "pegawai" && $this->session->userdata('akses') != "admin") {
			redirect('login_controler');
		};
	}
	public function index()
	{
		$data['laporan'] = $this->dashboard_pegawai_model->get_laporan($this->session->userdata('id'));
		$this->load->view('pegawai/aduan_masuk/index', $data);
	}
	public function detail($id)
	{
		$data['status'] = array(
			'tanggal' => date('Y-m-d'),
			'id_keterangan_status' => 1,
			'waktu' => date("H:i"),
			'id_keterangan_aduan' => '2'
		);
		$data['id_aduan'] = array(
			'aduan.id_aduan' => $id
		);

		$data['laporan'] = $this->dashboard_pegawai_model->get_detail_laporan($data);
		$data['status'] = $this->dashboard_pegawai_model->get_status_laporan($data);
		$this->load->view('pegawai/aduan_masuk/detail', $data);
	}
	public function proses($id)
	{
		date_default_timezone_set('Asia/Jakarta');
		$data['status'] = array(
			'tanggal' => date('Y-m-d'),
			'id_keterangan_status' => 1,
			'waktu' => date("H:i"),
			'id_keterangan_status' => '3',
			'id_aduan' => $id
		);
		$data['new_status'] = array(
			'id_keterangan_status' => 3
		);





		$data['status'] = $this->dashboard_pegawai_model->proses($data, $id);
		// $this->load->view('dashboard_pegawai/index');
		redirect('pegawai/dashboard_controler');
	}
	// public function hapus_laporan($id)
	// {
	// 	if ($this->dashboard_model->delete_laporan($id)) {
	// 		redirect('dashboard_controler');
	// 	} else {
	// 		redirect('dashboard_controler');
	// 	}
	// }
}
