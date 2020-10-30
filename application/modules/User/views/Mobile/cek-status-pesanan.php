

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
                                                    <img onError="this.onerror=null;this.src='<?php echo base_url('assets/images/notfound.png') ?>';" src="<?= base_url('assets/images/NsiPic/product/') . $databarang[$i]->lokasi_gambar ?>"></a>
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
        <!-- <h4 class="faq-heading text-center">Cari No Transaksi?</h4> -->
          <!-- Search Form--><br>
          <!-- <form class="" action="<?= base_url('cari-no-resi') ?>" method="POST">
          <div class="row">
                <div class="col">
                <input class="form-control" type="search" name="no_resi" placeholder="Masukan No Resi">
                </div>
                <div class="col">
                <select name="kurir" class="form-control">
                    <?php foreach($datakurir->data as $rowdata ): ?>
                        <option <?= $rowdata->status_active=="1" ? '' : 'hidden' ?> value="<?= $rowdata->nama_courier ?>"> <?= $rowdata->nama_courier ?> </option>
                    <?php endforeach; ?>
                </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-success btn-block">Cari</button>
                </div>
            </div>
           
          </form> -->
          <br>
          <div class="accordian-area-wrapper mt-3">
            <!-- Accordian Card-->
            <div class="card accordian-card clearfix">
              <div class="card-body">
                <!-- <h5 class="accordian-title">121013271983291872</h5> -->


                <div class="accordion" id="accordionExample1">
                  <!-- Single Accordian-->
                  <div class="accordian-header" id="headingOne2">
                    <button class="d-flex align-items-center justify-content-between w-100 btn" type="button" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne">
                        No Resi : <?= $no_resi ?></span><i class="lni lni-chevron-right"></i></button>
                  </div>
                  <div class="collapse show" id="collapseOne2" aria-labelledby="headingOne2" data-parent="#accordionExample1">
                   <!-- Silahkan Ambil Barang Ditoko dan Tunjukan Nomer Order Berikut : 121013271983291872
                    <table class="table table-striped">
                        <tr>
                            <td>Nama Barang</td>
                            <td> Total </td>
                        </tr>
                    </table> -->
                    <table class="table table-striped">
                        <tr>
                            <td colspan="2" align="center"><?= $courir ?></td>
                        </tr>
                       
                        <?php foreach($DataPengirim->data  as $row ): ?>
                        <tr>
                            <td><?= $row->manifest_date ?> <?= $row->manifest_time ?></td>
                            <td><?= $row->manifest_code ?> <?= str_replace('~','', $row->manifest_description) ?> </td>
                        </tr>
                        <?php endforeach; ?>
                        
                    </table>
                  </div>
                </div>

                   
              </div>
            </div>
          </div>

        </div>

        <br>
        <br>
        <br>

        <!-- <script>
            $(document).ready(function() {
                window.history.replaceState('','',window.location.href);
            })
        </script> -->