<!-- Login Wrapper Area-->
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
          <form action="<?= base_url('ceklogin') ?>" id="form-login" method="POST">
            <div class="form-group text-left mb-4"><span>Username</span>
              <label for="username"><i class="lni lni-user"></i></label>
              <input class="form-control" name="no_hp_or_email" required autocomplete="off" type="text" placeholder="Nomer Hp / Email">
            </div>
            <div class="form-group text-left mb-4"><span>Password</span>
              <label for="password"><i class="lni lni-lock"></i></label>
              <input class="form-control" name="password" required type="password" placeholder="********************">
            </div>

            <button class="btn btn-login btn-lg w-100" onclick="validasiformlogin();" type="button">Login</button>
          </form>
        </div>
        <!-- Login Meta-->
        <br>
        <?php
        if ($this->session->flashdata('status_resend_email') == "Resend") : ?>
          <p class="text-white mb-0">Resend Email ?<a onclick="$('.loaderform').show();" class="text-white ml-2" href="<?= base_url('resend-email/' . encrypt_url($this->session->userdata('email_resend'))) ?>">Klik Disini</a></p>
        <?php else : ?>
        <?php endif; ?>
        <div class="login-meta-data"><a onclick="$('.loaderform').show();" class="text-white forgot-password d-block mt-3 mb-1" href="<?= base_url('forgetpassword') ?>">Forgot Password?</a>
          <p class="text-white mb-0">Belum Punya Akun ?<a onclick="$('.loaderform').show();" class="text-white ml-2" href="<?= base_url('wp-daftar-member') ?>">Klik Disini</a></p>
          <p class="text-white mb-0">Aktifasi Member Lama ?<a onclick="$('.loaderform').show();" class="text-white ml-2" href="<?= base_url('formaktifasimemberlama') ?>">Klik Disini</a></p>
        </div>
      </div>
    </div>
  </div>
</div>