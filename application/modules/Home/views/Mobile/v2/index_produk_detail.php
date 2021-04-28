<?php 
$total_harga_jual = 0;
foreach ($DetailBarang->data  as $row) : 
$total_harga_jual = $row->harga_jual+$row->ongkos;
?>
    <div class="page-content-wrapper">
        <!-- Product Slides-->
        <div class="product-slides owl-carousel" style="background-size: 100px 100px">
            <!-- Single Hero Slide-->
            <?php foreach ($row->gambar as $gambar) : ?>
                <div class="single-product-slide">
                    <img onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?=  $gambar->lokasi_gambar ?>" alt="">
                </div>
            <?php endforeach; ?>

        </div>
        <br>
        <br>
        <div class="product-description pb-3">
            <!-- Product Title & Meta Data-->
            <!-- <div class="product-title-meta-data bg-white mb-3 py-3"> -->
            <div class="product-title-meta bg-white">
                <div class="container d-flex justify-content-between">
                    <div class="p-title-price"><br>
                        <h6 class="mb-1"><?= $row->nama_barang ?></h6>
                        <p class="sale-price">Rp.<?= number_format($total_harga_jual) ?></p>
                    </div>
                    <!-- <div class="p-wishlist-share"><br>
                    <a href="<?= base_url('add-wishlist/' . encrypt_url($row->kode_barang)) ?>"><i
                            class="lni lni-heart"></i></a>
                </div> -->
                </div>
                <!-- Ratings-->


                <div class="p-specification bg-white mb-3 py-3">
                    <div class="container">
                        <h6>Deskripsi Produk</h6>
                        Kadar: <?= $row->kadar_cetak ?><br>
                        Berat : <?= $row->berat ?> Gram<br>
                        Ongkos Produksi : <?= number_format($row->ongkos) ?> <br>
                        Harga Barang : <?= number_format($row->harga_jual) ?>
                        <!-- Harga Emas : Rp.<?= number_format($row->harga_barang) ?><br> -->
                        <!-- Barang ini Telah Dilihat Sebanyak <?= $row->views ?> Kali -->
                    </div>
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <?php if ($this->session->userdata('status_login') == "SEDANG_LOGIN") : ?>
                                    <!-- <button onclick="$('.loaderform').show(); location.href='<?= base_url('detail-add-cart/' . encrypt_url($row->kode_barcode)); ?>'" class="btn btn-success btn-lg btn-block" type="submit">Add to cart</button> -->
                                <?php else : ?>
                                    <!-- <button onclick="Swal.fire( 'Opps!!!', 'Silahkan Login Terlebih Dahulu', 'info' )" class="btn btn-success btn-lg btn-block" type="submit">Add to cart</button> -->
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <br>
<?php endforeach; ?>