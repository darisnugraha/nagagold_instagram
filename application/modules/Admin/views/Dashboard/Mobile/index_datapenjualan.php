<div class="page-content-wrapper">
    
    <div class="container">
            
        <div class="cart-wrapper-area py-3">
        <form class="faq-search-form" action="#" method="">
                <input class="form-control" type="search" name="search" placeholder="Search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
            <br>
            <?php foreach($DataPenjualan->data  as $row ): ?>
            <div class="card mb-3">
                <div class="card">
                    <div class="card-header text-center" style="background-color: transparent  !important;">
                        Menunggu Pengambilan
                    </div>
                    <div class="card-body">
                        <small class="card-title">#<?= $row->id_penjualan ?></small><br>
                    <div class="row">
                        <div class="col-3"> 
                                <img width="80px" style="border-radius: 8%; box-shadow: 0 0px 4px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.10);" src="https://hidupbanjaran.com/assets/images/NsiPic/product/2643f561c2b747415c5698466f7ff48f.jpeg"> 
                            </div>
                        <div class="col-5"><small> 30-Oktober-2020 <br> <?= $row->nama_customer ?></small> </div>
                        <div class="col-4" align="center"> <a href="<?= base_url('detail-penjualan-admin/'.$row->id_penjualan.'/'.$row->kode_customer) ?>" class="btn btn-success w-100"> Detail </a> </div>
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
<br>