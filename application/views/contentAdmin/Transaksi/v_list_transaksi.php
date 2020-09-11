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
                <h2>Data Riwayat Transaksi</h2>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="text-align:center">No.</th>
                            <th style="text-align:center">No. Transaksi</th>
                            <th style="text-align:center">Tanggal Pesan  Barang</th>
                            <th style="text-align:center">Total Transaksi</th>
                            <th style="text-align:center">Diskon Harga</th>
                            <th style="text-align:center">Uang Pmbayaran</th>
                            <th style="text-align:center">Kembalian</th>
                            <th style="text-align:center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($transaksis as $t) {
                        ?>
                            <tr>
                                <td style="text-align:center"><?= $no++ ?>.</td>
                                <td style="text-align:center"><?= $t->transaksi_nomor ?></td>
                                <td style="text-align:center"><?= $t->transaksi_tanggal ?></td>
                                <td style="text-align:center"><?= formatRupiah($t->total) ?></td>
                                <td style="text-align:center"><?= formatRupiah($t->diskon_utama) ?></td>
                                <td style="text-align:center"><?= formatRupiah($t->bayar_utama) ?></td>
                                <td style="text-align:center"><?= formatRupiah($t->kembali_utama) ?></td>
                                <td style="text-align:center">
                                    <a href="<?= site_url("TransaksiSuper/detailTransaksi/$t->transaksi_id") ?>" class="btn btn-sm btn-success" data-title="Edit"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
