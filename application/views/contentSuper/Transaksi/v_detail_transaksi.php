<div class="content-wrapper">
	<section class="content">
		<form enctype="multipart/form-data" action="<?= site_url('Transaksi/proses_update') ?>" method="post">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header"><h5>Pilih Customer</h5></div>
						<div class="card-body">
<!--							<div class="col-md-5">-->
<!--								<div class="form-group">-->
<!--									<label for="">Pilih Customer</label>-->
<!--									<select name="" class="form-control" id="select-customer">-->
<!--										<option value="" disabled selected>Pilih Customer</option>-->
<!--										--><?php
//										foreach ($customers as $c) {
//											echo "<option data-kode='$c->kd_kuskategori' "
//												. "data-nama='$c->nama_toko' "
//												. "data-alamat='$c->alamat_toko' "
//												. "value='$c->id_kustomer'> "
//												. "$c->kd_kuskategori / $c->nama_toko"
//												. "</option>";
//										}
//										?>
<!--									</select>-->
<!--								</div>-->
<!--							</div>-->
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="">No Order</label>
										<input readonly type="text" id="no-order" value="<?= $order->no_order ?>" name="no_order" class="form-control"/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="">NO PO</label>
										<input readonly type="number" id="no-po" value="<?= $order->no_po ?>" name="no-po" class="form-control"/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="">NO PR</label>
										<input readonly type="number" id="no-pr" value="<?= $order->no_pr ?>" name="no-pr" class="form-control"/>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="">Kode Customer</label>
								<input readonly type="text" id="kode-kustomer" value="<?= $order->kode_kustomer ?>" name="kd_kustomer" class="form-control"/>
							</div>
							<div class="form-group">
								<label for="">Nama Toko</label>
								<input readonly type="text" id="nama-toko" value="<?= $order->nama_toko ?>" name="nama_toko" class="form-control"/>
							</div>
							<div class="form-group">
								<label for="">Alamat Toko</label>
								<input readonly type="text" id="alamat-toko" value="<?= $order->alamat_toko ?>" name="alamat_toko" class="form-control"/>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="">Tanggal Order</label>
									<input readonly type="date" id="tanggal-order" value="<?= $order->tgl_order ?>" name="tgl_order" class="form-control"/>
								</div>
								<div class="form-group">
									<label for="">Tanggal Minta Dikirim</label>
									<input readonly type="date" id="tanggal-minta-dikirim" value="<?= $order->tgl_minta_kirim ?>" name="tgl_kirim"
										   class="form-control"/>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Rangkap</label>
										<input readonly type="text" id="rangkap" value="<?= $order->rangkap ?>" name="rangkap" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Jml - satuan order</label>
										<input readonly type="text" id="jml-order" name="jml_order" value="<?= $order->jml_satuan_order ?>" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Buku</label>
										<input readonly type="text" id="buku" value="<?= $order->buku ?>" name="buku" class="form-control"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Set</label>
										<input readonly type="text" id="set" name="set_buku" value="<?= $order->set_buku ?>" class="form-control"/>
									</div>
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
								<input readonly type="text" id="kode-cabang" value="<?= $order->kd_cabang ?>" name="kd_cabang" class="form-control"/>
							</div>
							<div class="form-group">
								<label for="">Nama Sales</label>
								<input readonly type="text" id="nama-sales" value="<?= $order->nama_sales ?>" name="nama_sales" class="form-control"/>
							</div>
							<div class="form-group">
								<label for="">Jabatan</label>
								<input readonly type="text" id="jabatan" value="<?= $order->jabatan ?>" name="jabatan" class="form-control"/>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<div class="form-group">
								<label for="">Harga</label>
								<input type="text" id="harga_order" value="<?= $order->harga_order ?>" name="harga_order" class="form-control"/>
							</div>
							<div class="form-group">
								<label for="">Pembayaran</label>
								<input type="text" id="piutang" value="" name="piutang" class="form-control"/>
							</div>
							<div class="form-group">
								<label for="">Total</label>
								<input readonly type="text" id="total" value="<?= $order->total ?>" name="total" class="form-control"/>
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
										<input readonly type="text" value="<?= $order->offset_sablon_polos ?>" name="offset_sablon_polos" id="offset_sablon_polos" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Perforasi</label>
										<input readonly type="text" value="<?= $order->perforasi ?>" name="perforasi" id="perforasi" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="">Nomerator</label>
										<input readonly type="text" id="nomerator" value="<?= $order->nomerator ?>" name="nomerator" class="form-control"/>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="">Warna Nomerator</label>
										<input readonly type="text" name="warna_nomerator" value="<?= $order->warna_nomerator ?>" class="form-control" id="warna-nomerator">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Bending</label>
										<input readonly type="text" name="bending" value="<?= $order->bending ?>" class="form-control" id="bending">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">UV/Vernish/Laminating/Tidak</label>
										<input readonly type="text" name="uv_vernish_laminating" value="<?= $order->uv_vernish_laminating ?>" class="form-control" id="uv">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Foil</label><br>
										<input readonly type="text" class="form-control" value="<?= $order->foil ?>" name="foil"/>
									</div>
									<div class="form-group">
										<label for="">Degel</label><br>
										<input readonly type="text" class="form-control" name="degel" value="<?= $order->degel ?>"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Catatan</label><br>
										<input readonly type="text" class="form-control" name="catatan" value="<?= $order->catatan ?>">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="card">
						<div class="card-header"><h5>Pilih Format</h5></div>
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th style="text-align:center">No.</th>
									<th style="text-align:center">Format</th>
									<th style="text-align:center">Jenis Kertas</th>
									<th style="text-align:center">Warna Kertas</th>
									<th style="text-align:center">Warna Tinta</th>
									<th style="text-align:center">Jumlah</th>
								</tr>
								</thead>
								<tbody>
								<?php
								$no = 1;
								foreach ($formats as $o) {
									?>
									<tr>
										<td style="text-align:center"><?= $no++ ?></td>
										<td style="text-align:center"><?= $o->format ?></td>
										<td style="text-align:center"><?= $o->jns_kertas ?></td>
										<td style="text-align:center"><?= $o->warna_kertas ?></td>
										<td style="text-align:center"><?= $o->warna_tinta ?></td>
										<td style="text-align:center"><?= $o->jumlah_order ?></td>
									</tr>
									<?php
								}
								?>
								</tbody>
							</table>
						</div>
						<input type="hidden" id="id_order" name="id_order" value="<?= $order->id_order ?>">
					</div>
				</div>
				<div class="card-body">
					<input type="submit" id="btn-simpan" value="Simpan" class="btn btn-primary float-right">
					<button href="<?= site_url(array("Transaksi")) ?>" class="btn btn-primary">
						Kembali
					</button>
				</div>
				<div class="card-body">
					<input type="submit" id="btn-print" value="Print" class="btn btn-primary float-right">
				</div>
			</div>
		</form>
	</section>
</div>
<!--<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>-->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="jquery.masknumber.js"></script>
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
			});
		$("#select-sales")
			.select2()
			.on("change", function () {
				var optionSelected = $(this).children("option:selected");
				$("#kode-cabang").val(optionSelected.data("kode"));
				$("#nama-sales").val(optionSelected.data("nama"));
				$("#jabatan").val(optionSelected.data("jabatan"));
			});
		$("#select-format")
			.select2()
			.on("change", function () {
				var optionSelected = $(this).children("option:selected");
				$("#format").val(optionSelected.data("format"));
				$("#warna-tinta").val(optionSelected.data("tinta"));
				$("#warna-kertas").val(optionSelected.data("kertas"));
				$("#jumlah-order").val();
			});
		$("#select-jnskertas")
			.select2()
			.on("change", function () {
				var optionSelected = $(this).children("option:selected");
				$("#jns-kertas").val(optionSelected.data("jnskertas"));
			});
		$("#select-bending").select2()
		$("#select-offset").select2()
		$("#select-perforasi").select2()
		$("#select-uv").select2()
		$("#select-warna-nomerator").select2()


		$("#btn-print").on("click",function () {
			window.print()
		});
		$('#harga_order').mask('000.000.000.000.000.000', {reverse: true});
		$('#piutang').mask('000.000.000.000.000.000', {reverse: true});

		$("#btn-add-item").on("click", function () {
			let id = $("#select-format").val();
			let format = $("#format").val();
			let jenisKertas = $("#jns-kertas").val();
			let warnaKertas = $("#warna-kertas").val();
			let warnaTinta = $("#warna-tinta").val();
			let hargaOrder = $("#harga-order").val();
			let jumlahOrder = $("#jumlah-order").val();
			let subTotal = parseInt(hargaOrder) * parseInt(jumlahOrder);
			if (format != "") {
				let tr = `<tr data-id="${id}">`;
				tr += `<td>${format}</td>`;
				tr += `<td>${jenisKertas}</td>`;
				tr += `<td>${warnaKertas}</td>`;
				tr += `<td>${warnaTinta}</td>`;
				tr += `<td>${jumlahOrder}</td>`;
				tr += `<td>${hargaOrder}</td>`;
				tr += `<td>${subTotal}</td>`;
				tr += `<td>`;
				tr += `<button class="btn btn-xs btn-del-item btn-danger"> <i class="fas fa-trash"></i></button>`;
				tr += `</td>`;
				tr += `</tr>`;
				$("#table-item tbody").append(tr);
				$("#select-format").val("").trigger("change");
				$("#select-jnskertas").val("").trigger("change");
				$("#format").val();
				$("#jns-kertas").val();
				$("#warna-kertas").val();
				$("#warna-tinta").val();
				$("#harga-order").val();
				$("#jumlah-order").val("").trigger("change");
				$(".btn-del-item").on("click", function () {
					$(this).parent().parent().remove();
				});
			}
		});
		$("#btn_simpan").on("click", function () {
			// $.LoadingOverlay("show");
			$.ajax({
				url: window.base_url + "appsuper/proses_simpan",
				type: "POST",
				success: function (result) {
					if (parseInt(result) > 0) {
						//success
						window.location.replace(window.base_url + "appsuper");
					} else {
						//error
					}
					// $.LoadingOverlay("hide");
				}
			});
		});
	});
</script>
