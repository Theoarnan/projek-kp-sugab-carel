<?php


class ModelOrder extends CI_Model
{
	var $table = "kartu_order";
	var $primaryKey = "id_order";

	public function insert($data)
	{
		// $this->db->set($data);
		return $this->db->insert($this->table, $data);
	}

	public function insertGetId($data) {
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
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

	public function update2($data)
	{
		$this->db->update($this->table, $data);
	}

	public function getSubTotalById($id){
		$query = "select total from kartu_order where id_order = $id";
		$result =  $this->db->query($query);
		return $result->row()->total;
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
