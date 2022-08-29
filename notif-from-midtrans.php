<?php

require_once "helper.php";

$respon = file_get_contents("php://input");
$jsresp = json_decode($respon);

$sql = "UPDATE tb_registration SET 
    payment_status = '{$jsresp->transaction_status}',
    payment_notif = CONCAT(payment_notif,'$respon')";
AFhelper::dbSave($sql);

?>