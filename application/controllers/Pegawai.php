<?php
class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // checkNoLogin();
        // roleAkses();
        $this->load->model(array("AuthModel", "modelPegawai", "ModelCabang"));
		if($this->AuthModel->is_role() != "superadmin"){
			redirect("auth");
		}
	}

    public function index()
    {
        $listPegawai = $this->modelPegawai->getAll();
        $data = array(
            "page" => "contentSuper/Pegawai/v_list_pegawai",
            "header" => "Daftar Pegawai",
            "pegawais" => $listPegawai
        );
        $this->load->view("layoutSuper/dashboard", $data);
    }

    public function register()
    {
    	$listCabang = $this->ModelCabang->getAll();
        $data = array(
            "header" => "Tambah Data Pegawai",
            "cabangs" => $listCabang,
            "page" => "contentSuper/Pegawai/v_add_pegawai"
        );
        $this->load->view("layoutSuper/dashboard", $data);
    }

    public function proses_simpan()
    {
        $pegawai = array(
            "nama_anggota" => $this->input->post('nama'),
            "jabatan" => $this->input->post('jabatan'),
            "kd_cabang" => $this->input->post('kd_cb')
        );
        $this->modelPegawai->insert($pegawai);
        redirect('Pegawai');
    }

    public function update($id)
    {
        $listPegawai = $this->modelPegawai->getByPrimaryKey($id);
        $data = array(
            "pegawais" => $listPegawai,
            "page" => "contentSuper/Pegawai/v_update_pegawai"
        );
        $this->load->view("layoutSuper/dashboard", $data);
    }

    public function proses_update()
    {
        $id = $this->input->post("id_pegawai", true);
        $nama = $this->input->post("nama", true);
        $alamat = $this->input->post("alamat", true);
        $jk = $this->input->post("jk", true);
        $jbtn = $this->input->post("jbtn", true);
        $nomer = $this->input->post("nomer", true);
        $pegawais = array(
            "nama_pegawai" => $nama,
            "alamat_pegawai" => $alamat,
            "jenis_kelamin" => $jk,
            "jabatan" => $jbtn,
            "no_telp" => $nomer
        );
        $this->modelPegawai->update($id, $pegawais);
        redirect("PegawaiSuper");
    }

    public function proses_hapus($id)
    {
        $this->modelPegawai->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Sukses dihapus');
        }
        redirect("PegawaiSuper");
    }
}
