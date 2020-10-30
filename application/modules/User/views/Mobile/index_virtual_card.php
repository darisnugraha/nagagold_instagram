<script src="https://cdnjs.cloudflare.com/ajax/libs/jsbarcode/3.8.0/JsBarcode.all.js"></script>
<div class="page-content-wrapper">
    <div class="container">
        <!-- Profile Wrapper-->
        <div class="profile-wrapper-area py-3">
            <!-- User Information-->
            <div class="card user-info-card">
                <div class="card-body p-4 d-flex align-items-center">
                    <div class="user-profile mr-3">
                        <?php $nama = substr($this->session->userdata('nama_customer'),0,1) ?>
                        <div class="lingkaran">
                            <?= strtoupper($nama)?>
                        </div>
                    </div>
                    <div class="user-info">
                      <h5 class="mb-0 text-white"><?= $this->session->userdata('nama_customer') ?>&nbsp;<?= $this->session->userdata('nama_belakang') ?></h5>
                      <p class="mb-0 text-white"><?= $this->session->userdata('no_hp') ?></p>
                    </div>
                </div>
            </div>
            <!-- User Meta Data-->
            <div class="card user-data-card">
                <div class="card-body"  align="center">
                    <img id="barcode" class="barcode">
                </div>
            </div>
            <!-- Edit Profile-->
           
        </div>
    </div>
</div>
<script>
  $("#barcode").JsBarcode("<?= $this->session->userdata('kode_customer') ?>",{width: 3, height: 200});
</script>