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
                <h2>Data Transaksi</h2>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="text-align:center">No.</th>
                            <th style="text-align:center">No. Order</th>
                            <th style="text-align:center">No. PO</th>
                            <th style="text-align:center">No. PR</th>
                            <th style="text-align:center">Tanggal Order</th>
                            <th style="text-align:center">Tanggal Minta Dikirim</th>
                            <th style="text-align:center">Harga</th>
                            <th style="text-align:center">Pembayaran</th>
                            <th style="text-align:center">Sub Total</th>
                            <th style="text-align:center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php
					$no = 1;
					foreach ($orders as $o) {
					?>
                            <tr>
                                <td style="text-align:center"><?= $no++ ?></td>
                                <td style="text-align:center"><?= $o->no_order ?></td>
                                <td style="text-align:center"><?= $o->no_po ?></td>
                                <td style="text-align:center"><?= $o->no_pr ?></td>
                                <td style="text-align:center"><?= $o->tgl_order ?></td>
                                <td style="text-align:center"><?= $o->tgl_minta_kirim ?></td>
                                <td style="text-align:center"><?= formatRupiah($o->harga_order) ?></td>
                                <td style="text-align:center"><?= formatRupiah($o->piutang) ?></td>
                                <td style="text-align:center"><?= formatRupiah($o->total) ?></td>
                                <td style="text-align:center">
									<a href="<?= site_url('Transaksi/detail_order/') . $o->id_order ?>"
									   class="btn btn-sm bg-gradient-fuchsia">
										<i class="fas fa-eye"></i></a>
									<a href="<?= site_url('Transaksi/bayar_order/') . $o->no_order ?>"
									   class="btn btn-sm bg-gradient-fuchsia">
										<i class="fas fa-edit"></i></a>
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
