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
            Kelola Kurir
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <div class="text-center">
            </div>
        </div>
    </div>
    <form action="<?= base_url('simpan-kurir') ?>" method="POST">
        <div class="pesannotif"></div>
        <div class="intro-y datatable-wrapper box p-5 mt-5">
            <div class="intro-y datatable-wrapper box p-5 mt-5">
                <table class="table table-report table-report--bordered display w-full">
                    <thead>
                        <tr>
                            <th class="border-b-2 whitespace-no-wrap">No</th>
                            <th class="border-b-2 text-center whitespace-no-wrap">Nama Kurir</th>
                            <th class="border-b-2 text-center whitespace-no-wrap">Aktifkan Kurir</th>
                        </tr>
                    </thead>
                    <tbody id="loadbarang">
                    </tbody>
                </table>
            </div>
        </div>
</div>
</form>
<script type="text/javascript">
    $(document).ready(function() {
        loadkurir();
    })

    function loadkurir() {
        $('table').addClass('loading');
        $.ajax({
            url: base_url + "loaddatakurir",
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
                    $('#loadbarang').html('');
                    var i = 1;
                    $.each(feedback.data, function(index, element) {
                        var aktif;
                        if (element.status_active == "1") {
                            aktif = 'checked';
                        } else {
                            aktif = '';
                        }
                        var markup = `"
                            <tr>
                                <td class="border-b-2 whitespace-no-wrap">` + i++ + `</td>
                                <td class="border-b-2 text-center whitespace-no-wrap">` + element.nama_courier + `</td>
                                <td class="border-b-2 text-center whitespace-no-wrap" align="center"><input id="kurir` + element.kode_courier + `" type='checkbox' ` + aktif + ` onchange="updatekurir('` + element.kode_courier + `')" class="btn btn-sm btn-danger btn-delete" type="checkbox" name='record'></td>
                            </tr>
                            "`;
                        $("#loadbarang").append(markup);
                    })
                } else {
                    $('table').removeClass("loading");
                    $('.overlay4').hide();
                }
            }
        })
    }

    function checkAll(ele) {
        var checkboxes = document.getElementsByTagName('input');
        if (ele.checked) {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = true;
                }
            }
        } else {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = false;
                }
            }
        }
    }

    function updatekurir(kode_courier) {
        var checkBox = document.getElementById("kurir" + kode_courier);
        // console.log(checkBox);
        if (checkBox.checked == true) {
            hapus(kode_courier, '1');
        } else {
            hapus(kode_courier, '0');
            // console.log('no');
        }
    }

    function hapus(id, status) {
        console.log(status);
        $.ajax({
            url: base_url + "updatekurir",
            dataType: 'json',
            type: 'POST',
            data: {
                kode_kurir: id,
                status: status
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
                console.log(feedback);
                if (feedback.status == "berhasil") {
                    var kata;
                    if (status == 1) {
                        kata = 'Diaktifkan';
                    } else {
                        kata = 'Dinonaktifkan';
                    }
                    $('.pesannotif').html('');
                    $('.pesannotif').append(`
                        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-1 text-white">` + id + ` Berhasil ` + kata + `</div>
                    `);
                    loadkurir();
                } else {
                    $('.pesannotif').html('');
                    $('.pesannotif').append(`
                       <div class="rounded-md px-5 py-4 mb-2 bg-theme-12 text-white">` + feedback.pesan + `</div>
                    `);
                    loadkurir();
                }
            }
        })
    }
</script>