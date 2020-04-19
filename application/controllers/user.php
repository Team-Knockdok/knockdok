<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }
    

    public function index()
    {
        if ($this->session->userdata('logged_in') == TRUE) {
            # code...
        } else {
            $this->session->set_flashdata('failed', 'session login telah habis, silahkan login kembali!');
            redirect('auth');
        }
    }

    public function riwayat()
    {
        if ($this->session->userdata('logged_in') == TRUE) {
            $data['main_view'] = 'riwayat_view';
            $data['data_riwayat'] = $this->user_model->get_data_riwayat();
            $this->load->view('template', $data);
        } else {
            $this->session->set_flashdata('failed', 'session login telah habis, silahkan login kembali!');
            redirect('auth');
        }
    }

}

/* End of file User.php */
