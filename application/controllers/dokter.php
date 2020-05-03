<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dokter_model');
		$this->load->model('pesanan_model');
		$this->load->model('jadwal_model');
	}

	public function profil($id)
	{
		$data['main_view'] = 'profil_dokter_view';
		$data['title'] = 'Dokter';
		$data['dokter'] = $this->dokter_model->getById($id);
		$data['list_rs'] = $this->dokter_model->getRsById($id);
		$this->load->view('template', $data);
	}

	public function schedule($id_dokter)
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$data['data_dokter'] = $this->dokter_model->getById($id_dokter);
			$data['main_view'] = 'jadwal_view';
			$this->load->view('template', $data);
		} else {
			$this->session->set_flashdata('failed', 'session login telah habis, silahkan login kembali!');
    	redirect('auth');
		}

	}

	public function pesan_schedule($id_jadwal)
	{
		$data_pesanan = array(
			'keluhan' => $this->input->post('keluhan'),
			'username' => $this->session->userdata('username'),
			'id_jadwal' => $id_jadwal,
			'tanggal_pemesanan' => date('Y-m-d')
		);
		if ($this->session->userdata('logged_in')) {

			if ($this->pesanan_model->insert($data_pesanan)) {
				$this->session->set_flashdata('success', 'Tambah Data Pesanan Berhasil!');
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				$this->session->set_flashdata('failed', 'Tambah Pesanan Gagal! Silahkan Coba Lagi');
				redirect($_SERVER['HTTP_REFERER']);
			}

		} else {
			$this->session->set_flashdata('failed', 'session login telah habis, silahkan login kembali!');
      redirect('auth');
		}

	}

	public function get_schedule($id_dokter)
	{
		echo json_encode($this->jadwal_model->get_tersedia($id_dokter));
	}

	public function get_schedule_by_id($id_jadwal)
	{
		echo json_encode($this->jadwal_model->get_by_id($id_jadwal));
	}

	public function add_data_dokter()
	{
		$this->form_validation->set_rules('nama_dokter', 'Nama Dokter', 'required|max_length[45]');
		$this->form_validation->set_rules('spesialis', 'Spesialis', 'required|max_length[40]');
		$this->form_validation->set_rules('nomor_telepon', 'Nomor Telepon', 'required|max_length[12]');
		$this->form_validation->set_rules('alamat_dokter', 'Alamat', 'required|max_length[150]');
		$this->form_validation->set_rules('email', 'Email', 'required|max_length[150]');


		if ($this->form_validation->run() == TRUE) {
			$path = './uploads/dokter/';
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'jpg|png';
			$config['max_size']  = '100000';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto_dokter') == TRUE) {
				$data = array(
					'nama_dokter' 	=> $this->input->post('nama_dokter'),
					'spesialis' 	=> $this->input->post('spesialis'),
					'nomor_telepon' => $this->input->post('nomor_telepon'),
					'alamat_dokter' => $this->input->post('alamat_dokter'),
					'email' 		=> $this->input->post('email'),
					'foto_dokter' 	=> $this->upload->data()['file_name']
				);
				if ($this->dokter_model->insert_data_dokter($data) == TRUE) {
					// activate this if you have the view to show this notification
                    // $this->session->set_flashdata('success', 'tambah data dokter berhasil!');
					// redirect('');

                    echo json_encode('POST Success');
				} else {
					unlink($path.$this->upload->data()['file_name']);
					// activate this if you have the view to show this notification
					// $this->session->set_flashdata('failed', 'tambah data dokter gagal!');
					// redirect('');

					echo json_encode('POST failed');
				}
			} else {
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

	public function hapus_data_dokter($id_dokter)
	{
		$data = array('delete_status' => 'true');
		if ($this->dokter_model->delete_data_dokter($id_dokter) == TRUE) {
			// activate this if you have the view to show this notification
            // $this->session->set_flashdata('success', 'Hapus data dokter berhasil!');
            // redirect('');

            // unactivate this if you already have the view
            echo json_encode('DELETE success');
		} else {
			// activate this if you have the view to show this notification
            // $this->session->set_flashdata('failed', 'Hapus data gagal! Silahkan coba lagi');
            // redirect('');

            // unactivate this if you already have the view
            echo json_encode('DELETE failed');
		}
	}

	public function daftar_rumah_sakit()
	{
		$data = array(
			'id_dokter' => $this->input->post('id_dokter'),
			'id_rs' => $this->input->post('id_rs')
		);

		if ($this->dokter_model->daftar_rs($data) == TRUE) {
			// activate this if you have the view to show this notification
            // $this->session->set_flashdata('failed', 'Daftar Rumah Sakit Berhasil! Silahkan coba lagi');
			// redirect('');

			// unactivate this if you already have the view
            echo json_encode('POST success');
		} else {
			// activate this if you have the view to show this notification
            // $this->session->set_flashdata('failed', 'Daftar Rumah Sakit Gagal! Silahkan coba lagi');
            // redirect('');

            // unactivate this if you already have the view
            echo json_encode('POST failed');
		}

	}

	public function make_schedule()
	{
		$this->form_validation->set_rules('waktu_mulai', 'Waktu Mulai', 'required');
		$this->form_validation->set_rules('estimasi_durasi', 'Estimasi Durasi', 'required');
		$this->form_validation->set_rules('id_dokter', 'Dokter', 'required');
		$this->form_validation->set_rules('id_rs', 'Rumah Sakit', 'required');

		$data = array(
			'waktu_mulai' 			=> $this->input->post('waktu_mulai'),
			'estimasi_durasi' 		=> $this->input->post('estimasi_durasi'),
			'id_dokter' 			=> $this->input->post('id_dokter'),
			'id_rs' 				=> $this->input->post('id_rs'),
			'delete_status' 		=> 'false',
			'tersedia'				=> '1'
		);

		if ($this->form_validation->run() == TRUE) {
			if ($this->dokter_model->add_schedule($data) == TRUE) {
				// activate this if you have the view to show this notification
                // $this->session->set_flashdata('success', 'tambah jadwal pemeriksaan berhasil!');
				// redirect('');

				// unactivate this if you already have the view
				echo json_encode('POST Success');
			} else {
				// activate this if you have the view to show this notification
                // $this->session->set_flashdata('success', 'tambah jadwal pemeriksaan gagal!');
				// redirect('');

				// unactivate this if you already have the view
				echo json_encode('POST failed');
			}
		} else {
			// activate this if you have the view to show this notification
            // $this->session->set_flashdata('failed', validation_errors());
            // redirect('');

			// unactivate this if you already have the view
            echo json_encode(validation_errors());
		}

	}

}

/* End of file Dokter.php */
