<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLaporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mBarang');
	}

	public function index()
	{
		$data = array(
			'analisis' => $this->db->query("SELECT * FROM `analisis` JOIN barang ON analisis.id_barang=barang.id_barang")->result(),
			'barang' => $this->mBarang->select()
		);
		$this->load->view('Pemilik/Layout/head');
		$this->load->view('Pemilik/Layout/navbar');
		$this->load->view('Pemilik/vLaporan', $data);
		$this->load->view('Pemilik/Layout/footer');
	}
	public function cetak()
	{
		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();


		$pdf->SetFont('Times', 'B', 14);
		// $pdf->Image('asset/logosmp.png', 3, 3, 40);
		$pdf->Cell(200, 5, 'KURNIA TELUR', 0, 1, 'C');
		$pdf->SetFont('Times', '', 10);
		$pdf->Cell(200, 20, 'Kuningan, Jawa Barat', 0, 0, 'C');

		$pdf->SetLineWidth(1);
		$pdf->Line(10, 43, 200, 43);
		$pdf->SetLineWidth(0);
		$pdf->Line(10, 42, 200, 42);
		$pdf->Cell(10, 30, '', 0, 1);

		$pdf->SetFont('Times', 'B', 14);
		$pdf->Cell(190, 10, 'LAPORAN HASIL ANALISIS METODE EOQ DAN ROP', 0, 1, 'C');


		$pdf->Cell(10, 15, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'No', 1, 0, 'C');
		$pdf->Cell(35, 7, 'Periode', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Total Kebutuhan', 1, 0, 'C');
		$pdf->Cell(30, 7, 'EOQ', 1, 0, 'C');
		$pdf->Cell(20, 7, 'ROP', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Biaya Pemesanan', 1, 0, 'C');
		$pdf->Cell(35, 7, 'Biaya Penyimpanan', 1, 1, 'C');

		$pdf->SetFont('Times', '', 9);
		$no = 1;
		$tot = 0;
		$bb = $this->input->post('barang');
		$dt = $this->db->query("SELECT * FROM `analisis` JOIN barang ON barang.id_barang=analisis.id_barang WHERE barang.id_barang='" . $bb . "'")->result();
		foreach ($dt as $key => $value) {
			if ($value->periode == '1') {
				$bulan = 'Januari';
			} else if ($value->periode == '2') {
				$bulan = 'Februari';
			} else if ($value->periode == '3') {
				$bulan = 'Maret';
			} else if ($value->periode == '4') {
				$bulan = 'April';
			} else if ($value->periode == '5') {
				$bulan = 'Mei';
			} else if ($value->periode == '6') {
				$bulan = 'Juni';
			} else if ($value->periode == '7') {
				$bulan = 'Juli';
			} else if ($value->periode == '8') {
				$bulan = 'Agustus';
			} else if ($value->periode == '9') {
				$bulan = 'September';
			} else if ($value->periode == '10') {
				$bulan = 'Oktober';
			} else if ($value->periode == '11') {
				$bulan = 'November';
			} else if ($value->periode == '12') {
				$bulan = 'Desember';
			}
			$tot += $value->dt_jml_permintaan;
			$pdf->Cell(10, 7, $no++, 1, 0, 'C');
			$pdf->Cell(35, 7, $bulan, 1, 0, 'C');
			$pdf->Cell(30, 7, number_format($value->dt_jml_permintaan), 1, 0, 'R');
			$pdf->Cell(30, 7, $value->eoq, 1, 0, 'C');
			$pdf->Cell(20, 7, $value->rop, 1, 0, 'C');
			$pdf->Cell(30, 7, 'Rp. ' . number_format($value->biaya_pemesanan), 1, 0, 'C');
			$pdf->Cell(35, 7, 'Rp. ' . number_format($value->biaya_pemesanan), 1, 1, 'C');
		}


		$pdf->SetFont('Times', 'B', 12);
		$pdf->Cell(190, 7, 'Jumlah Kebutuhan: ' . number_format($tot), 1, 1, 'R');

		$pdf->SetFont('Times', '', 9);
		$pdf->Cell(40, 7, '', 0, 1, 'C');
		$pdf->Cell(40, 7, '', 0, 1, 'C');



		$pdf->Cell(95, 7, 'Kuningan, ' . date('j F Y'), 0, 1, 'C');

		$pdf->Cell(95, 7, 'Pemilik Kurnia Telur', 0, 1, 'C');
		$pdf->Cell(95, 10, '', 0, 1, 'C');

		$pdf->SetFont('Times', 'B', 9);

		$pdf->Cell(95, 7, '(....................)', 0, 0, 'C');

		$pdf->Output();
	}
}

/* End of file cLaporan.php */
