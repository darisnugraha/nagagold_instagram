<div class="content">
    <?= $this->load->view('Themes/Admin/tollbar') ?>
    <!-- BEGIN: Datatable -->

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Form Kirim Pesan Ke Customer
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <div class="text-center">
            </div>
        </div>
    </div>
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <form action="<?= base_url('kirimnotif') ?>" method="POST" enctype="multipart/form-data">
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <div class="col-span-12">
                            <label>Judul Notifikasi *</label>
                            <input type="text" required name="title" value="" class="input w-full border mt-2 flex-1" placeholder="Masukan Judul Notifikasi">
                        </div>
                <div class="col-span-12">
                    <label>Pesan *</label>
                    <textarea name="body" required class="input w-full border mt-2 flex-1" placeholder="Masukan Pesan"></textarea>
                </div>
                <div class="col-span-12">
                    <label>Gambar</label>
                    <input type="file" name="image" class="input w-full border mt-2 flex-1" placeholder="Email Perusahaan">
                </div>
               
            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200">
                <!-- <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">Batal</button> -->
                <button type="submit" class="button w-20 bg-theme-1 w-full text-white">Kirim Sekarang</button>
            </div>
        </form>
    </div>
</div>

