<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Model_Barang extends CI_Model{

	var $API ="";
	public function __construct(){
		parent::__construct();
		$this->API = UrlApi();
	}

	
	public function getBarang($data){
        $query = json_decode($this->curl->simple_get($this->API . 'barang/Barang', $data));
        return $query;
	}	


	public function getJual($data){
        $query = json_decode($this->curl->simple_get($this->API . 'jual/Jual', $data));
        return $query;
	}	
	
	public function simpanCart($data){
		$query = $this->curl->simple_post($this->API . 'jual/Jual', $data, array(CURLOPT_BUFFERSIZE => 10)); 
        return $query;
	}
	public function getRekening($data){
        $query = json_decode($this->curl->simple_get($this->API . '/rekening/Rekening', $data));
        return $query;
    }

}



