<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

            </div>
        </div>
        <div class="card card-dark">
            <div class="card-header">
                <h1>Data Barang</h1>
            </div>
            <div class="card-footer">
                <a href="<?= site_url(array("BarangSuper", "register")) ?>" class="btn btn-success"><i class="fas fa-folder-plus"></i>
                    Tambah Data Barang
                </a> &nbsp;
                <a href="<?= site_url("Report/barang") ?>" target="_blank" class="btn  btn-success">
                    <i class="fas fa-file-excel"></i>
                    Report Data Barang
                </a>

            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width:3%; text-align:center">No</th>
                            <th style="width:15%; text-align:center">Nama Barang</th>
                            <th style="width:11%; text-align:center">Kode Kategori</th>
                            <th style="width:12%;text-align:center">ISBN</th>
                            <th style="width:15%; text-align:center">Halaman</th>
                            <th style="width:7%; text-align:center">Status Display</th>
                            <th style="width:7%; text-align:center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($barangs as $barang) {
                        ?>
                            <tr>
                                <td style="text-align:center;"><?= $no++ ?>.</td>
                                <td style="text-align:center;"><?= $barang->nama_barang ?></td>
                                <td style="text-align:center;"><?= $barang->kd_kategori ?></td>
                                <td style="text-align:center;"><?= $barang->isbn ?></td>
                                <td style="text-align:center;"><?= $barang->halaman ?></td>
                                <td style="text-align:center;"><?= $barang->status_display ?></td>
                                <td style="text-align:center">
                                    <a href="<?= site_url("BarangSuper/detail_barang/$barang->id_barang") ?>" class="btn btn-sm btn-secondary" data-title="Edit"><i class="fas fa-eye"></i></a>
                                    <a href="<?= site_url("BarangSuper/update/$barang->id_barang") ?>" class="btn btn-sm btn-warning" data-title="Edit"><i class="fas fa-edit"></i></a>
                                    <a href="#" data-id="<?= $barang->id_barang ?>" id="delete_id" class="btn btn-sm btn-danger tombolHapus">
                                        <i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </tablssse>
            </div>
        </div>
        </section>
    </div>
    <script>
        $(function() {
            let idUser = 0;
            $(".tombolHapus").on("click", function() {
                var id = $(this).data('id');
                SwalDelete(id);
                console.log(id);
            });
        });

        function SwalDelete(id) {
            Swal.fire({
                title: ' Hapus Data Barang Ini?',
                text: " ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#20B2AA',
                cancelButtonColor: '#FF7F00',
                confirmButtonText: 'Hapus Data ',
                showLoaderOnConfirm: true,
                preConfirm: function() {
                    return new Promise(function(resolve) {
                        var url = "Barang/proses_delete/"
                        $.ajax({
                                url: '<?= base_url() ?>' + url + id,
                                type: "POST",
                            })
                            .done(function(id) {
                                window.location.replace("<?= site_url("Barang") ?>");
                                Swal.fire('Hapus Data Berhasil', 'Data Anda Telah Terhapus!', 'success')
                            })
                            .fail(function() {
                                Swal.fire('Maaf', 'Data Anda Sudah Masuk proses Transaksi', 'error')
                            });
                    });
                },
            });
        }
    </script>