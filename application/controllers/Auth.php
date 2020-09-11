<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load library form validasi
        $this->load->library('form_validation');
        //load model admin
        $this->load->model('AuthModel');
    }

    public function index()
    {
        $data = array(
            "page" => "login/form_login"
        );
        $this->load->view("login/login", $data);
    }

    public function proses(){
    	$username = $this->input->post("username", TRUE);
    	$password = $this->input->post("password", TRUE);

    	$user = $this->AuthModel->getByUserAndPassword($username);
//		var_dump($user);
//		die();
    	if ($user == null){
    		redirect("auth");
		} else {
    		$dataSession = array(
    			"id_user" => $user->id_user,
    			"username" => $user->username,
    			"password" => $user->password,
    			"nama_user" => $user->nama_user,
    			"role" => $user->role,
    			"is_logged_in" => true,
			);
    		$this->session->set_userdata($dataSession);
    		redirect("dashboard");
		}
	}

    public function proses_hapus($id)
    {
        $this->AuthModel->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Sukses dihapus');
        }
        redirect("User");
    }
}
