<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<!-- <h1 class="m-0 text-dark" text-align="center">Aplikasi Transaksi</h1> -->
				</div>
			</div>
		</div>
	</div>
	<section class="content">
		<div class="row">
			<div class="col-md-6">
				<div class="card card-info">
					<div class="card-body">
						<form id="registe" role="form">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label>Nama Barang</label>
										<div class="input-group">
											<input type="text" class="form-control" id="barcode_barang" value="<?= $barangs->nama_barang ?>" min="" name="barcode_barang" placeholder="Input Kode" readonly>
										</div>
									</div>
									<div class="form-group">
										<label>Spesifikasi Barang</label>
										<div class="input-group">
                                        <input type="text" class="form-control" id="barcode_barang" value="<?= $barangs->spek_barang ?>" min="" name="barcode_barang" placeholder="Input Kode" readonly>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label>Format Buku </label>
                                        <input type="text" class="form-control" id="barcode_barang" value="<?= $barangs->format_buku ?>" min="" name="barcode_barang" placeholder="Input Kode" readonly>
									</div>
								</div>
							</div>
                            <div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label>ISBN</label>
                                        <input type="text" class="form-control" id="barcode_barang" value="<?= $barangs->isbn ?>" min="" name="barcode_barang" placeholder="Input Kode" readonly>
									</div>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card card-info">
                    <div class="card-body">
						<form id="registe" role="form">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label>Kode Kategori</label>
										<div class="input-group">
											<input type="text" class="form-control" id="barcode_barang" value="<?= $barangs->kd_kategori ?>" min="" name="barcode_barang" placeholder="Input Kode" readonly>
										</div>
									</div>
									<div class="form-group">
										<label>ID BSOFT</label>
										<div class="input-group">
                                        <input type="text" class="form-control" id="barcode_barang" value="<?= $barangs->id_bsoft ?>" min="" name="barcode_barang" placeholder="Input Kode" readonly>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label>Halaman Buku </label>
                                        <input type="text" class="form-control" id="barcode_barang" value="<?= $barangs->halaman ?>" min="" name="barcode_barang" placeholder="Input Kode" readonly>
									</div>
								</div>
							</div>
                            <div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label>Status Display</label>
                                        <input type="text" class="form-control" id="barcode_barang" value="<?= $barangs->status_display ?>" min="" name="barcode_barang" placeholder="Input Kode" readonly>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
        </section>
        <div class="row">
    <div class="col-sm">
		<div class="info-box">
            <div class="image">
					<img src="<?php echo base_url(); ?>assets/images/no-image.png"
						 class="img-thumbnail elevation-5"
						 alt="User Image">
				</div>
		</div>
	</div>
	<!-- /.col -->
	<div class="col-md">
        <div class="info-box">
            <div class="image">
					<img src="<?php echo base_url(); ?>assets/images/no-image.png"
						 class="img-thumbnail elevation-5"
						 alt="User Image">
				</div>
		</div>
	</div>
	<!-- /.col -->
	<div class="col-lg">
        <div class="info-box">
            <div class="image">
					<img src="<?php echo base_url(); ?>assets/images/no-image.png"
						 class="img-thumbnail elevation-5"
						 alt="User Image">
				</div>
		</div>
		<!-- /.info-box -->
	</div>
    </div>
		<!-- <div class="row">

			<div class="col-md-6">

				<div class="card card-info">
					<div class="card-header">
						<div class="row">
							<div class="col-10">
								<h class="m-0 text-white" text-align="center">Aplikasi Kasir </h>
							</div>
						</div>
					</div>
					<div class="card-body">
						<form id="regis" role="form">
							<div class="row">

								<div class="col-sm-6">
									<div class="form-group">
										<label>Uang Pembayaran</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">Rp.</span>
											</div>
											<input type="text" class="form-control" id="bayarutama" name="bayar" required>
										</div>
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group">
										<label>Grand Total</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">Rp.</span>
											</div>
											<input type="text" class="form-control" value="10.000" id="grand_total" name="g" readonly>
										</div>
									</div>
								</div>

							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label>Diskon Harga Barang</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">Rp.</span>
											</div>
											<input type="text" class="form-control" id="diskonutama" value="0" name="d" required>
										</div>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<label>Kembalian Pembayaran</label>
										<div class="input-group">
											<div class="input-group-prepend">
												<span class="input-group-text">Rp.</span>
											</div>
											<input type="text" class="form-control" id="kembaliutama" value="0" name="k" readonly>
										</div>
									</div>
								</div>
							</div>
					</div>
					</form>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card card-info">
					<div class="card-header">
						<div class="row">
							<div class="col-10">


								<h class="m-0 text-white" text-align="center">Aplikasi Kasir </h>
							</div>
						</div>
					</div>

					<div class="card-body">
						<form id="reg" role="form">
							<div class="row">
								<div class="col-sm-12">
									<div align="center">
										<h4>Total Harga Belanja Anda!</h4>
										<h1><b><span style="text-align:right;">Rp. </span><span style="text-align:center;" id="total1">0</span></b></h1>
									</div>
								</div>
							</div><br>
						</form>
					</div>
				</div>
			</div>
		</div> -->
</div>
</div>