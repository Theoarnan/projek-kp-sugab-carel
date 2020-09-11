<div class="content-wrapper">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header"><h5>Pilih Customer</h5></div>
					<div class="card-body">
						<div class="col-md-5">
							<div class="form-group">
								<label for="">Pilih Customer</label>
								<select name="" class="form-control" id="select-customer">
									<option value="" disabled selected>Pilih Customer</option>
									<?php
									foreach ($customers as $c) {
										echo "<option data-kode='$c->kd_kuskategori' "
												. "data-nama='$c->nama_toko' "
												. "data-alamat='$c->alamat_toko' "
												. "value='$c->id_kustomer'> "
												. "$c->kd_kuskategori / $c->nama_toko"
												. "</option>";
									}
									?>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="">No Order</label>
									<input type="text" id="no-order" class="form-control"/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">NO PO</label>
									<input type="number" id="no-po" class="form-control"/>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="">NO PR</label>
									<input type="number" id="no-pr" class="form-control"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="">Kode Customer</label>
							<input readonly type="text" id="kode-kustomer" class="form-control"/>
						</div>
						<div class="form-group">
							<label for="">Nama Toko</label>
							<input readonly type="text" id="nama-toko" class="form-control"/>
						</div>
						<div class="form-group">
							<label for="">Alamat Toko</label>
							<input readonly type="text" id="alamat-toko" class="form-control"/>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="">Tanggal Order</label>
								<input type="date" id="tanggal-order" class="form-control"/>
							</div>
							<div class="form-group">
								<label for="">Tanggal Minta Dikirim</label>
								<input type="date" id="tanggal-minta-dikirim" class="form-control"/>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="card">
					<div class="card-header"><h5>Pilih Sales Order</h5></div>
					<div class="card-body">
						<div class="form-group">
							<label for="">Pilih Sales</label>
							<select name="" class="form-control" id="select-sales">
								<option value="" disabled selected>Pilih Sales</option>
								<?php
								foreach ($pegawais as $c) {
									echo "<option data-kode='$c->kd_cabang' "
											. "data-nama='$c->nama_anggota' "
											. "data-jabatan='$c->jabatan' "
											. "value='$c->id_anggota'> "
											. "$c->kd_cabang / $c->nama_anggota"
											. "</option>";
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="">Kode Cabang</label>
							<input readonly type="text" id="kode-cabang" class="form-control"/>
						</div>
						<div class="form-group">
							<label for="">Nama Sales</label>
							<input readonly type="text" id="nama-sales" class="form-control"/>
						</div>
						<div class="form-group">
							<label for="">Jabatan</label>
							<input readonly type="text" id="jabatan" class="form-control"/>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<div class="card">
					<div class="card-header"><h5>Spesifikasi</h5></div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Offset/Sablon/Polos</label>
									<input type="text" id="offset" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Perforasi</label>
									<input type="text" id="perforasi" class="form-control"/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Nomerator</label>
									<input type="text" id="omerator" class="form-control"/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Bending</label>
									<input type="text" id="bending" class="form-control"/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Foil</label>
									<input type="text" id="foil" class="form-control"/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">UV/Vernish/Laminating/Tidak</label>
									<input type="text" id="uv" class="form-control"/>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="">Degel</label>
							<input type="text" id="degel" class="form-control"/>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="card">
					<div class="card-header"><h5>Pilih Format</h5></div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Format</label>
									<input type="text" id="format" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Jenis Kertas</label>
									<input type="text" id="jenis-kertas" class="form-control"/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Warna Kertas</label>
									<input type="text" id="warna-kertas" class="form-control"/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Warna Tinta</label>
									<input type="text" id="warna-tinta" class="form-control"/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Jumlah Order</label>
									<input type="number" id="jumlah-order" class="form-control"/>
								</div>
							</div>
							<div class="card-body">
								<div class="form-group">
									<button type="button" id="btn-add-item" class="btn btn-primary float-right">
										<i class="fas fa-plus"></i> Tambah
									</button>
								</div>
							</div>
						</div>
					</div>
					<div class="card-body">
						<table id="table-item" class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>Format</th>
								<th>Jenis Kertas</th>
								<th>Warna Kertas</th>
								<th>Warna Tinta</th>
								<th>Jumlah</th>
								<!--								<th>Sub Total</th>-->
								<th>Action</th>
							</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>
					<div class="card-body">
						<button type="button" id="btn-save-transaksi" class="btn btn-primary float-right">
							<i class="fas fa-save"></i> Simpan
						</button>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script>
	$(function () {
		let barang;
		$("#select-customer")
				.select2()
				.on("change", function () {
					var optionSelected = $(this).children("option:selected");
					$("#kode-kustomer").val(optionSelected.data("kode"));
					$("#nama-toko").val(optionSelected.data("nama"));
					$("#alamat-toko").val(optionSelected.data("alamat"));
					$("#jumlah-barang").val(1);
				});
		$("#select-sales")
				.select2()
				.on("change", function () {
					var optionSelected = $(this).children("option:selected");
					$("#kode-cabang").val(optionSelected.data("kode"));
					$("#nama-sales").val(optionSelected.data("nama"));
					$("#jabatan").val(optionSelected.data("jabatan"));
					$("#jumlah-barang").val(1);
				});

		$("#btn-add-item").on("click", function () {
			let id = $("#select-barang").val();
			let format = $("#format").val();
			let jenisKertas = $("#jenis-kertas").val();
			let warnaKertas = $("#warna-kertas").val();
			let warnaTinta = $("#warna-tinta").val();
			let jumlahOrder = $("#jumlah-order").val();
			// let subTotal = parseInt(hargaBarang) * parseInt(jumlahBarang);
			if (format != "") {
				let tr = `<tr data-id="${id}">`;
				tr += `<td>${format}</td>`;
				tr += `<td>${jenisKertas}</td>`;
				tr += `<td>${warnaKertas}</td>`;
				tr += `<td>${warnaTinta}</td>`;
				tr += `<td>${jumlahOrder}</td>`;
				// tr += `<td>${subTotal}</td>`;
				tr += `<td>`;
				tr += `<button class="btn btn-xs btn-del-item btn-danger"> <i class="fas fa-trash"></i></button>`;
				tr += `</td>`;
				tr += `</tr>`;
				$("#table-item tbody").append(tr);
				// $("#select-barang").val("").trigger("change");
				$("#format").val();
				$("#jenis-kertas").val();
				$("#warna-kertas").val();
				$("#warna-tinta").val();
				$("#jumlah-order").val(1);
				$(".btn-del-item").on("click", function () {
					$(this).parent().parent().remove();
				});
			}
		});
		$("#btn-save-transaksi").on("click", function () {
			$.LoadingOverlay("show");
			let rows = $("#table-item tbody tr");
			let itemTransaksi = [];
			rows.each(function () {
				let row = $(this);
				let item = {
					id_barang: row.data("id"),
					harga_item_transaksi: row.children().eq(2).text(),
					qty_item_transaksi: row.children().eq(3).text(),
					total_item_transaksi: row.children().eq(4).text(),
				};
				itemTransaksi.push(item);
			});
			let dataKirim = JSON.stringify(itemTransaksi);
			$.ajax({
				url: window.base_url + "app/proses_transaksi",
				type: "POST",
				data: {
					item_transaksi: dataKirim
				},
				success: function (result) {
					if (parseInt(result) > 0) {
						//success
						window.location.replace(window.base_url + "app");
					} else {
						//error
					}
					$.LoadingOverlay("hide");
				}
			});
		});
	});
</script>
