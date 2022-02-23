<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_controler extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// $this->load->model('home_model');
    }
	public function index()
	{
		$this->load->view('home/index');
	}
}
