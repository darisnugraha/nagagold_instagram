<div class="content">
    <!-- BEGIN: Top Bar -->
    <?= $this->load->view('Themes/Admin/tollbar') ?>

    <!-- END: Top Bar -->
    <form action="<?= base_url('simpan-proses-penjualan') ?>" method="POST">
        <?php foreach ($DetailTransaksi->data as $row) : ?>
            <input type="hidden" value="<?= $row->id_trx ?>" name="id_transaksi">

            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Detail Invoice Penjualan
                </h2>
                <div class="w-full sm:w-auto flex mt-4 sm:mt-0">

                    <a class="button text-white bg-theme-1 shadow-md mr-2" target="_blank" href="<?= base_url('printinvoicelihatproses/' . $row->id_trx . '') ?>">Print</a>
                    <!-- <div class="dropdown relative ml-auto sm:ml-0">
                    <button class="dropdown-toggle button px-2 box text-gray-700">
                        <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
                    </button>
                    <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                        <div class="dropdown-box__content box p-2">
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Export Word </a>
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Export PDF </a>
                        </div>
                    </div>
                </div> -->
                </div>
            </div>
            <!-- BEGIN: Invoice -->
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
                        <div class="mt-1"><?= $row->no_hp ?></div>
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
                        <div class="text-base text-gray-600">Id Transaksi</div>
                        <div class="text-lg text-theme-1 font-medium mt-2">#<?= $row->id_trx ?></div>
                        <!-- <div class="mt-1">Jan 02, 2021</div> -->
                    </div>
                </div>
                <div class="px-5 sm:px-16 py-10 sm:py-20">
                    <div class="overflow-x-auto">
                        <table class="table">
                            <thead>
                                <tr>
                                    <!-- <th class="border-b-2 text-center whitespace-no-wrap">Status</th> -->
                                    <th class="border-b-2 whitespace-no-wrap">NAMA BARANG</th>
                                    <th class="border-b-2 text-right whitespace-no-wrap">QTY</th>
                                    <th class="border-b-2 text-right whitespace-no-wrap">HARGA</th>
                                    <th class="border-b-2 text-right whitespace-no-wrap">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total_harga = 0;
                                $grandtotal = 0;
                                $no = 0;
                                $totalbarang = count($row->detail_barang);

                                foreach ($row->detail_barang  as $detailbarang) :
                                    $total_harga += $detailbarang->harga;
                                    $grandtotal = $total_harga + $row->ongkir;
                                ?>
                                    <input type="hidden" class="kode_barcode-<?= $no++ ?>" value="<?= $detailbarang->kode_barcode ?>">
                                    <input type="hidden" name="statusbarang[]" class="barang-cek<?= $detailbarang->kode_barcode ?>">
                                    <tr>
                                        <!-- <td class="text-center border-b w-32 font-medium">
                                            <input name="status[]" title="Unchek Jika Barang Tidak Ada!" onclick="checkharga('<?= $detailbarang->kode_barcode ?>','<?= $detailbarang->harga ?>')" id="kode_barcode-<?= $detailbarang->kode_barcode ?>" class="tooltip" checked value="<?= $detailbarang->kode_barcode ?>" type="checkbox">
                                        </td> -->
                                        <td class="border-b">
                                            <div class="font-medium whitespace-no-wrap"><?= $detailbarang->nama_barang ?></div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap"></div>
                                        </td>
                                        <td class="text-right border-b w-32">1</td>
                                        <td class="text-right border-b w-32"><?= number_format($detailbarang->harga) ?></td>

                                        <td class="text-right border-b w-32 font-medium"><?= number_format($detailbarang->harga) ?></td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>

                            <?php if ($row->type_trx == "AMBIL") : ?>
                                <tr>
                                    <td colspan="3">Grand Total : </td>
                                    <td class="text-right  w-32 font-medium">
                                        <div class="grandtotal"> </div>
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
                                <tr>
                                    <td class="text-right border-b w-32 font-medium" colspan="3">Ongkir</td>
                                    <td class="text-center border-b w-32 font-medium"><?= number_format($row->ongkir) ?> </td>
                                </tr>
                                <tr>
                                    <td class="text-right border-b w-32 font-medium" colspan="3">Total Harga</td>
                                    <td class="text-right border-b w-32 font-medium grandtotal"> </td>
                                </tr>
                                <tr>
                                    <td colspan="3">Barang Diantar Dengan Kurir : <br>
                                        <small><?= $row->jenis_courier ?> - <?= number_format($row->ongkir) ?></small>
                                    </td>
                                </tr>
                                <tr>
                                    <td> </td>
                                </tr>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
                <!-- <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                    <div class="col-span-12">
                        <button type="submit" class="button w-full bg-theme-1 text-white">Proses Transaksi</button>
                    </div>
                </div> -->

            </div>
            <input type="hidden" class="tot_harga" name="total_harga">

    </form>
<?php endforeach; ?>
</div>
<!-- END: Invoice -->

<script>
    $(document).ready(function() {
        var jml = '<?= $totalbarang ?>';
        for (var i = 0; i < jml; i++) {
            var kode = $('.kode_barcode-' + i).val();
            $('.barang-cek' + kode).val(kode + '-KIRIM');
        }

        var tot_harga = '<?= $grandtotal ?>';
        // console.log(tot_harga); 
        $('.grandtotal').append(`Rp.` + tot_harga.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + ``);
        $('.tot_harga').val(tot_harga);
    })

    function checkharga(barcode, harga) {
        var hagra_total = $('.tot_harga').val();
        // console.log(barcode);
        var elm = document.getElementById('kode_barcode-' + barcode + '');
        if (elm.checked == true) {
            hasil = parseFloat(hagra_total) + parseFloat(harga);
            // console.log(hasil);
            // console.log('ceked');
            $('.barang-cek' + barcode).val(barcode + '-KIRIM');
            $('.tot_harga').val('');
            $('.tot_harga').val(hasil);
            $('.grandtotal').html(``);
            $('.grandtotal').append(`Rp.` + hasil.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + ``);
        } else {
            hasil = parseFloat(hagra_total) - parseFloat(harga);
            // console.log(barcode);
            // console.log('uncekcek');
            $('.barang-cek' + barcode).val(barcode + '-CANCEL');
            $('.tot_harga').val('');
            $('.tot_harga').val(hasil);
            $('.grandtotal').html(``);
            $('.grandtotal').append(`Rp.` + hasil.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + ``);
            // console.log('nocek');
        }

    }
</script>