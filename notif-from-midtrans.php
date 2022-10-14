<?php

require_once "helper.php";

$respon = file_get_contents("php://input");
$jsresp = json_decode($respon);
$type = substr($jsresp->order_id, 0, 3);
$id = substr($jsresp->order_id, 3);

date_default_timezone_set('Asia/Jakarta');
$tanggal = date('Y-m-d H:i:s');

if($type == "ACT") {
    $sql = "UPDATE tb_registration SET 
        payment_status = '{$jsresp->transaction_status}',
        payment_notif = CONCAT(payment_notif,'@@','$respon'),
        payment_notif_date = CONCAT(payment_notif_date,'@@','$tanggal')
        WHERE id_registration = '$id'; ";
    if($jsresp->transaction_status == "settlement" || $jsresp->transaction_status == "capture") {
        $sqlcek = "SELECT b.periode
            FROM tb_registration a
            JOIN tb_harga_program b ON(a.id_harga = b.id_harga)
            WHERE a.id_registration = '$id'";
        $cek = AFhelper::dbSelectOne($sqlcek);
        $expired = date('d/m/Y', strtotime("+".$cek->periode." day"));
        $sql .= "UPDATE tb_user_activites SET
            status = 'Y',
            expired_date = '$expired'
            WHERE id_registration = '$id';";
    }
    AFhelper::dbSaveMulti($sql);
} else if($type == "DON") {
    $sql = "UPDATE tb_donation SET 
        payment_status = '{$jsresp->transaction_status}',
        payment_notif = CONCAT(payment_notif,'@@','$respon'),
        payment_notif_date = CONCAT(payment_notif_date,'@@','$tanggal')
        WHERE id_donation = '$id'";
    AFhelper::dbSave($sql);
} else if($type == "ADV") {
    $sql = "UPDATE tb_iklan_order SET 
        payment_status = '{$jsresp->transaction_status}',
        payment_notif = CONCAT(payment_notif,'@@','$respon'),
        payment_notif_date = CONCAT(payment_notif_date,'@@','$tanggal')
        WHERE id_order = '$id'";
    AFhelper::dbSave($sql);
}

?>