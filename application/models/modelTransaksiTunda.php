<?php

class modelTransaksiTunda extends CI_Model
{
    var $table = "cet_transaksi_tunda";
    var $primaryKey = "id_tunda";

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Insert batch untuk transaksi


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

    //Tambah transaksi
    public function insertTundaGetId($post)
    {
        $max = getLastNomorTunda("transaksi_tunda")->no_tunda + 1;
        $transaksiNomor = autoCreate(array("TUNDATRANSAKSI"), "/", $max);
        $params = array(
            'no_tunda' => $transaksiNomor,
            'tgl_transaksi_tunda' => date("Y-m-d H:i:s"),
            'no' => $max,
            // 'serahlagi' => $post['serahlah']
            // 'total' => $post['total'],
        );
        $this->db->insert('transaksi_tunda', $params);

        return $this->db->insert_id();
    }

    //tunda
    public function getitemBarang($params = null)
    {
        $this->db->select('*, barang.nama_barang as nama_barang, barang.harga_barang as harga_barang');
        $this->db->from('item');
        $this->db->join("barang", 'item.id_barang = barang.id_barang');
        if ($params != null) {
            $this->db->where($params);
        }
        // $this->db->where('user_id', $this->session->userdata('idUser'));
        $query = $this->db->get();
        return $query;
    }
    // Hapus Keranjang

    public function hapus_data_transaksi_tunda($params = null)
    {
        if ($params != null) {
            $this->db->where($params);
        }
        return $this->db->delete('transaksi_tunda');
    }

    public function get_item_tunda_bykode($id)
    {
        $this->db->select('*');
        $this->db->from('item_tunda');
        $this->db->where('transaksi_tunda_id', $id);
        return $this->db->get()->result();
    }

    public function insertBatchItemTunda($params)
    {
        return $this->db->insert_batch('item', $params);
    }
    public function insertBatch($params)
    {
        return $this->db->insert_batch('item_tunda', $params);
    }
}
