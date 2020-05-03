<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cari extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('dokter_model');
    $this->load->model('rs_model');
  }

  public function index() {
    $data['title'] = 'Penelusuran';
    $data['main_view'] = 'cari_view';
    $data['query'] = array(
      "list_dokter" => $this->dokter_model->get(),
      "list_rs"     => $this->rs_model->get()
    );
    $keyword = $this->input->get('q');
    if ($keyword != '') {
      $data['query']['list_dokter'] = $this->dokter_model->search($keyword);
      $data['query']['list_rs'] = $this->rs_model->search($keyword);
    }
    $this->load->view('template', $data);
  }

}

?>