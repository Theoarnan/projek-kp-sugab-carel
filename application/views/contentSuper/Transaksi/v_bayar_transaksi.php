<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">

				</div>
				<div class="col-sm-6">

				</div>
			</div>
		</div>
	</div>
	<section class="content">
		<div class="card card-info">
			<div class="card-header">
				<h2>Riwayat Transaksi</h2>
			</div>
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th style="text-align:center">No.</th>
						<th style="text-align:center">Tanggal/Waktu</th>
						<th style="text-align:center">No. Order</th>
						<th style="text-align:center">User</th>
						<th style="text-align:center">Sales</th>
						<th style="text-align:center">Harga</th>
						<th style="text-align:center">Pembayaran</th>
						<th style="text-align:center">Piutang</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$no = 1;
					foreach ($logs as $L) {
						?>
						<tr>
							<td style="text-align:center"><?= $no++ ?></td>
							<td style="text-align:center"><?= $L->log_time ?></td>
							<td style="text-align:center"><?= $L->log_no_order ?></td>
							<td style="text-align:center"><?= $L->log_user ?></td>
							<td style="text-align:center"><?= $L->log_pegawai ?></td>
							<td style="text-align:center"><?= formatRupiah($L->log_harga) ?></td>
							<td style="text-align:center"><?= formatRupiah($L->log_piutang) ?></td>
							<td style="text-align:center"><?= formatRupiah($L->log_total) ?></td>
						</tr>
						<?php
					}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
</div>
