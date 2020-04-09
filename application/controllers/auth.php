<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
	}
	

	public function index()
	{
		
	}

	public function send_register()
	{
		if ($this->auth_model->register() == TRUE) {
			
		} else {
			# code...
		}
		
	}

	public function logout()
	{
		
		$this->session->sess_destroy();
	}

}

/* End of file Auth.php */
