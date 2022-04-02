<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controler extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('login_model');
    }
	public function index()
	{
		$this->load->view('home/index');
	}
	public function cek_log()
	{
		$data=array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);
		if($this->login_model->cek_login($data)){
			redirect('dashboard_controler');
		}else{
			redirect('home_controler');
		}
	}
}
