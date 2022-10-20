<?php

require_once "helper.php";

date_default_timezone_set('Asia/Jakarta');
$now = date('Y-m-d');

$sql = "SELECT a.id_iklan, a.posisi, a.sub_posisi, a.jenis_layout, a.customer, a.tanggal, a.expired, a.gambar, a.url, a.visibility 
    FROM tb_iklan a
    WHERE a.visibility IN('1','0') AND a.expired = '$now'";
$data = AFhelper::dbSelectAll($sql);
AFhelper::kirimJson($data);


?>