<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function get_data_user($username)
    {
        return $this->db->where('username', $username)
                        ->get('tb_user')
                        ->row();
        
    }

    public function get_data_riwayat_by_username($username)
    {
        return $this->db
            ->select('nama_dokter, nama_rs, waktu_transaksi, rincian_biaya, keluhan')
            ->from('tb_pesanan')
            ->join('tb_transaksi', 'id_transaksi')
            ->join('tb_jadwal', 'id_jadwal')
            ->join('tb_dokter', 'id_dokter')
            ->join('tb_rs', 'id_rs')
            // ->join('tb_user', 'username')
            ->where('tb_pesanan.username', $username)
            ->get()
            ->result_array();
    }

    public function edit_data_profile($data, $username)
    {
        $this->db->where('username', $username)->update('tb_user', $data);
        
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

/* End of file User_model.php */
