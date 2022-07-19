<?php

require_once "helper.php";

$mode = $_GET['mode'];

$reading = new ReadingRegistration();
switch ($mode) {
    case 'tambah':
      $reading->tambah();
      break;
    default:
      echo "Mode Not Found";
      break;
}

class ReadingRegistration
{
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

    $sql = "SELECT * from user where username = '$username'";
    $user = AFhelper::dbSelectOne($sql);
    $idUser = $user->idUser;

    $sql = "SELECT * from tb_harga_program where id_harga = '$id_harga'";
    $harga = AFhelper::dbSelectOne($sql);

    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('Y-m-d H:i:s');
    $expired_date = date("Y-m-d H:i:s", strtotime("+".$harga->periode));
    
    $sql = "INSERT INTO tb_registration(id_user, id_activites, id_harga, harga, payment, registration_date, firstname, lastname, cc_number, cvv, exp_month, exp_year, email) 
        VALUES ('$idUser', '$id_activites', '$id_harga', '$harga->harga','$payment', '$tanggal', '$firstname', '$lastname', '$cc_number', '$cvv', '$exp_month', '$exp_year', '$email')";
    $hasil = AFhelper::dbSaveCek($sql);
    if($hasil[0]) {
        $sql = "INSERT INTO tb_user_activites(id_user, id_activites, status, registration_date, expired_date) 
            VALUES ('$idUser', '$id_activites', 'Y', '$tanggal', '$expired_date')";
        AFhelper::dbSave($sql, null, 'Data saved successfully');
    } else {
        AFhelper::kirimJson(null, 'Registration failed '.$hasil[1], 0); 
    }
  }
  
}

?>