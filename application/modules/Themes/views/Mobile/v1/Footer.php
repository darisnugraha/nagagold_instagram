  
        <?php if($this->session->userdata('status_login')=="SEDANG_LOGIN"):?>
        <div class="footer">
            <div class="no-gutters">
                <div class="col-auto mx-auto">
                    <div class="row no-gutters justify-content-center">
                        <div class="col-auto">
                            <a href="index.html" class="btn btn-link-default">
                                <i class="material-icons">home</i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="statistics.html" class="btn btn-link-default">
                                <i class="material-icons">storefront</i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('cart') ?>" class="btn btn-default shadow centerbutton">
                                <i class="material-icons">local_mall</i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="favorite-products.html" class="btn btn-link-default">
                                <i class="material-icons">favorite</i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="<?= base_url('wp-dashboard-user') ?>" class="btn btn-link-default">
                                <i class="material-icons">account_circle</i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
            <div class="footer">
            <div class="no-gutters">
                <div class="col-auto mx-auto">
                    <div class="row no-gutters justify-content-center">
                        <div class="col-auto">
                            <a onclick="Swal.fire('Tidak Bisa Masuk','Anda Harus Login Dulu','info')" class="btn btn-link-default active">
                                <i class="material-icons">store_mall_directory</i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a onclick="Swal.fire('Tidak Bisa Masuk','Anda Harus Login Dulu','info')" class="btn btn-link-default">
                                <i class="material-icons">storefront</i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a  onclick="Swal.fire('Tidak Bisa Masuk','Anda Harus Login Dulu','info')" class="btn btn-default shadow centerbutton">
                                <i class="material-icons">local_mall</i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a onclick="Swal.fire('Tidak Bisa Masuk','Anda Harus Login Dulu','info')" class="btn btn-link-default">
                                <i class="material-icons">favorite</i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a  onclick="Swal.fire('Tidak Bisa Masuk','Anda Harus Login Dulu','info')" class="btn btn-link-default">
                                <i class="material-icons">account_circle</i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    
    <!-- notification -->
   
    <!-- notification ends -->
    <script src="<?= base_url('assets/mobile/') ?>js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url('assets/mobile/') ?>js/popper.min.js"></script>     
    <script src="<?= base_url('assets/mobile/') ?>vendor/bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/mobile/') ?>vendor/cookie/jquery.cookie.js"></script>
    <script src="<?= base_url('assets/mobile/') ?>vendor/swiper/js/swiper.min.js"></script>
    <script src="<?= base_url('assets/mobile/') ?>js/main.js"></script>
    <script src="<?php echo base_url('assets/theme/js/sweetalert2/sweetalert2.min.js') ?>"></script>
    <?php if ($this->session->flashdata('alert')) { echo $this->session->flashdata('alert');}?>
    <script>
        var mySwiper = new Swiper('.swiper-container', {
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            }
        });
    $(window).on('load', function(){
        $('.loader-screen').delay(1000).fadeOut(function(){$(this).remove()});
    });
    </script>

</body>
</html>
