<div class="page-content-wrapper">
    <div class="container">
        <!-- Cart Wrapper-->

        <div class="cart-wrapper-area py-3">
            <div class="cart-table card mb-3">
                <div class="card shipping-method-choose-title-card bg-success">
                    <div class="card-body">
                        <h6 class="text-center mb-0 text-white">Cart</h6>
                    </div>
                </div>
                <div class="table-responsive card-body">
                    <table class="table mb-0">
                        <form action="<?= base_url('savetochcekout') ?>" id="form1" method="POST">
                            <tbody>
                                <div class="row">
                                    <tr>
                                        <th>#</th>
                                        <th>Produk</th>
                                        <th>Nama Barang</th>
                                        <th>Qty</th>
                                        <th>Harga</th>
                                        <th>#</th>
                                    </tr>
                                    <?php $totharga = 0;
                                    $totalberat = 0;
                                    foreach ($DataKeranjang->data  as $row) :
                                        $totharga += $row->harga_jual+$row->ongkos;
                                        $jml = count($DataKeranjang->data);
                                        $totalberat += $row->berat;
                                        $totalhargajual = $row->harga_jual+$row->ongkos;
                                    ?>
                                        <tr>
                                            <td>
                                                <a onclick="$('.loaderform').show();" class="remove-product" href="<?= base_url('delete-cart/' . encrypt_url($row->kode_barcode)) ?>"><i class="lni lni-close"></i></a>
                                            </td>
                                            <?php
                                            $databarang = $row->gambar;
                                            for ($i = 0; $i < 1; $i++) :
                                                $gambar = $databarang[$i]->lokasi_gambar;
                                                if ($gambar == "-") {
                                                    $gambar = "notfound.png";
                                                }
                                            ?>
                                                <td> <img class="mb-2" onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?=  $databarang[$i]->lokasi_gambar ?>" alt=""> </td>
                                            <?php endfor; ?>
                                            <td nowrap><?= $row->nama_barang ?><br>
                                                <!-- <small class="cart_ref">Kode Barang : <?= $row->kode_barang ?></small><br> -->
                                                <small>Berat : <?= number_format($row->berat,3,'.','.') ?></small><br>
                                                <small> Kadar: <?= number_format($row->kadar,3,'.','.') ?></small><br>
                                                <small> Harga Barang: <?= number_format($row->harga_jual) ?></small><br>
                                                <small> Ongkos Produksi: <?= number_format($row->ongkos) ?></small>
                                            </td>
                                            <td>1</td>
                                            <td><?= number_format($totalhargajual) ?></td>
                                            <td><input onclick="hitungtotal('<?= $row->kode_barcode ?>','<?= $totalhargajual ?>','<?= $row->berat?>');" id="kode_barcode-<?= $row->kode_barcode ?>" value="<?= $row->kode_barcode ?>~<?= $totalhargajual ?>~<?= $row->nama_barang ?>~<?= $gambar ?>~<?= $row->berat ?>~<?= $row->ongkos ?>~<?=$row->kadar ?>" type="checkbox" checked name="kode_barcode[]"> </td>
                                        </tr>

                                        <input class="harga_jual-<?= $totalhargajual ?>" value="<?= $totalhargajual ?>" type="hidden" checked name="harga_jual[]">
                                    <?php endforeach; ?>
                                    <input type="hidden" class="tot_harga" value="" name="total_harga">
                                    <input type="hidden" class="tot_berat" value="<?=$totalberat?>" name="total_berat">
                                    <tr>
                                        <td colspan="3" nowrap> Total Berat</td>
                                        <td> </td>
                                        <td colspan="3" align="right"><span> <div class="view_tot_berat"></div> </span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" nowrap> Total</td>
                                        <td> </td>
                                        <td colspan="3" align="right"><span>
                                                <div class="view_tot_harga"></div>
                                            </span></td>
                                    </tr>

                    </table>
                </div>
            </div>
            <div class="card cart-amount-area">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <a href="javascript:;" class="btn btn-success btn-block" onclick="$('.loaderform').show(); document.getElementById('form1').submit();" style="color:#FFFFFF">Proceed to checkout</a>
                    <input type="hidden" name="mess" value=<%=n%> </div> </div> </div> </form> </div> </div> <br>
                    <br>
                    <br>
                    <script>
                        $(document).ready(function() {
                            var tot_harga = '<?= $totharga ?>';
                            $('.view_tot_harga').append(`Rp.` + tot_harga.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + ``);
                            $('.tot_harga').val(tot_harga);
                            var berat = '<?=$totalberat?>';
                            var tot_berat = parseFloat(berat).toFixed(3);
                            $('.view_tot_berat').append(tot_berat);
                        })

                        function hitungtotal(barcode, harga, berat) {
                            // console.log(berat);
                            var hagra_total = $('.tot_harga').val();
                            var berat_total = $('.tot_berat').val();
                            var hasil;
                            var hasilberat;
                            var elm = document.getElementById('kode_barcode-' + barcode + '');
                            if (elm.checked == true) {
                                hasil = parseFloat(hagra_total) + parseFloat(harga);
                                hasilberat = parseFloat(berat_total) + parseFloat(berat);
                                // console.log(hasil);
                                // console.log('cek');
                                $('.tot_harga').val(hasil);
                                $('.view_tot_harga').html(``);
                                $('.view_tot_harga').append(`Rp.` + hasil.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + ``);

                                $('.tot_berat').val(hasilberat.toFixed(3));
                                $('.view_tot_berat').empty();
                                $('.view_tot_berat').append(hasilberat.toFixed(3).toString());
                            } else {
                                hasil = parseFloat(hagra_total) - parseFloat(harga);
                                hasilberat = parseFloat(berat_total) - parseFloat(berat);
                                // console.log(hasil);
                                // console.log('cek');
                                $('.tot_harga').val(hasil);
                                $('.view_tot_harga').html(``);
                                $('.view_tot_harga').append(`Rp.` + hasil.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + ``);
                                // console.log('nocek');
                                $('.tot_berat').val(hasilberat.toFixed(3));
                                $('.view_tot_berat').empty();
                                $('.view_tot_berat').append(hasilberat.toFixed(3).toString());
                            }
                            // console.log(hasilberat);
                        }
                    </script>
    </div>
    </div>
    </div>