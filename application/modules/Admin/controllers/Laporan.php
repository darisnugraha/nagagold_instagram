<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends MX_Controller
{
    private $token, $connection, $tgl_hari_ini;
    public function __construct()
    {
        parent::__construct();
        is_logged_in_admin();
        $this->token =  $this->session->userdata('Admintoken');
        $this->load->library('Pdf');
        $this->load->helper('tgl_indo');
        $this->tgl_hari_ini = tanggal_hari_ini();
        $this->connection =  cek_internet();
    }

    public function exportLaporanstock()
    {
        $data['type']       = $this->input->post('type');
        $data['kategori']   = $this->input->post('kategori');
        $data['jenis']      = $this->input->post('jenis');

        $respons['tgl_sekarang']  = $this->tgl_hari_ini;
        $respons['jam_sekarang']  = date('H:i:s');
        $respons['user_export']   = $this->session->userdata('nama_user');
        $respons['type_laporan']          = $this->input->post('type_laporan')[0];
        $type_laporan = $this->input->post('type_laporan');

        $respons['DataLaporanStockBarang']  = $this->SERVER_API->_getAPI(
            'barang/laporan-stock/'
                . $type_laporan[0] . '&'
                . $this->input->post('kode_kategori') . '&'
                . $this->input->post('kode_jenis') . '&'
                . $this->input->post('status_active') . '&' . '0' . '&'
                . '0',
            $this->token
        );

        // var_dump($respons['DataLaporanStockBarang']);
        // die;
        if ($respons['DataLaporanStockBarang']->data == null) {
            $this->session->set_flashdata('alert', information('Laporan Tidak Ada'));
            redirect('wp-stock-barang');
        } else {
            if ($this->input->post('typeexport') == "PDF") {
                if ($type_laporan[0] == "rekap") {
                    $this->load->view('Laporan/LaporanBarang/LaporanStock/rekapcetaklaporanstock', $respons);
                } else {
                    $this->load->view('Laporan/LaporanBarang/LaporanStock/detailcetaklaporanstock', $respons);
                }
            } else {

                if ($this->input->post('typeexport') == "") {
                    $this->session->set_flashdata('alert', information('Pilih Type Export Laporan Pdf / Exxel'));
                    redirect('wp-stock-barang');
                } else {
                    if ($type_laporan[0] == "rekap") {
                        $this->session->set_flashdata('export-rekap-exel-stockbarang', $respons);
                        redirect('export-exel-rekap-stock-barang');
                    } else {
                        $this->session->set_flashdata('export-detail-exel-stockbarang', $respons);
                        redirect('export-exel-detail-stock-barang');
                    }
                }
            }
        }
    }

    function exportlaporantambahbarang()
    {
        $data['tgl_awal']       = $this->input->post('tgl_awal');
        $data['tgl_akhir']      = $this->input->post('tgl_akhir');
        // $data['type']           = $this->input->post('type_rekap');
        $type_rekap             = $this->input->post('type');

        $respons['tgl_sekarang']  = $this->tgl_hari_ini;
        $respons['jam_sekarang']  = date('H:i:s');
        $respons['user_export']   = $this->session->userdata('nama_user');
        $respons['type']          = $this->input->post('type_rekap');
        $respons['tgl_awal']       = $this->input->post('tgl_awal');
        $respons['tgl_akhir']      = $this->input->post('tgl_akhir');
        // barang/laporan-tambah-barang
        $respons['LaporanTambahBarang']  = $this->SERVER_API->_getAPI('barang/laporan-tambah-barang/'. $this->input->post('tgl_awal') . '&' . $this->input->post('tgl_akhir') . '&'. '0' . '&'. '0',
            $this->token
        );

        if ($type_rekap == "PDF") {
            $this->load->view('Laporan/LaporanBarang/LaporanTambahBarang/cetaklaporanrekap', $respons);
        } else {
            if ($type_rekap == "") {
                $this->session->set_flashdata('alert', information('Pilih Type Export Laporan Pdf / Exxel'));
                redirect('wp-tambah-barang');
            }else{
                $this->session->set_flashdata('export-exel-tambah-barang', $respons);
                redirect('export-exel-laporan-tambah-barang');
            }
        }
    }
    function laporanbarang()
    {
        $this->session->set_userdata('title', 'Laporan Transaksi Penjualan');
        $respons['title']          = 'Laporan Transaksi Penjualan';
        $this->template->display_admin('Laporan/TransaksiPenjualan/index_laporan_penjualan', $respons);
    }
    function LaporanBatalPenjualan()
    {
        $this->session->set_userdata('title', 'Laporan Batal Penjualan');
        $respons['title']          = 'Laporan Batal Penjualan';
        $this->template->display_admin('Laporan/TransaksiPenjualan/LaporanBatalPenjualan/index_laporan_batal_penjualan', $respons);
    }
    function LaporanHancurBarang()
    {
        $this->session->set_userdata('title', 'Laporan Hancur Barang');
        $respons['title']          = 'Laporan Hancur Barang';
        $this->template->display_admin('Laporan/LaporanBarang/LaporanHancurBarang/index_laporan_hancur', $respons);
    }
    function exportlaporanhancurbarang(){
        $data['tgl_awal']       = $this->input->post('tgl_awal');
        $data['tgl_akhir']      = $this->input->post('tgl_akhir');
        $data['limit']          = $this->input->post('limit');
        $data['type']           = $this->input->post('type');
        $respons['DataLaporanHancurBarang']     = $this->SERVER_API->_getAPI('barang/laporan-hancur-barang/' . $this->input->post('tgl_awal') . '&' . $this->input->post('tgl_akhir') . '&' . '0' . '&' . '0', $this->token);
        if ($respons['DataLaporanHancurBarang']->status == "berhasil") {
            if ($respons['DataLaporanHancurBarang']->data == null) {
                $this->session->set_flashdata('alert', information('Laporan Tidak Ada'));
                redirect('wp-laporan-hancur-barang');
            } else {
                $respons['tgl_awal']      = $this->input->post('tgl_awal');
                $respons['tgl_akhir']     = $this->input->post('tgl_akhir');
                $respons['tgl_sekarang']  = $this->tgl_hari_ini;
                $respons['jam_sekarang']  = date('H:i:s');
                $respons['user_export']   = $this->session->userdata('nama_user');
                if ($this->input->post('type') == "pdf") {
                    $this->load->view('Laporan/LaporanBarang/LaporanHancurBarang/cetaklaporan', $respons);
                } else {
                    if ($this->input->post('type') == "") {
                        $this->session->set_flashdata('alert', information('Pilih Type Export Laporan Pdf / Exxel'));
                        redirect('wp-laporan-hancur-barang');
                    } else {
                        $this->session->set_flashdata('export-exel-hancur-barang', $respons);
                        redirect('export-exel-hancur-barang');
                    }
                }
            }
        } else {
            $this->session->set_flashdata('alert', information('Laporan Tidak Ada'));
            redirect('wp-laporan-hancur-barang');
        }


    }
    function laporanbarangpembelian()
    {
        $this->session->set_userdata('title', 'Laporan Transaksi Pembelian');
        $respons['title']          = 'Laporan Transaksi Pembelian';
        $this->template->display_admin('Laporan/TransaksiPembelian/index_laporan_pembelian', $respons);
    }

    function indexlaporanstockbarang()
    {
        $this->session->set_userdata('title', 'Laporan Stock Barang');
        $respons['title']          = 'Laporan Stock Barang';
        $this->template->display_admin('Laporan/LaporanBarang/LaporanStock/index_laporan_stock', $respons);
    }

    function indexlaporantambahkbarang()
    {
        $this->session->set_userdata('title', 'Laporan Tambah Barang');
        $respons['title']          = 'Laporan Tambah Barang';
        $this->template->display_admin('Laporan/LaporanBarang/LaporanTambahBarang/index_laporan_tambah_barang', $respons);
    }
    function exportLaporanbatalpenjualan()
    {
        $data['tgl_awal']       = $this->input->post('tgl_awal');
        $data['tgl_akhir']      = $this->input->post('tgl_akhir');
        $data['type']           = $this->input->post('type');
        $respons['DataLaporanBarang']     = $this->SERVER_API->_getAPI('penjualan-batal/batal-filter-date/' . $this->input->post('tgl_awal') . '&' . $this->input->post('tgl_akhir') . '&' . '0' . '&' . '0', $this->token);

        if ($respons['DataLaporanBarang']->status == "berhasil") {
            if ($respons['DataLaporanBarang']->data == null) {
                $this->session->set_flashdata('alert', information('Laporan Tidak Ada'));
                redirect('wp-laporan');
            } else {
                $respons['tgl_awal']      = $this->input->post('tgl_awal');
                $respons['tgl_akhir']     = $this->input->post('tgl_akhir');
                $respons['tgl_sekarang']  = $this->tgl_hari_ini;
                $respons['jam_sekarang']  = date('H:i:s');
                $respons['user_export']   = $this->session->userdata('nama_user');
                if ($this->input->post('type') == "pdf") {
                    $this->load->view('Laporan/TransaksiPenjualan/LaporanBatalPenjualan/cetaklaporan', $respons);
                } else {
                    if ($this->input->post('type') == "") {
                        $this->session->set_flashdata('alert', information('Pilih Type Export Laporan Pdf / Exxel'));
                        redirect('wp-laporan');
                    } else {
                        $this->session->set_flashdata('export-exel-laporanbatalpejualan', $respons);
                        redirect('export-exel-laporan-batal-penjualan');
                    }
                }
            }
        } else {
            $this->session->set_flashdata('alert', information('Laporan Tidak Ada'));
            redirect('wp-laporan');
        }
    }
    function exportLaporanpenjualan()
    {
        $data['tgl_awal']       = $this->input->post('tgl_awal');
        $data['tgl_akhir']      = $this->input->post('tgl_akhir');
        $data['type']           = $this->input->post('type');

        $respons['DataLaporanBarang']     = $this->SERVER_API->_getAPI('penjualan/selesai-filter-date/' . $this->input->post('tgl_awal') . '&' . $this->input->post('tgl_akhir') . '&' . '0' . '&' . '0', $this->token);

        if ($respons['DataLaporanBarang']->status == "berhasil") {
            if ($respons['DataLaporanBarang']->data == null) {
                $this->session->set_flashdata('alert', information('Laporan Tidak Ada'));
                redirect('wp-laporan');
            } else {
                $respons['tgl_awal']      = $this->input->post('tgl_awal');
                $respons['tgl_akhir']     = $this->input->post('tgl_akhir');
                $respons['tgl_sekarang']  = $this->tgl_hari_ini;
                $respons['jam_sekarang']  = date('H:i:s');
                $respons['user_export']   = $this->session->userdata('nama_user');
                if ($this->input->post('type') == "pdf") {
                    $this->load->view('Laporan/TransaksiPenjualan/cetaklaporan', $respons);
                } else {
                    if ($this->input->post('type') == "") {
                        $this->session->set_flashdata('alert', information('Pilih Type Export Laporan Pdf / Exxel'));
                        redirect('wp-laporan');
                    } else {
                        $this->session->set_flashdata('export-exel-laporanpejualan', $respons);
                        redirect('export-exel-laporan-penjualan');
                    }
                }
            }
        } else {
            $this->session->set_flashdata('alert', information('Laporan Tidak Ada'));
            redirect('wp-laporan');
        }
    }

    function exportexelhancurbarang()
    {
        $data = $this->session->userdata('export-exel-hancur-barang');

        // var_dump($data);
        // die;

        if ($data == null) {
            $this->session->set_flashdata('alert', information('Pilih Type Export Laporan Pdf / Exxel'));
            redirect('wp-tambah-barang');
        } else {
            include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
            // Panggil class PHPExcel nya
            $excel = new PHPExcel();

            // Settingan awal fil excel
            $excel->getProperties()->setCreator($this->session->userdata('nama_user'))
                ->setTitle("Laporan Transaksi Penjualan")
                ->setSubject("Laporan Transaksi Penjualan")
                ->setLastModifiedBy($this->session->userdata('nama_user'))
                ->setCategory("Laporan Transaksi Penjualan")
                ->setCompany('Toko MAs Hidup')
                ->setKeywords("Laporan Transaksi Penjualan");

            // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
            $style_col = array(
                'font' => array('bold' => true), // Set font nya jadi bold
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                ),
                'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );

            $detailbarang = array(
                'font' => array('bold' => true), // Set font nya jadi bold
                // 'alignment' => array(
                //     'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                //     'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                // ),
                'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );

            // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
            $style_row = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                ),
                'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );

            $excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN HANCUR BARANG"); // Set kolom A1 dengan tulisan "DATA Member"
            $excel->getActiveSheet()->mergeCells('A1:G1'); // Set Merge Cell pada kolom A1 sampai E1

            $excel->setActiveSheetIndex(0)->setCellValue('A2', $data['tgl_awal'] . ' s/d ' .  $data['tgl_akhir']); // Set kolom A1 dengan tulisan "DATA Member"
            $excel->getActiveSheet()->mergeCells('A2:G2'); // Set Merge Cell pada kolom A1 sampai E1

            $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
            $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
            $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $excel->getActiveSheet()->getStyle('F1:H1000')->getNumberFormat()->setFormatCode('#,##0.00');
            // $excel->getActiveSheet()->getStyle('G1:H1000')->getNumberFormat()->setFormatCode('#,##');
            // $excel->getActiveSheet()->getStyle('E1:H1000')->getNumberFormat()->setFormatCode('#,##');

            // Set text center untuk kolom A1

            // Buat header tabel nya pada baris ke 3
            $excel->setActiveSheetIndex(0)->setCellValue('A3', "No"); // Set kolom A3 dengan tulisan "NO"
            $excel->setActiveSheetIndex(0)->setCellValue('B3', "Kode Barcode"); // Set kolom B3 dengan tulisan "NIS"
            $excel->setActiveSheetIndex(0)->setCellValue('C3', "Nama Barang"); // Set kolom C3 dengan tulisan "NAMA"
            $excel->setActiveSheetIndex(0)->setCellValue('D3', "Kategori"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
            $excel->setActiveSheetIndex(0)->setCellValue('E3', "Jenis"); // Set kolom E3 dengan tulisan "ALAMAT"
            $excel->setActiveSheetIndex(0)->setCellValue('F3', "Berat"); // Set kolom E3 dengan tulisan "ALAMAT"
            $excel->setActiveSheetIndex(0)->setCellValue('G3', "Berat Asli"); // Set kolom E3 dengan tulisan "ALAMAT"


            // Apply style header yang telah kita buat tadi ke masing-masing kolom header
            $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);

            // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya

            $no = 1; // Untuk penomoran tabel, di awal set dengan 1
            $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4

            $no=1;
            $berat=0;
            $berat_asli=0;
            foreach ($data['DataLaporanHancurBarang']->data as $row) { // Lakukan looping pada variabel Member
                $berat += $row->berat;
                $berat_asli += $row->berat_asli;
                    $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
                    $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $row->kode_barcode);
                    $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $row->nama_barang);
                    $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $row->kode_kategori);
                    $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $row->kode_jenis);
                    $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $row->berat);
                    $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $row->berat_asli);

                    // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
                    $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);

                    $no++; // Tambah 1 setiap kali looping
                    $numrow++; // Tambah 1 setiap kali looping
            }
            $hasil = $no + 3;
            $excel->getActiveSheet()->mergeCells('A' . $hasil . ':E' . $hasil);
            $excel->setActiveSheetIndex(0)->setCellValue('A' . $hasil, 'Total');
            $excel->setActiveSheetIndex(0)->setCellValue('F' . $hasil, $berat);
            $excel->setActiveSheetIndex(0)->setCellValue('G' . $hasil, $berat_asli);

            $excel->getActiveSheet()->getStyle('A' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('G' . $hasil)->applyFromArray($style_row);


            // Set width kolom
            $excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true); // Set width kolom A
            $excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true); // Set width kolom B
            $excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true); // Set width kolom C
            $excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true); // Set width kolom D
            $excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true); // Set width kolom E
            $excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true); // Set width kolom E

            // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
            $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

            // Set orientasi kertas jadi LANDSCAPE
            $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

            // Set judul file excel nya
            $excel->getActiveSheet(0)->setTitle("Laporan Hancur Barang");
            $excel->setActiveSheetIndex(0);

            // Proses file excel
            header('Content-Type: application/vnd.ms-excel');
            // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="Laporan Hancur Barang.xls"'); // Set nama file excel nya
            header('Cache-Control: max-age=0');

            $write = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
            $write->save('php://output');
        }
    }
    function exportexellaporantambahbarang()
    {
        $data = $this->session->userdata('export-exel-tambah-barang');

        // var_dump($data);
        // die;

        if ($data == null) {
            $this->session->set_flashdata('alert', information('Pilih Type Export Laporan Pdf / Exxel'));
            redirect('wp-tambah-barang');
        } else {
            include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
            // Panggil class PHPExcel nya
            $excel = new PHPExcel();

            // Settingan awal fil excel
            $excel->getProperties()->setCreator($this->session->userdata('nama_user'))
                ->setTitle("Laporan Transaksi Penjualan")
                ->setSubject("Laporan Transaksi Penjualan")
                ->setLastModifiedBy($this->session->userdata('nama_user'))
                ->setCategory("Laporan Transaksi Penjualan")
                ->setCompany('Toko MAs Hidup')
                ->setKeywords("Laporan Transaksi Penjualan");

            // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
            $style_col = array(
                'font' => array('bold' => true), // Set font nya jadi bold
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                ),
                'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );

            $detailbarang = array(
                'font' => array('bold' => true), // Set font nya jadi bold
                // 'alignment' => array(
                //     'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                //     'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                // ),
                'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );

            // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
            $style_row = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                ),
                'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );

            $excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN TAMBAH BARANG"); // Set kolom A1 dengan tulisan "DATA Member"
            $excel->getActiveSheet()->mergeCells('A1:G1'); // Set Merge Cell pada kolom A1 sampai E1

            $excel->setActiveSheetIndex(0)->setCellValue('A2', $data['tgl_awal'] . ' s/d ' .  $data['tgl_akhir']); // Set kolom A1 dengan tulisan "DATA Member"
            $excel->getActiveSheet()->mergeCells('A2:G2'); // Set Merge Cell pada kolom A1 sampai E1

            $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
            $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
            $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $excel->getActiveSheet()->getStyle('F1:H1000')->getNumberFormat()->setFormatCode('#,##0.00');
            // $excel->getActiveSheet()->getStyle('G1:H1000')->getNumberFormat()->setFormatCode('#,##');
            // $excel->getActiveSheet()->getStyle('E1:H1000')->getNumberFormat()->setFormatCode('#,##');

            // Set text center untuk kolom A1

            // Buat header tabel nya pada baris ke 3
            $excel->setActiveSheetIndex(0)->setCellValue('A3', "No"); // Set kolom A3 dengan tulisan "NO"
            $excel->setActiveSheetIndex(0)->setCellValue('B3', "Kode Barcode"); // Set kolom B3 dengan tulisan "NIS"
            $excel->setActiveSheetIndex(0)->setCellValue('C3', "Nama Barang"); // Set kolom C3 dengan tulisan "NAMA"
            $excel->setActiveSheetIndex(0)->setCellValue('D3', "Kategori"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
            $excel->setActiveSheetIndex(0)->setCellValue('E3', "Jenis"); // Set kolom E3 dengan tulisan "ALAMAT"
            $excel->setActiveSheetIndex(0)->setCellValue('F3', "Berat"); // Set kolom E3 dengan tulisan "ALAMAT"
            $excel->setActiveSheetIndex(0)->setCellValue('G3', "Berat Asli"); // Set kolom E3 dengan tulisan "ALAMAT"


            // Apply style header yang telah kita buat tadi ke masing-masing kolom header
            $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);

            // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya

            $no = 1; // Untuk penomoran tabel, di awal set dengan 1
            $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4

            $no=1;
            $berat=0;
            $berat_asli=0;
            foreach ($data['LaporanTambahBarang']->data as $row) { // Lakukan looping pada variabel Member
                $berat += $row->berat;
                $berat_asli += $row->berat_asli;
                    $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
                    $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $row->kode_barcode);
                    $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $row->nama_barang);
                    $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $row->kode_kategori);
                    $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $row->kode_jenis);
                    $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $row->berat);
                    $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $row->berat_asli);

                    // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
                    $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);

                    $no++; // Tambah 1 setiap kali looping
                    $numrow++; // Tambah 1 setiap kali looping
            }
            $hasil = $no + 3;
            $excel->getActiveSheet()->mergeCells('A' . $hasil . ':E' . $hasil);
            $excel->setActiveSheetIndex(0)->setCellValue('A' . $hasil, 'Total');
            $excel->setActiveSheetIndex(0)->setCellValue('F' . $hasil, $berat);
            $excel->setActiveSheetIndex(0)->setCellValue('G' . $hasil, $berat_asli);

            $excel->getActiveSheet()->getStyle('A' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('G' . $hasil)->applyFromArray($style_row);


            // Set width kolom
            $excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true); // Set width kolom A
            $excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true); // Set width kolom B
            $excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true); // Set width kolom C
            $excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true); // Set width kolom D
            $excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true); // Set width kolom E
            $excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true); // Set width kolom E

            // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
            $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

            // Set orientasi kertas jadi LANDSCAPE
            $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

            // Set judul file excel nya
            $excel->getActiveSheet(0)->setTitle("Laporan Tambah Barang");
            $excel->setActiveSheetIndex(0);

            // Proses file excel
            header('Content-Type: application/vnd.ms-excel');
            // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="Laporan Tambah Barang.xls"'); // Set nama file excel nya
            header('Cache-Control: max-age=0');

            $write = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
            $write->save('php://output');
        }
    }
    function exportexllaporanbatalpenjualan()
    {
        $data = $this->session->userdata('export-exel-laporanbatalpejualan');

        if ($data == null) {
            $this->session->set_flashdata('alert', information('Pilih Type Export Laporan Pdf / Exxel'));
            redirect('wp-laporan');
        } else {
            include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
            // Panggil class PHPExcel nya
            $excel = new PHPExcel();

            // Settingan awal fil excel
            $excel->getProperties()->setCreator($this->session->userdata('nama_user'))
                ->setTitle("Laporan Batal Penjualan")
                ->setSubject("Laporan Batal Penjualan")
                ->setLastModifiedBy($this->session->userdata('nama_user'))
                ->setCategory("Laporan Batal Penjualan")
                ->setCompany('Toko Mas Hidup')
                ->setKeywords("Laporan Batal Penjualan");

            // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
            $style_col = array(
                'font' => array('bold' => true), // Set font nya jadi bold
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                ),
                'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );

            $detailbarang = array(
                'font' => array('bold' => true), // Set font nya jadi bold
                // 'alignment' => array(
                //     'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                //     'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                // ),
                'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );

            // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
            $style_row = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                ),
                'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );

            $excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN BATAL PENJUALAN"); // Set kolom A1 dengan tulisan "DATA Member"
            $excel->getActiveSheet()->mergeCells('A1:G1'); // Set Merge Cell pada kolom A1 sampai E1

            $excel->setActiveSheetIndex(0)->setCellValue('A2', $data['tgl_awal'] . ' s/d ' .  $data['tgl_akhir']); // Set kolom A1 dengan tulisan "DATA Member"
            $excel->getActiveSheet()->mergeCells('A2:G2'); // Set Merge Cell pada kolom A1 sampai E1

            $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
            $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
            $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $excel->getActiveSheet()->getStyle('F1:H1000')->getNumberFormat()->setFormatCode('#,##0.00');
            $excel->getActiveSheet()->getStyle('G1:G1000')->getNumberFormat()->setFormatCode('#,##');
            $excel->getActiveSheet()->getStyle('H1:H1000')->getNumberFormat()->setFormatCode('#,##');
            $excel->getActiveSheet()->getStyle('I1:I1000')->getNumberFormat()->setFormatCode('#,##');
            $excel->getActiveSheet()->getStyle('J1:J1000')->getNumberFormat()->setFormatCode('#,##');

            // Set text center untuk kolom A1

            // Buat header tabel nya pada baris ke 3
            $excel->setActiveSheetIndex(0)->setCellValue('A3', "No"); // Set kolom A3 dengan tulisan "NO"
            $excel->setActiveSheetIndex(0)->setCellValue('B3', "Id Customer"); // Set kolom B3 dengan tulisan "NIS"
            $excel->setActiveSheetIndex(0)->setCellValue('C3', "Kode Barcode"); // Set kolom C3 dengan tulisan "NAMA"
            $excel->setActiveSheetIndex(0)->setCellValue('D3', "Nama Barang"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
            $excel->setActiveSheetIndex(0)->setCellValue('E3', "Berat"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
            $excel->setActiveSheetIndex(0)->setCellValue('F3', "Kadar"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
            $excel->setActiveSheetIndex(0)->setCellValue('G3', "Ongkos"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
            $excel->setActiveSheetIndex(0)->setCellValue('H3', "Harga"); // Set kolom E3 dengan tulisan "ALAMAT"
            $excel->setActiveSheetIndex(0)->setCellValue('I3', "Qty"); // Set kolom E3 dengan tulisan "ALAMAT"
            $excel->setActiveSheetIndex(0)->setCellValue('J3', "Total Harga"); // Set kolom E3 dengan tulisan "ALAMAT"


            // Apply style header yang telah kita buat tadi ke masing-masing kolom header
            $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);

            // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya

            $no = 1; // Untuk penomoran tabel, di awal set dengan 1
            $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4

            $totalbabrang = 0;
            $grandtotal = 0;
            $grandsub = 0;
            $totalberat=0;
            foreach ($data['DataLaporanBarang']->data as $row) { // Lakukan looping pada variabel Member
                $totalbabrang = count($row->detail_barang);
                $grandtotal += count($row->detail_barang);
                foreach ($row->detail_barang as $brg) {
                    $totalharga += $brg->harga;
                    $grandsub += $brg->harga;
                    $totalberat += $brg->berat;

                    $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
                    $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $row->kode_customer);
                    $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $brg->kode_barcode);
                    $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $brg->nama_barang);
                    $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $brg->berat);
                    $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $brg->kadar_cetak);
                    $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $brg->ongkos);
                    $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $brg->harga);
                    $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, '1');
                    $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $brg->harga);

                    // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
                    $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($detailbarang);
                    $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('J' . $numrow)->applyFromArray($style_row);

                    $no++; // Tambah 1 setiap kali looping
                    $numrow++; // Tambah 1 setiap kali looping
                }
            }
            $hasil = $no + 3;
            $excel->getActiveSheet()->mergeCells('A' . $hasil . ':D' . $hasil);
            $excel->setActiveSheetIndex(0)->setCellValue('A' . $hasil, 'Total');
            $excel->setActiveSheetIndex(0)->setCellValue('E' . $hasil, $totalberat);
            $excel->setActiveSheetIndex(0)->setCellValue('I' . $hasil, $grandtotal);
            $excel->setActiveSheetIndex(0)->setCellValue('J' . $hasil, $grandsub);

            $excel->getActiveSheet()->getStyle('A' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('G' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('H' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('I' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('J' . $hasil)->applyFromArray($style_row);


            // Set width kolom
            $excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true); // Set width kolom A
            $excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true); // Set width kolom B
            $excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true); // Set width kolom C
            $excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true); // Set width kolom D
            $excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true); // Set width kolom E
            $excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true); // Set width kolom E
            $excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true); // Set width kolom E
            $excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true); // Set width kolom E
            $excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true); // Set width kolom E
            $excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true); // Set width kolom E

            // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
            $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

            // Set orientasi kertas jadi LANDSCAPE
            $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

            // Set judul file excel nya
            $excel->getActiveSheet(0)->setTitle("Laporan Batal Penjualan");
            $excel->setActiveSheetIndex(0);

            // Proses file excel
            header('Content-Type: application/vnd.ms-excel');
            // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="Laporan Batal Penjualan.xls"'); // Set nama file excel nya
            header('Cache-Control: max-age=0');

            $write = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
            $write->save('php://output');
        }
    }
    function exportexllaporanpenjualan()
    {
        $data = $this->session->userdata('export-exel-laporanpejualan');

        if ($data == null) {
            $this->session->set_flashdata('alert', information('Pilih Type Export Laporan Pdf / Exxel'));
            redirect('wp-laporan');
        } else {
            include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
            // Panggil class PHPExcel nya
            $excel = new PHPExcel();

            // Settingan awal fil excel
            $excel->getProperties()->setCreator($this->session->userdata('nama_user'))
                ->setTitle("Laporan Transaksi Penjualan")
                ->setSubject("Laporan Transaksi Penjualan")
                ->setLastModifiedBy($this->session->userdata('nama_user'))
                ->setCategory("Laporan Transaksi Penjualan")
                ->setCompany('Toko MAs Hidup')
                ->setKeywords("Laporan Transaksi Penjualan");

            // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
            $style_col = array(
                'font' => array('bold' => true), // Set font nya jadi bold
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                ),
                'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );

            $detailbarang = array(
                'font' => array('bold' => true), // Set font nya jadi bold
                // 'alignment' => array(
                //     'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                //     'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                // ),
                'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );

            // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
            $style_row = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                ),
                'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );

            $excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN TRANSAKSI PENJUALAN"); // Set kolom A1 dengan tulisan "DATA Member"
            $excel->getActiveSheet()->mergeCells('A1:G1'); // Set Merge Cell pada kolom A1 sampai E1

            $excel->setActiveSheetIndex(0)->setCellValue('A2', $data['tgl_awal'] . ' s/d ' .  $data['tgl_akhir']); // Set kolom A1 dengan tulisan "DATA Member"
            $excel->getActiveSheet()->mergeCells('A2:G2'); // Set Merge Cell pada kolom A1 sampai E1

            $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
            $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
            $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $excel->getActiveSheet()->getStyle('F1:H1000')->getNumberFormat()->setFormatCode('#,##0.00');
            $excel->getActiveSheet()->getStyle('H1:H1000')->getNumberFormat()->setFormatCode('#,##');
            $excel->getActiveSheet()->getStyle('G1:G1000')->getNumberFormat()->setFormatCode('#,##');
            $excel->getActiveSheet()->getStyle('I1:I1000')->getNumberFormat()->setFormatCode('#,##');
            $excel->getActiveSheet()->getStyle('J1:J1000')->getNumberFormat()->setFormatCode('#,##');

            // Set text center untuk kolom A1

            // Buat header tabel nya pada baris ke 3
            $excel->setActiveSheetIndex(0)->setCellValue('A3', "No"); // Set kolom A3 dengan tulisan "NO"
            $excel->setActiveSheetIndex(0)->setCellValue('B3', "Id Customer"); // Set kolom B3 dengan tulisan "NIS"
            $excel->setActiveSheetIndex(0)->setCellValue('C3', "Kode Barcode"); // Set kolom C3 dengan tulisan "NAMA"
            $excel->setActiveSheetIndex(0)->setCellValue('D3', "Nama Barang"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
            $excel->setActiveSheetIndex(0)->setCellValue('E3', "Berat"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
            $excel->setActiveSheetIndex(0)->setCellValue('F3', "Kadar"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
            $excel->setActiveSheetIndex(0)->setCellValue('G3', "Ongkos"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
            $excel->setActiveSheetIndex(0)->setCellValue('H3', "Harga"); // Set kolom E3 dengan tulisan "ALAMAT"
            $excel->setActiveSheetIndex(0)->setCellValue('I3', "Qty"); // Set kolom E3 dengan tulisan "ALAMAT"
            $excel->setActiveSheetIndex(0)->setCellValue('J3', "Total Harga"); // Set kolom E3 dengan tulisan "ALAMAT"


            // Apply style header yang telah kita buat tadi ke masing-masing kolom header
            $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);

            // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya

            $no = 1; // Untuk penomoran tabel, di awal set dengan 1
            $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4

            $totalbabrang = 0;
            $grandtotal = 0;
            $grandsub = 0;
            $totalberat=0;
            foreach ($data['DataLaporanBarang']->data as $row) { // Lakukan looping pada variabel Member
                $totalbabrang = count($row->detail_barang);
                $grandtotal += count($row->detail_barang);
                foreach ($row->detail_barang as $brg) {
                    $totalharga += $brg->harga;
                    $grandsub += $brg->harga + $brg->ongkos;
                    $totalberat += $brg->berat;

                    $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
                    $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $row->kode_customer);
                    $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $brg->kode_barcode);
                    $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $brg->nama_barang);
                    $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $brg->berat);
                    $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $brg->kadar_cetak);
                    $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $brg->ongkos);
                    $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $brg->harga);
                    $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, '1');
                    $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $brg->harga + $brg->ongkos);

                    // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
                    $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($detailbarang);
                    $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('J' . $numrow)->applyFromArray($style_row);

                    $no++; // Tambah 1 setiap kali looping
                    $numrow++; // Tambah 1 setiap kali looping
                }
            }
            $hasil = $no + 3;
            $excel->getActiveSheet()->mergeCells('A' . $hasil . ':D' . $hasil);
            $excel->setActiveSheetIndex(0)->setCellValue('A' . $hasil, 'Total');
            $excel->setActiveSheetIndex(0)->setCellValue('E' . $hasil, $totalberat);
            $excel->setActiveSheetIndex(0)->setCellValue('I' . $hasil, $grandtotal);
            $excel->setActiveSheetIndex(0)->setCellValue('J' . $hasil, $grandsub);

            $excel->getActiveSheet()->getStyle('A' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('G' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('H' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('I' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('J' . $hasil)->applyFromArray($style_row);


            // Set width kolom
            $excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true); // Set width kolom A
            $excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true); // Set width kolom B
            $excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true); // Set width kolom C
            $excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true); // Set width kolom D
            $excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true); // Set width kolom E
            $excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true); // Set width kolom E
            $excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true); // Set width kolom E
            $excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true); // Set width kolom E
            $excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true); // Set width kolom E
            $excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true); // Set width kolom E

            // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
            $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

            // Set orientasi kertas jadi LANDSCAPE
            $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

            // Set judul file excel nya
            $excel->getActiveSheet(0)->setTitle("Laporan Transaksi Penjualan");
            $excel->setActiveSheetIndex(0);

            // Proses file excel
            header('Content-Type: application/vnd.ms-excel');
            // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="Laporan Transaksi Penjualan.xls"'); // Set nama file excel nya
            header('Cache-Control: max-age=0');

            $write = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
            $write->save('php://output');
        }
    }
    function exportexelrekapstockbarang()
    {
        $data = $this->session->userdata('export-rekap-exel-stockbarang');


        if ($data == null) {
            $this->session->set_flashdata('alert', information('Pilih Type Export Laporan Pdf / Exxel'));
            redirect('wp-laporan');
        } else {
            include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
            // Panggil class PHPExcel nya
            $excel = new PHPExcel();

            // Settingan awal fil excel
            $excel->getProperties()->setCreator($this->session->userdata('nama_user'))
                ->setTitle("Laporan Rekap Stock Barang")
                ->setSubject("Laporan Rekap Stock Barang")
                ->setLastModifiedBy($this->session->userdata('nama_user'))
                ->setCategory("Laporan Rekap Stock Barang")
                ->setCompany('Toko MAs Hidup')
                ->setKeywords("Laporan Rekap Stock Barang");

            // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
            $style_col = array(
                'font' => array('bold' => true), // Set font nya jadi bold
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                ),
                'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );

            $detailbarang = array(
                'font' => array('bold' => true), // Set font nya jadi bold
                // 'alignment' => array(
                //     'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                //     'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                // ),
                'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );

            // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
            $style_row = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                ),
                'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );

            $excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN REKAP STOCK BARANG"); // Set kolom A1 dengan tulisan "DATA Member"
            $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1

            $excel->setActiveSheetIndex(0)->setCellValue('A2', $data['tgl_sekarang']); // Set kolom A1 dengan tulisan "DATA Member"
            $excel->getActiveSheet()->mergeCells('A2:E2'); // Set Merge Cell pada kolom A1 sampai E1

            $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
            $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
            $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $excel->getActiveSheet()->getStyle('F1:H1000')->getNumberFormat()->setFormatCode('#,##0.00');
            // $excel->getActiveSheet()->getStyle('D1:D1000')->getNumberFormat()->setFormatCode('#,##');
            // $excel->getActiveSheet()->getStyle('E1:H1000')->getNumberFormat()->setFormatCode('#,##');

            // Set text center untuk kolom A1

            // Buat header tabel nya pada baris ke 3
            $excel->setActiveSheetIndex(0)->setCellValue('A3', "No"); // Set kolom A3 dengan tulisan "NO"
            $excel->setActiveSheetIndex(0)->setCellValue('B3', "Kategori"); // Set kolom B3 dengan tulisan "NIS"
            $excel->setActiveSheetIndex(0)->setCellValue('C3', "Jenis"); // Set kolom C3 dengan tulisan "NAMA"
            $excel->setActiveSheetIndex(0)->setCellValue('D3', "Jumlah"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
            $excel->setActiveSheetIndex(0)->setCellValue('E3', "Berat"); // Set kolom E3 dengan tulisan "ALAMAT"


            // Apply style header yang telah kita buat tadi ke masing-masing kolom header
            $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);


            // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya

            $no = 1; // Untuk penomoran tabel, di awal set dengan 1
            $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4

            $stock = 0;
            $berat = 0;
            foreach ($data['DataLaporanStockBarang']->data as $row) { // Lakukan looping pada variabel Member
                $stock += $row->stock_on_hand;
                $berat += $row->berat;
                if ($row->kode_kategori == "-" || $row->kode_jenis == "-") {
                    $keterangankategori = "Belum Ada Kategori";
                    $keteranganjenis = "Belum Ada Jenis";
                } else {
                    $keteranganjenis = "$row->nama_jenis ($row->kode_jenis)";
                    $keterangankategori = "$row->nama_kategori ($row->kode_kategori)";
                }
                $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
                $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $keterangankategori);
                $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $keteranganjenis);
                $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $row->stock_on_hand);
                $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $row->berat);


                // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
                $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);


                $no++; // Tambah 1 setiap kali looping
                $numrow++; // Tambah 1 setiap kali looping
            }
            $hasil = $no + 3;
            $excel->getActiveSheet()->mergeCells('A' . $hasil . ':C' . $hasil);
            $excel->setActiveSheetIndex(0)->setCellValue('A' . $hasil, 'Total');
            $excel->setActiveSheetIndex(0)->setCellValue('D' . $hasil, $stock);
            $excel->setActiveSheetIndex(0)->setCellValue('E' . $hasil, $berat);

            $excel->getActiveSheet()->getStyle('A' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E' . $hasil)->applyFromArray($style_row);



            // Set width kolom
            $excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true); // Set width kolom A
            $excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true); // Set width kolom B
            $excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true); // Set width kolom C
            $excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true); // Set width kolom D
            $excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true); // Set width kolom E


            // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
            $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

            // Set orientasi kertas jadi LANDSCAPE
            $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

            // Set judul file excel nya
            $excel->getActiveSheet(0)->setTitle("Laporan Rekap Stock Barang");
            $excel->setActiveSheetIndex(0);

            // Proses file excel
            header('Content-Type: application/vnd.ms-excel');
            // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="Laporan Rekap Stock Barang.xls"'); // Set nama file excel nya
            header('Cache-Control: max-age=0');

            $write = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
            $write->save('php://output');
        }
    }
    function exportexeldetailstockbarang()
    {
        $data = $this->session->userdata('export-detail-exel-stockbarang');


        if ($data == null) {
            $this->session->set_flashdata('alert', information('Pilih Type Export Laporan Pdf / Exxel'));
            redirect('wp-laporan');
        } else {
            include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
            // Panggil class PHPExcel nya
            $excel = new PHPExcel();

            // Settingan awal fil excel
            $excel->getProperties()->setCreator($this->session->userdata('nama_user'))
                ->setTitle("Laporan Detail Stock Barang")
                ->setSubject("Laporan Detail Stock Barang")
                ->setLastModifiedBy($this->session->userdata('nama_user'))
                ->setCategory("Laporan Detail Stock Barang")
                ->setCompany('Toko MAs Hidup')
                ->setKeywords("Laporan Detail Stock Barang");

            // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
            $style_col = array(
                'font' => array('bold' => true), // Set font nya jadi bold
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                ),
                'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );

            $detailbarang = array(
                'font' => array('bold' => true), // Set font nya jadi bold
                // 'alignment' => array(
                //     'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                //     'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                // ),
                'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );

            // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
            $style_row = array(
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
                ),
                'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
                )
            );

            $excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN DETAIL STOCK BARANG"); // Set kolom A1 dengan tulisan "DATA Member"
            $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1

            $excel->setActiveSheetIndex(0)->setCellValue('A2', $data['tgl_sekarang']); // Set kolom A1 dengan tulisan "DATA Member"
            $excel->getActiveSheet()->mergeCells('A2:E2'); // Set Merge Cell pada kolom A1 sampai E1

            $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
            $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
            $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // $excel->getActiveSheet()->getStyle('F1:H1000')->getNumberFormat()->setFormatCode('#,##0.00');
            // $excel->getActiveSheet()->getStyle('D1:D1000')->getNumberFormat()->setFormatCode('#,##');
            // $excel->getActiveSheet()->getStyle('E1:H1000')->getNumberFormat()->setFormatCode('#,##');

            // Set text center untuk kolom A1
            $numrow = 6; // Set baris pertama untuk isi tabel adalah baris ke 4
            $X = 0;
            foreach ($data['DataLaporanStockBarang']->data as $row) {
                $fild[0]['kode_kategori']     = $row->kode_kategori;
                $fild[0]['nama_kategori']     = $row->nama_kategori;
                $fild[0]['kode_jenis']     = $row->kode_jenis;
                $fild[0]['nama_jenis']     = $row->nama_jenis;
                $detail[$X]['nama_barang']     = $row->nama_barang;
                $detail[$X]['kode_barcode']     = $row->kode_barcode;
                $detail[$X]['berat']     = $row->berat;
                $detail[$X]['stock_on_hand']     = $row->stock_on_hand;
                $fild[0]['detail_barang']     = $detail;
                $X++;
            }
            // Buat header tabel nya pada baris ke 3
            foreach ($fild as $rows) {
            $excel->setActiveSheetIndex(0)->setCellValue('A3', 'Kode Kategori : '.$rows['kode_kategori'].''); // Set kolom A1 dengan tulisan "DATA Member"
            $excel->getActiveSheet()->mergeCells('A3:E3'); // Set Merge Cell pada kolom A1 sampai E1

            $excel->setActiveSheetIndex(0)->setCellValue('A4', 'Kode Jenis : '.$rows['kode_jenis'].''); // Set kolom A1 dengan tulisan "DATA Member"
            $excel->getActiveSheet()->mergeCells('A4:E4'); // Set Merge Cell pada kolom A1 sampai E1
            }

            $excel->setActiveSheetIndex(0)->setCellValue('A5', "No"); // Set kolom A3 dengan tulisan "NO"
            $excel->setActiveSheetIndex(0)->setCellValue('B5', "Barcode"); // Set kolom B3 dengan tulisan "NIS"
            $excel->setActiveSheetIndex(0)->setCellValue('C5', "Nama Barang"); // Set kolom C3 dengan tulisan "NAMA"
            $excel->setActiveSheetIndex(0)->setCellValue('D5', "Qty"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
            $excel->setActiveSheetIndex(0)->setCellValue('E5', "Berat"); // Set kolom E3 dengan tulisan "ALAMAT"


            // Apply style header yang telah kita buat tadi ke masing-masing kolom header
            $excel->getActiveSheet()->getStyle('A5')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('B5')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('C5')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('D5')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('E5')->applyFromArray($style_col);


            // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya


            
            foreach ($fild as $rows) {
                $berat = 0;
                $no = 1; // Untuk penomoran tabel, di awal set dengan 1
                $stock = 0; // Untuk penomoran tabel, di awal set dengan 1
                foreach ($rows['detail_barang'] as $show) {
                    $berat += $show['berat'];
                    $stock += $show['stock_on_hand'];
                    $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
                    $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $show['kode_barcode']);
                    $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $show['nama_barang']);
                    $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $show['stock_on_hand']);
                    $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $show['berat']);


                    // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
                    $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
                    $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);


                    $no++; // Tambah 1 setiap kali looping
                    $numrow++; // Tambah 1 setiap kali looping
                }
            }
            $hasil = $no + 4;
            $excel->getActiveSheet()->mergeCells('A' . $hasil . ':C' . $hasil);
            $excel->setActiveSheetIndex(0)->setCellValue('A' . $hasil, 'Total');
            $excel->setActiveSheetIndex(0)->setCellValue('D' . $hasil, $stock);
            $excel->setActiveSheetIndex(0)->setCellValue('E' . $hasil, $berat);

            $excel->getActiveSheet()->getStyle('A' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D' . $hasil)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E' . $hasil)->applyFromArray($style_row);



            // Set width kolom
            $excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true); // Set width kolom A
            $excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true); // Set width kolom B
            $excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true); // Set width kolom C
            $excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true); // Set width kolom D
            $excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true); // Set width kolom E


            // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
            $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

            // Set orientasi kertas jadi LANDSCAPE
            $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

            // Set judul file excel nya
            $excel->getActiveSheet(0)->setTitle("Laporan Detail Stock Barang");
            $excel->setActiveSheetIndex(0);

            // Proses file excel
            header('Content-Type: application/vnd.ms-excel');
            // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="Laporan Detail Stock Barang.xls"'); // Set nama file excel nya
            header('Cache-Control: max-age=0');

            $write = PHPExcel_IOFactory::createWriter($excel, 'Excel5');
            $write->save('php://output');
        }
    }
}
