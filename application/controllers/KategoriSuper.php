<?php

class KategoriSuper extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // checkNoLogin();
        // roleAkses();
        $this->load->model("modelKategori");
    }

    public function index()
    {
        $listKategori = $this->modelKategori->getAll();
        $data = array(
            "page" => "contentSuper/kategoribrg/v_list_kat",
            "header" => "Kategori",
            "kategories" => $listKategori
        );
        $this->load->view("layoutSuper/dashboard", $data);
    }

    public function register()
    {
        $kategori = new stdClass();
        $kategori->id_kategori = null;
        $kategori->nama_kategori = null;
        $data = array(
            "header" => "Tambah Data Kategori",
            "page" => "contentSuper/kategoribrg/v_add_kat",
            "suppliers" => $kategori
        );
        $this->load->view("layoutSuper/dashboard", $data);
    }

    public function update($id)
    {
        $listKategori = $this->modelKategori->getByPrimaryKey($id);
        $data = array(
            "header" => "Ubah Data Kategori",
            "page" => "contentSuper/KategoriBrg/v_update_kat",
            "kategoris" => $listKategori
            
        );
        $this->load->view("layoutSuper/dashboard", $data);
    }

    public function proses_simpan()
    {
        $kategori = array(
            "nama_kategori" => $this->input->post('nama')
            );
        $this->modelKategori->insert($kategori);
        redirect('KategoriSuper');
    }

    public function proses_update()
    {
        $id = $this->input->post("id_kategori", true);
        $nama = $this->input->post("nama", true);
        
        $kategoris = array(
            "nama_kategori" => $nama
        );
        $this->modelKategori->update($id, $kategoris);
        redirect("KategoriSuper");
    }

    public function proses_hapus($id)
    {
        $this->modelKategori->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Sukses dihapus');
        }
        redirect("KategoriSuper");
    }
}
