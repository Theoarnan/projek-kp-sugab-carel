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
                        <h1">Ubah Data Pegawai</h1>
                    </div>
                    <div class="card-body">
                        <form id="form-ubah-pegawai" method="post" action="<?= site_url('Pegawai/proses_update') ?>" role="form">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nama Pegawai</label>
                                        <input type="text" class="form-control form-control-sm" id="nama_pegawai" name="nama" value="<?= $pegawais->nama_pegawai ?>" placeholder="Enter ..." required>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat Pegawai</label>
                                        <input type="text" class="form-control form-control-sm" id="alamat_pegawai" name="alamat" value="<?= $pegawais->alamat_pegawai ?>" placeholder="Enter ..." required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select id="jenis_kelamin" value="<?= $pegawais->jenis_kelamin ?>" name="jk" class="form-control form-control-sm">
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label>Posisi</label>
                                        <select id="jabatan" value="<?= $pegawais->jabatan ?>" name="jbtn" class="form-control form-control-sm">
                                            <option value="1">Admin</option>
                                            <option value="2">Kasir</option>
                                            <!-- <option value="3">staff</option> -->
                                    </select>
                                </div>
                            </div>


                    </div>
                    <div class="card-footer">
                        <button id="btn-save" class="btn btn-sm btn-success"><i class="fas fa-edit"></i>Ubah</button>
                    </div>
                    <input type="hidden" id="id_pegawai" name="id_pegawai" value="<?= $pegawais->id_pegawai; ?>" />
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
            let validate = $("#form-ubah-pegawai").valid();
            if (validate) {
                Swal.fire({
								icon: 'success',
								title: 'Selamat',
								text: ' Data pegawai telah du ubah',
							});
                $("#form-ubah-pegawai").submit();
            }
        });
        $("#form-ubah-pegawai").validate({
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