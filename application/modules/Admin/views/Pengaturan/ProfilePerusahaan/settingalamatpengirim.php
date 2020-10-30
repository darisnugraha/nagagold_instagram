<style>
     .overlay4 {
        background: #ffffff;
        color: #666666;
        position: absolute;
        height: 91%;
        width: 98%;
        z-index: 1;
        min-height: 20vh;
        text-align: center;
        padding-top: 20%;
        -ms-opacity: 0.10;
        opacity: 0.8;
    }
</style>
<div class="content">
    <?= $this->load->view('Themes/Admin/tollbar') ?>
    <!-- BEGIN: Datatable -->

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Setting ALamat Pengiriman
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <div class="text-center">
            </div>
        </div>
    </div>
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <form action="<?= base_url('simpan-alamat-pengirim') ?>" enctype="multipart/form-data" method="POST">
            <?php 
            if($DataPengiriman->data == null): ?>
                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <div class="overlay4" style="display:none">
                    <span class="fa fa-spinner fa-6 fa-spin"></span>Loading....
                </div>
                    <div class="col-span-12">
                        <label>Pilih Provinsi</label>
                        <select class="input border mr-2 w-full provinsi_kosong" name="provinsi" >
                            <option value=""> Pilih Provinsi  </option>
                            <?php  $count = count($Provinsi->data);
                            $dataprovinsi = $Provinsi->data;
                            for($i=0; $i<$count; $i++ ): ?>
                                <option <?=  explode('-',$this->session->userdata('provinsi_lama'))[0]  == $dataprovinsi[$i]->province_id ? 'selected' : '' ?> value="<?= $dataprovinsi[$i]->province_id ?>-<?= $dataprovinsi[$i]->province?>"> <?= $dataprovinsi[$i]->province?> </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <br>
                    <div class="col-span-12">
                        <label>Pilih Kota</label>
                        <select class="input border mr-2 w-full" name="kota" id="kota_kosong">
                            <option value=""> Pilih Kota  </option>
                        </select>
                    </div>
                    <br>
                  
                    <div class="col-span-12">
                        <label>Pilih Kecamatan</label>
                        <select class="input border mr-2 w-full" name="kecamatan" id="kecamatan_kosong">
                            <option value=""> Pilih Kecamatan  </option>
                        </select>
                    </div>
                  <br>
                  <div class="col-span-12">
                        <label>Kode Pos</label>
                        <input type="text" onkeypress="return NumberNoEnter(event)" name="kode_pos" value="" class="input w-full border mt-2 flex-1" placeholder="Masukan Kode Pos">
                    </div>
                    <div class="col-span-12">
                        <label>Alamat Lengkap</label>
                        <textarea name="alamat" class="input w-full border mt-2 flex-1" placeholder="Masukan Alamat Lengkap"></textarea>
                    </div>
                </div>
            <?php else: ?>
            <?php
                foreach ($DataPengiriman->data  as $row) : ?>

                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <div class="overlay4" style="display:none">
                    <span class="fa fa-spinner fa-6 fa-spin"></span>Loading....
                </div>
                <div class="col-span-12">
                        <label>Pilih Provinsi</label>
                        <select class="input border mr-2 w-full" name="provinsi" id="provinsi_aktif">
                            <option value=""> Pilih Provinsi  </option>
                            <?php  $count = count($Provinsi->data);
                            $dataprovinsi = $Provinsi->data;
                            for($i=0; $i<$count; $i++ ): ?>
                                <option <?=  $row->kode_provinsi  == $dataprovinsi[$i]->province_id ? 'selected' : '' ?> value="<?= $dataprovinsi[$i]->province_id ?>-<?= $dataprovinsi[$i]->province?>"> <?= $dataprovinsi[$i]->province?> </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <br>
                    <div class="col-span-12">
                        <label>Pilih Kota</label>
                        <input type="hidden" id="kota_asli" value="<?= $row->kode_kota ?>" class="input w-full border mt-2 flex-1" placeholder="Masukan Kode Pos">
                        <select class="input border mr-2 w-full" name="kota" id="kota_aktif">
                            <option value=""> Pilih Kota  </option>
                        </select>
                    </div>
                    <br>
                  
                    <div class="col-span-12">
                        <label>Pilih Kecamatan</label>
                        <input type="hidden" id="kecamatan_asli" value="<?= $row->kode_kecamatan ?>" class="input w-full border mt-2 flex-1" placeholder="Masukan Kode Pos">
                        <select class="input border mr-2 w-full" name="kecamatan" id="kecamatan_aktif">
                            <option value=""> Pilih Kecamatan  </option>
                        </select>
                    </div>
                  <br>
                  <div class="col-span-12">
                        <label>Kode Pos</label>
                        <input type="text" onkeypress="return NumberNoEnter(event)" name="kode_pos" value="<?= $row->kode_pos ?>" class="input w-full border mt-2 flex-1" placeholder="Masukan Kode Pos">
                    </div>
                    <div class="col-span-12">
                        <label>Alamat Lengkap</label>
                        <textarea name="alamat" class="input w-full border mt-2 flex-1" placeholder="Masukan Alamat Lengkap"><?= $row->alamat_lengkap ?></textarea>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
            <div class="px-5 py-3 text-right border-t border-gray-200">
                <!-- <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">Batal</button> -->
                <button type="submit" class="button w-20 bg-theme-1 w-full text-white">Simpan Perusahaan</button>
            </div>
        </form>
    </div>
</div>

<?php  
if($DataPengiriman->data == null): ?>
    <script>
        $('.provinsi_kosong').on('change',function(){
            var id = $(this).val();
            $('.overlay4').show();

		// console.log(id);
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
            $('.overlay4').hide();
                
				$("#kota_kosong").html("<option value=''>Pilih Kota</option>");
				$.each(feedback.data, function (index, element) {
					$("#kota_kosong").append(
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
        })
        $("#kota_kosong").on("change", function () {
        var id = $(this).val();
        $('.overlay4').show();
        
		// console.log(id);
		var kota = id.split("-");
		console.log(kota[0]);
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
                // console.log(feedback);
            $('.overlay4').hide();

				$("#kecamatan_kosong").html("<option value=''>Pilih Kecamatan</option>");
				$.each(feedback.data, function (index, element) {
					$("#kecamatan_kosong").append(
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
    </script>
<?php else: ?>
    <script>
        $( document ).ready(function() {
            loadprovinsi();
            loadkecamatan();
        });

        function loadprovinsi(){
            $('.overlay4').show();
            var id = $('#provinsi_aktif').val();
            var provinsi = id.split("-");
            $.ajax({
                url: base_url + "loadkota",
                method: "POST",
                data: {
                    province_id: provinsi[0],
                },
                complete: function (respons) {
                    var feedback = respons.responseJSON;
                    // console.log(feedback.data);
                    $('.overlay4').hide();
                    $("#kota_aktif").html("<option value=''>Pilih Kota</option>");
                    var kota_asli = $('#kota_asli').val();

                    $.each(feedback.data, function (index, element) {
                        var status;
                        if(kota_asli==element.city_id){
                            status="selected";
                        }else{
                            status="";
                        }
                        $("#kota_aktif").append(
                            `
                                <option `+status+` value="` +
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
        function loadkecamatan(){
            var id = $('#kota_asli').val();
            console.log(id);
            // var kecamatan = id.split("-");
            $('.overlay4').show();
            $.ajax({
                url: base_url + "loadkecamatan",
                dataType: "json",
                method: "POST",
                data: {
                    subdistrict_id: id,
                },
                complete: function (respons) {
                    var feedback = respons.responseJSON;
                    // console.log(feedback);
                    $('.overlay4').hide();

                    $("#kecamatan_aktif").html("<option value=''>Pilih Kecamatan Aktif</option>");
                    var kecamatan_asli = $('#kecamatan_asli').val();
                    console.log(kecamatan_asli);
                    $.each(feedback.data, function (index, element) {
                        var status;
                        if(kecamatan_asli==element.subdistrict_id){
                            status="selected";
                        }else{
                            status="";
                        }
                        $("#kecamatan_aktif").append(
                            `
                            <option `+status+` value="` +
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
        $('#provinsi_aktif').on('change',function(){
            var id = $(this).val();
            $('.overlay4').show();
            var provinsi = id.split("-");
            $.ajax({
                url: base_url + "loadkota",
                method: "POST",
                data: {
                    province_id: provinsi[0],
                },
                complete: function (respons) {
                    var feedback = respons.responseJSON;
                    // console.log(feedback.data);
                    $('.overlay4').hide();
                    $("#kota_aktif").html("<option value=''>Pilih Kota</option>");
                    $.each(feedback.data, function (index, element) {
                        $("#kota_aktif").append(
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
        })

        $("#kota_aktif").on("change", function () {
            var id = $(this).val();
            $('.overlay4').show();
            
            // console.log(id);
            var kota = id.split("-");
            console.log(kota[0]);
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
                    // console.log(feedback);
                    $('.overlay4').hide();

                    $("#kecamatan_aktif").html("<option value=''>Pilih Kecamatan</option>");
                    $.each(feedback.data, function (index, element) {
                        $("#kecamatan_aktif").append(
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
    </script>
<?php endif; ?>