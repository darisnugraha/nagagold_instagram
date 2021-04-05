<?php if ($this->session->userdata('token')) : ?>
<?php redirect(base_url()); ?>
<?php else : ?>
<!DOCTYPE html>
<html lang="en">
<?php $data    = $this->SERVER_API->_getAPI('system-perusahaan'); ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?= base_url('assets/logo/fanction.ico') ?>" type="image/x-icon" />
    <title>OTENTIFIKASI PENDAFTARAN - <?= strtoupper($data->data[0]->nama_perusahaan) ?> </title>
    <link rel="stylesheet" href="<?= base_url('assets/mobile/v2/css/') ?>style.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/theme/js/sweetalert2/sweetalert2.css') ?>">
    <style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type="number"] {
        -moz-appearance: textfield;
    }

    #resendOTP {
        cursor: pointer;
    }
    </style>
</head>

<body>
    <!-- Preloader-->
    <div class="preloader" id="preloader">
        <div class="spinner-grow text-secondary" role="status">
            <div class="sr-only">Loading...</div>
        </div>
    </div>
    <!-- Login Wrapper Area-->
    <div class="login-wrapper d-flex align-items-center justify-content-center text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5">
                    <div class="text-left px-4">
                        <h5 class="mb-1 text-white">Verifikasi</h5>
                        <p class="mb-4 text-white">
                            <?= $this->session->userdata('PesanOtp') ?>
                        </p>
                    </div>
                    <!-- OTP Verify Form-->
                    <div class="otp-verify-form mt-5 px-4">
                        <form action="<?= base_url('verifikasi-otp-daftar') ?>" method="POST" class="digit-group"
                            data-group-name="digits" data-autosubmit="false" autocomplete="off">
                            <div class="form-group d-flex justify-content-between mb-5">
                                <input class="form-control" autofocus required name="kode_otp[]" id="digit-1"
                                    name="digit-1" data-next="digit-2" pattern="/^-?\d+\.?\d*$/"
                                    onKeyPress="if(this.value.length==1) return false;"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    type="number" value="" placeholder="-" maxlength="1">
                                <input class="form-control" required name="kode_otp[]" id="digit-2" name="digit-2"
                                    data-next="digit-3" data-previous="digit-1" pattern="/^-?\d+\.?\d*$/"
                                    onKeyPress="if(this.value.length==1) return false;"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    type="number" value="" placeholder="-" maxlength="1">
                                <input class="form-control" required name="kode_otp[]" id="digit-3" name="digit-3"
                                    data-next="digit-4" data-previous="digit-2" data-previous="digit-2"
                                    pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==1) return false;"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    type="number" value="" placeholder="-" maxlength="1">
                                <input class="form-control" required name="kode_otp[]" id="digit-4" name="digit-4"
                                    data-previous="digit-3" pattern="/^-?\d+\.?\d*$/"
                                    onKeyPress="if(this.value.length==1) return false;"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    type="number" value="" placeholder="-" maxlength="1">
                            </div>

                            <button class="btn btn-login btn-lg w-100" id="otp_5" type="submit">Verifikasi
                                Sekarang</button>
                        </form>
                    </div>
                    <!-- Term & Privacy Info-->
                    <div class="login-meta-data px-4">
                        <p class="mt-3 mb-0">Don't received the OTP?
                        <div id="tampilkan" class="text-white"></div> <span class="otp-sec ml-1 text-white"
                            id="resendOTP">
                            <a class="text-white ml-2"
                                href="<?= base_url('resend-otp-daftar/' . encrypt_url($this->session->userdata('no_hp'))) ?>">Kirim
                                ulang</a></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- All JavaScript Files-->
    <script src="<?php echo base_url('assets/theme/js/sweetalert2/sweetalert2.min.js') ?>"></script>
    <script src="<?= base_url('assets/mobile/v2/js/') ?>jquery.min.js"></script>
    <script src="<?= base_url('assets/mobile/v2/js/') ?>popper.min.js"></script>
    <script src="<?= base_url('assets/mobile/v2/js/') ?>bootstrap.min.js"></script>
    <script src="<?= base_url('assets/mobile/v2/js/') ?>waypoints.min.js"></script>
    <script src="<?= base_url('assets/mobile/v2/js/') ?>jquery.easing.min.js"></script>
    <script src="<?= base_url('assets/mobile/v2/js/') ?>owl.carousel.min.js"></script>
    <script src="<?= base_url('assets/mobile/v2/js/') ?>jquery.animatedheadline.min.js"></script>
    <script src="<?= base_url('assets/mobile/v2/js/') ?>jquery.counterup.min.js"></script>
    <script src="<?= base_url('assets/mobile/v2/js/') ?>wow.min.js"></script>
    <script src="<?= base_url('assets/mobile/v2/js/') ?>jarallax.min.js"></script>
    <script src="<?= base_url('assets/mobile/v2/js/') ?>jarallax-video.min.js"></script>
    <script src="<?= base_url('assets/mobile/v2/js/') ?>default/jquery.passwordstrength.js"></script>
    <script src="<?= base_url('assets/mobile/v2/js/') ?>default/dark-mode-switch.js"></script>
    <script src="<?= base_url('assets/mobile/v2/js/') ?>default/active.js"></script>
    <?php if ($this->session->flashdata('alert')) {
      echo $this->session->flashdata('alert');
    } ?>
    <script>
    $(window).on('load', function() {
        $('.loader-screen').delay(1000).fadeOut(function() {
            $(this).remove()
        });
    });
    $(document).ready(function() {

        $('.digit-group').find('input').each(function() {
            $(this).attr('maxlength', 1);
            $(this).on('keyup', function(e) {
                var parent = $($(this).parent());

                if (e.keyCode === 8 || e.keyCode === 37) {
                    var prev = parent.find('input#' + $(this).data('previous'));

                    if (prev.length) {
                        $(prev).select();
                    }
                } else if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e
                        .keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e
                    .keyCode === 39) {
                    var next = parent.find('input#' + $(this).data('next'));

                    if (next.length) {
                        $(next).select();
                    } else {
                        if (parent.data('autosubmit')) {
                            parent.submit();
                        }
                    }
                }
            });
        });
        // $('#otp_1').on('keyup',function(){
        //   $('#otp_2').focus();
        // })

        // $('#otp_2').on('keyup',function(){
        //   $('#otp_3').focus();
        // })
        // $('#otp_3').on('keyup',function(){
        //   $('#otp_4').focus();
        // })
        // $('#otp_4').on('keyup',function(){
        //   $('#otp_5').focus();
        // })




        var detik = 59;
        var menit = 0;

        function hitung() {
            setTimeout(hitung, 1000);
            // console.log(detik);
            if (detik == 0) {
                // console.log('kesini');
                $('#resendOTP').show();
                $('#tampilkan').hide();
            }
            // $('#tampilkan').html( '' + menit + ' menit ' + detik + ' detik ');
            $('#tampilkan').html('Tunggu ' + detik + ' detik ');
            detik--;
            if (detik < 0) {
                detik = 59;
                menit--;
                if (menit < 0) {
                    menit = 0;
                    detik = 0;
                }
            }
        }
        hitung();
    });
    </script>

</html>

<?php endif; ?>