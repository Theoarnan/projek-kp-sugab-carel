<?php

class ModelItemTransaksi extends CI_Model
{
	var $table = "table_order";
	var $primaryKey = "id_order";

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
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


	public function getDetailTransaksi($id)
	{
		$this->db->select('*,barang.nama_barang as nama_barang');
		$this->db->join("barang", 'transaksi_item.barang_id = barang.id_barang');
		$this->db->where('transaksi_id', $id);
		return $this->db->get('transaksi_item')->result();
	}


	public function update($id, $data)
	{
		$this->db->where($this->primaryKey, $id);
		return $this->db->update($this->table, $data);
	}

	// delete data
	public function delete($id)
	{
		//hanya mengupdate is_active dari 1 menjadi 0
		$this->db->where($this->primaryKey, $id);
		return $this->db->update($this->table, array("is_active" => 0));
	}
}
