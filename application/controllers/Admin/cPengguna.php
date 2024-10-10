<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPengguna extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mPengguna');
	}

	public function index()
	{
		$data = array(
			'pengguna' => $this->mPengguna->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/navbar');
		$this->load->view('Admin/Pengguna/vPengguna', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function create()
	{
		$data = array(
			'nama_pengguna' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_hp' => $this->input->post('no_hp'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'level_user' => $this->input->post('level')
		);
		$this->mPengguna->insert($data);
		$this->session->set_flashdata('success', 'Data Pengguna berhasil ditambahkan!');
		redirect('Admin/cPengguna');
	}
	public function update($id)
	{
		$data = array(
			'nama_pengguna' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'no_hp' => $this->input->post('no_hp'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'level_user' => $this->input->post('level')
		);
		$this->mPengguna->update($id, $data);
		$this->session->set_flashdata('success', 'Data Pengguna berhasil diperbaharui!');
		redirect('Admin/cPengguna');
	}
}

/* End of file cPengguna.php */
