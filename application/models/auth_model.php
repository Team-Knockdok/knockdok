<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class auth_model extends CI_Model {

    public function register($file)
    {
        $data = array(
            'nama_depan' => $this->input->post('nama_depan'),
            'nama_belakang' => $this->input->post('nama_belakang'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'nomor_telepon' => $this->input->post('nomor_telepon'),
            'foto_profil' => $file
        );

        $this->db->insert('tb_user', $data);

        return ($this->db->affected_rows() > 0);

    }

    public function login_auth()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $query = $this->db->where('username', $username)
                            ->where('password', $password)
                            ->get('tb_user');

        if ($this->db->affected_rows() > 0) {
            $data = $query->row_array();


            $session = array(
                'logged_in' => 'true',
                'nama_user' => $data['nama_depan'].' '.$data['nama_belakang'],
                'username' => $data['username'],
                'foto_profil' => $data['foto_profil']
            );

            $this->session->set_userdata( $session );

            return TRUE;
        } else {
            return FALSE;
        }
    }
}

/* End of file auth_model.php */
