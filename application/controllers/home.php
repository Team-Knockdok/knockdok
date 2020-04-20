<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    

    public function index()
    {
        $data['main_view'] = 'home_view';
        $data['title'] = 'Home';
        $this->load->view('template', $data);
    }

    public function bantuan()
    {
        if ($this->session->userdata('logged_in') == TRUE) {
            $data['main_view'] = 'bantuan_view';
            $data['title'] = 'Bantuan';
            $this->load->view('template', $data);
        } else {
            $this->session->set_flashdata('failed', 'session login telah habis, silahkan login kembali!');
            redirect('auth');
        }
    }

}

/* End of file Home.php */
