<?php

require_once "helper.php";

date_default_timezone_set('Asia/Jakarta');
$now = date('Y-m-d');

$sql = "SELECT a.id_iklan, a.posisi, a.sub_posisi, a.jenis_layout, a.customer, a.tanggal, a.expired, a.gambar, a.url, a.visibility,
        b.id_order, b.id_user, b.id_posisi, b.id_harga, b.layout
    FROM tb_iklan a
    LEFT JOIN tb_iklan_order b ON(a.id_iklan = b.id_iklan)
    WHERE a.visibility IN('1','0') AND a.expired = '$now'";
$data = AFhelper::dbSelectAll($sql);
$sqlu;
foreach ($data as $iklan) {
    $sqlu .= "UPDATE tb_iklan SET visibility = 'E' WHERE id_iklan = '$iklan->id_iklan'; ";
    if($iklan->layout) {
        $sqlu .= "UPDATE tb_iklan_posisi SET status_$iklan->layout = 'available' WHERE id_posisi = '$iklan->id_posisi'; ";
    }
}
AFhelper::dbSaveMulti($sqlu);

?>