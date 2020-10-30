<!doctype html>
<html lang="en" class="pink-theme">
<?php $data	  = $this->SERVER_API->_getAPI('system-perusahaan'); ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <title>TOKO - <?= strtoupper($data->data[0]->nama_perusahaan); ?> </title>
    <link rel="stylesheet" href="<?= base_url('assets/mobile/') ?>vendor/materializeicon/material-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
    <link href="<?= base_url('assets/mobile/') ?>vendor/bootstrap-4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/mobile/') ?>vendor/swiper/css/swiper.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/mobile/') ?>css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/theme/js/sweetalert2/sweetalert2.css') ?>">

</head>

<body>
    <div class="row no-gutters vh-100 loader-screen">
        <div class="col align-self-center text-white text-center">
            <!-- <h1>TM HIDUP</h1> -->
            <figure><img src="<?= base_url('assets/logo/') ?>icon.png" alt=""></figure>
            <div class="laoderhorizontal">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <div class="sidebar">
        <?php if($this->session->userdata('status_login')=="SEDANG_LOGIN"):?>
            <div class="text-center">
                <div class="figure-menu shadow">
                    <figure><img src="<?= base_url('assets/mobile/img/') ?>user1.png" alt=""></figure>
                </div>
                <h5 class="mb-1 ">Ammy Jahnson</h5>
                <p class="text-mute small">Sydney, Australia</p>
            </div>
        <?php else: ?>
            <br>
            <br>
        <?php endif; ?>
        <br>
        <div class="row mx-0">
            <div class="col">
                <h5 class="subtitle text-uppercase"><span>Menu</span></h5>
                <div class="list-group main-menu">
                <a href="<?= base_url() ?>" class="list-group-item list-group-item-action active">Beranda</a>
                <a href="index.html" class="list-group-item list-group-item-action">Toko</a>
                <?php if($this->session->userdata('status_login')=="SEDANG_LOGIN"):?>
                    <a href="my-order.html" class="list-group-item list-group-item-action">My Order</a>
                    <a href="<?= base_url('wp-dashboard-user') ?>" class="list-group-item list-group-item-action">My Profile</a>
                    <a href="notification.html" class="list-group-item list-group-item-action">Notification <span class="badge badge-dark text-white">2</span></a>
                    <a href="all-products.html" class="list-group-item list-group-item-action">All Products</a>
                    <a href="controls.html" class="list-group-item list-group-item-action">Pages Controls <span class="badge badge-light ml-2">Check</span></a>
                    <a href="setting.html" class="list-group-item list-group-item-action">Settings</a>
                    <a href="<?= base_url('logout') ?>" class="list-group-item list-group-item-action mt-4">Logout</a>
                <?php else: ?>
                    <a href="<?= base_url('login') ?>" class="list-group-item list-group-item-action">Login/Register</a>
                <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
    
    <div class="wrapper">
    <div class="header">
        <div class="row no-gutters">
            <div class="col-auto">
                <button class="btn  btn-link text-dark menu-btn"><img src="<?= base_url('assets/mobile/img/') ?>menu.png" alt=""><span class="new-notification"></span></button>
            </div>
            <div class="col text-center"><img src="<?= base_url('assets/mobile/img/') ?>logo-header.png" alt="" class="header-logo"></div>
            <?php if($this->session->userdata('status_login')=="SEDANG_LOGIN"):?>
                <div class="col-auto">
                    <a href="<?= base_url('wp-dashboard-user') ?>" class="btn  btn-link text-dark"><i class="material-icons">account_circle</i></a>
                </div>
            <?php else: ?>
                <div class="col-auto">
                    <a  onclick="Swal.fire('Tidak Bisa Masuk','Anda Harus Login Dulu','info')" class="btn  btn-link text-dark"><i class="material-icons">account_circle</i></a>
                </div>
            <?php endif; ?>
        </div>
    </div>