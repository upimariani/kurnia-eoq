<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cPermintaan extends CI_Controller
{

	public function index()
	{
		$data = array(
			'pemesanan' => $this->db->query("SELECT * FROM `permintaan`")->result()
		);
		$this->load->view('Gudang/Layout/head');
		$this->load->view('Gudang/Layout/navbar');
		$this->load->view('Gudang/vPermintaan', $data);
		$this->load->view('Gudang/Layout/footer');
	}
	public function create()
	{
		$this->form_validation->set_rules('nama', 'Nama Bahan Baku', 'required');
		$this->form_validation->set_rules('qty', 'Quantity', 'required');

		if ($this->form_validation->run() == FALSE) {

			$data = array(
				'bb' => $this->db->query("SELECT * FROM `barang`")->result()
			);
			$this->load->view('Gudang/Layout/head');
			$this->load->view('Gudang/Layout/navbar');
			$this->load->view('Gudang/vTambahPermintaan', $data);
			$this->load->view('Gudang/Layout/footer');
		} else {
			$data = array(
				'id' => $this->input->post('nama'),
				'name' => $this->input->post('namabb'),
				'price' => $this->input->post('harga'),
				'qty' => $this->input->post('qty')
			);
			$this->cart->insert($data);
			$this->session->set_flashdata('success', 'Barang berhasil dimasukkan kedalam keranjang!');
			redirect('Gudang/cPermintaan/create');
		}
	}
	public function delete($rowid)
	{
		$this->cart->remove($rowid);
		$this->session->set_flashdata('success', 'Barang berhasil dihapus!');
		redirect('Gudang/cPermintaan/create');
	}
	public function pesan()
	{
		$data = array(
			'tgl' => date('Y-m-d'),
			'total_bayar' => $this->cart->total(),
			'status' => '0',
			'payment' => '0'
		);
		$this->db->insert('permintaan', $data);

		//menyimpan data detail permintaan
		$id_permintaan = $this->db->query("SELECT MAX(id_permintaan) as id FROM `permintaan`")->row();
		foreach ($this->cart->contents() as $key => $value) {
			$dt_detail = array(
				'id_permintaan' => $id_permintaan->id,
				'id_barang' => $value['id'],
				'jumlah' => $value['qty']
			);
			$this->db->insert('barang_permintaan', $dt_detail);
		}
		$this->cart->destroy();
		$this->session->set_flashdata('success', 'Data permintaan barang berhasil dikirim!');
		redirect('Gudang/cPermintaan');
	}
	public function bayar($id)
	{
		$config['upload_path']          = './asset/bayar';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 500000;

		$this->load->library('upload', $config);


		if (!$this->upload->do_upload('bayar')) {

			$data = array(
				'pemesanan' => $this->db->query("SELECT * FROM `permintaan`")->result()
			);
			$this->load->view('Gudang/Layout/head');
			$this->load->view('Gudang/Layout/navbar');
			$this->load->view('Gudang/vPermintaan', $data);
			$this->load->view('Gudang/Layout/footer');
		} else {

			$upload_data = $this->upload->data();
			$data = array(
				'status' => '1',
				'payment' => $upload_data['file_name']
			);
			$this->db->where('id_permintaan', $id);
			$this->db->update('permintaan', $data);

			$this->session->set_flashdata('success', 'Pembayaran berhasil dikirim!');
			redirect('Gudang/cPermintaan');
		}
	}
	public function diterima($id)
	{
		$data = array(
			'status' => '3'
		);
		$this->db->where('id_permintaan', $id);
		$this->db->update('permintaan', $data);
		$this->session->set_flashdata('success', 'Permintaan berhasil diterima!');
		redirect('Gudang/cPermintaan');
	}
}

/* End of file cPermintaan.php */
