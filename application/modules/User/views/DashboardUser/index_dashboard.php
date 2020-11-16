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
    .card{
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0,0,0,.125);
    border-radius: .25rem;
}
.badge-success, .bg-success,.btn-success {
    color: white;
    background-color: #2a166f!important;
}
    .shipping-method-choose-title-card {
        border-radius: 1rem 1rem 0 0;
        border-color: #2a166f;
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
      .item {

        /* padding-right:8px; */
        padding-top: 2px;
        position: relative;
        /* position:relative;
        padding-top:20px;
        display:inline-block; */
      }
</style>
<style>
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
<main class="main">

    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Account</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <div class="row">
                    <aside class="col-md-4 col-lg-3">
                        <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">History Transaksi Pembelian</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-history-link" data-toggle="tab" href="#tab-history" role="tab" aria-controls="tab-history" aria-selected="false" aria-expanded="true">History Transaksi</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" id="tab-downloads-link" data-toggle="tab" href="#tab-downloads" role="tab" aria-controls="tab-downloads" aria-selected="false" aria-expanded="true">Estimasi Pengajuan Penjualan</a>
                            </li> -->
                            <li class="nav-item <?= $this->session->flashdata('slider_alamat') ?>">
                                <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address" role="tab" aria-controls="tab-address" aria-selected="false">Daftar Alamat</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Akun Detail</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('logout') ?>">Sign Out</a>
                            </li>
                        </ul>
                    </aside><!-- End .col-lg-3 -->

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                <p>Selamat Datang <span class="font-weight-normal text-dark"><?= $this->session->userdata('nama_customer') ?></span>
                                    <br>
                                    Dari dasbor akun Anda, Anda dapat melihat <a href="#tab-orders" class="tab-trigger-link link-underline">pesanan baru</a>, mengelola <a href="#tab-address" class="tab-trigger-link">alamat pengiriman</a>, dan <a href="#tab-account" class="tab-trigger-link">mengganti akun detail dan password</a>.</p>
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade show" id="tab-history" role="tabpanel" aria-labelledby="tab-history-link">
                                <div id="load_data_history_trx"></div>
                                <div id="load_data_message_history_trx"></div>
                            </div><!-- .End .tab-pane -->


                            <div class="tab-pane fade" id="tab-statuspembelian" role="tabpanel" aria-labelledby="tab-statuspembelian-link">

                                <?php if ($DataPenjuealan == null) : ?>
                                    <p>No order has been made yet.</p>
                                    <a href="<?= base_url('Shop') ?>" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
                                <?php else : ?>
                                    <div class="col-sm-12">
                                        <?php if ($DataPenjuealan->status == "berhasil") : ?>

                                            <?php if ($DataPenjuealan->data == null) : ?>
                                                <tr>
                                                    <td colspan="4" align="Center"> List Order Masih Kosong </td>
                                                </tr>
                                            <?php else : ?>
                                                <?php foreach ($DataPenjuealan->data  as $dataPenjualan) : ?>
                                                    No Transaski :
                                                    <?= strtoupper($dataPenjualan->id_trx) ?><br>
                                                    Status : Belum Dibayar
                                                    <table class="customers table table-striped">
                                                        <thead>

                                                            <tr align="center">
                                                                <th>#</th>
                                                                <th>Nama Barang</th>
                                                                <th>Harga</th>
                                                                <th>Berat</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php
                                                            $no = 1;
                                                            $harga = 0;
                                                            $berat = 0;
                                                            foreach ($dataPenjualan->detail_barang  as $rowPenjualan) :
                                                                $harga += $rowPenjualan->harga;
                                                                $berat += $rowPenjualan->berat;
                                                            ?>
                                                                <tr>
                                                                    <td> <?= $no++ ?></td>
                                                                    <td><?= $rowPenjualan->nama_barang ?></td>
                                                                    <td>Rp. <?= number_format($rowPenjualan->harga) ?> </td>
                                                                    <td><?= $rowPenjualan->berat ?> </td>
                                                                </tr>
                                                            <?php endforeach; ?>

                                                            <tr>
                                                                <td colspan="2" align="right"></td>
                                                                <td> Rp. <?= number_format($harga) ?> </td>
                                                                <td> <?= $berat ?> </td>
                                                            </tr>
                                                            <?php if ($dataPenjualan->type_trx == "KIRIM") : ?>
                                                                <tr>
                                                                    <td colspan="2" align="right"> </td>
                                                                    <td align="right">Dikirim Oleh : </td>
                                                                    <td> <?= $dataPenjualan->jenis_courier ?> - Rp <?= number_format($dataPenjualan->ongkir) ?> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2" align="right"> </td>
                                                                    <td align="right">Ongkir: </td>
                                                                    <td> <?= number_format($dataPenjualan->ongkir) ?> </td>
                                                                </tr>
                                                            <?php else : ?>
                                                                <tr>
                                                                    <td colspan="2" align="right"> </td>
                                                                    <td align="right">Diambil Ditoko : </td>
                                                                    <?php foreach ($dataPenjualan->toko as $toko) : ?>
                                                                        <td> <?= $toko->nama_toko ?>, <br><?= $toko->alamat_lengkap ?> <br><?= $toko->nama_kota ?> <br>Kec.<?= $toko->nama_kecamatan ?>, <br>Kode Pos.<?= $toko->kode_pos ?>, <br>Provinsi.<?= $toko->nama_provinsi ?> </td>
                                                                    <?php endforeach; ?>
                                                                </tr>
                                                            <?php endif; ?>

                                                            <tr>
                                                                <td colspan="2" align="right"> </td>
                                                                <td align="right">Total Harga : </td>
                                                                <td> <?= number_format($harga) ?> </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" align="right"> </td>
                                                                <td align="right">Grand Total : </td>
                                                                <td> <?php $grand =  $harga + $dataPenjualan->ongkir;
                                                                        echo number_format($grand) ?> </td>

                                                            </tr>

                                                            <tr>
                                                                <td colspan="2" align="right"> </td>
                                                                <td align="right"> </td>
                                                                <td> <a href="<?= base_url('konfirmasipembayaran') ?>" class="btn btn-primary btn-sm"> Konfirmsi Pembayaran </a> </td>
                                                                </td>

                                                            </tr>

                                                        <tfoot>

                                                        </tfoot>
                                                        </tbody>

                                                    </table>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div><!-- .End .tab-pane -->
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
                                    $counbarang = count($jumlahnya->detail_barang);
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
                            <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                <div class="ignielHorizontal">
                                    <ul>
                                        <li><button onclick="openCity('menunggupembayaran','Menunggu Pembayaran','tab1')" id="tab1" class="buttonku activeku">  Menunggu Pembayaran <?= $notifmenunggupembayaran ?> </button></li>
                                        <li><button onclick="openCity('menunggukonfirmasi','Menunggu Konfirmasi','tab2')" id="tab2" class="buttonku">Menunggu Konfirmasi <?= $notifmenunggukonfirmasi ?></button></li>
                                        <li><button onclick="openCity('pesanandalamproses','Pesanan Dalam Proses','tab3')" id="tab3" class="buttonku">Pesanan Dalam Proses <?= $notifproses ?></button></li>
                                        <li><button class="buttonku" onclick="openCity('pesanandalampengiriman','Pesanan Sedang Dikirim','tab4')" id="tab4">Proses Pengiriman / Ambil <?= $notiffinish ?></button></li>
                                        <!-- <li><button class="buttonku" onclick="openCity('pesanansudahsampai','Pesanan Sudah Sampai','tab5')" id="tab5">Pesanan Selesai</button></li> -->
                                    </ul>
                                </div>
                                <div id="menunggupembayaran" class="city">

                                    <?php foreach ($DataCart->data  as $menunggupembayaran) :
                                    $ongkirmenunggubayar += $menunggupembayaran->ongkir;
                                    ?>
                                        <?php if ($menunggupembayaran->status_trx == "OPEN") : ?>
                                            <div class="col-sm-12 formbtlpenjualan-<?=$menunggupembayaran->id_trx ?>">
                                                <hr>
                                                No Transaksi : <?= $menunggupembayaran->id_trx ?>

                                                <table class="customers table table-striped">
                                                    <thead>
                                                        <tr align="center">
                                                            <th>#</th>
                                                            <th>Nama Barang</th>
                                                            <th>Qty</th>
                                                            <th>Harga Barang</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        $totalhargamenunggu = 0;
                                                        foreach ($menunggupembayaran->detail_barang as $row) :
                                                            $totalhargamenunggu += $row->harga + $row->ongkos;
                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <?= $no++ ?>
                                                                </td>
                                                                <td>
                                                                    <?= $row->nama_barang ?><br>
                                                                    Berat :<?= $row->berat  ?><br>
                                                                    Ongkos Produksi :<?= number_format($row->ongkos)  ?><br>
                                                                </td>
                                                                <td>1</td>
                                                                <td>Rp.<?= number_format($row->harga) ?></td>
                                                                <td>Rp.<?= number_format($row->harga + $row->ongkos) ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>

                                                        <?php if ($menunggupembayaran->type_trx == "KIRIM") : ?>
                                                            <tr>
                                                                <td colspan="3" align="right"> </td>
                                                                <td align="right">Dikirim Oleh : </td>
                                                                <td> <?= $menunggupembayaran->jenis_courier ?> - Rp <?= number_format($menunggupembayaran->ongkir) ?> </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3" align="right"> </td>
                                                                <td align="right">Ongkir: </td>
                                                                <td> <?= number_format($menunggupembayaran->ongkir) ?> </td>
                                                            </tr>
                                                           
                                                            <tr>
                                                            <td colspan="3" align="right"> </td>
                                                                <td align="right">Total Harga : </td>
                                                                <td>  <?php
                                                                    $ongkirnyamenunggu = $totalhargamenunggu + $menunggupembayaran->ongkir;
                                                                    echo number_format($ongkirnyamenunggu)
                                                                    ?> </td>
                                                            </tr>
                                                        <?php else : ?>
                                                            <tr>
                                                                <td colspan="3" align="right"> </td>
                                                                <td align="right">Diambil Ditoko : </td>
                                                                <?php foreach ($menunggupembayaran->toko as $toko1) : ?>
                                                                    <td> <?= $toko1->nama_toko ?>, <br><?= $toko1->alamat_lengkap ?> <br><?= $toko1->nama_kota ?> <br>Kec.<?= $toko1->nama_kecamatan ?>, <br>Kode Pos.<?= $toko1->kode_pos ?>, <br>Provinsi.<?= $toko1->nama_provinsi ?> </td>
                                                                <?php endforeach; ?>
                                                            </tr>
                                                            <tr>
                                                            <td colspan="3" align="right"> </td>
                                                                <td align="right">Total Dp : </td>
                                                                <td>  <?php
                                                                    $ongkirnyamenunggu = $totalhargamenunggu + $menunggupembayaran->ongkir;
                                                                    echo number_format($ongkirnyamenunggu/2)
                                                                    ?> </td>
                                                            </tr>
                                                            <tr>
                                                            <td colspan="3" align="right"> </td>
                                                                <td align="right">Total Harga : </td>
                                                                <td> <?php
                                                                    $ongkirnyamenunggu2 = $totalhargamenunggu + $menunggupembayaran->ongkir;
                                                                    echo number_format($ongkirnyamenunggu2)
                                                                    ?> </td>
                                                            </tr>
                                                        <?php endif; ?>

                                                       
                                                        <!-- <tr>
                                                            <td colspan="3" align="right"> </td>
                                                            <td align="right">Grand Total : </td>
                                                            <td> <?php $grandMenunggu =  $totalhargamenunggu + $menunggupembayaran->ongkir;
                                                                    echo number_format($grandMenunggu) ?> </td>

                                                        </tr> -->

                                                        <tr>
                                                            <td colspan="3" align="right"> </td>
                                                            <td align="right"> <a href="<?= base_url('konfirmasipembayaran/1') ?>" class="btn btn-primary btn-sm"> Konfirmsi Pembayaran </a> </td>
                                                            <td>
                                                                <button onclick="batalpenjualan('<?= $menunggupembayaran->id_trx ?>')" style="display:block"  class="btn btn-primary btn-sm btn-batalpenjualan-<?= $menunggupembayaran->id_trx ?>"> Batal Penjualan </button> 
                                                                <button class="btn btn-primary btn-sm  btn-block btn-batalpenjualan-loading-<?= $menunggupembayaran->id_trx ?>" style="cursor: not-allowed; display:none" type="button"> <i class="fa fa-spinner fa-spin"></i> </button>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>

                                </div>
                                <div id="menunggukonfirmasi" class="w3-container city" style="display:none">
                                    <?php foreach ($DataCart->data  as $menunggukonfirmasi) :
                                    ?>
                                        <?php if ($menunggukonfirmasi->status_trx == "BAYAR") : ?>
                                            <div class="col-sm-12">
                                                <hr>
                                                No Transaksi : <?= $menunggukonfirmasi->id_trx ?>
                                                <table class="customers table table-striped">
                                                    <thead>
                                                        <tr align="center">
                                                            <th>#</th>
                                                            <th>Nama Barang</th>
                                                            <th>Qty</th>
                                                            <th>Harga Barang</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        $totalmenunggukonfirmasi = 0;
                                                        foreach ($menunggukonfirmasi->detail_barang as $rowmenunggukonfirmasi) :
                                                            $totalmenunggukonfirmasi += $rowmenunggukonfirmasi->harga + $rowmenunggukonfirmasi->ongkos;
                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <?= $no++ ?>
                                                                </td>
                                                                <td>
                                                                    <?= $rowmenunggukonfirmasi->nama_barang ?><br>
                                                                    Berat :<?= $rowmenunggukonfirmasi->berat  ?><br>
                                                                    Ongkos Produksi :<?= $rowmenunggukonfirmasi->ongkos  ?><br>
                                                                </td>
                                                                <td>1</td>
                                                                <td>Rp.<?= number_format($rowmenunggukonfirmasi->harga) ?></td>
                                                                <td>Rp.<?= number_format($rowmenunggukonfirmasi->harga + $rowmenunggukonfirmasi->ongkos) ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>

                                                        <?php if ($menunggukonfirmasi->type_trx == "KIRIM") : ?>
                                                            <tr>
                                                                <td colspan="3" align="right"> </td>
                                                                <td align="right">Dikirim Oleh : </td>
                                                                <td> <?= $menunggukonfirmasi->jenis_courier ?> - Rp <?= number_format($menunggukonfirmasi->ongkir) ?> </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3" align="right"> </td>
                                                                <td align="right">Ongkir: </td>
                                                                <td> <?= number_format($menunggukonfirmasi->ongkir) ?> </td>
                                                            </tr>
                                                            <tr>
                                                            <td colspan="3" align="right"> </td>
                                                                <td align="right">Total Harga : </td>
                                                                <td>  <?php
                                                                        $ongkirnya1kirim = $totalmenunggukonfirmasi + $menunggukonfirmasi->ongkir;
                                                                        echo number_format($ongkirnya1kirim)
                                                                        ?> 
                                                                </td>
                                                            </tr>
                                                        <?php else : ?>
                                                            <tr>
                                                                <td colspan="3" align="right"> </td>
                                                                <td align="right">Diambil Ditoko : </td>
                                                                <?php foreach ($menunggukonfirmasi->toko as $toko1) : ?>
                                                                    <td> <?= $toko1->nama_toko ?>, <br><?= $toko1->alamat_lengkap ?> <br><?= $toko1->nama_kota ?> <br>Kec.<?= $toko1->nama_kecamatan ?>, <br>Kode Pos.<?= $toko1->kode_pos ?>, <br>Provinsi.<?= $toko1->nama_provinsi ?> </td>
                                                                <?php endforeach; ?>
                                                            </tr>
                                                            <tr>
                                                            <td colspan="3" align="right"> </td>
                                                                <td align="right">Total Dp : </td>
                                                                <td>  <?php
                                                                        $ongkirnya1dp = $totalmenunggukonfirmasi + $menunggukonfirmasi->ongkir;
                                                                        echo number_format($ongkirnya1dp/2)
                                                                        ?> 
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                            <td colspan="3" align="right"> </td>
                                                                <td align="right">Total Harga : </td>
                                                                <td>  <?php
                                                                        $ongkirnya1 = $totalmenunggukonfirmasi + $menunggukonfirmasi->ongkir;
                                                                        echo number_format($ongkirnya1)
                                                                        ?> 
                                                                </td>
                                                            </tr>

                                                        <?php endif; ?>

                                                       
                                                        <!-- <tr>
                                                            <td colspan="3" align="right"> </td>
                                                            <td align="right">Grand Total : </td>
                                                            <td> <?php $grandmenunggukonfirmasi =  $totalmenunggukonfirmasi + $menunggukonfirmasi->ongkir;
                                                                    echo number_format($grandmenunggukonfirmasi) ?> </td>

                                                        </tr> -->

                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                                <div id="pesanandalamproses" class="w3-container city" style="display:none">
                                    <?php foreach ($DataCart->data  as $pesanandalamproses) :
                                    ?>
                                        <?php if ($pesanandalamproses->status_trx == "PROSES") : ?>
                                            <div class="col-sm-12">
                                                <hr>
                                                No Transaksi : <?= $pesanandalamproses->id_trx ?>
                                                <table class="customers table table-striped">
                                                    <thead>
                                                        <tr align="center">
                                                            <th>#</th>
                                                            <th>Nama Barang</th>
                                                            <th>Qty</th>
                                                            <th>Harga Barang</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        $totalpesanandalamproses = 0;
                                                        foreach ($pesanandalamproses->detail_barang as $row) :
                                                            $totalpesanandalamproses += $row->harga + $row->ongkos;
                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <?= $no++ ?>
                                                                </td>
                                                                <td>
                                                                    <?= $row->nama_barang ?><br>
                                                                    Berat :<?= $row->berat  ?><br>
                                                                    Ongkos Produksi :<?= $row->ongkos  ?><br>
                                                                </td>
                                                                <td>1</td>
                                                                <td>Rp.<?= number_format($row->harga) ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>

                                                        <?php if ($pesanandalamproses->type_trx == "KIRIM") : ?>
                                                            <tr>
                                                                <td colspan="2" align="right"> </td>
                                                                <td align="right">Dikirim Oleh : </td>
                                                                <td> <?= $pesanandalamproses->jenis_courier ?> - Rp <?= number_format($pesanandalamproses->ongkir) ?> </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" align="right"> </td>
                                                                <td align="right">Ongkir: </td>
                                                                <td> <?= number_format($pesanandalamproses->ongkir) ?> </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" align="right"> </td>
                                                                <td align="right">Total Harga : </td>
                                                                <td>  <?php
                                                                            $ongkirnya1proses = $totalpesanandalamproses + $menunggukonfirmasi->ongkir;
                                                                            echo number_format($ongkirnya1proses)
                                                                            ?>  </td>
                                                            </tr>
                                                        <?php else : ?>
                                                            <tr>
                                                                <td colspan="2" align="right"> </td>
                                                                <td align="right">Diambil Ditoko : </td>
                                                                <?php foreach ($pesanandalamproses->toko as $toko1) : ?>
                                                                    <td> <?= $toko1->nama_toko ?>, <br><?= $toko1->alamat_lengkap ?> <br><?= $toko1->nama_kota ?> <br>Kec.<?= $toko1->nama_kecamatan ?>, <br>Kode Pos.<?= $toko1->kode_pos ?>, <br>Provinsi.<?= $toko1->nama_provinsi ?> </td>
                                                                <?php endforeach; ?>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" align="right"> </td>
                                                                <td align="right">Total Dp : </td>
                                                                <td>  <?php
                                                                            $ongkirnya1prosesdp = $totalpesanandalamproses + $pesanandalamproses->ongkir;
                                                                            echo number_format($ongkirnya1prosesdp/2)
                                                                            ?>  </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" align="right"> </td>
                                                                <td align="right">Total Harga : </td>
                                                                <td>  <?php
                                                                            $ongkirnya1prosestot = $totalpesanandalamproses + $pesanandalamproses->ongkir;
                                                                            echo number_format($ongkirnya1prosestot)
                                                                            ?>  </td>
                                                            </tr>
                                                        <?php endif; ?>

                                                        
                                                        <!-- <tr>
                                                            <td colspan="2" align="right"> </td>
                                                            <td align="right">Grand Total : </td>
                                                            <td> <?php $grandpesanandalamproses =  $totalpesanandalamproses + $pesanandalamproses->ongkir;
                                                                    echo number_format($grandpesanandalamproses) ?> </td>

                                                        </tr> -->

                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                                <div id="pesanandalampengiriman" class="w3-container city" style="display:none">

                                    <?php foreach ($DataCart->data  as $pesanandalampengiriman) :
                                    ?>
                                        <?php if ($pesanandalampengiriman->status_trx == "KIRIM" || $pesanandalampengiriman->status_trx == "AMBIL") : ?>
                                            <div class="col-sm-12 data-transaksi-<?= $pesanandalampengiriman->id_trx ?>">
                                                <hr>
                                                No Transaksi : <?= $pesanandalampengiriman->id_trx ?>
                                                <table class="customers table table-striped">

                                                    <thead>
                                                        <tr align="center">
                                                            <th>#</th>
                                                            <th>Nama Barang</th>
                                                            <th>Qty</th>
                                                            <th>Harga Barang</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        $totalpesanandalampengiriman = 0;
                                                        foreach ($pesanandalampengiriman->detail_barang as $row) :
                                                            $totalpesanandalampengiriman += $row->harga + $row->ongkos;
                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <?= $no++ ?>
                                                                </td>
                                                                <td>
                                                                    <?= $row->nama_barang ?><br>
                                                                    Berat :<?= $row->berat  ?><br>
                                                                    Ongkos Produksi :<?= number_format($row->ongkos)  ?><br>

                                                                </td>
                                                                <td>1</td>
                                                                <td>Rp.<?= number_format($row->harga) ?></td>
                                                                <td>Rp.<?= number_format($row->harga + $row->ongkos) ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>

                                                        <?php if ($pesanandalampengiriman->type_trx == "KIRIM") : ?>
                                                            <tr>
                                                                <td colspan="3" align="right"> </td>
                                                                <td align="right">Dikirim Oleh : </td>
                                                                <td> <?= $pesanandalampengiriman->jenis_courier ?> - Rp <?= number_format($pesanandalampengiriman->ongkir) ?> </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3" align="right"> </td>
                                                                <td align="right">Ongkir: </td>
                                                                <td> <?= number_format($pesanandalampengiriman->ongkir) ?> </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3" align="right"> </td>
                                                                <td align="right">Total Harga : </td>
                                                                <td> <?php
                                                                    $ongkirnya1pesananselesaitot1 = $totalpesanandalampengiriman + $pesanandalampengiriman->ongkir;
                                                                    echo number_format($ongkirnya1pesananselesaitot1)
                                                                    ?>  </td>
                                                            </tr>
                                                        <?php else : ?>
                                                            <tr>
                                                                <td colspan="3" align="right"> </td>
                                                                <td align="right">Diambil Ditoko : </td>
                                                                <?php foreach ($pesanandalampengiriman->toko as $toko1) : ?>
                                                                    <td> <?= $toko1->nama_toko ?>, <br><?= $toko1->alamat_lengkap ?> <br><?= $toko1->nama_kota ?> <br>Kec.<?= $toko1->nama_kecamatan ?>, <br>Kode Pos.<?= $toko1->kode_pos ?>, <br>Provinsi.<?= $toko1->nama_provinsi ?> </td>
                                                                <?php endforeach; ?>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3" align="right"> </td>
                                                                <td align="right">Total Dp : </td>
                                                                <td> <?php
                                                                    $ongkirnya1pesananselesaidp = $totalpesanandalampengiriman + $pesanandalampengiriman->ongkir;
                                                                    echo number_format($ongkirnya1pesananselesaidp/2)
                                                                    ?>  </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3" align="right"> </td>
                                                                <td align="right">Total Harga : </td>
                                                                <td> <?php
                                                                    $ongkirnya1pesananselesaitot = $totalpesanandalampengiriman + $pesanandalampengiriman->ongkir;
                                                                    echo number_format($ongkirnya1pesananselesaitot)
                                                                    ?>  </td>
                                                            </tr>
                                                        <?php endif; ?>

                                                        
                                                       
                                                        <?php if ($pesanandalampengiriman->status_trx == "KIRIM") : ?>
                                                            <?php
                                                            $kurir = explode('-',$pesanandalampengiriman->jenis_courier);
                                                            $kurirnya = strtolower(str_replace(' ','',$kurir[0]));
                                                            if($kurirnya=="j&t"){
                                                                $kurirasli = "jnt";
                                                            }else{
                                                                $kurirasli = strtolower(str_replace(' ','',$kurir[0]));
                                                            }
                                                            ?>
                                                            <tr>
                                                                <td colspan="3">
                                                                    <div class="card-body d-flex align-items-center justify-content-between">
                                                                        <button onclick="cekstatuspesanan('<?=  $pesanandalampengiriman->no_resi ?>','<?= $kurirasli  ?>')" class="btn activeku btn-block btn-block btn-detail-<?= $pesanandalampengiriman->no_resi ?>" style="color:#FFFFFF; display:block">
                                                                        Cek Status Pesanan</button>
                                                                        <button class="btn activeku btn-block btn-block btn-loading-<?= $pesanandalampengiriman->no_resi ?>" style="cursor: not-allowed; display:none"> <i class="fa fa-spinner fa-spin"></i> </button>
                                                                    </div>
                                                                </td>
                                                                <td colspan="2">
                                                                    <div class="card-body d-flex align-items-center justify-content-between">
                                                                        <!-- <button onclick="pernerimaanpesanan('<?= base_url('wp-terima-pesanan/' . $pesanandalampengiriman->id_trx); ?>')" class="btn activeku btn-block" style="color:#FFFFFF">Terima Pesanan</button> -->
                                                                        <button onclick="terimapesanan('<?= $pesanandalampengiriman->id_trx ?>')" class="btn activeku btn-block btn-terima-pesanan-<?= $pesanandalampengiriman->id_trx ?>" style="color:#FFFFFF">Terima Pesanan</button>
                                                                        <button class="btn activeku btn-block btn-loading-<?= $pesanandalampengiriman->id_trx ?>" style="cursor: not-allowed; display:none" type="button"> <i class="fa fa-spinner fa-spin"></i> </button>
                                                            
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php else : ?>
                                                            <tr>
                                                                <td colspan="5">
                                                                    <div class="card-body d-flex align-items-center justify-content-between">
                                                                    <button onclick="terimapesanan('<?= $pesanandalampengiriman->id_trx ?>')" class="btn activeku btn-block btn-terima-pesanan-<?= $pesanandalampengiriman->id_trx ?>" style="color:#FFFFFF">Terima Pesanan</button>
                                                                    <button class="btn activeku btn-block btn-loading-<?= $pesanandalampengiriman->id_trx ?>" style="cursor: not-allowed; display:none" type="button"> <i class="fa fa-spinner fa-spin"></i> </button>

                                                                        <!-- <button onclick="pernerimaanpesanan('<?= base_url('wp-terima-pesanan/' . $pesanandalampengiriman->id_trx); ?>')" class="btn activeku btn-block" style="color:#FFFFFF">Terima Pesanan</button> -->
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                        <?php endif; ?>

                                                    </tbody>
                                                </table>
                                                <table class="table table-striped tbl_detail_kirim-<?= $pesanandalampengiriman->no_resi ?>" style="display: none;">
                                                    <thead>
                                                    <tr>
                                                        <td colspan="2" align="center" > <div class="kurir-<?= $pesanandalampengiriman->no_resi ?>"></div></td>
                                                    </tr>
                                                    </thead>
                                                    <tbody class="body_detail_kirim-<?= $pesanandalampengiriman->no_resi ?>">
                                                
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                                <div id="pesanansudahsampai" class="w3-container city" style="display:none">
                                    <?php foreach ($DataCart->data  as $pesanansudahsampai) :
                                    ?>
                                        <?php if ($pesanansudahsampai->status_trx == "FINISH") : ?>
                                            <div class="col-sm-12">
                                                <table class="customers table table-striped">
                                                    <thead>
                                                        <tr align="center">
                                                            <th>#</th>
                                                            <th>Nama Barang</th>
                                                            <th>Qty</th>
                                                            <th>Harga Barang</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        $totalpesanansudahsampai = 0;
                                                        foreach ($pesanansudahsampai->detail_barang as $row) :
                                                            $totalpesanansudahsampai += $row->harga;
                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <?= $no++ ?>
                                                                </td>
                                                                <td>
                                                                    <?= $row->nama_barang ?><br>
                                                                    Berat :<?= $row->berat  ?>
                                                                </td>
                                                                <td>1</td>
                                                                <td>Rp.<?= number_format($row->harga) ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>

                                                        <?php if ($pesanansudahsampai->type_trx == "KIRIM") : ?>
                                                            <tr>
                                                                <td colspan="2" align="right"> </td>
                                                                <td align="right">Dikirim Oleh : </td>
                                                                <td> <?= $pesanansudahsampai->jenis_courier ?> - Rp <?= number_format($pesanansudahsampai->ongkir) ?> </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" align="right"> </td>
                                                                <td align="right">Ongkir: </td>
                                                                <td> <?= number_format($pesanansudahsampai->ongkir) ?> </td>
                                                            </tr>
                                                        <?php else : ?>
                                                            <tr>
                                                                <td colspan="2" align="right"> </td>
                                                                <td align="right">Diambil Ditoko : </td>
                                                                <?php foreach ($pesanansudahsampai->toko as $toko1) : ?>
                                                                    <td> <?= $toko1->nama_toko ?>, <br><?= $toko1->alamat_lengkap ?> <br><?= $toko1->nama_kota ?> <br>Kec.<?= $toko1->nama_kecamatan ?>, <br>Kode Pos.<?= $toko1->kode_pos ?>, <br>Provinsi.<?= $toko1->nama_provinsi ?> </td>
                                                                <?php endforeach; ?>
                                                            </tr>
                                                        <?php endif; ?>

                                                        <tr>
                                                            <td colspan="2" align="right"> </td>
                                                            <td align="right">Total Harga : </td>
                                                            <td> <?= number_format($totalpesanansudahsampai) ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" align="right"> </td>
                                                            <td align="right">Grand Total : </td>
                                                            <td> <?php $grandpesanansudahsampai =  $totalpesanansudahsampai + $pesanansudahsampai->ongkir;
                                                                    echo number_format($grandpesanansudahsampai) ?> </td>

                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php else : ?>

                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>

                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-downloads" role="tabpanel" aria-labelledby="tab-downloads-link">
                                <div class="col-sm-12">
                                    <table class="customers table table-striped">
                                        <thead>
                                            <tr align="center">
                                                <th>#</th>
                                                <th>Tanggal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr align="center">
                                                <td><input type="radio"></td>
                                                <td>Otto</td>
                                                <td width="10%"><button type="button" class="btn btn-primary btn-sm">Hapus</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
                                <p>Daftar Alamat Pengiriman.</p>
                                <div class="row">
                                    <div class="col-sm-8"></div>
                                    <div class="col-sm-4"> <button type="button" data-toggle="modal" data-target="#tambahalamat" class="btn btn-primary btn-sm btn-block">Tambah Alamat</button> </div>
                                    <div class="col-sm-12">&nbsp;</div>
                                    <div class="col-sm-12">
                                        <!-- <?php var_dump($DaftarALamat) ?> -->
                                        <table class="customers table table-striped">
                                            <thead>
                                                <tr align="center">
                                                    <th>#</th>
                                                    <th>Alamat Lengkap</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($DaftarALamat->data  as $daftaralamat) : ?>

                                                    <tr>
                                                        <td><input <?= $daftaralamat->status_default == 1 ? 'checked' : '' ?> onclick="konfirmasigantialamat('<?= base_url('wp-ganti-alamat/' . $daftaralamat->_id); ?>')" id="<?= $daftaralamat->_id ?>" name="id_alamat" type="radio"></td>
                                                        <td>
                                                            <?= $daftaralamat->alamat_lengkap ?>
                                                            Kec.<?= $daftaralamat->nama_kecamatan ?>
                                                            <?= $daftaralamat->nama_kota ?>
                                                            <?= $daftaralamat->nama_provinsi ?>
                                                        </td>
                                                        <td width="10%"><button onclick="hapusconfirm('<?= base_url('wp-hapus-alamat/' . $daftaralamat->_id); ?>')" type="button" class='btn btn-sm btn-danger'>Hapus</button></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                                <div class="box-authentication">
                                    <form action="#">

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Nama Lengkap *</label>
                                                <input type="text" value="<?= $this->session->userdata('nama_customer') ?>" placeholder="Nama Lengkap" class="form-control" required>
                                            </div><!-- End .col-sm-6 -->
                                            <div class="col-sm-6">
                                                <label>No Hp *</label>
                                                <input type="numbber" value="<?= $this->session->userdata('no_hp') ?>" placeholder="No Hp" class="form-control" required>
                                            </div>
                                        </div><!-- End .row -->
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Email address *</label>
                                                <input type="email" value="<?= $this->session->userdata('email') ?>" placeholder="Email Address" class="form-control" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <label>Password *</label>
                                                <input type="password" placeholder="Kosongkan jika anda tidak ingin mengganti password" class="form-control">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label>&nbsp; </label>
                                                <input type="submit" class="btn btn-primary  action btn-cart btn-block" value="Simpan" placeholder="Kosongkan jika anda tidak ingin mengganti password" class="form-control">
                                            </div>
                                        </div>

                                    </form>
                                </div><!-- .End .tab-pane -->
                            </div><!-- .End .tab-pane -->
                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
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
                            Swal.fire({
                                title: "Good Job",
                                text: "Pesanan Berhasil Dibatal",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonText: "Ok",
                                // cancelButtonText: "Tidak",
                                reverseButtons: true,
                            }).then((result) => {
                                window.location.reload();
                            })
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
                // console.log(respons);
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
                                    <td>`+element.manifest_code+` `+element.manifest_description+` </td>
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
                // $('.titlemenu').html('');
                // $('.titlemenu').append(titlemenu);
                $('#' + tab).addClass('activeku');
            } else {
                $('#tab' + t).removeClass('activeku');
            }
        }
        // if (tab == "tab1") {
        //     $('#' + tab).addClass('active');
        //     $('#tab2').removeClass('active');
        //     $('#tab3').removeClass('active');
        //     $('#tab4').removeClass('active');
        //     $('#tab5').removeClass('active');
        // } else if (tab == "tab2") {
        //     $('#' + tab).addClass('active');
        //     $('#tab1').removeClass('active');
        //     $('#tab3').removeClass('active');
        //     $('#tab4').removeClass('active');
        //     $('#tab5').removeClass('active');
        // }
        var i;
        var x = document.getElementsByClassName("city");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        document.getElementById(cityName).style.display = "block";
    }

    function cekhargajual(id){
            // console.log(id);
            $('.btn-cek-harga-'+id).hide();
            $('.btn-loading-'+id).show();
            $.ajax({
                url: base_url + "getBarcodePengajuanPenjualan",
                dataType: "json",
                method: "POST",
                data: {
                    kode_barcode: id,
                },
                complete: function (respons) {
                    var feedback = respons.responseJSON;
                    // console.log(feedback);
                    // Swal
                    if (feedback.pesan == "berhasil") {
                        $(".headtablejual-"+id).show();
                        $('.btn-cek-harga-'+id).show();
                        $('.btn-loading-'+id).hide();
                        $.each(feedback.data, function (index, element) {
                            // console.log(element);
                            // $(".tbl_pengajuan_penjualan").html("");
                            $(".body_detail_hargajual-"+id).html("");
                            $(".body_detail_hargajual-"+id).append(
                                `
                            <tr>
                            
                                <td> ` +
                                    element.nama_barang +
                                    ` </td>
                                
                                <td> ` +
                                    element.berat +
                                    ` </td>
                                
                                <td>` +
                                    element.harga
                                        .toString()
                                        .replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.") +
                                    ` </td>
                            </tr>
                        `
                            );
                        });
                    } else {
                        $('.btn-cek-harga-'+id).show();
                        $('.btn-loading-'+id).hide();
                        Swal.fire("Opps!", feedback.pesan, "info");
                    }
                },
            });
        }
        $(document).ready(function() {
            // $("#keatas").hide();
            // // memberikan efek fade in pada id #keatas
            // $(function () {
            //     $(window).scroll(function () {
            //     if ($(this).scrollTop() > 100) {
            //         $('#keatas').fadeIn();
            //     } else {
            //         $('#keatas').fadeOut();
            //     }
            //     });
            // });
        var limit = 2;
        var start = 0;
        var action = 'inactive';

        function lazzy_loader(limit) {
            var output = '';

            for (var count = 0; count < limit; count++) {
                output += '<div class="cart-wrapper-area">';
                    output += '<div class="cart-table card mb-3">';
                        output += '<div class="card shipping-method-choose-title-card bg-success">';
                            output += '<div class="card-body">';
                                    output +='<h6 class="text-center mb-0 text-white">Loading</h6>';
                            output += '</div>';
                        output += '</div>';
                        output += '<div class="table-responsive card-body">';
                                output +='<p><span class="content-placeholder" style="width:100%; height: 200px;">&nbsp;</span></p>';
                        output += '</div>';
                    output += '</div>';
                output += '</div>';
            }
            $('#load_data_message_history_trx').html(output);
        }

        lazzy_loader(limit);

        function load_data(limit, start) {
            $.ajax({
                url: base_url + "loaddatahistory",
                method: "POST",
                data: {
                    limit: limit,
                    start: start,
                    device: 'mobile'

                },
                cache: false,
                success: function(data) {
                    // console.log(data);
                    if (data == '') {
                        $('#load_data_message_history_trx').html(`
                    <br>
                    <div class="card weekly-product-card mb-3">
                        <div class="card-body d-flex align-items-center">
                        Load Data Barang Sudah Mencapai Batas.
                        </div>
                    </div><br>`);
                        action = 'active';
                    } else {
                        $('#load_data_history_trx').append(data);
                        $('#load_data_message_history_trx').html("");
                        action = 'inactive';
                    }
                }
            })
        }

        if (action == 'inactive') {
            action = 'active';
            load_data(limit, start);
        }

        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() > $("#load_data_history_trx").height() && action ==
                'inactive') {
                lazzy_loader(limit);
                action = 'active';
                start = start + limit;
                setTimeout(function() {
                    load_data(limit, start);
                }, 1000);
            }
        });

    });
           
</script>
<?= $this->load->view('User/DaftarAlamat/tambahalamat') ?>