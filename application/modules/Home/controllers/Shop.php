<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop extends MX_Controller
{
	private $ceonnection, $mobile, $token;
	public function __construct()
	{
		parent::__construct();
		$this->ceonnection = cek_internet();
		$this->mobile = detect_mobile();
		$this->token =  $this->session->userdata('token');
	}
	public function index()
	{
		if ($this->ceonnection == false) {
			$this->session->set_userdata('koneksi', 'terhubung');
			$this->load->view('Dekstop/koneksibermasalah');
		} else {
			if ($this->mobile === true) {
				$this->session->set_userdata('title', '');
				$this->session->set_userdata('status_header', 'Home');
				$this->template->v2('Mobile/v2/Shop/index_shop');
			} else {
				$this->template->display_toko('Dekstop/index_shop');
			}
		}
	}
	function cekongkir()
	{
		if ($_POST['kode_kecamatan']) {
			$kode_kecamatan 				= $this->input->post('kode_kecamatan');
			$berat							= $this->input->post('berat');
			$result					  	    = $this->SERVER_API->_getAPI('raja-ongkir/cek-ongkir/' . $kode_kecamatan . '&' . $berat, $this->token);
			// return $result;
			if ($result->status == 'berhasil') {
				echo json_encode($result);
			} else {
				// $result = array("status" => 'koneksi');
				echo json_encode($result);
			}
		} else {
			redirect('');
		}
	}
	function loaddatashop()
	{
		if ($_POST['limit']) {
			$limit 			= $this->input->post('limit');
			$startindex		= $this->input->post('start');
			// $id   			= 'CC';
			// $limit 			= '2';
			// $startindex		= '0';
			$output = '';
			$data     					= $this->SERVER_API->_getAPI('barang/all/' . $startindex . '&' . $limit, '');

			if ($data->count > $this->input->post('start')) {
				$click = "Swal.fire( 'Opps!!!', 'Silahkan Login Terlebih Dahulu', 'info' )";
				$loading = "$('.loaderform').show();";
				$error = "this.onerror=null;this.src='" . base_url() . "/assets/images/notfound.png';";
				if ($_POST['device'] == "mobile") {
					$output .= '
					<div class="row">';
					foreach ($data->data as $row) {
						$totalongkos = $row->harga_jual+$row->ongkos;
						if ($this->session->userdata('status_login') == "SEDANG_LOGIN") {
							$status_login = '<a onclick="' . $loading . '" class="add-cart-btn btn btn-success" href="' . base_url('add-cart/' . encrypt_url($row->kode_barcode)) . '"> <i class="lni lni-plus"></i></a>';
							// $status_login = '';
						} else {
							$status_login = '<a onclick="' . $click . '" class="btn btn-success btn-sm add2cart-notify" href="#"> <i class="lni lni-plus"></i></a>';
							// $status_login = '';
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
				} else {
					$output .= '
					<ol class="product-items row">';

					foreach ($data->data as $row) {
						$databarang = $row->gambar;
						for ($i = 0; $i < 1; $i++) {
							$gambar = $databarang[$i]->lokasi_gambar;
						}
						if ($this->session->userdata('status_login') == "SEDANG_LOGIN") {
							$status_login = '<a onclick="' . $click . '" class="add-cart-btn btn btn-success" href="' . base_url('tambah-kekeranjang/'
								. encrypt_url($row->kode_barcode) . '/'
								. encrypt_url($row->nama_barang) . '/'
								. encrypt_url($row->harga) . '/'
								. encrypt_url('1')) . '">
										</a>';
										// <i class="lni lni-plus"></i>
									} else {
							$status_login = '<button type="button"  onclick="' . $click . '" class="btn btn-cart"><span>Add to Cart</span></button>';
							// $status_login = '';
						}
						$totalongkos = $row->harga_jual+$row->ongkos;  
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
													<span class="price">Rp.' . number_format($totalongkos) . '</span>
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
		} else {
			redirect('');
		}
	}
}
