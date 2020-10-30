<style>
    .first {
        transition: box-shadow 300ms ease-in-out, color 300ms ease-in-out;
    }

    .first:hover {
        box-shadow: 0 0 40px 40px #e74c3c inset;
    }

    /*  Navigation Menu Horizontal Scroll by igniel.com */
    .ignielHorizontal ul {
        /* background-color: #673ab7; */
        /* Warna background menu */
        max-width: 100%;
        /* Lebar maksimal menu */
        overflow-x: auto;
    }

    .ignielHorizontal {
        /* color: #fff; */
        line-height: 0px;
        overflow: hidden;
    }

    .ignielHorizontal a {
        font-size: 14px;
        /* color: #fff; */
        text-decoration: none;
        padding: 10px 13px;
        line-height: 1.5em;
        display: block;
    }

    .ignielHorizontal a:hover {
        /* background-color: rgba(0, 0, 0, .25); */
        /* color: #fff; */
        text-decoration: none;
    }

    .ignielHorizontal ul,
    .ignielHorizontal li {
        list-style: none;
        display: inline-block;
        white-space: nowrap;
        margin: 0px;
        padding: 0px;
    }

    @media screen and (max-width: 480px) {
        .ignielHorizontal a {
            font-size: 13px;
            padding: 8px 11px;
        }
    }

    @media screen and (max-width: 360px) {
        .ignielHorizontal a {
            font-size: 12px;
            padding: 7px 10px;
        }
    }

    .buttonku {
        background-color: #FFFFFF;
        box-shadow: 0px 0px 1px 2px #e6e6e6;
        /* Green */
        border: none;
        color: #000000;
        padding: 14px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 11px;
        margin: 15px 2px;
        cursor: pointer;
        border-radius: 30px;
    }

    .activeku,
    .btn:hover {
        background-color: #2a166f;
        color: white;
    }
</style>
<div class="page-content-wrapper">
    <div class="container">
        <!-- Cart Wrapper-->

        <div class="cart-wrapper-area py-3">
            <div class="cart-table card mb-3">
                <div class="card shipping-method-choose-title-card bg-success">
                    <div class="card-body">
                        <h6 class="text-center mb-0 text-white titlemenu">Menunggu Pembayaran</h6>
                    </div>
                </div>
                <div class="table-responsive container">
                    <div class="ignielHorizontal">
                        <ul>
                            <li><button onclick="openCity('menunggupembayaran','Menunggu Pembayaran','tab1')" id="tab1" class="buttonku activeku">Menunggu Pembayaran</button></li>
                            <li><button onclick="openCity('menunggukonfirmasi','Menunggu Konfirmasi','tab2')" id="tab2" class="buttonku">Menunggu Konfirmasi</button></li>
                            <li><button onclick="openCity('pesanandalamproses','Pesanan Dalam Proses','tab3')" id="tab3" class="buttonku">Pesanan Dalam Proses</button></li>
                            <li><button class="buttonku" onclick="openCity('pesanandalampengiriman','Proses Pengiriman / Ambil','tab4')" id="tab4">Proses Pengiriman / Ambil</button></li>
                            <li><button class="buttonku" onclick="openCity('pesanansudahsampai','Pesanan Telah Selesai','tab5')" id="tab5">Pesanan Telah Selesai</button></li>
                        </ul>
                    </div>

                    <div id="menunggupembayaran" class="city">

                        <?php
                        $totharga = 0;
                        $ongkirmenunggupembayaran = 0;
                        foreach ($DataCart->data  as $row) :
                            $ongkirmenunggupembayaran += $row->ongkir;
                            // $jml = count($DataKeranjang->data);
                        ?>
                            <?php if ($row->status_trx == "OPEN") : ?>
                                <table class="table mb-0">
                                    <tbody>
                                        <div class="row">
                                            <tr>
                                                <td colspan="5">No Transaksi : <?= $row->id_trx ?></td>
                                            </tr>
                                            <tr>
                                                <th>#</th>
                                                <th>Produk</th>
                                                <th>Nama Barang</th>
                                                <th>Qty</th>
                                                <th>Harga</th>
                                            </tr>
                                            <?php
                                            $no = 1;
                                            $jml = 0;
                                            foreach ($row->detail_barang  as  $detail) :
                                                $jml += $detail->harga;
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?= $no++ ?>
                                                    </td>
                                                    <?php $databarang = $detail->gambar;
                                                    for ($i = 0; $i < 1; $i++) : ?>
                                                        <td> <img class="mb-2" onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?= base_url('assets/images/NsiPic/product/' . $databarang[$i]->lokasi_gambar) ?>" alt=""> </td>
                                                    <?php endfor; ?>
                                                    <td>
                                                        <?= $detail->nama_barang ?><br>
                                                        Berat :<?= $detail->berat  ?>
                                                    </td>
                                                    <td>1</td>
                                                    <td><?= number_format($detail->harga) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <?php
                                            if ($row->type_trx == "KIRIM") : ?>
                                                <tr>
                                                    <td colspan="3" align="right"> Pengiriman :</td>
                                                    <td colspan="2"> <?= $row->jenis_courier ?> </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" align="right">Ongkir :</td>
                                                    <td colspan="2"> <?= number_format($row->ongkir) ?> </td>
                                                </tr>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="3" align="right"></td>
                                                    <td colspan="3" align="right">
                                                        Ambil Ditoko<br>
                                                        Lokasi Pengambilan<br>
                                                        <?php $no = 1;
                                                        foreach ($row->toko as $daftaralamat) : ?>

                                                            <?= $daftaralamat->alamat_lengkap ?>
                                                            Kec.<?= $daftaralamat->nama_kecamatan ?>
                                                            <?= $daftaralamat->nama_kota ?>
                                                            <?= $daftaralamat->nama_provinsi ?>
                                                        <?php endforeach; ?>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                            <tr>
                                                <td colspan="3" align="right"> Total :</td>
                                                <td colspan="2"> Rp.
                                                    <?php
                                                    $ongkirnya = $jml + $ongkirmenunggupembayaran;
                                                    echo number_format($ongkirnya)
                                                    ?>
                                                </td>
                                            </tr>
                                </table>
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <a href="<?= base_url('konfirmasipembayaran/' . $row->id_trx) ?>" class="btn btn-success btn-block" style="color:#FFFFFF">Lanjutkan Pembayaran</a>
                                </div>
                                <!-- <div class="card-body d-flex align-items-center justify-content-between">
                                    <button onclick="lanjutkanCheckout('<?= base_url('wp-lanjutkan-checkout/' . $row->id_trx); ?>')" class="btn btn-success btn-block" style="color:#FFFFFF">Lanjutkan Pesanan</button>
                                </div>
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <button onclick="batalkanpesanan('<?= base_url('wp-hapus-old-order/' . $row->id_trx); ?>')" class="btn btn-danger btn-block" style="color:#FFFFFF">Batalkan Pesaan</button>
                                </div> -->
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>

                    <div id="menunggukonfirmasi" class="w3-container city" style="display:none">
                        <?php
                        $totharga = 0;
                        foreach ($DataCart->data  as $menunggukonfirmasi) :
                            // $totharga += $menunggukonfirmasi->harga;
                            // $jml = count($DataKeranjang->data);
                        ?>
                            <?php if ($menunggukonfirmasi->status_trx == "BAYAR") : ?>
                                <table class="table mb-0">
                                    <tbody>
                                        <div class="row">
                                            <tr>
                                                <td colspan="5">No Transaksi : <?= $menunggukonfirmasi->id_trx ?></td>
                                            </tr>
                                            <tr>
                                                <th>#</th>
                                                <th>Produk</th>
                                                <th>Nama Barang</th>
                                                <th>Qty</th>
                                                <th>Harga</th>
                                            </tr>
                                            <?php
                                            $no = 1;
                                            $jmldetailmenunggukonfirmasi = 0;
                                            foreach ($row->detail_barang  as  $detailmenunggukonfirmasi) :
                                                $jmldetailmenunggukonfirmasi += $detailmenunggukonfirmasi->harga;
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?= $no++ ?>
                                                    </td>
                                                    <?php $databarang = $detailmenunggukonfirmasi->gambar;
                                                    for ($i = 0; $i < 1; $i++) : ?>
                                                        <td> <img class="mb-2" onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?= base_url('assets/images/NsiPic/product/' . $databarang[$i]->lokasi_gambar) ?>" alt=""> </td>
                                                    <?php endfor; ?>
                                                    <td>
                                                        <?= $detailmenunggukonfirmasi->nama_barang ?><br>
                                                        Berat :<?= $detailmenunggukonfirmasi->berat  ?>
                                                    </td>
                                                    <td>1</td>
                                                    <td><?= number_format($detailmenunggukonfirmasi->harga) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <?php
                                            if ($menunggukonfirmasi->type_trx == "KIRIM") : ?>
                                                <tr>
                                                    <td colspan="3" align="right"> Pengiriman :</td>
                                                    <td colspan="2"> <?= $menunggukonfirmasi->jenis_courier ?> </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" align="right">Ongkir :</td>
                                                    <td colspan="2"> <?= number_format($menunggukonfirmasi->ongkir) ?> </td>
                                                </tr>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="3" align="right"></td>
                                                    <td colspan="3" align="right">
                                                        Ambil Ditoko<br>
                                                        Lokasi Pengambilan<br>
                                                        <?php $no = 1;
                                                        foreach ($row->toko as $daftaralamat) : ?>

                                                            <?= $daftaralamat->alamat_lengkap ?>
                                                            Kec.<?= $daftaralamat->nama_kecamatan ?>
                                                            <?= $daftaralamat->nama_kota ?>
                                                            <?= $daftaralamat->nama_provinsi ?>
                                                        <?php endforeach; ?>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                            <tr>
                                                <td colspan="3" align="right"> Total :</td>
                                                <td colspan="2"> Rp.
                                                    <?php
                                                    $ongkirnya = $jmldetailmenunggukonfirmasi + $menunggukonfirmasi->ongkir;
                                                    echo number_format($ongkirnya)
                                                    ?>
                                                </td>
                                            </tr>


                                </table>
                                <!-- <div class="card-body d-flex align-items-center justify-content-between">
                                    <button onclick="lanjutkanCheckout('<?= base_url('wp-lanjutkan-checkout/' . $row->id_trx); ?>')" class="btn btn-success btn-block" style="color:#FFFFFF">Lanjutkan Pesanan</button>
                                </div>
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <button onclick="batalkanpesanan('<?= base_url('wp-hapus-old-order/' . $row->id_trx); ?>')" class="btn btn-danger btn-block" style="color:#FFFFFF">Batalkan Pesaan</button>
                                </div> -->
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>

                    <div id="pesanandalamproses" class="w3-container city" style="display:none">
                        <?php
                        $totharga = 0;
                        foreach ($DataCart->data  as $pesanandalamproses) :
                            // $totharga += $pesanandalamproses->harga;
                            // $jml = count($DataKeranjang->data);
                        ?>
                            <?php if ($pesanandalamproses->status_trx == "PROSES") : ?>
                                <table class="table mb-0">
                                    <tbody>
                                        <div class="row">
                                            <tr>
                                                <td colspan="5">No Transaksi : <?= $pesanandalamproses->id_trx ?></td>
                                            </tr>
                                            <tr>
                                                <th>#</th>
                                                <th>Produk</th>
                                                <th>Nama Barang</th>
                                                <th>Qty</th>
                                                <th>Harga</th>
                                            </tr>
                                            <?php
                                            $no = 1;
                                            $jmldetailproses = 0;
                                            foreach ($pesanandalamproses->detail_barang  as  $detailproses) :
                                                $jmldetailproses += $detailproses->harga;
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?= $no++ ?>
                                                    </td>
                                                    <?php $databarang = $detailproses->gambar;
                                                    for ($i = 0; $i < 1; $i++) : ?>
                                                        <td> <img class="mb-2" onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?= base_url('assets/images/NsiPic/product/' . $databarang[$i]->lokasi_gambar) ?>" alt=""> </td>
                                                    <?php endfor; ?>
                                                    <td>
                                                        <?= $detailproses->nama_barang ?><br>

                                                        Berat :<?= $detailproses->berat  ?>
                                                    </td>
                                                    <td>1</td>
                                                    <td><?= number_format($detailproses->harga) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <?php
                                            if ($pesanandalamproses->type_trx == "KIRIM") : ?>
                                                <tr>
                                                    <td colspan="3" align="right"> Pengiriman :</td>
                                                    <td colspan="2"> <?= $pesanandalamproses->jenis_courier ?> </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" align="right">Ongkir :</td>
                                                    <td colspan="2"> <?= number_format($pesanandalamproses->ongkir) ?> </td>
                                                </tr>
                                            <?php else : ?>

                                                <tr>
                                                    <td colspan="3" align="right"></td>
                                                    <td colspan="3" align="right">
                                                        Ambil Ditoko<br>
                                                        Lokasi Pengambilan<br>
                                                        <?php $no = 1;
                                                        foreach ($pesanandalamproses->toko as $daftaralamat) : ?>

                                                            <?= $daftaralamat->alamat_lengkap ?>
                                                            Kec.<?= $daftaralamat->nama_kecamatan ?>
                                                            <?= $daftaralamat->nama_kota ?>
                                                            <?= $daftaralamat->nama_provinsi ?>
                                                        <?php endforeach; ?>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                            <tr>
                                                <td colspan="3" align="right"> Total :</td>
                                                <td colspan="2"> Rp.
                                                    <?php
                                                    $ongkirnyaproses = $jmldetailproses + $pesanandalamproses->ongkir;
                                                    echo number_format($ongkirnyaproses)
                                                    ?>
                                                </td>
                                            </tr>


                                </table>
                                <!-- <div class="card-body d-flex align-items-center justify-content-between">
                                    <button onclick="lanjutkanCheckout('<?= base_url('wp-lanjutkan-checkout/' . $row->id_trx); ?>')" class="btn btn-success btn-block" style="color:#FFFFFF">Lanjutkan Pesanan</button>
                                </div>
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <button onclick="batalkanpesanan('<?= base_url('wp-hapus-old-order/' . $row->id_trx); ?>')" class="btn btn-danger btn-block" style="color:#FFFFFF">Batalkan Pesaan</button>
                                </div> -->
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <div id="pesanandalampengiriman" class="w3-container city" style="display:none">
                        <?php
                        $totharga = 0;
                        $ongkirku = 0;
                        foreach ($DataCart->data  as $pesanankirim) :
                            $ongkirku = $pesanankirim->ongkir;
                            // $jml = count($DataKeranjang->data);

                        ?>
                            <?php if ($pesanankirim->status_trx == "KIRIM" || $pesanankirim->status_trx == "AMBIL") : ?>
                                <table class="table mb-0">
                                    <tbody>
                                        <div class="row">
                                            <tr>
                                                <td colspan="5">No Transaksi : <?= $pesanankirim->id_trx ?></td>
                                            </tr>
                                            <tr>
                                                <th>#</th>
                                                <th>Produk</th>
                                                <th>Nama Barang</th>
                                                <th>Qty</th>
                                                <th>Harga</th>
                                            </tr>
                                            <?php
                                            $no = 1;
                                            $jmldetailkirim = 0;
                                            foreach ($pesanankirim->detail_barang  as  $detailkirim) :
                                                $jmldetailkirim += $detailkirim->harga;
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?= $no++ ?>
                                                    </td>
                                                    <?php $databarang = $detailkirim->gambar;
                                                    for ($i = 0; $i < 1; $i++) : ?>
                                                        <td> <img class="mb-2" onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?= base_url('assets/images/NsiPic/product/' . $databarang[$i]->lokasi_gambar) ?>" alt=""> </td>
                                                    <?php endfor; ?>
                                                    <td>
                                                        <?= $detailkirim->nama_barang ?><br>

                                                        Berat :<?= $detailkirim->berat  ?>
                                                    </td>
                                                    <td>1</td>
                                                    <td><?= number_format($detailkirim->harga) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <?php
                                            if ($pesanankirim->status_trx == "KIRIM") : ?>
                                                <tr>
                                                    <td colspan="3" align="right"> Pengiriman</td>
                                                    <td colspan="2"> <?= $pesanankirim->jenis_courier ?> </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" align="right">Ongkir</td>
                                                    <td colspan="2"> <?= number_format($pesanankirim->ongkir) ?> </td>
                                                </tr>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="3" align="right"></td>
                                                    <td colspan="3" align="right">
                                                        Ambil Ditoko<br>
                                                        Lokasi Pengambilan<br>
                                                        <?php $no = 1;
                                                        foreach ($pesanankirim->toko as $daftaralamat) : ?>
                                                            <?= $daftaralamat->alamat_lengkap ?>
                                                            Kec.<?= $daftaralamat->nama_kecamatan ?>
                                                            <?= $daftaralamat->nama_kota ?>
                                                            <?= $daftaralamat->nama_provinsi ?>
                                                        <?php endforeach; ?>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                            <tr>
                                                <td colspan="3" align="right"> Total</td>
                                                <td colspan="2"> Rp.
                                                    <?php
                                                    $ongkirnya = $jmldetailkirim + $ongkirku;
                                                    echo number_format($jmldetailkirim)
                                                    ?>
                                                </td>
                                            </tr>

                                            <?php if ($pesanankirim->status_trx == "KIRIM") : ?>
                                                <tr>
                                                    <td colspan="3">
                                                        <div class="card-body d-flex align-items-center justify-content-between">
                                                            <button onclick="lanjutkanCheckout('<?= base_url('wp-lanjutkan-checkout/' . $row->id_trx); ?>')" class="btn btn-success btn-block" style="color:#FFFFFF">Cek Status Pesanan</button>
                                                        </div>
                                                    </td>
                                                    <td colspan="2">
                                                        <div class="card-body d-flex align-items-center justify-content-between">
                                                            <button onclick="lanjutkanCheckout('<?= base_url('wp-lanjutkan-checkout/' . $row->id_trx); ?>')" class="btn btn-success btn-block" style="color:#FFFFFF">Terima Pesanan</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php else : ?>
                                                <tr>
                                                    <td>
                                                    <td colspan="4">
                                                        <div class="card-body d-flex align-items-center justify-content-between">
                                                            <button onclick="lanjutkanCheckout('<?= base_url('wp-lanjutkan-checkout/' . $row->id_trx); ?>')" class="btn btn-success btn-block" style="color:#FFFFFF">Terima Pesanan</button>
                                                        </div>
                                                    </td>
                                                    </td>
                                                </tr>

                                            <?php endif; ?>

                                </table>
                                <!-- <div class="card-body d-flex align-items-center justify-content-between">
                                    <button onclick="lanjutkanCheckout('<?= base_url('wp-lanjutkan-checkout/' . $row->id_trx); ?>')" class="btn btn-success btn-block" style="color:#FFFFFF">Lanjutkan Pesanan</button>
                                </div>
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <button onclick="batalkanpesanan('<?= base_url('wp-hapus-old-order/' . $row->id_trx); ?>')" class="btn btn-danger btn-block" style="color:#FFFFFF">Batalkan Pesaan</button>
                                </div> -->
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </div>
                    <div id="pesanansudahsampai" class="w3-container city" style="display:none">
                        <?php
                        $totharga = 0;
                        foreach ($DataCart->data  as $pesananselesai) :
                            // $totharga += $pesananselesai->harga;
                            // $jml = count($DataKeranjang->data);
                        ?>
                            <?php if ($pesananselesai->status_trx == "FINISH") : ?>
                                <table class="table mb-0">
                                    <tbody>
                                        <div class="row">
                                            <tr>
                                                <td colspan="5">No Transaksi : <?= $pesananselesai->id_trx ?></td>
                                            </tr>
                                            <tr>
                                                <th>#</th>
                                                <th>Produk</th>
                                                <th>Nama Barang</th>
                                                <th>Qty</th>
                                                <th>Harga</th>
                                            </tr>
                                            <?php
                                            $no = 1;
                                            $jmlpesananselesai = 0;
                                            foreach ($row->detail_barang  as  $detaiselesai) :
                                                $jmlpesananselesai += $detaiselesai->harga;
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?= $no++ ?>
                                                    </td>
                                                    <?php $databarang = $detaiselesai->gambar;
                                                    for ($i = 0; $i < 1; $i++) : ?>
                                                        <td> <img class="mb-2" onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?= base_url('assets/images/NsiPic/product/' . $databarang[$i]->lokasi_gambar) ?>" alt=""> </td>
                                                    <?php endfor; ?>
                                                    <td>
                                                        <?= $detaiselesai->nama_barang ?><br>

                                                        Berat :<?= $detaiselesai->berat  ?>
                                                    </td>
                                                    <td>1</td>
                                                    <td><?= number_format($detaiselesai->harga) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <?php
                                            if ($pesananselesai->status_trx == "KIRIM") : ?>
                                                <tr>
                                                    <td colspan="3" align="right"> Pengiriman</td>
                                                    <td colspan="2"> <?= $pesananselesai->jenis_courier ?> </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" align="right">Ongkir</td>
                                                    <td colspan="2"> <?= number_format($pesananselesai->ongkir) ?> </td>
                                                </tr>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="2" align="right"></td>
                                                    <td colspan="3" align="right">
                                                        Ambil Ditoko<br>
                                                        Lokasi Pengambilan<br>
                                                        <?php $no = 1;
                                                        foreach ($pesananselesai->toko as $daftaralamat) : ?>
                                                            <?= $daftaralamat->alamat_lengkap ?>
                                                            Kec.<?= $daftaralamat->nama_kecamatan ?>
                                                            <?= $daftaralamat->nama_kota ?>
                                                            <?= $daftaralamat->nama_provinsi ?>
                                                        <?php endforeach; ?>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                            <tr>
                                                <td colspan="3" align="right"> Total</td>
                                                <td colspan="2"> Rp.
                                                    <?php
                                                    $ongkirnyaselesai = $jmlpesananselesai + $pesananselesai->ongkir;
                                                    echo number_format($ongkirnyaselesai)
                                                    ?>
                                                </td>
                                            </tr>


                                </table>
                                <!-- <div class="card-body d-flex align-items-center justify-content-between">
                                    <button onclick="lanjutkanCheckout('<?= base_url('wp-lanjutkan-checkout/' . $row->id_trx); ?>')" class="btn btn-success btn-block" style="color:#FFFFFF">Lanjutkan Pesanan</button>
                                </div>
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <button onclick="batalkanpesanan('<?= base_url('wp-hapus-old-order/' . $row->id_trx); ?>')" class="btn btn-danger btn-block" style="color:#FFFFFF">Batalkan Pesaan</button>
                                </div> -->
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<br>
<br>
<br>
<script>
    function openCity(cityName, titlemenu, tab) {
        for (var t = 1; t < 6; t++) {
            if (tab == "tab" + t) {
                $('.titlemenu').html('');
                $('.titlemenu').append(titlemenu);
                $('#' + tab).addClass('activeku');
            } else {
                $('#tab' + t).removeClass('activeku');
            }
        }

        var i;
        var x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        document.getElementById(cityName).style.display = "block";
    }
</script>