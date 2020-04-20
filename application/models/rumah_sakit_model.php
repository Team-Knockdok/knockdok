<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class rumah_sakit_model extends CI_Model {

    public function get()
    {
        return $this->db->get('tb_rs')->result_array();
    }

    public function getById($id)
    {
        return $this->db->where('id_RS', $id)
                        ->get('tb_rs')->row();
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

    public function delete_hospital($id)
    {
        $data = array('delete_status' => 'true');

        $this->db->where('id_rs', $id)->update('tb_rs', $data);

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

/* End of file rumah_sakit_model.php */
