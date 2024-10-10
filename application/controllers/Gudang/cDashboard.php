<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{

	public function index()
	{
		$this->load->view('Gudang/Layout/head');
		$this->load->view('Gudang/Layout/navbar');
		$this->load->view('Gudang/vDashboard');
		$this->load->view('Gudang/Layout/footer');
	}
}

/* End of file cDashboard.php */
