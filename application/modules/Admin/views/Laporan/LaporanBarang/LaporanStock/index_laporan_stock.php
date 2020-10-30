<div class="content">
    <?= $this->load->view('Themes/Admin/tollbar') ?>
    <!-- BEGIN: Datatable -->

    <!-- <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Laporan Stok Barang
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <div class="text-center">
            </div>
        </div>
    </div> -->
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <form action="<?= base_url('export-laporan-stock') ?>" target="_blank" method="POST">
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">

                <div class="col-span-4">
                    <label>Type Laporan</label>
                    <div class="mt-2">
                        <label><input type="radio" value="rekap" id="rekap" name="type_laporan[]"> Rekap</label>
                        <br>
                        <label><input type="radio" value="detail" id="detail" name="type_laporan[]"> Detail</label>
                    </div>
                </div>
                <div class="col-span-4">
                    <label>Kategori</label>
                    <div class="mt-2">
                        <select class="select2 w-full border mt-2" onchange="carijenis()" id="rekap_detail" name="kode_kategori">
                            <option value=""> Pilih Kategori </option>
                        </select>
                    </div>
                </div>
                <div class="col-span-4">
                    <label>Jenis</label>
                    <div class="mt-2">
                        <select required class="select2 block w-full border mt-2" id="rekap_jenis" name="kode_jenis">
                            <option value=""> Pilih Jenis </option>
                        </select>
                    </div>
                </div>
                <div class="col-span-4">
                    <label>Status Barang</label>
                    <div class="relative mt-2">
                        <select required class="select2 w-full" name="status_active">
                            <option value="SEMUA"> Semua </option>
                            <option value="ACTIVE"> Barang Display </option>
                            <option value="OPEN"> Barang None Display </option>
                        </select>
                    </div>
                </div>
                <div class="col-span-4">
                    <label>Pilih Export</label>
                    <div class="relative mt-2">
                        <select required class="select2 w-full" name="typeexport">
                            <option value="PDF"> PDF </option>
                            <option value="EXEL"> Exel </option>
                        </select>
                    </div>
                </div>
                <!-- <div class="col-span-4">
                    <label>Limit Export</label>
                    <div class="relative mt-2">
                        <input type="text" value="10" onkeypress="return NumberNoEnter(event)" value="10" required autocomplete="off" name="limit" class="input pr-12 w-full border col-span-4" placeholder="Masukan Limit Laporan Barang">
                    </div>
                </div> -->

                <div class="col-span-4">
                    <label>&nbsp;</label>
                    <div class="relative mt-2">
                        <input type="submit" value="Print" class="button bg-theme-1 text-white input w-full border">
                    </div>
                </div>


            </div>
        </form>
    </div>
</div>

<script>
    $("#detail, #rekap").click(function() {
        if ($("#rekap").is(":checked")) {
            $('#rekap_detail').html(``);
            $('#rekap_detail').append(`
                <option value="SEMUA"> Semua </option>
            `);
            loadkategori_rkap();
            $('#rekap_jenis').html(``);
            $('#rekap_jenis').append(`
                <option value="SEMUA"> Semua </option>
            `);
        } else {
            $('#rekap_jenis').html(`<option value=""> Pilih Jenis</option>`);
            loadkategori_detail();
        }
    });

    function loadkategori_rkap() {
        $.ajax({
            url: base_url + "getKategori",
            method: "GET",
            complete: function(respons) {
                var feedback = respons.responseJSON;
                console.log(feedback.data);
                $('#rekap_detail').html("<option value='SEMUA'>Semua</option>");
                $.each(feedback.data, function(index, element) {
                    $('#rekap_detail').append(`
                            <option value="` + element.kode_kategori + `"> ` + element.nama_kategori + `</option>
                        `);
                })
            }
        });
    }

    function loadkategori_detail() {
        $.ajax({
            url: base_url + "getKategori",
            method: "GET",
            complete: function(respons) {
                var feedback = respons.responseJSON;
                console.log(feedback.data);
                $('#rekap_detail').html("");
                $.each(feedback.data, function(index, element) {
                    $('#rekap_detail').append(`
                            <option value="` + element.kode_kategori + `"> ` + element.nama_kategori + `</option>
                        `);
                })
            }
        });
    }
    // $('#rekap_detail').on('change', function() {
    function carijenis() {

        var id = document.getElementById("rekap_detail").value;
        console.log(id);
        $.ajax({
            url: base_url + "cari-jenis",
            dataType: 'json',
            type: 'POST',
            data: {
                kode_kategori: id
            },
            beforeSend: function(e) {
                if (e && e.overrideMimeType) {
                    e.overrideMimeType('application/jsoncharset=utf-8')
                }
            },
            error: function(e) {
                console.log(e);
            },
            complete: function(respons) {
                var feedback = respons.responseJSON;
                console.log(feedback);
                if (feedback.status == "berhasil") {
                    if ($("#rekap").is(":checked")) {
                        $('#rekap_jenis').html('<option value="SEMUA">Semua </option>');
                        $.each(feedback.data, function(index, element) {
                            $('#rekap_jenis').append(`
                                <option value="` + element.kode_jenis + `"> ` + element.nama_jenis + ` </option>
                        `);
                        })
                    } else {
                        $('#rekap_jenis').html('');
                        $.each(feedback.data, function(index, element) {
                            $('#rekap_jenis').append(`
                                <option value="` + element.kode_jenis + `"> ` + element.nama_jenis + ` </option>
                        `);
                        })

                    }
                } else {
                    $('#rekap_jenis').html('');
                    $('#rekap_jenis').append(`
                        <option value=""> Pilih Kode Jenis </option>
                    `);
                }
            }
        })
    }
</script>