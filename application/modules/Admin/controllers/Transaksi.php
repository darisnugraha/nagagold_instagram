<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends MX_Controller
{
    private $token, $connection;
    public function __construct()
    {
        parent::__construct();
        is_logged_in_admin();
        $this->load->library('Pdf');
        $this->token =  $this->session->userdata('Admintoken');
        $this->connection =  cek_internet();
        // $this->tgl_hari_ini = tanggal_hari_ini();
    }

    //Validasi Penjualan
    public function index()
    {
        if ($this->connection == true) {
            $this->session->set_userdata('title', 'Validasi Penjualan');
            $respons['DataTransaksi']  = $this->SERVER_API->_getAPI('penjualan/payment-confirm-all/0&100', $this->token);
            $respons['title']          = 'Kelola Transaksi';
            $this->template->display_admin('Transaksi/Validasi/Penjualan/index_validasi_penjualan', $respons);
        } else {
            $this->load->view('Error/index_error');
        }
    }

    public function detail_validasi_penjualan($id)
    {
        $respons['DetailTransaksi']  = $this->SERVER_API->_getAPI('penjualan/payment-confirm-filter-penjualan/' . $id, $this->token);
        $respons['title']          = 'Detail Transaksi ' . strtoupper(decrypt_url($id)) . '';
        $this->template->display_admin('Transaksi/Validasi/Penjualan/detail_transaksi_penjualan', $respons);
    }
    public function lihat_data_penjualan()
    {
        $respons['DataTransaksi']  = $this->SERVER_API->_getAPI('penjualan/belum-selesai/1&100', $this->token);
        $this->session->set_userdata('title', 'Lihat Transaksi Penjualan');
        $respons['title']          = 'Lihat Transaksi Penjualan';
        $this->template->display_admin('Transaksi/Penjualan/index_transaksi_penjualan_selesai', $respons);
    }
    public function detail_data_penjualan()
    {
        $kode = $this->input->post('kode_customer');
        $respons['DataTransaksi']  = $this->SERVER_API->_getAPI('penjualan/belum-selesai-filter-transaksi/' . $kode, $this->token);
        $this->session->set_userdata('title', 'Lihat Transaksi Penjualan');
        $respons['title']          = 'Lihat Transaksi Penjualan';
        $this->template->display_admin('Transaksi/Penjualan/index_transaksi_penjualan_selesai', $respons);
    }

    public function lihat_data_pembelian()
    {
        $this->session->set_userdata('title', 'Lihat Transaksi Pembelian');
        $respons['title']          = 'Lihat Transaksi Pembelian';
        $this->template->display_admin('Transaksi/Pembelian/index_transaksi_pembelian', $respons);
    }
    function simpan_validasi_penjualan()
    {
        $kode = $this->input->post('id_transaksi');
        $respons    = $this->SERVER_API->_postAPI('penjualan/proses/' . $kode, '', $this->token);

        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
            redirect('wp-validasi-penjualan');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function printinvoice($id)
    {
        $respons['DetailTransaksi']  = $this->SERVER_API->_getAPI('penjualan/payment-confirm-filter-penjualan/' . $id, $this->token);
        $this->load->view('Transaksi/Validasi/Penjualan/print_invoice_pdf', $respons);
    }
    public function printinvoiceproses($id)
    {
        $respons['DetailTransaksi']  = $this->SERVER_API->_getAPI('penjualan/belum-selesai-filter-transaksi/' . $id, $this->token);
        $this->load->view('Transaksi/ProsesPenjualan/print_invoice_penjualan', $respons);
    }
    public function printinvoicelihatproses($id)
    {
        $respons['tgl_sekarang']  = $this->tgl_hari_ini;
        $respons['jam_sekarang']  = date('H:i:s');
        $respons['user_export']   = $this->session->userdata('nama_user');
        $respons['DetailTransaksi']  = $this->SERVER_API->_getAPI('penjualan/belum-selesai-filter-transaksi/' . $id, $this->token);
        // $this->load->view('Transaksi/Penjualan/print_invoice_new', $respons);
        $this->load->view('Transaksi/Penjualan/print_invoice', $respons);
    }
    public function cari_validasi_penjualan()
    {
        $id = $this->input->post('no_transaksi');
        $this->session->set_userdata('title', 'Validasi Penjualan');
        $respons['DataTransaksi']  = $this->SERVER_API->_getAPI('penjualan/payment-confirm-filter-penjualan/' . $id, $this->token);
        $respons['title']          = 'Detail Transaksi ' . strtoupper(decrypt_url($id)) . '';
        $this->template->display_admin('Transaksi/Validasi/Penjualan/index_validasi_penjualan', $respons);
    }
    //End Validasi Penjualan


    //Proses Penjualan
    public function index_proses_penjualan()
    {
        $respons['DataTransaksi']  = $this->SERVER_API->_getAPI('penjualan/proses-all/0&100', $this->token);
        $respons['title']          = 'Proses Penjualan';
        $this->session->set_userdata('title', 'Proses Penjualan');
        $this->template->display_admin('Transaksi/ProsesPenjualan/index_proses_penjualan', $respons);
    }
    public function cari_proses_penjualan()
    {
        $id=$this->input->post('no_transaksi');
        $respons['DataTransaksi']  = $this->SERVER_API->_getAPI('penjualan/belum-selesai-filter-transaksi/' . $id, $this->token);
        $respons['title']          = 'Proses Penjualan';
        $this->session->set_userdata('title', 'Proses Penjualan');
        $this->template->display_admin('Transaksi/ProsesPenjualan/index_proses_penjualan', $respons);
    }
    public function index_proses_pembelian()
    {
        $respons['DataTransaksi']  = $this->SERVER_API->_getAPI('penjualan/proses-all/0&100', $this->token);
        $respons['title']          = 'Proses Pembelian';
        $this->session->set_userdata('title', 'Proses Pembelian');
        $this->template->display_admin('Transaksi/ProsesPembelian/index_proses_pembelian', $respons);
    }

    public function detail_proses_penjualan($id)
    {
        $respons['DetailTransaksi']  = $this->SERVER_API->_getAPI('penjualan/belum-selesai-filter-transaksi/' . $id, $this->token);
        $this->session->set_userdata('title', 'Proses Penjualan');
        $respons['title']          = 'Detail Transaksi ' . strtoupper(decrypt_url($id)) . '';
        $this->template->display_admin('Transaksi/ProsesPenjualan/detail_proses_penjualan', $respons);
    }
    public function detail_lihat_penjualan($id)
    {
        $respons['DetailTransaksi']  = $this->SERVER_API->_getAPI('penjualan/belum-selesai-filter-transaksi/' . $id, $this->token);
        $this->session->set_userdata('title', 'Proses Penjualan');
        $respons['title']          = 'Detail Transaksi ' . strtoupper(decrypt_url($id)) . '';
        $this->template->display_admin('Transaksi/Penjualan/detail_transaksi_penjualan_selesai', $respons);
    }

    public function simpan_proses_penjualan()
    {
        $jml = count($this->input->post('statusbarang'));
        $data_barang = $this->input->post('statusbarang');
        for ($i = 0; $i < $jml; $i++) {
            // var_dump($i);
            $potong = explode('-', $data_barang[$i]);

            if ($potong[1] == "KIRIM") {
                $keterangan = 'Barang Ready';
            } else {
                $keterangan = 'Barang Sudah Terjual';
            }
            $data[$i]['kode_barcode'] = $potong[0];
            $data[$i]['status'] = $potong[1];
            $data[$i]['keterangan'] = $keterangan;
        }

        $noresi = $this->input->post('no_resi');
        $kode = $this->input->post('id_transaksi');

        $respons = $this->SERVER_API->_postAPI('penjualan/send-item/' . $kode.'&'.$noresi, $data, $this->token);

        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
            redirect('wp-proses-penjualan');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect($_SERVER['HTTP_REFERER']);
        }

        // var_dump($this->input->post('statusbarang'));
        // $hasil = explode('-', $this->input->post('statusbarang'));

        // var_dump($hasil);
    }
    //End Proses Penjualan
    public function index_validasi_pembelian()
    {
        $this->session->set_userdata('title', 'Validasi Pembelian');
        $respons['DataTransaksi']  = $this->SERVER_API->_getAPI('penjualan/payment-confirm-customer', '', $this->token);
        $respons['title']          = 'Kelola Transaksi';
        $this->template->display_admin('Transaksi/Validasi/Pembelian/index_validasi_pembelian', $respons);
    }


    public function index_transaksi_pembelian()
    {
        // $respons['DataBarang']     = $this->SERVER_API->_getAPI('barang/open','',$this->token);
        $respons['title']          = 'Kelola Transaksi';
        $this->template->display_admin('Transaksi/Pembelian/index_transaksi_pembelian', $respons);
    }
}
