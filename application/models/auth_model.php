<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class auth_model extends CI_Model {

    public function register()
    {
        $data = array(
            'nama_depan' => $this->input->post('nama_depan'),
            'nama_belakang' => $this->input->post('nama_belakang'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'), 
            'alamat' => $this->input->post('alamat'), 
            'email' => $this->input->post('email'), 
            'nomor_telepon' => $this->input->post('nomor_telepon') 
        );

        $this->db->insert('tb_user', $data);

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
        
        
    }

    public function login_auth()
    {
        // $username = $this->input->post('username');
        // $password = $this->input->post('password');

        // $query = $this->db->where('username', $username)
        //                     ->where('password', $password)
        //                     ;
        
        
        
    }

}

/* End of file auth_model.php */
