<div class="content">
    <!-- BEGIN: Top Bar -->
    <?= $this->load->view('Themes/Admin/tollbar') ?>

    <!-- END: Top Bar -->
    <form action="<?= base_url('simpan-validasi-penjualan') ?>" method="POST">
        <?php 
        foreach ($DetailTransaksi->data as $row) :
        ?>
            <input type="hidden" value="<?= $row->id_trx ?>" name="id_transaksi">

            <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Invoice Penjualan
                </h2>
                <div class="w-full sm:w-auto flex mt-4 sm:mt-0">

                    <a class="button text-white bg-theme-1 shadow-md mr-2" target="_blank" href="<?= base_url('print-invoice/' . $row->id_trx . '') ?>">Print</a>
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
                                    <th class="border-b-2 whitespace-no-wrap">NAMA BARANG</th>
                                    <th class="border-b-2 text-right whitespace-no-wrap">QTY</th>
                                    <th class="border-b-2 text-right whitespace-no-wrap">HARGA</th>
                                    <th class="border-b-2 text-right whitespace-no-wrap">TOTAL</th>
                                    <!-- <th class="border-b-2 text-right whitespace-no-wrap">Status Barang</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total_harga = 0;
                                $totalongkos = 0;
                                $grandtotal = 0;
                                
                                foreach ($row->detail_barang  as $detailbarang) :
                                    $total_harga += $detailbarang->harga+$detailbarang->ongkos;
                                    $totalongkos= $detailbarang->harga+$detailbarang->ongkos;
                                    $grandtotal = $total_harga + $row->ongkir;
                                ?>
                                    <tr>
                                        <td class="border-b">
                                            <div class="font-medium whitespace-no-wrap"><?= $detailbarang->nama_barang ?>
                                            <small>
                                                <br>Kode Barcode : <?= $detailbarang->kode_barcode ?>
                                                <br>Berat : <?= $detailbarang->berat ?>
                                                <br> 
                                                <?php if($detailbarang->ongkos == 0): ?>
                                                <?php else: ?>
                                                Ongkos Produksi <?= number_format($detailbarang->ongkos) ?>
                                                <?php endif; ?>
                                            </small>
                                            </div>
                                            <div class="text-gray-600 text-xs whitespace-no-wrap"></div>
                                        </td>
                                        <td class="text-right border-b w-32">1</td>
                                        <td class="text-right border-b w-32"><?= number_format($detailbarang->harga) ?></td>
                                        <td class="text-right border-b w-32 font-medium"><?= number_format($totalongkos) ?></td>
                                        <!-- <td class="text-center border-b w-32 font-medium">
                                            <input title="Unchek Jika Barang Tidak Ada!" onclick="checkharga('<?= $detailbarang->kode_barcode ?>','<?= $detailbarang->harga ?>')" id="kode_barcode-<?= $detailbarang->kode_barcode ?>" class="tooltip" checked value="<?= $detailbarang->kode_barcode ?>" type="checkbox"></td> -->
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                            <?php if ($row->type_trx == "AMBIL") : ?>
                                <tr>
                                    <td> Barang Di Ambil Di Toko </td>
                                </tr>
                                <tr>
                                    <td> Toko Tujuan <br>
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
                                    <td class="text-center border-b w-32 font-medium"><?= number_format($grandtotal) ?> </td>
                                </tr>
                                <tr>
                                    <td>Barang Diantar Dengan Kurir : <br>
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
                <div class="px-5 sm:px-20 pb-10 sm:pb-20 flex flex-col-reverse sm:flex-row">
                    <div class="text-center sm:text-left mt-10 sm:mt-0">
                        <div class="text-base text-gray-600">Bank Transfer</div>
                        <?php foreach ($row->bukti_bayar  as $buktitf) : ?>
                            <div class="text-lg text-theme-1 font-medium mt-2"><?= $buktitf->from_atas_nama ?></div>
                            <div class="mt-1">Nama Bank : <?= $buktitf->from_nama_bank ?></div>
                            <div class="mt-1">No Rek : <?= $buktitf->from_no_rek ?></div>
                            <a href="<?= $buktitf->bukti_transfer ?>" target="_blank">
                                <img width="100px" height="100px" src="<?= $buktitf->bukti_transfer ?>"></a>
                        <?php endforeach; ?>
                    </div>
                    <div class="text-center sm:text-right sm:ml-auto">
                        <div class="text-base text-gray-600">Total Transasksi</div>
                        <div class="text-xl text-theme-1 font-medium mt-2 grandtotal"></div>
                        <input type="hidden" class="tot_harga" name="total_harga">
                        <?php if ($row->type_trx == "AMBIL") : ?>
                            <div class="mt-1 tetx-xs"> Total Dp :  <?php $dp = $grandtotal /2; echo number_format($dp); ?> </div>
                            <div class="mt-1 tetx-xs"> Sisa Bayar : 
                                <!-- var total = parseInt(jml) * parseInt(50) / parseInt(100); -->
                                <?php $sisa = $grandtotal / 2; echo number_format($sisa); ?> </div>
                        <?php else: ?>
                            <div class="mt-1 tetx-xs">Sudah Lunas</div>
                        <?php endif; ?>
                    </div>

                </div>
                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                    <div class="col-span-12">
                        <!-- <label>Masukan Keterangan</label> -->
                        <button type="submit" class="button w-full bg-theme-1 text-white">Validasi Transaksi</button>
                    </div>
                </div>

            </div>

    </form>
<?php endforeach; ?>
</div>
<!-- END: Invoice -->

<script>
    $(document).ready(function() {
        var tot_harga = '<?= $grandtotal ?>';
        // console.log(tot_harga); 
        $('.grandtotal').append(`Rp.` + tot_harga.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + ``);
        $('.tot_harga').val(tot_harga);
    })

    // function checkharga(barcode, harga) {
    //     var hagra_total = $('.tot_harga').val();
    //     // console.log(barcode);
    //     var elm = document.getElementById('kode_barcode-' + barcode + '');
    //     if (elm.checked == true) {
    //         hasil = parseFloat(hagra_total) + parseFloat(harga);
    //         // console.log(hasil);
    //         // console.log('ceked');
    //         $('.tot_harga').val('');
    //         $('.tot_harga').val(hasil);
    //         $('.grandtotal').html(``);
    //         $('.grandtotal').append(`Rp.` + hasil.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + ``);
    //     } else {
    //         hasil = parseFloat(hagra_total) - parseFloat(harga);
    //         // console.log(barcode);
    //         // console.log('uncekcek');
    //         $('.tot_harga').val('');
    //         $('.tot_harga').val(hasil);
    //         $('.grandtotal').html(``);
    //         $('.grandtotal').append(`Rp.` + hasil.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + ``);
    //         // console.log('nocek');
    //     }

    // }
</script>