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
                    <h1 class="cate-title">Pencarian Barang <?= ucwords($nama_kategori) ?></h1>
                </div><!-- Toolbar -->
                <!-- List Products -->
                <div class="products  products-grid">

                    <div id="load_data"></div>
                    <div id="load_data_message"></div>
                    <!-- <ol class="product-items row">
                              
                                    <?php if ($DataBarang->data == NULL) : ?>
                                        <li class="col-sm-12 product-item ">
                                            <div class="product-item-opt-1" align="center">
                                                <img src="<?= base_url('assets/404.png') ?>" width="500px" alt="">
                                            </div>
                                        </li>
                                    <?php else : ?>
                                    <?php foreach ($DataBarang->data as $brgbaru) : ?>
                                        <li class="col-sm-4 product-item ">
                                                <div class="product-item-opt-1">
                                                    <div class="product-item-info">
                                                        <div class="product-item-photo">
                                                            <?php $data_barang = $brgbaru->gambar;
                                                            for ($i = 0; $i < 1; $i++) : ?>
                                                                    <img onError="this.onerror=null;this.src='<?php echo base_url('assets/notfound.png') ?>';" src="<?= base_url('assets/images/NsiPic/product/') . $data_barang[$i]->lokasi_gambar ?>" alt="product name"></a>
                                                                <?php endfor; ?>
                                                            <?php if ($this->session->userdata('status_login') == "SEDANG_LOGIN") : ?>
                                                                <form action="<?= base_url('cart/add_to_cart') ?>" method="POST">
                                                                    <input type="hidden" value="2" name="theme">
                                                                    <input type="hidden" value="<?= $brgbaru->kode_toko; ?>" name="kode_toko">
                                                                    <input type="hidden" value="<?= $brgbaru->berat; ?>" name="berat">
                                                                    <input type="hidden" value="<?= $brgbaru->kode_barcode; ?>" name="produk_id">
                                                                    <input type="hidden" value="<?= $brgbaru->nama_barang; ?>" name="produk_nama">
                                                                    <input type="hidden" value="<?= $brgbaru->harga_jual; ?>" name="produk_harga">
                                                                    <button type="submit"  class="btn btn-cart"><span>Add to Cart</span></button>
                                                                </form>
                                                            <?php elseif ($this->session->userdata('status_login') == "SEDANG_LOGIN_ADMIN") : ?>
                                                                <button type="button" onclick="Swal.fire('Oopss!','Admin tidak bisa menambahkan barang!','warning')" class="btn btn-cart"><span>Add to Cart</span></button>
                                                            <?php else : ?>
                                                                <button type="button" onclick="Swal.fire('Oopss!','Silahkan login terlebih dahulu!','info')" class="btn btn-cart"><span>Add to Cart</span></button>
                                                            <?php endif; ?>
                                                            <!-- <span class="product-item-label label-price">30% <span>off</span></span> -->
                </div>
                <div class="product-item-detail">
                    <strong class="product-item-name"><a href="<?= base_url('produk/' . encrypt_url($brgbaru->kode_barcode)) ?>"><?= $brgbaru->nama_barang ?></a></strong>
                    <div class="clearfix">
                        <div class="product-item-price">
                            <span class="price">Rp.<?= number_format($brgbaru->harga_jual) ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </li>
    <?php endforeach; ?>
<?php endif; ?>
<!-- </ol> -->
    </div> <!-- List Products -->


    </div><!-- Main Content -->


    </div>
    </div>
</main><!-- end MAIN -->

<script>
    $(document).ready(function() {
        var limit = 8;
        var start = 0;
        var kategori = '<?= $kode_kategori ?>';
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
                url: base_url + "loadkategorimobile",
                method: "POST",
                data: {
                    limit: limit,
                    start: start,
                    kategori: kategori,
                    device: 'dekstop'
                },
                cache: false,
                success: function(data) {
                    // console.log(data);

                    if (data == '') {
                        $('#load_data_message').html(`
                    <br>
                    <div class="card weekly-product-card mb-3">
                        <div class="card-body d-flex align-items-center">
                        
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