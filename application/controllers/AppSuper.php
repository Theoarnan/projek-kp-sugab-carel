<?php


class AppSuper extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array("ModelItemFormat", "AuthModel", "ModelNomerator", "modelCustomer", "ModelJenisKertas", "ModelPerforasi", "modelPegawai", "ModelOrder", "ModelTransaksi", "ModelBending", "ModelItemTransaksi", "ModelFormat", "ModelUv"));
		// isLogin();
		checkOnLogin();
	}

	public function index()
	{
		$listCustomer = $this->modelCustomer->getAll();
		$listPegawai = $this->modelPegawai->getAll();
		$listBending = $this->ModelBending->getAll();
		$listFormat = $this->ModelFormat->getAll();
		$listFormatAll = $this->ModelItemFormat->getAll();
		$listOrder = $this->ModelOrder->getAll();
		$listUV = $this->ModelUv->getAll();
		$listNomerator = $this->ModelNomerator->getAll();
		$listJenisKertas = $this->ModelJenisKertas->getAll();
		$listPerforasi = $this->ModelPerforasi->getAll();
		$data = array(
			"header" => "App",
			"page" => "contentSuper/app/v_form_app",
			"customers" => $listCustomer,
			"bendings" => $listBending,
			"pegawais" => $listPegawai,
			"orders" => $listOrder,
			"formatss" => $listFormatAll,
			"uvs" => $listUV,
			"nomerators" => $listNomerator,
			"jnskertass" => $listJenisKertas,
			"perforasis" => $listPerforasi,
			"formats" => $listFormat
		);
		$this->load->view("layoutSuper/dashboard", $data);
	}

	public function proses_transaksi()
	{
		$str_item_transaksi = $this->input->post("item_transaksi");
		$itemTransaksi = json_decode($str_item_transaksi);
		//1.cari dulu nilai terbesar dari id yang terakhir
		$queryMaxId = "select ifnull(max(nomor),0) as max from transaksi "
			. "WHERE MONTH(tanggal_transaksi) = MONTH(NOW()) AND YEAR(tanggal_transaksi)=YEAR(NOW())";
		$max = $this->db->query($queryMaxId)->row()->max;
		$max = (int) $max;
		// "TRX/2020/04/0120"
		$strPad = str_pad($max + 1, 4, "0", STR_PAD_LEFT);
		$noTransaksi = "TRX/" . date("Y/m") . "/" . $strPad;
		$dataTransaksi = array(
			"no_transaksi" => $noTransaksi,
			"tanggal_transaksi" => date("Y-m-d H:i:s"),
			"nomor" => ($max + 1)
		);
		$idTransaksi = $this->ModelTransaksi->insertGetId($dataTransaksi);
		//inputkan item transaksi
		$index = 0;
		foreach ($itemTransaksi as $item) {
			$itemTransaksi[$index++]->id_transaksi = $idTransaksi;
		}
		$result = $this->ModelItemTransaksi->insertBatch($itemTransaksi);
		echo $result;
	}

	public function proses_simpan()
	{
		$paramsFormat = $this->input->post('dataFormat');
		$paramsCustomer = $this->input->post('dataCustomer');
		$data = array(
			"kode_kustomer" => $paramsCustomer['kode_kustomer'],
			"nama_toko" => $paramsCustomer['nama_toko'],
			"alamat_toko" => $paramsCustomer['alamat_toko'],
			"no_order" => $paramsCustomer['no_order'],
			"no_po" => $paramsCustomer['no_po'],
			"no_pr" => $paramsCustomer['no_pr'],
			"tgl_order" => $paramsCustomer['tgl_order'],
			"tgl_minta_kirim" => $paramsCustomer['tgl_minta_kirim'],
			"rangkap" => $paramsCustomer['rangkap'],
			"jml_satuan_order" => $paramsCustomer['jml_satuan_order'],
			"buku" => $paramsCustomer['buku'],
			"set_buku" => $paramsCustomer['set_buku'],
			"kd_cabang" => $paramsCustomer['kd_cabang'],
			"nama_sales" => $paramsCustomer['nama_sales'],
			"jabatan" => $paramsCustomer['jabatan'],
			"offset_sablon_polos" => $paramsCustomer['offset_sablon_polos'],
			"perforasi" => $paramsCustomer['perforasi'],
			"nomerator" => $paramsCustomer['nomerator'],
			"warna_nomerator" => $paramsCustomer['warna_nomerator'],
			"bending" => $paramsCustomer['bending'],
			"uv_vernish_laminating" => $paramsCustomer['uv_vernish_laminating'],
			"foil" => $paramsCustomer['foil'],
			"degel" => $paramsCustomer['degel'],
			"catatan" => $paramsCustomer['catatan'],
		);
		$this->ModelOrder->insert($data);
		$cek = json_decode($paramsFormat);
		$datas = $cek->item_data;
		foreach ($datas as $item) {
			$dataSimpan[] = array(
				"format" => $item->format,
				"jns_kertas" => $item->jns_kertas,
				"warna_kertas" => $item->warna_kertas,
				"warna_tinta" => $item->warna_tinta,
				"jumlah_order" => $item->jumlah_order,
				"id_format" => $item->id_format
			);
		}
		// Id Format duplicate karna kampu ngisi Id Format dengan id_pemesanan yang bukan primary key jadi tak bisa dijadikan id
		// perbaiki no_order agar tidak null di database udah itu aja tugas kalian
		// Selain itu sudah bisa nambah data batch ke tabel format
		// Shapp Jos Benerin pada point satu dan dua selesai.. Mangats
		$this->ModelItemFormat->insertBatch($dataSimpan);
		if ($this->db->affected_rows() > 0) {
			$data = array("success" => true,);
		} else {
			$data = array("success" => false);
		}
		echo json_encode($data);
	}

	public function prosesSimpan()
	{
		$str_item_transaksi = $this->input->post("cet_table_format");
		$str_item_custommer = $this->input->post("cet_table_custommer");
		$dataFormat = array(
			//			"no_order" => $this->input->post('no-'),
			"no_order" => $this->input->post('no-order'),
			"format" => $this->input->post('format'),
			"jns_kertas" => $this->input->post('jns_kertas'),
			"warna_kertas" => $this->input->post('warna_kertas'),
			"warna_tinta" => $this->input->post('warna_tinta'),
			"jumlah_order" => $this->input->post('jumlah_order')
		);
		$this->ModelItemFormat->insertBatch($dataFormat);

		$itemFormat = json_decode($str_item_transaksi);
		$itemCustommer = json_decode($str_item_custommer);
		$idTransaksi = $this->ModelItemFormat->insertGetId($dataFormat);
		//inputkan item transaksi
		$index = 0;
		foreach ($itemFormat as $item) {
			$itemFormat[$index++]->id_format = $idTransaksi;
		}
		$result = $this->ModelItemFormat->insertBatch($itemFormat);
		echo $result;
	}
}
