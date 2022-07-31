<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_controler extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}
	public function index()
	{
		// $this->load->view('home/index');
		// redirect('home_controler');
		if ($this->session->userdata('akses') == "warga") {
			redirect('dashboard_controler');
		} else if ($this->session->userdata('akses') == "pegawai") {
			redirect('dashboard_pegawai_controler');
		} else if ($this->session->userdata('akses') == "admin") {
			redirect('dashboard_pegawai_controler');
		} else {
			redirect('home_controler');
		};
	}
	public function cek_log()
	{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
		$status = $this->login_model->cek_login_masyarakat($data);
		if ($status != FALSE) {
			foreach ($status as $apps) {
				$session_data = array(
					'id' => $apps->id_masyarakat,
					'akses' => $apps->akses
				);
				$this->session->set_userdata($session_data);
			}
			// print_r($session_data);
			redirect('dashboard_controler');
		} else {
			$status = $this->login_model->cek_login_pegawai($data);
			if ($status != FALSE) {
				foreach ($status as $apps) {
					$session_data = array(
						'id' => $apps->id_pegawai,
						'akses' => $apps->akses,
						'instansi' => $apps->id_instansi
					);
					$this->session->set_userdata($session_data);
				}
				if ($session_data['akses'] == 'admin') {
					redirect('admin_controler');
				} else {
					redirect('dashboard_pegawai_controler');
				}
			} else {
				redirect('home_controler');
			}
		}
		///////////////////////////////////
		// if($status!=FALSE){
		//     foreach($status as $apps){
		//         $session_data = array(
		//             'nama'=>$apps->nama,
		// 			'akses'=>$apps->akses
		// 		);
		//         $this->session->set_userdata($session_data);
		//     }
		// 	echo $this->session->userdata('akses');
		// 	if($this->session->userdata('akses')=="admin"){
		// 		redirect("dashboard_controler");
		// 	}else if($this->session->userdata('akses')=="kasir"){
		// 		redirect("kasir_controler");
		// 	}
		// }else{
		//     $this->index();
		// }
	}
	public function log_out()
	{
		$this->session->sess_destroy();
		redirect('home_controler');
	}
}
