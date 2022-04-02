<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_controler extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('dashboard_model');
    }
	public function index()
	{
		$this->load->view('dashboard/index');
	}
	public function detail(){
		$this->load->view('dashboard/detail');
	}
}
