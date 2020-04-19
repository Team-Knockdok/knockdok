<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('dokter_model');
	}


	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$this->session->set_flashdata('failed', 'Anda sudah Login! <b>'.$this->session->userdata('nama_user').'</b>');
			redirect('home');
		} else {
			$data['main_view'] = 'dokter_view';
			$data['title'] = 'Dokter';
			$data['list_dokter'] = $this->dokter_model->get();
			$this->load->view('template', $data);
		}
	}

}

/* End of file Dokter.php */
