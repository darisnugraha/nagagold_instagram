<!-- <div id="keatas" class="filter-pencarian animate__backInUp">
<a href="#" target="_blank"><div class="button_filter"><i class="fa fa-filter"></i> Filter</div></a></div> -->

<div class="page-content-wrapper">
    <div class="container">
        <!-- Cart Wrapper-->

        <div class="cart-wrapper-area py-3">
        <!-- <h4 class="faq-heading text-center">Cari No Transaksi?</h4> -->
          <!-- Search Form--><br>
          <!-- <form class="faq-search-form" action="#" method="">
            <input class="form-control" type="search" name="search" placeholder="Search">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
          <br> -->

           
            <div id="load_data"></div>
            <div id="load_data_message"></div>
            
        </div>

        <br>
        <br>
        <br>
        <script>
        function cekhargajual(id){
            // console.log(id);
            $('.btn-cek-harga-'+id).hide();
            $('.btn-loading-'+id).show();
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
                        $(".headtablejual-"+id).show();
                        $('.btn-cek-harga-'+id).show();
                        $('.btn-loading-'+id).hide();
                        $.each(feedback.data, function (index, element) {
                            // console.log(element);
                            // $(".tbl_pengajuan_penjualan").html("");
                            $(".body_detail_hargajual-"+id).html("");
                            $(".body_detail_hargajual-"+id).append(
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
                        $('.btn-cek-harga-'+id).show();
                        $('.btn-loading-'+id).hide();
                        Swal.fire("Opps!", feedback.pesan, "info");
                    }
                },
            });
        }
        $(document).ready(function() {
            // $("#keatas").hide();
            // // memberikan efek fade in pada id #keatas
            // $(function () {
            //     $(window).scroll(function () {
            //     if ($(this).scrollTop() > 100) {
            //         $('#keatas').fadeIn();
            //     } else {
            //         $('#keatas').fadeOut();
            //     }
            //     });
            // });
        var limit = 2;
        var start = 0;
        var action = 'inactive';

        function lazzy_loader(limit) {
            var output = '';

            for (var count = 0; count < limit; count++) {
                output += '<div class="cart-wrapper-area">';
                    output += '<div class="cart-table card mb-3">';
                        output += '<div class="card shipping-method-choose-title-card bg-success">';
                            output += '<div class="card-body">';
                                    output +='<h6 class="text-center mb-0 text-white">Loading</h6>';
                            output += '</div>';
                        output += '</div>';
                        output += '<div class="table-responsive card-body">';
                                output +='<p><span class="content-placeholder" style="width:100%; height: 200px;">&nbsp;</span></p>';
                        output += '</div>';
                    output += '</div>';
                output += '</div>';
            }
            $('#load_data_message').html(output);
        }

        lazzy_loader(limit);

        function load_data(limit, start) {
            $.ajax({
                url: base_url + "loaddatahistory",
                method: "POST",
                data: {
                    limit: limit,
                    start: start,
                    device: 'mobile'

                },
                cache: false,
                success: function(data) {
                    // console.log(data);
                    if (data == '') {
                        $('#load_data_message').html(`
                    <br>
                   `);
                        action = 'active';
                    } else {
                        $('#load_data').append(data);
                        $('#load_data_message').html("");
                        action = 'inactive';
                    }
                }
            })
        }

        if (action == 'inactive') {
            action = 'active';
            load_data(limit, start);
        }

        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() > $("#load_data").height() && action ==
                'inactive') {
                lazzy_loader(limit);
                action = 'active';
                start = start + limit;
                setTimeout(function() {
                    load_data(limit, start);
                }, 1000);
            }
        });

    });
             
        </script>