function hapusconfirm(url) {
	Swal.fire({
		title: "Konfirmasi Hapus Data!",
		text: "Yakin Untuk Menghapus Data Ini",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: "Hapus",
		cancelButtonText: "Batal",
		reverseButtons: true,
	}).then((result) => {
		if (result.value) {
			window.location.href = url;
		}
	});
}
function batalkanpesanan(url) {
	Swal.fire({
		title: "Konfirmasi Pembatalan Pesanan!",
		text: "Yakin ingin membatalkan pesanan",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: "Hapus",
		cancelButtonText: "Batal",
		reverseButtons: true,
	}).then((result) => {
		if (result.value) {
			window.location.href = url;
		}
	});
}
function lanjutkanCheckout(url) {
	Swal.fire({
		title: "Konfirmasi Lanjutkan Checkout!",
		text: "Yakin Untuk Melanjutkan Transasksi Ini",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: "Ya",
		cancelButtonText: "Batal",
		reverseButtons: true,
	}).then((result) => {
		if (result.value) {
			window.location.href = url;
		}
	});
}
function konfirmasigantialamat(url) {
	Swal.fire({
		title: "Konfirmasi Ganti Alamat!",
		text: "Yakin Ingin Mengganti Alamat Pengiriman",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: "Ya",
		cancelButtonText: "Batal",
		reverseButtons: true,
	}).then((result) => {
		if (result.value) {
			window.location.href = url;
		}
	});
}
function pernerimaanpesanan(url) {
	Swal.fire({
		title: "Konfirmasi Terima Pesanan!",
		text: "Apakah Barang Sudah Sampai",
		type: "question",
		showCancelButton: true,
		confirmButtonText: "Ya",
		cancelButtonText: "Belum",
		reverseButtons: true,
	}).then((result) => {
		if (result.value) {
			window.location.href = url;
		}
	});
}

$(document).ready(function () {
	loaddatakategori();
	loaderbarangbaru();
	databarangkategori();
});

function loaderbarangbaru() {
	loadingbarangbaru();
	var action = "inactive";
	$.ajax({
		url: base_url + "home/loadbarangbaruaktif",
		method: "POST",
		data: {
			status: "loadbarang",
		},
		cache: false,
		success: function (data) {
			if (data == "") {
				$("#loaderbarangbaru").html(``);
				action = "active";
			} else {
				$("#loaderbarangbaru").html("");
				$("#loaderbarangbaru").append(data);
				action = "inactive";
			}
		},
	});
}
function loadingbarangbaru() {
	// <div class="col-6 col-sm-4 col-lg-3">
	//       <div class="card top-product-card mb-3">
	//         <div class="card-body"></div>
	var output = "";
	output += '<br><div class="row">';
	for (var count = 0; count < 8; count++) {
		output += '<div class="col-6 col-sm-4 col-lg-3">';
		output += '<div class="card top-product-card mb-3">';
		output += '<div class="card-body">';
		output +=
			'<p><span class="content-placeholder" style="width:100%; height: 40px;">&nbsp;</span></p>';
		output +=
			'<p><span class="content-placeholder" style="width:100%; height: 10px;">&nbsp;</span></p>';
		output += "</div>";
		output += "</div>";
		output += "</div>";
	}
	output += "</div>";
	$("#loaderbarangbaru").html(output);
}
function databarangkategori() {
	var action = "inactive";
	loadingkategori();
	$.ajax({
		url: base_url + "home/loaddatabarangperkategori",
		method: "POST",
		data: {
			status: "loaddatabarangkategori",
		},
		cache: false,
		success: function (data) {
			if (data == "") {
				$("#databarangkategori").html(``);
				action = "active";
			} else {
				$("#databarangkategori").html("");
				$("#databarangkategori").append(data);
				action = "inactive";
			}
		},
	});
}
function loadingkategori() {
	// <div class="col-6 col-sm-4 col-lg-3">
	//       <div class="card top-product-card mb-3">
	//         <div class="card-body"></div>
	var output = "";
	output += '<br><div class="row">';
	for (var count = 0; count < 8; count++) {
		output += '<div class="col-6 col-sm-4 col-lg-3">';
		output += '<div class="card top-product-card mb-3">';
		output += '<div class="card-body">';
		output +=
			'<p><span class="content-placeholder" style="width:100%; height: 40px;">&nbsp;</span></p>';
		output +=
			'<p><span class="content-placeholder" style="width:100%; height: 10px;">&nbsp;</span></p>';
		output += "</div>";
		output += "</div>";
		output += "</div>";
	}
	output += "</div>";
	$("#databarangkategori").html(output);
}
function NumberNoEnter(evt) {
	if (evt.keyCode != 13) {
		var charCode = evt.which ? evt.which : event.keyCode;
		if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
		return true;
	} else {
		return false;
	}
}
function HurufNoEnter(evt) {
	if (evt.keyCode != 13) {
		var charCode = evt.which ? evt.which : event.keyCode;
		if (
			(charCode < 65 || charCode > 90) &&
			(charCode < 97 || charCode > 122) &&
			charCode > 32
		)
			return false;
		return true;
	} else {
		return false;
	}
}
function loaddatakategori() {
	var action = "inactive";
	loaderkategori();
	$.ajax({
		url: base_url + "home/loaddatakategori",
		method: "POST",
		data: {
			status: "loadkategori",
		},
		cache: false,
		success: function (data) {
			// console.log(data);
			if (data == "") {
				$("#load_data_kategori").html(``);
				action = "active";
			} else {
				$("#load_data_kategori").html("");
				$("#load_data_kategori").append(data);
				$("#pesan_kategori").html("");
				action = "inactive";
			}
		},
	});

	function loaderkategori() {
		var output = "";
		for (var count = 0; count < 9; count++) {
			output += '<div class="col-4">';
			output += '<div class="card mb-4 catagory-card">';
			output += '<div class="card-body">';
			output +=
				'<p><span class="content-placeholder" style="width:100%; height: 40px;">&nbsp;</span></p>';
			output +=
				'<p><span class="content-placeholder" style="width:100%; height: 10px;">&nbsp;</span></p>';
			output += "</div>";
			output += "</div>";
			output += "</div>";
		}
		$("#load_data_kategori").html(output);
	}
}
function FormValidasi() {
	var applicationForm = document.getElementById("FormValidasi");
	if (applicationForm.checkValidity()) {
		$(".loaderform").show();
		applicationForm.submit();
	} else {
		applicationForm.reportValidity();
	}
}

$("#caribarcodebarang").on("click", function () {
	var id = $("#kode_barcode_penjualan").val();
	// console.log(id);
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
							element.kode_barcode +
							` </td>
						<td> ` +
							element.nama_barang +
							` </td>
						<td> ` +
							element.nama_kategori +
							` </td>
						<td> ` +
							element.nama_jenis +
							` </td>
						<td> ` +
							element.berat +
							` </td>
						<td> ` +
							element.kadar +
							` </td>
						<td>Rp. ` +
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

function deleteRow(btn) {
	var row = btn.parentNode.parentNode;
	row.parentNode.removeChild(row);
}
