<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dokter_model extends CI_Model {

  public function get() {
    return $this->db->get('tb_dokter')
                    ->result_array();
  }

}

?>