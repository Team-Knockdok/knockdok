<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class rumah_sakit_model extends CI_Model {

    public function get_data_rumah_sakit()
    {
        return $this->db->get('tb_rs')
                        ->result();
    }

    public function get_data_rumah_sakit_by_id($id)
    {
        return $this->db->where('id_RS', $id)
                        ->get()->row();
    }

    public function add_hospital($file)
    {
        $data = array(
            'nama_RS' => $this->input->post('nama_rs'),
            'nomor_Telepon_RS' => $this->input->post('nomor_Telepon'),
            'alamat_RS' => $this->input->post('alamat'),
            'gambar_RS' => $file
        );

        $this->db->insert('tb_rs', $data);
        
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

/* End of file rumah_sakit_model.php */
