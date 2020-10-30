$(document).ready(function () {
	loadkota();
	loadkecamatan();

	$("#pass2").on("change", function () {
		var pass1 = $("#pass1").val();
		var pass2 = $("#pass2").val();

		if (pass1 != pass2) {
			$("#password_salah1").show();
			$("#password_salah2").hide();

			$("#pass2").attr("required", "true");

			$("#pass2").val("");

			$("#pesaneror").addClass("has-error");
			$("#pesaneror2").addClass("has-error");
			// input1.className = "has-error";
			// input2.className = "has-error";
		} else {
			$("#password_salah1").hide();
			$("#password_salah2").show();

			$("#pesaneror").removeClass("has-error");
			$("#pesaneror2").removeClass("has-error");

			$("#pesaneror").addClass("has-success");
			$("#pesaneror2").addClass("has-success");

			// input1.className = "form-group has-success";
			// input2.className = "form-group has-success";
		}
	});
	$("#provinsi").on("change", function () {
		var id = $(this).val();
		console.log(id);
		var provinsi = id.split("-");
		// console.log(provinsi);
		$.ajax({
			url: base_url + "loadkota",
			method: "POST",
			data: {
				province_id: provinsi[0],
			},
			complete: function (respons) {
				var feedback = respons.responseJSON;
				// console.log(feedback.data);
				$("#kota").html("<option value=''>Pilih Kota</option>");
				$.each(feedback.data, function (index, element) {
					$("#kota").append(
						`
                            <option value="` +
							element.city_id +
							`-` +
							element.type +
							" " +
							element.city_name +
							`">` +
							element.type +
							` ` +
							element.city_name +
							`</option>
                        `
					);
				});
			},
		});
	});
	$("#kota").on("change", function () {
		var id = $(this).val();
		// console.log(id);
		var kota = id.split("-");
		// console.log(kota[0]);
		// var kecamatan = id.split("-");
		$.ajax({
			url: base_url + "loadkecamatan",
			dataType: "json",
			method: "POST",
			data: {
				subdistrict_id: kota[0],
			},
			complete: function (respons) {
				var feedback = respons.responseJSON;
				$("#kecamatan").html("<option value=''>Pilih Kecamatan</option>");
				$.each(feedback.data, function (index, element) {
					$("#kecamatan").append(
						`
                        <option value="` +
							element.subdistrict_id +
							"-" +
							element.subdistrict_name +
							`">` +
							element.subdistrict_name +
							`</option>
                    `
					);
				});
			},
		});
	});
});

function validasimemberlama() {
	var applicationForm = document.getElementById("form-aktifasi-memberlama");
	if (applicationForm.checkValidity()) {
		$(".loaderform").show();
		applicationForm.submit();
	} else {
		applicationForm.reportValidity();
	}
}
function validasikonfirmasi() {
	var applicationForm = document.getElementById("validasikonfirmasi");
	if (applicationForm.checkValidity()) {
		$(".loaderform").show();
		applicationForm.submit();
	} else {
		applicationForm.reportValidity();
	}
}
function validasiformdaftar() {
	var applicationForm = document.getElementById("form-register");
	if (applicationForm.checkValidity()) {
		$(".loaderform").show();
		applicationForm.submit();
	} else {
		applicationForm.reportValidity();
	}
}
function validasiformlogin() {
	var applicationForm = document.getElementById("form-login");
	if (applicationForm.checkValidity()) {
		$(".loaderform").show();
		applicationForm.submit();
	} else {
		console.log(applicationForm);
		applicationForm.reportValidity();
	}
}
function loadkota() {
	var id_prov = $("#provinsi").val();
	if (id_prov == undefined) {
	} else {
		var kota_id = id_prov.split("-");
		var data_kota = $("#kota_lama").val();
		var namakota = data_kota.split("-");

		var status = "";
		if (kota_id != "") {
			$.ajax({
				url: base_url + "loadkota",
				method: "POST",
				data: {
					province_id: kota_id[0],
				},
				complete: function (respons) {
					var feedback = respons.responseJSON;
					// console.log(feedback.data);
					$("#kota").html("");
					$.each(feedback.data, function (index, element) {
						if (namakota == element.city_id) {
							status = "selected";
						} else {
							status = "";
						}
						$("#kota").append(
							`
                            <option ` +
								status +
								` value="` +
								element.city_id +
								`-` +
								element.type +
								" " +
								element.city_name +
								`">` +
								element.type +
								` ` +
								element.city_name +
								`</option>
                        `
						);
					});
				},
			});
		}
	}
}
function loadkecamatan() {
	var data_kota = $("#kota_lama").val();
	if (data_kota == undefined) {
	} else {
		var kotaBaru = data_kota.split("-");

		var data_kecamatan = $("#kecamatan_lama").val();
		var kec = data_kecamatan.split("-");

		var status = "";
		if (kotaBaru != "") {
			$.ajax({
				url: base_url + "loadkecamatan",
				dataType: "json",
				method: "POST",
				data: {
					subdistrict_id: kotaBaru[0],
				},
				complete: function (respons) {
					var feedback = respons.responseJSON;
					// console.log(feedback);
					$("#kecamatan").html("");
					$.each(feedback.data, function (index, element) {
						if (kec == element.subdistrict_id) {
							status = "selected";
						} else {
							status = "";
						}
						$("#kecamatan").append(
							`
                        <option ` +
								status +
								` value="` +
								element.subdistrict_id +
								"-" +
								element.subdistrict_name +
								`">` +
								element.subdistrict_name +
								`</option>
                    `
						);
					});
				},
			});
		}
	}
}
