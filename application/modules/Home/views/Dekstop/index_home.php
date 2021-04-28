<main class="site-main">

    <!--  Popup Newsletter-->

    <div class="block-section-top block-section-top13">
        <div class="container">
            <div class="box-section-top">

                <!-- categori -->
                <div class="block-nav-categori">

                    <div class="block-title">
                        <span>Categories</span>
                    </div>

                    <div class="block-content">
                        <ul class="ui-categori">
                            <?php
                            $kategori = $KategoriBarang->data;
                            for ($i = 0; $i < count($KategoriBarang->data); $i++) : ?>
                                <li class="parent">
                                    <a href="<?= base_url('carikategori/' . encrypt_url($kategori[$i]->kode_kategori) . '/' . encrypt_url($kategori[$i]->nama_kategori)) ?>">
                                        <span class="icon"><img src="<?= base_url() ?>/assets/icon/<?= strtolower($kategori[$i]->icon) ?>.png" alt="nav-cat"></span>
                                        <?= $kategori[$i]->nama_kategori ?>
                                    </a>
                                    <?php if ($kategori[$i]->jenis == NULL) : ?>
                                    <?php else : ?>
                                        <span class="toggle-submenu"></span>
                                        <div class="submenu">
                                            <ul>
                                                <?php foreach ($kategori[$i]->jenis  as $rowdetaimenu) : ?>
                                                    <li>
                                                        <strong class="title">
                                                            <a href="<?= base_url('carijenis/' . encrypt_url($rowdetaimenu->kode_jenis) . '/' . encrypt_url($rowdetaimenu->nama_jenis)) ?>"><?= $rowdetaimenu->nama_jenis ?></a></strong>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                </li>
                            <?php endfor; ?>
                        </ul>

                        <div class="view-all-categori">
                            <a class="open-cate btn-view-all">All Categories</a>
                        </div>
                    </div>

                </div><!-- categori -->

                <!-- block slide top -->
                <div class="block-slide-main slide-opt-13">

                    <!-- slide -->
                    <div class="owl-carousel " data-nav="true" data-dots="true" data-margin="0" data-items='1' data-autoplayTimeout="700" data-autoplay="false" data-loop="true">
                        <?php
                        if ($Slider->data == NULL) : ?>
                            <div class="item">
                                <picture>
                                    <source type="image/webp" srcset="<?= base_url() ?>assets/images/slidenotfound.webp">
                                    <img width="1280px" height="530px" src="<?= base_url() ?>assets/images/slidenotfound.webp">
                                </picture>
                            </div>
                        <?php else : ?>
                            <?php foreach ($Slider->data as $row) : ?>
                                <div class="item">
                                    <img width="1280px" height="530px" onError="this.onerror=null;this.src='<?php echo base_url('assets/slidenotfound.jpg') ?>';" src="<?= base_url('assets/images/NsiPic/sliderpromo/' . $row->lokasi_gambar) ?>" alt="slide1" class="img-slide">
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div> <!-- slide -->

                </div><!-- block slide top -->


            </div>
        </div>
    </div>
    <?php if ($DataBarangBaru != NULL) : ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- block tab products -->
                    <div class="block-tab-products-opt1">
                        <div class="block-title">
                            <ul class="nav" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#tabproduct1" role="tab" data-toggle="tab">Produk Terbaru </a>
                                </li>
                            </ul>
                        </div>

                        <div class="block-content tab-content">
                            <!-- tab 1 -->
                            <div role="tabpanel" class="tab-pane active fade in " id="tabproduct1">
                                <div class="owl-carousel" data-nav="true" data-dots="false" data-margin="30" data-responsive='{
                                        "0":{"items":1},
                                        "480":{"items":2},
                                        "480":{"items":2},
                                        "768":{"items":5},
                                        "992":{"items":5}
                                    }'>

                                    <?php foreach ($DataBarangBaru->data  as $brgbaru) : ?>
                                        <div class="product-item  product-item-opt-1 ">
                                            <div class="product-item-info">
                                                <div class="product-item-photo">
                                                    <!-- <div class="product-item-actions">
                                                        <a class="btn btn-wishlist" href="#"><span>wishlist</span></a>
                                                    </div> -->
                                                    <a class="product-item-img" href="<?= base_url('produk/' . encrypt_url($brgbaru->kode_barcode)) ?>">
                                                        <?php $data_gambar = $brgbaru->gambar;
                                                        for ($i = 0; $i < 1; $i++) : ?>
                                                            <img alt="product name" width="300" height="200" onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?= base_url('assets/images/NsiPic/product/') . $data_gambar[$i]->lokasi_gambar ?>"></a>
                                                <?php endfor; ?>
                                                <?php if ($this->session->userdata('status_login') == "SEDANG_LOGIN") : ?>
                                                    <!-- <a type="button" href="<?= base_url('add-cart/' . encrypt_url($brgbaru->kode_barcode)) ?>" class="btn btn-cart"><span>Add to Cart</span></a> -->
                                                <?php elseif ($this->session->userdata('status_login') == "SEDANG_LOGIN_ADMIN") : ?>
                                                    <!-- <button type="button" onclick="Swal.fire('Oopss!','Admin tidak bisa menambahka barang!','info')" class="btn btn-cart"><span>Add to Cart</span></button> -->
                                                <?php else : ?>
                                                    <!-- <button type="button" onclick="Swal.fire('Oopss!','Silahkan login terlebih dahulu!','info')" class="btn btn-cart"><span>Add to Cart</span></button> -->
                                                <?php endif; ?>
                                                </div>
                                                <div class="product-item-detail">
                                                    <strong class="product-item-name"><a href="<?= base_url('produk/' . encrypt_url($brgbaru->kode_barcode)) ?>"><?= $brgbaru->nama_barang ?></a></strong>
                                                    <div class="clearfix">
                                                        <div class="product-item-price">
                                                            <span class="price">Rp.<?php $brgbaruhasil = $brgbaru->harga_jual+$brgbaru->ongkos; echo number_format($brgbaruhasil) ?></span>
                                                            <!-- <span class="old-price">$52.00</span> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <!-- tab 1 -->


                        </div>

                    </div><!-- block tab products -->

                </div>

            </div>
        </div>
    <?php endif; ?>

    <div class="clearfix" style="background-color: #eeeeee;margin-bottom: 40px; padding-top:30px;">

        <!-- block -floor -products / floor 1 :Fashion-->
        <?php $Z = 0;
        $status = 'FALSE';
        foreach ($DataBarang as $row) : ?>
            <?php $row->jenis == "" ? $status = 'FALSE' : '';
            foreach ($row->jenis as $brg) :
                $brg->barang <> "" ? $status = "TRUE" : ''; ?>
            <?php endforeach; ?>
            <?php if ($status == 'TRUE') : ?>
                <div class="block-floor-products block-floor-products-opt1 floor-products1" id="floor0-1">
                    <div class="container">
                        <div class="block-title ">
                            <span class="title"><img alt="img" height="20px" src="<?= base_url('/assets/icon/' . strtolower($row->icon) . '.png') ?>"><?= $row->nama_kategori ?></span>
                            <div class="links dropdown">
                                <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </button>
                                <div class="dropdown-menu<?= $row->kode_kategori ?>">
                                    <ul class="tampil<?= $row->kode_kategori ?>">
                                        <?php $a = 1;
                                        $b = 1;
                                        $z = 4;
                                        $insert = "";
                                        foreach ($row->jenis  as $datatep) : ?>
                                            <?php if ($datatep->barang != NULL) : ?>
                                                <?php if ($a < $z) : ?>
                                                    <?php if ($datatep->barang == NULL) : ?>
                                                        <?php $b++ == 2 ? $aktif1 = 'active' : $aktif1 = ''; ?>
                                                    <?php else : ?>
                                                        <?php $b++ == 1 ? $aktif1 = 'active' : $aktif1 = ''; ?>
                                                    <?php endif; ?>
                                                    <li role="presentation" style="display: block;" id="<?= $row->kode_kategori ?><?= $a ?>1" class="<?= $aktif1 ?>"><a href="#<?= $datatep->kode_jenis ?>" role="tab" data-toggle="tab"><?= $datatep->nama_jenis ?> </a></li>
                                                <?php else : ?>
                                                    <?php if ($datatep->barang == NULL) : ?>
                                                        <?php $b++ == 2 ? $aktif1 = 'active' : $aktif1 = ''; ?>
                                                    <?php else : ?>
                                                        <?php $b++ == 1 ? $aktif1 = 'active' : $aktif1 = ''; ?>
                                                    <?php endif; ?>
                                                    <li role="presentation" style="display: none;" id="<?= $row->kode_kategori ?><?= $a ?>1" class="<?= $aktif1 ?>"><a href="#<?= $datatep->kode_jenis ?>" role="tab" data-toggle="tab"><?= $datatep->nama_jenis ?> </a></li>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <?php $insert = $insert . ',' . $datatep->kode_jenis;  ?>
                                        <?php $a++;
                                        endforeach;   ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="actions">
                                <a class="action action-up" onclick="updata('<?= $row->kode_kategori ?>','<?= $a ?>','<?= $insert ?>');"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
                                <a class="action action-down" onclick="down('<?= $row->kode_kategori ?>','<?= $a ?>','<?= $insert ?>');"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="col-products tab-content">
                                <?php $no = 1;
                                foreach ($row->jenis  as $databarangdept) :  ?>
                                    <?php if ($databarangdept->barang != NULL) : ?>
                                        <?php if ($databarangdept->barang == NULL) : ?>
                                            <?php $no++ == 2 ? $aktif = 'active' : $aktif = ''; ?>
                                        <?php else : ?>
                                            <?php $no++ == 1 ? $aktif = 'active' : $aktif = ''; ?>
                                        <?php endif; ?>
                                        <div class="tab-pane in fade <?= $aktif ?>" id="<?= $databarangdept->kode_jenis ?>" role="tabpanel">
                                            <div class="owl-carousel" data-nav="true" data-dots="false" data-margin="0" data-responsive='{
                                            "0":{"items":1},
                                            "420":{"items":2},
                                            "600":{"items":3},
                                            "768":{"items":3},
                                            "992":{"items":5},
                                            "1200":{"items":5}
                                        }'>
                                                <?php foreach ($databarangdept->barang  as $barang) : ?>
                                                    <div class=" product-item  product-item-opt-1 ">
                                                        <div class="product-item-info">
                                                            <div class="product-item-photo">
                                                                <?php $databarang = $barang->gambar;
                                                                for ($i = 0; $i < 1; $i++) : ?>
                                                                    <a class="product-item-img" href="<?= base_url('produk/' . encrypt_url($barang->kode_barcode)) ?>">
                                                                        <img width="300" height="300" alt="product name" onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?= base_url('assets/images/NsiPic/product/') . $databarang[$i]->lokasi_gambar ?>"></a>
                                                                <?php endfor; ?>
                                                                <!-- <div class="product-item-actions">
                                                            <a class="btn btn-wishlist" href="#"><span>wishlist</span></a>
                                                            <a class="btn btn-compare" href="#"><span>compare</span></a>
                                                            <a class="btn btn-quickview" href="#"><span>quickview</span></a>
                                                        </div> -->
                                                                <?php if ($this->session->userdata('status_login') == "SEDANG_LOGIN") : ?>
                                                                    <!-- <a type="button" href="<?= base_url('add-cart/' . encrypt_url($barang->kode_barcode)) ?>" class="btn btn-cart"><span>Add to Cart</span></a> -->
                                                                <?php elseif ($this->session->userdata('status_login') == "SEDANG_LOGIN_ADMIN") : ?>
                                                                    <!-- <button type="button" onclick="Swal.fire('Oopss!','Admin tidak bisa menambahkan barang!','warning')" class="btn btn-cart"><span>Add to Cart</span></button> -->
                                                                <?php else : ?>
                                                                    <!-- <button type="button" onclick="Swal.fire('Oopss!','Silahkan login terlebih dahulu!','info')" class="btn btn-cart"><span>Add to Cart</span></button> -->
                                                                <?php endif; ?>
                                                                <!-- <button type="button" class="btn btn-cart"><span>Add to Cart</span></button> -->
                                                                <!-- <span class="product-item-label label-price">30% <span>off</span></span> -->
                                                            </div>
                                                            <div class="product-item-detail">
                                                                <strong class="product-item-name"><a href="<?= base_url('produk/' . encrypt_url($barang->kode_barcode)) ?>"><?= $barang->nama_barang ?></a></strong>
                                                                <div class="clearfix">
                                                                    <div class="product-item-price">
                                                                        <span class="price">Rp.<?php $brghasil = $barang->harga_jual+$barang->ongkos; echo number_format($brghasil) ?></span>
                                                                        <!-- <span class="price">Rp.<?= number_format($barang->harga_jual) ?></span> -->
                                                                        <!-- <span class="old-price">$52.00</span> -->
                                                                    </div>
                                                                    <div class="product-reviews-summary">
                                                                        <!-- <div class="rating-summary">
                                                                    <div title="80%" class="rating-result">
                                                                        <span style="width:80%">
                                                                            <span><span>80</span>% of <span>100</span></span>
                                                                        </span>
                                                                    </div>
                                                                </div> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        <!-- block -floor -products / floor :Fashion-->
    </div>

</main><!-- end MAIN -->

<script>
    function updata(id, total, kode_jenis) {
        var fruits = kode_jenis;
        var ar = fruits.split(','); // split string on comma space
        var limit = 4;
        if (total > limit) {
            for (let i = 1; i < total; i++) {
                var data = '#' + id + i + '1';
                var data1 = '#' + ar[i];
                $(data).removeClass('active');
                $(data1).removeClass('active');
                if (i < limit) {
                    if (i == '1') {
                        var data1 = '#' + ar[i];
                        // console.log(data1);
                        $(data1).addClass('active');
                        $(data).addClass('active');
                    }
                    $(data).show();
                } else {
                    $(data).hide();
                }
            }
        }
    }

    function down(id, total, kode_jenis) {
        var fruits = kode_jenis;
        var ar = fruits.split(','); // split string on comma space
        var limit = 3;
        if (total > limit) {
            for (let i = 1; i < total; i++) {
                var data = '#' + id + i + '1';
                var data1 = '#' + ar[i];
                $(data1).removeClass('active');
                if (i < limit) {
                    $(data).hide();
                } else {
                    if (limit == i) {
                        var data1 = '#' + ar[i];
                        $(data1).addClass('active');
                        $(data).addClass('active');
                    }
                    $(data).show();
                }
            }
        }
    }
</script>