<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


class ModelLog extends CI_Model
{
	var $table = "tabel_log";

	public function save_log($param)
	{
		$sql = $this->db->insert_string('tabel_log', $param);
		$ex = $this->db->query($sql);
		return $this->db->affected_rows($sql);
	}

	public function getAll()
	{
		return $this->db->get($this->table)->result();
	}

	public function getNoOrderById($noOrder)
	{
		$query = "select * from tabel_log where log_no_order = $noOrder";
		$result = $this->db->query($query);
		return $result->result();
//		return $this->db->get('tabel_log')->result();
	}
}
