<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SERVER_API extends CI_Model
{

  var $base_api = "";
  public function __construct()
  {
    parent::__construct();
    $this->base_api = UrlApi();
  }

  //Get APi
  public function _getAPI($controller = "", $token = "")
  {

    $xToken[0] = "x-auth-token: " . $token;
    $xToken[1] = "Content-Type: application/json";
    // var_dump($this->base_api . $controller);
    // var_dump($token);
    // die;
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->base_api . $controller,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => $xToken,
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response);
  }

  public function _deletetAPI($controller = "", $token = "")
  {
    // var_dump($data);

    $xToken[0] = "x-auth-token: " . $token;
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->base_api . $controller,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "DELETE",
      CURLOPT_HTTPHEADER => $xToken,
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response);
  }
  public function _putAPI($controller = "", $data = "", $token = "")
  {
    if ($data == "") {
      $xToken[0] = "x-auth-token: " . $token;
      $isidata = '';
    } else {
      // var_dump('test');
      $xToken[0] = "x-auth-token: " . $token;
      $xToken[1] = "Content-Type: application/json";
      $isidata = json_encode($data);
    }

    // var_dump($this->base_api . $controller);
    // var_dump($token);
    // var_dump($isidata);
    // die;

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->base_api . $controller,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "PUT",
      CURLOPT_POSTFIELDS => $isidata,
      CURLOPT_HTTPHEADER => $xToken,
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response);
  }

  //Post Api
  public function _postAPI($controller = "", $data = "", $token = "")
  {
    
    if ($data == "") {
      $isidata = '';
    } else {
      $isidata = json_encode($data);
    }

    // var_dump($this->base_api . $controller);
    // var_dump($isidata);
    // var_dump($token);
    // die;
    $xToken[0] = "x-auth-token: " . $token;
    $xToken[1] = "Content-Type: application/json";
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->base_api . $controller,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => $isidata,
      CURLOPT_HTTPHEADER => $xToken,
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    return json_decode($response);
  }

  public function _kirimnotifikasi($data){
    $data1['notification'] = $data;
    $data1['to'] = '/topics/news';
   
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>json_encode($data1),
      CURLOPT_HTTPHEADER => array(
        'Authorization: key=AAAApxVBD8Q:APA91bGoh0fZr_pvSaR857WqAlKRtvGD7UDnTObcspGVq1R4LKQpX0VxtX0WSAagkchdo-INKKzMTFCz_48IoJPbbB8Ega07UzFVq6KcTXjxSt5pyeq-2lCWgEn831D_GdOp5LhKG6qR',
        'Content-Type: application/json'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response);
  }

}
