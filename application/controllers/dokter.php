<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dokter_model');
	}

	public function profil($id)
	{
		$data['main_view'] = 'profil_dokter_view';
		$data['title'] = 'Dokter';
		$data['dokter'] = $this->dokter_model->getById($id);
		$data['list_rs'] = $this->dokter_model->getRsById($id);
		$this->load->view('template', $data);
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
					'nama_dokter' => $this->input->post('nama_dokter'),
					'spesialis' => $this->input->post('spesialis'),
					'nomor_telepon' => $this->input->post('nomor_telepon'),
					'alamat_dokter' => $this->input->post('alamat_dokter'),
					'email' => $this->input->post('email'),
					'foto_dokter' => $this->upload->data()['file_name']
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

}

/* End of file Dokter.php */
