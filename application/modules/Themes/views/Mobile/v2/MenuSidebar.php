<div class="suha-sidenav-wrapper" id="sidenavWrapper">
  <!-- Sidenav Profile-->
  <div class="sidenav-profile">
    <div class="user-profile">
      <?php $nama = substr($this->session->userdata('nama_customer'), 0, 1) ?>
      <div class="lingkaran">
        <?= strtoupper($nama) ?>
      </div>
    </div><br>
    <div class="user-info">
      <h6 class="user-name mb-0"><?= $this->session->userdata('nama_customer'); ?></h6>
      <!-- <p class="available-balance">Point <span>$<span class="counter">523.98</span></span></p> -->
    </div>
  </div>
  <!-- Sidenav Nav-->
  <ul class="sidenav-nav">
    <li><a onclick="$('.loaderform').show();" href="<?= base_url('wp-dashboard-user') ?>"><i class="lni lni-user"></i>My Profile</a></li>
    <li><a onclick="$('.loaderform').show();" href="<?= base_url('virtual-card') ?>"><i class="lni lni-empty-file"></i>Virtual Card</a></li>
    <!-- <li><a onclick="$('.loaderform').show();" href="#"><i class="lni lni-credit-cards"></i>Voucher</a></li> -->
    <li><a onclick="$('.loaderform').show();" href="<?= base_url('konfirmasipembayaran/1') ?>"><i class="lni lni-empty-file"></i>Konfirmasi Pembayaran</a></li>
    <li><a onclick="$('.loaderform').show();" href="<?= base_url('estimasi-harga-penjualan') ?>"><i class="lni lni-empty-file"></i>Estimasi Harga Penjualan</a></li>
    <!-- <li><a onclick="$('.loaderform').show();" href="#"><i class="lni lni-support"></i>Bantuan</a></li> -->
    <!-- <li><a onclick="$('.loaderform').show();" href="<?= base_url('games') ?>"><i class="lni lni-support"></i>Games</a></li> -->
    <li><a onclick="$('.loaderform').show();" href="<?= base_url('logout') ?>"><i class="lni lni-power-switch"></i>Sign Out</a></li>
  </ul>
  <!-- Go Back Button-->
  <div class="go-home-btn" id="goHomeBtn"><i class="lni lni-arrow-left"></i></div>
</div>