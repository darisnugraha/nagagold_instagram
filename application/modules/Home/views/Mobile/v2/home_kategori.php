<?php if( $this->session->userdata('otpaktif') == "true"){
  redirect('otentivikasi-daftar');
} ?>

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

    <div class="product-catagories-wrapper pt-3">
        <div class="container">
            <div class="product-catagory-wrap">
                <div class="row">
                    <?php foreach($DataKategori->data  as $kategori ): ?>
                    <div class="col-12">
                        <div class="mb-4">
                            <a onclick="$('.loaderform').show()"
                                href="<?= base_url('carikategori/' . encrypt_url($kategori->kode_kategori) . '/' . encrypt_url($kategori->nama_kategori)) ?>">
                                <img class="card" alt="<?= $kategori->nama_kategori ?>"
                                    onerror="this.onerror=null;this.src='<?= base_url('assets/images/slidenotfound.jpg') ?>';"
                                    src="<?= $kategori->banner ?>">
                            </a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="product-catagories-wrapper pt-3">
        <div class="container">
            <div class="text-center">
                <h6 class="ml-1">Harga Emas Hari Ini</h6>
            </div>
            <div class="product-catagory-wrap">
                <div class="row">
                    <div class="table-responsive container">
                        <div class="ignielHorizontal">
                            <ul>
                                <li><button onclick="openCity('menunggupembayaran','Menunggu Pembayaran','tab1')"
                                        id="tab1" class="buttonku activeku"> UBS
                                        <?= $notifmenunggupembayaran ?> </button></li>
                                <li><button onclick="openCity('menunggukonfirmasi','Menunggu Konfirmasi','tab2')"
                                        id="tab2" class="buttonku">Mini Logam Mulia
                                        <?= $notifmenunggukonfirmasi ?></button></li>
                                <li><button onclick="openCity('pesanandalamproses','Pesanan Dalam Proses','tab3')"
                                        id="tab3" class="buttonku">KING HALIM<?= $notifproses ?></button>
                                </li>
                                <li><button class="buttonku"
                                        onclick="openCity('pesanandalampengiriman','Pesanan Sedang Dikirim','tab4')"
                                        id="tab4">UBS DISNEY <?= $notiffinish ?></button></li>
                            </ul>
                        </div>
                        <div id="menunggupembayaran" class="city">
                            <div class="cart-table card mb-3">
                                <div class="card shipping-method-choose-title-card bg-success">
                                    <div class="card-body">
                                        <h6 class="text-center mb-0 text-white">Harga Emas UBS
                                        </h6>
                                    </div>
                                </div>
                                <div class="table-responsive container">
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <th>#</th>
                                                <th>Jenis</th>
                                                <th nowrap>Harga</th>
                                            </tr>
                                            <tr>
                                                <td> 1 </td>
                                                <td> Mini Logam Mulia
                                                    @0,1gr </td>
                                                <td> 112.000 </td>
                                            </tr>
                                            <tr>
                                                <td> 2 </td>
                                                <td> Mini Logam Mulia
                                                    @0,1gr </td>
                                                <td> 112.000 </td>
                                            </tr>
                                            <tr>
                                                <td> 3 </td>
                                                <td> Mini Logam Mulia
                                                    @0,1gr </td>
                                                <td> 112.000 </td>
                                            </tr>
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <style>
    .owl-dots {
        display: none;
    }

    .owl-nav {
        display: none;
    }
    </style>

    <?= $this->session->flashdata('alertcart') ?>
</div>
<br>
<br>
<br>