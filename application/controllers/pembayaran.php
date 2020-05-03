<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('transaksi_model');
  }

  public function index()
  {
    if (!$this->session->userdata('logged_in')) {
      $this->session->set_flashdata('failed', 'session login telah habis, silahkan login kembali!');
      redirect('auth');
    }
    // udah login
    $data['main_view'] = 'pembayaran_view';
    $this->load->view('template', $data);
  }

  public function upload_bukti() {
    if (!$this->session->userdata('logged_in')) {
      $this->session->set_flashdata('failed', 'session login telah habis, silahkan login kembali!');
      redirect('auth');
    }

    $config['upload_path'] = './uploads/bukti_pembayaran';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
    $config['max_size']  = '100000';

    $this->load->library('upload', $config);

    if ( !$this->upload->do_upload('bukti-pembayaran')){
      $error = $this->upload->display_errors();
      $this->session->set_flashdata('failed', $error);
      redirect('pembayaran');
    }

    $file_name = $this->upload->data()['file_name'];
    $id_transaksi = $this->session->userdata('id_transaksi');

    if (!$this->transaksi_model->update_bukti_pembayaran($id_transaksi, $file_name)) {
      unlink('./uploads/bukti_pembayaran/'.$file_name);
      $this->session->set_flashdata('failed', 'Upload gagal! Silahkan coba lagi');
      redirect('pembayaran');
    }
    redirect('user/riwayat_transaksi');
  }

  public function update($id_transaksi)
  {
    $status = $this->input->post('status');
    if (!$this->transaksi_model->update_status_bayar($id_transaksi, $status)) {
      echo json_encode('Update failed!');
    }
    echo json_encode(array(
      'status' => 200,
      'data' => $this->transaksi_model->get_by_id($id_transaksi)
    ));
  }

}

/* End of file Pembayaran.php */

?>