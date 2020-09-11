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
                        <h1">Ubah Data Customer</h1>
                    </div>
                    <div class="card-body">
                        <form id="form-ubah-customer" method="post" action="<?= site_url('Customer/proses_update') ?>" role="form">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Id Kustomer</label>
                                        <input type="text" class="form-control form-control-sm"  id="id_kustomer" name="id_kustomer" value="<?= $customers->id_kustomer ?>" placeholder="" required>
                                    </div>
                                    </div>

                                    <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Kd Kustomer Kategori</label>
                                        <input type="text" class="form-control form-control-sm"  id="kd_kuskategori" name="kd_kuskategori" value="<?= $customers->kd_kuskategori ?>" placeholder="" required>
                                    </div>
                                    </div>

                                    <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Nama Toko</label>
                                        <input type="text" class="form-control form-control-sm"  id="nama_toko" name="nama_toko" value="<?= $customers->nama_toko ?>" placeholder="" required>
                                    </div>
									</div>
                                    
                                    <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Kode Kustomer Besoft</label>
                                        <input type="text" class="form-control form-control-sm"  id="kode_kustomer_besoft" name="kode_kustomer_besoft"  value="<?= $customers->kode_kustomer_besoft ?>" placeholder="" required>
                                    </div>
                                    </div>

                                    <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Alamat Toko</label>
                                        <input type="text" class="form-control form-control-sm"  id="alamat_toko" name="alamat_toko" value="<?= $customers->alamat_toko ?>" placeholder="" >
                                    </div>
                                    </div>

                                    <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Kota Toko</label>
                                        <input type="text" class="form-control form-control-sm" id="kota_toko" name="kota_toko" value="<?= $customers->kota_toko ?>" placeholder="" >
                                    </div>
                                    </div>

                                    
                                    <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Telepon Toko</label>
                                       <input type="text" id="telepon_toko" name="telepon_toko" value="<?= $customers->telepon_toko ?>" class="form-control form-control-sm" required>
                                            <!-- <option value="Telepon1">Telepon1</option>
                                            <option value="Telepon2">Telepon2</option> 
                                            <option value="Mobile">Mobile</option>
                                            <option value="Fax">Fax</option> 
                                     </select> -->
                                    </div>
                                    </div>

                                    <div class="col-md-2">
                                    <div class="form-group">
                                        <label>No NPWP</label>
                                        <input type="text" class="form-control form-control-sm" id="no_npwp" name="no_npwp" value="<?= $customers->no_npwp ?> "placeholder="" >
                                    </div>
                                    </div>

                                    <div class="col-md-2">
                                    <div class="form-group">
                                        <label>PIC</label>
                                        <input type="text" class="form-control form-control-sm" id="pic" name="pic" value="<?= $customers->pic ?> "placeholder="" >
                                    </div>
                                    </div>
<!--                                              <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Penjualan</label>
                                        <input type="number" class="form-control form-control-sm" id="penjualan" name="penjualan" placeholder="" >
                                    </div>
                                    </div> -->
                               
                            </div>  
                                </div>

                            </div>

                        </form>
                    </div>
                    
                    <div class="card-footer">
                        <button id="btn-save" type="button" class="btn btn-success"><i class="fas fa-edit"></i>Ubah</button>
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
            let validate = $("#form-ubah-customer").valid();
            if (validate) {
                Swal.fire({
								icon: 'success',
								title: 'Selamat',
								text: ' Data customer telah du ubah',
							});
                $("#form-ubah-customer").submit();
            }
        });
        $("#form-ubah-customer").validate({
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