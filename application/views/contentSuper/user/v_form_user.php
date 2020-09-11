<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            </div>
        </div>
        <div class="card card-info">
            <div class="card-header">
                <h1>Form Tambah Data User Akses</h1>
            </div>
	<div class="card-body">
		<form id="form-tambah" method="post" action="<?= site_url("user/prosesSimpan") ?>">
			<div class="form-group">
				<label for="">Username</label>
				<input required type="text" maxlength="20" name="username" class="form-control"/>
			</div>
			<div class="form-group">
				<label for="">Password</label>
				<input required type="password" name="password"  class="form-control"/>
			</div>
            <div class="form-group">
				<label for="">Nama</label>
				<input required type="text" name="nama_user"  class="form-control"/>
			</div>
			<div class="form-group">
				<label for="">Role User</label>
                <select id="select-user" class="form-control" name="role" style="width: 100%;">
                    <option value="" selected disabled>Pilih Role</option>
                    <option value="Superadmin">Superadmin</option>
                    <option value="Admin">Admin</option>
                </select>
			</div>
		</form>
	</div>
	<div class="card-footer">
		<button id="btn-save-barang" type="button" class="btn btn-success">
			<i class="fas fa-save"></i> Simpan
		</button>
	</div>
</div>
<script>
    $(function () {
        $("#btn-save-barang").on("click", function () {
            let validate = $("#form-tambah").valid();
            if(validate){
                $("#form-tambah").submit();
			}
        });
        $("#form-tambah-barang").validate({
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
