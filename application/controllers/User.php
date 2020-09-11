<?php

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // checkNoLogin();
        // roleAkses();
        $this->load->model(['UsersModel']);
    }

    public function index()
    {
        $listUser = $this->UsersModel->getAll();
        $data = array(
            "page" => "contentSuper/user/v_list_user",
            "users" => $listUser,
            "header" => "Daftar User"
        );
        $this->load->view("layoutSuper/dashboard", $data);
    }

    public function tambah() {
		$listUser = $this->UsersModel->getAll();
		$data = array(
			"header" => "User",
			"users" => $listUser,
			"page" => "contentSuper/user/v_form_user",
		);
		$this->load->view("layoutSuper/dashboard", $data);
	}

    public function update() {
		$roleUser = $this->UsersModel->getAll();
		$data = array(
			"header" => "User",
			"users" => $roleUser,
			"page" => "contentSuper/user/v_update_user",
		);
		$this->load->view("layoutSuper/dashboard", $data);
	}

	// public function proses_simpan() {
	// 	$user = $this->input->post();
	// 	$passwordRandom = randomPassword();
	// 	$user["password_user"] = password_hash($passwordRandom,PASSWORD_DEFAULT);
	// 	$user["is_active"] = 1;
	// 	$user["first_login"] = 1;
	// 	$this->UsersModel->insert($user);
	// 	$user["password_generated"] = $passwordRandom;
	// 	sendEmail("Register",$user,"register");
	// 	redirect("user");
	// }

	public function proses_simpan() {
		$user = $this->input->post();
		$passwordRandom = randomPassword();
		$user["password_user"] = password_hash($passwordRandom,PASSWORD_DEFAULT);
		$user["is_active"] = 1;
		$user["first_login"] = 1;
		$this->UserModel->insert($user);
		$user["password_generated"] = $passwordRandom;
		sendEmail("Register",$user,"register");
		redirect("user");
	}

	public function prosesSimpan()
    {
        $users = array(
            "username" => $this->input->post('username'),
			"password" => md5($this->input->post('password')),
			"nama_user" => $this->input->post('nama_user'),
            "role" => $this->input->post('role')
		);
     	$this->UsersModel->insert($users);
        redirect('User');
    }

	public function reset_password() {
		//1. ambil parameter form
		$idUser = $this->input->post("id_user");
		//2. buat objek user
		$user = $this->UsersModel->getByPrimaryKey($idUser);
		//3. buat random password
		$passwordRandom = randomPassword();
		//4. set random password ke objek user
		$user = (array) $user;
		$user["password_user"] = password_hash($passwordRandom,PASSWORD_DEFAULT);
		$user["first_login"] = 1;
		//5. simpan user
		$this->UsersModel->update($idUser,$user);
		$user["password_generated"] = $passwordRandom;
		echo sendEmail("Reset Password",$user,"register");
	}

}