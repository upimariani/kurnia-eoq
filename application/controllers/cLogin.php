<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLogin extends CI_Controller
{

	public function index()
	{
		$this->load->view('vLogin');
	}
	public function p_proses()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$dt = $this->db->query("SELECT * FROM `pengguna` WHERE username='" . $username . "' AND password='" . $password . "'")->row();
		if ($dt) {
			$level = $dt->level_user;

			$array = array(
				'id_user' => $dt->id_user
			);

			$this->session->set_userdata($array);

			if ($level == '1') {
				redirect('Admin/cDashboard');
			} else if ($level == '2') {
				redirect('Supplier/cPermintaan');
			} else if ($level == '3') {
				redirect('Gudang/cDashboard');
			} else if ($level == '4') {
				redirect('Pemilik/cDashboard');
			}
		} else {
			$this->session->set_flashdata('error', 'Username dan Password Anda Salah!');
			redirect('cLogin');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('id_user');
		$this->cart->destroy();
		$this->session->set_flashdata('success', 'Anda berhasil logout!');
		redirect('cLogin');
	}
}

/* End of file cLogin.php */
