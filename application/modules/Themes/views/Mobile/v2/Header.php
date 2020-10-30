<!DOCTYPE html>
<html lang="en">
<?php $data    = $this->SERVER_API->_getAPI('system-perusahaan'); ?>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="theme-color" content="white" />
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Toko Mas Hidup">
  <meta name="msapplication-TileImage" content="<?= base_url('assets/tm-144.png') ?>">
  <meta name="msapplication-TileColor" content="#FFFFFF">

  <meta charset="utf-8">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags-->
  <!-- Title-->
  <title>TOKO - <?= strtoupper($data->data[0]->nama_perusahaan) ?> </title>
  <!-- Favicon-->
  <link rel="icon" href="<?= base_url('assets/logo/fanction.ico') ?>" type="image/x-icon" />
  <!-- Stylesheet-->
  <link rel="stylesheet" href="<?= base_url('assets/mobile/v2/css/') ?>style.min.css?v1.3">
  <script src="<?= base_url('assets/mobile/v2/js/') ?>jquery.min.js"></script>
  <script>
    var base_url = '<?= base_url() ?>';
  </script>
</head>

<body>
  <div class="errorLogin" style="display: none;">
    <div class="error-notification animated fadeIn"> Opps Anda Harus Login </div>
  </div>
  <div id="preloader">
    <img src="<?= base_url('assets/images/loadingmobile.gif') ?>" alt="Tunggu Sebentar..." />
  </div>
  <div id="preloader" class="loaderform" style="display: none;">
    <img src="<?= base_url('assets/images/loadingmobile.gif') ?>" alt="Tunggu Sebentar..." />
  </div>

  <?php if ($this->session->userdata('status_header') == "Home") : ?>
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Logo Wrapper-->
        <div class="logo-wrapper"><a href="<?= base_url() ?>"> <img src="<?= base_url('assets/mobile/v2/') ?>img/core-img/logo-small.png" alt=""></a></div>
        <!-- Search Form-->
        <div class="top-search-form">
          <form action="<?= base_url('carinamabarang') ?>" method="POST">
            <input class="form-control" name="cari" required type="search" placeholder="Enter your keyword">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
        </div>
        <!-- Navbar Toggler-->
        <?php if ($this->session->userdata('status_login') == "SEDANG_LOGIN") : ?>
          <div class="suha-navbar-toggler d-flex flex-wrap" id="suhaNavbarToggler"><span></span><span></span><span></span></div>
        <?php else : ?>
          <div class="suha-navbar-toggler d-flex flex-wrap" onclick="funclogin()"><span></span><span></span><span></span></div>
        <?php endif; ?>
      </div>
    </div>
    <!-- Sidenav Black Overlay-->
    <div class="sidenav-black-overlay"></div>
    <!-- Side Nav Wrapper-->
    <?= $this->load->view('MenuSidebar') ?>
  <?php elseif ($this->session->userdata('status_header') == "shop") : ?>
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Back Button-->
        <div class="back-button"><a class="pointer" onClick="history.go(-1); $('.loaderform').show();"><i class="lni lni-arrow-left"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0"><?= $this->session->userdata('title'); ?></h6>
        </div>
        <!-- Filter Option-->
        <div class="filter-option" id="suhaNavbarToggler"><i class="lni lni-cog"></i></div>
      </div>
    </div>
    <!-- Sidenav Black Overlay-->
    <div class="sidenav-black-overlay"></div>
    <!-- Side Nav Wrapper-->
    <div class="suha-sidenav-wrapper filter-nav" id="sidenavWrapper">
      <!-- Catagory Sidebar Area-->
      <div class="catagory-sidebar-area">
        <!-- Filter Title-->
        <h5 class="mb-3">Filter Produk</h5>
        <!-- Catagory-->
        <div class="widget catagory mb-4">
          <label>Kadar</label>
          <input class="form-control" type="search" name="search" placeholder="Kadar">
        </div>
        <div class="widget catagory mb-4">
          <label>Berat</label>
          <input class="form-control" type="search" name="search" placeholder="Berat">
        </div>
        <div class="widget catagory mb-4">
          <label>Harga</label>
          <input class="form-control" type="search" name="search" placeholder="1.000.000">
        </div>

        <!-- Apply Filter-->
        <div class="apply-filter-btn"><a class="btn btn-success" href="#">Apply Filter</a></div>
      </div>
      <!-- Go Back Button-->
      <div class="go-home-btn" id="goHomeBtn"><i class="lni lni-arrow-left"></i></div>
    </div>
  <?php else : ?>
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Back Button-->
        <div class="back-button"><a class="pointer" onClick="history.go(-1); $('.loaderform').show();"><i class="lni lni-arrow-left"></i></a></div>
        <!-- Page Title-->
        <div class="page-heading">
          <h6 class="mb-0"><?= $this->session->userdata('title'); ?></h6>
        </div>
        <!-- Filter Option-->
        <div class="suha-navbar-toggler d-flex flex-wrap" id="suhaNavbarToggler"><span></span><span></span><span></span></div>
        <!-- <a href="<?= base_url('wp-dashboard-user') ?>"><i class="lni lni-user"></i></a> -->
      </div>
    </div>
    <!-- Sidenav Black Overlay-->
    <div class="sidenav-black-overlay"></div>
    <?= $this->load->view('MenuSidebar') ?>

    <!-- Side Nav Wrapper-->
  <?php endif; ?>
  <br>
  <!-- Side Nav Wrapper-->