<!-- <style>
    ul.timeline {
        list-style-type: none;
        position: relative;
    }

    ul.timeline:before {
        content: ' ';
        background: #669934;
        display: inline-block;
        position: absolute;
        left: 29px;
        width: 2px;
        height: 100%;
        z-index: 400;
    }

    ul.timeline>li {
        margin: 20px 0;
        padding-left: 20px;
    }

    ul.timeline>li:before {
        content: ' ';
        background: white;
        display: inline-block;
        position: absolute;
        border-radius: 50%;
        border: 2px solid #669934;
        left: 20px;
        width: 20px;
        height: 20px;
        z-index: 400;
    }
</style>
<div class="page-content-wrapper">
    <div class="container">
        <div class="support-wrapper py-3">
            <h4 class="faq-heading text-center">Pesanan Anda</h4>
            <form class="faq-search-form" action="#" method="POST">
                <input class="form-control" type="search" name="search" placeholder="Search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
            <?php $no = 1;
            foreach ($DataCart->data as $row) : ?>
                <div class="accordian-area-wrapper mt-3">
                    <div class="card accordian-card clearfix">
                        <div class="card-body">
                            No Transaksi : <?= $row->_id ?>
                            <div class="table-responsive">
                                <table class="table table-bordered  cart_summary">
                                    <thead>
                                        <th class="action">#</th>
                                        <th>Foto</th>
                                        <th>Nama Barang</th>
                                        <th>
                                            <center>Qty</center>
                                        </th>
                                        <th>
                                            <center>Harga</center>
                                        </th>
                                        <th>
                                            <center>Status</center>
                                        </th>
                                        <th width="10px">
                                            <center>#</center>
                                        </th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> <?= $no++ ?> </td>
                                            <td>
                                                <?php $databarang = $HistoryCart->gambar;
                                                for ($i = 0; $i < 1; $i++) : ?>
                                                    <img onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?= $databarang[$i]->lokasi_gambar ?>"></a>
                                                <?php endfor; ?>
                                            </td>
                                            <td><?= $row->nama_barang ?></td>
                                            <td>1</td>
                                            <td><?= number_format($row->harga_jual) ?></td>
                                            <td>Belum Selesai</td>
                                            <td> <a href="<?= base_url('wp-hapus-old-order/' . $row->_id) ?>" type="submit"><i class="fa fa-trash-o"></i> </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>

<br>
<br>
<br> -->

<div class="page-content-wrapper">
    <div class="container">
        <!-- Cart Wrapper-->

        <div class="cart-wrapper-area py-3">
            <div class="cart-table card mb-3">
                <div class="card shipping-method-choose-title-card bg-success">
                    <div class="card-body">
                        <h6 class="text-center mb-0 text-white">Status Pembelian Barang</h6>
                    </div>
                </div>
                <div class="table-responsive card-body">
                    <?php $totharga = 0;
                    foreach ($DataPenjuealan->data  as $row) : ?>
                        <table class="table mb-0">
                            <tbody>
                                <div class="row">
                                    <tr>
                                        <td colspan="5">No Transaksi : <?= strtoupper($row->id_trx) ?></td>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Produk</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Berat</th>
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
                                                <td> <img class="mb-2" onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?=  $databarang[$i]->lokasi_gambar ?>" alt=""> </td>
                                            <?php endfor; ?>
                                            <td>
                                                <?= $detail->nama_barang ?><br>
                                                Kadar : <?= $detail->kadar  ?><br>
                                                Berat :<?= $detail->berat  ?>
                                            </td>
                                            <td><?= number_format($detail->harga) ?></td>
                                            <td><?= number_format($detail->berat) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <?php if ($row->type_trx == "KIRIM") : ?>
                                        <tr>
                                            <td colspan="3" align="right">Dikirim Oleh : </td>
                                            <td colspan="2"> <?= $row->jenis_courier ?> - Rp <?= number_format($row->ongkir) ?> </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" align="right">Ongkir: </td>
                                            <td colspan="2"> <?= number_format($row->ongkir) ?> </td>
                                        </tr>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="2" align="right"> </td>
                                            <td>Diambil Ditoko : </td>
                                            <?php foreach ($row->toko as $toko) : ?>
                                                <td colspan="2"> <?= $toko->nama_toko ?>, <?= $toko->alamat_lengkap ?> <?= $toko->nama_kota ?> Kec.<?= $toko->nama_kecamatan ?>, Kode Pos.<?= $toko->kode_pos ?>, Provinsi.<?= $toko->nama_provinsi ?> </td>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endif; ?>

                                    <tr>
                                        <td colspan="2" align="right"> </td>
                                        <td align="right">Total Harga : </td>
                                        <td colspan="2"> <?= number_format($jml) ?> </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="right"> </td>
                                        <td align="right">Grand Total : </td>
                                        <td colspan="2"> <?php $grand =  $jml + $row->ongkir;
                                                            echo number_format($grand) ?> </td>

                                    </tr>


                        </table>
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <a onclick="$('.loaderform').show();" href="<?= base_url('konfirmasipembayaran') ?>" class="btn btn-success btn-block" style="color:#FFFFFF">Lanjutkan Pembayaran</a>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>

        </div>

        <br>
        <br>
        <br>