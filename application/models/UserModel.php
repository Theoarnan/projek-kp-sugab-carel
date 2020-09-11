<?php
class UserModel extends CI_Model{
	var $table = "user";
    var $primaryKey = "id_user";
    var $username = "username";
    var $password = "password";

    public function login($post){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;  
	}
	
	public function getByEmailAndPassword($username, $password) {
        $where = array(
			"username" => $username,
            // "email" => $email,
            "password" => sha1($password)
        );
        $this->db->where($where);
        return $this->db->get("user")->row();
	}
	
	public function getByToken($token) {
        $this->db->where("token", $token);
        return $this->db->get("user")->row();
    }

	public function insert($data){
		return $this->db->insert($this->table, $data);
	}

	public function getAll(){
		return $this->db->get($this->table)->result();
	}

	public function getJoin($id = null){
		$where = "jabatan='1' OR jabatan='2' OR jabatan='3'";
		$this->db->select('user.*, pegawai.nama_pegawai as nama_pegawai, pegawai.jabatan as jabatan, pegawai.alamat_pegawai as alamat_pegawai')
		->join("pegawai", 'pegawai.id_pegawai = user.pegawai_id')
		->where($where);
		if ($id != null) {
			$this->db->where($this->primaryKey, $id);
		}
		return $this->db->get($this->table)->result();
	}

	public function getByPrimaryKey($id){
		$this->db->where($this->primaryKey, $id);
		return $this->db->get($this->table)->row();
	}

	// public function getJoinById($id = null){
	// 	$this->db->select('user.*, pegawai.id_pegawai as id_pegawai, pegawai.nama_pegawai as nama_pegawai, pegawai.jabatan as jabatan, pegawai.alamat_pegawai as alamat_pegawai')
	// 	->join("pegawai", 'pegawai.id_pegawai = user.pegawai_id')
	// 	->where("id_user", $id);
	// 	if ($id != null) {
	// 		$this->db->where($this->primaryKey, $id);
	// 	}
	// 	return $this->db->get($this->table)->row();
	// }

	public function update($id, $data){
		$this->db->where($this->primaryKey, $id);
		return $this->db->update($this->table, $data);
	}

	public function delete($id){
		$this->db->where($this->primaryKey, $id);
		return $this->db->delete($this->table);
	}
}