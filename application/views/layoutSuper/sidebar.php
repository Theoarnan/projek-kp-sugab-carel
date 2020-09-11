<aside class="main-sidebar sidebar-dark-info elevation-4">
	<!-- Brand Logo -->
	<div class="brand-link ">
		<!-- <img src="<?php echo base_url(); ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="tengah" style="opacity:2"><br> -->
		<h3 class=" text-app"><strong></strong>
			<italic><b>JASA CETAK</b></italic></br>
			<?= $this->session->userdata("nama_user") ?>
<!--			SUPERADMIN-->
		</h3>
	</div>
	<!-- Sidebar -->
	<div class="sidebar">
		<nav class="mt-2 ">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<?php if($this->session->userdata("role") == "superadmin") { ?>
				<li class="nav-item has-treeview">
					<a href="<?= site_url('Dashboard') ?>" class="nav-link">
						<i class="fas fa-satellite-dish"></i>
						<p></p>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<?php } ?>
				<?php if($this->session->userdata("role") == "superadmin" || $this->session->userdata("role") == "admin") { ?>
				<li class="nav-item" <?= $this->uri->segment(2) == 'customer' ? 'class=" nav-itemactive"' : '' ?>>
					<a href="<?= site_url('customer') ?>" class="nav-link">
						<i class="fas fa-truck-loading"></i>
						<p>|</p>
						<p>Data Customer</p>
					</a>
				</li>
				<li class="nav-item" <?= $this->uri->segment(2) == 'pegawai' ? 'class="nav-item active"' : '' ?>>
					<a href="<?= site_url('pegawai') ?>" class="nav-link">
						<i class="fas fa-diagnoses"></i>
						<p>|</p>
						<p>Data Pegawai</p>
					</a>
				</li>
				<li class="nav-item has-treeview">
<!--					--><?php //if($this->session->userdata("role") == "superadmin" || $this->session->userdata("role") == "admin") { ?>
					<a href="<?= site_url(array("AppSuper")) ?>" class="nav-link">
						<i class="fab fa-android"></i>
						<p>|</p>
						<p>
<!--							<input type="hidden" name="count_add" id="count_add" pattern="[10]+">-->
							Aplikasi Transaksi
						</p>
					</a>
				</li>
				<li class="nav-item has-treeview">
					<a href="<?= site_url(array("Transaksi")) ?>" class="nav-link">
						<i class="fab fa-money-check"></i>
						<p>|</p>
						<p>
							Data Transaksi
						</p>
					</a>
				</li>
				<?php } ?>

				<!--				<li class="nav-item">-->
<!--					<a href="--><?//= site_url('TransaksiSuper') ?><!--" class="nav-link">-->
<!--						<i class="fas fa-folder-open"></i>-->
<!--						<p>|</p>-->
<!--						<p>Riwayat Data Transaksi</p>-->
<!--					</a>-->
<!--				</li>-->
				<?php if($this->session->userdata("role") == "superadmin") { ?>
				<li class="nav-item">
					<a href="<?= site_url('User') ?>" class="nav-link">
						<i class="fas fa-folder-open"></i>
						<p>|</p>
						<p>User Akses</p>
					</a>
				</li>
				<?php } ?>
			</ul>
			<br>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
