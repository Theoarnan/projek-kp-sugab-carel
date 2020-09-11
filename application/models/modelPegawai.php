<?php

class modelPegawai extends CI_Model
{
	var $table = "anggota_sistem";
	var $primaryKey = "id_anggota";

	public function getJoinJabatan($id = null)
	{
		$where = "jabatan='1' OR jabatan='2' OR jabatan='3'";
		$this->db->select('pegawai.*, pegawai.nama_pegawai as nama_pegawai, pegawai.jabatan as jabatan')
			->where($where);
		if ($id != null) {
			$this->db->where($this->primaryKey, $id);
		}
		return $this->db->get($this->table)->result();
	}

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function getAll()
	{
		return $this->db->get($this->table)->result();
	}

	public function totPeg()
	{
		return $this->db->get($this->table);
	}

	public function getByPrimaryKey($id)
	{
		$this->db->where($this->primaryKey, $id);
		return $this->db->get($this->table)->row();
	}

	public function update($id, $data)
	{
		$this->db->where($this->primaryKey, $id);
		return $this->db->update($this->table, $data);
	}

	public function delete($id)
	{
		$this->db->where($this->primaryKey, $id);
		return $this->db->delete($this->table);
	}
}
