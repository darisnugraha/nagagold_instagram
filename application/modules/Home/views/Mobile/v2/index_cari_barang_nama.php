
<div class="page-content-wrapper">
    <!-- Top Products-->
    <div class="top-products-area pt-3">
        <div class="container">
            <div class="section-heading d-flex align-items-center justify-content-between">
                <?php if($cari==""): ?>
                    <h6 class="ml-1">Menampilkan Semua Barang  </h6>
                <?php else: ?>
                <h6 class="ml-1">Menampilkan Barang - <?php $lower = strtolower($cari);
                                                        echo ucwords($lower) ?> </h6>
                <?php endif; ?>
                <!-- Layout Options-->
                <div class="layout-options">
                    <a class="active" href="<?= base_url('shop') ?>"><i class="fa fa-th-large"></i></a>
                    <!-- <a href="<?= base_url('shop-list') ?>"> <i class="fa fa-th-list"></i></a> -->
                </div>
            </div>
            <div id="load_data"></div>
            <div id="load_data_message"></div>
        </div>
    </div>
</div>
<script>
 
    $(document).ready(function() {
        window.history.replaceState('','',window.location.href);
        var limit = 10;
        var start = 0;
        var nama_barang = '<?= $cari ?>';
        var action = 'inactive';

        function lazzy_loader(limit) {
            var output = '';

            output += '<div class="row">';
            for (var count = 0; count < limit; count++) {
                output += '<div class="col-6 col-sm-4">';
                output += '<div class="card top-product-card mb-3">';
                output += '<div class="card-body">';
                output +=
                    '<p><span class="content-placeholder" style="width:100%; height: 100px;">&nbsp;</span></p>';
                output +=
                    '<p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p>';
                output += '</div>';
                output += '</div>';
                output += '</div>';
            }
            output += '</div>';
            $('#load_data_message').html(output);
        }

        lazzy_loader(limit);

        function load_data(limit, start) {
            $.ajax({
                url: base_url + "loadcarinamabarang",
                method: "POST",
                data: {
                    limit: limit,
                    start: start,
                    nama_barang: nama_barang,
                    device: 'mobile',
                    status: 'cari_nama_barang'
                },
                cache: false,
                success: function(data) {
                    if (data == '') {
                        $('#load_data_message').html(`
                        <br>
                    <div class="card weekly-product-card mb-3">
                        <div class="card-body d-flex align-items-center">
                           Barang sudah mencapai batas pencarian !!!<br>
                        </div>
                    </div>
                    <br><br>
                    `);
                        action = 'active';
                    }else if(data=='barang_tidak_ada'){
                        $('#load_data_message').html(`
                    <br>
                    <div class="card weekly-product-card mb-3">
                        <div class="card-body d-flex align-items-center">
                           Mohon maaf barang yang anda cari tidak ada !!!<br>
                        </div>
                    </div>
                    <br><br>
                    `);
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