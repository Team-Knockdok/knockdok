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
		$data['main_view'] = 'dokter_view';
		$data['title'] = 'Dokter';
		$data['list_dokter'] = $this->dokter_model->get();
		$this->load->view('template', $data);
	}

}

/* End of file Dokter.php */
