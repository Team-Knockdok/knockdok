<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dokter_model extends CI_Model {

  public function get() {
    return $this->db->get('tb_dokter')->result_array();
  }

  public function getById($id) {
    return $this->db
      ->where('id_dokter', $id)
      ->get('tb_dokter')
      ->row_array();
  }

  public function getRsById($id) {
    return $this->db
      ->select('tb_rs.*')
      ->where('id_dokter', $id)
      ->from('tb_dokter')
      ->join('tb_pivot_dokter_rs', 'id_dokter', 'left outer')
      ->join('tb_rs', 'id_rs')
      ->get()
      ->result_array();
  }

  public function get_schedule($id_dokter)
  {
    return $this->db->select('id_jadwal, nama_rs, waktu_mulai, estimasi_durasi')
                    ->from('tb_jadwal')
                    ->join('tb_rs', 'id_rs')
                    ->join('tb_dokter', 'id_dokter')
                    ->where('tb_jadwal.id_dokter', $id_dokter)
                    ->where('tb_jadwal.delete_status', 'false')
                    ->where('tb_rs.delete_status', 'false')
                    ->get()
                    ->result();
  }

  public function get_pesanan_by_id($id_jadwal, $username)
  {
    return $this->db->where('id_jadwal', $id_jadwal)
                  ->where('username', $username)
                  ->where('tanggal_pemesanan', date('Y-m-d'))
                  ->get('tb_pesanan')
                  ->row_array();
  }

  public function add_data_pesanan($data)
  {
    $this->db->insert('tb_pesanan', $data);

    if ($this->db->affected_rows() > 0) {
      return TRUE;
    } else {
      return FALSE;
    }

  }

  public function add_data_transaksi($data)
  {
    $this->db->insert('tb_transaksi', $data);

    if ($this->db->affected_rows() > 0) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function delete_data_pemesanan($id)
  {
    $this->db->where('id_pemesanan', $id)
            ->delete('tb_pesanan');

    if ($this->db->affected_rows() > 0) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function get_schedule_by_id($id_jadwal)
  {
    return $this->db->select('id_jadwal, nama_rs, nama_dokter, waktu_mulai, estimasi_durasi')
                    ->from('tb_jadwal')
                    ->join('tb_rs', 'id_rs')
                    ->join('tb_dokter', 'id_dokter')
                    ->where('id_jadwal', $id_jadwal)
                    ->where('tb_jadwal.delete_status', 'false')
                    ->where('tb_rs.delete_status', 'false')
                    ->get()
                    ->row();
  }

  public function insert_data_dokter($data)
  {
    $this->db->insert('tb_dokter', $data);

    if ($this->db->affected_rows() > 0) {
      return TRUE;
    } else {
      return FALSE;
    }

  }

  public function delete_data_dokter($id_dokter) {

    $this->db->where('id_dokter', $id_dokter)->delete('tb_dokter');

    if ($this->db->affected_rows() > 0) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function daftar_rs($data)
  {
    $this->db->insert('tb_pivot_dokter_rs', $data);

    if ($this->db->affected_rows() > 0) {
      return TRUE;
    } else {
      return FALSE;
    }

  }

  public function add_schedule($data)
  {
    $this->db->insert('tb_jadwal', $data);

    if ($this->db->affected_rows() > 0) {
      return TRUE;
    } else {
      return FALSE;
    }

  }

}

?>