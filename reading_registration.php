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
      $header = array(
        'Content-Type: application/json',
        'Accept: application/json',
        'Authorization: Basic ' . base64_encode('SB-Mid-server-mMfDlH9AGc8QGwK6DtK0ggVK:')
      );
      $post_data = array(
        "payment_type" => $payment_type,
        "transaction_details" => array(
          "order_id" => "ACT".$hasil,
          "gross_amount" => $harga->harga
        ),
        "item_details" => array(
          array(
            "id" => $id_activites,
            "price" => $harga->harga,
            "quantity" => 1,
            "name" => $aktifitas->judul
          )
        ),
        "customer_details" => array(
          "first_name" => $user->first_name,
          "last_name" => $user->second_name,
          "email" => $email,
          "phone" => $user->phone
        )
      );
      if($payment_type == "credit_card") {
        $post_data["credit_card"] = array("token_id" => $payment_agent, "authentication" => true);
      } else if($payment_type == "bank_transfer") {
        $post_data["bank_transfer"] = array("bank" => $payment_agent);
      } else if($payment_type == "echannel") {
        $post_data["echannel"] = array("bill_info1" => "Payment", "bill_info2" => $aktifitas->judul);
      } else if($payment_type == "cstore") {
        $post_data["cstore"] = array("store" => $payment_agent);
      } else if($payment_type == "gopay") {
        $post_data["gopay"] = array("enable_callback" => false);
      } else if($payment_type == "shopeepay") {
        $post_data["shopeepay"] = array("callback_url" => "https://ufe-section-indonesie.org/");
      }
      $crl = curl_init();
      curl_setopt($crl, CURLOPT_URL, 'https://api.sandbox.midtrans.com/v2/charge');
      curl_setopt($crl, CURLOPT_HTTPHEADER, $header);
      curl_setopt($crl, CURLOPT_POST, true);
      curl_setopt($crl, CURLOPT_POSTFIELDS, json_encode($post_data));
      curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
      $respon = curl_exec($crl);
      $jsresp = json_decode($respon);
      if($jsresp->status_code == "200" || $jsresp->status_code == "201" || $jsresp->status_code == "202") {
        $status_activites = 'N';
        if($jsresp->transaction_status = "settlement" || $jsresp->transaction_status = "capture") {
          $status_activites = 'Y';
        }
        if($payment_type == "bank_transfer") {
          if($payment_agent == "permata") {
            $datanya = array("key" => $jsresp->permata_va_number);
          } else {
            $datanya = array("key" => $jsresp->va_numbers[0]->va_number);
          }
        } else if($payment_type == "echannel") {
          $datanya = array("key" => $jsresp->bill_key, "biller_code" => $jsresp->biller_code);
        } else if($payment_type == "cstore") {
          $datanya = array("key" => $jsresp->payment_code);
        } else if($payment_type == "gopay" || $payment_type == "shopeepay") {
          for ($i=0; $i < count($jsresp->actions); $i++) { 
            if($jsresp->actions[$i]->name == "generate-qr-code") {
              $datanya["key"] = $jsresp->actions[$i]->url;
            }
            if($jsresp->actions[$i]->name == "deeplink-redirect") {
              $datanya["link"] = $jsresp->actions[$i]->url;
            }
          }
        }
        if($payment_type == "bank_transfer") {
          if($payment_agent == "permata") {
            $datanya["title"] = "Effectuez le paiement de la banque Permata au numéro de compte virtuel ci-dessous.";
          } else if($payment_agent == "bca") {
            $datanya["title"] = "Effectuez le paiement de la banque BCA au numéro de compte virtuel ci-dessous.";
          } else if($payment_agent == "bni") {
            $datanya["title"] = "Effectuez le paiement de la banque BNI au numéro de compte virtuel ci-dessous.";
          } else if($payment_agent == "bri") {
            $datanya["title"] = "Effectuez le paiement de la banque BRI au numéro de compte virtuel ci-dessous.";
          }
          $datanya["label_key"] = "Numéro de compte virtuel";
        } else if($payment_type == "echannel") {
          $datanya["title"] = "Effectuez le paiement de la banque Mandiri au numéro de compte virtuel ci-dessous.";
          $datanya["label_key"] = "Numéro de compte virtuel";
          $datanya["label_biller_code"] = "Code de l'entreprise";
        } else if($payment_type == "cstore") {
          if($payment_agent == "indomaret") {
            $datanya["title"] = "Veuillez vous rendre au magasin Indomaret le plus proche et montrer le code-barres/code de paiement au caissier.";
          } else if($payment_agent == "alfamart") {
            $datanya["title"] = "Veuillez vous rendre au magasin Alfa Group le plus proche et montrer le code-barres/code de paiement au caissier.";
          }
          $datanya["label_key"] = "Code de paiement";
        } else if($payment_type == "credit_card") {
          $datanya = $jsresp;
        }
        $sql = "UPDATE tb_registration SET 
          payment_status = '{$jsresp->transaction_status}',
          payment_key = '$respon'
          WHERE id_registration = '$hasil'";
        $cek = AFhelper::dbSaveCek($sql);
        if($cek[0]) {
          $sql = "INSERT INTO tb_user_activites(id_user, id_activites, status, id_registration , registration_date, expired_date) 
            VALUES ('$idUser', '$id_activites', '$status_activites', '$hasil', '$registration_date', '$expired_date')
            ON DUPLICATE KEY UPDATE
            status = '$status_activites',
            id_registration = '$hasil',
            registration_date = '$registration_date',
            expired_date = '$expired_date'";
          AFhelper::dbSave($sql, $datanya, 'Registration Success');
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