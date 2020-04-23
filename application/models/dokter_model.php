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

  public function insert_data_dokter($data)
  {
    $this->db->insert('tb_dokter', $data);
    
    if ($this->db->affected_rows() > 0) {
      return TRUE;
    } else {
      return FALSE;
    }
    
  }

}

?>