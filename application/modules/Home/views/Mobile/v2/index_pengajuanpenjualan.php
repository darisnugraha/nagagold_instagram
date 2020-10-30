<div class="page-content-wrapper">
    <div class="container">
        <!-- Profile Wrapper-->
        <div class="profile-wrapper-area py-3">
            <!-- User Information-->
            <div class="card shipping-method-choose-title-card bg-success">
                <div class="card-body">
                    <h6 class="text-center mb-0 text-white">Estimasi Harga Penjualan</h6>
                </div>
            </div>
            <!-- User Meta Data-->
            <div class="card user-data-card">
                <div class="card-body">
                        <div class="form-group">
                            <div class="title mb-2"><span>Masukan Kode Barcode</span></div>
                            <input class="form-control" onkeypress="return NumberNoEnter(event)"  id="kode_barcode_penjualan" required placeholder="Masukan Kode Barcode" name="no_pesanan" type="text">
                            
                        </div>
                        <div class="form-group">
                            <div class="title mb-2"><span>Nama Lengkap</span></div>
                            <input class="form-control" onkeypress="return HurufNoEnter(event)" required placeholder="Masukan Nama Lengkap" readonly value="<?= $this->session->userdata('nama_customer') ?>" name="nama_lengkap" type="text">
                        </div>
                        <div class="form-group">
                            <div class="title mb-2"><span>No Hp</span></div>
                            <input class="form-control" onkeypress="return HurufNoEnter(event)" required placeholder="Masukan No Hp" readonly value="<?= $this->session->userdata('no_hp') ?>" name="no_hp" type="number">
                        </div>
                        
                        <br>
                        <button class="btn btn-success w-100" onclick="FormValidasi();" id="caribarcodebarang" >Cek Estimasi Harga Penjualan</button>
                        <div class="table-responsive">
                           
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <!-- <th scope="col">Kode Barcode</th> -->
                                            <th scope="col">Nama Barang</th>
                                            <!-- <th scope="col">Nama Kategori</th> -->
                                            <!-- <th scope="col">Nama Jenis</th> -->
                                            <th scope="col">Berat</th>
                                            <!-- <th scope="col">Kadar</th> -->
                                            <th scope="col">Estimasi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tbl_pengajuan_penjualan">
                                    </tbody>
                                </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>

<script>
    $("#caribarcodebarang").on("click", function () {
	var id = $("#kode_barcode_penjualan").val();
	console.log(id);
	$.ajax({
		url: base_url + "getBarcodePengajuanPenjualan",
		dataType: "json",
		method: "POST",
		data: {
			kode_barcode: id,
		},
		complete: function (respons) {
			var feedback = respons.responseJSON;
			// console.log(feedback);
			// Swal
			if (feedback.pesan == "berhasil") {
				$.each(feedback.data, function (index, element) {
					// console.log(element);
					// $(".tbl_pengajuan_penjualan").html("");
					$(".tbl_pengajuan_penjualan").html("");
					$(".tbl_pengajuan_penjualan").append(
						`
					<tr>
					
						<td> ` +
							element.nama_barang +
							` </td>
						
						<td> ` +
							element.berat +
							` </td>
						
						<td>` +
							element.harga
								.toString()
								.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") +
							` </td>
					</tr>
				`
					);
				});
			} else {
				Swal.fire("Opps!", feedback.pesan, "info");
			}
		},
	});
});
</script>