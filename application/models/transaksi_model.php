<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Transaksi_model extends CI_Model {

    public function insert()
    {
      $data = array(
        'status_bayar' => 'pending'
      );
      $this->db->insert('tb_transaksi', $data);
      if ( $this->db->affected_rows() <= 0 )
        return -1; // Insert into tb_transaksi gagal, return id -1 which imposible number of id
      return $this->db->insert_id();
    }

    public function update_bukti_pembayaran($id, $file_name)
    {
      $data = array(
        'bukti_pembayaran' => $file_name
      );
      return $this->db
        ->where('id_transaksi', $id)
        ->update('tb_transaksi', $data);

    }

  }

  /* End of file ModelName.php */

?>