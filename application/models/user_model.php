<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function get_data_riwayat()
    {
        return $this->db->select('nama_dokter, nama_RS, waktu_transaksi, rincian_biaya')
                        ->from('tb_transaksi')
                        ->join('tb_jadwal', 'tb_jadwal.id_jadwal = tb_transaksi.id_jadwal')
                        ->join('tb_dokter', 'tb_dokter.id_dokter = tb_jadwal.id_dokter')
                        ->join('tb_dokter', 'tb_rs.id_RS = tb_jadwal.id_RS')
                        ->where('tb_transaksi.delete_status', 'false')
                        ->where('username', $this->session->userdata('username'))
                        ->get()
                        ->result();
    }

}

/* End of file User_model.php */
