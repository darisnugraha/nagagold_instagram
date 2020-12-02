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
  <link rel="stylesheet" href="<?= base_url('assets/module/waitme/waitMe.min.css') ?>">
  <script src="<?= base_url('assets/mobile/v2/js/') ?>jquery.min.js"></script>
  <script src="<?= base_url('assets/module/waitme/waitMe.min.js') ?>"></script>
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

  <?php if ($this->session->userdata('status_header') == "ADMIN") : ?>
    <div class="header-area" id="headerArea">
      <div class="container h-100 d-flex align-items-center justify-content-between">
        <!-- Logo Wrapper-->
        <div class="logo-wrapper"><a href="<?= base_url() ?>"> <img src="<?= base_url('assets/mobile/v2/') ?>img/core-img/logo-small.png" alt=""></a></div>
        <!-- Search Form-->
        <div class="top-search-form">
        <a href="<?= base_url('logout-admin') ?>">  <i class="lni lni-power-switch"></i> Sign Out </a>
        </div>
        <!-- Navbar Toggler-->
          <!-- <div class="suha-navbar-toggler d-flex flex-wrap" ><span></span><span></span><span></span></div> -->
        </div>
      </div>
      <!-- Sidenav Black Overlay-->
    <!-- Side Nav Wrapper-->
  
  <?php endif; ?>
  <br>
  <!-- Side Nav Wrapper-->