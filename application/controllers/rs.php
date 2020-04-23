<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RS extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('rs_model');
    }

    public function profil($id)
    {
        $data['main_view'] = 'profil_rs_view';
        $data['rs'] = $this->rs_model->getById($id);
        $data['list_dokter'] = $this->rs_model->getDokterById($id);
        $this->load->view('template', $data);
    }

    public function insert_data_RS()
    {
        // FORM VALIDATION CONFIGURATION
        $this->form_validation->set_rules('nama_rs', 'Nama Rumah Sakit', 'required|min_length[5]|max_length[30]');
        $this->form_validation->set_rules('alamat', 'Alamat Rumah Sakit', 'required|min_length[10]|max_length[100]');
        $this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon Rumah Sakit', 'required|max_length[12]');
        // END FORM VALIDATION CONFIGURATION

        if ($this->form_validation->run() == TRUE) {

            // UPLOAD CONFIGURATION
            $path = './uploads/rs/';
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'jpg|png';
            $config['max_size']  = '10000';

            $this->load->library('upload', $config);
            // END UPLOAD CONFIGURATION

            if ($this->upload->do_upload('gambar_rs') == TRUE){
                if ($this->rs_model->add_hospital($this->upload->data()) == TRUE) {
                    // activate this if you have the view to show this notification
                    // $this->session->set_flashdata('success', 'tambah data rumah sakit berhasil!');

                    // redirect('');
                    echo json_encode('POST Success');
                } else {
                    unlink($path.$this->upload->data()['file_name']);
                    // activate this if you have the view to show this notification
                    // $this->session->set_flashdata('failed', 'tambah data rumah sakit gagal! Silahkan coba lagi');

                    // redirect('');
                    echo json_encode('POST failed');
                }
            }
            else{
                // activate this if you have the view to show this notification
                // $this->session->set_flashdata('failed', $this->upload->display_errors());
                // redirect('');

                // unactivate this if you already have the view
                echo json_encode($this->upload->display_errors());
            }
        } else {
            // activate this if you have the view to show this notification
            // $this->session->set_flashdata('failed', validation_errors());
            // redirect('');

            // unactivate this if you already have the view
            echo json_encode(validation_errors());
        }
    }

    // public function delete_data_RS($id_rs)
    // {
    //     if ($this->rumah_sakit_model->delete_hospital($id_rs) == TRUE) {
    //         $this->session->set_flashdata('success', 'Hapus data rumah sakit berhasil!');
    //         redirect('');
    //     } else {
    //         $this->session->set_flashdata('failed', 'Hapus data gagal! Silahkan coba lagi');
    //         redirect('');
    //     }

    // }

}

/* End of file rumah_sakit.php */


