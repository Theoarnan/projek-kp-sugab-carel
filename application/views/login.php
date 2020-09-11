<form action="<?= site_url('Login/proses') ?>" method="post" id="form-login">
    <div class="input-group mb-3">
        <input type="text" name="username" class="form-control" placeholder="Username" required>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                    Remember Me
                </label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <button type="submit" name="login" id="btn-login" class="btn btn-success btn-block btn-flat">LOGIN</button>
        </div>
    </div>
</form>
<br>
<script>
    $(function() {
        $("#btn-login").on("click", function() {
            let validate = $("#form-login").valid();
            if (validate) {
                // Swal.fire({
                //     title: "Processing Data..",
                //     text: "Data sedang berkelana",
                //     imageUrl: '<?= base_url() ?>' + "images/loadings.gif",
                //     showConfirmButton: false,
                //     allowOutsideClick: false
                // });
                $("#form-login").submit();
            }
        });
        $("#form-login").validate({
            rules: {
                username: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 5,
                }
            },
            messages: {
                username: {
                    required: "Anda belum memasukan username",
                },
                password: {
                    required: "Anda belum memasukkan password",
                    minlength: "Password kurang"
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

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <?php $this->load->view($page); ?>
        </div>
    </section>
    <!-- /.content -->
</div>