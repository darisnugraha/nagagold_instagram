<!doctype html>
<html lang="en" class="pink-theme">
<?php $data	  = $this->SERVER_API->_getAPI('system-perusahaan'); ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <title>TOKO - <?= strtoupper($data->data[0]->nama_perusahaan) ?> </title>
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
    <div class="row no-gutters vh-100 proh bg-template">
        <div class="col align-self-center px-3 text-center">
            <h2 class="text-white "><span class="font-weight-light">Sign</span>In</h2>
            <?= $this->session->flashdata('PesanLogin') ?>
            <?= $this->session->flashdata('alert'); ?>
            <form method="post" id="form1" action="<?= base_url('ceklogin') ?>" autocomplete="off"class="form-signin shadow">
                <div class="form-group float-label">
                    <input type="email" id="inputEmail" name="email" class="form-control" required autofocus>
                    <label for="inputEmail" class="form-control-label">Email address</label>
                </div>
                <div class="form-group float-label">
                    <input type="password" name="password" id="inputPassword" class="form-control" required>
                    <label for="inputPassword" class="form-control-label">Password</label>
                </div>
                <div class="form-group my-4 text-left">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="rememberme">
                        <label class="custom-control-label" for="rememberme">Remember Me</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <button type="submit" class="btn btn-lg btn-default btn-rounded shadow"><span>Sign in</span><i class="material-icons">arrow_forward</i></button>
                    </div>
                    <div class="col align-self-center text-right pl-0">
                        <a href="forgot-password.html">Forgot Password?</a>
                    </div>
                </div>
            </form>
            <p class="text-center text-white">
                Tidak Punya Akun?<br>
                <a href="signup.html">Daftar Sekarang</a>
            </p>
            <p class="text-center text-white">
            Aktivasi AKun?<br>
                <a href="signup.html">Disini</a>
            </p>
        </div>
    </div>

    <script src="<?= base_url('assets/mobile/') ?>js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url('assets/mobile/') ?>js/popper.min.js"></script>     
    <script src="<?= base_url('assets/mobile/') ?>vendor/bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/mobile/') ?>vendor/cookie/jquery.cookie.js"></script>
    <script src="<?= base_url('assets/mobile/') ?>vendor/swiper/js/swiper.min.js"></script>
    <script src="<?= base_url('assets/mobile/') ?>js/main.js"></script>
    <script src="<?php echo base_url('assets/theme/js/sweetalert2/sweetalert2.min.js') ?>"></script>
    <?php if ($this->session->flashdata('alert')) { echo $this->session->flashdata('alert');} ?>
    <script>
    $(window).on('load', function(){
        $('.loader-screen').delay(1000).fadeOut(function(){$(this).remove()});
    });
    </script>
</body>

</html>
