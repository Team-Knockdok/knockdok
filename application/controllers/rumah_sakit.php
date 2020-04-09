<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class rumah_sakit extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('rumah_sakit_model');
    }
    

    public function index()
    {
        $data['data_rumah_sakit'] = $this->rumah_sakit_model->get_data_rumah_sakit();

        $this->load->view('View File', $data);
    }

}

/* End of file rumah_sakit.php */


