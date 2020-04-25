<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('pesanan_model');
    $this->load->model('transaksi_model');
    $this->load->model('jadwal_model');
  }

  public function index()
  {
    if ($this->session->userdata('logged_in')) {
      $username = $this->session->userdata('username');
      $data['main_view'] = 'pesanan_view';
      $data['daftar_pesanan'] = $this->pesanan_model->get_by_username($username);
      $this->load->view('template', $data);
    } else {
      $this->session->set_flashdata('failed', 'session login telah habis, silahkan login kembali!');
      redirect('auth');
    }
  }

  public function update($id)
  {
    if (!$this->session->userdata('logged_in')) {
      $this->session->set_flashdata('failed', 'session login telah habis, silahkan login kembali!');
      redirect('auth');
    }
    $keluhan = $this->input->post('keluhan');
    if (!$this->pesanan_model->update_keluhan($id, $keluhan)) {
      $this->session->set_flashdata('failed', 'Ubah keluhan gagal. Silahkan coba kembali');
    }
    redirect('pesanan');
  }

  public function checkout()
  {
    if (!$this->session->userdata('logged_in')) {
      $this->session->set_flashdata('failed', 'session login telah habis, silahkan login kembali!');
      redirect('auth');
    }

    $daftar_id_pesanan = $this->input->post('check-pesanan');
    $length_daftar = count($daftar_id_pesanan);
    if ($length_daftar <= 0) {
      $this->session->set_flashdata('failed', 'Tidak ada pesanan yang terpilih');
      redirect('pesanan');
    }

    $id_transaksi = $this->transaksi_model->insert();
    if ($id_transaksi < 0) {
      $this->session->set_flashdata('failed', 'Checkout Gagal! Silahkan Coba Lagi');
      redirect('pesanan');
    }

    if (!$this->pesanan_model->update_id_transaksi($daftar_id_pesanan, $id_transaksi)) {
      $this->session->set_flashdata('failed', 'Checkout Gagal! Silahkan Coba Lagi');
      redirect('pesanan');
    }
    $this->jadwal_model->update_batch_tersedia_by_id_pesanan($daftar_id_pesanan);
    if (!$this->jadwal_model->update_batch_tersedia_by_id_pesanan($daftar_id_pesanan)) {
      $this->session->set_flashdata('failed', 'Checkout Gagal! Silahkan Coba Lagi');
      redirect('pesanan');
    }

    $this->session->set_userdata( 'id_transaksi', $id_transaksi );
    redirect('pembayaran');

  }

}
