<main class="site-main">

    <div class="columns container">
        <!-- Block  Breadcrumb-->

        <ol class="breadcrumb no-hide">
            <li><a href="#">Home </a></li>
            <li class="active">Pencarian Barang</li>
        </ol><!-- Block  Breadcrumb-->

        <div class="row">

            <!-- Main Content -->
            <div class="col-md-12 col-md-push col-main">

                <!-- Toolbar -->
                <div class=" toolbar-products toolbar-top">
                    <h1 class="cate-title">Pencarian Nama Barang <?= ucwords($cari) ?></h1>
                </div><!-- Toolbar -->
                <!-- List Products -->
                <div class="products  products-grid">

                    <div id="load_data"></div>
                    <div id="load_data_message"></div>

                </div>

            </div>
        </div>


    </div> <!-- List Products -->


    </div><!-- Main Content -->


    </div>
    </div>
</main><!-- end MAIN -->

<script>
    $(document).ready(function() {
        var limit = 8;
        var start = 0;
        var nama_barang = '<?= $cari ?>';
        var action = 'inactive';

        function lazzy_loader(limit) {
            var output = '';
            output += '<ol class="product-items row">';
            for (var count = 0; count < limit; count++) {
                output += '<li class="col-sm-4 product-item ">';
                output += '<div class="product-item-opt-1">';
                output += ' <div class="product-item-info">';
                output +=
                    '<p><span class="content-placeholder" style="width:100%; height: 100px;">&nbsp;</span></p>';
                output +=
                    '<p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p>';
                output += '</div>';
                output += '</div>';
                output += '</li>';
            }
            output += '</ol>';
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
                    device: 'dekstop',
                    status: 'cari_nama_barang'
                },
                cache: false,
                success: function(data) {
                    console.log(data);

                    if (data == '') {
                        $('#load_data_message').html(`
                    <br>
                    <div class="card weekly-product-card mb-3">
                        <div class="card-body d-flex align-items-center">
                        Barang Sudah Habis !!!
                        </div>
                    </div><br>
                    <br>`);
                        action = 'active';
                    }else if (data == 'barang_tidak_ada') {
                        $('#load_data_message').html(`
                    <br>
                    <div class="card weekly-product-card mb-3">
                        <div class="card-body d-flex align-items-center">
                        Barang Yang Anda Cari Tidak Ada !!!
                        </div>
                    </div><br>`);
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