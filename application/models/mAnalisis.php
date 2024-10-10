<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mAnalisis extends CI_Model
{
	public function barang_analisis()
	{
		return $this->db->query("SELECT * FROM `analisis` JOIN barang ON analisis.id_barang=barang.id_barang GROUP BY barang.id_barang")->result();
	}
}

/* End of file mAnalisis.php */
