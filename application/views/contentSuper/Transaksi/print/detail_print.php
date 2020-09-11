<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Print Detail Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h2>Data Detail Transaksi</h2>&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="card card-info">


            <!-- <div class="card-footer">
                <a href="" target="_blank" class="btn btn-lg btn-primary"><i class="fas fa-print"></i>
                    Print Laporan Transaksi
                </a>
            </div> -->
            <div class="card-body">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="text-align:center">No</th>
                            <th style="text-align:center">Nama Merek Barang</th>
                            <th style="text-align:center">Quantity </th>
                            <th style="text-align:center">Harga Barang</th>
                            <th style="text-align:center">SubTotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $totalSemua = 0;
                        foreach ($detail as $detail) {
                            $totalHarga = (int) $detail->total_transaksi_item;
                            $totalSemua += $totalHarga;
                        ?>
                            <tr>
                                <td style="text-align:center"><?= $no++ ?>.</td>
                                <td style="text-align:center"><?= $detail->nama_barang ?></td>
                                <td style="text-align:center"><?= $detail->qty_transaksi_item ?></td>
                                <td style="text-align:center"><?= formatRupiah($detail->harga_transaksi_item) ?></td>
                                <td style="text-align:center"><?= formatRupiah($detail->total_transaksi_item) ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td colspan="4"><b>Total Semua :</b></td>
                            <td align="" style="text-align:center"><?= formatRupiah($totalSemua) ?></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

</html>