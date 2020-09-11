<div class="card">
    <div class="body">
        <form id="sign_in" method="post" action="<?= base_url() . "Register/prosesRegister" ?>">
            <div class="msg">
                <div>Silahkan Registrasi Akun</div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">person</i>
                    </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="nama" placeholder="Username" required autofocus>
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">email</i>
                    </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="email" placeholder="Email" required autofocus>
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock</i>
                    </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <button class="	btn btn-block bg-red waves-effect" type="submit"><b>REGISTER</b></button>
                    </div>
                </div>
        </form>
    </div>
</div>