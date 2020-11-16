<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends MX_Controller
{
	private $mobile, $token;
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->library('upload');
		$this->mobile = detect_mobile();
		$this->token =  $this->session->userdata('token');
	}
	public function index()
	{
		$response['DataCart']		= $this->SERVER_API->_getAPI('penjualan/belum-selesai-customer', $this->token);
		$response['CountItem']		= $this->SERVER_API->_getAPI('penjualan/belum-selesai-customer', $this->token);
		$data_point					= $this->SERVER_API->_getAPI('customer/kode_customer/'.$this->session->userdata('kode_customer'), $this->token);

		foreach($data_point->data as $row){
			$data_point_ku= $row->point;
		}
		$response['point'] = $data_point_ku;
		$response['DataPenjuealan']		= $this->SERVER_API->_getAPI('penjualan/unpaid-customer', $this->token);
		$response['DaftarALamat']	= $this->SERVER_API->_getAPI('customer/alamat/', $this->token);
		if ($this->mobile === true) {
			$this->session->set_userdata('status_header', '');
			$this->session->set_userdata('title', 'Profile');
			$this->template->v2('Mobile/index_user', $response);
		} else {
			$this->template->display_toko('User/DashboardUser/index_dashboard', $response);
		}
	}
	public function hapusalamat($id)
	{
		$response	= $this->SERVER_API->_deletetAPI('customer/delete-alamat/' . $id, $this->token);
		if ($response->status == "berhasil") {
			$this->session->set_flashdata('alert', success($response->pesan));
		} else {
			$this->session->set_flashdata('alert', information($response->pesan));
		}
		if ($this->mobile === true) {
			redirect('wp-daftar-alamat');
		} else {
			redirect('wp-dashboard-user');
		}
	}

	public function cekstatuspesanan($no_resi,$courir){

		$this->session->set_userdata('status_header', '');
		$this->session->set_userdata('title', 'Cek No Resi');
		$response['no_resi'] = $no_resi;
		$response['courir'] = $courir;
		$response['datakurir'] = $this->SERVER_API->_getAPI('courier/all', $this->token);
		$response['DataPengirim'] = $this->SERVER_API->_getAPI('raja-ongkir/cek-resi/'.strtolower($courir).'&'.$no_resi, $this->token);
		if($response['DataPengirim']->status=="berhasil"){
			if ($this->mobile === true) {
				$this->template->v2('Mobile/cek-status-pesanan', $response);
			} else {
				redirect('wp-dashboard-user');
			}
		}else{
			redirect($_SERVER['HTTP_REFERER']);
		}


	}
	public function carinoresi(){

		$this->session->set_userdata('status_header', '');
		$this->session->set_userdata('title', 'Cek No Resi');
		$response['no_resi'] = $this->input->post('no_resi');
		$response['courir'] = $this->input->post('kurir');
		$response['datakurir'] = $this->SERVER_API->_getAPI('courier/all', $this->token);
		$response['DataPengirim'] = $this->SERVER_API->_getAPI('raja-ongkir/cek-resi/'.strtolower($this->input->post('kurir')).'&'.$this->input->post('no_resi'), $this->token);
		
		if($response['DataPengirim']->status=="berhasil"){
			if ($this->mobile === true) {
				$this->template->v2('Mobile/cek-status-pesanan', $response);
			} else {
				redirect('wp-dashboard-user');
			}
		}else{
			$this->session->set_flashdata('alert', information($response['DataPengirim']->pesan));
			redirect($_SERVER['HTTP_REFERER']);
		}

	}

	function loaddataresi(){
		if ($_POST['no_resi']) {
			$insert = $this->SERVER_API->_getAPI('raja-ongkir/cek-resi/'.strtolower($this->input->post('kurir')).'&'.$this->input->post('no_resi'), $this->token);
			$this->output->set_status_header(200);
			$this->output->set_content_type('application/json', 'utf-8');
			return $this->output->set_output(json_encode($insert));
		}
	}
	function verifikasi_no_hp(){
		if ($_POST['no_hp']) {
			$insert = $this->SERVER_API->_postAPI('customer/verifikasi-no-hp/'.$this->input->post('no_hp'),'', $this->token);
			$this->output->set_status_header(200);
			$this->output->set_content_type('application/json', 'utf-8');
			return $this->output->set_output(json_encode($insert));
		}
	}
	function verifikasi_email(){
		if ($_POST['email']) {
			$insert = $this->SERVER_API->_postAPI('customer/verifikasi-change-email/'.$this->input->post('email'),'', $this->token);
			$this->output->set_status_header(200);
			$this->output->set_content_type('application/json', 'utf-8');
			return $this->output->set_output(json_encode($insert));
		}
	}
	function batal_penjualan(){
		
		if ($_POST['id_trx']) {
			$data[]['id_trx'] = $_POST['id_trx'];
			$respons     = $this->SERVER_API->_postAPI('penjualan-batal/post-batal', $data, $this->token);
			$this->output->set_status_header(200);
			$this->output->set_content_type('application/json', 'utf-8');
			return $this->output->set_output(json_encode($respons));
		}
	}
	function validasi_otp(){
		if ($_POST['type']) {
			if($this->input->post('type')=="no_hp"){
				$insert = $this->SERVER_API->_postAPI('customer/validate-verifikasi-no-hp/'.$this->input->post('kode_otp'),'', $this->token);
				if($insert->status=="berhasil"){
					$this->session->set_userdata('no_hp',$_POST['no_hp']);
				}else{
					
				}
			}else{
				$insert = $this->SERVER_API->_postAPI('customer/confirmasi-change-email/'.$_POST['kode_otp'],'', $this->token);
				if($insert->status=="berhasil"){
					$this->session->set_userdata('email',$_POST['email']);
				}else{
					
				}
			}
			$this->output->set_status_header(200);
			$this->output->set_content_type('application/json', 'utf-8');
			return $this->output->set_output(json_encode($insert));
		}
	}
	public function simpanalamat()
	{
		$data['kode_kota']           = explode('-', $this->input->post('kota'))[0];
		$data['nama_kota']           = explode('-', $this->input->post('kota'))[1];

		$data['kode_pos']            = $this->input->post('kode_pos');
		$data['alamat_lengkap']      = $this->input->post('alamat');

		$data['kode_provinsi']       = explode('-', $this->input->post('provinsi'))[0];
		$data['nama_provinsi']       = explode('-', $this->input->post('provinsi'))[1];

		$data['kode_kecamatan']      =  explode('-', $this->input->post('kecamatan'))[0];
		$data['nama_kecamatan']      =  explode('-', $this->input->post('kecamatan'))[1];

		$response = $this->SERVER_API->_postAPI('customer/add-alamat/', $data, $this->token);
		if ($response->status == "berhasil") {
			$this->session->set_flashdata('alert', success($response->pesan));
		} else {
			$this->session->set_flashdata('alert', information($response->pesan));
		}
		if ($this->mobile === true) {
			redirect('wp-daftar-alamat');
		} else {
			redirect('wp-dashboard-user');
		}
	}
	public function editprofile()
	{
		$this->session->set_userdata('status_header', '');
		$this->session->set_userdata('title', 'Edit Profile');
		$this->template->v2('Mobile/index_edit_user');
	}

	public function daftaralamat()
	{
		$response['DaftarALamat']	= $this->SERVER_API->_getAPI('customer/alamat/', $this->token);
		$this->session->set_userdata('status_header', '');
		$this->session->set_userdata('title', 'Daftar Alamat');
		$this->template->v2('Mobile/index_daftar_alamat', $response);
	}
	public function historytransaksi()
	{
		$response['DataCart']		= $this->SERVER_API->_getAPI('penjualan/belum-selesai-customer/', $this->token);
		$response['CountItem']		= $this->SERVER_API->_getAPI('penjualan/belum-selesai-customer', $this->token);
		// var_dump($response);
		// die;
		$this->session->set_userdata('status_header', '');
		$this->session->set_userdata('title', 'History Transaksi');
		$this->template->v2('Mobile/index_history_transaksi2', $response);
	}


	function historytransaksiselesai(){
		$response['DataCart']		= $this->SERVER_API->_getAPI('cart/checkout-get', $this->token);

		$this->session->set_userdata('status_header', '');
		$this->session->set_userdata('title', 'History Transaksi');
		$this->template->v2('Mobile/index_history_transasksi', $response);
	}
	function gantialamat($id)
	{
		$respons		= $this->SERVER_API->_putAPI('customer/default-alamat/' . $id, '', $this->token);
		if ($respons->status == "berhasil") {
			$this->session->set_flashdata('alert', success($respons->pesan));
		} else {
			$this->session->set_flashdata('alert', information($respons->pesan));
		}
		if ($this->mobile === true) {
			redirect('wp-daftar-alamat');
		} else {
			redirect('wp-dashboard-user');
		}
	}
	public function virtualcard()
	{
		$this->session->set_userdata('status_header', '');
		$this->session->set_userdata('title', 'Virtual Card');
		$this->template->v2('Mobile/index_virtual_card');
	}

	function fompermbayaran($id = '')
	{
		$response['DataBank']	= $this->SERVER_API->_getAPI('rekening/all', $this->token);
		$response['DataPenjuealan']		= $this->SERVER_API->_getAPI('penjualan/unpaid-customer', $this->token);
		$this->session->userdata('id_trx_pembayaran', $id);
		if ($this->mobile === true) {
			$this->session->set_userdata('status_header', '');
			$this->session->set_userdata('title', 'Konfirmasi Pembayaran');
			$this->template->v2('Mobile/index_konfirmasi_pembayaran', $response);
		} else {
			$this->template->display_toko('DashboardUser/konfirmasi-pembayaran', $response);
		}
	}

	function statuspembelianbarang()
	{
		$response['DataPenjuealan']		= $this->SERVER_API->_getAPI('penjualan/unpaid-customer', $this->token);
		$this->session->set_userdata('status_header', '');
		$this->session->set_userdata('title', 'Status Pemebelian Barang');
		$this->template->v2('Mobile/index_status_pembelianbarang', $response);
	}

	function otentifikasi()
	{
		// $data['email'] 	 	  = $this->session->userdata('email');
		$password 	  = $this->input->post('password');
		$respons 			  = $this->SERVER_API->_postAPI('customer/oto-password/' . $password, '', $this->token);
		if ($respons->status == "berhasil") {
			$this->session->set_flashdata('alert', success($respons->pesan));
			redirect('showformeditemail&nohp');
		} else {
			$this->session->set_flashdata('alert', information($respons->pesan));
			redirect('wp-dashboard-user');
		}
	}

	function editcustomer()
	{
		$data['nama_customer'] 	  = $this->input->post('nama_customer');
		$data['no_ktp'] 	  	  = $this->input->post('no_ktp');
		$data['tgl_lahir'] 	  	  = $this->input->post('tgl_lahir');
		$respons 			  = $this->SERVER_API->_putAPI('customer/edit-profile', $data, $this->token);
		if ($respons->status == "berhasil") {
			$dataEdit = [
				'nama_customer' =>  $this->input->post('nama_customer'),
				'no_ktp' =>  $this->input->post('no_ktp'),
				'tgl_lahir' =>  $this->input->post('tgl_lahir'),
			];
			$this->session->set_userdata($dataEdit);
			$this->session->set_flashdata('alert', success($respons->pesan));
		} else {
			$this->session->set_flashdata('alert', information($respons->pesan));
		}
		redirect('wp-edit-user-profile');
	}


	function formeditemailhp()
	{
		$this->template->v2('Mobile/index_form_edit_email_password');
	}

	function savekonfirmasipesanan()
	{
		// if (!empty($_FILES['bukti_transfer']['name']) && ($_FILES['bukti_transfer']['error'] == 1 || $_FILES['bukti_transfer']['size'] > 2097152)) {
		// 	if ($this->mobile == true) {
		// 		$this->session->set_flashdata('alert', information('FIle Photo Terlalu Besar Silahkan Upload Kembali Maxsimal 2 MB'));
		// 	} else {
		// 		$this->session->set_flashdata('alert', information('FIle Photo Terlalu Besar Silahkan Upload Kembali Maxsimal 2 MB'));
		// 	}
		// 	redirect('konfirmasipembayaran/1');
		// } else {
			$datapesanan = explode('-', $this->input->post('no_pesanan'));
			$data['to_id_rekening']  = $this->input->post('no_rek_tujuan');
			$data['from_nama_bank']  = $this->input->post('nama_bank');
			$data['from_atas_nama']  = $this->input->post('atas_nama');
			$data['from_no_rek']  = $this->input->post('no_rekening');
			$hasil = trim($datapesanan['1']);
			$data['nominal'] = intVal($hasil);

			$directory = "./assets/images/NsiPic/buktitransfer/";
			if (!is_dir($directory)) {
				mkdir($directory, 0755, true);
				chmod($directory, 0777);
			} else {
				chmod($directory, 0777);
			}
			$config['quality']          = '70%';
			$config['remove_spaces'] = TRUE;
			$config['overwrite']     = TRUE;
			$config['encrypt_name'] = TRUE;
			$config['upload_path']   = $directory;
			$config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
			$config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
			// $nmfile =  $filename;
			// $config['file_name']            = $filename;

			$this->upload->initialize($config);

			$this->load->library('upload', $config);

			if ($_FILES['bukti_transfer']) {
				$this->upload->do_upload('bukti_transfer');
				$uploadData = $this->upload->data();
				$config1['image_library'] = 'gd2';
				$config1['source_image'] = './assets/images/NsiPic/buktitransfer/' . $uploadData['file_name'];
				$config1['create_thumb'] = FALSE;
				$config1['maintain_ratio'] = TRUE;
				$config1['quality'] = '70%';
				$config1['width'] = 640;
				$config1['height'] = 640;
				$config1['new_image'] = './assets/images/NsiPic/buktitransfer/' . $uploadData['file_name'];
				$this->load->library('image_lib', $config1);
				$this->image_lib->initialize($config1);
				$this->image_lib->resize();
				$data['bukti_transfer'] = $uploadData['file_name'];
			}
			$response			  = $this->SERVER_API->_postAPI('penjualan/payment-confirm/' . trim($datapesanan['0']), $data, $this->token);

			$this->output->set_status_header(200);
			$this->output->set_content_type('application/json', 'utf-8');
			return $this->output->set_output(json_encode($response));
			// if ($response->status == "berhasil") {
			// 	$this->session->set_flashdata('alert', success($response->pesan));
			// } else {
			// 	$this->session->set_flashdata('alert', information($response->pesan));
			// }
			// redirect('konfirmasipembayaran/1');
		// }
	}

	function konfirmasipenerimaanbarang()
	{
	
		if ($_POST['no_transaksi']) {
			$insert = $this->SERVER_API->_postAPI('penjualan/confirm-terima-barang/'.$_POST['no_transaksi'],'', $this->token);
			$this->output->set_status_header(200);
			$this->output->set_content_type('application/json', 'utf-8');
			return $this->output->set_output(json_encode($insert));
		}
	}

	function loaddatahistory(){
		if ($_POST['limit']) {
			$limit 			= $this->input->post('limit');
			$startindex		= $this->input->post('start');
			// $id   			= 'CC';
			// $limit 			= '2';
			// $startindex		= '0';
			$output = '';
			$data     					= $this->SERVER_API->_getAPI('customer/history-transaksi/' . $startindex . '&' . $limit,$this->token);

			if ($data->count > $this->input->post('start')) {
				foreach ($data->data as $row) {
					$output .= ' 
					<div class="cart-wrapper-area">
						<div class="cart-table card mb-3">
							<div class="card shipping-method-choose-title-card bg-success">
								<div class="card-body">
									<h6 class="text-center mb-0 text-white">Pesanan Selesai</h6>
								</div>
							</div>
							<div class="table-responsive card-body">
							No Transaksi : '.$row->_id.'';

							$output .= ' 
								<table class="table">
									<tr>
									<td>Harga Barang </td>
									<td>Total</td>
									</tr>
									<tr>

										<td>'.$row->nama_barang.' <br>
										Kode Barcode : '.$row->kode_barang.'<br>
										Kadar Cetak: '.$row->kadar_cetak.'<br>
										Berat :'.$row->berat_jual.' Gram<br>
										</td>
										<td style="vertical-align:text-top;">Rp '.number_format($row->jual_rp).' </td>
									</tr>
									';
								$click = "cekhargajual('".$row->kode_barang."')";
								$output .= ' 
								<tr>
									<td colspan="3">  
									<button class="btn btn-success btn-block btn-cek-harga-'.$row->kode_barang.'"  onclick="' . $click . '"  type="button"> Cek Estimasi Jual </button>
									<button class="btn btn-success btn-block btn-loading-'.$row->kode_barang.'" style="cursor: not-allowed; display:none" type="button"> <i class="fa fa-spinner fa-spin"></i> </button>
 									</td>
								</tr>
								</table>
								<table class="table headtablejual-'.$row->kode_barang.'"  style="display:none">
								<thead>
									<td> Nama Barang </td>
									<td> Berat </td>
									<td> Harga Jual </td>
								</thead>
								<tbody class="body_detail_hargajual-'.$row->kode_barang.'">
								
								</tbody>
								</table>
							</div>
						</div>
					</div>
					';
				}
				echo $output;
			}
		}
	}
	// function konfirmasipenerimaanbarang($id)
	// {
	// 	$response 			  = $this->SERVER_API->_postAPI('penjualan/confirm-terima-barang/' . $id, '', $this->token);
	// 	if ($response->status == "berhasil") {
	// 		$this->session->set_flashdata('alert', success($response->pesan));
	// 	} else {
	// 		$this->session->set_flashdata('alert', information($response->pesan));
	// 	}
	// 	if ($this->mobile === true) {
	// 		redirect($_SERVER['HTTP_REFERER']);
	// 	} else {
	// 		redirect('wp-dashboard-user');
	// 	}
	// }
}
