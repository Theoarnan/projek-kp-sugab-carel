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
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h1">Ubah Data Kategori</h1>
                    </div>
                    <div class="card-body">
                        <form id="form-ubah-kategori" method="post" action="<?= site_url('Kategori/proses_update') ?>" role="form">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nama Pegawai</label>
                                        <input type="text" class="form-control form-control-sm" id="nama_kategori" name="nama" value="<?= $kategoris->nama_kategori ?>" placeholder="Enter ..." required>
                                    </div>
                                   
                                </div>
                            </div>


                    </div>
                    <div class="card-footer">
                        <button id="btn-save" class="btn btn-sm btn-success"><i class="fas fa-edit"></i>Ubah</button>
                    </div>
                    <input type="hidden" id="id_kategori" name="id_kategori" value="<?= $kategoris->id_kategori; ?>" />
                    </form>
                </div>
            </div>
        </div>
</div>
</section>
<!--  -->
</div>
<script>
    $(function() {
        $("#btn-save").on("click", function() {
            let validate = $("#form-ubah-kategori").valid();
            if (validate) {
                Swal.fire({
								icon: 'success',
								title: 'Selamat',
								text: ' Data kategori telah du ubah',
							});
                $("#form-ubah-kategori").submit();
            }
        });
        $("#form-ubah-kategori").validate({
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