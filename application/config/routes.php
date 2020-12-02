<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['']                      = 'Home/Home/index';
$route['tentang-kami']          = 'Home/Home/tentangkami';
$route['panduan-belanja']       = 'Home/Home/panduanbelanja';
$route['faq']                   = 'Home/Home/faq';


//Route Login
$route['web']           = 'Auth/LoginController/web';


$route['login']         = 'Auth/LoginController/index';
$route['otentivikasi']  = 'Auth/LoginController/otentivikasi';
$route['verifikasi-otp'] = 'Auth/LoginController/verifikasiotp';
$route['resend-otp/(:any)']        = 'Auth/LoginController/resendotp/$1';
$route['resendotpforget/(:any)']        = 'Auth/LoginController/resendotpforget/$1';
$route['ceklogin']      = 'Auth/LoginController/ceklogin';
$route['logout']        = 'Auth/LoginController/logout';
$route['logout-admin']  = 'Auth/LoginController/logoutadmin';
$route['cekmemberlama'] = 'Auth/LoginController/cekmemberlama';
//End



//Register
$route['register']                   = 'Auth/RegisterController/index';
$route['loadkota']                   = 'Auth/LoginController/loadkota';
$route['loadkecamatan']              = 'Auth/LoginController/loadkecamatan';
$route['verifikasi-account/(:any)']  = 'Auth/LoginController/verifikasi_account/$1';
$route['resend-email/(:any)']        = 'Auth/LoginController/resendemail/$1';

//End

//Administrator
$route['wp-login']              = 'Auth/LoginController/index_admin';
$route['wp-daftar-member']      = 'Auth/LoginController/daftar_member';
$route['edit-profile-user']     = 'Auth/AdminController/edit_user_admin';
$route['cekloginadmin']         = 'Auth/LoginController/cekloginadmin';
$route['cekloginadmintoko']         = 'Auth/LoginController/cekloginadmintoko';
$route['formaktifasimemberlama'] = 'Auth/LoginController/formaktifasimemberlama';
// $route['register']              = 'Auth/LoginController/register';
$route['formmemberlama']        = 'Auth/RegisterController/formmemberlama';
$route['simpanregisteruser']    = 'Auth/RegisterController/simpanregisteruser';
$route['verifikasiemail/(:any)'] = 'Auth/RegisterController/verifikasiemail/$1';
$route['forgetpassword']        = 'Auth/LoginController/forgetpassword';
$route['send-new-password']        = 'Auth/LoginController/sendnewpassword';
$route['otpforgetpasswrod']        = 'Auth/LoginController/otpforgetpasswrod';
$route['verifikasi-otp-password']  = 'Auth/LoginController/verifikasiotppassword';
$route['new-password']             = 'Auth/LoginController/newpassword';
$route['save-password-baru']       = 'Auth/LoginController/savepasswordbaru';


$route['simpanrecorder']        = 'Auth/RegisterController/simpanrecorder';
$route['audio']        = 'Auth/RegisterController/audio';

$route['wp-dashboard']          = 'Admin/AdminController/index';
$route['wp-pushnotif']          = 'Admin/AdminController/pushnotif';
$route['kirimnotif']            = 'Admin/AdminController/kirimnotif';

$route['wp-parameter-poin']      = 'Admin/AdminController/parameterpoint';
$route['wp-profile-admin']       = 'Admin/AdminController/profileadmin';
$route['gantipasswordusertoko']  = 'Admin/AdminController/gantipasswordusertoko';
$route['wp-penjualan-admin']     = 'Admin/AdminController/datapenjualan';
$route['detail-penjualan-admin/(:any)/(:any)'] = 'Admin/AdminController/detailpenjualan/$1/$2';
$route['cekkodecustomer']       = 'Admin/AdminController/cekkodecustomer';
$route['serah-ambil']           = 'Admin/AdminController/serahambil';

$route['wp-slider']              = 'Admin/AdminController/index_slider';
$route['simpan-slider']          = 'Admin/AdminController/simpanslider';
$route['hapus-slider/(:any)']    = 'Admin/AdminController/hapusslider/$1';

//Norek
$route['wp-kelola-norek']        = 'Admin/AdminController/index_kelolanorek';
$route['simpan-norek']           = 'Admin/AdminController/tambah_norek';
$route['edit-norek']             = 'Admin/AdminController/edit_norek';
$route['hapus-norek/(:any)']     = 'Admin/AdminController/hapusrek/$1';
//endnorek

$route['wp-profile-perusahaan']  = 'Admin/AdminController/index_profile_perusahaan';
$route['simpan-profile-perusahaan']  = 'Admin/AdminController/simpaneditprofile';
$route['wp-setting-alamat-pengirim']  = 'Admin/AdminController/index_setting_alamat_pengirim';
$route['simpan-alamat-pengirim']  = 'Admin/AdminController/simpanalamatpengirim';

$route['simpan-parameter-point']  = 'Admin/AdminController/simpanparameterpoin';

$route['wp-kurir']              = 'Admin/Pengaturan/index';
$route['simpan-kurir']          = 'Admin/Pengaturan/savekurir';
$route['updatekurir']           = 'Admin/Pengaturan/updatekurir';
$route['loaddatakurir']         = 'Admin/Pengaturan/loaddatakurir';

$route['wp-parameter-harga-emas']    = 'Admin/Pengaturan/parameterhargaemas';
$route['loadparamterhargaemas']    = 'Admin/Pengaturan/loadparamterhargaemas';
$route['simpan-parameter-emas']    = 'Admin/Pengaturan/simpanparameteremas';

$route['simpan-parameter-waktu'] = 'Admin/Pengaturan/saveparameterwaktu';

$route['wp-data-toko']          = 'Admin/Pengaturan/Datatoko';
$route['simpan-data-toko']      = 'Admin/Pengaturan/SimpanDataToko';
$route['hapus-data-kota/(:any)'] = 'Admin/Pengaturan/HapusKota/$1';


$route['wp-barang']             = 'Admin/DataBarang/index';
$route['cari-barang-aktive']    = 'Admin/DataBarang/caribarangaktif';

$route['getBarcodeHancur']      = 'Admin/DataBarang/getBarcodeHancur';

$route['cari-barcodde-js']      = 'Admin/DataBarang/caribarcoddejs';
$route['simpantmphancur']       = 'Admin/DataBarang/simpantmphancur';
$route['loadhancurbarang']      = 'Admin/DataBarang/loadhancurbarang';
$route['hapushancur']           = 'Admin/DataBarang/hapushancur';
$route['simpan-hancurbarang-semua'] = 'Admin/DataBarang/simpanhancursemua';

$route['edit-barang/(:any)']           = 'Admin/DataBarang/edibarang/$1';
$route['edit-barang-active/(:any)/(:any)']    = 'Admin/DataBarang/editbarangactive/$1/$2';
$route['simpan-edit-barang']    = 'Admin/DataBarang/simpaneditbarang';
$route['cari-jenis']            = 'Admin/DataBarang/cariJenis';
$route['wp-hancur-barang']         = 'Admin/DataBarang/hancurbarang';
$route['wp-barang-online']         = 'Admin/DataBarang/barangonline';
$route['wp-batal-penjualan']       = 'Admin/DataBarang/batalpenjualan';

$route['wp-laporan-hancur-barang']              = 'Admin/Laporan/LaporanHancurBarang';
$route['wp-laporan-batal-penjualan']            = 'Admin/Laporan/LaporanBatalPenjualan';



$route['wp-tambah-barang']              = 'Admin/Laporan/indexlaporantambahkbarang';
$route['export-laporan-tambah-barang']  = 'Admin/Laporan/exportlaporantambahbarang';
$route['export-exel-laporan-tambah-barang']  = 'Admin/Laporan/exportexellaporantambahbarang';

$route['export-laporan-hancur-barang']      = 'Admin/Laporan/exportlaporanhancurbarang';
$route['export-exel-hancur-barang']      = 'Admin/Laporan/exportexelhancurbarang';


$route['wp-stock-barang']                   = 'Admin/Laporan/indexlaporanstockbarang';
$route['export-exel-rekap-stock-barang']    = 'Admin/Laporan/exportexelrekapstockbarang';
$route['export-exel-detail-stock-barang']    = 'Admin/Laporan/exportexeldetailstockbarang';

$route['wp-laporan-pembelian']     = 'Admin/Laporan/laporanbarangpembelian';
$route['export-laporan-penjualan'] = 'Admin/Laporan/exportLaporanpenjualan';
$route['export-laporan-batal-penjualan'] = 'Admin/Laporan/exportLaporanbatalpenjualan';
$route['export-exel-laporan-penjualan'] = 'Admin/Laporan/exportexllaporanpenjualan';
$route['export-exel-laporan-batal-penjualan'] = 'Admin/Laporan/exportexllaporanbatalpenjualan';

$route['wp-laporan']               = 'Admin/Laporan/laporanbarang';
$route['export-laporan-stock']     = 'Admin/Laporan/exportLaporanstock';


//Kategori
$route['wp-kategori-barang']                 = 'Admin/DataBarang/kategoribarang';
$route['simpan-kategori']                    = 'Admin/DataBarang/simpankategori';
$route['edit-kategori']                      = 'Admin/DataBarang/editkategori';
$route['hapus-kategori/(:any)']              = 'Admin/DataBarang/hapuskategori/$1';
//Kategori

//Jenis
$route['wp-jenis']                            = 'Admin/DataBarang/jenisbarang';
$route['simpan-jenis']                        = 'Admin/DataBarang/simpanjenis';
$route['edit-jenis']                          = 'Admin/DataBarang/editjenis';
$route['hapus-jenis/(:any)']                  = 'Admin/DataBarang/hapusjenis/$1';
//Jenis

//Validasi Penjualan
$route['wp-validasi-penjualan']               = 'Admin/Transaksi/index';
$route['wp-lihat-penjualan']                  = 'Admin/Transaksi/lihat_data_penjualan';
$route['cari-detail-transaksi']               = 'Admin/Transaksi/detail_data_penjualan';
$route['wp-lihat-pembelian']                  = 'Admin/Transaksi/lihat_data_pembelian';
$route['cari-validasi-penjualan']             = 'Admin/Transaksi/cari_validasi_penjualan';
$route['detail-validasi-penjualan/(:any)']    = 'Admin/Transaksi/detail_validasi_penjualan/$1';
$route['simpan-validasi-penjualan']           = 'Admin/Transaksi/simpan_validasi_penjualan';
$route['print-invoice/(:any)']                = 'Admin/Transaksi/printinvoice/$1';
$route['printinvoiceproses/(:any)']           = 'Admin/Transaksi/printinvoiceproses/$1';
$route['printinvoicelihatproses/(:any)']           = 'Admin/Transaksi/printinvoicelihatproses/$1';




$route['wp-validasi-pembelian']               = 'Admin/Transaksi/index_validasi_pembelian';



//Proses Penjualan
$route['wp-proses-penjualan']                = 'Admin/Transaksi/index_proses_penjualan';
$route['wp-proses-pembelian']                = 'Admin/Transaksi/index_proses_pembelian';
$route['simpan-proses-penjualan']            = 'Admin/Transaksi/simpan_proses_penjualan';
$route['detail-proses-penjualan/(:any)']     = 'Admin/Transaksi/detail_proses_penjualan/$1';
$route['detail-lihat-penjualan/(:any)']     = 'Admin/Transaksi/detail_lihat_penjualan/$1';



$route['wp-transaksi-pembelian']              = 'Admin/Transaksi/index_transaksi_pembelian';
$route['cari-no-transaksi-proses-penjualan']  = 'Admin/Transaksi/cari_proses_penjualan';

//Shop


//user
$route['wp-user']                            = 'Admin/AdminController/userlist';
$route['wp-user-toko']                       = 'Admin/AdminController/userlisttoko';
$route['simpan-user']                        = 'Admin/AdminController/simpanusser';
$route['simpan-user-toko']                   = 'Admin/AdminController/simpanussertoko';
$route['edit-user']                          = 'Admin/AdminController/edituser';
$route['hapus-user/(:any)']                  = 'Admin/AdminController/hapususer/$1';
$route['hapus-user-toko/(:any)']              = 'Admin/AdminController/hapususertoko/$1';
//En user

//Hadiah
$route['wp-hadiah']                            = 'Admin/DataBarang/hadiah';
$route['simpan-tambah-stock-hadiah']           = 'Admin/DataBarang/tamnahstockhadiah';
$route['simpan-ambil-stock-hadiah']           = 'Admin/DataBarang/ambilstockhadiah';
$route['simpan-hadiah']                        = 'Admin/DataBarang/simpanhadiah';
$route['edit-hadiah']                          = 'Admin/DataBarang/edithadiah';
$route['hapus-hadiah/(:any)']                  = 'Admin/DataBarang/hapushadiah/$1';
//Hadiah

// User
$route['wp-dashboard-user']                     = 'User/UserController/index';
$route['loaddatahistory']                       = 'User/UserController/loaddatahistory';
$route['cek-status-pesanan/(:any)/(:any)']      = 'User/UserController/cekstatuspesanan/$1/$2';
$route['cari-no-resi']                          = 'User/UserController/carinoresi';
$route['cekresi']                               = 'User/UserController/loaddataresi';
$route['wp-edit-user-profile']                  = 'User/UserController/editprofile';
$route['wp-daftar-alamat']                      = 'User/UserController/daftaralamat';
$route['wp-ganti-alamat/(:any)']                = 'User/UserController/gantialamat/$1';
$route['wp-hapus-alamat/(:any)']                = 'User/UserController/hapusalamat/$1';
$route['wp-simpan-alamat']                      = 'User/UserController/simpanalamat';
$route['wp-history-transaksi']                  = 'User/UserController/historytransaksi';
$route['testistory']                            = 'User/UserController/testistory';
$route['wp-status-pembelianbarang']             = 'User/UserController/statuspembelianbarang';
$route['virtual-card']                          = 'User/UserController/virtualcard';
$route['konfirmasipembayaran/(:any)']           = 'User/UserController/fompermbayaran/$1';
$route['save-konfirmasi']                       = 'User/UserController/savekonfirmasipesanan';
$route['otentifikasi']                          = 'User/UserController/otentifikasi';
$route['showformeditemail&nohp']                = 'User/UserController/formeditemailhp';
$route['update-myacount']                       = 'User/UserController/editcustomer';
$route['wp-history-transaksi-selesai']           = 'User/UserController/historytransaksiselesai';
$route['verifikasi-no-hp']                      = 'User/UserController/verifikasi_no_hp';
$route['validasi-otp']                          = 'User/UserController/validasi_otp';
$route['verifikasi-email']                          = 'User/UserController/verifikasi_email';

// end

//Home
$route['panduan-pembayaran']                 = 'Home/Home/panduanpembayaran';
$route['home/loaddatakategori']              = 'Home/Home/loaddatakategori';
$route['home/loaddatabarangperkategori']     = 'Home/Home/loaddatabarangperkategori';
$route['home/loadbarangbaruaktif']           = 'Home/Home/loaddatabarangbaru';
$route['produk/(:any)']                      = 'Home/Home/produkdetail/$1';
$route['cart']                               = 'Home/Keranjang/index';
$route['checkout']                           = 'Home/Keranjang/checkout';
$route['wp-lanjutkan-checkout/(:any)']       = 'Home/Keranjang/LanjutkanCheckout/$1';
$route['getAlamatToko']                      = 'Home/Keranjang/getAlamatToko';

$route['caribarang']                        = 'Home/Home/pencarianbarang';
$route['carinamabarang']                    = 'Home/Home/pencariannamabarang';
$route['loadcarinamabarang']                = 'Home/Home/loadcarinamabarang';


$route['proses-to-checkout']                 = 'Home/Keranjang/checkout';
$route['complate_checkout']                 = 'Home/Keranjang/complate_checkout';
$route['carikategori/(:any)/(:any)']         = 'Home/Home/carikategori/$1/$2';
$route['carijenis/(:any)/(:any)']            = 'Home/Home/carijenis/$1/$2';
$route['getKategori']                        = 'Admin/DataBarang/getKategori';
$route['admin/loaddashboard']                = 'Admin/AdminController/loaddashboard';

$route['estimasi-harga-penjualan']           = 'Home/Home/index_pengajuanpenjualan';
$route['loadkategorimobile']                 = 'Home/Home/loaddatakategorimobile';
$route['listkategori']                       = 'Home/Home/listkategori';
$route['kontak']                             = 'Home/Home/kontak';
//

//
$route['add-cart/(:any)']                     = 'Home/Keranjang/tambahkeranjang/$1';
$route['detail-add-cart/(:any)']             = 'Home/Keranjang/tambahkeranjangdetail/$1';

$route['loadjmlkeranjang']                    = 'Home/Keranjang/loadjmlkeranjang';
$route['delete-cart/(:any)']                  = 'Home/Keranjang/deletecart/$1';
$route['savetochcekout']                      = 'Home/Keranjang/savetochcekout';

$route['shop']                                = 'Home/Shop/index';
$route['shop/loaddatashop']                   = 'Home/Shop/loaddatashop';
$route['cekongkir']                           = 'Home/Shop/cekongkir';
$route['wp-hapus-old-order/(:any)']           = 'Home/Keranjang/hapushistoryorder/$1';
$route['wp-terima-pesanan']                   = 'User/UserController/konfirmasipenerimaanbarang';
$route['set-batal-penjualan']                  = 'User/UserController/batal_penjualan';
// $route['wp-terima-pesanan/(:any)']            = 'User/UserController/konfirmasipenerimaanbarang/$1';

$route['getBarcodePengajuanPenjualan']         = 'Home/Home/getBarcodePengajuanPenjualan';
$route['pencariankodecustomer']                = 'Admin/DataBarang/pencariankodecustomer';
$route['simpan-batal-penjualan']               = 'Admin/DataBarang/simpanbatalpenjualan';

$route['save-penjualanpenjualan']              = 'Home/Home/savepenjualanpengajuan';


$route['(.*)'] = "error404";
