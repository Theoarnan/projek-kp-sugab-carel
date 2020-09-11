<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <?php $this->view('message') ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h4>Tambah Data Barang</h4>
                    </div>
                    <div class="card-body">
                        <form id="form-barang" enctype="multipart/form-data" method="post" action="<?= site_url('Barang/proses_simpan') ?>" role="form">
                            <div class="form-group">
                                <label>Masukkan kode barcode</label>
                                <input type="text" class="form-control" value="<?= $barangs->barcode_barang ?>" id="barcode-barang" name="barcode" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control" value="<?= $barangs->nama_barang ?>" id="nama-barang" name="nama_barang" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Harga Barang</label>
                                <input type="text" class="form-control" value="<?= $barangs->harga_barang ?>" id="harga-barang" name="harga_barang" placeholder="" >
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <div class="form-group">
                                        <label>Pilih Kategori</label>
                                        <select id="select-kategori" class="form-control" name="kategori" style="width: 100%;" required>
                                            <option value="" selected disabled>Pilih Kategori</option>
                                            <?php
                                            foreach ($kategories as $kategori) { ?>
                                                <option value="<?= $kategori->id_kategori ?>" <?= $kategori->id_kategori == $barangs->kategori_id ? "selected" : null ?>><?= $kategori->nama_kategori ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="gambar_barang">File Gambar</label>
                                        <div class="input-group">
                                            <div class="file form-control form-control-sm">
                                                <input type="file" value="<?= $barangs->gambar_barang ?>" class="form-control form-control-sm" id="gambar_barang" name="gambar">
                                                <label class="custom-file-label" for="gambar_barang">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Stok Barang</label>
                                <input type="number" class="form-control" value="<?= $barangs->stock_barang ?>" id="stock-barang" name="stock_barang" placeholder="" >
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Barang</label>
                                <textarea type="text" class="form-control" rows="3" value="<?= $barangs->detail_barang ?>" id="detail-barang" name="detail_barang" required></textarea>
                            </div>
                            <div class="card-footer ">
                                <button id="btn-save-barang" type="submit" name="<?= $pages ?>" class="btn btn-success"><i class="fas fa-file-export"></i>Simpan</button>
                            </div>
                            <input type="hidden" id="id" name="id_barang" value="<?= $barangs->id_barang; ?>" />
                        </form>
                    </div>
                </div>
            </div>

    </section>
    <!-- /.content -->
</div>


<script>
    $(function() {
        $("#select-kategori").select2()
        $("#jenis_kemasan").select2()
    });

    // <!-- //Buat Preview Image -->
    $("#gambar_barang").change(function(event) {
        fadeInAdd();
        getURL(this);
    });

    $("#gambar_barang").on('click', function(event) {
        fadeInAdd();
    });

    function getURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var filename = $("#gambar_barang").val();
            filename = filename.substring(filename.lastIndexOf('\\') + 1);
            reader.onload = function(e) {
                debugger;
                $('#imgView').attr('src', e.target.result);
                $('#imgView').hide();
                $('#imgView').fadeIn(500);
                $('.custom-file-label').text(filename);
            }
            reader.readAsDataURL(input.files[0]);
        }
        $(".alert").removeClass("loadAnimate").hide();
    }

    function fadeInAdd() {
        fadeInAlert();
    }

    function fadeInAlert(text) {
        $(".alert").text(text).addClass("loadAnimate");
        k
    }

    $(function() {
        $("#btn-save-barang").on("click", function() {
            let validate = $("#form-barang").valid();
            if (validate) {
                Swal.fire({
								icon: 'success',
								title: 'Selamat',
								text: ' Data Barang anda berhasil ditambah',
							});
                $("#form-barang").submit();
            }
        });
        $("#form-barang").validate({
            rules: {
                nama_bar: {
                    required: true
                },
                jk: {
                    required: true
                },
                detail_bar: {
                    required: true
                },
                barcode_bar: {
                    required: true,
                    minlength: 5
                }
            },
            messages: {
                nama_bar: {
                    required: "Anda belum masukan nama barang",
                },
                jk: {
                    required: "Anda belum memasukkan jenis kemasan"
                },
                detail_bar: {
                    required: "Anda belum memasukkan deskripsi barang"
                },
                barcode_bar: {
                    required: "Anda belum memasukkan kode barcode",
                    minlength: "Kode Barang minimal 5 karakter"
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>