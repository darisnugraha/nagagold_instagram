	<!-- MAIN -->
	<main class="site-main">

	    <div class="columns container">
	        <!-- Block  Breadcrumb-->

	        <ol class="breadcrumb no-hide">
	            <li><a href="<?= base_url('') ?>">Home </a></li>
	            <li class="active"><a href="#">Panduan Belanja</a></li>
	        </ol><!-- Block  Breadcrumb-->

	        <div class="row">


	            <!-- Main Content -->
	            <div class="col-md-9 col-md-push-3  col-main ">
	                <h1 class="page-heading">
	                    <span class="page-heading-title2">Panduan Pembayaran</span>
	                </h1>
	                <div class="wpb_wrapper">
	                    <p class="h5"><strong>1. Klik Menu Konfirmasi Pembayaran</strong></p>
	                    <p>anda harus login terlebih dahulu agar bisa membuka menu konfirmasi pembayaran.</p>
	                    <hr>
	                    <p class="h5"><strong>2. Pilih No Pesanan yang akan dibayar</strong></p>
	                    <hr>
	                    <p class="h5"><strong>3. Setelah itu isi data yang ada diform pembayaran dan jangan lupa masukan bukti pembayaran</strong></p>
	                    <hr>
	                    <p class="h5"><strong>4. Lalu tekan tombol konfirmasi pembyaran, setealh itu tunggu konfirmasi pesanan oleh admin, dan nanti akan ada pemeberitahuan lewat email</strong></p>

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
	                            <?php if ($NamaApp != "AN_AN") : ?>
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