<div class="content">
    <?= $this->load->view('Themes/Admin/tollbar') ?>
    <!-- BEGIN: Datatable -->

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Edit Profile
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <div class="text-center">
            </div>
        </div>
    </div>
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <form action="<?= base_url('simpan-profile-perusahaan') ?>" enctype="multipart/form-data" method="POST">
            <?php 
            if($DataPerusahaan->data == null): ?>
                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                    <div class="col-span-12">
                        <label>Kode Perusahaan</label>
                        <input type="text" name="kode_perusahaan" value="<?= $this->session->userdata('kode_perusahaan'); ?>" class="input w-full border mt-2 flex-1" placeholder="Masukan Nama Perusahaan">
                    </div>
                    <div class="col-span-12">
                        <label>Nama Perusahaan</label>
                        <input type="text" onkeypress="return HurufNoEnter(event)" name="nama_perusahaan" value="<?= $this->session->userdata('nama_perusahaan'); ?>" class="input w-full border mt-2 flex-1" placeholder="Masukan Nama Perusahaan">
                    </div>
                    <div class="col-span-12">
                        <label>No Hp</label>
                        <input type="text" onkeypress="return NumberNoEnter(event)" name="no_hp" value="<?= $this->session->userdata('no_hp'); ?>" class="input w-full border mt-2 flex-1" placeholder="Masukan No Hp">
                    </div>
                    <div class="col-span-12">
                        <label>Email</label>
                        <input type="email" name="email" value="<?= $this->session->userdata('email'); ?>" class="input w-full border mt-2 flex-1" placeholder="Email Perusahaan">
                    </div>
                    <div class="col-span-12">
                        <label>Alamat Perusahaan</label>
                        <textarea name="alamat" class="input w-full border mt-2 flex-1" placeholder="Masukan Alamat Lengkap"><?= $this->session->userdata('alamat'); ?></textarea>
                    </div>
                    <div class="col-span-12">
                        <label>Lokasi</label>
                        <textarea name="lokasi" class="input w-full border mt-2 flex-1" placeholder="Masukan Lokasi Google Maps"><?= $this->session->userdata('lokasi'); ?></textarea>
                    </div>
                   <!--  <div class="col-span-12">
                        <label>No Hp</label>
                        <input type="text" name="no_hp" value="<?= $row->no_hp ?>" class="input w-full border mt-2 flex-1" placeholder="Masukan No Hp">
                    </div> -->
                    <div class="col-span-12">
                        <label>Logo</label>
                        <input type="hidden" value="-" name="name_logo" class="input w-full border mt-2 flex-1" placeholder="Masukan No Hp">
                        <input type="file" name="logo" class="input w-full border mt-2 flex-1" placeholder="Masukan No Hp">
                        <small>Kosongkan Jika Tidak Ingin Mengganti Logo</small>
                    </div>
                </div>
            <?php else: ?>
            <?php foreach ($DataPerusahaan->data  as $row) : ?>

                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                    <div class="col-span-12">
                        <label>Nama Perusahaan</label>
                        <input type="hidden" name="kode_perusahaan" value="<?= $row->kode_perusahaan ?>" class="input w-full border mt-2 flex-1" placeholder="Masukan Nama Perusahaan">
                        <input type="text" onkeypress="return HurufNoEnter(event)" name="nama_perusahaan" value="<?= $row->nama_perusahaan ?>" class="input w-full border mt-2 flex-1" placeholder="Masukan Nama Perusahaan">
                    </div>
                    <div class="col-span-12">
                        <label>No Hp</label>
                        <input type="text" onkeypress="return NumberNoEnter(event)" name="no_hp" value="<?= $row->no_hp ?>" class="input w-full border mt-2 flex-1" placeholder="Masukan No Hp">
                    </div>
                    <div class="col-span-12">
                        <label>Email</label>
                        <input type="email" name="email" value="<?= $row->email ?>" class="input w-full border mt-2 flex-1" placeholder="Email Perusahaan">
                    </div>
                    <div class="col-span-12">
                        <label>Alamat Perusahaan</label>
                        <textarea name="alamat" class="input w-full border mt-2 flex-1" placeholder="Masukan Alamat Lengkap"><?= $row->alamat ?></textarea>
                    </div>
                    <div class="col-span-12">
                        <label>Lokasi</label>
                        <textarea name="lokasi" class="input w-full border mt-2 flex-1" placeholder="Masukan Lokasi Google Maps"><?= $row->lokasi ?></textarea>
                    </div>
                   <!--  <div class="col-span-12">
                        <label>No Hp</label>
                        <input type="text" name="no_hp" value="<?= $row->no_hp ?>" class="input w-full border mt-2 flex-1" placeholder="Masukan No Hp">
                    </div> -->
                    <div class="col-span-12">
                        <label>Logo</label>
                        <input type="hidden" value="<?= $row->logo ?>" name="name_logo" class="input w-full border mt-2 flex-1" placeholder="Masukan No Hp">
                        <input type="file" name="logo" class="input w-full border mt-2 flex-1" placeholder="Masukan No Hp">
                        <small>Kosongkan Jika Tidak Ingin Mengganti Logo</small>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php endif; ?>
            <div class="px-5 py-3 text-right border-t border-gray-200">
                <!-- <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">Batal</button> -->
                <button type="submit" class="button w-20 bg-theme-1 w-full text-white">Simpan Perusahaan</button>
            </div>
        </form>
    </div>
</div>