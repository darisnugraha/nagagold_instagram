
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
    .notify-item {
        position: relative;
        right: -7px;
        top: -9px;
        background: red;
        text-align: center;
        border-radius: 50px 50px 50px 50px;
        color: white;
        padding: 5px 5px;
        /* font-size: 10px; */
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
                <?php
                            $notifmenunggukonfirmasi ='';
                            $notifmenunggupembayaran ='';
                            $notifproses ='';
                            $notiffinish ='';
                            $jum_open = 0;
                            $jum_bayar = 0;
                            $jum_PROSES = 0;
                            $jum_FINISH =0;
                            // $counbarang ='0';
                            foreach($CountItem->data as $jumlahnya){
                                    $counbarang = count($jumlahnya->status_trx);
                                    if($jumlahnya->status_trx=="OPEN"){
                                        $jum_open = $jum_open + $counbarang; 
                                    }else if($jumlahnya->status_trx=="BAYAR"){
                                        $jum_bayar = $jum_bayar + $counbarang;
                                    }else if($jumlahnya->status_trx=="PROSES"){
                                        $jum_PROSES = $jum_PROSES + $counbarang;
                                    }else if($jumlahnya->status_trx == "KIRIM" || $jumlahnya->status_trx == "AMBIL"){
                                        $jum_FINISH = $jum_FINISH + $counbarang;
                                    }
                                }
                                if($jum_open>0){
                                    $notifmenunggupembayaran = '<span class="notify-item"> '.$jum_open.' </span>';
                                }
                                if($jum_bayar>0){
                                    $notifmenunggukonfirmasi = '<span class="notify-item"> '.$jum_bayar.' </span>';
                                }
                                if($jum_PROSES>0){
                                    $notifproses = '<span class="notify-item"> '.$jum_PROSES.' </span>';
                                }
                                if($jum_FINISH>0){
                                    $notiffinish = '<span class="notify-item"> '.$jum_FINISH.' </span>';
                                }
                            ?>
                <div class="table-responsive container">
                    <div class="ignielHorizontal">
                    <ul>
                        <li><button onclick="openCity('menunggupembayaran','Menunggu Pembayaran','tab1')" id="tab1" class="buttonku activeku">  Menunggu Pembayaran <?= $notifmenunggupembayaran ?> </button></li>
                        <li><button onclick="openCity('menunggukonfirmasi','Menunggu Konfirmasi','tab2')" id="tab2" class="buttonku">Menunggu Konfirmasi <?= $notifmenunggukonfirmasi ?></button></li>
                        <li><button onclick="openCity('pesanandalamproses','Pesanan Dalam Proses','tab3')" id="tab3" class="buttonku">Pesanan Dalam Proses <?= $notifproses ?></button></li>
                        <li><button class="buttonku" onclick="openCity('pesanandalampengiriman','Pesanan Sedang Dikirim','tab4')" id="tab4">Proses Pengiriman / Ambil <?= $notiffinish ?></button></li>
                        <!-- <li><button class="buttonku" onclick="openCity('pesanansudahsampai','Pesanan Sudah Sampai','tab5')" id="tab5">Pesanan Selesai</button></li> -->
                    </ul>
                    </div>
                </div>
            </div>
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
                    <div class="formbtlpenjualan-<?=$row->id_trx ?>" >
                        <div class="cart-table card mb-3">
                            <div class="card shipping-method-choose-title-card bg-success">
                                <div class="card-body">
                                    <h6 class="text-center mb-0 text-white">No Transaksi <br> <?= $row->id_trx ?></h6>
                                </div>
                            </div>
                            <div class="table-responsive container">
                                <table class="table mb-0">
                                    <tbody>
                                        <div class="row">
                                            <tr>
                                                <th>#</th>
                                                <th>Produk</th>
                                                <th nowrap>Nama Barang</th>
                                                <th>Qty</th>
                                                <th>Harga</th>
                                                <th>Total</th>
                                            </tr>
                                            <?php
                                            $no = 1;
                                            $jml = 0;
                                            foreach ($row->detail_barang  as  $detail) :
                                                $jml += $detail->harga + $detail->ongkos;
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?= $no++ ?>
                                                    </td>
                                                    <?php $databarang = $detail->gambar;
                                                    for ($i = 0; $i < 1; $i++) : ?>
                                                        <td> <img class="mb-2" onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?= $databarang[$i]->lokasi_gambar?>" alt=""> </td>
                                                    <?php endfor; ?>
                                                    <td >
                                                        <?= $detail->nama_barang ?><br>
                                                        Berat :<?= $detail->berat  ?><br>
                                                        Ongkos Produksi :<?= number_format($detail->ongkos)  ?>
                                                    </td>
                                                    <td>1</td>
                                                    <td><?= number_format($detail->harga) ?></td>
                                                    <td><?= number_format($detail->harga + $detail->ongkos) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <?php
                                            if ($row->type_trx == "KIRIM") : ?>
                                                <tr>
                                                    <td colspan="5" align="right"> Pengiriman :</td>
                                                    <td colspan="2"> <?= $row->jenis_courier ?> </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" align="right">Ongkir :</td>
                                                    <td colspan="2"> <?= number_format($row->ongkir) ?> </td>
                                                </tr>
                                                <tr>
                                                <td colspan="5" align="right"> Total :</td>
                                                <td colspan="2" nowrap> Rp. 
                                                    <?php $ongkirnya = $jml + $row->ongkir ;
                                                    echo number_format($ongkirnya)
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="4" align="right"></td>
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
                                                <tr>
                                                <td colspan="5" align="right"> Total Dp :</td>
                                                <td colspan="2" nowrap> Rp.
                                                    <?php $ongkirnyadp = $jml + $row->ongkir ;
                                                    echo number_format($ongkirnyadp/2)
                                                    ?>
                                                </td>
                                                </tr>
                                                <tr>
                                                <td colspan="5" align="right"> Total :</td>
                                                <td colspan="2" nowrap> Rp.
                                                    <?php $ongkirnyaasli = $jml + $row->ongkir ;
                                                    echo number_format($ongkirnyaasli)
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                           
                                </table>
                                <div class="card-body align-items-center justify-content-between">
                                    <div class="row">
                                        <div class="col-6"><a href="<?= base_url('konfirmasipembayaran/' . $row->id_trx) ?>" class="btn btn-success btn-block" style="color:#FFFFFF">Lanjutkan Pembayaran</a></div>
                                        <div class="col-6">
                                            <button onclick="batalpenjualan('<?= $row->id_trx ?>')" style="display:block;color:#FFFFFF"  class="btn btn-success btn-block btn-batalpenjualan-<?= $row->id_trx ?>">Batalkan Pesanan</button> 
                                            <button class="btn btn-success  btn-block btn-batalpenjualan-loading-<?= $row->id_trx ?>" style="cursor: not-allowed; display:none" type="button"> <i class="fa fa-spinner fa-spin"></i> </button>
                                            
                                        </div>
                                    </div>
                                    <!-- 
                                    -->
                                </div>
                               
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

        </div>

        <div id="menunggukonfirmasi" class="w3-container city" style="display:none">

            <?php
            $totharga = 0;
            foreach ($DataCart->data  as $menunggukonfirmasi) :
                // $totharga += $menunggukonfirmasi->harga;
                // $jml = count($DataKeranjang->data);
                $ongkirmenunggukonfirmasi += $menunggukonfirmasi->ongkir;
            ?>
                <?php if ($menunggukonfirmasi->status_trx == "BAYAR") : ?>
                    <div class="">
                        <div class="cart-table card mb-3">
                            <div class="card shipping-method-choose-title-card bg-success">
                                <div class="card-body">
                                    <h6 class="text-center mb-0 text-white">No Transaksi <br> <?= $menunggukonfirmasi->id_trx ?></h6>
                                </div>
                            </div>
                            <div class="table-responsive container">
                                <table class="table mb-0">
                                    <tbody>
                                        <div class="row">
                                            <!-- <tr>
                                                <td colspan="5">No Transaksi : <?= $menunggukonfirmasi->id_trx ?></td>
                                            </tr> -->
                                            <tr>
                                                <th>#</th>
                                                <th>Produk</th>
                                                <th>Nama Barang</th>
                                                <th>Qty</th>
                                                <th>Harga</th>
                                                <th>Total</th>
                                            </tr>
                                            <?php
                                            $no = 1;
                                            $jmldetailmenunggukonfirmasi = 0;
                                            foreach ($menunggukonfirmasi->detail_barang  as  $detailmenunggukonfirmasi) :
                                                $jmldetailmenunggukonfirmasi += $detailmenunggukonfirmasi->harga + $detailmenunggukonfirmasi->ongkos;
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?= $no++ ?>
                                                    </td>
                                                    <?php $databarang = $detailmenunggukonfirmasi->gambar;
                                                    for ($i = 0; $i < 1; $i++) : ?>
                                                        <td> <img class="mb-2" onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?=  $databarang[$i]->lokasi_gambar?>" alt=""> </td>
                                                    <?php endfor; ?>
                                                    <td>
                                                        <?= $detailmenunggukonfirmasi->nama_barang ?><br>
                                                        Berat :<?= $detailmenunggukonfirmasi->berat  ?><br>
                                                        Ongkos Produksi :<?= number_format($detailmenunggukonfirmasi->ongkos)  ?>
                                                    </td>
                                                    <td>1</td>
                                                    <td><?= number_format($detailmenunggukonfirmasi->harga) ?></td>
                                                    <td><?= number_format($detailmenunggukonfirmasi->harga+$detailmenunggukonfirmasi->ongkos) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <?php
                                            if ($menunggukonfirmasi->type_trx == "KIRIM") : ?>
                                                <tr>
                                                    <td colspan="5" align="right"> Pengiriman :</td>
                                                    <td colspan="2"> <?= $menunggukonfirmasi->jenis_courier ?> </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" align="right">Ongkir :</td>
                                                    <td colspan="2"> <?= number_format($menunggukonfirmasi->ongkir) ?> </td>
                                                </tr>
                                                <tr>
                                                <td colspan="5" align="right"> Total :</td>
                                                    <td colspan="2" nowrap> Rp.
                                                        <?php
                                                        $totalkirim = $jmldetailmenunggukonfirmasi + $menunggukonfirmasi->ongkir;
                                                        echo number_format($totalkirim)
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php else : ?>
                                                <tr>
                                                    <td colspan="4" align="right"></td>
                                                    <td colspan="3" align="right">
                                                        Ambil Ditoko<br>
                                                        Lokasi Pengambilan<br>
                                                        <?php $no = 1;
                                                        foreach ($menunggukonfirmasi->toko as $daftaralamat) : ?>

                                                            <?= $daftaralamat->alamat_lengkap ?>
                                                            Kec.<?= $daftaralamat->nama_kecamatan ?>
                                                            <?= $daftaralamat->nama_kota ?>
                                                            <?= $daftaralamat->nama_provinsi ?>
                                                        <?php endforeach; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                <td colspan="5" align="right"> Total  Dp:</td>
                                                    <td colspan="2" nowrap> Rp.
                                                        <?php
                                                        $ongkirnya_m = $jmldetailmenunggukonfirmasi + $menunggukonfirmasi->ongkir;
                                                        echo number_format($ongkirnya_m/2)
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                <td colspan="5" align="right"> Total :</td>
                                                    <td colspan="2" nowrap> Rp.
                                                        <?php
                                                        $ongkirnya_t = $jmldetailmenunggukonfirmasi+ $menunggukonfirmasi->ongkir;
                                                        echo number_format($ongkirnya_t)
                                                        ?>
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
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

        </div>

        <div id="pesanandalamproses" class="w3-container city" style="display:none">
            <?php
            $totharga = 0;
            foreach ($DataCart->data  as $pesanandalamproses) :
                $ongkipesanandalamproses += $pesanandalamproses->ongkir;

                // $totharga += $pesanandalamproses->harga;
                // $jml = count($DataKeranjang->data);
            ?>
                <?php if ($pesanandalamproses->status_trx == "PROSES") : ?>
                    <div class="">
                        <div class="cart-table card mb-3">
                            <div class="card shipping-method-choose-title-card bg-success">
                                <div class="card-body">
                                    <h6 class="text-center mb-0 text-white">No Transaksi <br> <?= $pesanandalamproses->id_trx ?></h6>
                                </div>
                            </div>
                            <div class="table-responsive container">
                                <table class="table mb-0">
                                    <tbody>
                                        <div class="row">
                                            <!-- <tr>
                                                <td colspan="5">No Transaksi : <?= $pesanandalamproses->id_trx ?></td>
                                            </tr> -->
                                            <tr>
                                                <th>#</th>
                                                <th>Produk</th>
                                                <th nowrap>Nama Barang</th>
                                                <th>Qty</th>
                                                <th>Harga</th>
                                                <th>Total</th>
                                            </tr>
                                            <?php
                                            $no = 1;
                                            $jmldetailproses = 0;
                                            foreach ($pesanandalamproses->detail_barang  as  $detailproses) :
                                                $jmldetailproses += $detailproses->harga + $detailproses->ongkos;
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?= $no++ ?>
                                                    </td>
                                                    <?php $databarang = $detailproses->gambar;
                                                    for ($i = 0; $i < 1; $i++) : ?>
                                                        <td> <img class="mb-2" onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?=  $databarang[$i]->lokasi_gambar ?>" alt=""> </td>
                                                    <?php endfor; ?>
                                                    <td>
                                                        <?= $detailproses->nama_barang ?><br>
                                                        Berat :<?= $detailproses->berat  ?><br>
                                                        Ongkos Produksi :<?= number_format($detailproses->ongkos)  ?><br>
                                                    </td>
                                                    <td>1</td>
                                                    <td><?= number_format($detailproses->harga) ?></td>
                                                    <td><?= number_format($detailproses->harga+$detailproses->ongkos) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <?php
                                            if ($pesanandalamproses->type_trx == "KIRIM") : ?>
                                                <tr>
                                                    <td colspan="4" align="right"> Pengiriman :</td>
                                                    <td colspan="2"> <?= $pesanandalamproses->jenis_courier ?> </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" align="right">Ongkir :</td>
                                                    <td colspan="2"> <?= number_format($pesanandalamproses->ongkir) ?> </td>
                                                </tr>
                                                <tr>
                                                <td colspan="4" align="right"> Total :</td>
                                                <td colspan="2" > Rp.
                                                    <?php
                                                    $ongkirnyaproses = $jmldetailproses + $pesanandalamproses->ongkir;
                                                    echo number_format($ongkirnyaproses)
                                                    ?>
                                                </td>
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
                                                <tr>
                                                <td colspan="5" nowrap align="right"> Total Dp:</td>
                                                <td colspan="2" > Rp.
                                                    <?php
                                                    $ongkirnyaprosesdp = $jmldetailproses + $pesanandalamproses->ongkir;;
                                                    echo number_format($ongkirnyaprosesdp/2)
                                                    ?>
                                                </td>
                                            </tr>
                                                <tr>
                                                <td colspan="5" nowrap align="right"> Total :</td>
                                                <td colspan="2" nowrap> Rp.
                                                    <?php
                                                    $ongkirnyaproses = $jmldetailproses + $pesanandalamproses->ongkir;;
                                                    echo number_format($ongkirnyaproses)
                                                    ?>
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
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

        </div>
        <div id="pesanandalampengiriman" class="w3-container city" style="display:none">

            <?php
            $totharga = 0;
            $ongkirku = 0;
           
            foreach ($DataCart->data  as $pesanankirim) :
                $ongkirku = $pesanankirim->ongkir;
                $ongkipesanankirim += $pesanandalamproses->ongkir;
                // $jml = count($DataKeranjang->data);

            ?>
                <?php if ($pesanankirim->status_trx == "KIRIM" || $pesanankirim->status_trx == "AMBIL") : ?>
                    <div class="">
                        <div class="cart-table card mb-3 data-transaksi-<?= $pesanankirim->id_trx ?>" >
                            <div class="card shipping-method-choose-title-card bg-success">
                                <div class="card-body">
                                    <h6 class="text-center mb-0 text-white">No Transaksi <br><?= $pesanankirim->id_trx ?></h6>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <tbody>
                                        <div class="row">
                                            <!-- <tr>
                                                <td colspan="5">No Transaksi : <?= $pesanankirim->id_trx ?></td>
                                            </tr> -->
                                            <tr>
                                                <th>#</th>
                                                <th>Produk</th>
                                                <th>Nama Barang</th>
                                                <th>Qty</th>
                                                <th>Harga</th>
                                                <th>Total</th>
                                            </tr>
                                            <?php
                                            $no = 1;
                                            $jmldetailkirim = 0;
                                            foreach ($pesanankirim->detail_barang  as  $detailkirim) :
                                                $jmldetailkirim += $detailkirim->harga + $detailkirim->ongkos;
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?= $no++ ?>
                                                    </td>
                                                    <?php $databarang = $detailkirim->gambar;
                                                    for ($i = 0; $i < 1; $i++) : ?>
                                                        <td> <img class="mb-2" onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?= $databarang[$i]->lokasi_gambar ?>" alt=""> </td>
                                                    <?php endfor; ?>
                                                    <td>
                                                        <?= $detailkirim->nama_barang ?><br>
                                                        Berat :<?= $detailkirim->berat  ?><br>
                                                        Ongkos Produksi :<?= number_format($detailkirim->ongkos)  ?><br>
                                                    </td>
                                                    <td>1</td>
                                                    <td><?= number_format($detailkirim->harga) ?></td>
                                                    <td><?= number_format($detailkirim->harga + $detailkirim->ongkos) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <?php
                                            if ($pesanankirim->type_trx == "KIRIM") : ?>
                                                <tr>
                                                    <td colspan="4" align="right"> Pengiriman</td>
                                                    <td colspan="2"> <?= $pesanankirim->jenis_courier ?> </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4" align="right">Ongkir</td>
                                                    <td colspan="2"> <?= number_format($pesanankirim->ongkir) ?> </td>
                                                </tr>
                                                <tr>
                                                <td colspan="4" align="right"> Total</td>
                                                <td colspan="2"> Rp.
                                                    <?php
                                                    $ongkirnya23 = $jmldetailkirim + $pesanankirim->ongkir;
                                                    echo number_format($ongkirnya23)
                                                    ?>
                                                </td>
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
                                                <tr>
                                                <td colspan="5" align="right"> Total Dp</td>
                                                <td colspan="2" nowrap> Rp.
                                                    <?php
                                                    $ongkirnya = $jmldetailkirim + $pesanankirim->ongkir;
                                                    echo number_format($jmldetailkirim/2)
                                                    ?>
                                                </td>
                                            </tr>
                                                <tr>
                                                <td colspan="5" align="right"> Total</td>
                                                <td colspan="2" nowrap> Rp.
                                                    <?php
                                                    $ongkirnya = $jmldetailkirim + $pesanankirim->ongkir;
                                                    echo number_format($jmldetailkirim)
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php endif; ?>
                                            

                                            <?php if ($pesanankirim->status_trx == "KIRIM") : ?>
                                                <tr>
                                                    <td colspan="3">
                                                        <div class="card-body d-flex align-items-center justify-content-between">
                                                        <?php
                                                            $kurir = explode('-',$pesanankirim->jenis_courier);
                                                            $kurirnya = strtolower(str_replace(' ','',$kurir[0]));
                                                            if($kurirnya=="j&t"){
                                                                $kurirasli = "jnt";
                                                            }else{
                                                                $kurirasli = strtolower(str_replace(' ','',$kurir[0]));
                                                            }
                                                            ?>
                                                            <!-- <a href="<?= base_url('cek-status-pesanan/' . $pesanankirim->no_resi.'/'.str_replace(' ','',$kurir[0])); ?>" class="btn btn-success btn-block" style="color:#FFFFFF">Cek Status Pesanan</a> -->
                                                            <button onclick="cekstatuspesanan('<?=  $pesanankirim->no_resi ?>','<?=  $kurirasli ?>')" class="btn btn-success btn-block btn-detail-<?= $pesanankirim->no_resi ?>" style="color:#FFFFFF; display:block">
                                                            Cek Status Pesanan</button>
                                                            <button class="btn btn-success btn-block btn-loading-<?= $pesanankirim->no_resi ?>" style="cursor: not-allowed; display:none"> <i class="fa fa-spinner fa-spin"></i> </button>
                                                        </div>
                                                    </td>
                                                    <td colspan="4">
                                                        <div class="card-body d-flex align-items-center justify-content-between">
                                                            <!-- <button onclick="pernerimaanpesanan('<?= base_url('wp-terima-pesanan/' . $pesanankirim->id_trx); ?>')" class="btn btn-success btn-block" style="color:#FFFFFF">Terima Pesanan</button> -->
                                                            <button onclick="terimapesanan('<?= $pesanankirim->id_trx ?>')" class="btn btn-success btn-block btn-terima-pesanan-<?= $pesanankirim->id_trx ?>" style="color:#FFFFFF">Terima Pesanan</button>
                                                            <button class="btn btn-success btn-block btn-loading-<?= $pesanankirim->id_trx ?>" style="cursor: not-allowed; display:none" type="button"> <i class="fa fa-spinner fa-spin"></i> </button>
                                                            
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php else : ?>
                                                <tr>
                                                    <td>
                                                    <td colspan="6">
                                                        <div class="card-body d-flex align-items-center justify-content-between">
                                                        <!-- <button onclick="terimapesanan('<?= $pesanankirim->id_trx ?>')" class="btn btn-success btn-block btn-terima-pesanan-<?= $pesanankirim->id_trx ?>" style="color:#FFFFFF">Terima Pesanan</button> -->
                                                        <button class="btn btn-success btn-block btn-loading-<?= $pesanankirim->id_trx ?>" style="cursor: not-allowed; display:none" type="button"> <i class="fa fa-spinner fa-spin"></i> </button>

                                                            <!-- <button onclick="pernerimaanpesanan('<?= base_url('wp-terima-pesanan/' . $pesanankirim->id_trx); ?>')" class="btn btn-success btn-block" style="color:#FFFFFF">Terima Pesanan</button> -->
                                                        </div>
                                                    </td>
                                                    </td>
                                                </tr>

                                            <?php endif; ?>

                                </table>
                            </div>
                            <div class="table-responsive container">

                                <table class="table table-striped tbl_detail_kirim-<?= $pesanankirim->no_resi ?>" style="display: none;">
                                    <thead>
                                    <tr>
                                        <td colspan="2" align="center" > <div class="kurir-<?= $pesanankirim->no_resi ?>"></div></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>Keterangan</td>
                                    </tr>
                                    </thead>
                                    <tbody class="body_detail_kirim-<?= $pesanankirim->no_resi ?>">
                                    
                                    </tbody>
                                </table>
                               
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

        </div>
        <div id="pesanansudahsampai" class="w3-container city" style="display:none">

            <?php
            $totharga = 0;
            // var_dump($DataCart->data);
            foreach ($DataCart->data  as $pesananselesai) :
                // $totharga += $pesananselesai->harga;
                // $jml = count($DataKeranjang->data);
            ?>
                <?php if ($pesananselesai->status_trx == "FINISH") : ?>
                    <div class="cart-wrapper-area py-3">
                        <div class="cart-table card mb-3">
                            <div class="card shipping-method-choose-title-card bg-success">
                                <div class="card-body">
                                    <h6 class="text-center mb-0 text-white">No Transaksi : <?= $pesananselesai->id_trx ?></h6>
                                </div>
                            </div>
                            <div class="table-responsive container">
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
                                                        <td> <img class="mb-2" onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?= $databarang[$i]->lokasi_gambar ?>" alt=""> </td>
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
                                            if ($pesananselesai->type_trx == "KIRIM") : ?>
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
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>


        </div>
    </div>

</div>
<br>
<br>
<br>
<script>
    $(document).ready(function() {
        window.history.replaceState('','',window.location.href);
    })
    function batalpenjualan(id){
        $('.btn-batalpenjualan-'+id).hide();
        $('.btn-batalpenjualan-loading-'+id).show();
        Swal.fire({
		title: "Konfirmasi Batal Pesanan ?",
		text: "Apakah Anda Yakin Ingin Membatlkan Pesanan Ini ?",
		type: "question",
		showCancelButton: true,
		confirmButtonText: "Yakin",
		cancelButtonText: "Tidak",
		reverseButtons: true,
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: base_url + "set-batal-penjualan",
                    dataType: 'json',
                    method: 'POST',
                    data: {
                        id_trx: id
                    },
                    success: function(respons) {
                        console.log(respons);
                        if(respons.status=="berhasil"){
                            Swal.fire(
                                'Success!',
                                ''+respons.pesan+'',
                                'success'
                            )            
                            $('.formbtlpenjualan-'+id).remove();
                            $('.btn-batalpenjualan-'+id).show();
                            $('.btn-batalpenjualan-loading-'+id).hide();
                        }else{
                            Swal.fire(
                                'Opps!',
                                ''+respons.pesan+'',
                                'info'
                            )      
                            $('.btn-batalpenjualan-'+id).show();
                            $('.btn-batalpenjualan-loading-'+id).hide();
                        }
                    }
                })
            }else{
                $('.btn-batalpenjualan-'+id).show();
                $('.btn-batalpenjualan-loading-'+id).hide();    
            }
        });
    }
    function terimapesanan(id){
        // console.log(id);
        // no_transaksi
        $('.btn-terima-pesanan-'+id).hide();
        $('.btn-loading-'+id).show();
        Swal.fire({
		title: "Konfirmasi Terima Pesanan ?",
		text: "Apakah Pesanan Anda Sudah Sampai ?",
		type: "question",
		showCancelButton: true,
		confirmButtonText: "Sudah",
		cancelButtonText: "Belum",
		reverseButtons: true,
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: base_url + "wp-terima-pesanan",
                    dataType: 'json',
                    method: 'POST',
                    data: {
                        no_transaksi: id
                    },
                    success: function(respons) {
                        // console.log(respons);
                        if(respons.status=="berhasil"){
                            Swal.fire(
                                'Success!',
                                ''+respons.pesan+'',
                                'success'
                            )            
                            $('.data-transaksi-'+id).remove();
                            $('.btn-terima-pesanan-'+id).show();
                            $('.btn-loading-'+id).hide();
                        }else{
                            Swal.fire(
                                'Opps!',
                                ''+respons.pesan+'',
                                'info'
                            )      
                            $('.btn-terima-pesanan-'+id).show();
                            $('.btn-loading-'+id).hide();      
                        }
                    }
                })
            }else{
                $('.btn-terima-pesanan-'+id).show();
                $('.btn-loading-'+id).hide();      
            }
        });
      
    }
    function cekstatuspesanan(no_resi,kurir){
     $('.btn-detail-'+no_resi).hide();
       $('.btn-loading-'+no_resi).show();
        $.ajax({
            url: base_url + "cekresi",
            dataType: 'json',
            method: 'POST',
            data: {
                no_resi: no_resi,
                kurir: kurir
            },
            success: function(respons) {
                if(respons.status=="berhasil"){
                    $('.btn-loading-'+no_resi).hide();
                    $('.btn-detail-'+no_resi).show();
                    $('.tbl_detail_kirim-'+no_resi).show();
                    $('.kurir-'+no_resi).html('');
                    $('.body_detail_kirim-'+no_resi).html('');

                    $('.kurir-'+no_resi).append('Kurir : '+kurir + '<br> No Resi : '+no_resi);
                    $.each(respons.data, function(index, element) {
                        $('.body_detail_kirim-'+no_resi).append(
                            `
                                <tr>
                                    <td>`+element.manifest_date+` `+element.manifest_time+`</td>
                                    <td>`+element.manifest_description+` : `+element.city_name+` </td>
                                </tr>
                            `
                        );
                    });
                }else{
                    $('.btn-loading-'+no_resi).hide();
                     $('.btn-detail-'+no_resi).show();

                    Swal.fire(
                        'Opps!',
                        ''+respons.pesan+'',
                        'info'
                    )            
                }
            }
        })
    }
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