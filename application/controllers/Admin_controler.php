<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_controler extends CI_Controller
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
		echo "heloo admin";
	}
}
