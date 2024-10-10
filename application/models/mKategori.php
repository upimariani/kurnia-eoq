<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mKategori extends CI_Model
{
	public function insert($data)
	{
		$this->db->insert('kategori', $data);
	}
	public function select()
	{
		$this->db->select('*');
		$this->db->from('kategori');
		return $this->db->get()->result();
	}
	public function update($id, $data)
	{
		$this->db->where('id_kategori', $id);
		$this->db->update('kategori', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_kategori', $id);
		$this->db->delete('kategori');
	}
}

/* End of file mKategori.php */
