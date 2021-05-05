<?php if( $this->session->userdata('otpaktif') == "true"){
  redirect('otentivikasi-daftar');
} ?>

<style>
.first {
    transition: box-shadow 300ms ease-in-out, color 300ms ease-in-out;
}

.first:hover {
    box-shadow: 0 0 40px 40px #e74c3c inset;
}

/*  Navigation Menu Horizontal Scroll by igniel.com */
.ignielHorizontal ul {
    /* background-color: #673ab7; */
    /* Warna background menu */
    max-width: 100%;
    /* Lebar maksimal menu */
    overflow-x: auto;
}

.ignielHorizontal {
    /* color: #fff; */
    line-height: 0px;
    overflow: hidden;
}

.ignielHorizontal a {
    font-size: 14px;
    /* color: #fff; */
    text-decoration: none;
    padding: 10px 13px;
    line-height: 1.5em;
    display: block;
}

.ignielHorizontal a:hover {
    /* background-color: rgba(0, 0, 0, .25); */
    /* color: #fff; */
    text-decoration: none;
}

.ignielHorizontal ul,
.ignielHorizontal li {
    list-style: none;
    display: inline-block;
    white-space: nowrap;
    margin: 0px;
    padding: 0px;
}

@media screen and (max-width: 480px) {
    .ignielHorizontal a {
        font-size: 13px;
        padding: 8px 11px;
    }
}

@media screen and (max-width: 360px) {
    .ignielHorizontal a {
        font-size: 12px;
        padding: 7px 10px;
    }
}

.buttonku {
    background-color: #FFFFFF;
    box-shadow: 0px 0px 1px 2px #e6e6e6;
    /* Green */
    border: none;
    color: #000000;
    padding: 14px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 11px;
    margin: 15px 2px;
    cursor: pointer;
    border-radius: 30px;
}

.activeku,
.btn:hover {
    background-color: #2a166f;
    color: white;
}

.notify-item {
    position: relative;
    right: -7px;
    top: -9px;
    background: red;
    text-align: center;
    border-radius: 50px 50px 50px 50px;
    color: white;
    padding: 5px 5px;
    /* font-size: 10px; */
}
</style>
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
    <div class="product-catagories-wrapper pt-3">
        <div class="container">
            <div class="product-catagory-wrap">
                <div class="row">
                    <?php foreach($DataKategori->data  as $kategori ): ?>
                    <div class="col-12">
                        <div class="mb-4">
                            <a onclick="$('.loaderform').show()"
                                href="<?= base_url('carikategori/' . encrypt_url($kategori->kode_kategori) . '/' . encrypt_url($kategori->nama_kategori)) ?>">
                                <img class="card" alt="<?= $kategori->nama_kategori ?>"
                                    onerror="this.onerror=null;this.src='<?= base_url('assets/images/slidenotfound.jpg') ?>';"
                                    src="<?= $kategori->banner ?>">
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="product-catagories-wrapper pt-3">
        <div class="container">
            <div class="text-center">
                <?php if($DataKelompok->data != null): ?>
                <h6 class="ml-1">Harga Emas Hari Ini</h6>
                <?php endif; ?>
            </div>
            <div class="product-catagory-wrap">
                <div class="row">
                    <div class="table-responsive container">
                        <div class="ignielHorizontal">
                            <ul>
                                <?php $no=1; foreach($DataKelompok->data  as $kelompok ): ?>
                                    <?php if($kelompok->jenisKelompok != null): ?>
                                <li><button onclick="openCity('<?= $kelompok->kode_kelompok ?>','<?= $kelompok->kode_kelompok ?>','tab<?=$no ?>')"
                                        id="tab<?=$no ?>" class="buttonku" > <?= $kelompok->nama_kelompok ?> </button></li>
                                <?php endif; ?>
                                <?php $no++; endforeach; ?>
                            </ul>
                        </div>
                        <!-- <div class="city" style="display:block">
                            <div class="card mb-3">
                                <div class="card bg-success">
                                    <div class="card-body">
                                        <h6 class="text-center mb-0 text-white">Informasi Update Harga
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <?php $n2=1; foreach($DataKelompok->data  as $detailkelompok ): ?>
                        <?php if($detailkelompok->jenisKelompok != null): ?>
                        <div id="<?= $detailkelompok->kode_kelompok ?>" class="city" style="display:none">
                            <div class="cart-table card mb-3">
                                <div class="card shipping-method-choose-title-card bg-success">
                                    <div class="card-body">
                                        <h6 class="text-center mb-0 text-white">UPDATE HARGA <?= $detailkelompok->nama_kelompok ?>
                                        </h6>
                                    </div>
                                </div>
                                <div class="table-responsive container">
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <th>#</th>
                                                <th>Jenis</th>
                                                <th nowrap>Harga</th>
                                            </tr>
                                            <?php $nomerna=1; foreach($detailkelompok->jenisKelompok  as $brg ): ?>
                                            <tr>
                                                <td> <?= $nomerna++ ?> </td>
                                                <td> <?= $brg->nama_jenis ?></td>
                                                <td> <?= number_format($brg->harga) ?> </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php $n2++; endforeach; ?>
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

    <?= $this->session->flashdata('alertcart') ?>
    <script>
        // $( document ).ready(function() {
        //     $('')
        // });
        function openCity(cityName, titlemenu, tab) {
        for (var t = 1; t < <?= count($DataKategori->data) ?>; t++) {
            if (tab == "tab" + t) {
                $('.titlemenu').html('');
                $('.titlemenu').append(titlemenu);
                $('#' + tab).addClass('activeku');
            } else {
                $('#tab' + t).removeClass('activeku');
            }
        }

        var i;
        var x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        document.getElementById(cityName).style.display = "block";
    }
    </script>
</div>
<br>
<br>
<br>