<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterController extends MX_Controller{
	private $mobile;
	public function __construct()
	{
		parent::__construct();
		$this->mobile = detect_mobile();
	}
	public function index()
	{
        if($this->session->userdata('key')) 
        {
            redirect('dashboard');
        }else{
            if ($this->mobile === true) {
                $this->template->displayauth('Home/Mobile/v2/index_daftar_member');
            }else{
                $this->template->display_toko('auth/index_register');
            }
        }
    }
    public function audio()
    {
        $this->load->view('auth/audioupload');
    }

    function simpanrecorder(){
        $directory = './assets/images/NsiPic/audio/';
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }
        // $nama = str_replace(' ','',$_FILES['audio']['name']);
        // $config['quality']          = '50%';
        $config['upload_path']    = $directory;
        $config['allowed_types'] = 'mp3|wav|ogg|audio/mpeg';
        $config['encrypt_name']  = TRUE;
        $config['remove_spaces'] = TRUE;

        //load library upload
    
        $this->load->library('upload', $config);
       //photo adalah nama field
        if (!$this->upload->do_upload("audio")) {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
         }else {
            $uploadData = $this->upload->data();

             $this->session->set_userdata('nama_file', $uploadData['file_name']);
            //state jika berhasil
            redirect('audio');
         }       
    }
    public function simpanregisteruser()
    {
        $kode                        = $this->input->post('kode_customer');
        $data['nama_customer']       = $this->input->post('nama_customer');
        $data['alamat_lengkap']      = $this->input->post('alamat1');
        
        $data['kode_kota']           = explode('-',$this->input->post('kota'))[0];
        $data['nama_kota']           = explode('-',$this->input->post('kota'))[1];

        $data['kode_pos']            = $this->input->post('kode_pos');
        $data['no_hp']               = $this->input->post('no_hp');
        $data['email']               = "-";
        $data['password']            = $this->input->post('password');
        $data['retype_password']     = $this->input->post('retype_password');
        $data['tgl_lahir']           = date('Y-m-d',strtotime($this->input->post('tgl_lahir')));

        $data['kode_provinsi']       = explode('-',$this->input->post('provinsi'))[0];
        $data['nama_provinsi']       = explode('-',$this->input->post('provinsi'))[1];

        $data['kode_kecamatan']      =  explode('-',$this->input->post('kecamatan'))[0];
        $data['nama_kecamatan']      =  explode('-',$this->input->post('kecamatan'))[1];

        $data['no_ktp']              = $this->input->post('nik');

        if($this->input->post('status_form')=="MEMBERBARU"){
            $respons 			         = $this->SERVER_API->_postAPI('customer/register-customer/',$data);
        }else{
            $respons 			         = $this->SERVER_API->_postAPI('customer/verifikasi-customer/'.$kode , $data);
        }

        if($respons->status=="berhasil"){
            $this->session->set_flashdata('alert', success($respons->pesan));
            // session_destroy();
            $this->session->unset_userdata('nama_customer_lama');
            $this->session->unset_userdata('kode_customer_lama');
            $this->session->unset_userdata('no_hp_lama');
            $this->session->unset_userdata('tgl_lahir_lama');
            $this->session->unset_userdata('email_lama');
            $this->session->unset_userdata('kode_poss_lama');
            $this->session->unset_userdata('alamat1_lama');
            $this->session->unset_userdata('provinsi_lama');
            $this->session->unset_userdata('kota_lama');
            $this->session->unset_userdata('nik_lama');
            $this->session->unset_userdata('kecamatan_lama');
            $this->session->set_userdata('no_hp',$this->input->post('no_hp'));
            $this->session->set_flashdata('status_resend_email', 'Resend');
			$this->session->set_flashdata('PesanOtp', 'Masukan Kode Otp');
            redirect('otentivikasi-daftar');
        }else{
            $data = [
                'nama_customer_lama' 		=> $this->input->post('nama_customer'),
                'kode_customer_lama' 		=> $this->input->post('kode_customer'),
                'no_hp_lama' 				=> $this->input->post('no_hp'),
                'email_lama'				=> $this->input->post('email'),
                'nik_lama'				=> $this->input->post('nik'),
                'email_resend'				=> $this->input->post('email'),
                'tgl_lahir_lama'			=> $this->input->post('tgl_lahir'),
                'kode_poss_lama'			=> $this->input->post('kode_pos'),
                'alamat1_lama'				=> $this->input->post('alamat1'),
                'provinsi_lama'				=> $this->input->post('provinsi'),
                'kota_lama'				    => $this->input->post('kota'),
                'kecamatan_lama'	        => $this->input->post('kecamatan'),
            ];

			$this->session->set_flashdata('alert', information($respons->pesan));
            $this->session->set_userdata($data);
            if($this->input->post('status_form')=="MEMBERBARU"){
                redirect('wp-daftar-member');
            }else{
                redirect('formmemberlama');
            }
        }
    }
	function formmemberlama(){
		$this->session->set_userdata('status_form','MEMBERLAMA');
        $respons['nama_form']  		  	  = 'Aktivasi Member Lama';
        $respons['nama_button']  		  = 'Aktivasi Sekarang';
        $respons['Provinsi']			  = $this->SERVER_API->_getAPI('raja-ongkir/provinsi/','');
        if ($this->mobile === true) {
            $this->template->displayauth('Home/Mobile/v2/index_daftar_member_lama',$respons);
        }else{
            $this->template->display_toko('User/index_register', $respons);
        }
	}
    public function verifikasiemail($id){
        // var_dump($id);
        $respons 			         = $this->SERVER_API->_postAPI('customer/aktivasi-email/'.$id , '');
        if($respons->status=="berhasil"){
			$this->session->set_flashdata('alert', success($respons->pesan));
            redirect('login');
        }else{
			$this->session->set_flashdata('alert', information($respons->pesan));
            redirect('login');
        }

    }

}