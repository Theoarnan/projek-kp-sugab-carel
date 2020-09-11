<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Report extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // isLogin();
    }

    public function barang()
    {
        $this->load->model("modelBarang");
        $listBarang = $this->modelBarang->getAll()->result();
        $filename = "Daftar Barang";
        //langkah pembuatan excel
        //1.Buat Objek dari Spreadsheet
        $file = new Spreadsheet;
        //2.Aktif di sheet tertentu sekalian buat header
        $file->setActiveSheetIndex(0)
            ->mergeCells("A1:E1")
            ->setCellValue("A1", $filename)
            ->setCellValue("A2", "No")
            ->setCellValue("B2", "Barcode Barang")
            ->setCellValue("C2", "Nama Barang")
            ->setCellValue("D2", "Harga Barang")
            ->setCellValue("E2", "Stock Barang");
        //2.1 Set Kosmetik dari Excel
        $file->setActiveSheetIndex(0)
            ->getStyle("A1")
            ->applyFromArray($this->header());
        $file->setActiveSheetIndex(0)
            ->getStyle("A2:E2")
            ->applyFromArray($this->header());

        //3. Load data dan populate ke excel
        $baris = 3;
        $no = 1;
        foreach ($listBarang as $barang) {
            $file->setActiveSheetIndex(0)
                ->setCellValue("A" . $baris, $no++)
                ->setCellValue("B" . $baris, $barang->barcode_barang)
                ->setCellValue("C" . $baris, $barang->nama_barang)
                ->setCellValue("D" . $baris, $barang->harga_barang)
                ->setCellValue("E" . $baris, $barang->stock_barang);
            $baris++;
        }
        //3.1 Kosmetik
        $file->setActiveSheetIndex(0)
            ->getStyle("A2:E" . --$baris)
            ->applyFromArray($this->borderStyle());
        //otomatis menyesuaikan lebar kolong
        $file->setActiveSheetIndex(0)->getColumnDimension("A")->setAutoSize(true);
        $file->setActiveSheetIndex(0)->getColumnDimension("B")->setAutoSize(true);
        $file->setActiveSheetIndex(0)->getColumnDimension("C")->setAutoSize(true);
        $file->setActiveSheetIndex(0)->getColumnDimension("D")->setAutoSize(true);
        $file->setActiveSheetIndex(0)->getColumnDimension("E")->setAutoSize(true);
        //4. Create Excel dan Download
        $writer = new Xlsx($file);
        $filename = $filename . ".xlsx";
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header("Cache-Control: max-age=0");
        $writer->save("php://output");
    }

    public function pegawai()
    {
        $this->load->model("modelPegawai");
        $listPegawai = $this->modelPegawai->getAll();
        $filename = "Data Pegawai";
        //langkah pembuatan excel
        //1.Buat Objek dari Spreadsheet
        $file = new Spreadsheet;
        //2.Aktif di sheet tertentu sekalian buat header
        $file->setActiveSheetIndex(0)
            ->mergeCells("A1:F1")
            ->setCellValue("A1", $filename)
            ->setCellValue("A2", "No")
            ->setCellValue("B2", "Nama Anggota")
            ->setCellValue("C2", "Jabatan")
            ->setCellValue("D2", "Alamat")
            ->setCellValue("E2", "No Telepon")
            ->setCellValue("F2", "Keterangan");
        // ->setCellValue("E2", "Stock Barang");
        //2.1 Set Kosmetik dari Excel
        $file->setActiveSheetIndex(0)
            ->getStyle("A1")
            ->applyFromArray($this->header());
        $file->setActiveSheetIndex(0)
            ->getStyle("A2:F2")
            ->applyFromArray($this->header());

        //3. Load data dan populate ke excel
        $baris = 3;
        $no = 1;
        foreach ($listPegawai as $pegawai) {
            $file->setActiveSheetIndex(0)
                ->setCellValue("A" . $baris, $no++)
                ->setCellValue("B" . $baris, $pegawai->nama_anggota)
                ->setCellValue("C" . $baris, $pegawai->jabatan)
                ->setCellValue("D" . $baris, $pegawai->alamat_anggota)
                ->setCellValue("E" . $baris, $pegawai->telepon_anggota)
                ->setCellValue("F" . $baris, $pegawai->keterangan_anggota);
            $baris++;
        }
        //3.1 Kosmetik
        $file->setActiveSheetIndex(0)
            ->getStyle("A2:F" . --$baris)
            ->applyFromArray($this->borderStyle());
        //otomatis menyesuaikan lebar kolong
        $file->setActiveSheetIndex(0)->getColumnDimension("A")->setAutoSize(true);
        $file->setActiveSheetIndex(0)->getColumnDimension("B")->setAutoSize(true);
        $file->setActiveSheetIndex(0)->getColumnDimension("C")->setAutoSize(true);
        $file->setActiveSheetIndex(0)->getColumnDimension("D")->setAutoSize(true);
        $file->setActiveSheetIndex(0)->getColumnDimension("E")->setAutoSize(true);
        $file->setActiveSheetIndex(0)->getColumnDimension("F")->setAutoSize(true);
        //4. Create Excel dan Download
        $writer = new Xlsx($file);
        $filename = $filename . ".xlsx";
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header("Cache-Control: max-age=0");
        $writer->save("php://output");
    }

    public function kategori()
    {
        $this->load->model("modelKategori");
        $listKategori = $this->modelKategori->getAll();
        $filename = "Data Nama Kategori";
        //langkah pembuatan excel
        //1.Buat Objek dari Spreadsheet
        $file = new Spreadsheet;
        //2.Aktif di sheet tertentu sekalian buat header
        $file->setActiveSheetIndex(0)
            ->mergeCells("A1:E1")
            ->setCellValue("A1", $filename)
            ->setCellValue("A2", "No")
            ->setCellValue("B2", "Nama Kategori");
        //2.1 Set Kosmetik dari Excel
        $file->setActiveSheetIndex(0)
            ->getStyle("A1")
            ->applyFromArray($this->header());
        $file->setActiveSheetIndex(0)
            ->getStyle("A2:E2")
            ->applyFromArray($this->header());

        //3. Load data dan populate ke excel
        $baris = 3;
        $no = 1;
        foreach ($listKategori as $kategori) {
            $file->setActiveSheetIndex(0)
                ->setCellValue("A" . $baris, $no++)
                ->setCellValue("B" . $baris, $kategori->nama_kategori);

            $baris++;
        }
        //3.1 Kosmetik
        $file->setActiveSheetIndex(0)
            ->getStyle("A2:E" . --$baris)
            ->applyFromArray($this->borderStyle());
        //otomatis menyesuaikan lebar kolong
        $file->setActiveSheetIndex(0)->getColumnDimension("A")->setAutoSize(true);
        $file->setActiveSheetIndex(0)->getColumnDimension("B")->setAutoSize(true);
        $file->setActiveSheetIndex(0)->getColumnDimension("C")->setAutoSize(true);
        $file->setActiveSheetIndex(0)->getColumnDimension("D")->setAutoSize(true);
        $file->setActiveSheetIndex(0)->getColumnDimension("E")->setAutoSize(true);
        //4. Create Excel dan Download
        $writer = new Xlsx($file);
        $filename = $filename . ".xlsx";
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;filename=\"$filename\"");
        header("Cache-Control: max-age=0");
        $writer->save("php://output");
    }


    private function borderStyle()
    {
        return array(
            'borders' => array(
                'allBorders' => array(
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => array('argb' => '00000000'),
                ),
            ),
        );
    }

    private function header()
    {
        return array(
            'font' => array(
                'bold' => true,
                'size' => 12
            ),
            'alignment' => array(
                'horizontal' => "center",
            ),
        );
    }

    private function setFont($size = 12, $bold = false, $alignment = "left")
    {
        return array(
            'font' => array(
                'bold' => $bold,
                'size' => $size
            ),
            'alignment' => array(
                'horizontal' => $alignment,
            ),
        );
    }

    private function dataAlign($align)
    {
        return array(
            'alignment' => array(
                'horizontal' => $align,
            ),
        );
    }
}
