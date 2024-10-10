<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAnalisis extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mAnalisis');
	}

	public function index()
	{
		$data = array(
			'barang' => $this->mAnalisis->barang_analisis()
		);
		$this->load->view('Gudang/Layout/head');
		$this->load->view('Gudang/Layout/navbar');
		$this->load->view('Gudang/vAnalisis', $data);
		$this->load->view('Gudang/Layout/footer');
	}
	public function get_periode_permintaan()
	{
		$id_barang = $this->input->post('id');
		$data = $this->db->query("SELECT MONTH(tgl) as periode, SUM(jumlah) as jml, COUNT(permintaan.id_permintaan) as frequensi FROM `permintaan` JOIN barang_permintaan ON permintaan.id_permintaan=barang_permintaan.id_permintaan JOIN barang ON barang.id_barang=barang_permintaan.id_barang WHERE barang.id_barang='" . $id_barang . "' GROUP BY MONTH(tgl)")->result();
		echo json_encode($data);
	}
	public function hitung()
	{
		$id_barang = $this->input->post('id_barang');
		$jml_permintaan = $this->input->post('jml_permintaan');
		$biaya_pemesanan = $this->input->post('biaya_pemesanan');
		$biaya_penyimpanan = $this->input->post('biaya_penyimpanan');
		$lead_time = $this->input->post('lead_time');
		$hari_aktif = $this->input->post('hari_aktif');
		$frequensi = $this->input->post('frequensi');


		$vb_pemesanan = $biaya_pemesanan / $frequensi;
		$vb_penyimpanan = $biaya_penyimpanan / $frequensi;

		//perhitungan eoq
		$eoq = round(sqrt((2 * $jml_permintaan * $vb_pemesanan) / $vb_penyimpanan), 0);

		//perhitungan rop 
		$rop = round(($jml_permintaan / $hari_aktif) * $lead_time, 0);

		$data = array(
			'id_barang' => $id_barang,
			'dt_jml_permintaan' => $jml_permintaan,
			'biaya_pemesanan' => $biaya_pemesanan,
			'biaya_penyimpanan' => $biaya_penyimpanan,
			'hari_aktif' => $hari_aktif,
			'periode' => $this->input->post('periode'),
			'eoq' => $eoq,
			'rop' => $rop,
			'safety_stok' => '0',
			'lead_time' => $lead_time
		);
		$this->db->insert('analisis', $data);
		$this->session->set_flashdata('success', 'Data Analisis Berhasil Disimpan!');
		redirect('Gudang/cAnalisis');
	}
	public function view($id)
	{
		$data = array(
			'barang' => $this->db->query("SELECT * FROM `analisis` JOIN barang ON analisis.id_barang=barang.id_barang WHERE barang.id_barang='" . $id . "'")->result()
		);
		$this->load->view('Gudang/Layout/head');
		$this->load->view('Gudang/Layout/navbar');
		$this->load->view('Gudang/vViewAnalisis', $data);
		$this->load->view('Gudang/Layout/footer');
	}
	public function hapus($id)
	{
		$this->db->where('id_analisis', $id);
		$this->db->delete('analisis');
		$this->session->set_flashdata('success', 'Analisis berhasil dihapus!');
		redirect('Gudang/cAnalisis/view/' . $id);
	}
}

/* End of file cAnalisis.php */
