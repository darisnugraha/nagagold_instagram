<div class="login-wrapper d-flex align-items-center justify-content-center text-center">
    <!-- Background Shape-->
    <div class="background-shape"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5">
                <a onclick="$('.loaderform').show();" href="<?= base_url() ?>">
                    <img class="big-logo" width="80px"
                        src="<?= base_url('assets/') ?>mobile/v2/img/core-img/logoutama.jpg" alt="">
                </a>
                <!-- Register Form-->
                <div class="register-form mt-5 px-4">
                    <h3><span>Forget Password</span></h3>
                    <form action="<?= base_url('send-new-password') ?>" method="POST">
                        <div class="form-group text-left mb-4"><span>No WhatsApp</span>
                            <label for="username"><i class="lni lni-user"></i></label>
                            <input class="form-control" name="emailornohp" type="number"
                                placeholder="Masukan No WhatsApp">
                        </div>
                        <button class="btn btn-login btn-lg w-100" type="submit">Kirim</button>
                    </form>
                </div>
                <!-- Login Meta--><br>
                <div class="login-meta-data">
                    <p class="text-white mb-0"><a onclick="$('.loaderform').show();" class="text-white ml-2"
                            href="<?= base_url('') ?>">Kembali Ke Halaman Utama</a></p>
                </div>
            </div>
        </div>
    </div>
</div>