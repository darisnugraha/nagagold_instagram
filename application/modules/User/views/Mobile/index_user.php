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
                        <h5 class="mb-0 text-white"><?= $this->session->userdata('nama_customer') ?></h5>
                        <p class="mb-0 text-white"><?= $this->session->userdata('no_hp') ?></p>
                        <p class="mb-0 text-white">Point Saya  : <?= $point ?></p>
                    </div>
                </div>
            </div>
            <!-- User Meta Data-->
            <div class="card user-data-card">
                <div class="card-body">
                    <div class="single-profile-data d-flex align-items-center justify-content-between">
                        <div class="title" style="cursor: pointer;">
                        <a onclick="$('.loaderform').show();" href="<?= base_url('wp-edit-user-profile') ?>">
                            <i class="lni lni-user"></i>
                            <span>Edit Profile</span>
                        </a>
                        </div>
                        <div class="data-content">
                            <a onclick="$('.loaderform').show();" href="<?= base_url('wp-edit-user-profile') ?>">
                                <i class="lni lni-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="single-profile-data d-flex align-items-center justify-content-between">
                        <div class="title" style="cursor: pointer;">
                        <a onclick="$('.loaderform').show();" href="<?= base_url('wp-daftar-alamat') ?>">
                            <i class="lni lni-plus mr-2"></i>
                            <span>Tambah Alamat</span>
                        </a>
                        </div>
                        <div class="data-content">
                            <a onclick="$('.loaderform').show();" href="<?= base_url('wp-daftar-alamat') ?>">
                                <i class="lni lni-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="single-profile-data d-flex align-items-center justify-content-between">
                        <div class="title" style="white-space: nowrap;cursor: pointer;">
                        <a onclick="$('.loaderform').show();" href="<?= base_url('wp-history-transaksi') ?>">
                            <i class="fa fa-truck"></i>
                            <span>History Transaksi Pembelian</span>
                        </a>
                        </div>
                        <div class="data-content">
                            <a onclick="$('.loaderform').show();" href="<?= base_url('wp-history-transaksi') ?>">
                                <i class="lni lni-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="single-profile-data d-flex align-items-center justify-content-between">
                        <div class="title" style="white-space: nowrap;cursor: pointer;">
                        <a onclick="$('.loaderform').show();" href="<?= base_url('wp-history-transaksi-selesai') ?>">
                            <i class="lni lni-eye"></i>
                            <span>History Transaksi</span>
                        </a>
                        </div>
                        <div class="data-content">
                            <a onclick="$('.loaderform').show();" href="<?= base_url('wp-history-transaksi-selesai') ?>">
                                <i class="lni lni-chevron-right"></i></a>
                        </div>
                    </div>
                    <!-- <div class="single-profile-data d-flex align-items-center justify-content-between">
                        <div class="title" style="white-space: nowrap">
                            <i class="lni lni-eye"></i>
                            <span>Status Pengajuan Penjualan</span>
                        </div>
                        <div class="data-content">
                            <a onclick="$('.loaderform').show();" href="<?= base_url('wp-status-pengajuan') ?>">
                                <i class="lni lni-chevron-right"></i></a>
                        </div>
                    </div> -->
                    <!-- <div class="single-profile-data d-flex align-items-center justify-content-between">
                        <div class="title">
                            <i class="lni lni-eye"></i><span>History Penjualan</span>
                        </div>
                        <div class="data-content">
                            <i class="lni lni-chevron-right"></i>
                        </div>
                    </div> -->
                </div>
            </div>
            <br>
            <!-- <div class="card settings-card">
                <div class="card-body">
                    <div class="single-profile-data d-flex align-items-center justify-content-between">
                        <div class="title"><i class="lni lni-support"></i><span>Bantuan</span></div>
                        <div class="data-content"><i class="lni lni-chevron-right"></i></div>
                    </div>
                </div>
            </div> -->
            <div class="card settings-card">
                <div class="card-body">
                    <div class="single-profile-data d-flex align-items-center justify-content-between">
                        <div class="title" style="white-space: nowrap; cursor: pointer;">
                        <a data-toggle="modal" data-target="#modalcekuser">
                            <i class="lni lni-lock"></i><span>Verifikasi No Hp / Email / Ganti Password</span>
                        </a>
                        </div>
                        <div class="data-content">
                            <a data-toggle="modal" data-target="#modalcekuser">
                                <i class="lni lni-chevron-right" style="cursor: pointer;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Profile-->
            <!-- <div class="edit-profile-btn mt-3">
              <a class="btn btn-success w-100" href="<?= base_url('edit-profile') ?>"><i class="lni lni-pencil mr-2"></i>Edit Profile</a>
              <br>
              <br>
              <a class="btn btn-success w-100" href="<?= base_url('tambahalamat') ?>"><i class="lni lni-plus mr-2"></i>Tambah Alamat</a>
            </div> -->

        </div>
    </div>
</div>
<br>
<br>
<br>
<div class="modal fade" id="modalcekuser" tabindex="-1" role="dialog" aria-labelledby="modalcekuserLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalcekuserLabel">Otentifikasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="FormValidasi" action="<?= base_url('otentifikasi') ?>" method="POST">
                <div class="modal-body">
                    <input type="hidden" class="form-control" placeholder="Masukan Email / No Hp">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Konfirmasi Password</label>
                        <input type="password" name="password" class="form-control" required placeholder="Masukan Password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" onclick="FormValidasi()" class="btn btn-primary">Konfirmasi</button>
                </div>
            </form>
        </div>
    </div>
</div>