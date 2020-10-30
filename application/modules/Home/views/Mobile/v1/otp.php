<!doctype html>
<html lang="en" class="pink-theme">
<?php $data	  = $this->SERVER_API->_getAPI('system-perusahaan'); 
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, viewport-fit=cover, user-scalable=no">
    <meta name="description" content="">
    <title>TOKO - <?= strtoupper($data->data[0]->nama_perusahaan) ?> </title>
    <link rel="stylesheet" href="<?= base_url('assets/mobile/') ?>vendor/materializeicon/material-icons.css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet"> -->
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
            <h2 class="text-white "><span class="font-weight-light">Otentivikasi</span></h2>
            <?= $this->session->flashdata('PesanLogin') ?>
            <?= $this->session->flashdata('alert'); ?>
            <form method="post" id="form1" action="<?= base_url('ceklogin') ?>" autocomplete="off"class="form-signin shadow">
                <div class="form-group float-label">
                    <input type="text" name="text" class="form-control" required autofocus>
                    <label for="inputEmail" class="form-control-label">Masukan Kode Otentivikasi</label>
                    <!-- <div id='tampilkan'></div> -->
                </div>
                <div class="row">
                    <div class="col-auto">
                        <a href="<?= base_url('') ?>" class="btn btn-lg btn-default btn-rounded shadow"><span>Verifikasi</span><i class="material-icons">arrow_forward</i></a>
                    </div>
                    <div class="col align-self-center text-center">
                    <div id="tampilkan"></div>
                    <div id="tampilkan2" style="display: none;"><a href="#">Kirim Ulang</a></div>
                    </div>
                </div>
            </form>
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
    $(document).ready(function() {
    var detik = 59;
    var menit = 0;
    function hitung() {
    setTimeout(hitung,1000);
    // console.log(detik);
    if(detik == 0){
        // console.log('kesini');
        $('#tampilkan2').show();
        $('#tampilkan').hide();
    }
        // $('#tampilkan').html( '' + menit + ' menit ' + detik + ' detik ');
        $('#tampilkan').html('Tunggu '+ detik + ' detik ');
        detik --;
        if(detik < 0) {
            detik = 59;
            menit --;
            if(menit < 0) {
                menit = 0;
                detik = 0;
            }
        }
    }
    hitung();
    });
    </script>
</body>

</html>
