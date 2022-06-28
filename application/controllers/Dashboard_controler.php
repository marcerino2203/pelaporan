<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_controler extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
		if ($this->session->userdata('akses') != "warga" && $this->session->userdata('akses') != "master") {
			redirect('login_controler');
		};
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
		date_default_timezone_set('Asia/Jakarta');
		$data['aduan'] = array(
			'nomor_aduan' => $this->input->post('nomor_aduan'),
			'tanggal' => date('Y-m-d'),
			'id_masyarakat' => $this->session->userdata('id'),
			'lokasi' => $this->input->post('lokasi'),
			'isi' => $this->input->post('keterangan')
		);
		$gambar = $_FILES['gambar'];
		if ($gambar='') {} else {
			$config['upload_path'] = './assets/gambar';
			$config['allowed_types'] = 'jpg|png|jpeg';

			$this->load->library('upload',$config);
			if (!$this->upload->do_upload('gambar')) {
				echo "Upload Gagal"; die();
			}else{
				$gambar=$this->upload->data('file_name');
			}
		}
		$data['gambar'] = array (
			'gambar' => $gambar
		);
		$data['status'] = array(
			'tanggal' => date('Y-m-d'),
			'id_keterangan_status' => 1,
			'waktu' => date("H:i")
		);
		if ($this->dashboard_model->add_laporan($data)) {
			redirect('dashboard_controler');
		}
	}
	public function hapus_laporan($id)
	{
		if ($this->dashboard_model->delete_laporan($id)) {
			redirect('dashboard_controler');
		} else {
			redirect('dashboard_controler');
		}
	}
}
