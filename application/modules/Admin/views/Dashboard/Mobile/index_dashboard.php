<div class="page-content-wrapper">
  <!-- Product Catagories-->
  <div class="product-catagories-wrapper pt-3">
    <div class="container">
      <div class="section-heading d-flex align-items-center justify-content-between">
        <h6 class="ml-1">Dashboard Toko Mas Hidup</h6><br>
      </div>
      <div class="product-catagory-wrap">
        <div class="row" id="load_data_dashboard">
          <div id="pesan_dashboard"></div>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
<br>
<br>

<script>
  $(document).ready(function () {
    loaddatakategori();
});
// setInterval(() => {
//   $.ajax({
// 		url: base_url + "admin/loaddashboard",
// 		method: "POST",
// 		data: {
// 			status: "loadkategori",
// 		},
// 		cache: false,
// 		success: function (data) {
// 			// console.log(data);
// 			if (data == "") {
// 				$("#load_data_dashboard").html(``);
// 				action = "active";
// 			} else {
// 				$("#load_data_dashboard").html("");
// 				$("#load_data_dashboard").append(data);
// 				$("#pesan_dashboard").html("");
// 				action = "inactive";
// 			}
// 		},
// 	});
// }, 3000);
function loaddatakategori() {
	var action = "inactive";
	loaderkategori();
	$.ajax({
		url: base_url + "admin/loaddashboard",
		method: "POST",
		data: {
			status: "loadkategori",
		},
		cache: false,
		success: function (data) {
			console.log(data);
			if (data == "") {
				$("#load_data_dashboard").html(``);
				action = "active";
			} else {
				$("#load_data_dashboard").html("");
				$("#load_data_dashboard").append(data);
				$("#pesan_dashboard").html("");
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
		$("#load_data_dashboard").html(output);
	}
}
</script>