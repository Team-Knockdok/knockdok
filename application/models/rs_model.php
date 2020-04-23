<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Rs_model extends CI_Model {

    public function get()
    {
        return $this->db->where('delete_status', 'false')
                        ->get('tb_rs')
                        ->result_array();
    }

    public function getById($id)
    {
        return $this->db->where('id_rs', $id)
                        ->get('tb_rs')
                        ->row_array();
    }

    public function getDokterById($id)
    {
        return $this->db
            ->where('id_rs', $id)
            ->select('tb_dokter.*')
            ->from('tb_rs')
            ->join('tb_pivot_dokter_rs', 'id_rs', 'outer left')
            ->join('tb_dokter', 'id_dokter')
            ->get()
            ->result_array();
    }

    public function add_hospital($file)
    {
        $data = array(
            'nama_RS' => $this->input->post('nama_rs'),
            'nomor_Telepon_RS' => $this->input->post('nomor_telepon'),
            'alamat_RS' => $this->input->post('alamat'),
            'foto_RS' => $file['file_name'],
            'delete_status' => 'false'
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
