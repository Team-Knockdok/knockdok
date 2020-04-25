<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan_model extends CI_Model {

  public function get_by_username($username) {
    return $this->db
      ->select('id_pesanan, nama_dokter, nama_rs, keluhan, tanggal_pemesanan')
      ->where('username', $username)
      ->where('id_transaksi', null)
      ->from('tb_pesanan')
      ->join('tb_jadwal','id_jadwal')
      ->join('tb_dokter','id_dokter')
      ->join('tb_rs','id_rs')
      ->get()
      ->result_array();
  }

  public function insert($data) {
    $this->db->insert('tb_pesanan', $data);
    return ($this->db->affected_rows() > 0);
  }

  public function update_id_transaksi($daftar_id, $id_transaksi)
  {
    $data_pesanan = array(
      'id_transaksi' => $id_transaksi
    );
    $this->db
      ->where_in('id_pesanan', $daftar_id)
      ->update('tb_pesanan', $data_pesanan);

    return ($this->db->affected_rows() > 0);
  }

}
?>