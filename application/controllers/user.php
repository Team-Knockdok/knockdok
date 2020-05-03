<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function set_session_transaksi($id_transaksi)
    { 
        $this->session->set_userdata('id_transaksi', $id_transaksi );
        return;
    }


    public function index()
    {
        if ($this->session->userdata('logged_in') == TRUE) {
            $username = $this->session->userdata('username');
            $data['main_view'] = 'user_profil_view';
            $data['data_user'] = $this->user_model->get_data_user($username);
            $this->load->view('template', $data);
        } else {
            $this->session->set_flashdata('failed', 'session login telah habis, silahkan login kembali!');
            redirect('auth');
        }
    }

    public function riwayat_transaksi()
    {
        if ($this->session->userdata('logged_in')) {
            $data['main_view'] = 'riwayat_transaksi_view';
            $this->load->view('template', $data);
        } else {
            $this->session->set_flashdata('failed', 'session login telah habis, silahkan login kembali!');
            redirect('auth');
        }
    }

    public function riwayat_detail_pemesanan()
    {
        if ($this->session->userdata('logged_in')) {
            $data['main_view'] = 'riwayat_pemesanan_view';
            $this->load->view('template', $data);
        } else {
            $this->session->set_flashdata('failed', 'session login telah habis, silahkan login kembali!');
            redirect('auth');
        }
    }

    public function get_riwayat_transaksi()
    {
        echo json_encode($this->user_model->get_riwayat_transaksi());
    }

    public function get_data_pemesanan()
    {
        $this->load->model('pesanan_model');
        $id_transaksi = $this->session->userdata('id_transaksi');
        echo json_encode($this->pesanan_model->get_detail_pemesanan($id_transaksi));
    }

    public function get_keluhan($id_pesanan)
    {
        $this->load->model('pesanan_model');
        echo json_encode($this->pesanan_model->get_keluhan($id_pesanan));
    }

    public function get_bukti_pembayaran_by_id($id)
    {
        echo json_encode($this->user_model->get_bukti_pembayaran_by_id($id));
    }

    public function edit_data_profile()
    {
        // FORM VALIDATION
		$this->form_validation->set_rules('nama_depan', 'Nama depan', 'required|min_length[5]|max_length[15]');
		$this->form_validation->set_rules('nama_belakang', 'Nama belakang', 'required|max_length[15]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[30]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[10]|max_length[100]');
		$this->form_validation->set_rules('email', 'Email', 'required|max_length[35]|valid_email');
        $this->form_validation->set_rules('nomor_telepon', 'Nomor telepon', 'required|min_length[12]|max_length[12]');

        $username = $this->session->userdata('username');

        $data = array(
            'nama_depan' => $this->input->post('nama_depan'),
            'nama_belakang' => $this->input->post('nama_belakang'),
            'password' => $this->input->post('password'),
            'alamat' => $this->input->post('alamat'),
            'email' => $this->input->post('email'),
            'nomor_telepon' => $this->input->post('nomor_telepon')
        );

        if ($this->session->userdata('logged_in') == TRUE) {
            if ($this->form_validation->run() == TRUE) {
                if ($this->user_model->edit_data_profile($data, $username) == TRUE) {
                    $this->session->set_flashdata('success', 'Ubah Data Profil Berhasil!');
                    redirect('user');
                } else {
                    $this->session->set_flashdata('failed', 'Ubah Data Profil Gagal! Silahkan Coba Lagi!');
                    redirect('user');
                }

            } else {
                $this->session->set_flashdata('failed', validation_errors());
                redirect('user');
            }

        } else {
            $this->session->set_flashdata('failed', 'session login telah habis, silahkan login kembali!');
            redirect('auth');
        }

    }

    public function edit_profile_picture($file_image){
        $username = $this->session->userdata('username');

        if ( $this->session->userdata('logged_in') == TRUE) {

            $path = './uploads/users/';
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'jpg|png';
            $config['max_size']  = '100000';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_profil')){
                $image = $this->upload->data();
                $data = array('foto_profil' => $image['file_name']);
                unlink($path.$file_image);
                if ($this->user_model->edit_data_profile($data, $username) == TRUE) {
                    $this->session->set_flashdata('success', 'Ubah Foto Profil Berhasil!');
                    redirect('user');
                }
            } else{
                $data = array('upload_data' => $this->upload->data());
                $this->session->set_flashdata('failed', $this->upload->display_errors());
                redirect('user');
            }

        } else {
            $this->session->set_flashdata('failed', 'session login telah habis, silahkan login kembali!');
            redirect('auth');
        }


    }
}


/* End of file User.php */
