<div class="page-content-wrapper">
    <div class="container">
        <!-- Profile Wrapper-->
        <div class="profile-wrapper-area py-3">
            <!-- User Information-->
            <div class="card user-info-card">
                <div class="card-body p-4 d-flex align-items-center">
                    <div class="user-profile mr-3">
                        <?php $nama = substr($this->session->userdata('nama_user'), 0, 1) ?>
                        <div class="lingkaran">
                            <?= strtoupper($nama) ?>
                        </div>
                    </div>
                    <div class="user-info">
                        <h5 class="mb-0 text-white"><?= $this->session->userdata('nama_user') ?></h5>
                    </div>
                </div>
            </div>
            <!-- User Meta Data-->
            <div class="card user-data-card">
                <form method="POST" action="<?= base_url('gantipasswordusertoko') ?>" id="formValidasiPenjualan">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="title mb-2"><i class="lni lni-user"></i><span>User Id</span>
                            <input class="form-control" readonly required onkeypress="return event.keyCode!=13" placeholder="Masukan User Id" name="nama_customer" required type="text" value="<?= $this->session->userdata('nama_user') ?>">
                        </div>
                        <div class="form-group">
                            <div class="title mb-2"><i class="lni lni-key"></i><span>Password</span></div>
                            <input class="form-control" onkeypress="return event.keyCode!=13" placeholder="Masukan Password Lama" name="password" required type="password" value="">
                        </div>
                        <div class="form-group">
                            <div class="title mb-2"><i class="lni lni-key"></i><span>Password Baru</span></div>
                            <input class="form-control" onkeypress="return event.keyCode!=13" placeholder="Masukan Password Baru" name="new_password" required type="password" value="">
                        </div>
                        <div class="form-group">
                            <div class="title mb-2"><i class="lni lni-key"></i><span>Retype-Password</span></div>
                            <input class="form-control" onkeypress="return event.keyCode!=13" placeholder="Ulangi Passwsord" name="retype_password" required type="password" value="">
                        </div>
                    </div>
                    <button class="btn btn-success w-100" type="submit">Simpan Perubahan</button>
                </form>
            </div>

        </div>
    </div>
</div>
<br>
<br>
<br>
