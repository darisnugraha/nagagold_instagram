	<!-- MAIN -->
    <main class="site-main">

        <div class="columns container">
            <!-- Block  Breadcrumb-->
            
            <ol class="breadcrumb no-hide">
                <li><a href="<?= base_url('') ?>">Home    </a></li>
                <li class="active"><a href="#">Panduan Belanja</a></li>
            </ol><!-- Block  Breadcrumb-->

            <div class="row">


                <!-- Main Content -->
                <div class="col-md-9 col-md-push-3  col-main ">
                    <h1 class="page-heading">
                        <span class="page-heading-title2">Panduan Belanja</span>
                    </h1>
                    <div class="wpb_wrapper">
                        <p class="h5"><strong>1. Pilih Perhiasan</strong></p>
                        <p>Cari produk yang Anda inginkan pada website <?= $DataPerusahaan->data[0]->nama_perusahaan ?>. Jika sudah menemukan produk yang sesuai, klik&nbsp;<span class="font-dark-green font-UniversalLTStdBold">“Add to cart“</span></p>
                        <hr>
                        <p class="h5"><strong>2. Cek Keranjang Belanja</strong></p>
                        <p class="h5">Klik tombol&nbsp;<span class="font-dark-green font-UniversalLTStdBold">“Cart”</span>&nbsp;dengan ikon keranjang di pojok kanan atas untuk melihat detail produk yang ingin Anda beli. Periksa kembali detail pesanan Anda dan klik&nbsp;<span class="font-dark-green font-UniversalLTStdBold">“Checkout”</span>&nbsp;jika ingin melanjutkan proses pembelian.</p>
                        <hr>
                        <p class="h5"><strong>3. Pilih Metoda Pengiriman dan Pembayaran</strong></p>
                        <p class="h5">Pengiriman bisa diambil ditoko atau di anatar dengan kurir, sedangkan pembayaran utnuk <?= $DataPerusahaan->data[0]->nama_perusahaan ?>
                        <?php if($NamaApp=="AN_AN"): ?>
                            menggunakan payment get wey transaksi aman dan terkendali bisa menggunakan Qr-code BCA, atau pembyaran lewat Go Pay,
                            nanti akan diarahkan ke halaman pembayaran dan lakukan pembyaran, setalah melakukan pembyaran otomaatis pesanan anda langsung diterima, dan anda tidak usah melakukan konfirmasi kembali
                        <?php else: ?>
                            menggunakan transfer lewat bank yang kami sediakan.
                        <?php endif; ?>
                        </p>
                        <?php if($NamaApp!="AN_AN"): ?>
                        <hr>
                        <p class="h5"><strong>4. Konfirmasi Pembayaran</strong></p>
                        <p class="h5">Periksa kembali detail pesanan Anda. Jika sudah sesuai, klik&nbsp;<span class="font-dark-green font-UniversalLTStdBold">“Place Order”</span>. Segera selesaikan pembayaran untuk menghindari pembatalan secara otomatis.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class=" col-md-3 col-md-pull-9   col-sidebar">

                    <!-- Block  categorie-->
                    <div class="block-sidebar block-sidebar-categorie">
                        <div class="block-title">
                            <strong>Tentang</strong>
                        </div>
                        <div class="block-content">
                            <ul class="items">
                                <li class="parent">
                                    <a href="#">Tentang Kami</a>
                                </li>
                                <li>
                                    <a href="#">Konsultasi Perhiasan</a>
                                </li>
                                <li>
                                    <a href="#">Garansi</a>
                                </li>
                                <li>
                                    <a href="#">Garansi Pengiriman</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="block-sidebar block-sidebar-categorie">
                        <div class="block-title">
                            <strong>Panduan</strong>
                        </div>
                        <div class="block-content">
                            <ul class="items">
                                <li class="parent">
                                    <a href="<?= base_url('panduan-belanja') ?>">Panduan Belanja</a>
                                </li>
                                <?php if($NamaApp!="AN_AN"): ?>
                                <li>
                                    <a href="<?= base_url('panduan-pembayaran') ?>">Panduan Pembayaran</a>
                                </li>
                                <?php endif; ?>
                                <li>
                                    <a href="#">Panduan Ukuran</a>
                                </li>
                                <li>
                                <a href="<?= base_url('faq') ?>">F.A.Q</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <!-- Block  categorie-->


                </div><!-- Sidebar -->



            </div>
        </div>


</main><!-- end MAIN -->