<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_model extends CI_Model {

  public function get_by_id($id)
  {
    return $this->db
      ->select('nama_dokter, nama_rs, waktu_mulai, estimasi_durasi, biaya')
      ->where('id_jadwal', $id)
      ->from('tb_jadwal')
      ->join('tb_dokter', 'id_dokter')
      ->join('tb_rs', 'id_rs')
      ->get()
      ->row();
  }

  public function get_tersedia($id_dokter)
  {
    $condition = array(
      'id_dokter' => $id_dokter,
      'tersedia' => true
    );
    return $this->db
      ->select('id_jadwal, nama_rs, waktu_mulai, estimasi_durasi')
      ->from('tb_jadwal')
      ->join('tb_rs', 'id_rs')
      ->where($condition)
      ->get()
      ->result();
  }

  public function update_batch_tersedia_by_id_pesanan($daftar_id_pesanan)
  {
    $data = array( 'tersedia' => false );
    $subquery = $this->db
      ->where_in('id_pesanan',$daftar_id_pesanan)
      ->select('id_jadwal')
      ->get('tb_pesanan')
      ->result_array();

    $daftar_id_jadwal = [];
    foreach($subquery as $row) {
      array_push($daftar_id_jadwal, $row['id_jadwal']);
    }

    return $this->db
      ->where_in('id_jadwal', $daftar_id_jadwal)
      ->update('tb_jadwal', $data);
  }

}

/* End of file Jadwal_model.php */

?>