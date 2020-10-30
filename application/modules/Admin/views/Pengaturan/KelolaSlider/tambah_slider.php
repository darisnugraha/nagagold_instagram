<div class="p-5" id="header-footer-modal">
    <div class="preview">
        <div class="modal" id="tambah_slider">
            <div class="modal__content">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">
                        Tambah Slider
                    </h2>
                </div>
                <form action="<?= base_url('simpan-slider') ?>" enctype="multipart/form-data" method="POST">
                    <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                        <div class="col-span-12">
                        <label>Ukuran File 1280px x 810px</label>
                            <img width="570" height="250" id="output1" class="viewimages" src="<?= base_url('assets/images/slidenotfound.jpg') ?>">
                        </div>
                        <div class="col-span-12">
                            <!-- <label>Foto Slider</label> -->
                            <input type="file" onchange="document.getElementById('output1').src = window.URL.createObjectURL(this.files[0])" type="file" name="photo" class="input w-full border mt-2 flex-1" placeholder="Masukan Nama Jenis">
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