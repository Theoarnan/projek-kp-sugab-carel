<div class="card">
    <div class="body">
        <form id="sign_in" method="post" action="<?php echo site_url("Auth"); ?>">
            <div class="msg"><b>Error Login, Silakan login kembali</b> </div>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="material-icons">person</i>
                </span>
                <div class="form-line">
                    <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
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
                <div class="col-xs-4">
                    <button id="btn-login" class="btn btn-block bg-green waves-effect" type="submit">LOGIN</button>
                </div>
            </div>
        </form>
    </div>
</div>