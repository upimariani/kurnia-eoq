<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cBarang extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mBarang');
		$this->load->model('mKategori');
	}

	public function index()
	{
		$data = array(
			'barang' => $this->mBarang->select(),
			'kategori' => $this->mKategori->select()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/navbar');
		$this->load->view('Admin/Barang/vBarang', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function create()
	{
		$config['upload_path']          = './asset/barang';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 500000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$data = array(
				'pengguna' => $this->mBarang->select(),
				'kategori' => $this->mKategori->select()
			);
			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/Layout/navbar');
			$this->load->view('Admin/Barang/vBarang', $data);
			$this->load->view('Admin/Layout/footer');
		} else {
			$upload_data = $this->upload->data();
			$data = array(
				'id_kategori' => $this->input->post('kategori'),
				'nama_barang' => $this->input->post('nama'),
				'keterangan' => $this->input->post('keterangan'),
				'harga' => $this->input->post('harga'),
				'stok' => $this->input->post('stok'),
				'gambar' => $upload_data['file_name']
			);
			$this->mBarang->insert($data);
			$this->session->set_flashdata('success', 'Data Barang Berhasil Ditambahkan!');
			redirect('Admin/cBarang');
		}
	}
	public function update($id)
	{
		$config['upload_path']          = './asset/produk';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 500000;

		$this->load->library('upload', $config);


		if (!$this->upload->do_upload('gambar')) {

			$data = array(
				'pengguna' => $this->mBarang->select(),
				'kategori' => $this->mKategori->select()
			);
			$this->load->view('Admin/Layout/head');
			$this->load->view('Admin/Layout/navbar');
			$this->load->view('Admin/Barang/vBarang', $data);
			$this->load->view('Admin/Layout/footer');
		} else {

			$upload_data = $this->upload->data();
			$data = array(
				'id_kategori' => $this->input->post('kategori'),
				'nama_barang' => $this->input->post('nama'),
				'keterangan' => $this->input->post('keterangan'),
				'harga' => $this->input->post('harga'),
				'stok' => $this->input->post('stok'),
				'gambar' => $upload_data['file_name']
			);
			$this->mBarang->update($id, $data);

			$this->session->set_flashdata('success', 'Data Barang Berhasil Diperbaharui!');
			redirect('Admin/cBarang');
		} //tanpa ganti gambar
		$upload_data = $this->upload->data();
		$data = array(
			'id_kategori' => $this->input->post('kategori'),
			'nama_barang' => $this->input->post('nama'),
			'keterangan' => $this->input->post('keterangan'),
			'harga' => $this->input->post('harga'),
			'stok' => $this->input->post('stok')
		);
		$this->mBarang->update($id, $data);
		$this->session->set_flashdata('success', 'Data Barang Berhasil Diperbaharui!');
		redirect('Admin/cBarang');
	}
	public function delete($id)
	{
		$this->mBarang->delete($id);
		$this->session->set_flashdata('success', 'Data Barang Berhasil Dihapus!');
		redirect('Admin/cBarang');
	}
}

/* End of file cBarang.php */
