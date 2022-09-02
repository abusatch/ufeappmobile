<?php

require_once "helper.php";

$respon = file_get_contents("php://input");
$jsresp = json_decode($respon);
$id_registration = substr($jsresp->order_id, 3);

$sql = "UPDATE tb_registration SET 
    payment_status = '{$jsresp->transaction_status}',
    payment_notif = CONCAT(payment_notif,'@@','$respon')
    WHERE id_registration = '$id_registration'";
AFhelper::dbSave($sql);

?>