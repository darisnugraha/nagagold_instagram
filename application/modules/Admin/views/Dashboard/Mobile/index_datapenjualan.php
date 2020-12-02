<div class="page-content-wrapper">
    
    <div class="container">
            
        <div class="cart-wrapper-area py-3">
        <form class="faq-search-form" action="#" method="POST">
                <input class="form-control" type="search" value="<?= $_POST['search'] ?>" name="search" placeholder="Search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
            <br>
            <?php  foreach($DataPenjualan->data  as $row ): ?>
            <?php if($row->_id->id_penjualan ==  $_POST['search']): ?>
            <div class="card mb-3">
                <div class="card">
                    <div class="card-header text-center" style="background-color: transparent  !important;">
                        Menunggu Pengambilan
                    </div>
                    <div class="card-body">
                        <small class="card-title">#<?= $row->_id->id_penjualan ?></small><br>
                    <div class="row">
                        <div class="col-3"> 
                        <?php 
                        $detailBarang = $row->detail_barang;
                        for($d = 0; $d<1; $d++): ?>
                        <?php
                            $databarang = $detailBarang[$d]->gambar;
                            for ($i = 0; $i < 1; $i++) :
                                $gambar = $databarang[$i]->lokasi_gambar;
                                if ($gambar == "-") {
                                    $gambar = "notfound.png";
                                }
                            ?>
                                <img width="80px" style="border-radius: 8%; box-shadow: 0 0px 4px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.10);" onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?= base_url('assets/images/NsiPic/product/' . $databarang[$i]->lokasi_gambar) ?>"> 
                            <?php endfor; ?>
                            <?php endfor; ?>
                        </div>
                        <div class="col-5"><small><?= $row->_id->nama_customer ?><br> <?= $row->_id->no_hp ?> <br> Total Transaksi : <?= number_format($row->_id->total_bayar) ?> </small> </div>
                        <div class="col-4" align="center"> <a href="<?= base_url('detail-penjualan-admin/'.$row->_id->id_penjualan.'/'.$row->_id->kode_customer) ?>" class="btn btn-success w-100"> Detail </a> </div>
                    </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php if($_POST['search'] == null): ?>
                <div class="card mb-3">
                <div class="card">
                    <div class="card-header text-center" style="background-color: transparent  !important;">
                        Menunggu Pengambilan
                    </div>
                    <div class="card-body">
                        <small class="card-title">#<?= $row->_id->id_penjualan ?></small><br>
                    <div class="row">
                        <div class="col-3"> 
                        <?php 
                        $detailBarang = $row->detail_barang;
                        for($d = 0; $d<1; $d++): ?>
                        <?php
                            $databarang = $detailBarang[$d]->gambar;
                            for ($i = 0; $i < 1; $i++) :
                                $gambar = $databarang[$i]->lokasi_gambar;
                                if ($gambar == "-") {
                                    $gambar = "notfound.png";
                                }
                            ?>
                                <img width="80px" style="border-radius: 8%; box-shadow: 0 0px 4px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.10);" onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?= base_url('assets/images/NsiPic/product/' . $databarang[$i]->lokasi_gambar) ?>"> 
                            <?php endfor; ?>
                            <?php endfor; ?>
                        </div>
                        <div class="col-5"><small><?= $row->_id->nama_customer ?><br> <?= $row->_id->no_hp ?> <br> Total Transaksi : <?= number_format($row->_id->total_bayar) ?> </small> </div>
                        <div class="col-4" align="center"> <a href="<?= base_url('detail-penjualan-admin/'.$row->_id->id_penjualan.'/'.$row->_id->kode_customer) ?>" class="btn btn-success w-100"> Detail </a> </div>
                    </div>
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