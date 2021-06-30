<div class="content">
    <?= $this->load->view('Themes/Admin/tollbar') ?>
    <!-- BEGIN: Datatable -->

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Proses Penjualan
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <div class="text-center">
                <!-- <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview" class="button inline-block bg-theme-1 text-white">Tambah Jenis</a>  -->
            </div>
        </div>
    </div>
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <form action="<?= base_url('cari-no-transaksi-proses-penjualan') ?>" method="POST">
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <div class="col-span-12">
                    <label>Cari No Transaksi</label>
                </div>
                <div class="col-span-8">
                    <input type="text" name="no_transaksi" class=" input w-full border " placeholder=" Masukan No Transaksi">
                </div>
                <div class="col-span-4">
                    <input type="submit" value="Cari No Transaksi" class="button bg-theme-1 text-white input w-full border">
                </div>
            </div>
        </form>
    </div>
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display datatable w-full">
            <thead>
                <tr>
                    <th class="border-b-2 whitespace-no-wrap">No</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">No Transaksi</th>
                    <th class="border-b-2 text-left whitespace-no-wrap">Nama Customer</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Tipe Pengambilan</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Total Beli</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($DataTransaksi->data as $row) : ?>
                    <tr>
                        <td class="border-b-2 whitespace-no-wrap"><?= $no++ ?></td>
                        <td class="border-b-2 text-center whitespace-no-wrap"><?= strtoupper($row->id_trx) ?></td>
                        <td class="border-b-2 text-left whitespace-no-wrap"><?= $row->nama_customer ?></td>
                        <td class="border-b-2 text-center whitespace-no-wrap">
                            <?php if ($row->type_trx == "AMBIL") : ?>
                                Ambil Ditoko
                            <?php else : ?>
                                Di kirim dengan kurir :<br>
                                <?= $row->jenis_courier ?> - <?= number_format($row->ongkir) ?>
                            <?php endif; ?>
                        </td>
                        <td class="border-b-2 text-center whitespace-no-wrap"><?= number_format($row->total_harga) ?></td>
                        <td class="border-b-2 text-center whitespace-no-wrap">
                            <div class="flex sm:justify-center items-center">
                                <a class="flex items-center mr-3 pointer" href="<?= base_url('detail-proses-penjualan/' . $row->id_trx . '') ?>"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Lihat </a>
                            </div>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>