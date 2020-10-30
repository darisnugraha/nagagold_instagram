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
            Batal Penjualan
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <div class="text-center">
                <!-- <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview" class="button inline-block bg-theme-1 text-white">Tambah Jenis</a>  -->
            </div>
        </div>
    </div>
    <form action="<?= base_url('simpan-batal-penjualan') ?>" id="form" method="POST">
        <div class="intro-y datatable-wrapper box p-5 mt-5">
            <div class="overlay4" style="display:none">
                <span class="fa fa-spinner fa-6 fa-spin"></span>Loading....
            </div>
            <!-- <input type="text"  value="1" class="kode_barcode1"> -->
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <!-- <div class="col-span-12">
                    <label>Pilih No Transaksi</label>
                </div> -->
                <div class="col-span-4">
                        <select name="pencarian_barang" id="id_pencarian" style="width:100%" class="w-full input w-full border mt-2 flex-1">
                            <option value=""> Pilih Pencarian </option>
                            <option value="kode_customer"> Kode Customer  </option>
                            <option value="no_transaksi"> No Transaksi  </option>
                        </select>                
                </div>
                <div class="col-span-4">
                    <!-- <label>Masukan Id Transaksi</label> -->
                    <div class="relative mt-2">
                        <input required="" id="pencarian" type="text" autocomplete="off" name="pencarian" class="input pr-12 w-full border col-span-4" placeholder="Masukan Pencarian">
                    </div>
                </div>
                <div class="col-span-4">
                    <!-- <label>&nbsp;</label> -->
                    <div class="relative mt-2">
                        <input type="button" value="+" id="btn_cari_transaksi" class="tambahbarang1 button bg-theme-1 text-white input w-full border">
                    </div>
                </div>

            </div>
        </div>
        <div class="intro-y datatable-wrapper box p-5 mt-5">
            <table id="tablebarang1" class="table table-report table-report--bordered display w-full">
                <thead>
                    <tr>
                        <th class="border-b-2 text-left whitespace-no-wrap">#</th>
                        <th class="border-b-2 text-left whitespace-no-wrap">No Transaksi</th>
                        <th class="border-b-2 text-left whitespace-no-wrap">Kode Barcode</th>
                        <th class="border-b-2 text-left whitespace-no-wrap">Nama Barang</th>
                        <th class="border-b-2 text-left whitespace-no-wrap">Berat</th>
                        <th class="border-b-2 text-left whitespace-no-wrap">Kode Customer</th>
                        <!-- <th class="border-b-2 text-center whitespace-no-wrap">Action</th> -->
                    </tr>
                </thead>
                <tbody id="databarang1">

                </tbody>
            </table>
            <br>
          
            <input type="submit" value="Batal Penjualan" class="button bg-theme-1 text-white input w-full border">

            <!-- <iframe src="https://www.whatsapp.com/" width="100%" height="300" style="border:1px solid black;"></iframe>  -->
        </div>
    </form>

</div>

<script>
    $('#btn_cari_transaksi').on("click", function(){
        var id_pencarian  = $('#id_pencarian').val();
        var pencarian  = $('#pencarian').val();
        // console.log(id_pencarian);
        if(id_pencarian=="kode_customer"){
            pencariankodecustomer(id_pencarian,pencarian);
        }else{
            pencariankodecustomer(id_pencarian,pencarian);
        }
    })

    function pencariankodecustomer(id_pencarian,pencarian){
        $('.overlay4').show();
        $.ajax({
            url: base_url + "/pencariankodecustomer",
            dataType: 'json',
            type: 'POST',
            data: {
                pencarian: pencarian,
                id_pencarian: id_pencarian
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
                if(feedback==null){
                    Swal.fire({
                            title: 'Opps!!!',
                            text: 'Data Tidak Ditemukan !!!',
                            type: 'warning',
                            reverseButtons: true
                        })
                        $('.overlay4').hide();
                }else{
                    if (feedback.status == "berhasil") {
                        $('.overlay4').hide();
                    if (feedback.data.length == 0) {
                        Swal.fire({
                            title: 'Opps!!!',
                            text: "Data Tidak Ditemukan !!!",
                            type: 'warning',
                            reverseButtons: true
                        })
                        $('.overlay4').hide();
                    } else {
                        $('#databarang1').html(``);
                        $.each(feedback.data, function(index, element) {
                            $.each(element.detail_barang, function(index_data, row) {
                                // console.log(row);
                                $('#databarang1').append(`
                                    <tr>
                                        <td>  <input class="tooltip button inline-block bg-theme-1 text-white" title="Uncek Jika Barang Tidak Akan DIbatal" type="checkbox" value="`+element.id_trx+`" name="no_trx[]"> </td>
                                        <td> `+element.id_trx+` </td>
                                        <td> `+row.kode_barcode+` </td>
                                        <td> `+row.nama_barang+` </td>
                                        <td> `+row.berat+` </td>
                                        <td> `+element.kode_customer+` </td>
                                    </tr>
                                
                                `);
                            });
                        });
                    }
                    }else{
                        Swal.fire({
                            title: 'Opps!!!',
                            text: feedback.pesan,
                            type: 'warning',
                            reverseButtons: true
                        })
                        $('.overlay4').hide();
                    }
                }
            }
        })
    }
    // $(document).ready(function() {
    //     // loadbaranghancur();
    //     $("#form").submit(function(e) {
    //         var form = this;
    //         var temporary_tbl = $('table#tablebarang1 tbody tr').get().map(function(row) {
    //             return $(row).find('td').get().map(function(cell) {
    //                 return $(cell).html();
    //             });
    //         });
    //         console.log(temporary_tbl);
    //         $("#DataBarangsatu").val(JSON.stringify(temporary_tbl));
    //     });
    //     $("#barcodehancur").select2({
    //         theme: "bootstrap",
    //         width: null,
    //         placeholder: "Masukan Kata Kunci Pencarian",
    //         ajax: {
    //             url: base_url + "getPencarianBatalPenjualan",
    //             type: "post",
    //             dataType: 'json',
    //             delay: 250,
    //             data: function(params) {
    //                 return {
    //                     searchTerm: params.term // search term
    //                 };
    //             },
    //             processResults: function(response) {
    //                 // console.log(response);
    //                 return {
    //                     results: response
    //                 };
    //             },
    //             cache: true
    //         }
    //     });
    //     $('.tambahbarang1').on('click', function() {
    //         var kode_barcode = $('.kode_barcode1').val();
    //         var nama_barang1 = $('.nama_barang1').val();
    //         $('.overlay4').show();
    //         // var id = $(this).val();
    //         // console.log(kode_barcode);
    //         $.ajax({
    //             url: base_url + "/simpantmphancur",
    //             dataType: 'json',
    //             type: 'POST',
    //             data: {
    //                 kode_barcode: kode_barcode
    //                 // nama_barang: nama_barang1
    //             },
    //             beforeSend: function(e) {
    //                 if (e && e.overrideMimeType) {
    //                     e.overrideMimeType('application/jsoncharset=utf-8')
    //                 }
    //             },
    //             error: function(e) {
    //                 console.log(e);
    //             },
    //             complete: function(respons) {
    //                 var feedback = respons.responseJSON;
    //                 // console.log(feedback);
    //                 if (feedback.status == "berhasil") {
    //                     $('.overlay4').hide();
    //                     Swal.fire({
    //                         title: 'Success',
    //                         text: 'Kode Barcode Berhasil Ditambahkan',
    //                         type: 'success',
    //                         reverseButtons: true
    //                     })
    //                     loadbaranghancur();
    //                     $('.overlay4').hide();
    //                 } else {
    //                     Swal.fire({
    //                         title: 'Opps!!!',
    //                         text: feedback.pesan,
    //                         type: 'warning',
    //                         reverseButtons: true
    //                     })
    //                     $('.overlay4').hide();
    //                 }
    //             }
    //         })
    //     });
    //     $('#barcodehancur').on('change', function() {
    //         $('.overlay4').show();
    //         var id = $(this).val();
    //         // console.log(id);
    //         $('.overlay4').hide();
    //     })
    // });

    // function loadbaranghancur() {
    //     $('table').addClass('loading');
    //     $.ajax({
    //         url: base_url + "/loadhancurbarang",
    //         dataType: 'json',
    //         type: 'POST',
    //         data: {
    //             loadbarang: 'loaddatabarang'
    //         },
    //         beforeSend: function(e) {
    //             if (e && e.overrideMimeType) {
    //                 e.overrideMimeType('application/jsoncharset=utf-8')
    //             }
    //         },
    //         error: function(e) {
    //             console.log(e);
    //         },
    //         complete: function(respons) {
    //             var feedback = respons.responseJSON;
    //             if (feedback.status == "berhasil") {
    //                 $('table').removeClass("loading");
    //                 $('.overlay4').hide();
    //                 $('#databarang1').html('');
    //                 $.each(feedback.data, function(index, element) {
    //                     var markup = `"
    //                         <tr>
    //                             <td>` + element.kode_barcode + `</td>
    //                             <td>` + element.nama_barang + `</td>
    //                             <td align="center"><input type='radio'  onclick="hapusconfirmbarang('` + element.kode_barcode + `')" class="btn btn-sm btn-danger btn-delete" type="button" name='record'></td>
    //                         </tr>
    //                         "`;
    //                     $("#databarang1").append(markup);
    //                 })
    //             } else {
    //                 $('table').removeClass("loading");
    //                 $('.overlay4').hide();
    //             }
    //         }
    //     })
    // }

    // function hapusconfirmbarang(url) {
    //     $('table').addClass('loading');
    //     Swal.fire({
    //         title: 'Konfirmasi Hapus Data!',
    //         text: "Yakin Untuk Menghapus Data Ini",
    //         type: 'warning',
    //         showCancelButton: true,
    //         confirmButtonText: 'Hapus',
    //         cancelButtonText: 'Batal',
    //         reverseButtons: true
    //     }).then((result) => {
    //         if (result.value) {
    //             // console.log(url);
    //             // $('.overlay4').show();
    //             $.ajax({
    //                 // loadhancurbarang
    //                 url: base_url + "/hapushancur",
    //                 dataType: 'json',
    //                 type: 'POST',
    //                 data: {
    //                     kode_barcode: url
    //                 },
    //                 beforeSend: function(e) {
    //                     if (e && e.overrideMimeType) {
    //                         e.overrideMimeType('application/jsoncharset=utf-8')
    //                     }
    //                 },
    //                 error: function(e) {
    //                     console.log(e);
    //                 },
    //                 complete: function(respons) {
    //                     var feedback = respons.responseJSON;
    //                     if (feedback.status == "berhasil") {
    //                         // $('.overlay4').hide();
    //                         $('table').removeClass("loading");
    //                         loadbaranghancur();
    //                     } else {
    //                         Swal.fire({
    //                             title: 'Opps :(',
    //                             text: "Kode Barang / Kode Barcode Gagal Dihapus",
    //                             type: 'warning',
    //                             reverseButtons: true
    //                         })
    //                         $('.overlay4').hide();
    //                     }
    //                 }
    //             })
    //         } else {
    //             $('table').removeClass("loading");
    //         }
    //     })
    // }
</script>