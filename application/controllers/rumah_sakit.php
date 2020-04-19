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
        $data['title'] = 'Rumah Sakit';
        $data['main_view'] = 'rumah_sakit_view';
        $this->load->view('template', $data);
    }

    public function insert_data_RS()
    {
        // FORM VALIDATION CONFIGURATION
        $this->form_validation->set_rules('nama_rs', 'Nama Rumah Sakit', 'required|min_length[5]|max_length[30]');
        $this->form_validation->set_rules('alamat', 'Alamat Rumah Sakit', 'required|min_length[10]|max_length[100]');
        $this->form_validation->set_rules('nomor_telepon_rs', 'Nomor Telepon Rumah Sakit', 'required|max_length[12]');
        $this->form_validation->set_rules('gambar_rs', 'Gambar Rumah Sakit', 'required|max_length[30]');
        // END FORM VALIDATION CONFIGURATION

        if ($this->form_validation->run() == TRUE) {

            // UPLOAD CONFIGURATION
            $path = './uploads/rumah_sakit/';
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'jpg|png';
            $config['max_size']  = '10000';

            $this->load->library('upload', $config);
            // END UPLOAD CONFIGURATION

            if ($this->upload->do_upload($this->input->post('gambar_rs')) == TRUE){
                if ($this->rumah_sakit_model->add_hospital($this->upload->data()) == TRUE) {
                    $this->session->set_flashdata('success', 'tambah data rumah sakit berhasil!');
                    redirect('');
                } else {
                    unlink($path.$this->upload->data());
                    $this->session->set_flashdata('failed', 'tambah data rumah sakit gagal! Silahkan coba lagi');
                    redirect('');
                }
            }
            else{
                $this->session->set_flashdata('failed', $this->upload->display_errors());
                redirect('');
            }
        } else {
            $this->session->set_flashdata('failed', validation_errors());
            redirect('');
        }
    }

    public function delete_data_RS($id_rs)
    {
        if ($this->rumah_sakit_model->delete_hospital($id_rs) == TRUE) {
            $this->session->set_flashdata('success', 'Hapus data rumah sakit berhasil!');
            redirect('');
        } else {
            $this->session->set_flashdata('failed', 'Hapus data gagal! Silahkan coba lagi');
            redirect('');
        }

    }

}

/* End of file rumah_sakit.php */


