<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminController extends MX_Controller
{
    private $token,$mobile;
    public function __construct()
    {
        parent::__construct();
        is_logged_in_admin();
        $this->load->library('upload');
        $this->mobile = detect_mobile();
        $this->token =  $this->session->userdata('Admintoken');
    }
    public function index()
    {
        $respons['DataPengunjung'] = $this->SERVER_API->_getAPI('pengunjung/get/'.date('Y-m-d'), $this->token);
        $respons['BarangTerjual'] = $this->SERVER_API->_getAPI('penjualan/count-jual/'.date('Y-m-d'), $this->token);
        $respons['TotalBarangOnline'] = $this->SERVER_API->_getAPI('barang/barang-online', $this->token);
        $respons['OrderanBaru'] = $this->SERVER_API->_getAPI('penjualan/count-new-order', $this->token);
        if ($this->session->userdata('Admintoken')) {
            if ($this->mobile === true) {
				$this->session->set_userdata('status_header', 'ADMIN');
                $this->template->adminmobile('Dashboard/Mobile/index_dashboard');
            }else{
                $this->session->set_userdata('title', 'Dashboard');
                $this->template->display_admin('Dashboard/index_admin',$respons);
            }
        } else {
            redirect('');
        }
    }

    function gantipasswordusertoko(){
        $data['password']          = $this->input->post('password');
        $data['new_password']      = $this->input->post('new_password');
        $data['retype_password']   = $this->input->post('retype_password');
        $respons                   = $this->SERVER_API->_putAPI('user-toko/password',$data, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
            redirect('wp-profile-admin');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('wp-profile-admin');
        }

        // var_dump($data);
    }
    function pushnotif(){
        $this->session->set_userdata('title', 'Kirim Notifikasi Ke Customer');
        $respons['title']      = 'Kirim Notifikasi Ke Customer';
        $this->template->display_admin('Pengaturan/PushNotif/index_push',$respons);
    }

    function kirimnotif(){
        $data['title']             = $this->input->post('title');
        $data['body']              = $this->input->post('body');
        $data['type']              = 1;
        $info = pathinfo($_FILES['image']['name']);
        $filename = $info['basename'];
        $directory = "./assets/images/NsiPic/PushNotif/";
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

        $this->upload->initialize($config);

        $this->load->library('upload', $config);

        if ($_FILES['image']) {
            $this->upload->do_upload('image');
            $uploadData = $this->upload->data();
            $config1['image_library'] = 'gd2';
            $config1['source_image'] = './assets/images/NsiPic/PushNotif/' . $uploadData['file_name'];
            $config1['create_thumb'] = FALSE;
            $config1['maintain_ratio'] = TRUE;
            $config1['quality'] = '70%';
            $config1['width'] = 1280;
            $config1['height'] = 810;
            $config1['new_image'] = './assets/images/NsiPic/PushNotif/' . $uploadData['file_name'];
            $this->load->library('image_lib', $config1);
            $this->image_lib->initialize($config1);
            $this->image_lib->resize();
            $data['image'] = base_url().'assets/images/NsiPic/PushNotif/'.$uploadData['file_name'];
        }
        $respons                   = $this->SERVER_API->_kirimnotifikasi($data);
        if($respons){
            $this->session->set_flashdata('alert', success('Notifikasi Berhasil Dikirim'));
            redirect('wp-pushnotif');
        }
        // echo $respons;
    }
    function profileadmin(){
        $this->template->adminmobile('Dashboard/Mobile/index_profileadmin');
    }
    function datapenjualan(){
        $respons['DataPenjualan']   = $this->SERVER_API->_getAPI('penjualan/ambil/trx-toko', $this->token);
        $this->template->adminmobile('Dashboard/Mobile/index_datapenjualan',$respons);
    }
    function detailpenjualan($id_transaksi, $kode_customer){
        $respons['DetailDataPenjualan']   = $this->SERVER_API->_getAPI('penjualan/ambil/cek-customer-trx/'.$id_transaksi.'/'.$kode_customer, $this->token);
        $this->template->adminmobile('Dashboard/Mobile/index_detaildatapenjualan',$respons);
    }
    function loaddashboard(){
        // if ($_POST['status']) {
            $output = '';
            $output = '
                <div class="col-6">
                    <div class="card mb-4 catagory-card">
                        <div class="card-body">
                        <h1>1</h1>
                        </div>
                        <div class="card-footer">
                        Orderan Baru Hari Ini
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card mb-4 catagory-card">
                        <div class="card-body">
                           <h1>1</h1>
                        </div>
                        <div class="card-footer">
                            Pengunjung Hari Ini
                        </div>
					</div>
                </div>
            ';
			// $respons = $this->SERVER_API->_getAPI('kategori/jenis', $this->token);
			// $data = $respons->data;
			// for ($i = 0; $i < 9; $i++) {
			// 	if ($data[$i] != null) {
			// 		$url = base_url('assets/icon/' . strtolower($data[$i]->icon));
			// 		$click = "$('.loaderform').show()";
			// 		$output = '
			// 		<div class="col-4">
			// 		<div class="card mb-4 catagory-card">
			// 			<div class="card-body">
			// 			<a onclick="' . $click . '" href="' . base_url('carikategori/' . encrypt_url($data[$i]->kode_kategori) . '/' . encrypt_url($data[$i]->nama_kategori)) . '">
			// 				<img src="' . $url . '.png" width="20px"><span>' . $data[$i]->nama_kategori . '</span>
			// 			</a>
			// 			</div>
			// 		</div>
			// 		</div>
			// 		';
			// 	}
				echo $output;
			// }
		// }
    }
    function userlist()
    {
        $this->session->set_userdata('title', 'Kelola User');
        $respons['title']      = 'Data User';
        $respons['DataUser']   = $this->SERVER_API->_getAPI('user', $this->token);
        $this->template->display_admin('Admin/KelolaUser/index_user', $respons);
    }
    function userlisttoko()
    {
        $this->session->set_userdata('title', 'Kelola User Toko');
        $respons['title']      = 'Data User Toko';
        $respons['DataUser']   = $this->SERVER_API->_getAPI('user-toko/all', $this->token);
        $respons['DataToko']   = $this->SERVER_API->_getAPI('toko/all', $this->token);
        $this->template->display_admin('Admin/KelolaUserToko/index_user', $respons);
    }

    function edit_user_admin()
    {
        $respons['title']      = 'Data User';
        $respons['DataUser']   = $this->SERVER_API->_getAPI('user', $this->token);
        $this->template->display_admin('Admin/KelolaUser/edit_usser_admin', $respons);
    }


    function simpanusser()
    {
        $data['user_id']          = $this->input->post('user_id');
        $data['nama_lkp']         = $this->input->post('nama_lkp');
        $data['type']             = $this->input->post('type');
        $data['password']         = $this->input->post('password');
        $data['retype_password']  = $this->input->post('retype_password');
        $respons                     = $this->SERVER_API->_postAPI('user', $data, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
            redirect('wp-user');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('wp-user');
        }
    }
    function simpanussertoko()
    {
        $data['user_id_toko']     = $this->input->post('user_id_toko');
        $data['user_name_toko']   = $this->input->post('user_name_toko');
        $data['kode_toko']        = $this->input->post('kode_toko');
        $data['password']         = $this->input->post('password');
        $data['retype_password']  = $this->input->post('password');
        $respons                     = $this->SERVER_API->_postAPI('user-toko/add', $data, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
            redirect('wp-user-toko');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('wp-user-toko');
        }
    }
    function edituser()
    {
        $kode                       = $this->input->post('user_id');
        $data['nama_lkp']           = $this->input->post('nama_lkp');
        $data['type']               = $this->input->post('type');
        $respons                     = $this->SERVER_API->_putAPI('user/1/' . $kode, $data, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
            redirect('wp-user');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('wp-user');
        }
    }
    function hapususer($kode)
    {
        $respons                     = $this->SERVER_API->_deletetAPI('user/1/' . $kode, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
            redirect('wp-user');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('wp-user');
        }
    }
    function hapususertoko($kode)
    {
        $respons                     = $this->SERVER_API->_deletetAPI('user-toko/by-id/' . $kode, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
            redirect('wp-user-toko');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('wp-user-toko');
        }
    }

    function parameterpoint()
    {
        $this->session->set_userdata('title', 'Parameter Poin');
        $respons['title']           = 'Kelola Parameter';
        $respons['ParameterPoint']  = $this->SERVER_API->_getAPI('poin', $this->token);
        $this->template->display_admin('Admin/Pengaturan/index_parameter_point', $respons);
    }

    function index_slider()
    {
        $this->session->set_userdata('title', 'Kelola Slider');
        $respons['title']      = 'Kelola Slider';
        $respons['Slider'] = $this->SERVER_API->_getAPI('slide/all', $this->token);
        $this->template->display_admin('Admin/Pengaturan/KelolaSlider/index_slider', $respons);
    }
    function simpanslider()
    {
        $info = pathinfo($_FILES['photo']['name']);
        $filename = $info['basename'];
        $directory = "./assets/images/NsiPic/sliderpromo/";
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

        $this->upload->initialize($config);

        $this->load->library('upload', $config);

        if ($_FILES['photo']) {
            $this->upload->do_upload('photo');
            $uploadData = $this->upload->data();
            $config1['image_library'] = 'gd2';
            $config1['source_image'] = './assets/images/NsiPic/sliderpromo/' . $uploadData['file_name'];
            $config1['create_thumb'] = FALSE;
            $config1['maintain_ratio'] = TRUE;
            $config1['quality'] = '70%';
            $config1['width'] = 1280;
            $config1['height'] = 810;
            $config1['new_image'] = './assets/images/NsiPic/sliderpromo/' . $uploadData['file_name'];
            $this->load->library('image_lib', $config1);
            $this->image_lib->initialize($config1);
            $this->image_lib->resize();
            $data['lokasi_gambar'] = $uploadData['file_name'];
        }
        $respons = $this->SERVER_API->_postAPI('slide', $data, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success('Slider Berhasil Ditambahkan'));
            redirect('wp-slider');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('wp-slider');
        }
    }
    function hapusslider($id)
    {
        $respons             = $this->SERVER_API->_deletetAPI('slide/id/' . $id, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success('Slider Berhasil Dihapus'));
            redirect('wp-slider');
        } else {
            $this->session->set_flashdata('alert', information('Slider Berhasil Dihapus'));
            redirect('wp-slider');
        }
    }
    function index_kelolanorek()
    {
        $this->session->set_userdata('title', 'Kelola No Rekening');
        $respons['title']       = 'Kelola No Rekening';
        $respons['DataRekening'] = $this->SERVER_API->_getAPI('rekening/all', $this->token);
        $this->template->display_admin('Admin/Pengaturan/KelolaNorekening/index_rekening', $respons);
    }
    function tambah_norek()
    {
        $data['no_rek']     = $this->input->post('no_rekening');
        $data['nama_bank']  = $this->input->post('nama_bank');
        $data['atas_nama']  = $this->input->post('atas_nama');
        $respons            = $this->SERVER_API->_postAPI('rekening', $data, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success('No Rekening Berhasil Ditambahkan'));
            redirect('wp-kelola-norek');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('wp-kelola-norek');
        }
    }
    function edit_norek()
    {
        $data['nama_bank']  = $this->input->post('nama_bank');
        $data['atas_nama']  = $this->input->post('atas_nama');
        $respons            = $this->SERVER_API->_putAPI('rekening/no_rek/' . $this->input->post('no_rekening'), $data, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success('No Rekening Berhasil Diubah'));
            redirect('wp-kelola-norek');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('wp-kelola-norek');
        }
    }
    function hapusrek($id)
    {
        $respons             = $this->SERVER_API->_deletetAPI('rekening/no_rek/' . $id, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success('No Rekening Berhasil Diubah'));
            redirect('wp-kelola-norek');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('wp-kelola-norek');
        }
    }

    function index_profile_perusahaan()
    {
        $respons['title']       = 'Kelola Profile Perusahaan';
        $this->session->set_userdata('title', 'Kelola Profile Perusahaan');
        $respons['DataPerusahaan']      = $this->SERVER_API->_getAPI('system-perusahaan');
        $this->template->display_admin('Admin/Pengaturan/ProfilePerusahaan/index_perusahaan', $respons);
    }
    function index_setting_alamat_pengirim()
    {
        $respons['title']       = 'Setting Alamat Pengirim';
        $this->session->set_userdata('title', 'Setting Alamat Pengirim');
        $respons['DataPengiriman']      = $this->SERVER_API->_getAPI('alamat-pengirim/get',$this->token);
        $respons['Provinsi']            = $this->SERVER_API->_getAPI('raja-ongkir/provinsi/', '');
        $this->template->display_admin('Admin/Pengaturan/ProfilePerusahaan/settingalamatpengirim', $respons);
    }

    function simpanalamatpengirim(){
        $data['kode_provinsi']       = explode('-',$this->input->post('provinsi'))[0];
        $data['nama_provinsi']       = explode('-',$this->input->post('provinsi'))[1];

        $data['kode_kota']           = explode('-',$this->input->post('kota'))[0];
        $data['nama_kota']           = explode('-',$this->input->post('kota'))[1];

        $data['kode_kecamatan']      =  explode('-',$this->input->post('kecamatan'))[0];
        $data['nama_kecamatan']      =  explode('-',$this->input->post('kecamatan'))[1];

        $data['kode_pos']            = $this->input->post('kode_pos');

        $data['alamat_lengkap']      = $this->input->post('alamat');
        
        $respons            = $this->SERVER_API->_postAPI('alamat-pengirim/add', $data, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
            redirect('wp-setting-alamat-pengirim');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('wp-setting-alamat-pengirim');
        }
    }

    function simpanparameterpoin()
    {
        $data['poin']           = intval(str_replace('.','',$this->input->post('point')));
        $data['status']           = $this->input->post('status');
        $respons                 = $this->SERVER_API->_putAPI('poin/update', $data, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
            redirect('wp-parameter-poin');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('wp-parameter-poin');
        }

    }
    function simpaneditprofile()
    {

        $file_asli                = $this->input->post('name_logo');
        $file_baru                = $_FILES['logo']['name'];

        if ($file_baru == "") {
            $data["logo"]            =  $this->input->post('name_logo');
        } else {
            $info = pathinfo($_FILES['logo']['name']);
            $filename = $info['basename'];
            $directory = "./assets/logo/";
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

            $this->upload->initialize($config);

            $this->load->library('upload', $config);

            if ($_FILES['logo']) {
                $this->upload->do_upload('logo');
            }
            $uploadData = $this->upload->data();
            $data['logo'] = $uploadData['file_name'];
        }

        $data['kode_perusahaan']         = $this->input->post('kode_perusahaan');
        $data['nama_perusahaan']         = $this->input->post('nama_perusahaan');
        $data['no_hp']                   = $this->input->post('no_hp');
        $data['email']                   = $this->input->post('email');
        $data['alamat']                   = $this->input->post('alamat');
        $data['lokasi']                  = $this->input->post('lokasi');
        $data['input_by']                  = $this->session->userdata('user_id');
        $respons                         = $this->SERVER_API->_postAPI('system-perusahaan', $data, $this->token);
        // var_dump($respons);
        // var_dump($data);
        // var_dump($respons);
        // die;
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
            unlink('./assets/logo/'.$this->input->post('name_logo'));
            redirect('wp-profile-perusahaan');
        } else {
            $this->session->set_userdata($data);
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('wp-profile-perusahaan');
        }
    }
}
