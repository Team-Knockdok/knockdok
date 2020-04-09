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
		$this->load->view('View File', $data);
	}

	public function send_register()
	{
		if ($this->auth_model->register() == TRUE) {
			
		} else {
			# code...
		}
		
	}

	public function login()
	{
		if ($this->auth_model->login_auth() == TRUE) {
			$this->session->set_flashdata('success', 'Login Berhasil! Welcome '.$this->session->userdata('nama_user');
			);
			redirect('');
		} else {
			$this->session->set_flashdata('failed', 'Login Gagal! Silahkan Coba Lagi');
			redirect('index');
		}
		
	}

	public function logout()
	{
		
		$this->session->sess_destroy();
	}

}

/* End of file Auth.php */
