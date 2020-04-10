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
		$data['main_view'] = 'login_view';
		$this->load->view('template', $data);
	}

	public function register()
	{
		$data['main_view'] = 'register_view';
		$this->load->view('template', $data);
	}

	public function send_register()
	{
		// FORM VALIDATION
		$this->form_validation->set_rules('nama_depan', 'Nama depan', 'required|min_length[5]|max_length[15]');
		$this->form_validation->set_rules('nama_belakang', 'Nama belakang', 'required|max_length[15]');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[20]|is_unique[tb_user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[30]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[10]|max_length[100]');
		$this->form_validation->set_rules('email', 'Email', 'required|max_length[35]|valid_email');
		$this->form_validation->set_rules('nomor_telepon', 'Nomor telepon', 'required|min_length[12]|max_length[12]');
		$this->form_validation->set_rules('user_image', 'Foto profil', 'required|max_length[40]');
		// END FORM VALIDATION

		// if inputed password is same with re-password
		if ($this->input->post('password') == $this->input->post('re_password')) {

			// if form validation success
			if ($this->form_validation->run() == TRUE) {

				// UPLOAD CONFIGURATION
				$path = './uploads/users/';
				$config['upload_path'] = $path;
				$config['allowed_types'] = 'jpg|png';
				$config['max_size']  = '10000';
				
				$this->load->library('upload', $config);
				// END UPLOAD CONFIGURATION
				
				// if doing upload file is success
				if ($this->upload->do_upload($this->input->post('user_image')) == TRUE){

					// if function register() at auth_model return TRUE
					if ($this->auth_model->register($this->upload->data()) == TRUE) {
						$this->session->set_flashdata('success', 'Registrasi Berhasil!');
						redirect('auth');
					} else {
						$this->session->set_flashdata('failed', 'Registrasi Gagal! Silahkan Coba Lagi');
						redirect('auth/register');
					}

				} else{
					unlink($path.$this->upload->data()); // remove uploaded file cuz at register() function error
					$this->session->set_flashdata('failed', $this->upload->display_errors());
					redirect('auth/register');
				}	

			} else {
				$this->session->set_flashdata('failed', validation_errors());
				redirect('auth/register');
			}	

		} else {
			$this->session->set_flashdata('failed', 'Password yang diinputkan tidak sama! Silahkan coba lagi');
			redirect('auth/register');
		}
	}

	public function login()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			// redirect('');
			echo 'lu udah login cuy';
		} else {
			if ($this->auth_model->login_auth() == TRUE) {
				// $this->session->set_flashdata('success', 'Login Berhasil! Selamat Datang '.$this->session->userdata('nama_user'));
				// redirect('');
				echo 'Login Berhasil! Selamat Datang '.$this->session->userdata('nama_user');
			} else {
				$this->session->set_flashdata('failed', 'Login Gagal! Silahkan Coba Lagi');
				redirect('auth');
			}	
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}

}

/* End of file Auth.php */
