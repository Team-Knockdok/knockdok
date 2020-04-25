<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('pesanan_model');
    $this->load->model('transaksi_model');
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

  public function checkout()
  {
    if ($this->session->userdata('logged_in')) {
      $daftar_id_pesanan = $this->input->post('check-pesanan');
      $length_daftar = count($daftar_id_pesanan);
      if ($length_daftar <= 0) {
        $this->session->set_flashdata('failed', 'Tidak ada pesanan yang terpilih');
				redirect('pesanan');
      }
      $biaya = $length_daftar * 45000;
      $data_transaksi = array (
        'rincian_biaya' => $biaya
      );
      $id_transaksi = $this->transaksi_model->insert($data_transaksi);
      if ($id_transaksi < 0) {
        $this->session->set_flashdata('failed', 'Checkout Gagal! Silahkan Coba Lagi');
				redirect('pesanan');
      }

      if ($this->pesanan_model->update_id_transaksi($daftar_id_pesanan, $id_transaksi)) {

        $this->session->set_userdata( 'id_transaksi', $id_transaksi );

        $this->session->set_flashdata('success', 'Silahkan lakukan pembayaran');
				redirect('pembayaran');
      }

    } else {
      $this->session->set_flashdata('failed', 'session login telah habis, silahkan login kembali!');
      redirect('auth');
    }
  }

}
