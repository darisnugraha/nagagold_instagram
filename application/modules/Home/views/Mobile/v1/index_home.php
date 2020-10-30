    
        <div class="container">
            <div data-pagination='{"el": ".swiper-pagination", "hideOnClick": true}' class="swiper-container swiper-init demo-swiper">
                <div class="swiper-pagination"></div>
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img width="325px" height="250px" src="<?= base_url('assets/images/Flash.jpg') ?>"></div>
                    <div class="swiper-slide"><img width="325px" height="250px" src="<?= base_url('assets/images/Untitled-3.jpg') ?>"></div>
                    <div class="swiper-slide"><img width="325px" height="250px" src="<?= base_url('assets/images/Limited.jpg') ?>"></div>
                </div>
            </div>
            <h6 class="subtitle">Products <a href="all-products.html" class="float-right small">View All</a></h6>
            <div class="row">
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body">
                            <button class="btn btn-sm btn-link p-0"><i class="material-icons md-18">favorite_outline</i></button>
                            <div class="badge badge-success float-right mt-1">10% off</div>
                            <figure class="product-image"><img src="<?= base_url('assets/images/produk/') ?>p1.png" alt="" class=""></figure>
                            <a href="product-details.html" class="text-dark mb-1 mt-2 h6 d-block"><?= strlen('Cincin Nikah') > 12 ? substr('Cincin Nikah',0,12).'....': 'Cincin Nikah' ?></a>
                            <!-- <p class="text-secondary small mb-2">Imported Simla</p> -->
                            <h6 class="text-success font-weight-normal mb-0">Rp 7.500.000</h6>
                            <p class="text-secondary small text-mute mb-0">Berat : 1.0 kg</p>
                            <p class="text-secondary small text-mute mb-0">Kadar : 75</p>
                            <button onclick="Swal.fire('Opps','Anda Harus Login Dulu','info')" class="btn btn-default button-rounded-36 shadow-sm float-bottom-right"><i class="material-icons md-18">shopping_cart</i></button>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">
                            <button class="btn btn-sm btn-link p-0"><i class="material-icons md-18">favorite_outline</i></button>
                            <div class="badge badge-success float-right mt-1">10% off</div>
                            <figure class="product-image"><img src="<?= base_url('assets/images/produk/') ?>c2.png" alt="" class=""></figure>
                            <a href="<?= base_url('produk/1') ?>" class="text-dark mb-1 mt-2 h6 d-block"><?= strlen('Cincin Pernikahan') > 12 ? substr('Cincin Pernikahan',0,12).'....': 'Cincin Pernikahan' ?></a>
                            <!-- <p class="text-secondary small mb-2">Imported Simla</p> -->
                            <h6 class="text-success font-weight-normal mb-0">Rp <?= strlen('10.000.000') > 12 ? substr('10.000.000',0,10).'....': '10.000.000' ?></h6>
                            <p class="text-secondary small text-mute mb-0">Berat: 10.00g</p>
                            <p class="text-secondary small text-mute mb-0">Kadar: 75</p>
                            <button onclick="Swal.fire('Opps','Anda Harus Login Dulu','info')" class="btn btn-default button-rounded-36 shadow-sm float-bottom-right"><i class="material-icons md-18">shopping_cart</i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       