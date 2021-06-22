<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends MX_Controller
{
    private $mobile, $token;
    public function __construct()
    {
        parent::__construct();
        $this->ceonnection = cek_internet();
        $this->mobile = detect_mobile();
        $this->token =  $this->session->userdata('token');
    }
    function index()
    {
        $data['DataKeranjang']      = $this->SERVER_API->_getAPI('cart/new', $this->token);
        if ($this->session->userdata('token')) {
            if ($this->mobile === true) {
                $this->session->set_userdata('status_header', '');
                $this->session->set_userdata('title', 'Cart');
                $this->template->v2('Mobile/v2/index_keranjang', $data);
            } else {
                $this->template->display_toko('Dekstop/index_keranjang', $data);
            }
        } else {
            // $this->session->set_flashdata('alert', information('Silahkan Login Terlebih Dahulu'));
            redirect('login');
        }
    }

    function savetochcekout()
    {
        // var_dump($this->input->post('total_berat'));
        // die;
        if ($this->input->post('total_harga') == "0" && $this->input->post('total_berat') == '0') {
            if ($this->mobile === true) {
                $this->session->set_flashdata('alert', '<div class="error-notification animated fadeIn">Mohon Pilih Barang Untuk Di Checkout</div>');
            } else {
                $this->session->set_flashdata('alert', information('Mohon Pilih Barang Untuk Di Checkout'));
            }
            redirect('cart');
        } else {
            for ($i = 0; $i < count($this->input->post('kode_barcode')); $i++) {
                $data_barcode = explode('~', $this->input->post('kode_barcode')[$i]);
                $hasil_barcode[$i]['kode_barcode'] = $data_barcode[0];
                $hasil_barcode[$i]['harga']        = intval($data_barcode[1]);
                $hasil_barcode[$i]['nama_barang']  = $data_barcode[2];
                $hasil_barcode[$i]['gambar']       = $data_barcode[3];
                $hasil_barcode[$i]['berat']       = $data_barcode[4];
                $hasil_barcode[$i]['ongkos_produksi']  = $data_barcode[5];
                $hasil_barcode[$i]['kadar']  = $data_barcode[6];
            }

            // var_dump($hasil_barcode);
            // die;
            $data['data_barang'] = $hasil_barcode;
            $this->session->set_userdata($data);
            redirect('checkout');
        }
    }

    function complate_checkout()
    {
        // $data["nama_customer"] = $this->input->post('nama_customer');
        // $data["email"] = $this->input->post('email');
        // $data["no_hp"] = $this->session->userdata('no_hp');
        if ($this->input->post('type_pengambilan') == "Antar Dengan Kurir") {
            $data['type_trx'] = "KIRIM";
        } else {
            $data['type_trx'] = "AMBIL";
        }
        $data['id_alamat_penerima'] = $this->input->post('alamat_customer');
        if ($this->input->post('type_pengambilan') == "Ambil Ditoko") {
            $data['kode_toko']  = $this->input->post('alamat_toko');
            $data['ongkir'] = 0;
            $data['jenis_courier'] = '-';
        } else {
            $data['ongkir'] = intval($this->input->post('harga_kurir'));
            $data['jenis_courier'] = $this->input->post('jenis_kurir');
            $data['kode_toko'] = "-";
        }
        $data['total_bayar'] = intval(str_replace(',', '', $this->input->post('total_harga')));
        $data["total_berat"] = floatval($this->input->post('berat'));
        $data["total_berat_pkg"] = floatval($this->input->post('berat'));
        $data["total_dp"] = intval($this->input->post('total_dp'));
        $data['total_harga'] = intval(str_replace(',', '', $this->input->post('total_harga2')));

        $barcode = $this->input->post('kode_barcode');
        for ($i = 0; $i < count($barcode); $i++) {
            $hasil_barcode[$i]['kode_barcode'] = $barcode[$i];
        }
        $data['detail_barang'] = $hasil_barcode;
        if ($this->input->post('type_pengambilan') == "Antar Dengan Kurir") {
            if ($this->input->post('jenis_kurir') == "") {
                if ($this->mobile === true) {
                    $this->session->set_flashdata('alert', information('Kurir Tidak Boleh Kosong'));
                } else {
                    $this->session->set_flashdata('alert', information('Kurir Tidak Boleh Kosong'));
                }
                redirect('checkout');
            }
        }
        $respons    = $this->SERVER_API->_postAPI('penjualan/confirm-jual', $data, $this->token);
        if ($respons->status == "berhasil") {
            if ($this->mobile === true) {
                $this->session->set_flashdata('alert', success($respons->pesan));
            } else {
                $this->session->set_flashdata('alert', success($respons->pesan));
            }
            redirect('');
        } else {
            if ($this->mobile === true) {
                $this->session->set_flashdata('alert', information($respons->pesan));
            } else {
                $this->session->set_flashdata('alert', information($respons->pesan));
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
        // $data['potongan'] = $this->input->post('potongan');
    }
    function loadjmlkeranjang()
    {
        if ($_POST['action']) {
            $insert    = $this->SERVER_API->_getAPI('cart/count', $this->token);
            if ($insert->data == null) {
                echo 'kosong';
            } else {
                $this->output->set_status_header(200);
                $this->output->set_content_type('application/json', 'utf-8');
                return $this->output->set_output(json_encode($insert));
            }
        } else {
            redirect('');
        }
    }
    function getAlamatToko()
    {
        $insert    = $this->SERVER_API->_getAPI('toko/all', $this->token);
        $this->output->set_status_header(200);
        $this->output->set_content_type('application/json', 'utf-8');
        return $this->output->set_output(json_encode($insert));
    }
    function checkout()
    {
        $data['DataBank']    = $this->SERVER_API->_getAPI('rekening/all', $this->token);
        $data['DaftarALamat']      = $this->SERVER_API->_getAPI('customer/alamat', $this->token);
        if ($this->mobile === true) {
            $this->session->set_userdata('status_header', '');
            $this->session->set_userdata('title', 'Checkout');
            $this->template->v2('Mobile/v2/index_checkout', $data);
        } else {
            $this->template->display_toko('Dekstop/index_checkout', $data);
        }
    }
    function LanjutkanCheckout($id)
    {
        $data['DaftarALamat']      = $this->SERVER_API->_getAPI('customer/alamat', $this->token);
        $data['Cart']              = $this->SERVER_API->_getAPI('cart/checkout-get', $this->token);
        if ($data['Cart']->status == "berhasil") {
            if ($data['cart']->data == null) {
                $this->session->set_flashdata('alert', information('Koneksi Anda Bermasalah Silahkan Coba Beberapa Saat Lagi'));
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                // $data['DataToko']          = $this->SERVER_API->_getAPI('cart/checkout-get', $this->token);
                if ($this->mobile === true) {
                    $this->session->set_userdata('status_header', '');
                    $this->session->set_userdata('title', 'Checkout');
                    $this->template->v2('Mobile/v2/index_checkout', $data);
                } else {
                    $this->template->display_toko('Dekstop/index_checkout', $data);
                }
            }
        } else {
            $this->session->set_flashdata('alert', information('Koneksi Anda Bermasalah Silahkan Coba Beberapa Saat Lagi'));
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function tambahkeranjanghadiah($kode)
    {
        $respons               = $this->SERVER_API->_postAPI('tukar-poin/add-new/' . $kode.'&'.'1', '', $this->token);
        // var_dump($respons);
        // die;
        if ($respons->statusCode == 200) {
            if ($this->mobile === true) {
                $this->session->set_flashdata('alert', '<div class="add2cart-notification animated fadeIn">' . $respons->pesan . '</div>');
            } else {
                $this->session->set_flashdata('alert', success($respons->pesan));
            }
        } else {
            if ($this->mobile === true) {
                $this->session->set_flashdata('alert', '<div class="error-notification animated fadeIn">' . $respons->pesan . '</div>');
            } else {
                $this->session->set_flashdata('alert', information($respons->pesan));
            }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    function tambahkeranjang($kode)
    {
        $data = decrypt_url($kode);
        $respons               = $this->SERVER_API->_postAPI('cart/add/' . $data, '', $this->token);
        // var_dump($respons);
        // die;
        if ($respons->status == "berhasil") {
            if ($this->mobile === true) {
                $this->session->set_flashdata('alert', '<div class="add2cart-notification animated fadeIn">' . $respons->pesan . '</div>');
            } else {
                $this->session->set_flashdata('alert', success($respons->pesan));
            }
        } else {
            if ($this->mobile === true) {
                $this->session->set_flashdata('alert', '<div class="error-notification animated fadeIn">' . $respons->pesan . '</div>');
            } else {
                $this->session->set_flashdata('alert', information($respons->pesan));
            }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
    function tambahkeranjangdetail($kode)
    {
        $data = decrypt_url($kode);
        $respons               = $this->SERVER_API->_postAPI('cart/add/' . $data, '', $this->token);
        if ($respons->status == "berhasil") {
            if ($this->mobile === true) {
                $this->session->set_flashdata('alert', '<div class="add2cart-notification animated fadeIn">' . $respons->pesan . '</div>');
            } else {
                $this->session->set_flashdata('alert', success($respons->pesan));
            }
        } else {
            if ($this->mobile === true) {
                $this->session->set_flashdata('alert', '<div class="error-notification animated fadeIn">' . $respons->pesan . '</div>');
            } else {
                $this->session->set_flashdata('alert', information($respons->pesan));
            }
        }
        redirect('');
    }
    function deletecart($kode)
    {
        $data = decrypt_url($kode);
        // var_dump($data);
        $respons               = $this->SERVER_API->_deletetAPI('cart/delete/' . $data, $this->token);

        if ($respons->status == "berhasil") {
            if ($this->mobile === true) {
                $this->session->set_flashdata('alert', '<div class="add2cart-notification animated fadeIn">' . $respons->pesan . '</div>');
            } else {
                $this->session->set_flashdata('alert', success($respons->pesan));
            }
        } else {
            if ($this->mobile === true) {
                $this->session->set_flashdata('alert', '<div class="erorr-notification animated fadeIn">' . $respons->pesan . '</div>');
            } else {
                $this->session->set_flashdata('alert', success($respons->pesan));
            }
        }
        redirect('cart');
    }

    function hapushistoryorder($id)
    {
        $respons               = $this->SERVER_API->_deletetAPI('cart/checkout-delete/' . $id, $this->token);
        if ($respons->status == "berhasil") {
            if ($this->mobile === true) {
                $this->session->set_flashdata('alert', success($respons->pesan));

                redirect('wp-history-transaksi');
            } else {
                $this->session->set_flashdata('alert', success($respons->pesan));
                redirect('wp-dashboard-user');
            }
        } else {
            if ($this->mobile === true) {
                $this->session->set_flashdata('alert', success($respons->pesan));
                redirect('wp-history-transaksi');
            } else {
                $this->session->set_flashdata('alert', success($respons->pesan));
                redirect('wp-dashboard-user');
            }
        }
    }
}
