<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Model_Login extends CI_Model{

	var $API ="";
	public function __construct(){
		parent::__construct();
		$this->API = UrlApi();
	}

	
	public function authLogin($data){
        $query = $this->curl->simple_post($this->API.'/login/Login_member', $data, array(CURLOPT_BUFFERSIZE => 10)); 
        return $query;
	}	


	public function Logout($data){
        $query = $this->curl->simple_post($this->API.'/login/logout', $data, array(CURLOPT_BUFFERSIZE => 10)); 
        return $query;
	}

	
}



