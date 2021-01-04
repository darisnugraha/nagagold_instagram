<div class="page-content-wrapper">
  <div class="container">
    <!-- Profile Wrapper-->
    <div class="profile-wrapper-area py-3">
      <!-- User Information-->
      <div class="card user-info-card">
        <div class="card-body p-4 d-flex align-items-center">
          <div class="user-profile mr-3">
            <?php $nama = substr($this->session->userdata('nama_customer'), 0, 1) ?>
            <div class="lingkaran">
              <?= strtoupper($nama) ?>
            </div>
          </div>
          <div class="user-info">
            <p class="mb-0 text-white"><?= $this->session->userdata('nama_customer') ?></p>
            <p class="mb-0 text-white"><?= $this->session->userdata('no_hp') ?></p>
          </div>
        </div>
      </div>
      <!-- User Meta Data-->

      <div class="card user-data-card">
        <div class="card-body">

          <form id="FormValidasi" autocomplete="off" action="<?= base_url('update-myacount') ?>" method="POST">
            <div class="form-group">
              <div class="title mb-2"><i class="lni lni-user"></i><span>No KTP</span></div>
              <input class="form-control" onkeypress="return NumberNoEnter(event)" placeholder="Masukan No Ktp" name="no_ktp" type="number" required value="<?= $this->session->userdata('no_ktp') ?>">
            </div>
            <div class="form-group">
              <div class="title mb-2"><i class="lni lni-user"></i><span>Nama Customer</span></div>
              <input class="form-control" onkeypress="return HurufNoEnter(event)" placeholder="Masukan Nama Depan" name="nama_customer" required type="text" value="<?= $this->session->userdata('nama_customer') ?>">
            </div>

            <div class="form-group">
              <div class="title mb-2"><i class="lni lni-timer"></i><span>Tanggal Lahir</span></div>
              <input class="form-control" name="tgl_lahir" type="text" id="date-group1-2" value="<?= $this->session->userdata('tgl_lahir') ?>">
            </div>
            <!-- <div class="form-group">
                  <div class="title mb-2"><i class="lni lni-phone"></i><span>No Hp</span></div>
                  <input value="<?= $this->session->userdata('no_hp') ?>" name="no_hp_old" type="hidden">
                  <input value="<?= $this->session->userdata('no_hp') ?>" name="no_hp" placeholder="Masukan Nomer HP" class="form-control here" type="number">
                </div> -->
            <div class="form-group">
              <input value="<?= $this->session->userdata('email') ?>" name="email_old" type="hidden">
              <div class="title mb-2"><i class="lni lni-envelope"></i><span>Email Address</span></div>
              <input class="form-control" readonly type="email" value="<?= $this->session->userdata('email') ?>">
            </div>
            <!-- <div class="form-group">
              <div class="title mb-2"><i class="lni lni-key"></i><span>Password Lama</span></div>
              <input class="form-control" name="pass_key" type="password" placeholder="Maasukan Password Lama">
              <small class="form-text text-muted">Kosongkan Jika Tidak Ingin Mengganti  Passsword.</small>
            </div> -->
            <div class="form-group">
              <div class="title mb-2"><i class="lni lni-key"></i><span>Password Baru</span></div>
              <input class="form-control" name="pass_key" type="password" placeholder="Maasukan Password">
              <small class="form-text text-muted">Kosongkan Jika Tidak Ingin Mengganti Passsword.</small>
            </div>
            <div class="form-group">
              <div class="title mb-2"><i class="lni lni-key"></i><span>Rytepe Password Baru</span></div>
              <input class="form-control" name="pass_key" type="password" placeholder="Rytepe Password Baru">
              <!-- <small class="form-text text-muted">Kosongkan Jika Tidak Ingin Mengganti Passsword.</small> -->
            </div>
            <button onclick="FormValidasi();" class="btn btn-success w-100" type="submit">Simpan Perubahan</button>
          </form>


        </div>
      </div>
    </div>
  </div>
</div>
<br>
<br>
<br>