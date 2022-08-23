<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun_controler extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('akses') != "warga" && $this->session->userdata('akses') != "master") {
			redirect('login_controler');
		};
	}
	public function index()
	{
		$this->load->view('warga/akun/index');
	}
}
