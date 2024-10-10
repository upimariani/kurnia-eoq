<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mPengguna extends CI_Model
{
	public function insert($data)
	{
		$this->db->insert('pengguna', $data);
	}
	public function select()
	{
		$this->db->select('*');
		$this->db->from('pengguna');
		return $this->db->get()->result();
	}
	public function update($id, $data)
	{
		$this->db->where('id_pengguna', $id);
		$this->db->update('pengguna', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_pengguna', $id);
		$this->db->delete('pengguna');
	}
}

/* End of file mPengguna.php */
