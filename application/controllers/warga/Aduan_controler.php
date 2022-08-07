<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aduan_controler extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('warga_model');
		if ($this->session->userdata('akses') != "warga" && $this->session->userdata('akses') != "master") {
			redirect('login_controler');
		};
	}
	public function index()
	{
		$data['laporan'] = $this->warga_model->get_laporan($this->session->userdata('id'));
		$data['last_code'] = $this->warga_model->get_code();
		$data['jenis_aduan'] = $this->warga_model->get_jenis_aduan();
		$this->load->view('warga/aduan/index', $data);
	}
	public function detail($id)
	{
		$data['laporan'] = $this->warga_model->get_detail_laporan($id);
		$data['status'] = $this->warga_model->get_status_laporan($id);
		$this->load->view('warga/aduan/detail', $data);
	}
	public function edit($id)
	{
		$data['laporan'] = $this->warga_model->get_detail_laporan($id);
		$data['status'] = $this->warga_model->get_status_laporan($id);
		$this->load->view('warga/aduan/edit', $data);
	}
	public function buat_laporan()
	{
		date_default_timezone_set('Asia/Jakarta');
		$data['aduan'] = array(
			'nomor_aduan' => $this->input->post('nomor_aduan'),
			'tanggal' => date('Y-m-d'),
			'id_masyarakat' => $this->session->userdata('id'),
			'lokasi' => $this->input->post('lokasi'),
			'isi' => $this->input->post('keterangan'),
			'id_jenis_aduan' => $this->input->post('jenis_aduan'),
			'id_keterangan_status' => 1
		);
		$data['status'] = array(
			'tanggal' => date('Y-m-d'),
			'id_keterangan_status' => 1,
			'waktu' => date("H:i")
		);
		if ($this->warga_model->add_laporan($data)) {
			redirect('warga/aduan_controler');
		}
	}
	public function hapus_laporan($id)
	{
		if ($this->warga_model->delete_laporan($id)) {
			redirect('warga/aduan_controler');
		} else {
			redirect('warga/aduan_controler');
		}
	}
}
