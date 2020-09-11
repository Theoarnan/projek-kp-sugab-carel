<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">

			</div>
		</div>
		<div class="card card-info">
			<div class="card-header">
				<h1>Data Customer</h1>
			</div>
			<div class="card-footer">
				<a href="<?= site_url(array("Customer", "register")) ?>" class="btn btn-success "><i
							class="fas fa-folder-plus"></i>
					Tambah Data Customer
				</a> &nbsp;
				<a href="<?= site_url("Report/customer") ?>" target="_blank" class="btn btn-success">
					<i class="fas fa-file-excel"></i> Report Data Customer
				</a>


			</div>
			<div class="card-body">
				<table id="table-customer" class="table table-bordered table-striped">
					<thead>
					<tr>
						<th style="width:2%; text-align:center"> No</th>
						<th style="width:2%; text-align:center"> Id Kostomer</th>
						<th style="width:2%; text-align:center"> Kd Kuskategori</th>
						<th style="width:2%; text-align:center">Nama Toko</th>
						<th style="width:3%; text-align:center">Kode Kustomer Besoft</th>
						<th style="width:3%; text-align:center">Alamat Toko</th>
						<th style="width:2%; text-align:center">Kota Toko</th>
						<th style="width:2%; text-align:center">Telepon Toko</th>
						<th style="width:2%; text-align:center">No NPWP</th>
						<th style="width:2%; text-align:center">PIC</th>
						<th style="width:4%; text-align:center">Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$no = 1;
					foreach ($customers as $customer) {
						?>
						<tr>
							<td style="text-align:center"><?= $no++ ?></td>
							<td style="text-align:center"><?= $customer->id_kustomer ?></td>
							<td style="text-align:center"><?= $customer->kd_kuskategori ?></td>
							<td style="text-align:center"><?= $customer->nama_toko ?></td>
							<td style="text-align:center"><?= $customer->kode_kustomer_besoft ?></td>
							<td style="text-align:center"><?= $customer->alamat_toko ?></td>
							<td style="text-align:center"><?= $customer->kota_toko ?></td>
							<td style="text-align:center"><?= $customer->telepon_toko ?></td>
							<td style="text-align:center"><?= $customer->no_npwp ?></td>
							<td style="text-align:center"><?= $customer->pic ?></td>
							<!-- <td style="text-align:center"><?= getJenisKelaminLengkap($customer->no_order) ?></td> -->
							<!-- <td><?= $customer->no_telp ?></td> -->
							<!-- <td style="text-align:center"><?= getLevel($customer->jabatan) ?></td> -->
							<td style="text-align:center">
								<a href="<?= site_url("Customer/update/$customer->id_kustomer") ?>"
								   class="btn btn-sm btn-warning" data-title="Edit"><i class="fas fa-edit"></i></a>
								<a href="<?= site_url("CustomerSuper/proses_hapus/$customer->id_kustomer") ?>"
								   data-id="<?= $customer->id_kustomer ?>" id="delete_id"
								   class="btn btn-sm btn-danger tombolHapus">
									<fas class="fas fa-trash"></fas>
								</a>
								<a href="<?= site_url('customer/print_customer/') . $customer->id_kustomer ?>"
								   target="_blank" class="btn btn-sm btn-primary"><i class="fas fa-print"></i>
								</a>
							</td>
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
	<script>
		$(function () {
			let idKustomer = 0;
			$(".tombolHapus").on("click", function () {
				var id = $(this).data('id');
				SwalDelete(id);
				console.log(id);
				// e.preventDefault();
			});
			$("#btn-print").on("click", function () {
				window.print()
			});
		});

		function SwalDelete(id) {
			Swal.fire({
				title: ' Hapus Data Customer Ini?',
				text: " ",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#20B2AA',
				cancelButtonColor: '#FF7F00',
				confirmButtonText: 'Hapus Data ',
				showLoaderOnConfirm: true,
				preConfirm: function () {
					return new Promise(function (resolve) {
						var url = "customersuper/proses_hapus/"
						$.ajax({
							url: '<?= base_url() ?>' + url + id,
							type: "POST",
						})
								.done(function (id) {
									window.location.replace("<?= site_url("CustomerSuper") ?>");
									Swal.fire('Hapus Data Berhasil', 'Data Anda Telah Terhapus!', 'success')
								})
								.fail(function () {
									Swal.fire('Maaf', 'Data Anda Sudah Masuk proses Transaksi', 'error')
								});
					});
				},
			});
		}
	</script>
