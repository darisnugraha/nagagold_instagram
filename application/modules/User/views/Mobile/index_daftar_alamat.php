<br>
<br>
<div class="container">
    <!-- Checkout Wrapper-->
    <form action="<?= base_url('save-checkout') ?>" method="POST">
        <div class="checkout-wrapper-area py-3">
            <!-- Billing Address-->

            <!-- Shipping Method Choose-->
            <div class="shipping-method-choose mb-4">
                <div class="card shipping-method-choose-title-card bg-success">
                    <div class="card-body">
                        <h6 class="text-center mb-0 text-white">Daftar Alamat </h6>
                    </div>
                </div>
                <div class="card shipping-method-choose-card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ALamat Lengkap</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($DaftarALamat->data  as $daftaralamat) : ?>
                                    <tr>
                                        <td><input <?= $daftaralamat->status_default == 1 ? 'checked' : '' ?> onclick="konfirmasigantialamat('<?= base_url('wp-ganti-alamat/' . $daftaralamat->_id); ?>')" id="<?= $daftaralamat->_id ?>" name="id_alamat" type="radio"></td>
                                        <td>
                                            <?= $daftaralamat->alamat_lengkap ?>
                                            Kec.<?= $daftaralamat->nama_kecamatan ?>
                                            <?= $daftaralamat->nama_kota ?>
                                            <?= $daftaralamat->nama_provinsi ?>
                                        </td>
                                        <td width="10%"><button onclick="hapusconfirm('<?= base_url('wp-hapus-alamat/' . $daftaralamat->_id); ?>')" type="button" class='btn btn-sm btn-danger'>Hapus</button></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="shipping-method-choose mb-4">
                <div class="card shipping-method-choose-card">

                    <div class="card-body">
                        <button type="button" class="btn btn-success w-100" class="pointer" data-toggle="modal" data-target="#tambahalamat">Tambah
                            Alamat</button>
                    </div>
                </div>
            </div>
    </form>
</div>
<br>
<br>
<?= $this->load->view('User/DaftarAlamat/tambahalamat') ?>