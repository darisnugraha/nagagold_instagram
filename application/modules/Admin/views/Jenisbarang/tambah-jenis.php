<div class="p-5" id="header-footer-modal">
    <div class="preview">
        <div class="modal" id="header-footer-modal-preview">
            <div class="modal__content">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">
                        Tambah Jenis
                    </h2>
                </div>
                <form action="<?= base_url('simpan-jenis') ?>" method="POST">
                    <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                        <div class="col-span-12">
                            <label>Nama Kategori</label>
                            <select name="kode_kategori" required style="width:100%" class="select2 w-full">
                                <?php foreach ($DataKategori->data  as $kategori) : ?>
                                    <option value="<?= $kategori->kode_kategori ?>"><?= $kategori->nama_kategori ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-span-12">
                            <label>Kode Jenis</label>
                            <input type="text" autocomplete="off" name="kode_jenis" required onkeypress="return event.keyCode != 13;" class="input w-full border mt-2 flex-1" placeholder="Masukan Kode Jenis">
                        </div>
                        <div class="col-span-12">
                            <label>Nama Jenis</label>
                            <input type="text" autocomplete="off" name="nama_jenis" required onkeypress="return event.keyCode != 13;" class="input w-full border mt-2 flex-1" placeholder="Masukan Nama Jenis">
                        </div>
                    </div>
                    <div class="px-5 py-3 text-right border-t border-gray-200">
                        <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">Batal</button>
                        <button type="submit" class="button w-20 bg-theme-1 text-white">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>