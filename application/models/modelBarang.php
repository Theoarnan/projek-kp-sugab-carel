<?php

class modelBarang extends CI_Model
{
	var $table = "barang";
	var $primaryKey = "id_barang";

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

	// public function getJoin($id = null)
	// {
	// 	$this->db->select('barang.*, kategori.nama_kategori as nama_kategori');
	// 	$this->db->join("kategori", 'kategori.id_kategori = barang.kategori_id');
	// 	if ($id != null) {
	// 		$this->db->where($this->primaryKey, $id);
	// 	}
	// 	return $this->db->get($this->table)->result();
	// }

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


	public function totalBarang($table)
	{
		return $this->db->count_all($table);
	}


	function cek_barcode($code, $id = null)
	{
		$this->db->where('barcode_barang', $code);
		if ($id != null) {
			$this->db->where('id_barang !=', $id);
		}
		return $this->db->get($this->table);
	}

	// Cari kode barcode scanner
	function get_data_barang_bykode($barcode_barang)
	{
		$hsl = $this->db->query("SELECT * FROM barang WHERE barcode_barang='$barcode_barang'");
		if ($hsl->num_rows() > 0) {
			foreach ($hsl->result() as $data) {
				$hasil = array(
					'id_barang' => $data->id_barang,
					'barcode_barang' => $data->barcode_barang,
					'nama_barang' => $data->nama_barang,
					'harga_barang' => $data->harga_barang,
					'kemasan_barang' => $data->kemasan_barang,
					'stock_barang' => $data->stock_barang,
					'detail_barang' => $data->detail_barang,
					'kategori_id' => $data->kategori_id
				);
			}
		}
		return $hasil;
	}
}
