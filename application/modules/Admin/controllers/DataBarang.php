<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataBarang extends MX_Controller
{
    private $token, $connection, $tgl_hari_ini;
    public function __construct()
    {
        parent::__construct();
        is_logged_in_admin();
        // $this->load->library('upload');
        $this->token =  $this->session->userdata('Admintoken');
        $this->load->library('Pdf');
        $this->load->helper('tgl_indo');
        $this->tgl_hari_ini = tanggal_hari_ini();
        $this->connection =  cek_internet();
    }
    // Kelola Data Barang
    public function index()
    {
        if ($this->connection == true) {
            $respons['DataBarang']     = $this->SERVER_API->_getAPI('barang/open', $this->token);
            $respons['title']          = 'Data Barang';
            $this->session->set_userdata('title', 'List Barang Upload');
            $this->template->display_admin('DataBarang/index_databarang', $respons);
        } else {
            $this->load->view('Error/index_error');
        }
    }
    public function barangonline()
    {
        $respons['DataKategori']   = $this->SERVER_API->_getAPI('kategori', $this->token);
        $respons['DataBarang']     = 'kosong';
        $respons['title']          = 'Data Barang';
        $this->session->set_userdata('title', 'List Barang Online');
        $this->template->display_admin('DataBarang/index_databarangonline', $respons);
    }

    // Kelola Kategori Barang
    function kategoribarang()
    {
        $respons['DataKategori']   = $this->SERVER_API->_getAPI('kategori', $this->token);
        $respons['title']          = 'Kategori Barang';
        $this->session->set_userdata('title', 'Kategori Barang');
        $this->template->display_admin('Kategoribarang/index_kategoribarang', $respons);
    }

    function edibarang($id)
    {
        $respons['title']          = 'Edit Barang';
        $respons['DataJenis']      = $this->SERVER_API->_getAPI('jenis', $this->token);
        $respons['DataKategori']   = $this->SERVER_API->_getAPI('kategori', $this->token);
        $respons['DetailBarang']     = $this->SERVER_API->_getAPI('barang/barcode/' . decrypt_url($id), $this->token);
        $respons['DataKelompok']            = $this->SERVER_API->_getAPI('kelompok/all');

        $this->template->display_admin('DataBarang/index_editbarang', $respons);
    }
    function editbarangactive($id, $status)
    {
        $respons['status']  = $status;
        $respons['title']            = 'Edit Barang Active';
        $respons['DataJenis']        = $this->SERVER_API->_getAPI('jenis', $this->token);
        $respons['DataKategori']     = $this->SERVER_API->_getAPI('kategori', $this->token);
        $respons['DataKelompok']            = $this->SERVER_API->_getAPI('kelompok/all');
        $respons['DataJenisKelompok']       = $this->SERVER_API->_getAPI('jenis-kelompok/all');
        $respons['DetailBarang']     = $this->SERVER_API->_getAPI('barang/barcode/' . decrypt_url($id), $this->token);
        $this->template->display_admin('DataBarang/edit-barang-active', $respons);
    }
    function caribarangaktif()
    {
        $respons['title']          = 'Cari Barang Active';
        $respons['DataKategori']   = $this->SERVER_API->_getAPI('kategori', $this->token);
        $id                        = $this->input->post('kode_kategori');
        $respons['DataBarang']     = $this->SERVER_API->_getAPI('barang/kategori/all/' . $id, $this->token);
        $this->template->display_admin('DataBarang/index_databarangonline', $respons);
    }
    public function carijenis()
    {
        $id                   = $this->input->post('kode_kategori');
        $insert               = $this->SERVER_API->_getAPI('jenis/kategori/' . $id, $this->token);
        $this->output->set_status_header(200);
        $this->output->set_content_type('application/json', 'utf-8');
        return $this->output->set_output(json_encode($insert));
    }
    public function cariJeniskelompok()
    {
        $id                   = $this->input->post('kode_kelompok');
        $insert               = $this->SERVER_API->_getAPI('jenis-kelompok/kelompok/' . $id, $this->token);
        $this->output->set_status_header(200);
        $this->output->set_content_type('application/json', 'utf-8');
        return $this->output->set_output(json_encode($insert));
    }
    public function getKategori()
    {
        $insert               = $this->SERVER_API->_getAPI('kategori', $this->token);
        $this->output->set_status_header(200);
        $this->output->set_content_type('application/json', 'utf-8');
        return $this->output->set_output(json_encode($insert));
    }

    function hancurbarang()
    {
        $this->session->set_userdata('title', 'Hancur Barang');
        $respons['DataBarang']     = $this->SERVER_API->_getAPI('barang/open', $this->token);
        $respons['title']            = 'Hancur Barang';
        $this->template->display_admin('HancurBarang/index_hancur_barang', $respons);
    }

    function simpaneditbarang()
    {
        $directory = './assets/images/NsiPic/product/';
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        // $jml                    = count($this->input->post('nama_file'));
        $jml_gambar                = $this->input->post('jml_gambar');
        $nama_file                = $this->input->post('nama_file');
        // $nama_file1                = $this->input->post('photo');
        $data['kode_intern']    = decrypt_url($this->input->post('kode_intern'));
        $data['nama_barang']    = decrypt_url($this->input->post('nama_barang'));
        $data['nama_atribut']   = decrypt_url($this->input->post('nama_atribut'));
        $data['kode_kategori']  = $this->input->post('kode_kategori');
        $data['kode_jenis']     = $this->input->post('kode_jenis');
        $data['kode_kelompok']  = $this->input->post('kode_kelompok');
        $data['kode_jenis_kelompok']  = strval($this->input->post('jenis_kelompok'));
        $data['kadar_cetak']    = intval(decrypt_url($this->input->post('kadar_cetak')));
        $data['harga_atribut']  = intval(decrypt_url($this->input->post('harga_atribut')));
        $data['ongkos']            = intval(decrypt_url($this->input->post('ongkos')));
        $config['quality']          = '50%';
        $config['upload_path']   =  $directory; //path folder
        $config['overwrite']     = TRUE;
        $config['encrypt_name']  = TRUE;
        $config['remove_spaces'] = TRUE;
        $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $this->load->library('upload', $config);
        $y = 0;
        $z = 0;
        $jml = 0;
        for ($i = 0; $i <= $jml_gambar; $i++) {
            $jml = $jml + 1;
            $nama = sprintf('%04s', $jml);
            if ($_FILES['photo' . $i]['name'] != '') {
                if (!empty($_FILES['photo' . $i]['name'])) {
                    if (!$this->upload->do_upload('photo' . $i))
                        $this->session->set_flashdata('alert', success($this->upload->display_errors()));
                        $uploadData = $this->upload->data();
                        $uploadData = $this->upload->data();
                        $config1['image_library'] = 'gd2';
                        $config1['source_image'] = './assets/images/NsiPic/product/' . $uploadData['file_name'];
                        $config1['create_thumb'] = FALSE;
                        $config1['maintain_ratio'] = TRUE;
                        $config1['quality'] = '70%';
                        $config1['width'] = 700;
                        $config1['height'] = 700;
                        $config1['new_image'] = './assets/images/NsiPic/product/' . $uploadData['file_name'];
                        $this->load->library('image_lib', $config1);
                        $this->image_lib->initialize($config1);
                        $this->image_lib->resize();
                        $data1[$z]['kode_gambar'] = $nama;
                        $data1[$z]['lokasi_gambar'] = base_url('assets/images/NsiPic/product/').$uploadData['file_name'];
                        $z++;
                }
            } elseif ($_FILES['photo' . $i]['name'] == '' && $nama_file[$y] <> "") {
            // } elseif ($nama_file[$y] <> "") {
                $data1[$z]['kode_gambar'] = $nama;
                $data1[$z]['lokasi_gambar'] = $nama_file[$y];
                $y++;
                $z++;
            }
        }
        $data['gambar'] = $data1;
        $kode                        = decrypt_url($this->input->post('kode_barcode'));
        $respons                     = $this->SERVER_API->_putAPI('barang/edit/1/' . $kode, $data, $this->token);
        if ($respons->status == "berhasil") {
            // $lokasi_gambar            = $this->input->post('lokasi_gambar');
            // for($j =0; $j < count($lokasi_gambar); $j++){
            //     $nama_file_baru = $_FILES['photo' . $j]['name'];
            //     if($lokasi_gambar[$j] != $nama_file[$j]){
            //         $url_gambar_hapus = "./assets/images/NsiPic/product/".$lokasi_gambar[$j];
            //         $delete_file = unlink($url_gambar_hapus);
            //     }else if($nama_file_baru != ""){
            //         $url_gambar = "./assets/images/NsiPic/product/".$lokasi_gambar[$j];
            //         $delete_file = unlink($url_gambar);
            //     }
            // }
    
            $this->session->set_flashdata('alert', success($respons->pesan));
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
        }

        if ($this->input->post('status') == "BARANG-ACTIVE" || $this->input->post('status') == "barang-active") {
            redirect('wp-barang-online');
        } else {
            redirect('wp-barang');
        }
    }
    public function getBarcodeHancur()
    {
        if ($_POST['searchTerm']) {
            $kode                           =  $this->input->post('searchTerm');
            $result                         = $this->SERVER_API->_getAPI('barang/regexp-barcode-active/' . $kode, $this->token);
            $x = 0;
            foreach ($result->data as $row) {
                $hasil[$x]['id'] = $row->kode_barcode;
                $hasil[$x]['text'] = $row->kode_barcode . ' - ' . $row->nama_barang;
                $x++;
            }
            echo json_encode($hasil);
        } else {
            redirect('');
        }
    }
    public function pencariankodecustomer()
    {
        if ($_POST['pencarian']) {
            $kode                           =  $this->input->post('pencarian');
            $id_pencarian                   =  $this->input->post('id_pencarian');
            // $kode                           =  "HO00000006";
            if($id_pencarian=="no_transaksi"){
                $result                         = $this->SERVER_API->_getAPI('penjualan/belum-selesai-filter-transaksi/' . $kode, $this->token);
            }else{
                $result                         = $this->SERVER_API->_getAPI('penjualan/belum-selesai-filter-customer/' . $kode, $this->token);
            }
            $this->output->set_status_header(200);
            $this->output->set_content_type('application/json', 'utf-8');
            return $this->output->set_output(json_encode($result));
        } else {
            redirect('');
        }
    }

    function simpanbatalpenjualan(){
        $trx = $this->input->post('no_trx');       
        if($trx=="" || $trx==null){
            $this->session->set_flashdata('alert', information('No Transaksi Harus Di Pilih'));
            redirect('wp-batal-penjualan');
        } else{
            for ($i = 0; $i < count($trx); $i++) {
                $data[$i]['id_trx'] = $trx[$i];
            }
            $respons     = $this->SERVER_API->_postAPI('penjualan-batal/post-batal', $data, $this->token);
            if ($respons->status == "berhasil") {
                $this->session->set_flashdata('alert', success($respons->pesan));
                redirect('wp-batal-penjualan');
            } else {
                $this->session->set_flashdata('alert', information($respons->pesan));
                redirect('wp-batal-penjualan');
            }
        }
    }
    function simpantmphancur()
    {
        if ($_POST['kode_barcode']) {
            $kode       = $this->input->post('kode_barcode');
            $result     = $this->SERVER_API->_postAPI('hancur-barang/list/' . $kode, '', $this->token);
            $this->output->set_status_header(200);
            $this->output->set_content_type('application/json', 'utf-8');
            return $this->output->set_output(json_encode($result));
        } else {
            redirect('');
        }
    }
    function caribarcoddejs()
    {
        if ($_POST['searchTerm']) {
            $kode     =  $this->input->post('searchTerm');
            $result   = $this->SERVER_API->_getAPI('barang/barcode/' . $kode, $this->token);
            $this->output->set_status_header(200);
            $this->output->set_content_type('application/json', 'utf-8');
            return $this->output->set_output(json_encode($result));
        } else {
            redirect('');
        }
    }
    function loadhancurbarang()
    {
        if ($_POST['loadbarang']) {
            $result   = $this->SERVER_API->_getAPI('hancur-barang/list', $this->token);
            $this->output->set_status_header(200);
            $this->output->set_content_type('application/json', 'utf-8');
            return $this->output->set_output(json_encode($result));
        } else {
            redirect('');
        }
    }

    function hapushancur()
    {
        $kode     = $this->input->post('kode_barcode');
        $respons  = $this->SERVER_API->_deletetAPI('hancur-barang/list/' . $kode, $this->token);
        $this->output->set_status_header(200);
        $this->output->set_content_type('application/json', 'utf-8');
        return $this->output->set_output(json_encode($respons));
    }
    function simpanhancursemua()
    {
        $kodebarcode = json_decode($this->input->post('databarang1'));
        foreach ($kodebarcode as $row) {
            $data[]['kode_barcode'] = $row[0];
        }
        $respons                     = $this->SERVER_API->_postAPI('hancur-barang/process', $data, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success('Barang Berhasil Dihancur'));
            redirect('wp-hancur-barang');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('wp-hancur-barang');
        }
    }
    function simpankategori()
    {
        $info = pathinfo($_FILES['photo']['name']);
        $filename = $info['basename'];
        $directory = "./assets/images/NsiPic/icon/";
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
        $config['quality']          = '50%';
        $config['remove_spaces'] = TRUE;
        $config['overwrite']     = TRUE;
        $config['encrypt_name'] = TRUE;
        $config['upload_path']   = $directory;
        $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
        // $nmfile =  $filename;
        // $config['file_name']            = $filename;

        // $this->upload->initialize($config);

        $this->load->library('upload', $config);

        if ($_FILES['photo']) {
            $this->upload->do_upload('photo');
            $uploadData = $this->upload->data();
            $config1['image_library'] = 'gd2';
            $config1['source_image'] = './assets/images/NsiPic/icon/' . $uploadData['file_name'];
            $config1['create_thumb'] = FALSE;
            $config1['maintain_ratio'] = TRUE;
            $config1['quality'] = '70%';
            // $config1['width'] = 1280;
            // $config1['height'] = 810;
            $config1['new_image'] = './assets/images/NsiPic/icon/' . $uploadData['file_name'];
            $this->load->library('image_lib', $config1);
            $this->image_lib->initialize($config1);
            $this->image_lib->resize();
            $data['icon'] = base_url('assets/images/NsiPic/icon/').$uploadData['file_name'];
            $data['banner'] = base_url('assets/images/NsiPic/icon/').$uploadData['file_name'];
        }
        $data['kode_kategori']      = $this->input->post('kode_kategori');
        $data['nama_kategori']      = $this->input->post('nama_kategori');
        $respons                    = $this->SERVER_API->_postAPI('kategori', $data, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
            redirect('wp-kategori-barang');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('wp-kategori-barang');
        }
    }
    function carikodekelompok(){
        $respons['data']                    = $this->SERVER_API->_getAPI('jenis-kelompok/kelompok/'. $this->input->post('kode_kelompok'),$this->token);
        $respons['DataKelompok']            = $this->SERVER_API->_getAPI('kelompok/all');
        $respons['kode'] =  $this->input->post('kode_kelompok');
        $this->session->set_userdata('title', 'Cari Kode Kelompok');
        $this->template->display_admin('UpdateHargaEmas/UpdateHarga/index',$respons);
    }
    function simpanupdateemas(){
        // $data['data_jenis'] = 
        // [
        //     'kode_jenis' => $this->input->post('kode_jenis'),
        //     'harga' => intval($this->input->post('harga'))
        // ];

        $harga = $this->input->post('harga');
        $kode_jenis = $this->input->post('kode_jenis');
        for ($i=0; $i <count($harga); $i++) { 
            $data['data_jenis'][$i]['harga'] = intval(str_replace(',','',$harga[$i]));
            $data['data_jenis'][$i]['kode_jenis'] = $kode_jenis[$i];
        }

        $hasil                   = $this->SERVER_API->_putAPI('jenis-kelompok/update-harga/'. $this->input->post('kode_kelompok'),$data,$this->token);
        // $respons['DataKelompok']            = $this->SERVER_API->_getAPI('kelompok/all');
        // $respons['kode'] =  $this->input->post('kode_kelompok');
        // $respons['data']                    = $this->SERVER_API->_getAPI('jenis-kelompok/kelompok/'. $this->input->post('kode_kelompok'),$this->token);
        if ($hasil->status == "berhasil") {
            $this->session->set_flashdata('alert', success($hasil->pesan));
            // $this->template->display_admin('UpdateHargaEmas/UpdateHarga/index',$respons);
            redirect('update-harga-emas');
        }else{
            $this->session->set_flashdata('alert', information($hasil->pesan));
            redirect('update-harga-emas');
            // $this->template->display_admin('UpdateHargaEmas/UpdateHarga/index',$respons);
        }
    }
    function updatehargaemas(){
        $respons['data']                    = [];
        $response['kode'] = [];
        $respons['DataKelompok']            = $this->SERVER_API->_getAPI('kelompok/all');
        $this->session->set_userdata('title', 'Upddate Harga Emas');
        $this->template->display_admin('UpdateHargaEmas/UpdateHarga/index',$respons);
    }
    function datajenis(){
        $respons['data']                    = $this->SERVER_API->_getAPI('jenis-kelompok/all',$this->token);
        $respons['datakelompok']            = $this->SERVER_API->_getAPI('kelompok/all', $this->token);
        $this->session->set_userdata('title', 'Data Jenis Kelompok');
        $this->template->display_admin('UpdateHargaEmas/DataJenis/index',$respons);
    }
    function simpaneditjenishargaemas(){
        // $data['kode_kelompok'] = $this->input->post('kode_kelompok');
        // $data['kode_jenis'] = $this->input->post('kode_jenis');
        $data['nama_jenis'] = $this->input->post('nama_jenis');
        // $data['harga'] = intval($this->input->post('harga'));
        $respons                    = $this->SERVER_API->_putAPI('jenis-kelompok/update/'.$this->input->post('kode_jenis'), $data, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
            redirect('data-jenis');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('data-jenis');
        }
    }
    function simpanjenishargaemas(){
        $data['kode_kelompok'] = $this->input->post('kode_kelompok');
        $data['kode_jenis'] = $this->input->post('kode_jenis');
        $data['nama_jenis'] = $this->input->post('nama_jenis');
        $data['harga'] = intval(str_replace(',','',$this->input->post('harga')));
        $respons                    = $this->SERVER_API->_postAPI('jenis-kelompok/add', $data, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
            redirect('data-jenis');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('data-jenis');
        }
    }
    function datakelompok(){
        $this->session->set_userdata('title', 'Data Kelompok');
        $respons['data'] = $this->SERVER_API->_getAPI('kelompok/all');
        $this->template->display_admin('UpdateHargaEmas/Datakelompok/index',$respons);
    }
    function hapusjeniskelompok($id){
        $respons = $this->SERVER_API->_deletetAPI('jenis-kelompok/delete/'.$id,$this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
            redirect('data-jenis');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('data-jenis');
        }

    }
    function hapuskelompok($id){
        $respons = $this->SERVER_API->_deletetAPI('kelompok/delete/'.$id,$this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
            redirect('data-kelompok');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('data-kelompok');
        }

    }
    function updateKelompok(){
        $data['nama_kelompok'] = $this->input->post('nama_kelompok');
        $data['position']        = $this->input->post('posisi');
        $respons                    = $this->SERVER_API->_putAPI('kelompok/update/'.$this->input->post('kode_kelompok'), $data, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
            redirect('data-kelompok');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('data-kelompok');
        }
    }
    function simpankelompok(){
        $data['kode_kelompok'] = $this->input->post('kode_kelompok');
        $data['nama_kelompok'] = $this->input->post('nama_kelompok');
        $data['position']        = $this->input->post('posisi');
        $respons                    = $this->SERVER_API->_postAPI('kelompok/add', $data, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
            redirect('data-kelompok');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('data-kelompok');
        }
    }
    function editkategori()
    {
        $file_asli				= $this->input->post('banner_lama');
		$file_baru				= $_FILES['photo']['name'];

        if($file_baru == ""){
			$data["banner"]			= $file_asli;
		}else{
            unlink($file_asli);
            $info = pathinfo($_FILES['photo']['name']);
            $filename = $info['basename'];
            $directory = "./assets/images/NsiPic/icon/";

            if (!is_dir($directory)) {
                mkdir($directory, 0777, true);
            }
            $config['quality']          = '50%';
            $config['remove_spaces'] = TRUE;
            $config['overwrite']     = TRUE;
            $config['encrypt_name'] = TRUE;
            $config['upload_path']   = $directory;
            $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
            // $nmfile =  $filename;
            // $config['file_name']            = $filename;

            // $this->upload->initialize($config);

            $this->load->library('upload', $config);

            if ($_FILES['photo']) {
                $this->upload->do_upload('photo');
                $uploadData = $this->upload->data();
                $config1['image_library'] = 'gd2';
                $config1['source_image'] = './assets/images/NsiPic/icon/' . $uploadData['file_name'];
                $config1['create_thumb'] = FALSE;
                $config1['maintain_ratio'] = TRUE;
                $config1['quality'] = '70%';
                $config1['width'] = 1280;
                $config1['height'] = 810;
                $config1['new_image'] = './assets/images/NsiPic/icon/' . $uploadData['file_name'];
                $this->load->library('image_lib', $config1);
                $this->image_lib->initialize($config1);
                $this->image_lib->resize();
                $data['icon']               =  base_url('assets/images/NsiPic/icon/').$uploadData['file_name'];
                $data['banner'] = base_url('assets/images/NsiPic/icon/').$uploadData['file_name'];
            }
        }
        $kode                       = $this->input->post('kode_kategori');
        $data['nama_kategori']      = $this->input->post('nama_kategori');
        $respons                     = $this->SERVER_API->_putAPI('kategori/1/' . $kode, $data, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
            redirect('wp-kategori-barang');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('wp-kategori-barang');
        }
    }

    function hapuskategori($kode)
    {
        $respons                     = $this->SERVER_API->_deletetAPI('kategori/1/' . $kode, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
            redirect('wp-kategori-barang');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('wp-kategori-barang');
        }
    }
    // End Kategori Barang

    // Jenis Barang
    function jenisbarang()
    {
        $this->session->set_userdata('title', 'Jenis Barang');
        $respons['DataKategori']   = $this->SERVER_API->_getAPI('kategori', $this->token);
        $respons['DataJenis']      = $this->SERVER_API->_getAPI('jenis', $this->token);
        $respons['title']          = 'Jenis Barang';
        $this->template->display_admin('Jenisbarang/index_jenis_barang', $respons);
    }
    function simpanjenis()
    {
        $data['kode_kategori']      = $this->input->post('kode_kategori');
        $data['kode_jenis']         = $this->input->post('kode_jenis');
        $data['nama_jenis']         = $this->input->post('nama_jenis');
        $respons                     = $this->SERVER_API->_postAPI('jenis', $data, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
            redirect('wp-jenis');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('wp-jenis');
        }
    }

    function hapusjenis($kode)
    {
        $respons                     = $this->SERVER_API->_deletetAPI('jenis/1/' . $kode, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
            redirect('wp-jenis');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('wp-jenis');
        }
    }
    function editjenis()
    {
        $kode                       = $this->input->post('kode_jenis');
        $data['nama_jenis']         = $this->input->post('nama_jenis');
        $respons                     = $this->SERVER_API->_putAPI('jenis/1/' . $kode, $data, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
            redirect('wp-jenis');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('wp-jenis');
        }
    }
    // End Jenis

    // hadiah
    function hadiah()
    {
        $this->session->set_userdata('title', 'Kelola Hadiah');
        $respons['title']          = 'Kelola Hadiah';
        $respons['DataHadiah']   = $this->SERVER_API->_getAPI('hadiah/all/0&100', $this->token);
        $this->template->display_admin('DataHadiah/index_data_hadiah', $respons);
    }
    function tamnahstockhadiah(){
        $data['kode_hadiah']    = $this->input->post('kode_hadiah');
        $data['qty_tambah']    = intval($this->input->post('qty_tambah'));
        $data1[] = $data; 
        $respons                     = $this->SERVER_API->_putAPI('hadiah/tambah-stock', $data1, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
            redirect('wp-hadiah');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('wp-hadiah');
        }
        
    }
    function ambilstockhadiah(){
        $data['kode_hadiah']    = $this->input->post('kode_hadiah');
        $data['qty_ambil']    = intval($this->input->post('qty_tambah'));
        $data1[] = $data; 
        $respons                     = $this->SERVER_API->_putAPI('hadiah/ambil-stock', $data1, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
            redirect('wp-hadiah');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('wp-hadiah');
        }
        
    }
    function batalpenjualan(){
        $respons['title']          = 'Batal Penjualan';
        $this->session->set_userdata('title', 'Batal Penjualan');
        $this->template->display_admin('BatalPenjualan/index_batal_penjualan',$respons);
    }
    function simpanhadiah()
    {
        $data['kode_hadiah']         = $this->input->post('kode_hadiah');
        $data['nama_hadiah']         = $this->input->post('nama_hadiah');
        $data['poin']               = intval($this->input->post('point'));
        $respons                     = $this->SERVER_API->_postAPI('hadiah', $data, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
            redirect('wp-hadiah');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('wp-hadiah');
        }
    }

    function hapushadiah($kode)
    {
        $respons                     = $this->SERVER_API->_deletetAPI('hadiah/kode_hadiah/1/' . $kode, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
            redirect('wp-hadiah');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('wp-hadiah');
        }
    }
    function edithadiah()
    {
        $kode                       = $this->input->post('kode_hadiah');
        $data['poin']               = intval($this->input->post('point'));
        $data['nama_hadiah']         = $this->input->post('nama_hadiah');
        $respons                     = $this->SERVER_API->_putAPI('hadiah/kode_hadiah/1/' . $kode, $data, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
            redirect('wp-hadiah');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('wp-hadiah');
        }
    }
    // End Hadiah

}