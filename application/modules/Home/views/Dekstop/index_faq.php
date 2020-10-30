<style>
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc; 
}

.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}
</style>
	<!-- MAIN -->
    <main class="site-main">

        <div class="columns container">
            <!-- Block  Breadcrumb-->
            
            <ol class="breadcrumb no-hide">
                <li><a href="<?= base_url('') ?>">Home    </a></li>
                <li class=""><a href="#">Panduan Belanja</a></li>
            </ol><!-- Block  Breadcrumb-->

            <div class="row">


                <!-- Main Content -->
                <div class="col-md-9 col-md-push-3  col-main ">
                    <h1 class="page-heading">
                        <span class="page-heading-title2">F.A.Q</span>
                    </h1>
                    <button class="accordion">Panduan Membuat Akun</button>
                    <div class="panel">
                    <p>1. Daftarkan Diri Anda</p>
                    <p>Klik tombol “Login/Register” di pojok kanan atas, lalu isi data email dan password pada formulir yang tersedia.</p>
                    <p>2. Cek Data Diri Anda</p>

                    <p>Periksa kembali email dan password yang telah Anda masukkan. Pastikan Anda memasukkan data yang sebenarnya untuk mempermudah proses belanja ke depannya. Jika data diri yang Anda masukkan sudah sesuai, klik “Register”.
                    </p>
                    <p>3. Nikmati Keuntungan</p>

                    <p>Dengan memiliki akun di <?= $DataPusat->data[0]->nama_toko_pusat ?>, Anda dapat menikmati berbagai keuntungan berikut:</p>
                        Pastikan Anda mengisi dengan data sebenarnya untuk memastikan. Anda tidak perlu menulis kembali alamat pengiriman dan penagihan setiap kali berbelanja di <?= $DataPusat->data[0]->nama_toko_pusat ?>.
                        Anda dapat melihat kembali histori transaksi dan status pengiriman produk yang dibeli.

                </div>

                    <button class="accordion">Kebijakan Produk</button>
                    <div class="panel">
                    <p>
                    Akurasi Data dan Harga</p>
                    <p>
                    <?= $DataPusat->data[0]->nama_toko_pusat ?> selalu berusaha untuk menampilkan data setiap produknya selengkap dan seakurat mungkin untuk mempermudah Anda saat proses pembelian. Harga untuk setiap produk yang tercantum pada website <?= $DataPusat->data[0]->nama_toko_pusat ?> dapat berubah sewaktu-waktu tanpa pemberitahuan terlebih dahulu.
                    .</p>
                    </div>

                    <button class="accordion">Kebijakan Pembelian Barang</button>
                    <div class="panel">
                    <p> Pengembalian Barang</p>
                    <p>Penjualan kembali barang diterima dengan harga pantas.</p>
                    </div>
                    <button class="accordion">Proses Refound</button>
                    <div class="panel">
                        <p>Refund</p>
                        Proses refund dana memakan waktu 1-2 minggu waktu kerja.
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
                                    <a href="<?= base_url('tentang-kami') ?>">Tentang Kami</a>
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
                                <li>
                                    <a href="<?= base_url('panduan-pembayaran') ?>">Panduan Pembayaran</a>
                                </li>
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

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>