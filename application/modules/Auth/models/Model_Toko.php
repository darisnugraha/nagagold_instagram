<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Model_Toko extends CI_Model{

    var $API ="";
    public function __construct(){
        parent::__construct();
        $this->API = UrlApi();
    }

    public function getBarang($data){
        $query = $this->curl->simple_post($this->API . '/DataBarang/DataBarang', $data, array(CURLOPT_BUFFERSIZE => 10)); 
        return $query;
    }

    public function postBarang($data){
        $query = $this->curl->simple_post($this->API . '/DataBarang/DataBarang', $data, array(CURLOPT_BUFFERSIZE => 10)); 
        return $query;
    }

    public function postRekening($data){
        $query = $this->curl->simple_post($this->API . '/rekening/Rekening', $data, array(CURLOPT_BUFFERSIZE => 10)); 
        return $query;
    }

    public function getRekening($data){
        $query = json_decode($this->curl->simple_get($this->API . '/rekening/Rekening', $data));
        return $query;
    }

    

}