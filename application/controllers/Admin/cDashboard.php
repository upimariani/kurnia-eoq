<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{

	public function index()
	{
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/navbar');
		$this->load->view('Admin/vDashboard');
		$this->load->view('Admin/Layout/footer');
	}
}

/* End of file cDashboard.php */
