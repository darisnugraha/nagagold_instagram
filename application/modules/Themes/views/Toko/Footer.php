<?php
$data      = $this->SERVER_API->_getAPI('system-perusahaan');
?>
<footer class="site-footer footer-opt-1">

    <div class="container">
        <div class="footer-column">

            <div class="row">
                <div class="col-md-3 col-lg-3 col-xs-6 col">
                    <!-- <strong class="logo-footer"> -->
                    <!-- <a href="#"><img src="<?= base_url('assets/logo/' . $data->logo) ?>" alt="logo"></a> -->
                    <!-- <h3 class="title">Kontak Kami</h3> -->
                    <!-- </strong> -->
                    <?php foreach ($data->data  as $row) {
                        $alamat = $row->alamat;
                        $no_hp = $row->no_hp;
                        $nama_perusahaan = strtolower($row->nama_perusahaan);
                        $email = $row->email;
                    } ?>

                    <div class="links">
                        <h3 class="title">Kontak Kami</h3>
                        <table class="address">
                            <tr>
                                <td><b>Address: </b></td>
                                <td><?= $alamat ?></td>
                            </tr>
                            <tr>
                                <td><b>Phone: </b></td>
                                <td><?= $no_hp ?></td>
                            </tr>
                            <tr>
                                <td><b>Email:</b></td>
                                <td><?= $email ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="col-md-2 col-lg-2 col-xs-6 col">
                    <div class="links">
                        <h3 class="title">Tentang</h3>
                        <ul>
                            <li><a href="<?= base_url('tentang-kami') ?>">Tentang Kami</a></li>
                            <li><a href="#">Konsultasi Perhiasan</a></li>
                            <li><a href="#">Garansi</a></li>
                            <li><a href="#">Garansi Pengiriman</a></li>
                            <li><a href="<?= base_url('kontak') ?>">Kontak Kami</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-lg-2 col-xs-6 col">
                    <div class="links">
                        <h3 class="title">Information</h3>
                        <ul>
                            <?php if ($this->session->userdata('status_login') == "SEDANG_LOGIN") : ?>
                                <li><a href="<?= base_url('UserForm') ?>">Akun Saya</a></li>
                                <li><a href="<?= base_url('logout') ?>">Logout</a></li>
                                <li><a href="<?= base_url('cart/view_cart') ?>">Keranjang Belanja</a></li>
                            <?php else : ?>
                                <li><a href="<?= base_url('login') ?>">Login/Register</a></li>
                            <?php endif; ?>
                            <li><a href="<?= base_url('') ?>">Beranda</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 col-lg-2 col-xs-6 col">
                    <div class="links">
                        <h3 class="title">Panduan</h3>
                        <ul>
                            <li><a href="<?= base_url('panduan-belanja') ?>">Bantuan Belanja</a></li>
                            <li><a href="<?= base_url('panduan-pembayaran') ?>">Panduan Pembayaran</a></li>
                            <li><a href="#">Panduan Ukuran</a></li>
                            <li><a href="<?= base_url('faq') ?>">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-xs-6 col">
                    <div class="block-newletter">
                        <div class="block-social">
                            <div class="block-title">Ikuti Kami </div>
                            <div class="block-content">
                                <a href="#" class="sh-facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#" class="sh-pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
                                <a href="#" class="sh-vk"><i class="fa fa-vk" aria-hidden="true"></i></a>
                                <a href="#" class="sh-twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#" class="sh-google"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="payment-methods">
            <div class="block-title">
                Pembayaran
            </div>
            <div class="block-content">
                <img alt="payment" src="<?= base_url() ?>assets/theme/images/media/index1/payment1.png">
                <img alt="payment" src="<?= base_url() ?>assets/theme/images/media/index1/payment2.png">
                <img alt="payment" src="<?= base_url() ?>assets/theme/images/media/index1/payment3.png">
                <img alt="payment" src="<?= base_url() ?>assets/theme/images/media/index1/payment4.png">
                <img alt="payment" src="<?= base_url() ?>assets/theme/images/media/index1/payment5.png">
                <img alt="payment" src="<?= base_url() ?>assets/theme/images/media/index1/payment6.png">
            </div>
        </div>

        <div class="payment-methods">
            <div class="block-title">
                Pengiriman
            </div>
            <div class="block-content">
                <img alt="payment" src="<?= base_url() ?>assets/theme/images/media/index1/shipping_01.png">
                <img alt="payment" src="<?= base_url() ?>assets/theme/images/media/index1/shipping_02.png">
                <img alt="payment" src="<?= base_url() ?>assets/theme/images/media/index1/shipping_04.png">
            </div>
        </div>



        <div class="copyright">
            Copyright ©<?= ucwords($nama_perusahaan) ?>. All Rights Reserved. Designed by <a href="<?= base_url() ?>" target="_blank"><?= ucwords($nama_perusahaan) ?></a>
        </div>

    </div>

</footer><!-- end FOOTER -->

<!--back-to-top  -->
<!-- <a href="#" class="back-to-top">
    <i aria-hidden="true" class="fa fa-angle-up"></i>
</a> -->


</div>
<div class="wc-style7">

    <!-- Floating Button-->
    <a class="wc-button">
        <i id="wc-whatsapp" class="fa fa-whatsapp" aria-hidden="true"></i>
        <i id="wc-times" class="fa fa-minus-square-o" aria-hidden="true"></i>
    </a>

    <!-- Chat Panel -->
    <div class="wc-panel">
        <!-- Panel Header Content -->
        <div class="wc-header">
            <!-- Profile Picture -->
            <div class="wc-img-cont">
                <img class="wc-user-img" src="<?= base_url() ?>assets/theme/images/profile_01.jpg" />
            </div>
            <!-- Display Name & Last Seen -->
            <div class="wc-user-info">
                <strong>Customer Support</strong>
                <p>Toko Mas Hidup</p>
            </div>
        </div>
        <!-- Panel Body Content -->
        <div class="wc-body">
            <div class="wc-content">
                <div class="wc-bubble tri-right left-top">
                    <span>Toko mas Hidup</span>
                    <br>
                    <p><?= ucapan(); ?> 👋</p>
                    <p>Apa yang bisa saya bantu?</p>
                </div>
            </div>
        </div>
        <!-- Panel Footer Content -->
        <div class="wc-footer">
            <!-- Start Single Contact List -->
            <a class="wc-list" number="628986969882" message="<?= ucapan(); ?>">
                <i class="fa fa-whatsapp" aria-hidden="true"></i>
                <p>Chat</p>
            </a>
        </div>
    </div>
</div>
<!-- jQuery -->
<!-- sticky -->
<!-- <script type="text/javascript" src="<?= base_url() ?>assets/theme/js/whatschat-layout.js"></script> -->
<script type="text/javascript" src="<?= base_url() ?>assets/theme/js/whatschat-style7.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/theme/js/jquery.sticky.js"></script>
<!-- OWL CAROUSEL Slider -->
<script type="text/javascript" src="<?= base_url() ?>assets/theme/js/owl.carousel.min.js"></script>
<!-- Boostrap -->
<script type="text/javascript" src="<?= base_url() ?>assets/theme/js/bootstrap.min.js"></script>
<!-- Countdown -->
<script type="text/javascript" src="<?= base_url() ?>assets/theme/js/jquery.countdown.min.js"></script>
<!--jquery Bxslider  -->
<script type="text/javascript" src="<?= base_url() ?>assets/theme/js/jquery.bxslider.min.js"></script>
<!-- actual -->
<script type="text/javascript" src="<?= base_url() ?>assets/theme/js/jquery.actual.min.js"></script>
<!-- jQuery UI -->
<script type="text/javascript" src="<?= base_url() ?>assets/theme/js/jquery-ui.min.js"></script>
<!-- Chosen jquery-->
<script type="text/javascript" src="<?= base_url() ?>assets/theme/js/chosen.jquery.min.js"></script>
<!-- parallax jquery-->
<script type="text/javascript" src="<?= base_url() ?>assets/theme/js/jquery.parallax-1.1.3.js"></script>
<!-- elevatezoom -->
<script type="text/javascript" src="<?= base_url() ?>assets/theme/js/jquery.elevateZoom.min.js"></script>
<!-- fancybox -->
<script src="<?= base_url() ?>assets/theme/js/fancybox/source/jquery.fancybox.pack.js"></script>
<script src="<?= base_url() ?>assets/theme/js/fancybox/source/helpers/jquery.fancybox-media.js"></script>
<script src="<?= base_url() ?>assets/theme/js/fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>
<!-- arcticmodal -->
<script src="<?= base_url() ?>assets/theme/js/arcticmodal/jquery.arcticmodal.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/theme/js/main.js"></script>
<script src="<?php echo base_url('assets/theme/js/sweetalert2/sweetalert2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/theme/js/select2/js/select2.js') ?>"></script>
<script src="<?php echo base_url('assets/module/function.js') ?>"></script>
<script src="<?php echo base_url('assets/module/jquery.autocomplete.min.js') ?>"></script>
<?php
if ($this->session->flashdata('alert')) {
    echo $this->session->flashdata('alert');
}
?>
<script>
    $(".select2").select2({
        placeholder: "Masukan Kata Kunci Pencarian",
        theme: "bootstrap",
    });
    
    $(window).load(function() {
        $('.preloader').delay(100).fadeOut(function() {
            $(this).remove()
        });
    });
    window.setTimeout(function() {
        $(".koneksiterhubung").fadeTo(1000, 0).slideUp(1000, function() {
            $(this).remove();
        });
        $(".alert-danger").fadeTo(1000, 0).slideUp(1000, function() {
            $(this).remove();
        });
    }, 3000);
</script>

</html>