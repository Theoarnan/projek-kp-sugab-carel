<?php


class UsersModel extends CI_Model
{
    public function getByEmail($email)
    {
        $this->db->where("email", $email);
        return $this->db->get("cet_users")->row();
    }

    public function getAll(){
		return $this->db->get("cet_users")->result();
	}

    public function getByNamaAndPassword($username, $password)
    {
        $where = array(
            "username" => $username,
            "password" => md5($password)
        );
        $this->db->where($where);
        return $this->db->get("cet_users")->row();
    }

    public function insert($data)
    {
        $this->db->insert("cet_users", $data);
    }

    public function update($id, $data)
    {
        $this->db->where("id", $id);
        $this->db->update("cet_users", $data);
    }

    public function getByToken($token)
    {
        $this->db->where("token", $token);
        return $this->db->get("cet_users")->row();
    }
}
