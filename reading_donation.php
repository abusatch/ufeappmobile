<?php

require_once "helper.php";

$mode = $_GET['mode'];

$reading = new ReadingDonation();
switch ($mode) {
    case 'lihat':
        $reading->lihat();
        break;
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

class ReadingDonation
{

    function lihat() {
        $sql = "SELECT a.id_donation, a.id_user, a.harga, a.payment_status, a.payment_type, a.payment_agent, a.donation_date, a.email,
                CONCAT(b.first_name,' ',b.second_name) AS username 
            FROM tb_donation a
            JOIN user b ON(a.id_user = b.idUser)
            WHERE a.payment_status IN('settlement', 'capture')";
        $data = AFhelper::dbSelectAll($sql);
        AFhelper::kirimJson($data, 'Get List Donation');
    }
  
    function detil() {
        $id = $_POST['id'];
        if($id) {
            $sql = "SELECT id_donation, id_user, harga, payment_status, payment_type, payment_agent, donation_date, email 
                FROM tb_donation 
                WHERE id_donation = $id";
            $data = AFhelper::dbSelectOne($sql);
            AFhelper::kirimJson($data, 'Get Donation');
        } else {
            AFhelper::kirimJson(null, 'ID cannot be empty', 0);
        }  
    }

    function myPending() {
        $username = $_POST['username'];
        $sql = "SELECT * from user where username = '$username'";
        $user = AFhelper::dbSelectOne($sql);
        $idUser = $user->idUser;
        $sql = "SELECT id_donation, id_user, harga, payment_status, payment_type, payment_agent, payment_key, payment_notif, payment_notif_date, donation_date, email 
            FROM tb_donation 
            WHERE id_user = '$idUser' AND payment_status = 'pending' ORDER BY id_donation DESC";
        $donasi = AFhelper::dbSelectOne($sql);
        if($donasi) {
            $jsresp = json_decode($donasi->payment_key);
            $data = AFhelper::getTampilanMidtrans($donasi->payment_type, $donasi->payment_agent, $jsresp);
            $data['payment_type'] = $donasi->payment_type;
            $data['payment_agent'] = $donasi->payment_agent;
            AFhelper::kirimJson($data);
        } else {
            AFhelper::kirimJson($donasi);
        }
    }

    function getStatus() {
        $order_id = "DON".$_GET['id'];
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
        $email = $_POST['email'];
        $payment_type = $_POST['payment_type'];
        $payment_agent = $_POST['payment_agent'];
        $donation_date = $_POST['donation_date'];
        $harga = $_POST['harga'];

        $sql = "SELECT * from user where username = '$username'";
        $user = AFhelper::dbSelectOne($sql);
        $idUser = $user->idUser;
        
        $sql = "INSERT INTO tb_donation(id_user, harga, payment_type, payment_agent, donation_date, email) 
        VALUES ('$idUser', '$harga', '$payment_type', '$payment_agent', '$donation_date', '$email')";
        $hasil = AFhelper::dbSaveReturnID($sql);
        if ($hasil <> 0 && $hasil <> '') {
            $customer = array('first_name' => $user->first_name, 'last_name' => $user->second_name, 'email' => $email, 'phone' => $user->phone);
            $midtran = AFhelper::setMidtrans($payment_type, $payment_agent, "DON".$hasil, $harga, "DONATION", "Donation", $customer);
            $jsresp = json_decode($midtran);
            if($jsresp->status_code == "200" || $jsresp->status_code == "201" || $jsresp->status_code == "202") {
                $data = AFhelper::getTampilanMidtrans($payment_type, $payment_agent, $jsresp);
                $sql = "UPDATE tb_donation SET 
                    payment_status = '{$jsresp->transaction_status}',
                    payment_key = '$midtran'
                    WHERE id_donation = '$hasil'";
                AFhelper::dbSaveCek($sql);
                AFhelper::kirimJson($data);
            } else {
                AFhelper::kirimJson($jsresp, $jsresp->status_message, 0);
            }
        }  else {
            AFhelper::kirimJson($sql, 'Donation failed', 0); 
        }
    }
  
}

?>