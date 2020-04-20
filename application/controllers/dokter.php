<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dokter_model');
	}

	public function profil($id)
	{
		$data['main_view'] = 'profil_dokter_view';
		$data['title'] = 'Dokter';
		$data['dokter'] = $this->dokter_model->getById($id);
		$data['list_rs'] = $this->dokter_model->getRsById($id);
		$this->load->view('template', $data);
	}

}

/* End of file Dokter.php */
