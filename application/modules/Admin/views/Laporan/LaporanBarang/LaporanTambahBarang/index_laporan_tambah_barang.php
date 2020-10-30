<div class="content">
    <?= $this->load->view('Themes/Admin/tollbar') ?>
    <!-- BEGIN: Datatable -->
<!-- 
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Laporan Tambah Barang
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <div class="text-center">
            </div>
        </div>
    </div> -->
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <form action="<?= base_url('export-laporan-tambah-barang') ?>" target="_blank" method="POST">
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">

                <div class="col-span-4">
                    <label>Tanggal Awal</label>
                    <div class="relative mt-2">
                        <input required type="date" autocomplete="off" name="tgl_awal" class="input pr-12 w-full border col-span-4" placeholder="Point">
                    </div>
                </div>
                <div class="col-span-4">
                    <label>Tanggal Akhir</label>
                    <div class="relative mt-2">
                        <input type="date" required autocomplete="off" name="tgl_akhir" class="input pr-12 w-full border col-span-4" placeholder="Point">
                    </div>
                </div>
                <!-- <div class="col-span-4">
                    <label>Limit</label>
                    <div class="relative mt-2">
                        <input type="number" required autocomplete="off" name="limit" value="10" class="input pr-12 w-full border col-span-4" placeholder="Limit Laporan">
                    </div>
                </div> -->
                <div class="col-span-4">
                    <label>Pilih Export</label>
                    <div class="relative mt-2">
                        <select required class="select2 w-full" name="type">
                            <option value="PDF"> PDF </option>
                            <option value="EXEL"> Exel </option>
                        </select>
                    </div>
                </div>

                <div class="col-span-12">
                    <label>&nbsp;</label>
                    <div class="relative mt-2">
                        <input type="submit" value="Print" class="button bg-theme-1 text-white input w-full border">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>