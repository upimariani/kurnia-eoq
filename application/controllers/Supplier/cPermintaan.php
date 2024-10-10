<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPermintaan extends CI_Controller
{

	public function index()
	{
		$data = array(
			'pemesanan' => $this->db->query("SELECT * FROM `permintaan`")->result()
		);
		$this->load->view('Supplier/Layout/head');
		$this->load->view('Supplier/Layout/navbar');
		$this->load->view('Supplier/vPermintaan', $data);
		$this->load->view('Supplier/Layout/footer');
	}
	public function konfirmasi($id)
	{
		$data = array(
			'status' => '2'
		);
		$this->db->where('id_permintaan', $id);
		$this->db->update('permintaan', $data);
		$this->session->set_flashdata('success', 'Permintaan berhasil dikonfirmasi!');
		redirect('Supplier/cPermintaan');
	}
}

/* End of file cPermintaan.php */
