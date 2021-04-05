<?php if( $this->session->userdata('otpaktif') == "true"){
  redirect('otentivikasi-daftar');
} ?>
<div class="page-content-wrapper">
  <div class="hero-slides owl-carousel">
    <!-- Single Hero Slide-->

    <?php if ($Slider->data == null) : ?>
      <div class="single-hero-slide" style="background-image: url('<?= base_url('assets/images/slidenotfound.jpg') ?>'); background-size: cover;">
        <div class="slide-content h-100 d-flex align-items-center">
          <!-- <div class="container">
              <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">Amazon Echo</h4>
              <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="1000ms">3rd Generation, Charcoal</p><a class="btn btn-primary btn-sm" href="#" data-animation="fadeInUp" data-delay="800ms" data-wow-duration="1000ms">Buy Now</a>
            </div> -->
        </div>
      </div>
    <?php else : ?>
      <?php foreach ($Slider->data as $row) : ?>
        <div class="single-hero-slide" style="background-image: url('<?= base_url('assets/images/NsiPic/sliderpromo/' . $row->lokasi_gambar) ?>'); background-size: cover;">
          <div class="slide-content h-100 d-flex align-items-center">
            <!-- <div class="container">
              <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">Amazon Echo</h4>
              <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="1000ms">3rd Generation, Charcoal</p><a class="btn btn-primary btn-sm" href="#" data-animation="fadeInUp" data-delay="800ms" data-wow-duration="1000ms">Buy Now</a>
            </div> -->
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
  <!-- Product Catagories-->

  <div class="product-catagories-wrapper pt-3">
    <div class="container">
      <div class="section-heading d-flex align-items-center justify-content-between">
        <h6 class="ml-1">Kategori Barang</h6><a class="btn btn-primary btn-sm" onclick="$('.loaderform').show();" href="<?= base_url('listkategori') ?>">View All</a>
      </div>
      <div class="product-catagory-wrap">
        <div class="row" id="load_data_kategori">
          <div id="pesan_kategori"></div>
        </div>
      </div>
    </div>

  </div>
</div>
<style>
  .owl-dots {
    display: none;
  }

  .owl-nav {
    display: none;
  }
</style>

<!-- <div class="flash-sale-wrapper pb-3">
  <div class="container">
    <div class="section-heading d-flex align-items-center justify-content-between">
      <h6 class="ml-1">Barang Terbaru</h6><a class="btn btn-primary btn-sm" href="<?= base_url('shop') ?>">View All</a>
    </div>
    <div class="flash-sale-slide owl-carousel">
      <?php foreach ($DataBarangBaru->data  as $brbaru) : ?>
        <div class="card flash-sale-card">
          <div class="card-body"><a href="<?= base_url('produk/1') ?>">
              <?php $databarang = $brbaru->gambar;
              for ($i = 0; $i < 1; $i++) : ?>
                <a class="product-thumbnail d-block" onclick="$('.loaderform').show();" href="<?= base_url('produk/' . encrypt_url($brbaru->kode_barcode)) ?>">
                  <img class="mb-2" onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?= base_url('assets/images/NsiPic/product/' . $databarang[$i]->lokasi_gambar) ?>" alt="">
                </a>
              <?php endfor; ?>
              <a class="product-title d-block" onclick="$('.loaderform').show();" href="<?= base_url('produk/' . encrypt_url($brbaru->kode_barcode)) ?>">
                <?= strlen($brbaru->nama_barang) > 12 ? substr($brbaru->nama_barang, 0, 10) . '....' :  $brbaru->nama_barang  ?>
              </a>
              <p class="sale-price">Rp.<?= number_format($brbaru->harga_jual) ?></p>
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div> -->

<!-- Load Barang Baru -->
<div class="top-products-area clearfix">
  <div class="container" id="loaderbarangbaru">


  </div>
</div>
</div>

<!-- Top Products-->
<?= $this->session->flashdata('alertcart') ?>
<div class="top-products-area clearfix">
  <div class="container" id="databarangkategori">


  </div>
</div>
</div>
<br>
<br>
<br>