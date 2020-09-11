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
                <h2>Data Transaksi Tertunda</h2>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width:12%; text-align:center">No</th>
                            <th style="width:12%; text-align:center">No Tansaksi Tunda</th>
                            <th style="width:12%; text-align:center">Tanggal Transaksi Tunda</th>
                            <th style="width:12%; text-align:center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($tundas as $tunda) {
                        ?>
                            <tr>
                                <td style="width:12%; text-align:center"><?= $no++ ?>.</td>
                                <td style="width:12%; text-align:center"><?= $tunda->no_tunda ?></td>
                                <td style="width:12%; text-align:center"><?= $tunda->tgl_transaksi_tunda ?></td>
                                <td style="width:12%; text-align:center">
                                    <button class="btn btn-success" id="btn-proses-tunda" data-tundaid="<?= $tunda->id_tunda ?>" data-title="Edit"><i class="fas fa-history"></i> Proses Kembali Transaksi Tertunda</button>
                                    <!-- <a href="<?= site_url("TransaksiSuper/prosesTunda/$t->id_transaksi_tunda") ?>" class="btn btn-sm btn-warning" id="btn-proses-tunda" data-tundaid="<?= $t->id_transaksi_tunda ?>" data-title="Edit"><i class="fas fa-shopping-cart"></i> Proses Transaksi</a> -->
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
<script>
    $(document).on('click', '#btn-proses-tunda', function() {
        var id_tunda = $(this).data('tundaid');
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('TransaksiSuper/prosesTransaksiTunda') ?>",
            dataType: "JSON",
            data: {
                id_tunda: id_tunda
            },
            cache: false,
            success: function(result) {
                if (result.success == true) {
                    window.location.replace('<?= base_url("transaksi/app") ?>');
                    $('#table_keranjang').load('<?= site_url('transaksi/data_item ') ?>', function() {
                        dataTransaksi()
                    })
                    $("#barcode_barang").val("")
                    $("#barcode_barang").focus()
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Gagal!',
                    });
                }
            }
        });
    });
</script>
