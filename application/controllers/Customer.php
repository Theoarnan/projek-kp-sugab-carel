<?php

class Customer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
		checkOnLogin();
        // roleAkses();
        $this->load->model(array("AuthModel", "modelCustomer"));

	}

    public function index()
    {
        $listCustomer = $this->modelCustomer->getAll();
        $data = array(
            "page" => "contentSuper/Customer/v_list_customer",
            "header" => "Daftar Customer",
            "customers" => $listCustomer
        );
        $this->load->view("layoutSuper/dashboard", $data);
    }

    public function register()
    {
        $data = array(
            "header" => "Tambah Data Customer",
            "page" => "contentSuper/Customer/v_add_customer"
            // "customers" => $customer
            // "customers" => $listCustomer
        );
        $this->load->view("layoutSuper/dashboard", $data);
    }

    public function proses_simpan(){
		$queryMaxId = "select ifnull(max(nomor),0) as max from kustomer ";
		$max = $this->db->query($queryMaxId)->row()->max;
		$max = (int) $max;
		// "TRX/2020/04/0120"
		$strPad = str_pad($max + 1, 4, "0", STR_PAD_LEFT);
		$idKustomer = "KD" . date("Y/m/d") . "00000" . $strPad;
        $customer = array(
            "id_kustomer" => $idKustomer,
            "nama_toko" => $this->input->post('nama_toko'),
            "kd_kuskategori" => $this->input->post('kd_kuskategori'),
            "kode_kustomer_besoft" => $this->input->post('kode_kustomer_besoft'),
            "alamat_toko" => $this->input->post('alamat_toko'),
            "kota_toko" => $this->input->post('kota_toko'),
            "telepon_toko" => $this->input->post('telepon_toko'),    
            "no_npwp" => $this->input->post('no_npwp'),
            "pic" => $this->input->post('pic'),
			"nomor" => ($max+1)
        );
        $this->modelCustomer->insert($customer);
        redirect('Customer');

    }

    public function update($id)
    {
        $listCustomer = $this->modelCustomer->getByPrimaryKey($id);
        $data = array(
            "header" => "Ubah Data Customer",
            "customers" => $listCustomer,
            "page" => "contentSuper/Customer/v_update_customer"
        );
        $this->load->view("layoutSuper/dashboard", $data);
    }

    public function proses_update()
    {
        $id = $this->input->post("id_kustomer", true);
        $kd_kuskategori = $this->input->post("kd_kuskategori", true);
        $nama_toko = $this->input->post("nama_toko", true);
        $kode_kustomer_besoft = $this->input->post("kode_kustomer_besoft", true);
        $alamat_toko = $this->input->post("alamat_toko", true);
        $kota_toko = $this->input->post("kota_toko", true);
        $telepon_toko = $this->input->post("telepon_toko", true);
        $no_npwp = $this->input->post("no_npwp", true);
        $pic = $this->input->post("pic", true);
        // $nopr = $this->input->post("nopr", true);
        $customers = array(
            "kd_kuskategori" => $kd_kuskategori,
            "nama_toko" => $nama_toko,
            "kode_kustomer_besoft" => $kode_kustomer_besoft,
            "alamat_toko" => $alamat_toko,
            "kota_toko" => $kota_toko,
            "telepon_toko" => $telepon_toko,
            "no_npwp" => $no_npwp,
            "pic" => $pic
            
        );
        $this->modelCustomer->update($id, $customers);
        redirect("CustomerSuper");
    }

    public function proses_hapus($id)
    {
        $this->modelCustomer->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Sukses dihapus');
        }
        redirect("CustomerSuper");
    }

	public function prosesDelete()
	{
		$id = $this->input->post("id");
		$this->modelCustomer->delete($id);
		redirect("buku");
	}

    function print_customer()
    {
        $detail = $this->modelCustomer->getAll();
        $data = array(
            "header" => " Print Data Customer",
            "detail" => $detail,
        );
        $html = $this->load->view('contentSuper/Customer/print/detail_print', $data, true);
        $this->fungsi->createPDF($html, 'Nama', 'A4', 'landscape');
    }
}
