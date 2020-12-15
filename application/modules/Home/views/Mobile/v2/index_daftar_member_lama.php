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
          <form id="form-register" action="<?= base_url('simpanregisteruser') ?>" method="POST">
            <div class="form-group text-left mb-4"><span>Nama Lengkap</span>
              <label for="username"><i class="lni lni-user"></i></label>
              <input type="hidden" value="<?= $this->session->userdata('status_form') ?>" name="status_form" class="form-control">
              <input class="form-control nama_customer" value="<?= $this->session->userdata('kode_customer_lama'); ?>" required name="kode_customer" type="hidden" placeholder="Masukan Nama Lengkap">
              <input type="text" value="<?= $this->session->userdata('nama_customer_lama'); ?>" required name="nama_customer" placeholder="Masukan Nama" class="form-control">
            </div>
            <div class="form-group text-left mb-4"><span>No Hp</span>
              <label for="password"><i class="lni lni-phone"></i></label>
              <input type="number" maxlength="15" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?= $this->session->userdata('no_hp_lama'); ?>" required name="no_hp" placeholder="Masukan No Hp" class="form-control no_hp">
            </div>
            <div class="form-group text-left mb-4"><span>Email</span>
              <label for="password"><i class="lni lni-inbox"></i></label>
              <input type="email" value="<?= $this->session->userdata('email_lama'); ?>" required name="email" required placeholder="Masukan Email" class="form-control">
            </div>
            <div class="form-group text-left mb-4"><span>Tanggal Lahir</span>
              <label for="password"><i class="lni lni-timer"></i></label>
              <input type="date" value="<?= $this->session->userdata('tgl_lahir_lama'); ?>" required name="tgl_lahir" required placeholder="Tanggal Lahir" class="form-control">
            </div>
            <div class="form-group text-left mb-4"><span>Pilih Provinsi</span>
              <label for="password"><i class="lni lni-map-marker"></i></label>
              <select id="provinsi" name="provinsi" class="form-control select2" required>
                <option value="">Pilih Provinsi</option>
                <?php $count = count($Provinsi->data);
                $dataprovinsi = $Provinsi->data;
                for ($i = 0; $i < $count; $i++) : ?>
                  <option <?= explode('-', $this->session->userdata('provinsi_lama'))[0]  == $dataprovinsi[$i]->province_id ? 'selected' : '' ?> value="<?= $dataprovinsi[$i]->province_id ?>-<?= $dataprovinsi[$i]->province ?>"> <?= $dataprovinsi[$i]->province ?> </option>
                <?php endfor; ?>
              </select>
            </div>
            <div class="form-group text-left mb-4"><span>Pilih Kota / Kabupaten</span>
              <label for="password"><i class="lni lni-map-marker"></i></label>
              <input type="hidden" id="kota_lama" value="<?= explode('-', $this->session->userdata('kota_lama'))[0] ?>">
              <select id="kota" name="kota" class="form-control select2" required>
                <option value="">Pilih Kota / Kabupaten</option>
              </select>
            </div>
            <div class="form-group text-left mb-4"><span>Pilih Kecamatan</span>
              <label for="password"><i class="lni lni-map-marker"></i></label>
              <input type="hidden" id="kecamatan_lama" required value="<?= explode('-', $this->session->userdata('kecamatan_lama'))[0] ?>">
              <select id="kecamatan" name="kecamatan" class="form-control select2" required>
                <option>Pilih Kecamatan</option>
              </select>
            </div>
            <div class="form-group text-left mb-4">
              <span>Masukan Kode Pos</span>
              <label for="password"><i class="lni lni-map-marker"></i></label>
              <input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?= $this->session->userdata('kode_poss_lama'); ?>" required name="kode_pos" placeholder="Masukan Kode Pos" class="form-control">
            </div>
            <div class="form-group text-left mb-4">
              <span>Masukan Alamat Lengkap</span>
              <label for="password"><i class="lni lni-map-marker"></i></label>
              <textarea required class="form-control" name="alamat1" placeholder="Masukan ALamat Lengkap"><?= $this->session->userdata('alamat1_lama'); ?></textarea>
            </div>
            <div id="pesaneror" class="form-group text-left mb-4">
              <span>Masukan Password</span>
              <label for="password"><i class="lni lni-lock"></i></label>
              <input type="password" class="form-control" id="pass1" name="password" placeholder="Masukan Password" required aria-describedby="helpBlock2">
            </div>
            <div id="pesaneror2" class="form-group text-left mb-4">
              <span>Ulangi Password</span>
              <label for="password"><i class="lni lni-lock"></i></label>
              <input type="password" required id="pass2" class="form-control" required placeholder="Ulangi Password" name="retype_password">
              <span style="display: none" id="password_salah1" class="help-block">Password Tidak Sama</span>
              <span style="display: none" id="password_salah2" class="help-block">Good Job</span>
            </div>
            <button class="btn btn-login btn-lg w-100" onclick="validasiformdaftar();" type="button"><?= $nama_button ?></button>
          </form>
        </div>
        <!-- Login Meta-->
        <div class="login-meta-data"><a onclick="$('.loaderform').show();" class="text-white forgot-password d-block mt-3 mb-1" href="<?= base_url('forgetpassword') ?>">Forgot Password?</a>
          <p class="text-white mb-0">Sudah Punya Akun ?<a onclick="$('.loaderform').show();" class="text-white ml-2" href="<?= base_url('login') ?>">Klik Disini</a></p>
          <p class="text-white mb-0">Aktivasi Member Lama ?<a onclick="$('.loaderform').show();" class="text-white ml-2" href="<?= base_url('formaktifasimemberlama') ?>">Klik Disini</a></p>
        </div>
      </div>
    </div>
  </div>
</div>