<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            </div>
        </div>
        <div class="card card-info">
            <div class="card-header">
                <h1>Form ubah Data User Akses</h1>
            </div>
	<div class="card-body">
		<form id="form-tambah" method="post" action="<?= site_url("user/proses_simpan") ?>">
			<div class="form-group">
				<label for="">Username</label>
				<input required type="text" value="<?= $users->username?>" maxlength="20" name="username" class="form-control"/>
			</div>
			<div class="form-group">
				<label for="">Password</label>
				<input required type="password" value="<?= $users->password?>" name="password"  class="form-control"/>
			</div>
            <div class="form-group">
				<label for="">Nama</label>
				<input required type="text" value="<?= $users->nama_user?>" name="nama_user" class="form-control"/>
			</div>
			<div class="form-group">
				<label for="">Role User</label>
				<select name="role" value="<?= $users->role?>" required class="form-control">
					<option value="" disabled selected>Pilih Role</option>
					<option value="admin">Super Admin</option>
					<option value="kasir">Admin</option>
                    <option value="user">User</option>
				</select>
			</div>
		</form>
	</div>
	<div class="card-footer">
		<button id="btn-save-barang" type="button" class="btn btn-success">
			<i class="fas fa-edit"></i> Ubah
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
