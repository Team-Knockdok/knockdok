<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class rumah_sakit_model extends CI_Model {

    public function get_data_rumah_sakit()
    {
        return $this->db->get('tb_rs')
                        ->result();
    }

}

/* End of file rumah_sakit_model.php */
