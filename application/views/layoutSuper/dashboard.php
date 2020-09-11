<!DOCTYPE html>
<html>

<head>
  <?php $this->load->view('layoutSuper/header'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php $this->load->view('layoutSuper/navbar'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php $this->load->view('layoutSuper/sidebar'); ?>
    <!-- Content Wrapper. Contains page content -->
    <?php $this->load->view($page); ?>
    <!-- /.content-wrapper -->
    <?php $this->load->view('layoutSuper/footer'); ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <?php $this->load->view('layoutSuper/scriptfooter'); ?>
</body>

</html>
