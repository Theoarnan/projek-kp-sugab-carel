<?php

use Sabberworm\CSS\Comment\Comment;
use Sabberworm\CSS\Value\Value;

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
		checkOnLogin();
        // roleAkses();
        $this->load->model(array("modelPegawai", "ModelItemFormat", "ModelLog", "modelBarang", "ModelOrder", "ModelBending"));
    }

    public function index()
    {
        $listTransaksi = $this->ModelOrder->getAll();
        $data = array(
            "header" => "Data Transaksi Super",
            "orders" => $listTransaksi,
            "page" => "contentSuper/Transaksi/v_list_transaksi"
        );
        $this->load->view("layoutSuper/dashboard", $data);
    }

    public function register()
    {
        $data = array(
            "page" => "content/Pegawai/v_add_pegawai"
        );
        $this->load->view("layout/dashboard", $data);
    }

	public function detail_order($idOrder)
	{
//		$noOrder = $this->input->post("no_order", true);
		$order = $this->ModelOrder->getByPrimaryKey($idOrder);
		$itemFormat = $this->ModelItemFormat->getNoOrderById($idOrder);
		$pegawai = $this->modelPegawai->getAll();
		$data = array(
			"header" => "Detail Order",
			"order" => $order,
			"formats" => $itemFormat,
			"pegawais" => $pegawai,
			"page" => "contentSuper/Transaksi/v_detail_transaksi"
		);

		$this->load->view("layoutSuper/dashboard", $data);
	}

	public function bayar_order($noOrder){
		$log = $this->ModelLog->getNoOrderById($noOrder);
		$data = array(
			"header" => "Detail Order",
			"logs" => $log,
			"page" => "contentSuper/Transaksi/v_bayar_transaksi"
		);
		$this->load->view("layoutSuper/dashboard", $data);
	}

    public function update()
    {
        $data = array(
            "page" => "content/Pegawai/v_update_pegawai"
        );
        $this->load->view("layout/dashboard", $data);
    }

	public function proses_update()
	{
		$id = $this->input->post("id_order", true);
		$noOrder = $this->input->post("no_order", true);
		$namaSales = $this->input->post("nama_sales", true);
		$harga = $this->input->post("harga_order", true);
		$piutang = $this->input->post("piutang", true);
		$total = $this->input->post("total", true);
		$piutang = str_replace('.','',$piutang);
		$harga = str_replace('.','',$harga);
		$getTotal = $this->ModelOrder->getSubTotalById($id);
//		var_dump($getTotal);
//		die();
		if($getTotal == '0'){
			$hasil = $harga;
		}else if($getTotal ==  $harga){
			$hasil = $harga - $piutang;
		} else {
			$hasil = $getTotal - $piutang;
		}

		$orders = array(
			"harga_order" => $harga,
			"total" => $hasil,
			"piutang" => $piutang
		);

		helper_log($noOrder, $namaSales, $harga, $piutang, $hasil);
		$this->ModelOrder->update($id, $orders);
//		$this->ModelRiwayatOrder->update($id, $orders);
		redirect("Transaksi");
	}

    // TransTunda
    public function Tunda()
    {
        $this->load->model("modelTransaksiTunda");
        $listTunda = $this->modelTransaksiTunda->getAll();
        // $item = $this->ModelTransaksi->getItemBarangTunda();
        $data = array(
            "header" => "TransaksiSuper Tunda",
            "tundas" => $listTunda,
            // "item" => $item,
            "page" => "content/App/Tunda/v_tunda"
        );
        $this->load->view("layout/dashboard", $data);
    }


    public function detailTransaksi($id)
    {
        //     $detailTransaksi = $this->ModelTransaksi->getByPrimaryKey($id);
        $listDetail = $this->ModelItemTransaksi->getDetailTransaksi($id);

        $data = array(

            "header" => "Aplikasi Kasir",
            "detail" => $listDetail,
            // "listDetails" => $listDetail,
            "page" => "content/TransaksiSuper/v_transaksi_detail"
        );

        $this->load->view("layout/dashboard", $data);
    }

    public function app()
    {
        $listBarang = $this->modelBarang->getAll();
        $listBending = $this->ModelBending->getAll();
        $item = $this->ModelTransaksi->getItemBarang();
        $data = array(
            "header" => "Aplikasi Kasir",
            "barangs" => $listBarang,
            "bendings" => $listBending,
            "item" => $item,
            "page" => "contentSuper/App/v_form_app"
        );
        $this->load->view("layoutSuper/dashboard", $data);
    }

    // proses data Masuk ke keranjang
    public function proses_item_barang()
    {
        $item = $this->input->post(null, TRUE);

        if (isset($_POST['add_item'])) {
            $Barangid = $this->input->post('id_barang');

            $cekQuantity = $this->ModelTransaksi->getitemBarang(['item.id_barang' => $Barangid])->num_rows();
            if ($cekQuantity > 0) {
                $this->ModelTransaksi->ubahitemQuantity($item);
            } else {
                $this->ModelTransaksi->insertCart($item);
            }
            if ($this->db->affected_rows() > 0) {
                $item = array("success" => true);
            } else {
                $item = array("success" => false);
            }
            echo json_encode($item);
        } else if (isset($_POST['proses_item'])) {

            $transaksi_id = $this->ModelTransaksi->insertGetId($item);

            $item = $this->ModelTransaksi->getItemBarang()->result();
            // $itemData =  $this->input->post('item_id');
            // $index = 0;
            $row = [];
            foreach ($item as $k => $value) {
                array_push(
                    $row,
                    array(
                        'transaksi_id' => $transaksi_id,
                        'barang_id' => $value->id_barang,
                        'harga_transaksi_item' => $value->harga_barang,
                        'qty_transaksi_item' => $value->quantity,
                        'total_transaksi_item' => $value->total_item,
                    )
                );
            }
            $this->ModelTransaksi->insertBatch($row);

            // $this->ModelTransaksi->hapus_data_item($item);
            // $this->ModelTransaksi->deleteitem($item);
            $this->ModelTransaksi->hapus_data_item(['serahlah' => 1]);

            if ($this->db->affected_rows() > 0) {
                $item = array("success" => true);
            } else {
                $item = array("success" => false);
            }
            echo json_encode($item);

            //proses Tundanya

        } else if (isset($_POST['proses_tunda'])) {

            //1.cari dulu nilai terbesar dari id yang terakhir
            $queryMaxId = "select ifnull(max(no),0) as max from transaksi_tunda "
                . "WHERE MONTH(tgl_transaksi_tunda) = MONTH(NOW()) AND YEAR(tgl_transaksi_tunda)=YEAR(NOW())";
            $max = $this->db->query($queryMaxId)->row()->max;
            $max = (int) $max;
            // "TRX/2020/04/0120"
            $strPad = str_pad($max + 1, 4, "0", STR_PAD_LEFT);
            $noTransaksi = "TRXTUNDA/" . date("Y/m") . "/" . $strPad;
            $dataTransaksi = array(
                "no_tunda" => $noTransaksi,
                "tgl_transaksi_tunda" => date("Y-m-d H:i:s"),
                "no" => ($max + 1)
            );
            $idTunda = $this->ModelTransaksi->insertGetIdTransaksi($dataTransaksi);
            $itemBarang = $this->ModelTransaksi->getItemBarang()->result();
            $row = [];
            foreach ($itemBarang as $k => $value) {
                array_push(
                    $row,
                    array(
                        'transaksi_tunda_id' => $idTunda,
                        'id_barang' => $value->id_barang,
                        'harga_tunda' => $value->harga_barang,
                        'quantity_tunda' => $value->quantity,
                        'total_item_tunda' => $value->total_item,
                    )
                );
            }
            $this->modelTransaksiTunda->insertBatch($row);

            $this->ModelTransaksi->hapus_data_item(['serahlah' => 1]);
            if ($this->db->affected_rows() > 0) {
                $item = array("success" => true);
            } else {
                $item = array("success" => false);
            }
            echo json_encode($item);
        }
    }

    public function data_item()
    {
        $item = $this->ModelTransaksi->getitemBarang();
        $data['item'] = $item;
        $this->load->view('content/app/item', $data);
    }

    public function hapus_data_item()
    {
        $itemData =  $this->input->post('item_id');
        $this->ModelTransaksi->hapus_data_item(['item_id' => $itemData]);

        if ($this->db->affected_rows() > 0) {
            $params = array("success" => true);
        } else {
            $params = array("success" => false);
        }
        echo json_encode($params);
    }

    public function prosesTransaksiTunda()
    {
        $id = $this->input->post("id_tunda");
        $item = $this->modelTransaksiTunda->get_item_tunda_bykode($id);
        $row = [];
        foreach ($item as $k => $value) {
            array_push(
                $row,
                array(
                    "item_id" => $value->id_item_tunda,
                    "id_barang" => $value->id_barang,
                    "harga_item" => $value->harga_tunda,
                    "quantity" => $value->quantity_tunda,
                    "total_item" => $value->total_item_tunda,
                )
            );
        }
        $this->modelTransaksiTunda->insertBatchItemTunda($row);

        $this->modelItemTransaksiTunda->delete_tunda_item(['transaksi_tunda_id' => $id]);
        $this->modelTransaksiTunda->hapus_data_transaksi_tunda(['id_tunda' => $id]);


        if ($this->db->affected_rows() > 0) {
            $params = array("success" => true);
        } else {
            $params = array("success" => false);
        }
        echo json_encode($params);
    }


    function print_detail($id)
    {
        $detail = $this->ModelItemTransaksi->getDetailTransaksi($id);
        $data = array(
            "header" => " Print detail",
            "detail" => $detail,
        );
        $html = $this->load->view('content/TransaksiSuper/print/detail_print', $data, true);
        $this->fungsi->createPDF($html, 'Nama', 'A4', 'landscape');
    }
}
