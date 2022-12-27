<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_controler extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('aduanlist_nonlog_model');
	}
	public function index()
	{
		$this->load->view('aduanlist/index.php');
	}

}