	<!-- MAIN -->
	<main class="site-main">

		<div class="columns container">
			<!-- Block  Breadcrumb-->

			<ol class="breadcrumb no-hide">
				<li><a href="#">Home </a></li>
				<li class="active"> Checkout</li>
			</ol><!-- Block  Breadcrumb-->

			<h2 class="page-heading">
				<span class="page-heading-title2"> Checkout</span>
			</h2>
			<form method="POST" id="form-checkout" action="<?= base_url('complate_checkout') ?>">
				<div class="page-content checkout-page">
					<h3 class="checkout-sep">Billing Infomations</h3>
					<div class="box-border">
						<ul>
							<li class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="first_name" class="required">Nama Lengkap</label>
										<input class="input form-control" placeholder="Nama Lengkap" name="nama_customer" value="<?= $this->session->userdata('nama_customer') ?>" id="first_name" type="text">
									</div>
									<div class="form-group">
										<label for="first_name" class="required">No Hp</label>
										<input class="input form-control" placeholder="No Hp" readonly value="<?= $this->session->userdata('no_hp') ?>" name="no_hp" id="first_name" type="number">
									</div>
									<div class="form-group">
										<label for="first_name" class="required">Email</label>
										<input class="input form-control" placeholder="Masukan Email" value="<?= $this->session->userdata('email') ?>" readonly name="email" id="first_name" type="email">
									</div>
									<div class="form-group">
										<?php
										if ($DaftarALamat->status == "berhasil") : ?>
											<?php if ($DaftarALamat->data == null) : ?>
												<h3>Alamat Anda Belum Disini Silahkan Isi Alamat Pengirim <a target="blank" href="<?= base_url('daftar-alamat') ?>">Disini </a></h3>
											<?php else : ?>
												<label for="first_name" class="required">Alamat Penerima</label><br>
												<?php
												foreach ($DaftarALamat->data as $dataalamat) :
												?>
													<?php if ($dataalamat->status_default == 1) :
														$id_kec = $dataalamat->kode_kecamatan;
													?>
														<input hidden name="alamat_customer" value="<?= $dataalamat->_id ?>">
														<?= $dataalamat->nama_customer ?>
														<?= $dataalamat->alamat_lengkap ?>
														<?= $dataalamat->nama_kecamatan ?>
														<?= $dataalamat->nama_kota ?>
														<?= $dataalamat->kode_pos ?>
														<?= $dataalamat->nama_provinsi ?>
													<?php endif; ?>
												<?php endforeach; ?>
											<?php endif; ?>
										<?php else : ?>
											<h3>Load Data Gagal Refres <a target="blank" href="<?= base_url('checkout') ?>">Disini </a></h3>
										<?php endif; ?>
										<h3 class="checkout-sep">Barang Yang Dibeli</h3>
										<div class="table-responsive">
											<table class="table table-bordered  cart_summary">
												<thead>
													<tr>
														<th class="cart_product">Product</th>
														<th>Description</th>
														<th>Unit price</th>
														<th>Qty</th>
														<th>Total</th>
													</tr>
												</thead>
												<tbody>

													<?php
													$berat = 0;
													$total = 0;
													$total_cart = 0;
													$data_barang = $this->session->userdata('data_barang');

													foreach ($data_barang as $row) :
														$total += $row['harga'];
														$berat += $row['berat'];
														$total_cart +=  $row['harga'];
														// $total_cart =  $row['harga'];
													?>
														<input type="hidden" name="kode_barcode[]" value="<?= $row['kode_barcode'] ?>">
														<tr>
															<td class="cart_product">
																<a href="<?= base_url('DetailProduk/' . encrypt_url($row->kode_toko) . '/' . encrypt_url($row->kode_barcode) . '') ?>">
																	<img width="300" height="100" onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?= $row['gambar'] ?>"></a>
															</td>
															<td class="cart_description">
																<p class="product-name"><a href="#"><?= $row['nama_barang'] ?> </a></p>
																<small class="cart_ref">Kode Barang : <?= $row['kode_barcode'] ?></small><br>
																<small><a href="#">Berat : <?= $row['berat'] ?> G</a></small><br>
																<small><a href="#"> Kadar: <?= $row['kadar'] ?></a></small><br>
																<small><a href="#"> Ongkos Barang : <?= $row['ongkos_produksi'] ?></a></small>
															</td>

															<td align="center">Rp.<span><?= number_format($row['harga']) ?></span></td>
															<td class="qty">
																1
															</td>
															<td align="center">
																<span>Rp.<?= number_format($row['harga']) ?></span>
															</td>

														</tr>
													<?php endforeach; ?>
												<tfoot>
													<tr>
														<td colspan="3">Total Berat</td>
														<td colspan="2"><?= $berat ?> G</td>
													</tr>
													<tr>
														<td colspan="3">Total Harga</td>
														<td colspan="2"><?= number_format($total_cart) ?></td>
													</tr>
												</tfoot>
												</tbody>

											</table>
										</div>
									</div>
								</div>
								<input class="form-control" id="berat" type="hidden" name="berat" value="<?= $berat ?>" />
								<div class="col-sm-6">
									<h3 class="checkout-sep">Shipping</h3>
									<ul class="shipping_method">
										<li>
											<label for="radio_button_3"><input onclick="funtoko('<?= $total_cart ?>')" required name="type_pengambilan" value="Ambil Ditoko" id="radio_button_3" type="radio">Ambil Ditoko</label>
										</li>
										<div class="tampiltoko">

										</div>
										<p id="text2" style="display:none"> Loading..</p>

										<li>
											<label for="radio_button_4"><input onclick="funkurir()" name="type_pengambilan" value="Antar Dengan Kurir" id="radio_button_4" type="radio">Antar Dengan Kurir</label>
										</li>
										<div class="tampilpengiriman">

										</div>
									</ul>
									<p id="text" style="display:none"> Loading..</p>
									<h3 class="checkout-sep">Payment Information</h3>
									<ul>
										<li>
											<?php if ($NamaApp == "AN_AN") : ?>
												<label for="radio_button_5"><input checked="" name="radio_4" id="radio_button_5" type="radio"> Payment Online</label>
											<?php else : ?>
												<label for="radio_button_5"><input checked="" name="radio_4" id="radio_button_5" type="radio"> Pembayaran Via Transfer</label>
											<?php endif; ?>
										</li>
									</ul>
									<h3 class="checkout-sep">Total Pembayaran</h3>
									<div class="ongkir"></div>
									<div class="text" id="view_dp" style="display: none;">Total Dp: <span class="cart-number big-total-number pull-right" id="total_dp"></span><br></div>
									<span class="text">Total Harga:</span><span class="cart-number big-total-number pull-right">Rp. <?= number_format($total_cart) ?></span><br>
									<span class="text">Total Bayar:</span><span class="cart-number big-total-number pull-right" id="jum_harga">Rp. <?= number_format($total_cart) ?></span>
									<input type="hidden" class="totalharga" name="total_harga" value="<?= number_format($total_cart) ?>">
									<input type="hidden" name="total_harga2" value="<?= number_format($total_cart) ?>">
									<input type="hidden" class="jenis_kurir" name="jenis_kurir">
									<input type="hidden" class="harga_kurir" name="harga_kurir">
									<input type="hidden" class="alamat_toko" name="alamat_toko">
									<input type="hidden" class="totaldpku" name="total_dp">
									<ul>
										<li>
											<?php if ($DaftarALamat->status == "berhasil") : ?>
												<?php if ($DaftarALamat->data == NULL) : ?>
													<button type="button" onclick="alert('Oppss Alamat Penerima Belum Diisi')" class="button">Place Order</button>
												<?php else : ?>
													<button type="submit" class="button">Place Order</button>
												<?php endif; ?>
											<?php endif; ?>
										</li>
									</ul>
								</div>
							</li>
						</ul>

					</div>
				</div>
			</form>
		</div>


	</main><!-- end MAIN -->

	<script>
		function validasiCheckout() {
			var applicationForm = document.getElementById("form-checkout");
			if (applicationForm.checkValidity()) {
				$('.loaderform').show();
				applicationForm.submit();
			} else {
				applicationForm.reportValidity();
			}
		}

		function funkurir() {
			$('#view_dp').hide();
			$('.totaldpku').val(0);
			var text = document.getElementById("text");
			$("#radio_button_4").change(function() {
				if ($("#radio_button_4").is(":checked")) {
					text.style.display = "block";
				}
			});
			$('.tampiltoko').html("");
			$('.tampilpengiriman').show();

			$.ajax({
				url: "<?= base_url('cekongkir') ?>",
				dataType: 'json',
				method: 'POST',
				data: {
					kode_kecamatan: '<?= $id_kec ?>',
					berat: '<?= $berat ?>',

				},
				success: function(respons) {
					console.log(respons);
					if (respons.status == "berhasil") {
						$('.tampilpengiriman').html("");

						var text = document.getElementById("text");
						text.style.display = "none";
						var count = respons.data.length;
						var datakurir = respons.data;
						var no = 3;
						for (var i = 0; i < count; i++) {
							// $.each(respons.data, function(index, element) {
							$.each(datakurir[i].costs, function(index, detail) {
								// var no=1;
								$.each(detail.cost, function(index, detailharga) {

									var harga = '';
									if (datakurir[i].code == "tiki") {
										harga = detailharga.etd + ' Hari' + '';
									} else if (datakurir[i].code == "J&T") {
										harga = detailharga.etd + ' 2-3 Hari' + '';
									} else {
										harga = detailharga.etd;
									}
									var service = '';
									if (datakurir[i].code == "pos") {
										if (detail.service == "Paket Kilat Khusus") {
											service = 'Kilat';
										}
										if (detail.service == "Express Next Day Barang") {
											service = 'Expres';
										}
									} else {
										service = detail.service;
									}
									$('.tampilpengiriman').append(`
					                <input type="radio" required onclick="funchitungtotal('` + datakurir[i].code + ` - ` + service + `','` + detailharga.value + `')" data="` + service + `"   value="Ambil Ditoko" id="radio` + no + `" name="selector">
					                <label for="radio` + no + `">
					                ` + datakurir[i].code.toUpperCase() + ` - ` + service + ` - Rp.` + detailharga.value.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + ` ` + harga + `</label><br>
					            `);
									no++
								})
							})

						}
						// })
					} else {
						$('.tampilpengiriman').html("");
						$('.tampilpengiriman').append(`` + respons.pesan + ``);
						var text = document.getElementById("text");
						text.style.display = "none";
					}
				},
				error: function(e, log) {
					$('.tampilpengiriman').html("");
					$('.tampilpengiriman').append(`` + respons.pesan + ``);
					var text = document.getElementById("text");
					text.style.display = "none";

				}
			})
		}

		function funchitungtotal(kode, harga) {
			// var id=$(this).attr('data');
			$('.jenis_kurir').val(kode);
			$('.harga_kurir').val(harga);
			var subtotal = '<?= $total_cart ?>';
			var hasil = parseInt(subtotal) + parseInt(harga);
			$('.totalharga').val(hasil.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
			// $('#jum_harga').val(hasil);
			$('.ongkir').html("");
			$('.ongkir').append(`<span class="text">Ongkir:</span><span class="cart-number big-total-number pull-right">Rp. ` + harga.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + `</span>`);

			document.getElementById("jum_harga").innerHTML = 'Rp. ' + hasil.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
		}

		function funtoko(jml) {
			var text = document.getElementById("text");
			var text2 = document.getElementById("text2");
			$('#view_dp').show();
			var total = parseInt(jml) * parseInt(50) / parseInt(100);
			$('.totaldpku').val(total);
			document.getElementById("total_dp").innerHTML = 'Rp.' + total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
			$("#radio_button_3").change(function() {
				if ($("#radio_button_3").is(":checked")) {
					text.style.display = "none";
					text2.style.display = "block";
					$("#radio_button_4").prop('checked', false);
					$.ajax({
						url: base_url + "getAlamatToko",
						dataType: 'json',
						method: 'POST',
						success: function(respons) {
							if (respons.status == "berhasil") {
								var count = respons.data.length;
								var datalamat = respons.data;
								var no = 3;
								$('.tampiltoko').html("");
								for (var i = 0; i < count; i++) {
									$('.tampiltoko').append(`
					                <input type="radio" required onclick="pilihalamat('` + datalamat[i].kode_toko + `');"  value="` + datalamat[i]._id + `" id="radio` + no + `" name="selector">
					                <label for="radio` + no + `">` + datalamat[i].alamat_lengkap + ` ` + datalamat[i].nama_kecamatan + ` ` + datalamat[i].nama_kota + `  ` + datalamat[i].kode_pos + ` ` + datalamat[i].nama_provinsi + `</label><br>
								`);
								}
								no++
								text2.style.display = "none";
							} else {
								$('.tampiltoko').html("");
								$('.tampiltoko').append(`Oops !!! Koneksi Bermasalah Coba Cek Koneksi Anda Dan Refres Halaman Ini`);
								var text = document.getElementById("text2");
								text.style.display = "none";
							}
						},
						error: function(e, log) {
							// $('.tampilpengiriman').html("");
							// $('.tampilpengiriman').append(`Oops !!! Daftar alamat tujuan anda belum diisi silahkan isi daftar alamat anda pada menu daftar alamat <a href="<?= base_url('daftar-alamat') ?>">Disini</a> lalu centang alamat tujuan anda untuk menjadikan alamat utama`);
							// var text = document.getElementById("text");
							// text.style.display = "none";

						}
					})
				}
			});
			$('.ongkir').html("");
			var subtotal = '<?= $total_cart ?>';
			$('.jenis_kurir').val('');
			$('.harga_kurir').val('');
			$('.totalharga').val(subtotal.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
			document.getElementById("jum_harga").innerHTML = 'Rp. ' + subtotal.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
			$('.tampilpengiriman').hide();


		}

		function pilihalamat(id) {
			$('.alamat_toko').val(id);
		}
	</script>