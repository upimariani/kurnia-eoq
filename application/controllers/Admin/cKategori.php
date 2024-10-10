<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKategori extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mKategori');
	}
	public function index()
	{
		$data = array(
			'kategori' => $this->mKategori->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/navbar');
		$this->load->view('Admin/Kategori/vKategori', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function create()
	{
		$data = array(
			'nama_kategori' => $this->input->post('nama')
		);
		$this->mKategori->insert($data);
		$this->session->set_flashdata('success', 'Data Kategori berhasil disimpan!');
		redirect('Admin/cKategori');
	}
	public function update($id)
	{
		$data = array(
			'nama_kategori' => $this->input->post('nama')
		);
		$this->mKategori->update($id, $data);
		$this->session->set_flashdata('success', 'Data Kategori berhasil diperbaharui!');
		redirect('Admin/cKategori');
	}
	public function delete($id)
	{
		$this->mKategori->delete($id);
		$this->session->set_flashdata('success', 'Data Kategori berhasil dihapus!');
		redirect('Admin/cKategori');
	}
}

/* End of file cKategori.php */
