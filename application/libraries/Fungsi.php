<?php

class Fungsi
{

    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    // function user_login()
    // {
    //     $this->ci->load->model('userModel');
    //     $idUser = $this->ci->session->userdata('idUser');
    //     $user_data = $this->ci->userModel->getJoinById($idUser);
    //     return $user_data;
    // }

    // untuk cetak barcode pdf
    function createPDF($html, $filename, $paper, $orientation)
    {
        $dompdf = new Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($paper, $orientation);
        // Render the HTML as PDF
        $dompdf->render();
        // Output the generated PDF to Browser
        $dompdf->stream($filename, array('Attachment' => 0));
    }




    public function HitungBrg()
    {
        $this->ci->load->model('modelCustomer');
        return $this->ci->modelBarang->getAll()->num_rows();
    }

    public function HitungTotPen()
    {
        $this->ci->load->model('modelPegawai');
        return $this->ci->ModelTransaksi->totPenjualan()->num_rows();
    }

    // public function HitungTotKat()
    // {
    //     $this->ci->load->model('modelKategori');
    //     return $this->ci->modelKategori->totKat()->num_rows();
    // }

    // public function HitungTotPegawai()
    // {
    //     $this->ci->load->model('modelPegawai');
    //     return $this->ci->modelPegawai->totPeg()->num_rows();
    // }
}
