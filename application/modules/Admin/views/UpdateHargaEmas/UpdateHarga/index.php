<div class="content">
    <?= $this->load->view('Themes/Admin/tollbar') ?>
    <!-- BEGIN: Datatable -->
    <form action="<?= base_url('cari-kode-kelompok') ?>" method="POST">
        <div class="intro-y datatable-wrapper box p-5 mt-5">
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <div class="col-span-12">
                    <label>Pilih Kagetegori Barang</label>
                </div>
                <div class="col-span-10">
                    <select name="kode_kelompok" style="width:100%" class="select2 w-full input w-full border mt-2 flex-1">
                        <?php foreach ($DataKelompok->data  as $kelompok) : ?>
                            <option <?= $kode=== $kelompok->kode_kelompok ? 'selected' : '' ?> value="<?= $kelompok->kode_kelompok ?>"><?= $kelompok->nama_kelompok ?></option>
                        <?php endforeach; ?>
                    </select>
                    <!-- <input type="text" name="kode_barcode" class="input w-full border mt-2 flex-1" placeholder="Masukan Kata Pencarian"> -->
                </div>
                <div class="col-span-2">
                    <input type="submit" value="Cari Barang" class="button bg-theme-1 text-white input w-full border">
                </div>
            </div>
        </div>
    </form>
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Update Harga Emas
        </h2>
    </div>
    <div class="intro-y datatable-wrapper box p-5 mt-5">
    <form action="<?= base_url('simpan-update-emas') ?>" method="POST">

        <input type="hidden" value="<?= $kode ?>" name="kode_kelompok">
        <table class="table table-report table-report--bordered display datatable w-full">
            <thead>
                <tr>
                    <th class="border-b-2 whitespace-no-wrap">No</th>
                    <th class="border-b-2 whitespace-no-wrap">Kode Kelompok</th>
                    <th class="border-b-2 whitespace-no-wrap">Kode Jenis</th>
                    <th class="border-b-2 whitespace-no-wrap">Nama Jenis</th>
                    <th class="border-b-2 whitespace-no-wrap">Harga</th>
                </tr>
            </thead>
            <tbody>
            <?php $no=1; foreach($data->data  as $row ): ?>
                <tr>
                    <td>
                        <?= $no++  ?>
                    </td>
                    <td>
                        <?= $row->kode_kelompok ?>
                    </td>
                    <td>
                        <?= $row->kode_jenis ?>
                    </td>
                    <td>
                        <?= $row->nama_jenis ?>
                    </td>
                    <td>
                       <input type="hidden" name="kode_jenis[]" class="form-control" value="<?= $row->kode_jenis ?>">
                       <input type="text" autocomplete="off" required name="harga[]"class="form-control rupiah" value="<?= number_format($row->harga) ?>">
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <br>
        <br>
        <?php if($kode!=null) : ?>
        <button type="submit" class="button w-full bg-theme-1 text-white btn-block"> Update Harga </button>
        <?php endif; ?>
        </form>
    </div>
</div>

