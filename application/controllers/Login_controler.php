<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controler extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('login_model');
    }
	public function index()
	{
		$this->load->view('login_view');
	}
}
