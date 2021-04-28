<?php if( $this->session->userdata('otpaktif') == "true"){
  redirect('otentivikasi-daftar');
} ?>
<div class="page-content-wrapper">
    <div class="product-catagories-wrapper pt-3">
        <div class="container">
            <div class="product-catagory-wrap">
                <div class="row">
                    <?php foreach($DataKategori->data  as $kategori ): ?>
                    <div class="col-12">
                        <div class="mb-4">
                        <a onclick="$('.loaderform').show()" href="<?= base_url('carikategori/' . encrypt_url($kategori->kode_kategori) . '/' . encrypt_url($kategori->nama_kategori)) ?>">
                            <img class="card" alt="<?= $kategori->nama_kategori ?>" onerror="this.onerror=null;this.src='<?= base_url('assets/images/slidenotfound.jpg') ?>';" src="<?= $kategori->banner ?>">
						</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>
</div>
<style>
.owl-dots {
    display: none;
}

.owl-nav {
    display: none;
}
</style>

<?= $this->session->flashdata('alertcart') ?>
</div>
<br>
<br>
<br>