<!-- Login Wrapper Area-->
<div class="login-wrapper d-flex align-items-center justify-content-center text-center">
  <!-- Background Shape-->
  <div class="background-shape"></div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5">
        <a onclick="$('.loaderform').show();" href="<?= base_url() ?>">
          <img class="big-logo" width="80px" src="<?= base_url('assets/') ?>icon/logo_adm.jpg" alt="">
        </a>
        <!-- Register Form-->
        <div class="register-form mt-5 px-4">
          <form action="<?= base_url('cekloginadmintoko') ?>" id="form-login" method="POST">
          <?= $this->session->flashdata('Pesan') ?>
            <div class="form-group text-left mb-4"><span>User Id</span>
              <label for="username"><i class="lni lni-user"></i></label>
              <input class="form-control" name="user_id" required autocomplete="off" type="text" placeholder="User Id">
            </div>
            <div class="form-group text-left mb-4"><span>Password</span>
              <label for="password"><i class="lni lni-lock"></i></label>
              <input class="form-control" name="pass_key" required type="password" placeholder="********************">
            </div>

            <button class="btn btn-login btn-lg w-100" onclick="validasiformlogin();" type="button">Login</button>
          </form>
        </div>
        <!-- Login Meta-->
        <br>
      </div>
    </div>
  </div>
</div>