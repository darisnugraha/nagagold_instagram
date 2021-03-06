<!DOCTYPE html>
<html lang="en">
<?php $data    = $this->SERVER_API->_getAPI('system-perusahaan'); ?>

<head>
  <!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1649526498580271');
fbq('init', '856456008632968');
fbq('init', '3079176082318692');
fbq('init', '357724442481867');
fbq('track', 'PageView');
fbq('track', 'viewContent')
</script>
<script type="application/ld+json">
{
  "@context":"https://schema.org",
  "@type":"Product",
  "productID":"facebook_tshirt_001",
  "name":"Facebook T-Shirt",
  "description":"Unisex Facebook T-shirt, Small",
  "url":"https://example.org/facebook",
  "image":"https://example.org/facebook.jpg",
  "brand":"facebook",
  "offers": [
    {
      "@type": "Offer",
      "price": "7.99",
      "priceCurrency": "USD",
      "itemCondition": "https://schema.org/NewCondition",
      "availability": "https://schema.org/InStock"
    }
  ],
  "additionalProperty": [{
    "@type": "PropertyValue",
    "propertyID": "item_group_id",
    "value": "fb_tshirts"
  }]
}
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=357724442481867&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
  <meta name="facebook-domain-verification" content="prh62z9b8lpakyikco99d8ij547mse" />
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
  <link rel="stylesheet" href="<?= base_url('assets/mobile/v2/css/') ?>style-min.css?v2.0">
  <script src="<?= base_url('assets/mobile/v2/js/') ?>jquery.min.js"></script>
  <script>
    var base_url = '<?= base_url() ?>';
  </script>
  <style>
   .item {

/* padding-right:8px; */
padding-top: 2px;
position: relative;
/* position:relative;
padding-top:20px;
display:inline-block; */
}

.notify-badge {
position: absolute;
right: 10px;
top: -3px;
background: red;
text-align: center;
border-radius: 50px 50px 50px 50px;
color: white;
padding: 1px 5px;
font-size: 10px;
}
  </style>
</head>
<?php $datacart  = $this->SERVER_API->_getAPI('cart/count', $this->session->userdata('token')); ?>

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
        <div class="<?= $this->session->userdata('title') == "Cart" ? 'active' : '' ?>"><a onclick="$('.loaderform').show();" href="<?= base_url('cart') ?>">
                 
                  <?php if ($datacart->data[0]->count_item == null) : ?>
                    <div class="item"></div>
                    <?php else: ?>
                    <div class="item"><span class="notify-badge"><?= $datacart->data[0]->count_item ?></span></div>
                  <?php endif; ?>
                  <i class="lni lni-cart"></i></a></div>
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