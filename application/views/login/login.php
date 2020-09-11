<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | JASA CETAK</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url(); ?>assets/login/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>assets/login/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>assets/login/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>assets/login/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>assets/login/css/style.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/login/plugins/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/login/plugins/jquery/jquery.js"></script>
</head>

<body class="login-page">
    <div class="login-box">

        <div class="logo">
            <a href="javascript:void(0);"> <b>JASA CETAK</b></a>
            <small>Andi Offset</small>
        </div>
        <div class="logo">
            <?php $this->load->view($page); ?>
        </div>
    </div>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url(); ?>assets/login/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/login/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url(); ?>assets/login/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url(); ?>assets/login/js/admin.js"></script>
    <script src="<?php echo base_url(); ?>assets/login/js/pages/examples/sign-in.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script>
        $(function() {
            $('#form-login').validate()
        })
    </script>
</body>

</html>