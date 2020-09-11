<div class="content-wrapper">
	<section class="content">
		<form enctype="multipart/form-data" method="post" action="<?php echo site_url("AppSuper/proses_simpan"); ?>" id="formDataCust">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h5>Pilih Customer</h5>
						</div>
						<div class="card-body">
							<div class="col-md-5">
								<div class="form-group">
									<label for="">Pilih Customer</label>
									<select class="form-control" id="select-customer" required>
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
										<input type="text" id="no-order" name="no_order" class="form-control" required />
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="">NO PO</label>
										<input type="number" id="no-po" name="no_po" class="form-control" required />
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="">NO PR</label>
										<input type="number" id="no-pr" name="no_pr" class="form-control" required />
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="">Kode Customer</label>
								<input readonly type="text" id="kode-kustomer" name="kode_kustomer" class="form-control" required />
							</div>
							<div class="form-group">
								<label for="">Nama Toko</label>
								<input readonly type="text" id="nama-toko" name="nama_toko" class="form-control" required />
							</div>
							<div class="form-group">
								<label for="">Alamat Toko</label>
								<input readonly type="text" id="alamat-toko" name="alamat_toko" class="form-control" required />
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="">Tanggal Order</label>
									<input type="date" id="tanggal-order" name="tgl_order" class="form-control" required />
								</div>
								<div class="form-group">
									<label for="">Tanggal Minta Dikirim</label>
									<input type="date" id="tanggal-minta-dikirim" name="tgl_minta_kirim" class="form-control" required />
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
										<input type="text" id="rangkap" name="rangkap" class="form-control" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Jml - satuan order</label>
										<input type="text" id="jml-order" name="jml_satuan_order" class="form-control" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Buku</label>
										<input type="text" id="buku" name="buku" class="form-control" required />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Set</label>
										<input type="text" id="set" name="set_buku" class="form-control" required />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<div class="card">
						<div class="card-header">
							<h5>Pilih Sales Order</h5>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label for="">Pilih Sales</label>
								<select name="" class="form-control" id="select-sales" required>
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
								<input readonly type="text" id="kode-cabang" name="kd_cabang" class="form-control" />
							</div>
							<div class="form-group">
								<label for="">Nama Sales</label>
								<input readonly type="text" id="nama-sales" name="nama_sales" class="form-control" />
							</div>
							<div class="form-group">
								<label for="">Jabatan</label>
								<input readonly type="text" id="jabatan" name="jabatan" class="form-control" />
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-7">
					<div class="card">
						<div class="card-header">
							<h5>Spesifikasi</h5>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Offset/Sablon/Polos</label>
										<select name="offset_sablon_polos" class="form-control" id="select-offset">
											<option value="" selected disabled>Pilih Offset/Sablon/Polos</option>
											<option value="1">Offset</option>
											<option value="2">Sablon</option>
											<option value="3">Polos</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Perforasi</label>
										<select name="perforasi" class="form-control" id="select-perforasi">
											<option value="" selected disabled>Pilih Perforasi</option>
											<?php
											foreach ($perforasis as $f) { ?>
												<option value="<?= $f->id_perforasi ?>"><?= $f->perforasi ?></option>
											<?php }
											?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="">Nomerator</label>
										<input type="text" id="nomerator" name="nomerator" class="form-control" />
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="">Warna Nomerator</label>
										<select name="warna_nomerator" class="form-control" id="select-warna-nomerator">
											<option value="" selected disabled>Pilih Warna Nomerator</option>
											<?php
											foreach ($nomerators as $f) { ?>
												<option value="<?= $f->id_nomerator ?>"><?= $f->warna ?></option>
											<?php }
											?>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Bending</label>
										<select name="bending" class="form-control" id="select-bending">
											<option value="" selected disabled>Pilih Bending</option>
											<?php
											foreach ($bendings as $f) { ?>
												<option value="<?= $f->id_bending ?>"><?= $f->bending ?></option>
											<?php }
											?>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="">UV/Vernish/Laminating/Tidak</label>
										<select name="uv_vernish_laminating" class="form-control" id="select-uv">
											<option value="" selected disabled>Pilih UV/Vernish/Laminating/Tidak
											</option>
											<?php
											foreach ($uvs as $f) { ?>
												<option value="<?= $f->id_uv_vernis_laminasi ?>"><?= $f->uv_vernis_laminasi ?></option>
											<?php }
											?>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Foil</label><br>
										<input type="radio" class="form-radio" name="foil" value="Y" />&nbsp;&nbsp;Ya
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="radio" class="form-radio" name="foil" value="T" />&nbsp;&nbsp;TIdak
										<br><br>
										<label for="">Degel</label><br>
										<input type="radio" class="form-radio" name="degel" value="Y" />&nbsp;&nbsp;Ya
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="radio" class="form-radio" name="degel" value="T" />&nbsp;&nbsp;Tidak
									</div>
								</div>
								<input type="hidden" id="id-order" name="id_order" class="form-control" />
								<div class="col-md-6">
									<div class="form-group">
										<label for="">Catatan</label><br>
										<textarea type="text" class="form-control" name="catatan" value="" rows="4"></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h5>Pilih Format</h5>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Format</label>
								<select name="" class="form-control" id="select-format">
									<option value="" disabled selected>Pilih Format</option>
									<?php
									foreach ($formats as $c) {
										echo "<option data-kode='$c->id_order' "
											. "data-format='$c->format' "
											. "data-tinta='$c->warna_tinta' "
											. "data-kertas='$c->warna_kertas' "
											. "value='$c->id_pemesan'> "
											. "$c->format"
											. "</option>";
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Jenis Kertas</label>
								<select name="jns_kertas" class="form-control" id="select-jnskertas">
									<option value="" selected disabled>Pilih Jenis Kertas</option>
									<?php
									foreach ($jnskertass as $f) { ?>
										<option data-jnskertas="<?= $f->nama_jnskertas ?>"><?= $f->nama_jnskertas ?></option>
									<?php }
									?>
								</select>
							</div>
						</div>
					</div>
					<!--" class="form-control"/>-->
					<input type="hidden" id="format" name="format" class="form-control" />
					<input type="hidden" id="jns-kertas" name="jns_kertas" class="form-control" />
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Warna Kertas</label>
								<input readonly type="text" id="warna-kertas" name="warna_kertas" class="form-control" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Warna Tinta</label>
								<input readonly type="text" id="warna-tinta" name="warna_tinta" class="form-control" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Jumlah Order</label>
								<input type="number" id="jumlah-order" name="jumlah_order" class="form-control" />
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
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="card-body">
			<!-- Tag Button, Jangan Input ya Carel (Sudah saya ganti) -->
			<button type="button" id="btn-save-transaksi" class="btn btn-primary float-right"><i class="fas fa-save"></i>Tambah</button>
		</div>
	</section>
</div>
<!--<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>-->
<script>
	$(function() {
		let barang;
		$("#select-customer")
			.select2()
			.on("change", function() {
				var optionSelected = $(this).children("option:selected");
				$("#kode-kustomer").val(optionSelected.data("kode"));
				$("#nama-toko").val(optionSelected.data("nama"));
				$("#alamat-toko").val(optionSelected.data("alamat"));
				$("#jumlah-barang").val(1);
			});
		$("#select-sales")
			.select2()
			.on("change", function() {
				var optionSelected = $(this).children("option:selected");
				$("#kode-cabang").val(optionSelected.data("kode"));
				$("#nama-sales").val(optionSelected.data("nama"));
				$("#jabatan").val(optionSelected.data("jabatan"));
				$("#jumlah-barang").val(1);
			});
		$("#select-format")
			.select2()
			.on("change", function() {
				var optionSelected = $(this).children("option:selected");
				$("#format").val(optionSelected.data("format"));
				$("#warna-tinta").val(optionSelected.data("tinta"));
				$("#warna-kertas").val(optionSelected.data("kertas"));
				$("#jumlah-order").val(1);
			});
		$("#select-jnskertas")
			.select2()
			.on("change", function() {
				var optionSelected = $(this).children("option:selected");
				$("#jns-kertas").val(optionSelected.data("jnskertas"));
			});
		$("#select-bending").select2()
		$("#select-offset").select2()
		$("#select-perforasi").select2()
		$("#select-uv").select2()
		$("#select-warna-nomerator").select2()

		$("#btn-add-item").on("click", function() {
			let id = $("#select-format").val();
			let format = $("#format").val();
			let jenisKertas = $("#jns-kertas").val();
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
				$("#jumlah-order").val("").trigger("change");
				$(".btn-del-item").on("click", function() {
					$(this).parent().parent().remove();
				});
			}
		});
		$("#btn_simpan").on("click", function() {
			// $.LoadingOverlay("show");
			$.ajax({
				url: window.base_url + "appsuper/proses_simpan",
				type: "POST",
				success: function(result) {
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

		$("#btn-save-transaksi").on("click", function() {
			var dataString = form_to_json("#formDataCust");
			var data = {};
			data.item_data = [];
			let rows = $("#table-item tbody tr");
			rows.each(function() {
				let item = {};
				item.id_format = $(this).attr("data-id");
				item.format = $(this).children().eq(0).html();
				item.jns_kertas = $(this).children().eq(1).html();
				item.warna_kertas = $(this).children().eq(2).html();
				item.warna_tinta = $(this).children().eq(3).html();
				item.jumlah_order = $(this).children().eq(4).html();
				data.item_data.push(item);
			});
			var dataKirim = JSON.stringify(data);
			$.ajax({
				url: '<?= base_url() ?>' + 'AppSuper/proses_simpan',
				type: "POST",
				data: {
					dataCustomer: dataString,
					dataFormat: dataKirim
				},
				success: function(result) {
					if (result.success == true) {
						//success
						window.location.replace("<?= site_url("AppUser") ?>");
					} else {
						//error
					}
				}
			});
		})

		function form_to_json(selector) {
			var ary = $(selector).serializeArray();
			var obj = {};
			for (var a = 0; a < ary.length; a++) obj[ary[a].name] = ary[a].value;
			return obj;
		}
	});
</script>
