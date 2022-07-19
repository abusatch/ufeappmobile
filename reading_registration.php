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
    default:
      echo "Mode Not Found";
      break;
}

class ReadingRegistration
{
  function detil() {
    $id = $_POST['id'];
    if($id) {
        $sql = "SELECT id_registration, id_user, id_activites, id_harga, harga, payment, registration_date, firstname, lastname, 
            cc_number, cvv, exp_month, exp_year, email 
          FROM tb_registration 
          WHERE id_registration = $id";
        $data = AFhelper::dbSelectOne($sql);
        AFhelper::kirimJson($data, 'Get Registration');
    } else {
        AFhelper::kirimJson(null, 'ID cannot be empty', 0);
    }  
  }

  function tambah() {
    $username = $_POST['username'];
    $id_activites = $_POST['id_activites'];
    $id_harga = $_POST['id_harga'];
    $payment = $_POST['payment'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $cc_number = $_POST['cc_number'];
    $cvv = $_POST['cvv'];
    $email = $_POST['email'];
    $exp_month = $_POST['exp_month'];
    $exp_year = $_POST['exp_year'];
    $registration_date = $_POST['registration_date'];
    $expired_date = $_POST['expired_date'];

    $sql = "SELECT * from user where username = '$username'";
    $user = AFhelper::dbSelectOne($sql);
    $idUser = $user->idUser;

    $sql = "SELECT * from tb_harga_program where id_harga = '$id_harga'";
    $harga = AFhelper::dbSelectOne($sql);

    // $expired_date = date("Y-m-d H:i:s", strtotime("+".$harga->periode));
    
    $sql = "INSERT INTO tb_registration(id_user, id_activites, id_harga, harga, payment, registration_date, firstname, lastname, cc_number, cvv, exp_month, exp_year, email) 
      VALUES ('$idUser', '$id_activites', '$id_harga', '$harga->harga','$payment', '$registration_date', '$firstname', '$lastname', '$cc_number', '$cvv', '$exp_month', '$exp_year', '$email')";
    $hasil = AFhelper::dbSaveReturnID($sql);
    if ($hasil <> 0 && $hasil <> '') {
      $sql = "INSERT INTO tb_user_activites(id_user, id_activites, status, id_registration , registration_date, expired_date) 
        VALUES ('$idUser', '$id_activites', 'Y', '$hasil', '$registration_date', '$expired_date')
        ON DUPLICATE KEY UPDATE
        status = 'Y',
        id_registration = '$hasil',
        registration_date = '$registration_date',
        expired_date = '$expired_date'";
      AFhelper::dbSave($sql, null, 'Data saved successfully');
    }  else {
      AFhelper::kirimJson(null, 'Registration failed', 0); 
    }
  }
  
}

?>