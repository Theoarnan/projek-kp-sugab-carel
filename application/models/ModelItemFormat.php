<?php


class ModelItemFormat extends CI_Model
{
	var $table = " cet_table_format";
	var $primaryKey = "id_format";

	public function insert($data)
	{
		$this->db->set($data);
		return $this->db->insert($this->table, $data);
	}

	public function insertGetId($data) {
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function insertBatch($data) {
		// $this->db->set($data);
		return $this->db->insert_batch($this->table, $data);
	}

	public function getAll()
	{
		return $this->db->get($this->table)->result();
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

	public function getNoOrderById($noOrder)
	{
		$query = "select * from cet_table_format where no_order = $noOrder";
		$result = $this->db->query($query);
		return $result->result();

//		return $this->db->get('tabel_log')->result();
	}
	public function delete($id)
	{
		$this->db->where($this->primaryKey, $id);
		return $this->db->delete($this->table);
	}
}
