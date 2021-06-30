<html>

<head>
    <title>Print Invoice</title>
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>css/app.css?=1.0" />
    <script src="<?= base_url('assets/mobile/v2/js/') ?>jquery.min.js"></script>
</head>
<style>
    html {
        background: #ffffff !important;

    }
</style>

<body>
    <div>
        <!-- BEGIN: Top Bar -->
        <?php foreach ($DetailTransaksi->data as $row) : ?>
            <div class="intro-y box overflow-hidden mt-5">
                <div class="flex flex-col lg:flex-row pt-10 px-5 sm:px-20 sm:pt-20 lg:pb-5 text-center sm:text-left">
                    <div class="font-semibold text-theme-1 text-3xl">INVOICE</div>
                    <!-- <div class="mt-20 lg:mt-0 lg:ml-auto lg:text-right">
                    <div class="text-xl text-theme-1 font-medium"><?= $row->id_trx ?></div>
                    <div class="mt-1">left4code@gmail.com</div>
                    <div class="mt-1">8023 Amerige Street Harriman, NY 10926.</div>
                </div> -->
                </div>
                <div class="flex flex-col lg:flex-row border-b px-5 sm:px-20 pt-10 pb-10 sm:pb-5 text-center sm:text-left">
                    <div>
                        <div class="text-base text-gray-600">Informasi Pembeli</div>
                        <div class="text-lg font-medium text-theme-1 mt-2"><?= $row->nama_customer ?></div>
                        <div class="mt-1"><?= $row->email ?></div>
                        <div class="mt-1">
                        <?php  if($row->type_trx=="AMBIL"): ?>
                                <?php  foreach ($row->alamat  as $alamat) : ?>
                                    <?php  if($alamat->status_default==1): ?>
                                        <?= $alamat->alamat_lengkap ?>,<br>
                                        <?= $alamat->nama_kecamatan ?>,
                                        <?= $alamat->nama_kota ?>,
                                        <?= $alamat->nama_provinsi ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <?php  foreach ($row->alamat_penerima  as $alamat) : ?>
                                    <?= $alamat->alamat_lengkap ?>,<br>
                                    <?= $alamat->nama_kecamatan ?>,
                                    <?= $alamat->nama_kota ?>,
                                    <?= $alamat->nama_provinsi ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="mt-10 lg:mt-0 lg:ml-auto lg:text-right">
                        <div class="text-base text-gray-600">Nomor Transaksi</div>
                        <div class="text-lg text-theme-1 font-medium mt-2">#<?= $row->id_trx ?></div>
                        <!-- <div class="mt-1">Jan 02, 2021</div> -->
                    </div>
                </div>
                <div class="px-6 sm:px-16 py-10 sm:py-20">
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="border-b-2 whitespace-no-wrap">BARCODE</th>
                                    <th class="border-b-2 whitespace-no-wrap">NAMA BARANG</th>
                                    <th class="border-b-2 text-right whitespace-no-wrap">QTY</th>
                                    <th class="border-b-2 text-right whitespace-no-wrap">HARGA</th>
                                    <th class="border-b-2 text-right whitespace-no-wrap">ONGKOS</th>
                                    <th class="border-b-2 text-right whitespace-no-wrap">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total_harga = 0;
                                foreach ($row->detail_barang  as $detailbarang) :
                                    $total_harga += $detailbarang->harga;
                                    $grandtotal = $total_harga + $row->ongkir;
                                ?>
                                    <tr>
                                        <td class="border-b">
                                            <div class="font-medium whitespace-no-wrap"><?= $detailbarang->kode_barcode ?></div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap"></div>
                                        </td>
                                        <td class="border-b">
                                            <div class="font-medium whitespace-no-wrap"><?= $detailbarang->nama_barang ?></div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap"></div>
                                        </td>
                                        <td class="text-right border-b w-16">1</td>
                                        <td class="text-right border-b w-32"><?= number_format($detailbarang->harga) ?></td>
                                        <td class="text-right border-b w-32"><?= number_format($detailbarang->ongkos) ?></td>
                                        <td class="text-right border-b w-32 font-medium"><?= number_format($detailbarang->harga) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <?php if ($row->type_trx == "AMBIL") : ?>
                                <tr>
                                    <td colspan="4">Grand Total : </td>
                                    <td class="text-right  w-32 font-medium">
                                        <div class="grandtotal"><?= number_format( $grandtotal) ?></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"> Barang Di Ambil Di Toko </td>
                                </tr>
                                <tr>
                                    <td colspan="3"> Toko Tujuan <br>
                                        <?php foreach ($row->toko  as $toko) : ?>
                                            <?= $toko->nama_toko ?> <br>
                                            <?= $toko->alamat_lengkap ?><br>
                                            <?= $toko->nama_kecamatan ?>
                                            <?= $toko->nama_kota ?>,
                                            <?= $toko->kode_pos ?>,
                                            <?= $toko->nama_provinsi ?>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                            <?php else : ?>
                                <!-- <tr>
                                    <td class="text-right border-b w-32 font-medium" colspan="4">Ongkir</td>
                                    <td class="text-center border-b w-32 font-medium"><?= number_format($row->ongkir) ?> </td>
                                </tr> -->
                                <tr>
                                    <td class="text-right border-b w-32 font-medium" colspan="5">Total Harga</td>
                                    <td class="text-right border-b w-32 font-medium grandtotal"> <?= number_format( $grandtotal) ?> </td>
                                </tr>
                                <tr>
                                    <!-- <td colspan="4">Barang Diantar Dengan Kurir : <br>
                                        <small><?= $row->jenis_courier ?> - <?= number_format($row->ongkir) ?></small>
                                    </td> -->
                                </tr>
                                <tr>
                                    <td> </td>
                                </tr>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
                <!--  -->
            </div>
            <!-- END: Invoice -->
    </div>
<?php endforeach; ?>
</body>
<script>
    $(document).ready(function() {
        window.print();
    });
</script>

</html>