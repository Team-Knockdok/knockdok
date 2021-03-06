<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan_model extends CI_Model {

  public function get_by_username($username) {
    return $this->db
      ->select('id_pesanan, nama_dokter, nama_rs, keluhan, tanggal_pemesanan, biaya')
      ->where('username', $username)
      ->where('id_transaksi', null)
      ->from('tb_pesanan')
      ->join('tb_jadwal','id_jadwal')
      ->join('tb_dokter','id_dokter')
      ->join('tb_rs','id_rs')
      ->get()
      ->result_array();
  }

  public function get_detail_pemesanan($id_transaksi) {
    return $this->db->select('id_pesanan, nama_dokter, nama_rs, tanggal_pemesanan, biaya')
                    ->from('tb_pesanan')
                    ->join('tb_jadwal', 'tb_jadwal.id_jadwal = tb_pesanan.id_jadwal')
                    ->join('tb_dokter', 'tb_dokter.id_dokter = tb_jadwal.id_dokter')
                    ->join('tb_rs', 'tb_rs.id_rs = tb_jadwal.id_rs')
                    ->where('id_transaksi', $id_transaksi)
                    ->get()
                    ->result();
    
  }

  public function get_keluhan($id) {
    return $this->db
      ->select('keluhan')
      ->where('id_pesanan', $id)
      ->get('tb_pesanan')
      ->row();
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

  public function update_keluhan($id, $keluhan)
  {
    $data_pesanan = array(
      'keluhan' => $keluhan
    );
    return $this->db
      ->where_in('id_pesanan', $id)
      ->update('tb_pesanan', $data_pesanan);
  }

}
?>