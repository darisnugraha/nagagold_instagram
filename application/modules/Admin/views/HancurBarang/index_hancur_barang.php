<style>
    .overlay4 {
        background: #ffffff;
        color: #666666;
        position: absolute;
        height: 28%;
        width: 98%;
        z-index: 1;
        min-height: 20vh;
        text-align: center;
        padding-top: 5%;
        -ms-opacity: 0.10;
        opacity: 0.8;
    }

    table.loading tbody {
        position: relative;
    }

    table.loading tbody:after {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.1);
        background-image: url('<?= base_url('assets/images/loadingtable.gif') ?>');
        background-position: center;
        background-repeat: no-repeat;
        background-size: 50px 50px;
        content: "";
    }
</style>
<div class="content">
    <?= $this->load->view('Themes/Admin/tollbar') ?>
    <!-- BEGIN: Datatable -->

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Input Data Barang Yang Akan Dihancur
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <div class="text-center">
                <!-- <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview" class="button inline-block bg-theme-1 text-white">Tambah Jenis</a>  -->
            </div>
        </div>
    </div>
    <form action="<?= base_url('simpan-hancurbarang-semua') ?>" id="form" method="POST">
        <div class="intro-y datatable-wrapper box p-5 mt-5">
            <div class="overlay4" style="display:none">
                <span class="fa fa-spinner fa-6 fa-spin"></span>Loading....
            </div>
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <div class="col-span-12">
                    <label>Masukan Kode Barcode</label>
                </div>
                <div class="col-span-5">
                    <select name="kode_kategori" id="barcodehancur" style="width:100%" class="select2 w-full input w-full border mt-2 flex-1">
                    </select>
                    <!-- <input type="text" name="kode_barcode" class="input w-full border mt-2 flex-1" placeholder="Masukan Kata Pencarian"> -->
                </div>
                <div class="col-span-4">
                    <input type="text" placeholder="Masukan Nama Barang" disabled class="nama_barang1 input w-full border">
                    <input type="hidden" class="kode_barcode1" placeholder="Masukan Nama Barang" disabled class=" input w-full border">
                </div>
                <div class="col-span-3">
                    <input type="button" value="Tambah Barang" class="tambahbarang1 button bg-theme-1 text-white input w-full border">
                </div>

            </div>
        </div>
        <div class="intro-y datatable-wrapper box p-5 mt-5">
            <table id="tablebarang1" class="table table-report table-report--bordered display w-full">
                <thead>
                    <tr>
                        <th class="border-b-2 text-left whitespace-no-wrap">Kode Barcode</th>
                        <th class="border-b-2 text-left whitespace-no-wrap">Nama Barang</th>
                        <th class="border-b-2 text-center whitespace-no-wrap">Action Hapus Barang</th>
                    </tr>
                </thead>
                <tbody id="databarang1">

                </tbody>
            </table>
            <br>
            <input type="hidden" name="databarang1" id="DataBarangsatu">
            <input type="submit" value="Hancur Barang" class="button bg-theme-1 text-white input w-full border">

            <!-- <iframe src="https://www.whatsapp.com/" width="100%" height="300" style="border:1px solid black;"></iframe>  -->
        </div>
    </form>

</div>

<script>
    $(document).ready(function() {
        loadbaranghancur();
        $("#form").submit(function(e) {
            var form = this;
            var temporary_tbl = $('table#tablebarang1 tbody tr').get().map(function(row) {
                return $(row).find('td').get().map(function(cell) {
                    return $(cell).html();
                });
            });
            console.log(temporary_tbl);
            $("#DataBarangsatu").val(JSON.stringify(temporary_tbl));
        });
        $("#barcodehancur").select2({
            theme: "bootstrap",
            width: null,
            placeholder: "Masukan Kata Kunci Pencarian",
            ajax: {
                url: base_url + "getBarcodeHancur",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
        $('.tambahbarang1').on('click', function() {
            var kode_barcode = $('.kode_barcode1').val();
            var nama_barang1 = $('.nama_barang1').val();
            $('.overlay4').show();
            // var id = $(this).val();
            // console.log(kode_barcode);
            $.ajax({
                url: base_url + "/simpantmphancur",
                dataType: 'json',
                type: 'POST',
                data: {
                    kode_barcode: kode_barcode
                    // nama_barang: nama_barang1
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
                    // console.log(feedback);
                    if (feedback.status == "berhasil") {
                        $('.overlay4').hide();
                        Swal.fire({
                            title: 'Success',
                            text: 'Kode Barcode Berhasil Ditambahkan',
                            type: 'success',
                            reverseButtons: true
                        })
                        loadbaranghancur();
                        $('.overlay4').hide();
                    } else {
                        Swal.fire({
                            title: 'Opps!!!',
                            text: feedback.pesan,
                            type: 'warning',
                            reverseButtons: true
                        })
                        $('.overlay4').hide();
                    }
                }
            })
        });
        $('#barcodehancur').on('change', function() {
            $('.overlay4').show();
            var id = $(this).val();
            // console.log(id);
            $.ajax({
                // loadhancurbarang
                url: base_url + "cari-barcodde-js",
                dataType: 'json',
                type: 'POST',
                data: {
                    searchTerm: id,
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
                    // console.log(feedback.data);
                    if (feedback.status == "berhasil") {
                        $('.overlay4').hide();
                        $.each(feedback.data, function(index, element) {
                            $('.nama_barang1').val(element.nama_barang);
                            $('.kode_barcode1').val(element.kode_barcode);
                        })
                    } else {
                        Swal.fire({
                            title: 'Opps :(',
                            text: "Kode Barang / Kode Barcode Yang Anda Masukan Tidak Ada",
                            type: 'warning',
                            reverseButtons: true
                        })
                        $('.overlay4').hide();
                    }
                }
            })
        })
    });

    function loadbaranghancur() {
        $('table').addClass('loading');
        $.ajax({
            url: base_url + "/loadhancurbarang",
            dataType: 'json',
            type: 'POST',
            data: {
                loadbarang: 'loaddatabarang'
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
                if (feedback.status == "berhasil") {
                    $('table').removeClass("loading");
                    $('.overlay4').hide();
                    $('#databarang1').html('');
                    $.each(feedback.data, function(index, element) {
                        var markup = `"
                            <tr>
                                <td>` + element.kode_barcode + `</td>
                                <td>` + element.nama_barang + `</td>
                                <td align="center">
                                    <input type='radio' onclick="hapusconfirmbarang('` + element.kode_barcode + `')" name='record'>
                                </td>
                            </tr>
                            "`;
                        $("#databarang1").append(markup);
                    })
                } else {
                    $('table').removeClass("loading");
                    $('.overlay4').hide();
                }
            }
        })
    }

    function hapusconfirmbarang(url) {
        $('table').addClass('loading');
        Swal.fire({
            title: 'Konfirmasi Hapus Data!',
            text: "Yakin Untuk Menghapus Data Ini",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                // console.log(url);
                // $('.overlay4').show();
                $.ajax({
                    // loadhancurbarang
                    url: base_url + "/hapushancur",
                    dataType: 'json',
                    type: 'POST',
                    data: {
                        kode_barcode: url
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
                        if (feedback.status == "berhasil") {
                            // $('.overlay4').hide();
                            $('table').removeClass("loading");
                            loadbaranghancur();
                        } else {
                            Swal.fire({
                                title: 'Opps :(',
                                text: "Kode Barang / Kode Barcode Gagal Dihapus",
                                type: 'warning',
                                reverseButtons: true
                            })
                            $('.overlay4').hide();
                        }
                    }
                })
            } else {
                $('table').removeClass("loading");
            }
        })
    }
</script>