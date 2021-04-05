<?php
defined('BASEPATH') or exit('No direct script access allowed');
class LoginController extends MX_Controller
{
	private $mobile;
	public function __construct()
	{
		parent::__construct();
		$this->mobile = detect_mobile();
	}

	function index()
	{
		if ($this->session->userdata('token')) {
			redirect('wp-dashboard-user');
		} else {
			if ($this->mobile === true) {
				$respons['nama_form']  		  	  = 'LOGIN';
				$this->template->displayauth('Home/Mobile/v2/index_login', $respons);
			} else {
				$this->template->display_toko('User/index_login');
			}
		}
	}


	//Cek Login Untuk User
	public function ceklogin()
	{
		$data['email'] 	 	  = $this->input->post('no_hp_or_email');
		$data['password'] 	  = $this->input->post('password');
		$respons 			  = $this->SERVER_API->_postAPI('customer/login-customer', $data);
		if ($respons->status == "berhasil") {
			foreach ($respons->data as $user) {
				$nama_customer = $user->nama_customer;
				$kode_customer = $user->kode_customer;
				$tgl_lahir	   =  $user->tgl_lahir;
				$email		   =  $user->email;
				$no_hp		   =  $user->no_hp;
			}
			$data = [
				'nama_customer' => $nama_customer,
				'kode_customer' => $kode_customer,
				'tgl_lahir' 	=> $tgl_lahir,
				'email' 		=> $email,
				'no_hp' 		=> $no_hp
			];
			$this->session->set_userdata($data);
			$this->session->set_flashdata('PesanOtp', $respons->pesan);
			redirect('otentivikasi');
		} else {
			$this->session->set_flashdata('alert', information('Username dan password belum terdaftar'));
			redirect('login');
		}
	}

	function resendemail($id)
	{
		$email = decrypt_url($id);
		$respons 			  = $this->SERVER_API->_postAPI('customer/resend-aktivasi-email/' . $email, '', '');
		if ($respons->status == "berhasil") {
			$this->session->set_flashdata('alert', success($respons->pesan));
		} else {
			$this->session->set_flashdata('alert', information($respons->pesam));
		}
		$this->session->set_flashdata('status_resend_email', 'Resend');
		redirect('login');
	}
	function resendotp($id)
	{
		$no_hp = decrypt_url($id);
		$respons 			  = $this->SERVER_API->_postAPI('customer/resend-aktivasi-noHp/' . $no_hp, '', '');
		
		if ($respons->status == "berhasil") {
			$this->session->set_flashdata('alert', success($respons->pesan));
			$this->session->set_flashdata('PesanOtp', $respons->pesan);
		} else {
			$this->session->set_flashdata('PesanOtp', $respons->pesan);
			$this->session->set_flashdata('alert', information($respons->pesan));
		}
		redirect('otentivikasi');
	}
	function resendotpdaftar($id)
	{
		$no_hp = decrypt_url($id);
		$respons 			  = $this->SERVER_API->_postAPI('customer/resend-aktivasi-noHp/' . $no_hp, '', '');
		if ($respons->status == "berhasil") {
			$this->session->set_flashdata('alert', success($respons->pesan));
			$this->session->set_userdata('PesanOtp', $respons->pesan);
		} else {
			$this->session->set_userdata('PesanOtp', $respons->pesan);
			$this->session->set_flashdata('alert', information($respons->pesan));
		}
		redirect('otentivikasi-daftar');
	}
	function resendotpforget($id)
	{
		$email = decrypt_url($id);
		$respons 			  = $this->SERVER_API->_postAPI('customer/resend-otp/' . $email, '', '');
		if ($respons->status == "berhasil") {
			$this->session->set_flashdata('alert', success($respons->pesan));
			$this->session->set_flashdata('PesanOtp', $respons->pesan);
		} else {
			$this->session->set_flashdata('PesanOtp', $respons->pesan);
			$this->session->set_flashdata('alert', information($respons->pesan));
		}
		redirect('otpforgetpasswrod');
	}
	function verifikasi_account($data)
	{
		$this->session->set_flashdata('title_form', 'Verifikasi Account');
		$this->template->display_toko('User/verifikasi_account');
	}
	function otentivikasi()
	{
		if ($this->session->userdata('kode_customer')) {
			$this->load->view('Home/Mobile/v2/index_otp');
		} else {
			redirect('');
		}
	}
	function otentivikasidaftar()
	{
		$this->load->view('Home/Mobile/v2/otp_daftar');
	}

	function verifikasiotp()
	{
		$data = $this->input->post('kode_otp');
		$no_hp = $this->session->userdata('no_hp');
		$kode_otp['kode_otp'] = $data['0'] . $data['1'] . $data['2'] . $data['3'];
		$respons 			  = $this->SERVER_API->_postAPI('customer/verifying-otp/' . $no_hp, $kode_otp);
		if ($respons->status == "berhasil") {
			foreach ($respons->data as $user) {
				$token		   =  $user->token;
			}
			$data = [
				'token' 		=> $token,
				'status_login'	=> 'SEDANG_LOGIN'
			];
			$this->session->set_userdata($data);
			redirect('');
		} else {
			$this->session->set_flashdata('alert', information($respons->pesan));
			$this->session->set_flashdata('PesanOtp', $respons->pesan);
			redirect('otentivikasi');
		}
	}
	function verifikasiotpdaftar()
	{
		$data = $this->input->post('kode_otp');
		$no_hp = $this->session->userdata('no_hp');
		$kode_otp			  = $data['0'] . $data['1'] . $data['2'] . $data['3'];
		$respons 			  = $this->SERVER_API->_postAPI('customer/aktivasi-noHp/' . $no_hp.'&'. $kode_otp);
	
		if ($respons->status == "berhasil") {
			// foreach ($respons->data as $user) {
			// 	$token		   =  $user->token;
			// }
			// $data = [
			// 	'token' 		=> $token,
			// 	'status_login'	=> 'SEDANG_LOGIN'
			// ];
			// $this->session->set_userdata($data);
			$this->session->set_userdata('otpaktif', 'false');
			$this->session->set_flashdata('alert', success($respons->pesan));
			redirect('login');
		} else {
			$this->session->set_flashdata('alert', information($respons->pesan));
			$this->session->set_userdata('PesanOtp', $respons->pesan);
			redirect('otentivikasi-daftar');
		}
	}


	public function index_admin()
	{
		if ($this->session->userdata('Admintoken')) {
			redirect('wp-dashboard');
		} else {
			if ($this->mobile === true) {
				$respons['nama_form']  		  	  = 'LOGIN ADMIN';
				$this->template->displayauth('Auth/Admin/Mobile/index_login_admin',$respons);
			} else {
				$this->load->view('Admin/index_login_admin');
			}
		}
	}
	public function cekloginadmin()
	{
		$data['user_id'] 	  = $this->input->post('user_id');
		$data['password'] 	  = $this->input->post('pass_key');
		$respons 			  = $this->SERVER_API->_postAPI('user/login-user', $data);
		if ($respons->status == "berhasil") {
			foreach ($respons->data as $user) {
				$user_id = $user->user_id;
				$nama_user = $user->nama_user;
				$level = $user->level;
				$token		   =  $user->token;
			}
			$data = [
				'user_id' 		=> $user_id,
				'nama_user' 	=> $nama_user,
				'Admintoken' 	=> $token,
				'level' 		=> $level,
				'status_login'	=> 'SEDANG_LOGIN_ADMIN'
			];
			$this->session->set_userdata($data);
			redirect('wp-dashboard');
		} else {
			if ($this->mobile === true) {
				$this->session->set_flashdata('alert', information($respons->pesan));
			}else{
				$this->session->set_flashdata('Pesan', '<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6 pesanerror"> <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i> ' . $respons->pesan . ' </div>');
			}
			redirect('wp-login');
		}
	}
	public function cekloginadmintoko()
	{
		$data['user_id'] 	  = $this->input->post('user_id');
		$data['password'] 	  = $this->input->post('pass_key');
		$respons 			  = $this->SERVER_API->_postAPI('user-toko/login-user', $data);
		if ($respons->status == "berhasil") {
			foreach ($respons->data as $user) {
				$user_id = $user->user_id;
				$nama_user = $user->nama_user;
				$kode_toko = $user->kode_toko;
				$token		   =  $user->token;
			}
			$data = [
				'user_id' 		=> $user_id,
				'nama_user' 	=> $nama_user,
				'Admintoken' 	=> $token,
				'kode_toko' 	=> $kode_toko,
				'status_login'	=> 'SEDANG_LOGIN_ADMIN'
			];
			$this->session->set_userdata($data);
			redirect('wp-dashboard');
		} else {
			if ($this->mobile === true) {
				$this->session->set_flashdata('alert', information($respons->pesan));
			}else{
				$this->session->set_flashdata('Pesan', '<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6 pesanerror"> <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i> ' . $respons->pesan . ' </div>');
			}
			redirect('wp-login');
		}
	}

	public function daftar_member()
	{

		$respons['nama_form']  		  	  = 'Daftar Member Baru';
		$respons['nama_button']  		  = 'Daftar Sekarang';
		$this->session->set_userdata('status_form', 'MEMBERBARU');
		$respons['Provinsi']			  = $this->SERVER_API->_getAPI('raja-ongkir/provinsi/', '');
		$this->session->set_flashdata('title_form', 'Daftar Member Baru');
		if ($this->mobile === true) {
			$this->template->displayauth('Home/Mobile/v2/index_daftar_member_lama', $respons);
		} else {
			$this->template->display_toko('User/index_register', $respons);
		}
	}
	public function logout()
	{
		// $this->session->sess_destroy();
		session_destroy();
		// $this->session->sess_destroy();
		redirect('');
	}
	public function logoutadmin()
	{
		// $this->session->sess_destroy();
		session_destroy();
		// $this->session->sess_destroy();
		redirect('wp-login');
	}

	function cekmemberlama()
	{
		$kode = $this->input->post('kode_customer');
		$respons = $this->SERVER_API->_getAPI('customer/kode_customer/' . $kode, '');

		if ($respons->status == "berhasil") {
			if ($respons->data == null) {
				$this->session->set_flashdata('alert', information('Kode Member Belum Terdaftar'));
				if ($this->mobile === true) {
					redirect('formaktifasimemberlama');
				} else {
					redirect('login');
				}
			} else {
				foreach ($respons->data as $user) {
					$nama_customer_lama = $user->nama_customer;
					$kode_customer_lama = $user->kode_customer;
					$no_hp_lama 		= $user->no_hp;
					$email_lama		    =  $user->email;
					$tgl_lahir_lama     =  $user->tgl_lahir;
					$kode_poss_lama     =  $user->kode_poss;
					$alamat1_lama     	=  $user->alamat1;
					$status     		=  $user->status;
				}
				$data = [
					'nama_customer_lama' 		=> $nama_customer_lama,
					'kode_customer_lama' 		=> $kode_customer_lama,
					'no_hp_lama' 				=> $no_hp_lama,
					'email_lama'				=> $email_lama,
					'tgl_lahir_lama'			=> $tgl_lahir_lama,
					'kode_poss_lama'			=> $kode_poss_lama,
					'alamat1_lama'				=> $alamat1_lama,
				];
				if ($status == "OPEN") {
					$this->session->set_userdata($data);
					$this->session->set_flashdata('title_button', 'Aktivasi Sekarang');
					$this->session->set_flashdata('title_form', 'Aktivasi Member Lama');
					$this->session->set_flashdata('PesanMemberLama', '<div class="alert alert-success" role="alert">Kode Member Terdaftar Silahkan Lengkapi Form Berikut</div>');
					redirect('formmemberlama');
				} else {
					$this->session->set_flashdata('alert', information('Kode Member Sudah Teraktifasi'));
					if ($this->mobile === true) {
						redirect('formaktifasimemberlama');
					} else {
						redirect('login');
					}
				}
			}
		} else {
			$this->session->set_flashdata('alert', information('Kode Member Belum Terdaftar'));
			if ($this->mobile === true) {
				redirect('formaktifasimemberlama');
			} else {
				redirect('login');
			}
		}
	}

	function loadkota()
	{
		$id = $this->input->post('province_id');
		$respons = $this->SERVER_API->_getAPI('raja-ongkir/kota/province_id/' . $id, '');
		$this->output->set_status_header(200);
		$this->output->set_content_type('application/json', 'utf-8');
		return $this->output->set_output(json_encode($respons));
	}
	function loadkecamatan()
	{
		$id = $this->input->post('subdistrict_id');
		$respons = $this->SERVER_API->_getAPI('raja-ongkir/kecamatan/city_id/' . $id, '');
		$this->output->set_status_header(200);
		$this->output->set_content_type('application/json', 'utf-8');
		return $this->output->set_output(json_encode($respons));
	}
	function formaktifasimemberlama()
	{
		$respons['nama_form']  		  	  = 'AKTIFIASI MEMBER LAMA';
		$this->template->displayauth('Home/Mobile/v2/aktifasimemberlama', $respons);
	}

	function register()
	{
		$respons['nama_form']  		  	  = 'REGISTER';
		$this->template->displayauth('Home/Mobile/v2/index_daftar_member', $respons);
	}
	function forgetpassword()
	{
		$respons['nama_form']  		  	  = 'FORGET PASSWORD';
		$this->template->displayauth('Home/Mobile/v2/ForgetPassword/forgetpassword', $respons);
	}
	function sendnewpassword()
	{
		$kode = $this->input->post('emailornohp');
		$this->session->set_userdata('emailornohp', $kode);
		$respons = $this->SERVER_API->_postAPI('customer/forgot-password/request/' . $kode, '', '');
		if ($respons->status == "berhasil") {
			$this->session->set_flashdata('alert', success($respons->pesan));
			$this->session->set_flashdata('PesanOtp', $respons->pesan);
			redirect('otpforgetpasswrod');
		} else {
			$this->session->set_flashdata('alert', information($respons->pesan));
			redirect('forgetpassword');
		}
	}

	function otpforgetpasswrod()
	{
		$respons['nama_form']  		  	  = 'VERIFIKASI KODE OTP';
		$this->load->view('Home/Mobile/v2/ForgetPassword/index_otp_forget_password', $respons);
	}

	function verifikasiotppassword()
	{
		$data = $this->input->post('kode_otp');
		$email = $this->session->userdata('emailornohp');
		$kode_otp['kode_otp'] = $data['0'] . $data['1'] . $data['2'] . $data['3'];
		$respons 			  = $this->SERVER_API->_postAPI('customer/verifying-otp/' . $email, $kode_otp);
		if ($respons->status == "berhasil") {
			foreach ($respons->data as $user) {
				$token		   =  $user->token;
			}
			$data = [
				'tokenku' 		=> $token
			];
			$this->session->set_userdata($data);
			$this->session->set_flashdata('alert', success('Kode Otp Berhasil Diverifikasi'));
			redirect('new-password');
		} else {
			$this->session->set_flashdata('PesanOtp', $respons->pesan);
			$this->session->set_flashdata('alert', information($respons->pesan));
			redirect('otpforgetpasswrod');
		}
	}

	function newpassword()
	{
		if ($this->session->userdata('emailornohp')) {
			$respons['nama_form']  		  	  = 'VERIFIKASI KATASANDI BARU';
			$this->template->displayauth('Home/Mobile/v2/ForgetPassword/newpassword', $respons);
		} else {
			redirect('');
		}
	}

	function savepasswordbaru()
	{
		$data['new_password'] 	 = $this->input->post('password');
		$data['retype_password'] = $this->input->post('retype_password');
		$respons 			     = $this->SERVER_API->_postAPI('customer/forgot-password/reset-password', $data, $this->session->userdata('tokenku'));

		if ($respons->status == "berhasil") {
			$this->session->set_flashdata('alert', success($respons->pesan));
		} else {
			$this->session->set_flashdata('alert', information($respons->pesan));
		}
		redirect('login');
	}
}