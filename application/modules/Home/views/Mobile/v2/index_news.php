<?php 
$total_harga_jual = 0;
foreach ($news->data  as $row) : 
?>
    <div class="page-content-wrapper">
        <!-- Product Slides-->
        <div class="product-slides owl-carousel" style="background-size: 100px 100px">
            <!-- Single Hero Slide-->
                <div class="single-product-slide">
                    <img onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?=  $row->lokasi_gambar ?>" alt="">
                </div>
        </div>
        <br>
        <br>
        <div class="product-description pb-3">
            <div class="product-title-meta bg-white">

                <div class="p-specification bg-white mb-3 py-3">
                    <h2> <?= $row->judul ?> </h2>
                    <div class="container">
                       <?= $row->deskripsi ?>
                    </div>
                    <br>
                </div>

            </div>

        </div>
    </div>
    <br>
<?php endforeach; ?>