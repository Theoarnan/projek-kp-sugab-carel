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
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h1">Tambah Data Katrgori</h1>
                    </div>
                    <div class="card-body">
                        <form id="form-tambah-kategori" method="post" action="<?= site_url('KategoriSuper/proses_simpan') ?>" role="form">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nama Kategori</label>
                                        <input type="text" class="form-control form-control-sm" id="nama_pegawai" name="nama" placeholder="" required>
                                    </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button id="btn-save-kategori" type="button" class="btn btn-success"><i class="fas fa-file-export"></i>Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $(function() {
        $("#btn-save-kategori").on("click", function() {
            let validate = $("#form-tambah-kategori").valid();
            if (validate) {
                Swal.fire({
								icon: 'success',
								title: 'Selamat',
								text: ' Data kategori anda telah ditambah',
							});
                $("#form-tambah-kategori").submit();
            }
        });
        $("#form-tambah-pegawai").validate({
            rules: {
                nomer: {
                    digits: true
                },
                alamat: {
                    required: true
                }
            },
            messages: {
                kode: {
                    digits: "Hanya nomer saja"
                }
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