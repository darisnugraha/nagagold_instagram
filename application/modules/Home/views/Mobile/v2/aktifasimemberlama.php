<!-- Login Wrapper Area-->
<div class="login-wrapper d-flex align-items-center justify-content-center text-center">
  <!-- Background Shape-->
  <div class="background-shape"></div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5"><img class="big-logo" width="80px" src="<?= base_url('assets/') ?>mobile/v2/img/core-img/logoutama.jpg" alt="">
        <!-- Register Form-->
        <div class="register-form mt-5 px-4">
          <form action="<?= base_url('cekmemberlama') ?>" id="form-aktifasi-memberlama" method="POST">
            <div class="form-group text-left mb-4"><span>Kode Member</span>
              <label for="username"><i class="lni lni-user"></i></label>
              <input class="form-control" name="kode_customer" required type="text" placeholder="Masaukan Kode Member">
            </div>
            <button class="btn btn-login btn-lg w-100" onclick="validasimemberlama();" type="button">Aktifasi Sekarang</button>
          </form>
        </div>
        <!-- Login Meta-->
        <div class="login-meta-data"><a onclick="$('.loaderform').show();" class="text-white forgot-password d-block mt-3 mb-1" href="<?= base_url('forgetpassword') ?>">Forgot Password?</a>
          <p class="text-white mb-0">Belum Punya Akun ?<a onclick="$('.loaderform').show();" class="text-white ml-2" href="<?= base_url('wp-daftar-member') ?>">Klik Disini</a></p>
          <p class="text-white mb-0">Sudah Punya Akun ?<a onclick="$('.loaderform').show();" class="text-white ml-2" href="<?= base_url('login') ?>">Klik Disini</a></p>
        </div>
      </div>
    </div>
  </div>
</div>