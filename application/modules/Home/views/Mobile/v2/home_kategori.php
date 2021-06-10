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
    /* margin: 15px 2px; */
    margin: 6px 10px;
    cursor: pointer;
    /* border-radius: 30px; */
    border-radius: 10px;
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
        <div class="single-hero-slide">
            <img hight="450" src="<?= base_url('assets/images/slidenotfound.jpg') ?>" alt="">
        </div>
        <div class="slide-content h-100 d-flex align-items-center">
            <!-- <div class="container">
              <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">Amazon Echo</h4>
              <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="1000ms">3rd Generation, Charcoal</p><a class="btn btn-primary btn-sm" href="#" data-animation="fadeInUp" data-delay="800ms" data-wow-duration="1000ms">Buy Now</a>
            </div> -->
        </div>
    </div>
    <?php else : ?>
    <?php foreach ($Slider->data as $row) : ?>
    <div class="single-hero-slide">
        <div class="slide-img">
            <img hight="450" onError="this.onerror=null;this.src='<?php echo base_url('assets/no_slider.jpg') ?>';"
                src="<?= $row->lokasi_gambar ?>" alt="">
        </div>
        <div class="slide-content h-100 d-flex align-items-center">
            <div class="container">

            </div>
        </div>
    </div>
    <!-- <div class="single-hero-slide">
        <div class="slide-img">
            <img hight="450" src="<?=  $row->lokasi_gambar ?>" alt=""></div>
            <div class="slide-content h-100 d-flex align-items-center">
            
            </div>
        </div>
        </div> -->
    <?php endforeach; ?>
    <?php endif; ?>
</div>
<!-- <div class="product-catagories-wrapper pt-3">
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
    </div> -->

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
                    <!-- <div class="ignielHorizontal"> -->
                    <!-- <ul> -->
                    <div class="row">
                        <?php $no=1; foreach($DataKelompok->data  as $kelompok ): ?>
                        <?php if($kelompok->jenisKelompok != null): 
                                    $activeKu = "";
                                    if($no == 1){
                                        $activeKu = " activeku";
                                    }
                                    ?>
                        <div>
                            <button
                                onclick="openCity('<?= $kelompok->kode_kelompok ?>','<?= $kelompok->kode_kelompok ?>','tab<?=$no ?>')"
                                id="tab<?=$no ?>" class="buttonku<?= $activeKu ?>"> <?= $kelompok->nama_kelompok ?>
                            </button>
                            <!-- </li> -->
                        </div>
                        <?php endif; ?>
                        <?php $no++; endforeach; ?>
                    </div>
                    <!-- </ul> -->
                    <!-- </div> -->
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
                    <br>
                    <?php $n2=1; $no = 1; foreach($DataKelompok->data  as $detailkelompok ): ?>
                    <?php 
                        if($detailkelompok->jenisKelompok != null): 
                            $style = "display:none";
                            if($no == 1){
                                $style = "display:block";
                            }
                            $no = $no + 1;
                            ?>
                    <div id="<?= $detailkelompok->kode_kelompok ?>" class="city" style="<?= $style ?>">
                        <div class="cart-table card mb-3">
                            <div class="card shipping-method-choose-title-card bg-success">
                                <div class="card-body">
                                    <h6 class="text-center mb-0 text-white">UPDATE HARGA
                                        <?= $detailkelompok->nama_kelompok ?>
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
    <div class="page-content-wrapper">
        <div class="container">
            <div class="section-heading d-flex align-items-center justify-content-between">
                <h6 class="ml-1">News</h6>
                <!-- <a class="btn btn-primary btn-sm" onclick="$('.loaderform').show();"
                    href="<?= base_url('news') ?>">View All</a> -->
            </div>
        </div>
        <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide-->

            <?php if ($news->data == null) : ?>
            <div class="single-hero-slide">
                <img hight="450" src="<?= base_url('assets/images/slidenotfound.jpg') ?>" alt="">
            </div>
            <div class="slide-content h-100 d-flex align-items-center">
                <!-- <div class="container">
              <h4 class="text-white mb-0" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">Amazon Echo</h4>
              <p class="text-white" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="1000ms">3rd Generation, Charcoal</p><a class="btn btn-primary btn-sm" href="#" data-animation="fadeInUp" data-delay="800ms" data-wow-duration="1000ms">Buy Now</a>
            </div> -->
            </div>
        </div>
        <?php else : ?>
        <?php foreach ($news->data as $row) : ?>
        <div class="single-hero-slide">
            <a href="<?= base_url('detail-news/'.$row->_id) ?>">
                <div class="slide-img">
                    <img hight="450"
                        onError="this.onerror=null;this.src='<?php echo base_url('assets/no_slider.jpg') ?>';"
                        src="<?= $row->lokasi_gambar ?>" alt="">
                </div>
                <div class="slide-content h-100 d-flex align-items-center">
                    <div class="container">

                    </div>
                </div>
            </a>
        </div>
        <!-- <div class="single-hero-slide">
        <div class="slide-img">
            <img hight="450" src="<?=  $row->lokasi_gambar ?>" alt=""></div>
            <div class="slide-content h-100 d-flex align-items-center">
            
            </div>
        </div>
        </div> -->
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="product-catagories-wrapper pt-3">
        <div class="container">
            <div class="section-heading d-flex align-items-center justify-content-between">
                <h6 class="ml-1">Kategori Barang</h6><a class="btn btn-primary btn-sm"
                    onclick="$('.loaderform').show();" href="<?= base_url('listkategori') ?>">View All</a>
            </div>
            <div class="product-catagory-wrap">
                <div class="row" id="load_data_kategori">
                    <div id="pesan_kategori"></div>
                </div>
            </div>
        </div>
        <!-- <div class="top-products-area clearfix">
            <div class="container" id="loaderbarangbaru">


            </div>
        </div> -->
        <div class="flash-sale-wrapper pb-3">

            <div class="container">

                <div class="section-heading d-flex align-items-center justify-content-between">
                    <h6 class="ml-1"> Barang Terbaru </h6>
                </div>
                <!-- Flash Sale Slide-->
                <div class="flash-sale-slide owl-carousel">
                    <?php 
                    foreach ($DataBarangBaru->data as $barang) :
                        $error = "this.onerror=null;this.src='" . base_url() . "/assets/images/notfound.png';";
                        $output .= '';
                        ?>
                    <!-- Single Flash Sale Card-->
                    <div class="card top-product-card mb-3 flash-sale-card">
                        <div class="card-body"><a
                                href="<?=  base_url('produk/' . encrypt_url($barang->kode_barcode)) ?>">
                                <?php $databarang = $barang->gambar;
						for ($i = 0; $i < 1; $i++) : ?>
                                <img onError="<?= $error  ?>" src="<?=  $databarang[$i]->lokasi_gambar ?>" alt="">
                                <?php endfor; ?>
                                <?php $nama_barang = strlen($barang->nama_barang) > 12 ? substr($barang->nama_barang, 0, 10) . '....' :  $barang->nama_barang;
						$brghasil = $barang->harga_jual+$barang->ongkos;
						$harga = strlen(number_format($brghasil)) > 12 ? substr(number_format($brghasil), 0, 10) . '....' : number_format($brghasil); ?>
                                <span class="product-title"><?= $nama_barang ?></span>
                                <span class="sale-price"><?= $harga ?></span>
                                <div class="product-rating">
                                    Kadar: <?= $barang->kadar_cetak ?><br>
                                    Berat : <?= $barang->berat ?> Gram<br>
                                </div>
                            </a>
                            <?php if ($this->session->userdata('status_login') == "SEDANG_LOGIN") : ?>
                            <a onclick="$('.loaderform').show();" class="add-cart-btn btn btn-success"
                                href="<?=base_url('add-cart/' . encrypt_url($barang->kode_barcode)) ?>"> <i
                                    class="lni lni-plus"></i></a>
                            <?php else: ?>
                            <a onclick="Swal.fire( 'Opps!!!', 'Silahkan Login Terlebih Dahulu', 'info' )"
                                class="btn btn-success btn-sm add2cart-notify" href="#"> <i
                                    class="lni lni-plus"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php endforeach; ?>

                    <div style="margin-top:100px; margin-left:3px"><a href="single-product.html">
                            <a onclick="$('.loaderform').show();" class="btn btn-primary btn-sm"
                                href="<?= base_url('shop')  ?>">
                                <i class="lni lni-chevron-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Top Products-->
    <?= $this->session->flashdata('alertcart') ?>
    <!-- <div class="top-products-area clearfix">
            <div class="container" id="databarangkategori">


            </div>
        </div> -->
    <div class="flash-sale-wrapper pb-3">
        <?php 
       foreach ($DataBarang as $row) :
        $error = "this.onerror=null;this.src='" . base_url() . "/assets/images/notfound.png';";
        $output .= '';
        ?>
        <div class="container">

            <div class="section-heading d-flex align-items-center justify-content-between">
                <h6 class="ml-1"> <?= $row->nama_kategori ?> </h6>
            </div>
            <!-- Flash Sale Slide-->
            <div class="flash-sale-slide owl-carousel">
                <?php 
            foreach ($row->jenis  as $jenis) :
                $a = 0;
                foreach ($jenis->barang  as $barang) : 
            ?>
                <!-- Single Flash Sale Card-->
                <div class="card top-product-card mb-3 flash-sale-card">
                    <div class="card-body"><a href="<?=  base_url('produk/' . encrypt_url($barang->kode_barcode)) ?>">
                            <?php $databarang = $barang->gambar;
						for ($i = 0; $i < 1; $i++) : ?>
                            <img onError="<?= $error  ?>" src="<?=  $databarang[$i]->lokasi_gambar ?>" alt="">
                            <?php endfor; ?>
                            <?php $nama_barang = strlen($barang->nama_barang) > 12 ? substr($barang->nama_barang, 0, 10) . '....' :  $barang->nama_barang;
						$brghasil = $barang->harga_jual+$barang->ongkos;
						$harga = strlen(number_format($brghasil)) > 12 ? substr(number_format($brghasil), 0, 10) . '....' : number_format($brghasil); ?>
                            <span class="product-title"><?= $nama_barang ?></span>
                            <span class="sale-price"><?= $harga ?></span>
                            <div class="product-rating">
                                Kadar: <?= $barang->kadar_cetak ?><br>
                                Berat : <?= $barang->berat ?> Gram<br>
                            </div>
                        </a>
                        <?php if ($this->session->userdata('status_login') == "SEDANG_LOGIN") : ?>
                        <a onclick="$('.loaderform').show();" class="add-cart-btn btn btn-success"
                            href="<?=base_url('add-cart/' . encrypt_url($barang->kode_barcode)) ?>"> <i
                                class="lni lni-plus"></i></a>
                        <?php else: ?>
                        <a onclick="Swal.fire( 'Opps!!!', 'Silahkan Login Terlebih Dahulu', 'info' )"
                            class="btn btn-success btn-sm add2cart-notify" href="#"> <i class="lni lni-plus"></i></a>
                        <?php endif; ?>
                    </div>
                </div>

                <?php endforeach; ?>

                <?php endforeach; ?>
                <div style="margin-top:100px; margin-left:3px"><a href="single-product.html">
                        <a onclick="$('.loaderform').show();" class="btn btn-primary btn-sm"
                            href="<?= base_url('carikategori/' . encrypt_url($row->kode_kategori) . '/' . encrypt_url($row->nama_kategori))  ?>">
                            <i class="lni lni-chevron-right"></i></a>
                </div>
            </div>
        </div>

    </div>
    <?php endforeach; ?>
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
    for (var t = 1; t <= <?= count($DataKelompok->data) ?>; t++) {
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