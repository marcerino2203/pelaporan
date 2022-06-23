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
		$this->load->view('home/index');
	}
	public function cek_log()
	{
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
		$status = $this->login_model->cek_login($data);
		if ($status != FALSE) {
			foreach ($status as $apps) {
				$session_data = array(
					'id' => $apps->id_masyarakat,
					'akses' => $apps->nama
				);
				$this->session->set_userdata($session_data);
			}
			// print_r($session_data);
			redirect('dashboard_controler');
		} else {
			redirect('home_controler');
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
