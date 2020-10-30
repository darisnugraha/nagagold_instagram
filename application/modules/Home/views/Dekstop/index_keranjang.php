<!-- MAIN -->

<main class="site-main">

    <div class="columns container">
        <!-- Block  Breadcrumb-->

        <ol class="breadcrumb no-hide">
            <li><a href="#">Home </a></li>
            <li class="active">Cart</li>
        </ol><!-- Block  Breadcrumb-->

        <?php if ($Cart->status == "kosong") : ?>
            Opps Cart Belanja Kosong Silahkan Kembali Ke Halaman Utama :)
            <div class="cart_navigation">
                <a href="<?= base_url('') ?>" class="button next-btn">Belanja Sekarang</a>
            </div>
        <?php else : ?>
            <form action="<?= base_url('savetochcekout') ?>" id="form1" method="POST">
                <div class="page-content page-order">
                    <div class="order-detail-content">
                        <div class="table-responsive">
                            <table class="table table-bordered  cart_summary">
                                <thead>
                                    <tr>
                                        <th class="action">#</th>
                                        <th class="cart_product">Produk</th>
                                        <th>Nama Barang</th>
                                        <!-- <th>Status Barang</th> -->
                                        <th>
                                            <center>Qty</center>
                                        </th>
                                        <th>
                                            <center>Harga</center>
                                        </th>
                                        <th width="10px">
                                            <center>#</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    foreach ($DataKeranjang->data  as $row) :
                                        $total += $row->harga_jual+$row->ongkos;
                                        $hargajual = $row->harga_jual+$row->ongkos;
                                    ?>
                                        <tr>
                                            <td class="action">
                                                <a href="<?= base_url('delete-cart/' . encrypt_url($row->kode_barcode)) ?>" type="submit"><i class="fa fa-trash-o"></i> </a>
                                            </td>
                                            <td class="cart_product">
                                                <a href="<?= base_url('DetailProduk/' . encrypt_url($row->kode_toko) . '/' . encrypt_url($row->kode_barcode) . '') ?>">
                                                    <?php $databarang = $row->gambar;
                                                    for ($i = 0; $i < 1; $i++) :
                                                        $gambar = $databarang[$i]->lokasi_gambar;
                                                        if ($gambar == "-") {
                                                            $gambar = "notfound.png";
                                                        }
                                                    ?>
                                                        <img width="300" height="100" onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?= base_url('assets/images/NsiPic/product/') . $databarang[$i]->lokasi_gambar ?>"></a>
                                            <?php endfor; ?>
                                            </td>
                                            <td class="cart_description">
                                                <p class="product-name"><a href="#"><?= $row->nama_barang ?> </a></p>
                                                <small class="cart_ref">Kode Barang : <?= $row->kode_barang ?></small><br>
                                                <small><a href="#">Berat : <?= $row->berat ?></a></small><br>
                                                <small><a href="#"> Kadar: <?= $row->kadar ?></a></small><br>
                                                <small><a href="#"> Ongkos Produksi: <?= number_format($row->ongkos)?></a></small><br>
                                                <small><a href="#"> Harga Barang : <?= number_format($row->harga_jual) ?></a></small>
                                            </td>
                                            <!-- <td class="cart_avail"><span class="label label-success">In stock</span></td> -->
                                            <td class="qty">
                                                1
                                            </td>
                                            <td align="center">Rp.<span><?= number_format($hargajual) ?></span></td>
                                            <td align="center"> <input onclick="hitungtotal('<?= $row->kode_barcode ?>','<?= $hargajual ?>');" id="kode_barcode-<?= $row->kode_barcode ?>" value="<?= $row->kode_barcode ?>~<?= $hargajual ?>~<?= $row->nama_barang ?>~<?= $gambar ?>~<?= $row->berat ?>~<?= $row->ongkos ?>~<?=$row->kadar ?>" type="checkbox" checked name="kode_barcode[]"> </td>
                                        </tr>
                                        <input class="harga_jual-<?= $hargajual ?>" value="<?= $hargajual ?>" type="hidden" checked name="harga_jual[]">
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>

                                    <tr>
                                        <td colspan="5"><strong>Total</strong></td>
                                        <td colspan="1"><strong>
                                                <div class="view_tot_harga"></div>
                                            </strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <input type="hidden" class="tot_harga" value="" name="total_harga">

                        </div>

                        <div class="cart_navigation">
                            <a href="<?= base_url('') ?>" class="prev-btn">Continue shopping</a>
                            <!-- <a type="submit" class="next-btn">Proceed to checkout</a> -->
                            <a href="javascript:;" class="next-btn" onclick="document.getElementById('form1').submit();">Proceed to checkout</a>
                            <input type="hidden" name="mess" value=<%=n%> </div> </div> </div> </form> <?php endif; ?> <br>
                        </div>
                    </div>
                </div>


</main><!-- end MAIN -->

<script>
    $(document).ready(function() {
        var tot_harga = '<?= $total ?>';
        $('.view_tot_harga').append(`Rp.` + tot_harga.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + ``);
        $('.tot_harga').val(tot_harga);
    })

    function hitungtotal(barcode, harga) {
        var hagra_total = $('.tot_harga').val();
        var hasil;
        var elm = document.getElementById('kode_barcode-' + barcode + '');
        if (elm.checked == true) {
            hasil = parseFloat(hagra_total) + parseFloat(harga);
            // console.log(hasil);
            // console.log('cek');
            $('.tot_harga').val(hasil);
            $('.view_tot_harga').html(``);
            $('.view_tot_harga').append(`Rp.` + hasil.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + ``);
        } else {
            hasil = parseFloat(hagra_total) - parseFloat(harga);
            // console.log(hasil);
            // console.log('cek');
            $('.tot_harga').val(hasil);
            $('.view_tot_harga').html(``);
            $('.view_tot_harga').append(`Rp.` + hasil.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') + ``);
            // console.log('nocek');
        }
    }
</script>