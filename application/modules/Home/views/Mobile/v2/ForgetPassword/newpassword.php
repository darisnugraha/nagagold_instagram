<div class="login-wrapper d-flex align-items-center justify-content-center text-center">
    <!-- Background Shape-->
    <div class="background-shape"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5">
                <a onclick="$('.loaderform').show();" href="<?= base_url() ?>">
                    <img class="big-logo" width="80px" src="<?= base_url('assets/') ?>mobile/v2/img/core-img/logoutama.jpg" alt="">
                </a>
                <!-- Register Form-->
                <div class="register-form mt-5 px-4">
                    <h3><span>New Passsword</span></h3>
                    <form action="<?= base_url('save-password-baru') ?>" method="POST">
                        <div class="form-group text-left mb-4"><span>Password</span>
                            <label for="username"><i class="lni lni-user"></i></label>
                            <input class="form-control" name="password" id="pass1" type="password" placeholder="Masukan Password">
                        </div>
                        <div class="form-group text-left mb-4"><span>Ulangi Password</span>
                            <label for="username"><i class="lni lni-user"></i></label>
                            <input class="form-control" name="retype_password" id="pass2" type="password" placeholder="Ulangi Password">
                        </div>
                        <span style="display: none" id="password_salah1" class="help-block">Password Tidak Sama</span>
                        <span style="display: none" id="password_salah2" class="help-block">Good Job</span>
                        <button class="btn btn-login btn-lg w-100" type="submit">Kirim</button>
                    </form>
                </div>
                <!-- Login Meta--><br>
            </div>
        </div>
    </div>
</div>