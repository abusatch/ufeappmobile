<?php

require_once "helper.php";

$mode = $_GET['mode'];

$reading = new ReadingRegistration();
switch ($mode) {
    case 'tambah':
      $reading->tambah();
      break;
    case 'detil':
      $reading->detil();
      break;
    case 'mypending':
      $reading->myPending();
      break;
    case 'getstatus':
      $reading->getStatus();
      break;
    default:
      echo "Mode Not Found";
      break;
}

class ReadingRegistration
{
  
  function detil() {
    $id = $_POST['id'];
    if($id) {
        $sql = "SELECT id_registration, id_user, id_activites, id_harga, harga, payment_status, payment_type, payment_agent, registration_date, email 
          FROM tb_registration 
          WHERE id_registration = $id";
        $data = AFhelper::dbSelectOne($sql);
        AFhelper::kirimJson($data, 'Get Registration');
    } else {
        AFhelper::kirimJson(null, 'ID cannot be empty', 0);
    }  
  }

  function myPending() {
    $username = $_POST['username'];
    $id_activites = $_POST['id_activites'];

    $sql = "SELECT * from user where username = '$username'";
    $user = AFhelper::dbSelectOne($sql);
    $idUser = $user->idUser;

    $sql = "SELECT id_registration, id_user, id_activites, id_harga, harga, payment_status, payment_type, payment_agent, payment_key, 
      payment_notif, payment_notif_date, registration_date, email 
      FROM tb_registration 
      WHERE id_user = '$idUser' AND id_activites = '$id_activites' AND payment_status = 'pending' ORDER BY id_registration DESC";
    $regis = AFhelper::dbSelectOne($sql);
    if($regis) {
        $jsresp = json_decode($regis->payment_key);
        $data = AFhelper::getTampilanMidtrans($regis->payment_type, $regis->payment_agent, $jsresp);
        $data['payment_type'] = $regis->payment_type;
        $data['payment_agent'] = $regis->payment_agent;
        AFhelper::kirimJson($data, $sql);
    } else {
        AFhelper::kirimJson($regis, $sql);
    }
}

  function getStatus() {
    $order_id = "ACT".$_GET['id'];
    $header = array(
      'Content-Type: application/json',
      'Accept: application/json',
      'Authorization: Basic ' . base64_encode('SB-Mid-server-mMfDlH9AGc8QGwK6DtK0ggVK:')
    );
    $crl = curl_init();
      curl_setopt($crl, CURLOPT_URL, 'https://api.sandbox.midtrans.com/v2/'.$order_id.'/status');
      curl_setopt($crl, CURLOPT_HTTPHEADER, $header);
      curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
      $respon = curl_exec($crl);
      $jsresp = json_decode($respon);
      AFhelper::kirimJson($jsresp, 'Get status from Midtrans -- '.$_GET['id']);
  }

  function tambah() {
    $username = $_POST['username'];
    $id_activites = $_POST['id_activites'];
    $id_harga = $_POST['id_harga'];
    $email = $_POST['email'];
    $payment_type = $_POST['payment_type'];
    $payment_agent = $_POST['payment_agent'];
    $registration_date = $_POST['registration_date'];
    $expired_date = $_POST['expired_date'];

    $sql = "SELECT * from user where username = '$username'";
    $user = AFhelper::dbSelectOne($sql);
    $idUser = $user->idUser;

    $sql = "SELECT * from tb_harga_program where id_harga = '$id_harga'";
    $harga = AFhelper::dbSelectOne($sql);

    $sql = "SELECT * from tb_activites where id_activites = '$id_activites'";
    $aktifitas = AFhelper::dbSelectOne($sql);
    
    $sql = "INSERT INTO tb_registration(id_user, id_activites, id_harga, harga, payment_type, payment_agent, registration_date, email) 
      VALUES ('$idUser', '$id_activites', '$id_harga', '$harga->harga', '$payment_type', '$payment_agent', '$registration_date', '$email')";
    $hasil = AFhelper::dbSaveReturnID($sql);
    if ($hasil <> 0 && $hasil <> '') {
      $customer = array('first_name' => $user->first_name, 'last_name' => $user->second_name, 'email' => $email, 'phone' => $user->phone);
      $midtran = AFhelper::setMidtrans($payment_type, $payment_agent, "ACT".$hasil, $harga->harga, $id_activites, $aktifitas->judul, $customer);
      $jsresp = json_decode($midtran);
      if($jsresp->status_code == "200" || $jsresp->status_code == "201" || $jsresp->status_code == "202") {
        $data = AFhelper::getTampilanMidtrans($payment_type, $payment_agent, $jsresp);
        $status_activites = 'W';
        if($jsresp->transaction_status == "settlement" || $jsresp->transaction_status == "capture") {
          $status_activites = 'Y';
        }
        $sql = "UPDATE tb_registration SET 
          payment_status = '{$jsresp->transaction_status}',
          payment_key = '$midtran'
          WHERE id_registration = '$hasil'";
        $cek = AFhelper::dbSaveCek($sql);
        if($cek[0]) {
          $sql = "INSERT INTO tb_user_activites(id_user, id_activites, status, id_registration , registration_date) 
            VALUES ('$idUser', '$id_activites', '$status_activites', '$hasil', '$registration_date')
            ON DUPLICATE KEY UPDATE
            status = '$status_activites',
            id_registration = '$hasil',
            registration_date = '$registration_date'";
          AFhelper::dbSave($sql, $data, 'Registration Success');
        } else {
          AFhelper::kirimJson($sql, 'Registration failed update status', 0); 
        }
      } else {
        AFhelper::kirimJson($jsresp, $jsresp->status_message, 0);
      }
    }  else {
      AFhelper::kirimJson($sql, 'Registration failed', 0); 
    }
  }
  
}

?>