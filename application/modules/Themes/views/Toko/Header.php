<!DOCTYPE html>

<html lang="en">
<?php $thisPage = $_SERVER["REQUEST_URI"];

$tentangkami = "";
if ($thisPage == "/nagagold_store/tentang-kami") {
    $tentangkami = "active";
}
$pengajuanpenjualan = "";
if ($thisPage == "/nagagold_store/pengajuan-penjualan") {
    $pengajuanpenjualan = "active";
}
$home = "";
if ($thisPage == "/nagagold_store/") {
    $home = "active";
}
$konfirmasipembayaran = "";
if ($thisPage == "/nagagold_store/Konfirmasi-Pembayaran") {
    $konfirmasipembayaran = "active";
}
$faq = "";
if ($thisPage == "/nagagold_store/faq") {
    $faq = "active";
}
$panduanbelanja = "";
if ($thisPage == "/nagagold_store/panduan-belanja") {
    $panduanbelanja = "active";
}
$shop = "";
if ($thisPage == "/nagagold_store/shop") {
    $shop = "active";
}
$data      = $this->SERVER_API->_getAPI('system-perusahaan');
$point=0;
$kategori = $this->SERVER_API->_getAPI('kategori/jenis');
$cart      = $this->SERVER_API->_getAPI('cart', $this->session->userdata('token'));
$jml_cart = $this->SERVER_API->_getAPI('cart/count', $this->session->userdata('token'));
$KategoriBarang = $this->SERVER_API->_getAPI('kategori/jenis', $this->session->userdata('token'));

$ceonnection = cek_internet();
?>

<head>
    <title><?= strtoupper($data->data[0]->nama_perusahaan) ?> </title>
    <link rel="apple-touch-icon" href="<?= base_url('assets/logo/tm-152.png') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <link rel="icon" href="<?= base_url('assets/logo/fanction.ico') ?>" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/theme/css/default.min.css?v1.1') ?>">
    <script type="text/javascript" src="<?= base_url() ?>assets/theme/js/jquery.min.js?ver=1.0"></script>
    <script>
        var base_url = '<?= base_url() ?>';
    </script>
</head>
<div class="preloader">
    <div class="loading">
        <img src="<?= base_url() ?>assets/images/loading.gif" width="80">
        <p>Harap Tunggu</p>
    </div>
</div>
<?php
if (isset($cart->data)) {
    $total_awal = 0;
    foreach ($cart->data as $row) {
        $total_awal += $row->harga_jual + $row->ongkos;
    }
}
?>

<body class="index-opt-1 catalog-product-view catalog-view_op1">
    <div class="wrapper">
        <!-- HEADER -->
        <header class="site-header header-opt-1 cate-show">
            <?php if ($ceonnection == TRUE) : ?>
                <?php if ($this->session->userdata('koneksi') == 'terhubung') : ?>
                    <div class="header-top koneksiterhubung" style="background-color: #13db42; color:#ffffff">
                        <div class="container" align="center">
                            Koneksi Terhubung!!!
                        </div>
                    </div>
                <?php $this->session->set_userdata('koneksi', '');
                endif; ?>
            <?php else : ?>
                <div class="header-top" style="background-color: red; color:#ffffff">
                    <div class="container" align="center">
                        Koneksi Internet Terputus !!!
                    </div>
                </div>
            <?php endif; ?>
            <!-- header-top -->
            <div class="header-top">
                <div class="container">
                    <!-- nav-left -->
                    <ul class="nav-left">
                        <li><span><i class="fa fa-phone" aria-hidden="true"></i><?= $data->data[0]->no_hp ?></span></li>
                        <li><span><i class="fa fa-envelope" aria-hidden="true"></i> <?= $data->data[0]->email ?> </span></li>
                    </ul><!-- nav-left -->

                    <!-- nav-right -->
                    <ul class=" nav-right">
                        <?php if ($this->session->userdata('status_login') == "SEDANG_LOGIN") : ?>
                            <li><a href="#">Point : <?= $point?> </a></li>
                            <li class="dropdown setting">
                                <a data-toggle="dropdown" role="button" href="#" class="dropdown-toggle "><span>My Account</span> <i aria-hidden="true" class="fa fa-angle-down"></i></a>
                                <div class="dropdown-menu  ">
                                    <ul class="account">
                                        <li><a href="<?= base_url('wp-dashboard-user') ?>">My Account</a></li>
                                        <li><a href="<?= base_url('cart') ?>">Cart</a></li>
                                        <li><a href="<?= base_url('logout') ?>">Logout</a></li>
                                    </ul>
                                </div>
                            </li>
                        <?php else : ?>
                            <li><a href="<?= base_url('login') ?>">Login/Register</a></li>
                            <!-- <li><a href="#">WishList </a></li> -->
                        <?php endif; ?>
                        <li><a href="<?= base_url('panduan-belanja') ?>">Panduan Belanja </a></li>
                    </ul><!-- nav-right -->
                </div>
            </div><!-- header-top -->
            <br>
            <!-- header-content -->
            <div class="header-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 nav-left">
                            <!-- logo -->
                            <strong class="logo">
                                <a href="#"><img width="100%" src="<?= $data->data[0]->logo ?>" alt="logo"></a>
                                <!-- <a href="#"><img src="<?= base_url('assets/logo/logokencaaputeraemas.png') ?>" alt="logo"></a> -->
                            </strong>
                        </div>
                        <div class="nav-right">
                            <?php if (isset($cart->data)) : ?>
                                <div class="block-minicart dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <span class="cart-icon"></span>
                                        <span class="counter qty">
                                            <span class="cart-text">Shopping Cart</span>
                                            <span class="counter-number"><?= $jml_cart->data[0]->count_item ?></span>
                                            <!-- <span class="counter-label"><?= $cart->jml_barang ?> <span>Items</span></span> -->
                                            <span class="counter-price">Rp.<?= number_format($total_awal) ?></span>
                                        </span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <form>
                                            <div class="minicart-content-wrapper">
                                                <div class="subtitle">

                                                    Kamu mempunyai <?= $jml_cart->data[0]->count_item ?> barang dalam cart
                                                </div>
                                                <div class="minicart-items-wrapper">
                                                    <ol class="minicart-items">
                                                        <?php
                                                        $total_harga = 0;
                                                        foreach ($cart->data as $row) :
                                                            $total_harga += $row->harga_jual+$row->ongkos;
                                                        ?>
                                                            <li class="product-item">
                                                                <a class="product-item-photo" href="#" title="The Name Product">
                                                                    <?php $databarang = $row->gambar;
                                                                    for ($i = 0; $i < 1; $i++) : ?>
                                                                        <img class="product-image-photo" width="300" height="100" onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?= $databarang[$i]->lokasi_gambar ?>">
                                                                    <?php endfor; ?>
                                                                </a>
                                                                <div class="product-item-details">
                                                                    <strong class="product-item-name">
                                                                        <a href="#"><?= $row->nama_barang ?></a>
                                                                    </strong>
                                                                    <div class="product-item-price">
                                                                        <span class="price"><?php $hasilpenjualan= $row->harga_jual+$row->ongkos; echo number_format($hasilpenjualan) ?></span>
                                                                    </div>
                                                                    <div class="product-item-qty">
                                                                        <span class="label">Qty: </span><span class="number">1</span>
                                                                    </div>
                                                                    <!-- <div class="product-item-actions">
                                                                <a class="action delete" href="#" title="Remove item">
                                                                    <span>Remove</span>
                                                                </a>
                                                            </div> -->
                                                                </div>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ol>
                                                </div>
                                                <div class="subtotal">
                                                    <span class="label">Jumlah Barang</span>
                                                    <span class="price"><?= $jml_cart->data[0]->count_item ?> Barang</span>
                                                </div>
                                                <div class="subtotal">
                                                    <span class="label">Total</span>
                                                    <span class="price">Rp.<?= number_format($total_harga) ?></span>
                                                </div>
                                                <div class="actions">
                                                    <!-- <a class="btn btn-viewcart" href="">
                                                    <span>Shopping bag</span>
                                                </a> -->
                                                    <button class="btn btn-checkout" onclick="window.location.href='<?= base_url('cart') ?>'" type="button" title="Check Out">
                                                        <span>Cart</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="block-minicart dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <span class="cart-icon"></span>
                                        <span class="counter qty">
                                            <span class="cart-text">Shopping Cart</span>
                                            <span class="counter-number">0</span>
                                            <span class="counter-label">0<span>Items</span></span>
                                            <span class="counter-price">Rp.0</span>
                                        </span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <form>
                                            <div class="minicart-content-wrapper">
                                                <div class="subtitle">
                                                    Keranjang Masih Kosong
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="nav-mind">

                            <!-- block search -->
                            <div class="block-search">
                                <div class="block-title">
                                    <span>Search</span>
                                </div>
                                <div class="block-content">
                                    <form action="<?= base_url('carinamabarang') ?>" method="POST">
                                        <div class="categori-search  ">
                                            <select data-placeholder="All Categories" name="kode_kategori" class="categori-search-option">
                                                <option value="">All Categories</option>
                                                <?php $kategoriBrg = $KategoriBarang->data;
                                                for ($i = 0; $i < count($KategoriBarang->data); $i++) : ?>
                                                    <option value="<?= $kategoriBrg[$i]->kode_kategori ?>"><?= $kategoriBrg[$i]->nama_kategori ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                        <div class="form-search">
                                            <div class="box-group">
                                                <input type="text" name="cari" class="form-control" placeholder="Ketikan nama barang yang akan dicari...">
                                                <button class="btn btn-search" type="submit"><span>search</span></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div><!-- header-content -->
            <br>

            <!-- header-nav -->
            <div class="header-nav mid-header">
                <div class="container">

                    <div class="box-header-nav">

                        <!-- btn categori mobile -->
                        <span data-action="toggle-nav-cat" class="nav-toggle-menu nav-toggle-cat"><span>Categories</span></span>
                        <!-- btn menu mobile -->
                        <span data-action="toggle-nav" class="nav-toggle-menu"><span>Menu</span></span>

                        <!--categori  -->
                        <div class="block-nav-categori" style="display: block;">
                            <div class="block-title">
                                <span>Categories</span>
                            </div>
                            <div class="block-content">
                                <div class="clearfix"><span data-action="close-cat" class="close-cate"><span>Categories</span></span></div>
                                <ul class="ui-categori">
                                    <?php foreach ($kategori->data as $ktgori) : ?>
                                        <li class="parent">
                                            <a href="<?= base_url('carikategori/' . encrypt_url($ktgori->kode_kategori) . '/' . encrypt_url($ktgori->nama_kategori)) ?>">
                                                <span class="icon"><img onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?= $ktgori->icon ?>" alt="nav-cat"></span>
                                                <?= $ktgori->nama_kategori ?>
                                            </a>
                                            <?php if ($ktgori->jenis == NULL) : ?>
                                            <?php else : ?>
                                                <span class="toggle-submenu"></span>
                                                <div class="submenu">
                                                    <ul dir="ltr"  style="width: auto; height: 200px; overflow: auto;scrollbar-width: thin; ">
                                                        <?php foreach ($ktgori->jenis  as $rowdetaimenu) : ?>
                                                            <li>
                                                                <strong class="title"><a href="<?= base_url('carijenis/' . encrypt_url($rowdetaimenu->kode_jenis) . '/' . encrypt_url($rowdetaimenu->nama_jenis)) ?>"><?= $rowdetaimenu->nama_jenis ?></a></strong>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>

                                <div class="view-all-categori">
                                    <a class="open-cate btn-view-all">All Categories</a>
                                </div>
                            </div>

                        </div>
                        <!--categori  -->

                        <!-- menu -->
                        <div class="block-nav-menu">
                            <div class="clearfix"><span data-action="close-nav" class="close-nav"><span>close</span></span></div>
                            <ul class="ui-menu">
                                <li class="<?= $home ?>">
                                    <a href="<?= base_url() ?>">Beranda</a>
                                </li>
                                <li class="<?= $shop ?>"><a href="<?= base_url('shop') ?>">Toko</a></li>
                                <?php if ($this->session->userdata('status_login') == "SEDANG_LOGIN") : ?>
                                    <li class="<?= $pengajuanpenjualan ?>"><a href="<?= base_url('estimasi-harga-penjualan') ?>">Estimasi Harga Penjualan</a></li>
                                    <li class="<?= $konfirmasipembayaran ?>"><a href="<?= base_url('konfirmasipembayaran/1') ?>">Konfirmasi Pembayaran </a></li>
                                <?php endif; ?>
                                <li class="<?= $tentangkami ?>"><a href="<?= base_url('tentang-kami') ?>">Tentang Kami</a></li>
                                <li class="<?= $faq ?>"><a href="<?= base_url('faq') ?>">F.A.Q</a></li>

                            </ul>

                        </div><!-- menu -->

                        <!-- mini cart -->
                        <div class="block-minicart dropdown ">

                            <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                <span class="cart-icon"></span>
                            </a>

                            <div class="dropdown-menu">
                                <?php if ($cart->data == NULL) : ?>
                                    <form>
                                        <div class="minicart-content-wrapper">
                                            <div class="subtitle">
                                                Keranjang Masih Kosong
                                            </div>
                                        </div>
                                    </form>
                                <?php else : ?>
                                    <form>
                                        <div class="minicart-content-wrapper">
                                            <div class="subtitle">
                                                Kamu mempunyai <?= $jml_cart->data[0]->count_item ?> dalam keranjang
                                            </div>
                                            <div class="minicart-items-wrapper">
                                                <ol class="minicart-items">
                                                    <?php
                                                    foreach ($cart->data as $row) : ?>
                                                        <li class="product-item">
                                                            <a class="product-item-photo" href="#" title="The Name Product">
                                                                <?php $databarang = $row->gambar;
                                                                for ($i = 0; $i < 1; $i++) : ?>
                                                                    <img class="product-image-photo" width="300" height="100" onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?=  $databarang[$i]->lokasi_gambar ?>">
                                                                <?php endfor; ?>
                                                            </a>
                                                            <div class="product-item-details">
                                                                <strong class="product-item-name">
                                                                    <a href="#"><?= $row->nama_barang ?></a>
                                                                </strong>
                                                                <div class="product-item-price">
                                                                    <span class="price"><?php $hasilbarang =  $row->harga_jual+$row->ongkos; echo number_format($hasilbarang) ?></span>
                                                                </div>
                                                                <div class="product-item-qty">
                                                                    <span class="label">Qty: </span><span class="number">1</span>
                                                                </div>
                                                                <!-- <div class="product-item-actions">
                                                                <a class="action delete" href="#" title="Remove item">
                                                                    <span>Remove</span>
                                                                </a>
                                                            </div> -->
                                                            </div>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ol>
                                            </div>
                                            <div class="subtotal">
                                                <span class="label">Total</span>
                                                <span class="price"><?= number_format($total_awal) ?></span>
                                            </div>
                                            <div class="actions">
                                                <!-- <a class="btn btn-viewcart" href="">
                                                <span>Shopping bag</span>
                                            </a> -->
                                                <button class="btn btn-checkout" onclick="window.location.href='<?= base_url('cart') ?>'" type="button" title="Check Out">
                                                    <span>Cart</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                <?php endif; ?>
                            </div>

                        </div>

                        <!-- search -->
                        <div class="block-search">
                            <div class="block-title">
                                <span>Search</span>
                            </div>
                            <div class="block-content">
                                <div class="form-search">
                                    <form action="<?= base_url('carinamabarang') ?>" method="POST">
                                        <div class="box-group">
                                            <input type="text" name="cari" class="form-control" placeholder="apa yang anda inginkan...">
                                            <button class="btn btn-search" type="button"><span>search</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- search -->

                        <!--setting  -->
                        <div class="dropdown setting">
                            <a data-toggle="dropdown" role="button" href="#" class="dropdown-toggle "><span>Settings</span> <i aria-hidden="true" class="fa fa-user"></i></a>
                            <div class="dropdown-menu  ">
                                <ul class="account">
                                    <!-- <li><a href="#">Wishlist</a></li> -->
                                    <?php if ($this->session->userdata('status_login') == "SEDANG_LOGIN") : ?>
                                        <li><a href="<?= base_url('wp-dashboard-user') ?>">My Account</a></li>
                                        <li><a href="<?= base_url('cart') ?>">Cart</a></li>
                                        <li><a href="<?= base_url('logout') ?>">Logout</a></li>
                                    <?php else : ?>
                                        <li><a href="<?= base_url('login') ?>">Login/Register</a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <!--setting  -->

                    </div>
                </div>
            </div><!-- header-nav -->
        </header><!-- end HEADER -->

        <!-- MAIN -->