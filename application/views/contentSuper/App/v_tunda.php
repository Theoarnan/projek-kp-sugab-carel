<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="card card-info">
            <div class="card-header">
                <h2>Data Transaksi Tunda</h2>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="text-align:center">No</th>
                            <th style="text-align:center">Tanggal Transaksi Tunda</th>
                            <th style="text-align:center">No Transaksi Tunda </th>
                            <!-- <th style="text-align:center">Harga Barang</th>
                            <th style="text-align:center">SubTotal</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        // $totalSemua = 0;
                        foreach ($tundas as $detail) {
                            // $totalHarga = (int) $detail->total_transaksi_item;
                            // $totalSemua += $totalHarga;
                        ?>
                            <tr>
                                <td style="text-align:center"><?= $no++ ?>.</td>
                                <td style="text-align:center"><?= $detail->tanggal_transaksi_tunda ?></td>
                                <td style="text-align:center"><?= $detail->No ?></td>
                                <!-- <td style="text-align:center"><?= formatRupiah($detail->harga_transaksi_item) ?></td>
                                <td style="text-align:center"><?= formatRupiah($detail->total_transaksi_item) ?></td> -->
                            </tr>
                        <?php
                        }
                        ?>
                        <!-- <tr>
                            <td colspan="4"><b>Total Semua :</b></td>
                            <td align="" style="text-align:center"><?= formatRupiah($totalSemua) ?></td>
                        </tr> -->
                        <td style="text-align:center">
                            <a href="<?= site_url("TransaksiSuper/detailTransaksi/$t->transaksi_id") ?>" class="btn btn-sm btn-info" data-title="Edit"><i class="fas fa-eye"></i>Proses Tansaksi Tunda</a>
                        </td>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
