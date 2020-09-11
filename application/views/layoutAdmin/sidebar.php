<aside class="main-sidebar sidebar-dark-info elevation-4">
	<!-- Brand Logo -->
	<div class="brand-link ">
		<!-- <img src="<?php echo base_url(); ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="tengah" style="opacity:2"><br> -->
		<h3 class=" text-app"><strong></strong>
			<italic><b>JASA CETAK</b></italic></br>
			ADMIN
		</h3>
	</div>
	<div class="sidebar">
		<nav class="mt-2 ">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item has-treeview">
					<a href="<?= site_url('Welcome') ?>" class="nav-link">&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;&nbsp;
						<i class="fas fa-satellite-dish"></i>
						<p></p>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-item" <?= $this->uri->segment(2) == 'customer' ? 'class=" nav-itemactive"' : '' ?>>
					<a href="<?= site_url('customeradmin') ?>" class="nav-link">
						<i class="fas fa-truck-loading"></i>
						<p>|</p>
						<p>Data Customer</p>
					</a>
				</li>
				<li class="nav-item" <?= $this->uri->segment(2) == 'pegawai' ? 'class="nav-item active"' : '' ?>>
					<a href="<?= site_url('pegawaisuper') ?>" class="nav-link">
						<i class="fas fa-diagnoses"></i>
						<p>|</p>
						<p>Data Pegawai</p>
					</a>
				</li>
				<li class="nav-item has-treeview">
					<a href="<?= site_url(array("AppAdmin")) ?>" class="nav-link">
						<i class="fab fa-android"></i>
						<p>|</p>
						<p>
							Aplikasi Transaksi
						</p>
					</a>
				</li>
				<li class="nav-item has-treeview">
					<a href="<?= site_url(array("HargaAdmin")) ?>" class="nav-link">
						<i class="fab fa-money"></i>
						<p>|</p>
						<p>
							Harga
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?= site_url('TransaksiAdmin') ?>" class="nav-link">
						<i class="fas fa-folder-open"></i>
						<p>|</p>
						<p>Riwayat Data Transaksi</p>
					</a>
				</li>
			</ul>
			<br>
		</nav>
	</div>
</aside>
