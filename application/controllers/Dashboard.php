<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		 checkOnLogin();
		// roleAkses();
		$this->load->model(array("modelBarang", "ModelTransaksi", "ModelItemTransaksi","AuthModel"));
		//cek session dan level user
//        if($this->AuthModel->is_role() != "superadmin" || $this->AuthModel->is_role() != "admin"){
//            redirect("auth");
//        }

	}

	public function index()
	{
		// checkNoLogin();
		// $listBarang = $this->modelBarang->getJoin();
		// $totalBarang = $this->modelBarang->totalBarang();
		$listTransaksi = $this->ModelTransaksi->getAll();
		$data = array(
			"header" => "Superadmin",
			"details" => $listTransaksi,
			// "barangs" => $totalBarang,
			"page" => "dashboard1"
		);
		$this->load->view("layoutSuper/dashboard", $data);
	}

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
