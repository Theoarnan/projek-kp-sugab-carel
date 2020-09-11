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
                        <h1">Tambah Data Pegawai</h1>
                    </div>
                    <div class="card-body">
                        <form id="form-tambah-pegawai" method="post" action="<?= site_url('Pegawai/proses_simpan') ?>" role="form">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nama Pegawai</label>
                                        <input type="text" class="form-control form-control-sm" id="nama_pegawai" name="nama" placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat Pegawai</label>
                                        <input type="text" class="form-control form-control-sm" id="alamat_pegawai" name="alamat" placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select id="jenis_kelamin" name="jk" class="form-control form-control-sm" required>
                                            <option value="L">Laki laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <!-- <div class="form-group"> -->
                                    <!-- <label>Posisi</label> -->
                                    <!-- <select id="jabatan" name="jbtn" class="form-control form-control-sm" required>
                                            <option value="1">Admin</option>
                                            <option value="2">Kasir</option> -->
                                    <!-- <option value="3">staff</option> -->
                                    <!-- </select> -->
                                    <!-- </div> -->
                                </div>

                            </div>

                        </form>
                    </div>
                    <div class="card-footer">
                        <button id="btn-save-pegawai" type="button" class="btn btn-success"><i class="fas fa-file-export"></i>Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $(function() {
        $("#btn-save-pegawai").on("click", function() {
            let validate = $("#form-tambah-pegawai").valid();
            if (validate) {
                Swal.fire({
								icon: 'success',
								title: 'Selamat',
								text: ' Data pegawai anda telah ditambah',
							});
                $("#form-tambah-pegawai").submit();
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