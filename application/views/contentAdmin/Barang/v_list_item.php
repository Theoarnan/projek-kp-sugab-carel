<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

            </div>
        </div>
        <div class="card card-info">
            <div class="card-header">
                <h1>Data Barang</h1>
            </div>
            <div class="card-footer">
                <a href="<?= site_url(array("BarangAdmin", "register")) ?>" class="btn btn-success"><i class="fas fa-folder-plus"></i>
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
                            <th style="width:11%; text-align:center">Kode Barang</th>
                            <th style="width:15%; text-align:center">Nama Barang</th>
                            <th style="width:12%;text-align:center">Kategori</th>
                            <th style="width:15%; text-align:center">Harga Barang</th>
                            <th style="width:7%; text-align:center">Stock</th>
                            <th style="width:10%; text-align:center">Gambar</th>
                            <th style="width:10%; text-align:center">Deskripsi Barang</th>
                            <th style="width:12%; text-align:center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($barangs as $barang) {
                        ?>
                            <tr>
                                <td style="text-align:center;"><?= $no++ ?>.</td>
                                <td style="text-align:center;"><?= $barang->barcode_barang ?></td>
                                <td style="text-align:center;"><?= $barang->nama_barang ?></td>
                                <td style="text-align:center;"><?= $barang->nama_kategori ?></td>
                                <td style="text-align:center;"><?= formatRupiah($barang->harga_barang) ?></td>                               
                                <td style="text-align:center;"><?= $barang->stock_barang == null ? "0" : $barang->stock_barang ?></td>
                                <td style="text-align:center;">
                                    <img class="img" width="140" height="90" src='<?= base_url('images/barang/' . $barang->gambar_barang) ?>' onerror="this.onerror=null;this.src='<?= base_url() . "images/index.png" ?>';" alt="<?= $barang->gambar_barang ?>">
                                </td>
                                <td style="text-align:center;"><?= $barang->detail_barang ?></td>
                                <td style="text-align:center">
                                    <a href="<?= site_url("BarangAdmin/createBarcode/$barang->id_barang") ?>" class="btn btn-sm btn-secondary" data-title="Edit"><i class="fas fa-barcode"></i></a>
                                    <a href="<?= site_url("BarangAdmin/update/$barang->id_barang") ?>" class="btn btn-sm btn-warning" data-title="Edit"><i class="fas fa-edit"></i></a>
                                    <!-- <a href="#" data-id="<?= $barang->id_barang ?>" id="delete_id" class="btn btn-sm btn-danger tombolHapus">
                                        <i class="fas fa-trash"></i></a> -->
                                    <!-- <a href="<?= site_url("BarangAdmin/update/$barang->id_barang") ?>" class="btn btn-sm btn-info" data-title="Edit"><i class="fas fa-eye"></i></a> -->
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
                // e.preventDefault();
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