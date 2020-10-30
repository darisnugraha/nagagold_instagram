<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends MX_Controller
{
    private $token, $connection;
    public function __construct()
    {
        parent::__construct();
        is_logged_in_admin();
        $this->token =  $this->session->userdata('Admintoken');
        $this->connection =  cek_internet();
    }

    public function index()
    {

        if ($this->connection == true) {
            $respons['title']          = 'Data Kurir';
            $this->session->set_userdata('title', 'Kelola Kurir');
            $respons['DataKurir']     = $this->SERVER_API->_getAPI('courier/all', $this->token);
            $this->template->display_admin('Pengaturan/KelolaKurir/index_kurir', $respons);
        } else {
            $this->load->view('Error/index_error');
        }
    }

    function savekurir()
    {
        $data['nama_kurir']         = $this->input->post('kurir');
        var_dump($data);
    }

    function parameterhargaemas()
    {

        $respons['GrouupEmas']     = $this->SERVER_API->_getAPI('master/get/group', $this->token);
        $respons['title']          = 'Parameter Harga Emas';
        $this->session->set_userdata('title', 'Parameter Harga Emas');
        $this->template->display_admin('Pengaturan/ParameterHargaEmas/index_harga_emas', $respons);
    }
    function simpanparameteremas()
    {
        $kode         = $this->input->post('kode_group');
        $harga        = str_replace('.','',$this->input->post('harga_emas'));
        $respons     = $this->SERVER_API->_putAPI('master/update-harga/'.$kode.'&'.intVal($harga),'', $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
        }
        redirect('wp-parameter-harga-emas');
    }

    function loadparamterhargaemas(){
        $result= $this->SERVER_API->_getAPI('master/get/group', $this->token);
        $this->output->set_status_header(200);
        $this->output->set_content_type('application/json', 'utf-8');
        return $this->output->set_output(json_encode($result));
    }
    function saveparameterwaktu()
    {
        $data['waktu']         = $this->input->post('waktu');
        var_dump($data);
    }

    function updatekurir()
    {
        $kode_kurir = $this->input->post('kode_kurir');
        $status = $this->input->post('status');
        $respons   = $this->SERVER_API->_putAPI('courier/update/' . $kode_kurir . '&' . $status, '', $this->token);
        $this->output->set_status_header(200);
        $this->output->set_content_type('application/json', 'utf-8');
        return $this->output->set_output(json_encode($respons));
    }
    function loaddatakurir()
    {
        if ($_POST['loadbarang']) {
            $result   = $this->SERVER_API->_getAPI('courier/all', $this->token);
            $this->output->set_status_header(200);
            $this->output->set_content_type('application/json', 'utf-8');
            return $this->output->set_output(json_encode($result));
        } else {
            redirect('');
        }
    }

    function Datatoko()
    {
        $respons['DataToko']   = $this->SERVER_API->_getAPI('toko/all', $this->token);
        $respons['title']          = 'Data Toko';
        $this->session->set_userdata('title', 'List Data Toko');
        $this->template->display_admin('Pengaturan/DataToko/index_data_toko', $respons);
    }

    function SimpanDataToko()
    {
        $data['kode_toko'] = $this->input->post('kode_toko');
        $data['nama_toko'] = $this->input->post('nama_toko');

        $data['kode_provinsi']       = explode('-', $this->input->post('provinsi'))[0];
        $data['nama_provinsi']       = explode('-', $this->input->post('provinsi'))[1];

        $data['kode_kota']           = explode('-', $this->input->post('kota'))[0];
        $data['nama_kota']           = explode('-', $this->input->post('kota'))[1];

        $data['kode_kecamatan']      =  explode('-', $this->input->post('kecamatan'))[0];
        $data['nama_kecamatan']      =  explode('-', $this->input->post('kecamatan'))[1];

        $data['kode_pos']            = $this->input->post('kode_pos');
        $data['alamat_lengkap']      = $this->input->post('alamat');

        $respons = $this->SERVER_API->_postAPI('toko/add', $data, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
            redirect('wp-data-toko');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('wp-data-toko');
        }
    }
    function HapusKota($kode)
    {
        $respons                     = $this->SERVER_API->_deletetAPI('toko/delete/' . $kode, $this->token);
        if ($respons->status == "berhasil") {
            $this->session->set_flashdata('alert', success($respons->pesan));
            redirect('wp-data-toko');
        } else {
            $this->session->set_flashdata('alert', information($respons->pesan));
            redirect('wp-data-toko');
        }
    }
}
