<?php

class ModelTransaksi extends CI_Model
{
	var $table = "cet_transaksi";
	var $primaryKey = "transaksi_id";
	var $table1 = "cet_item";
	var $primaryKey1 = "item_id";

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	// Insert batch untuk transaksi
	function insertBatch($params)
	{
		$this->db->insert_batch('transaksi_item', $params);
	}

	public function getAll()
	{
		return $this->db->get($this->table)->result();
	}

	public function totPenjualan()
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

	// delete data
	public function delete($id)
	{
		return $this->db->update($this->table, array("is_active" => 0));
	}

	public function insertGetIdTransaksi($data)
	{
		$this->db->insert("transaksi_tunda", $data);
		return $this->db->insert_id();
	}

	//Tambah transaksi
	public function insertGetId($post)
	{
		$max = getLastNomor("transaksi")->no + 1;
		$transaksiNomor = autoCreate(array("TRX"), "/", $max);
		$params = array(
			'transaksi_nomor' => $transaksiNomor,
			'transaksi_tanggal' => date("Y-m-d H:i:s"),
			'no' => $max,
			// 'user_id' => $this->session->userdata('idUser'),
			'total' => $post['total'],
			'bayar_utama' => $post['bayar_utama'],
			'diskon_utama' => $post['diskon_utama'],
			'kembali_utama' => $post['kembali_utama'],
		);
		$this->db->insert('transaksi', $params);
		return $this->db->insert_id();
	}


	public function insertCart($post)
	{
		$query = $this->db->query("SELECT MAX(item_id) as no_item from item");
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$no_item = ((int) $row->no_item) + 1;
		} else {
			$no_item = "1";
		}
		$item = array(
			"item_id" => $no_item,
			"id_barang" => $post['id_barang'],
			"harga_item" => $post['harga_item'],
			"quantity" => $post['quantity'],
			"total_item" => $post['total_item'],
			// "user_id" => $this->session->userdata('idUser'),
		);
		return $this->db->insert('item', $item);
	}

	// Update jumlah 
	public function ubahitemQuantity($post)
	{
		$sql = "UPDATE item SET harga_item = '$post[harga_item]',
				quantity = quantity + '$post[quantity]',
				total_item = '$post[harga_item]' * quantity
				WHERE id_barang = '$post[id_barang]'";

		$hasil = $this->db->query($sql);
		return $hasil;
	}

	// Ambil data keranjang
	public function getItemBarang($params = null)
	{
		$this->db->select('*, barang_harga.kd_barang as kd_barang, barang_harga.harga as harga');
		$this->db->from('barang');
		$this->db->join('barang_harga', 'barang_harga.kd_barang = barang.id_barang');
		if ($params != null) {
			$this->db->where($params);
		}
		// $this->db->where('user_id', $this->session->userdata('idUser'));
		$query = $this->db->get();
		return $query;
	}


	// //tunda
	// public function getItemBarangTunda($params = null)
	// {
	// 	$this->db->select('*, barang.nama_barang as nama_barang, barang.harga_barang as harga_barang');
	// 	$this->db->from('barang');
	// 	$this->db->join("item", 'item.id_barang = barang.id_barang');
	// 	if ($params != null) {
	// 		$this->db->where($params);
	// 	}
	// 	// $this->db->where('user_id', $this->session->userdata('idUser'));
	// 	$query = $this->db->get();
	// 	return $query;
	// }



	// Hapus Keranjang

	public function hapus_data_item($params = null)
	{
		if ($params != null) {
			$this->db->where($params);
		}
		return $this->db->delete('item');
	}


	public function deleteitem($primaryKey)
	{
		$this->db->where($this->primaryKey1, $primaryKey);
		return $this->db->delete($this->table1);
	}
}
