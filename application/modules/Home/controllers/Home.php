<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MX_Controller
{
	private $ceonnection, $mobile, $token;
	public function __construct()
	{
		header('Cache-Control: no cache');
		parent::__construct();
		$this->ceonnection = cek_internet();
		$this->mobile = detect_mobile();
		$this->token =  $this->session->userdata('token');
	}
	public function index()
	{
		// $this->input->ip_address()
		$this->SERVER_API->_postAPI('pengunjung/post/'.$this->input->ip_address(),'','');
		// var_dump($insert);
		// die;

		if ($this->ceonnection == false) {
			$this->session->set_userdata('koneksi', 'terhubung');
			$this->load->view('Error/index_error');
		} else {
			$respons['KategoriBarang'] = $this->SERVER_API->_getAPI('kategori/jenis', $this->token);
			$respons['DataKategori']   = $this->SERVER_API->_getAPI('kategori', $this->token);
			$respons['Slider'] 		   = $this->SERVER_API->_getAPI('slide/all', $this->token);
			$respons['DataBarangBaru'] = $this->SERVER_API->_getAPI('barang/all-new/1&20', '');
			$respons['DataBarang']     = $this->SERVER_API->_getAPI('barang/kategori-jenis-active', $this->token);
			$respons['DataKelompok']   = $this->SERVER_API->_getAPI('kelompok/jenis',$this->token);
			$respons['DataBarang']     = $this->SERVER_API->_getAPI('barang/kategori-jenis-active', $this->token);


			if ($this->mobile === true) {
				$this->session->set_userdata('title', 'Home');
				$this->session->set_userdata('status_header', 'Home');
				// $this->template->v2('Mobile/v2/index_home', $respons);
				$this->template->v2('Mobile/v2/home_kategori', $respons);
			} else {
				$this->template->display_toko('Dekstop/index_home', $respons);
			}
		}
	}
	function panduanpembayaran()
	{
		$this->template->display_toko('Dekstop/index_panduan_pembayaran');
	}

	function pencarianbarang()
	{
		// $kode_kategori_cari = $this->session->userdata('kode_kategori');
		// $cari_session 	= $this->session->userdata('cari');

		// if($kode_kategori_cari <> "" || $cari_session <> null){
		// 	$data['cari']				= $cari_session;
		// 	$data['kode_kategori']	= $kode_kategori_cari;
		// }else{
		// 	$data['cari']		= $this->input->post('cari');
		// 	$data['kategori']	= $this->input->post('kategori');
		// }
		$data['kode_kategori']		= $this->input->post('kode_kategori');
		$data['cari']				= $this->input->post('cari');
		if ($this->mobile === true) {
			$this->session->set_userdata('status_header', 'CariBarang');
			$this->session->set_userdata('title', 'Pencarian  Barang');
			$this->template->v2('Mobile/v2/index_cari_barang', $data);
		} else {
			$this->template->display_toko('Dekstop/index_cari_barang', $data);
		}
	}
	function pencariannamabarang()
	{
		$cari_session_nama_barang 	= $this->session->userdata('cari');

		if($cari_session_nama_barang <> "" && $this->input->post('cari') == ""){
			$data['cari']				= $cari_session_nama_barang;
		}else{
			$data['cari']		= $this->input->post('cari');
		}

		$this->session->set_userdata($data);
		if ($this->mobile === true) {
			$this->session->set_userdata('status_header', 'Home');
			// $this->session->set_userdata('title', 'Pencarian Nama Barang');
			$this->template->v2('Mobile/v2/index_cari_barang_nama', $data);
		} else {
			$this->template->display_toko('Dekstop/index_cari_nama_barang', $data);
		}
	}
	function produkdetail($id)
	{
		$respons['DetailBarang']   = $this->SERVER_API->_getAPI('barang/barcode-active/' . decrypt_url($id), $this->token);
		$respons['DataBarang']     = $this->SERVER_API->_getAPI('barang/kategori-jenis-active', $this->token);
		$respons['KategoriBarang'] = $this->SERVER_API->_getAPI('kategori/jenis', $this->token);
		$respons['BarangBaru'] = $this->SERVER_API->_getAPI('barang/all-new/1&20', '');

		if ($respons['DetailBarang']->status == "berhasil") {
			if ($this->mobile === true) {
				$this->session->set_userdata('status_header', '');
				$this->session->set_userdata('title', 'Detail Barang');
				$this->template->v2('Mobile/v2/index_produk_detail', $respons);
			} else {
				$this->template->display_toko('Dekstop/index_detail_barang', $respons);
			}
		} else {
			$this->session->set_flashdata('alert', information('Barang Yang Anda Cari Tidak Ada'));
			redirect('');
		}
	}
	function carikategori($id, $nama)
	{
		// $respons['DataBarang']     = $this->SERVER_API->_getAPI('barang/kategori/'.decrypt_url($id),$this->token);
		// foreach($respons['DataBarang']->data as $row){
		// 	$nama = strtolower($row->nama_kategori);
		// }
		$namaku = decrypt_url($nama);
		$respons['nama_kategori'] = strtolower($namaku);
		$respons['kode_kategori'] = decrypt_url($id);
		if ($this->mobile === true) {
			$this->session->set_userdata('status_header', '');
			$this->session->set_userdata('title', 'Pencarian  Kategori');
			$this->template->v2('Mobile/v2/index_cari_barang', $respons);
		} else {
			$this->template->display_toko('Dekstop/index_cari_barang', $respons);
		}
	}
	function carijenis($id, $nama)
	{
		// $respons['DataBarang']     = $this->SERVER_API->_getAPI('barang/kategori/'.decrypt_url($id),$this->token);
		// foreach($respons['DataBarang']->data as $row){
		// 	$nama = strtolower($row->nama_kategori);
		// }
		$namaku = decrypt_url($nama);
		$respons['nama_jenis'] = strtolower($namaku);
		$respons['kode_jenis'] = decrypt_url($id);
		if ($this->mobile === true) {
			$this->session->set_userdata('status_header', '');
			$this->session->set_userdata('title', 'Pencarian  Kategori');
			$this->template->v2('Mobile/v2/index_cari_barang.php', $respons);
		} else {
			$this->template->display_toko('Dekstop/index_cari_jenis', $respons);
		}
	}

	function tentangkami()
	{
		$data['DataPerusahaan']	  = $this->SERVER_API->_getAPI('system-perusahaan');
		$this->template->display_toko('Dekstop/index_tentang_kami', $data);
	}
	function panduanbelanja()
	{
		$data['DataPerusahaan']	  = $this->SERVER_API->_getAPI('system-perusahaan');
		$this->template->display_toko('Dekstop/index_panduan_belanja', $data);
	}

	function faq()
	{
		$data['DataPerusahaan']	  = $this->SERVER_API->_getAPI('system-perusahaan');
		$this->template->display_toko('Dekstop/index_faq', $data);
	}
	function konfirmasipembayaran()
	{
		$data['DataPerusahaan']	  = $this->SERVER_API->_getAPI('system-perusahaan');
		$this->template->display_toko('Dekstop/konfirmasi-pembayaran', $data);
	}

	function index_pengajuanpenjualan()
	{
		if ($this->session->userdata('status_login') == "SEDANG_LOGIN"){
			if ($this->mobile === true) {
				$this->session->set_userdata('status_header', '');
				$this->session->set_userdata('title', 'Estimasi Harga Penjualan');
				$this->template->v2('Mobile/v2/index_pengajuanpenjualan');
			}else{
				$this->template->display_toko('Dekstop/index_pengajuanpenjualan');
			}
		}else{
			redirect('');
		}
	}
	public function getBarcodePengajuanPenjualan()
    {
        if ($_POST['kode_barcode']) {
			$kode                           =  $this->input->post('kode_barcode');
			$result                         = $this->SERVER_API->_getAPI('pembelian/cek-penjualan/' . $kode, $this->token);
			$this->output->set_status_header(200);
			$this->output->set_content_type('application/json', 'utf-8');
			return $this->output->set_output(json_encode($result));
		}else{
			redirect('');
		}
	}
	public function savepenjualanpengajuan()
	{
		$data  = json_decode($this->input->post('DataBarangPenjualan'));

		var_dump($data);
	}
	function kontak()
	{
		$data['DataPerusahaan']	  = $this->SERVER_API->_getAPI('system-perusahaan');
		$this->template->display_toko('Dekstop/index_kontak', $data);
	}

	//INI
	function loaddatabarangperkategori()
	{
		if ($_POST['status']) {

			$DataBarang     = $this->SERVER_API->_getAPI('barang/kategori-jenis-active', $this->token);

			$output = '';
			foreach ($DataBarang as $row) {
				$loading = "$('.loaderform').show();";
				$error = "this.onerror=null;this.src='" . base_url() . "/assets/images/notfound.png';";
				$output .= '';
				$output .= '
			<div class="section-heading d-flex align-items-center justify-content-between">
				<h6 class="ml-1"> ' . $row->nama_kategori . ' </h6><a onclick="' . $loading . '" class="btn btn-primary btn-sm"  href="' . base_url('carikategori/' . encrypt_url($row->kode_kategori) . '/' . encrypt_url($row->nama_kategori)) . '">View All</a>
			</div>
			<div class="row">';
				foreach ($row->jenis  as $jenis) {
					$a = 0;
					foreach ($jenis->barang  as $barang) {
						// if ($a < 2) {
						$output .= '
						<div class="col-6 col-sm-4 col-lg-3">
						<div class="card top-product-card mb-3">
						<div class="card-body">';
						$databarang = $barang->gambar;
						for ($i = 0; $i < 1; $i++) {
							$output .= '
							<a class="product-thumbnail d-block" onclick="' . $loading . '" href="' . base_url('produk/' . encrypt_url($barang->kode_barcode)) . '">
								<img class="mb-2" onError="' . $error . '"  src="' . $databarang[$i]->lokasi_gambar . '" alt="">
							</a>
							';
						}
						$nama_barang = strlen($barang->nama_barang) > 12 ? substr($barang->nama_barang, 0, 10) . '....' :  $barang->nama_barang;
						$brghasil = $barang->harga_jual+$barang->ongkos;
						$harga = strlen(number_format($brghasil)) > 12 ? substr(number_format($brghasil), 0, 10) . '....' : number_format($brghasil);
						$output .= '
						<a class="product-title d-block" onclick="' . $loading . '" href="' . base_url('produk/' . encrypt_url($barang->kode_barcode)) . '">
							' . $nama_barang . '
						</a>
						<p class="sale-price">
							Rp.' . $harga . '
						</p>
						<div class="product-rating">
							Kadar: ' . $barang->kadar_cetak . '<br>
							Berat : ' . $barang->berat . ' Gram<br>
						</div>';
						if ($this->session->userdata('status_login') == "SEDANG_LOGIN") {
						// 	$btnstatus = '<a class="btn btn-success btn-sm" onclick="' . $loading . '" href="' . base_url('add-cart/' . encrypt_url($barang->kode_barcode)) . '">
						// 	<i class="lni lni-plus"></i>
						//   </a>';
							$btnstatus= '';
						} elseif ($this->session->userdata('status_login') == "SEDANG_LOGIN_ADMIN") {
							$btnstatus= '';
							// $swall = "Swal.fire('Oopss!','Admin tidak bisa menambahka barang!','info')";
							// $btnstatus = '
							// <button class="btn btn-success btn-sm" onclick="' . $swall . '"><i class="lni lni-plus"></i></button>';
						} else {
							$btnstatus= '';
							// $swall = "Swal.fire('Oopss!','Silahkan Login Terlebih Dahulu!','info')";
							// $btnstatus = '
							// <button class="btn btn-success btn-sm" onclick="' . $swall . '"><i class="lni lni-plus"></i></button>';
						}
						$output .= '
						' . $btnstatus . '
						</div>
						</div>
						</div>';
						// }
						if ($a > 2) {
							goto End;
						}
						$a++;
					}
				}
				End:
				$output .= '</div>';
			}
			echo $output;
		}
	}
	function loaddatabarangbaru()
	{
		if ($_POST['status']) {
			$output = '';
			$DataBarang     = $this->SERVER_API->_getAPI('barang/all-new/1&10', '');
			if ($DataBarang->data == null) {
				echo $output;
				die;
			}
			$click = "Swal.fire( 'Opps!!!', 'Silahkan Login Terlebih Dahulu', 'info' )";
			$loading = "$('.loaderform').show();";
			$error = "this.onerror=null;this.src='" . base_url() . "/assets/images/notfound.png';";
			$a = 1;
			$output .= '
			<div class="section-heading d-flex align-items-center justify-content-between">
			<h6 class="ml-1">Barang Terbaru </h6><a onclick="' . $loading . '" class="btn btn-primary btn-sm"  href="' . base_url('shop/') . '">View All</a>
			</div>';
			$output .= '
					<div class="row">';
			foreach ($DataBarang->data as $row) {

				if ($this->session->userdata('status_login') == "SEDANG_LOGIN") {
					$status_login ="";
					// $status_login = '<a onclick="' . $loading . '" class="add-cart-btn btn btn-success" href="' . base_url('add-cart/' . encrypt_url($row->kode_barcode)) . '"> <i class="lni lni-plus"></i></a>';
				} else {
					$status_login ="";
					// $status_login = '<a onclick="' . $click . '" class="btn btn-success btn-sm add2cart-notify" href="#"> <i class="lni lni-plus"></i></a>';
				}
				$databarang = $row->gambar;
				for ($i = 0; $i < 1; $i++) {
					$gambar = $databarang[$i]->lokasi_gambar;
				}
				$brghasil = $row->harga_jual+$row->ongkos;
				$harga = strlen(number_format($brghasil)) > 12 ? substr(number_format($brghasil), 0, 10) . '....' : number_format($brghasil);
				$nama_barang = strlen($row->nama_barang) > 12 ? substr($row->nama_barang, 0, 10) . '....' :  $row->nama_barang;
				$output .= '
								<div class="col-6 col-sm-4">
									<div class="card top-product-card mb-3">
									<div class="card-body"> 
										<a onclick="' . $loading . '" class="product-thumbnail d-block" href="' . base_url('produk/' . encrypt_url($row->kode_barcode)) . '">
										<img onError="' . $error . '" class="mb-2" src="' . $gambar . '" alt=""></a>
										<a onclick="' . $loading . '" class="product-title d-block" href="' . base_url('produk/' . encrypt_url($row->kode_barcode)) . '">
										' . $nama_barang . '</a>
										<p class="sale-price">
											Rp.' . $harga . '
										</p>
										<div class="product-rating">
										Kadar: ' . $row->kadar_cetak . '<br>
										Berat : ' . $row->berat . 'Gram<br>
										</div>
										' . $status_login . '
									</div>
								</div>
							</div>
							';
			}
			$output .= '</div>';

			echo $output;
		}
	}
	function loaddatakategori()
	{
		if ($_POST['status']) {
			$output = '';
			$respons = $this->SERVER_API->_getAPI('kategori/jenis', $this->token);
			$data = $respons->data;
			$jml = count($data);
			for ($i = 0; $i < 9; $i++) {
				if ($data[$i] != null) {
					$url = $data[$i]->icon;
					$click = "$('.loaderform').show()";
					$error = "this.onerror=null;this.src='" . base_url() . "/assets/images/notfound.png';";

					$output = '
					<div class="col-4">
					<div class="card mb-4 catagory-card">
						<div class="card-body">
						<a onclick="' . $click . '" href="' . base_url('carikategori/' . encrypt_url($data[$i]->kode_kategori) . '/' . encrypt_url($data[$i]->nama_kategori)) . '">
							<img onError="' . $error . '" src="' . $url . '" width="100px"><br><span>' . $data[$i]->nama_kategori . '</span>
						</a>
						</div>
					</div>
					</div>
					';
				}
				echo $output;
				if($i == $jml-1){
					goto end;
				}
			}
			end:
			$jml =0;
		}
	}
	function loadcarinamabarang()
	{
		// $limit 			= 1;
		// $startindex		= 0;
		// $id   			= 'asdjhajkdsh23234';
		$limit 			= $this->input->post('limit');
		$startindex		= $this->input->post('start');
		$id   			= $this->input->post('nama_barang');
		$data     		= $this->SERVER_API->_getAPI('barang/regexp-name-active/' . $id . '&' . $startindex . '&' . $limit, $this->token);
	
		if($data->status=="error"){
			echo $output = 'barang_tidak_ada';
			die;
		}
	
		if ($data->count > $this->input->post('start')) {
			$click = "Swal.fire( 'Opps!!!', 'Silahkan Login Terlebih Dahulu', 'info' )";
			$error = "this.onerror=null;this.src='" . base_url() . "/assets/images/notfound.png';";
			$loading = "$('.loaderform').show();";
			$loadingMobile = "$('.errorLogin').show();";
			$output = '';
			if ($_POST['device'] == "mobile") {
				$output .= '
				<div class="row">';
				foreach ($data->data as $row) {

					if ($this->session->userdata('status_login') == "SEDANG_LOGIN") {
						$status_login = "";
						// $status_login = '<a onclick="' . $loading . '" class="add-cart-btn btn btn-success" href="' . base_url('add-cart/' . encrypt_url($row->kode_barcode)) . '"> <i class="lni lni-plus"></i>
						// 		</a>';
					} else {
						$status_login = "";
						// $status_login = ' <a href="#"  onclick="' . $click . '" class="add-cart-btn btn btn-success"> <i class="lni lni-plus"></i> </a>';
					}
					$databarang = $row->gambar;
					for ($i = 0; $i < 1; $i++) {
						$gambar = $databarang[$i]->lokasi_gambar;
					}
					$nama_barang = strlen($row->nama_barang) > 15 ? substr($row->nama_barang, 0, 12) . '....' :  $row->nama_barang;
					$brghasil = $row->harga_jual+$row->ongkos;
					$harga = strlen(number_format($brghasil)) > 12 ? substr(number_format($brghasil), 0, 10) . '....' : number_format($brghasil);
					$output .= '
							<div class="col-6 col-sm-4">
								<div class="card top-product-card mb-3">
								<div class="card-body"> 
									<a onclick="' . $loading . '" class="product-thumbnail d-block" href="' . base_url('produk/' . encrypt_url($row->kode_barcode)) . '">
									<img onError="' . $error . '" class="mb-2" src="' . $gambar . '" alt=""></a>
									<a onclick="' . $loading . '" class="product-title d-block" href="' . base_url('produk/' . encrypt_url($row->kode_barcode)) . '">
									' . $nama_barang . '</a>
									<p class="sale-price">
											Rp.' . $harga . '
										</p>
									<div class="product-rating">
									Kadar: ' . $row->kadar_cetak . '<br>
									Berat : ' . $row->berat . 'Gram<br>
									</div>
									'.$status_login.'
								</div>
							</div>
						</div>
						';
				}
				$output .= '</div>';

				echo $output;
			} else {
				$output .= '
				<ol class="product-items row">';

				foreach ($data->data as $row) {
					$databarang = $row->gambar;
					for ($i = 0; $i < 1; $i++) {
						$gambar = $databarang[$i]->lokasi_gambar;
					}
					if ($this->session->userdata('status_login') == "SEDANG_LOGIN") {
						$status_login = "";
						// $status_login = '<a onclick="' . $click . '" class="add-cart-btn btn btn-success" href="' . base_url('add-cart/'
						// 	. encrypt_url($row->kode_barcode) . '/'
						// 	. encrypt_url($row->nama_barang) . '/'
						// 	. encrypt_url($row->harga) . '/'
						// 	. encrypt_url('1')) . '"> <i class="lni lni-plus"></i>
						// 			</a>';
					} else {
						// $status_login = '<button type="button"  onclick="' . $click . '" class="btn btn-cart"><span>Add to Cart</span></button>';
						$status_login = '';
					}
					$output .= '
						<li class="col-sm-3 product-item ">
							<div class="product-item-opt-1">
								<div class="product-item-info">
									<div class="product-item-photo">
										<img onError="' . $error . '" src="' . $gambar . '" ></a>
										' . $status_login . '
									</div>
									<div class="product-item-detail">
										<strong class="product-item-name"><a href="' . base_url('produk/' . encrypt_url($row->kode_barcode)) . '">' . $row->nama_barang . '</a></strong>
										<div class="clearfix">
											<div class="product-item-price">
												<span class="price">Rp.' . number_format($row->harga_jual) . '</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
					';
				}
				$output .= '</ol>';
				echo $output;
			}
		}
	}

	function privacypolice(){
		// echo 'TEst';
		$this->template->display_toko('Dekstop/pripacypolice');
	}
	function loaddatakategorimobile()
	{
		if ($_POST['limit']) {

			$limit 			= $this->input->post('limit');
			$startindex		= $this->input->post('start');
			// $id   			= 'CC';
			// $limit 			= '2';
			// $startindex		= '0';
			if ($this->input->post('status') == "kode_jenis") {
				$id   			= $this->input->post('kode_jenis');
				$data     		= $this->SERVER_API->_getAPI('barang/jenis/' . $id . '&' . $startindex . '&' . $limit, $this->token);
			} else {
				$id   			= $this->input->post('kategori');
				$data     		= $this->SERVER_API->_getAPI('barang/kategori/' . $id . '&' . $startindex . '&' . $limit, $this->token);
			}

			if($data->status=="berhasil"){
				$output = '';
				// var_dump();;
				if ($data->count > $this->input->post('start')) {
					$click = "Swal.fire( 'Opps!!!', 'Silahkan Login Terlebih Dahulu', 'info' )";
					$error = "this.onerror=null;this.src='" . base_url() . "/assets/images/notfound.png';";
					$loading = "$('.loaderform').show();";
					$loadingMobile = "$('.errorLogin').show();";


					if ($_POST['device'] == "mobile") {
						$output .= '
						<div class="row">';
						foreach ($data->data as $row) {

							if ($this->session->userdata('status_login') == "SEDANG_LOGIN") {
								$status_login = "";
								// $status_login = '<a onclick="' . $loading . '" class="add-cart-btn btn btn-success" href="' . base_url('add-cart/' . encrypt_url($row->kode_barcode)) . '"> <i class="lni lni-plus"></i>
								// 		</a>';
							} else {
								$status_login = "";
								// $status_login = ' <a href="#"  onclick="' . $click . '" class="add-cart-btn btn btn-success"> <i class="lni lni-plus"></i> </a>';
							}
							$databarang = $row->gambar;
							for ($i = 0; $i < 1; $i++) {
								$gambar = $databarang[$i]->lokasi_gambar;
							}
							$nama_barang = strlen($row->nama_barang) > 12 ? substr($row->nama_barang, 0, 10) . '....' :  $row->nama_barang;
							$output .= '
									<div class="col-6 col-sm-4">
										<div class="card top-product-card mb-3">
										<div class="card-body"> 
											<a onclick="' . $loading . '" class="product-thumbnail d-block" href="' . base_url('produk/' . encrypt_url($row->kode_barcode)) . '">
											<img onError="' . $error . '" class="mb-2" src="' . $gambar . '" alt=""></a>
											<a onclick="' . $loading . '" class="product-title d-block" href="' . base_url('produk/' . encrypt_url($row->kode_barcode)) . '">
											' . $nama_barang . '</a>
											<div class="product-rating">
											Kadar: ' . $row->kadar_cetak . '<br>
											Berat : ' . $row->berat . 'Gram<br>
											</div>
											' . $status_login . '
										</div>
									</div>
								</div>
								';
						}
						$output .= '</div>';

						echo $output;
					} else {
						$output .= '
						<ol class="product-items row">';

						foreach ($data->data as $row) {
							$databarang = $row->gambar;
							for ($i = 0; $i < 1; $i++) {
								$gambar = $databarang[$i]->lokasi_gambar;
							}
							if ($this->session->userdata('status_login') == "SEDANG_LOGIN") {
								$status_login = "";
								// $status_login = '<a onclick="' . $click . '" class="add-cart-btn btn btn-success" href="' . base_url('tambah-kekeranjang/'
								// 	. encrypt_url($row->kode_barcode) . '/'
								// 	. encrypt_url($row->nama_barang) . '/'
								// 	. encrypt_url($row->harga) . '/'
								// 	. encrypt_url('1')) . '"> <i class="lni lni-plus"></i>
								// 			</a>';
							} else {
								// $status_login = '<button type="button"  onclick="' . $click . '" class="btn btn-cart"><span>Add to Cart</span></button>';
								$status_login = '';
							}
							$brghasil = $row->harga_jual+$row->ongkos;
							$harga = strlen(number_format($brghasil)) > 12 ? substr(number_format($brghasil), 0, 10) . '....' : number_format($brghasil);
							$output .= '
								<li class="col-sm-3 product-item ">
									<div class="product-item-opt-1">
										<div class="product-item-info">
											<div class="product-item-photo">
												<img onError="' . $error . '" src="' . $gambar . '" ></a>
												' . $status_login . '
											</div>
											<div class="product-item-detail">
												<strong class="product-item-name"><a href="' . base_url('produk/' . encrypt_url($row->kode_barcode)) . '">' . $row->nama_barang . '</a></strong>
												<div class="clearfix">
													<div class="product-item-price">
														<span class="price">Rp.' . $harga . '</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</li>
							';
						}
						$output .= '</ol>';
						echo $output;
					}
				}
			}else{
				if($startindex==0){
					echo 'data_kosong';
				}else{
					echo 'sudah_melampaui_batas';
				}
			}
		} else {
			redirect('');
		}
	}

	function listkategori()
	{
		$respons['KategoriBarang'] = $this->SERVER_API->_getAPI('kategori/jenis', $this->token);
		$this->template->v2('Mobile/v2/listkategori', $respons);
	}
}
