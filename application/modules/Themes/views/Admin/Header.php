<!DOCTYPE html>
<?php $data      = $this->SERVER_API->_getAPI('system-perusahaan');
?>
<?php $thisPage = $_SERVER["REQUEST_URI"];
$dashboard = "";
if ($thisPage == "/hidup_retail/wp-dashboard") {
    $dashboard = "--active";
}

$user = "";
if ($thisPage == "/hidup_retail/wp-user") {
    $user = "--active";
}
$hadiah = "";
if ($thisPage == "/hidup_retail/wp-hadiah") {
    $hadiah = "--active";
}

$kelolakategori = "";
$barangopen = "";
if ($thisPage == "/hidup_retail/wp-kategori-barang" || $thisPage == "/hidup_retail/wp-hancur-barang" || $thisPage == "/hidup_retail/cari-barang-aktive" || $thisPage == "/hidup_retail/wp-jenis" || $thisPage == "/hidup_retail/wp-barang-online" || $thisPage == "/hidup_retail/wp-barang") {
    $barangopen = "tooltipstered side-menu--open side-menu--active";
    $kelolakategori = "side-menu__sub-open";
}
$subpengaturan = "";
$pengaturanopen = "";
if ($thisPage == "/hidup_retail/wp-parameter-poin" || $thisPage == "/hidup_retail/wp-parameter-harga-emas" || $thisPage == "/hidup_retail/wp-slider" || $thisPage == "/hidup_retail/wp-kelola-norek" || $thisPage == "/hidup_retail/wp-profile-perusahaan" || $thisPage == "/hidup_retail/wp-kurir" || $thisPage == "/hidup_retail/wp-parameter-waktu" || $thisPage == "/hidup_retail/wp-data-toko") {
    $pengaturanopen = "tooltipstered side-menu--open side-menu--active";
    $subpengaturan = "side-menu__sub-open";
}
$kelolahadiah = "";
if ($thisPage == "/hidup_retail/wp-hadiah" || $thisPage == "/hidup_retail/wp-ambil-hadiah" || $thisPage == "/hidup_retail/wp-tambah-hadiah" ) {
    $kelolahadiah = "tooltipstered side-menu--open side-menu--active";
    $subhadiah = "side-menu__sub-open";
}
$sublaporan = "";
$laporan = "";
if ($thisPage == "/hidup_retail/wp-laporan" || $thisPage == "/hidup_retail/wp-laporan-hancur-barang" || $thisPage == "/hidup_retail/wp-laporan-pembelian" || $thisPage == "/hidup_retail/wp-stock-barang" || $thisPage == "/hidup_retail/wp-tambah-barang" || $thisPage == "/hidup_retail/wp-setting-alamat-pengirim" || $thisPage == "/hidup_retail/wp-laporan-batal-penjualan") {
    $laporan = "tooltipstered side-menu--open side-menu--active";
    $sublaporan = "side-menu__sub-open";
}

$kelolatransaksi = "";
$opentransaksi = "";
if ($thisPage == "/hidup_retail/wp-validasi-penjualan" || $thisPage == "/hidup_retail/wp-validasi-pembelian" || $thisPage == "/hidup_retail/cari-validasi-penjualan" || $thisPage == "/hidup_retail/wp-transaksi-pembelian") {
    $kelolatransaksi = "tooltipstered side-menu--open side-menu--active";
    $opentransaksi = "side-menu__sub-open";
}
$Prossestransaksi = "";
$openproses = "";
if ($thisPage == "/hidup_retail/wp-proses-penjualan" || $thisPage == "/hidup_retail/wp-proses-pembelian" || $thisPage == "/hidup_retail/wp-lihat-penjualan" || $thisPage == "/hidup_retail/wp-lihat-pembelian") {
    $Prossestransaksi = "tooltipstered side-menu--open side-menu--active";
    $openproses = "side-menu__sub-open";
}
$kelolauser = "";
$datausers = "";
if ($thisPage == "/hidup_retail/wp-user" || $thisPage == "/hidup_retail/wp-user-toko") {
    $kelolauser = "tooltipstered side-menu--open side-menu--active";
    $datausers = "side-menu__sub-open";
}
$KelolaHargaEmas = "";
$dataHargaEmas = "";
if ($thisPage == "/hidup_retail/data-kelompok" || $thisPage == "/hidup_retail/data-jenis" || $thisPage == "/hidup_retail/update-harga-emas" || $thisPage == "/hidup_retail/cari-kode-kelompok") {
    $KelolaHargaEmas = "tooltipstered side-menu--open side-menu--active";
    $dataHargaEmas = "side-menu__sub-open";
}

?>
<html lang="en">
<!-- BEGIN: Head -->

<head>
    <meta name="facebook-domain-verification" content="ka62mg9dy0s401hdb5rk2gryc13cfx" />
    <meta charset="utf-8">
    <link href="<?= base_url('assets/logo/icon.png') ?>" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= base_url('assets/logo/fanction.ico') ?>" type="image/x-icon" />
    <meta name="author" content="LEFT4CODE">
    <title><?= $this->session->userdata('title'); ?> | TM Hidup</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="<?= base_url('assets/admin/') ?>css/app.css?=1.0" />
    <script src="<?= base_url('assets/admin/js') ?>/jquery.min.js"></script>
    <script src="<?= base_url('assets/admin/js') ?>/chart.js"></script>
    <link href="<?= base_url('assets/admin/css') ?>/select2.min.css" rel="stylesheet" />
    <link href="<?= base_url('assets/font/all.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/admin/css') ?>/select2-bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url('assets/theme/js/sweetalert2/sweetalert2.css') ?>">
    <script src="<?= base_url('assets/mobile/v2/js/') ?>jquery.min.js"></script>
    <script src="<?= base_url('assets/admin/tinymce/tinymce.min.js') ?>">
    </script>
    <style>
        .pointer {
            cursor: pointer;
        }
    </style>
    <script>
        var base_url = '<?= base_url() ?>';
    </script>
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="app">
    <!-- BEGIN: Mobile Menu -->
    <!-- <div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto">
                <img alt="Tm Hidup" class="w-6" src="<?= base_url('assets/logo/') ?>logokencaaputeraemas.png">
            </a>
            <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
        </div>
        <ul class="border-t border-theme-24 py-5 hidden">
            <li>
                <a href="<?= base_url('wp-dashboard') ?>" class="menu menu--active">
                    <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                    <div class="side-menu__title"> Dashboard </div>
                </a>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <i data-feather="archive"></i> </div>
                    <div class="menu__title"> Barang <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="<?= base_url('wp-kategori') ?>" class="menu">
                            <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                            <div class="side-menu__title"> Kelola Kategori </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('wp-jenis') ?>" class="menu">
                            <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                            <div class="side-menu__title"> Kelola Jenis </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('wp-barang') ?>" class="menu">
                            <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                            <div class="side-menu__title"> Lihat Barang Online </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('wp-hancur-barang') ?>" class="menu">
                            <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                            <div class="side-menu__title"> Hancur Barang Online </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <i data-feather="archive"></i> </div>
                    <div class="menu__title">Kelola Transaksi <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="<?= base_url('wp-kategori') ?>" class="menu">
                            <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                            <div class="side-menu__title"> Validasi Penjualan </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('wp-jenis') ?>" class="menu">
                            <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                            <div class="side-menu__title"> Validasi Pembelian </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('wp-barang') ?>" class="menu">
                            <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                            <div class="side-menu__title"> Lihat Barang Terjual </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('wp-hancur-barang') ?>" class="menu">
                            <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                            <div class="side-menu__title"> Lihat Pengajuan Penjualan </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?= base_url('wp-user') ?>" class="menu">
                    <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                    <div class="side-menu__title"> Kelola User </div>
                </a>
            </li>
            <li>
                <a href="<?= base_url('wp-hadiah') ?>" class="menu">
                    <div class="side-menu__icon"> <i data-feather="archive"></i> </div>
                    <div class="side-menu__title"> Kelola Hadiah </div>
                </a>
            </li>
            <li>
                <a href="javascript:;" class="menu">
                    <div class="menu__icon"> <i data-feather="settings"></i> </div>
                    <div class="menu__title"> Pengaturan <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="<?= base_url('wp-parameter-poin') ?>" class="menu">
                            <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                            <div class="side-menu__title"> Parameter Poin </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-crud-data-list.html" class="menu">
                            <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                            <div class="side-menu__title"> Kelola Slider </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-crud-data-list.html" class="menu">
                            <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                            <div class="side-menu__title"> Kelola No Rekening Perusahaan </div>
                        </a>
                    </li>
                    <li>
                        <a href="side-menu-crud-data-list.html" class="menu">
                            <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                            <div class="side-menu__title"> Edit Profile Perusahaan </div>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div> -->
    <!-- END: Mobile Menu -->
    <div class="flex">
        <!-- BEGIN: Side Menu -->
        <nav class="side-nav">
            <a href="<?= base_url('wp-dashboard') ?>" class="intro-x flex items-center pl-5 pt-4">
                <img width="150px" src="<?= $data->data[0]->logo ?>">
                <!-- <span class="hidden xl:block text-white text-lg ml-3"> Mid<span class="font-medium">one</span> </span -->
            </a>
            <div class="side-nav__devider my-6"></div>
            <ul>
                <li>
                    <a href="<?= base_url('wp-dashboard') ?>" class="side-menu side-menu<?= $dashboard ?>">
                        <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                        <div class="side-menu__title"> Dashboard </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu <?= $barangopen ?>">
                        <div class="side-menu__icon"> <i data-feather="archive"></i> </div>
                        <div class="side-menu__title"> Barang <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="<?= $kelolakategori ?>">
                        <li>
                            <a href="<?= base_url('wp-tambah-barang-online') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Tambah Barang </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('wp-kategori-barang') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Kelola Kategori </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('wp-jenis') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Kelola Jenis </div>
                            </a>
                        </li>
                        <!-- <li>
                            <a href="<?= base_url('wp-barang') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Lihat Barang Upload </div>
                            </a>
                        </li> -->
                        <li>
                            <a href="<?= base_url('wp-barang-online') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Lihat Barang Online </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('wp-hancur-barang') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Hancur Barang Online </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu <?= $kelolatransaksi ?>">
                        <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                        <div class="side-menu__title"> Validasi Transaksi <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="<?= $opentransaksi ?>">
                        <li>
                            <a href="<?= base_url('wp-validasi-penjualan') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Validasi Penjualan </div>
                            </a>
                        </li>
                        <!-- <li>
                            <a href="<?= base_url('wp-validasi-pembelian') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Validasi Pembelian </div>
                            </a>
                        </li> -->
                        <!-- <li>
                            <a href="<?= base_url('wp-transaksi-penjualan') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Lihat Transaski Penjualan </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('wp-transaksi-pembelian') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Lihat Transaski Pembelian </div>
                            </a>
                        </li> -->
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu <?= $Prossestransaksi ?>">
                        <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                        <div class="side-menu__title"> Proses Transaksi <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="<?= $openproses ?>">
                        <li>
                            <a href="<?= base_url('wp-proses-penjualan') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Proses Penjualan </div>
                            </a>
                        </li>
                        <!-- <li>
                            <a href="<?= base_url('wp-proses-pembelian') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Proses Pembelian </div>
                            </a>
                        </li> -->
                        <li>
                            <a href="<?= base_url('wp-lihat-penjualan') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Lihat Proses Penjualan </div>
                            </a>
                        </li>
                        <!-- <li>
                            <a href="<?= base_url('wp-lihat-pembelian') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Lihat Proses Pembelian </div>
                            </a>
                        </li> -->
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url('wp-batal-penjualan') ?>" class="side-menu side-menu">
                        <div class="side-menu__icon"> <i data-feather="trash"></i> </div>
                        <div class="side-menu__title"> Batal Penjualan </div>
                    </a>
                </li>
                <!-- <li>
                    <a href="<?= base_url('wp-update-harga-emas') ?>" class="side-menu side-menu">
                        <div class="side-menu__icon"> <i data-feather="dollar-sign"></i> </div>
                        <div class="side-menu__title"> Update Harga Emas </div>
                    </a>
                </li> -->
                <li>
                    <a href="javascript:;" class="side-menu <?= $KelolaHargaEmas ?>">
                        <div class="side-menu__icon"> <i data-feather="dollar-sign"></i> </div>
                        <div class="side-menu__title"> Update Harga Emas <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="<?= $dataHargaEmas ?>">
                        <li>
                            <a href="<?= base_url('data-kelompok') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Data Kelompok </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('data-jenis') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Data Jenis </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('update-harga-emas') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Update Harga Emas </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- <li>
                    <a href="<?= base_url('wp-user') ?>" class="side-menu side-menu<?= $user ?>">
                        <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                        <div class="side-menu__title"> Kelola User </div>
                    </a>
                </li> -->
                <li>
                    <a href="javascript:;" class="side-menu <?= $KelolaUsers ?>">
                        <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                        <div class="side-menu__title"> Kelola User <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="<?= $datausers ?>">
                        <li>
                            <a href="<?= base_url('wp-user') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> User Admin </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('wp-user-toko') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> User Toko </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= base_url('wp-hadiah') ?>" class="side-menu side-menu<?= $hadiah ?>">
                        <div class="side-menu__icon"> <i data-feather="archive"></i> </div>
                        <div class="side-menu__title"> Kelola Hadiah </div>
                    </a>
                </li>
                
                <li>
                    <a href="<?= base_url('wp-news') ?>" class="side-menu side-menu">
                        <div class="side-menu__icon"> <i data-feather="send"></i> </div>
                        <div class="side-menu__title"> News </div>
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('wp-chat') ?>" class="side-menu side-menu">
                        <div class="side-menu__icon"> <i data-feather="message-square"></i> </div>
                        <div class="side-menu__title"> Chat </div>
                    </a>
                </li>
                

                <li>
                    <a href="javascript:;" class="side-menu <?= $pengaturanopen ?>">
                        <div class="side-menu__icon"> <i data-feather="settings"></i> </div>
                        <div class="side-menu__title"> Pengaturan <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="<?= $subpengaturan ?>">
                        <li>
                            <a href="<?= base_url('wp-data-toko') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Data Toko </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('wp-parameter-poin') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Parameter Poin </div>
                            </a>
                        </li>

                        <!-- <li>
                            <a href="<?= base_url('wp-parameter-harga-emas') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Parameter Harga Emas </div>
                            </a>
                        </li> -->
                        <li>
                            <a href="<?= base_url('wp-kurir') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Kelola Kurir </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('wp-slider') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Kelola Slider </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('wp-kelola-norek') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Kelola No Rekening Perusahaan </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('wp-setting-alamat-pengirim') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Setting Alamat Pengirim </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('wp-profile-perusahaan') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Edit Profile Perusahaan </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('wp-pushnotif') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Kirim Notifikasi Ke Customer </div>
                            </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="side-menu <?= $laporan ?>">
                        <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                        <div class="side-menu__title"> Laporan <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="<?= $sublaporan ?>">
                        <li>
                            <a href="<?= base_url('wp-laporan') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Laporan Penjualan </div>
                            </a>
                        </li>
                        <!-- <li>
                            <a href="<?= base_url('wp-laporan-pembelian') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Laporan Pembelian </div>
                            </a>
                        </li>
                        <li> -->
                            <a href="<?= base_url('wp-stock-barang') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Laporan Stock Barang </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('wp-tambah-barang') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Laporan Tambah Barang </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('wp-laporan-hancur-barang') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Laporan Hancur Barang </div>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('wp-laporan-batal-penjualan') ?>" class="side-menu">
                                <div class="side-menu__icon"> <i data-feather="circle"></i> </div>
                                <div class="side-menu__title"> Laporan Batal Penjualan </div>
                            </a>
                        </li>

                    </ul>
                </li>
                <!-- <li class="side-nav__devider my-6"></li> -->


            </ul>
        </nav>