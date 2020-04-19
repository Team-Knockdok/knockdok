<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cari extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('dokter_model');
    $this->load->model('rumah_sakit_model');
  }

  public function index() {
    $data['title'] = 'Penelusuran';
    $data['main_view'] = 'cari_view';
    $data['query'] = array(
      "list_dokter" => $this->dokter_model->get(),
      "list_rs"     => $this->rumah_sakit_model->get()
    );
    $this->load->view('template', $data);
  }

}

?>