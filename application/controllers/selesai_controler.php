<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Selesai_controler extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('selesai_pegawai_model');
		if ($this->session->userdata('akses') != "pegawai" && $this->session->userdata('akses') != "admin") {
			redirect('login_controler');
		};
	}
	public function index()
	{
		$data['laporan'] = $this->selesai_pegawai_model->get_laporan($this->session->userdata('id'));
		$this->load->view('selesai_pegawai/index', $data);
	}
	public function detail($id)
	{
		$data['status'] = array(
			'tanggal' => date('Y-m-d'),
			'id_keterangan_status' => 1,
			'waktu' => date("H:i"),
			'id_keterangan_aduan' => '4'
		);
		$data['id_aduan'] = array(
			'aduan.id_aduan' => $id
		);
		$data['laporan'] = $this->selesai_pegawai_model->get_detail_laporan($data);
		$data['status'] = $this->selesai_pegawai_model->get_status_laporan($data);
		$this->load->view('selesai_pegawai/detail', $data);
	}
	public function laporan_selesai($id)
	{
		date_default_timezone_set('Asia/Jakarta');
		$data['status'] = array(
			'tanggal' => date('Y-m-d'),
			'id_keterangan_status' => 1,
			'waktu' => date("H:i"),
			'id_keterangan_status' => '4',
			'id_aduan' => $id
		);
		$data['new_status'] = array(
			'id_keterangan_status' => 4
		);
		$data['status'] = $this->selesai_pegawai_model->selesai($data, $id);
		// $this->load->view('dashboard_pegawai/index');
		redirect('proses_controler');
	}
}
