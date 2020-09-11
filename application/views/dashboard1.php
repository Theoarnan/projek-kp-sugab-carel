<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>AdminLTE 3 | Dashboard 2</title>

	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>




<section class="content">
	<div class="container-fluid">
		<!-- Info boxes -->
		<div class="content-wrapper">
			<div class="content-header">
				<div class="container-fluid">


					<div class="row">
						<div class="col-12 col-sm-6 col-md-3">
							<div class="info-box">
								<span class="info-box-icon bg-info elevation-1"><i class="fas fa-truck-loading"></i></span>

								<div class="info-box-content">
									<span class="info-box-text"> Data Barang</span>
									<span class="info-box-number">
										<?= $this->fungsi->HitungBrg(); ?>
										<small></small>
									</span>
								</div>

								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
						</div>
						<!-- /.col -->
						<div class="col-12 col-sm-6 col-md-3">
							<div class="info-box mb-3">
								<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-folder-open"></i></span>

								<div class="info-box-content">
									<span class="info-box-text">Total Transaksi Penjualan</span>
									<span class="info-box-number"></span>
									<?= $this->fungsi->HitungTotPen(); ?>
									<small></small>
								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
						</div>
						<!-- /.col -->

						<!-- fix for small devices only -->
						<div class="clearfix hidden-md-up"></div>

						<div class="col-12 col-sm-6 col-md-3">
							<div class="info-box mb-3">
								<span class="info-box-icon bg-success elevation-1"><i class="fas fa-dolly-flatbed"></i></span>

								<div class="info-box-content">
									<span class="info-box-text">Data Kategori</span>
									<span class="info-box-number"></span>
									<?= $this->fungsi->HitungTotKat(); ?>
									<small></small>
								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
						</div>
						<!-- /.col -->
						<div class="col-12 col-sm-6 col-md-3">
							<div class="info-box mb-3">
								<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-diagnoses"></i></span>

								<div class="info-box-content">
									<span class="info-box-text">Data Pegawai</span>
									<span class="info-box-number"></span>
									<?= $this->fungsi->HitungTotPegawai(); ?>
									<small></small>
								</div>
								<!-- /.info-box-content -->
							</div>
							<!-- /.info-box -->
						</div>
						<!-- /.col -->
					</div>



					<div class="col-md-12">
						<!-- LINE CHART -->
						<div class="card card-success">
							<div class="card-header">
								<h3 class="card-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DATA GRAFIK TOTAL PEMBAYARAN TRANSAKSI DAN TANGGAL TRANSAKSI </h3>

								<!-- <div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
							</button>
							<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
						</div> -->
							</div>
							<div class="card-body">
								<div class="chart">
									<canvas id="linechart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<script>
			$(function() {
				/* ChartJS
				 * -------
				 * Here we will create a few charts using ChartJS
				 */

				//--------------
				//- AREA CHART -
				//--------------

				// Get context with jQuery - using jQuery's .get() method.
				var areaChartCanvas = $('#linechart').get(0).getContext('2d')

				var areaChartData = {
					// labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
					labels: [
						<?php
						if (count($details) > 0) {
							foreach ($details as $data) {
								echo "'" . $data->transaksi_tanggal . "',";
							}
						}
						?>
					],
					datasets: [{
							label: 'Digital Goods',
							backgroundColor: ['rgba(41,188,0.9)', 'rgba(50,30,10,0.9)', 'rgba(900,30,10,0.9)', 'rgba(50,900,700,0.9)', 'rgba(900,400,100)', 'rgba(1000,100,20,0.1)',
								'rgba(500,30,900 )', 'rgba(1,23,1000,)', 'rgba(2000,900,0.3,)', 'rgba(10,3000,100000,0.5)', 'rgba(900,700,90,0.9)', 'rgba(60,100,900,0.1)', 'rgba(800,10,18,)', 'rgba(80,78,200,)', 'rgba(30,10,60,1.7)'
							],
							borderColor: 'rgba(60,141,188,0.8)',
							pointRadius: false,
							pointColor: '#FF7F00',
							pointStrokeColor: 'rgba(60,141,188,1)',
							pointHighlightFill: '#fff',
							pointHighlightStroke: 'rgba(60,141,188,1)',
							data: [
								<?php
								if (count($details) > 0) {
									foreach ($details as $data) {
										echo "'" . $data->bayar_utama . "',";
									}
								}
								?>
							]
						},
						{
							// label: 'Electronics',
							// backgroundColor: 'rgba(210, 214, 222, 1)',
							// borderColor: 'rgba(210, 214, 222, 1)',
							// pointRadius: false,
							// pointColor: 'rgba(210, 214, 222, 1)',
							// pointStrokeColor: '#c1c7d1',
							// pointHighlightFill: '#fff',
							// pointHighlightStroke: 'rgba(220,220,220,1)',
							// data: [65, 59, 80, 81, 56, 55, 40]
						},
					]
				}

				var areaChartOptions = {
					maintainAspectRatio: false,
					responsive: true,
					legend: {
						display: false
					},
					scales: {
						xAxes: [{
							gridLines: {
								display: false,
							}
						}],
						yAxes: [{
							gridLines: {
								display: false,
							}
						}]
					}
				}

				// This will get the first returned node in the jQuery collection.
				var areaChart = new Chart(areaChartCanvas, {
					type: 'bar',
					data: areaChartData,
					options: areaChartOptions
				})




				// //-------------
				// //- LINE CHART -
				// //--------------
				// var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
				// var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
				// var lineChartData = jQuery.extend(true, {}, areaChartData)
				// lineChartData.datasets[0].fill = false;
				// lineChartData.datasets[1].fill = false;
				// lineChartOptions.datasetFill = false

				// var lineChart = new Chart(lineChartCanvas, {
				// 	type: 'line',
				// 	data: lineChartData,
				// 	options: lineChartOptions
				// })
			})
		</script>

		<!-- jQuery -->
		<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- ChartJS -->
		<script src="<?= base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
		<!-- AdminLTE App -->
		<script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>



		<!-- Dashboard2 -->

		<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap -->
		<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- overlayScrollbars -->
		<script src="<?= base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
		<!-- AdminLTE App -->
		<script src="<?= base_url(); ?>assets/dist/js/adminlte.js"></script>

		<!-- OPTIONAL SCRIPTS -->
		<script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>

		<!-- PAGE PLUGINS -->
		<!-- jQuery Mapael -->
		<script src="<?= base_url(); ?>assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
		<script src="<?= base_url(); ?>assets/plugins/raphael/raphael.min.js"></script>
		<script src="<?= base_url(); ?>assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
		<script src="<?= base_url(); ?>assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
		<!-- ChartJS -->
		<script src="<?= base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>

		<!-- PAGE SCRIPTS -->
		<script src="<?= base_url(); ?>assets/dist/js/pages/dashboard2.js"></script>