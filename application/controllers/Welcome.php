<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// checkNoLogin();
		// roleAkses();
		$this->load->model(array("modelBarang", "ModelTransaksi", "ModelItemTransaksi","AuthModel"));
		//cek session dan level user
        if($this->AuthModel->is_role() != "admin"){
            redirect("Auth");
        }
	}

	public function index()
	{
		// checkNoLogin();
		// $listBarang = $this->modelBarang->getJoin();
		// $totalBarang = $this->modelBarang->totalBarang();
		$listTransaksi = $this->ModelTransaksi->getAll();
		$data = array(
			"header" => "Admin",
			"details" => $listTransaksi,
			// "barangs" => $totalBarang,
			"page" => "dashboard1"
		);
		$this->load->view("layoutAdmin/dashboard", $data);
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
