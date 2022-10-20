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
    $cek = AFhelper::dbSaveCek($sql);
    if($cek[0]) {
        if($jsresp->transaction_status == "settlement" || $jsresp->transaction_status == "capture") {
            $sql = "SELECT a.id_user, a.layout, b.id_posisi, b.posisi, b.sub_posisi, b.status_1, b.status_2a, b.status_2b, c.jenis_layout, c.periode 
                FROM tb_iklan_order a
                JOIN tb_iklan_posisi b ON(a.id_posisi = b.id_posisi)
                JOIN tb_iklan_harga c ON(a.id_harga = c.id_harga)
                WHERE a.id_order = '$id'";
            $iklan = AFhelper::dbSelectOne($sql);

            $tanggal2 = date('Y-m-d');
            $expired = date('Y-m-d', strtotime("+".$iklan->periode." day"));

            $sql = "INSERT INTO tb_iklan(posisi, sub_posisi, jenis_layout, customer, tanggal, expired, gambar, url, visibility) 
                VALUES ('$iklan->posisi', '$iklan->sub_posisi', '$iklan->jenis_layout', '$iklan->id_user', '$tanggal2', '$expired', '', '', '0')";
            $hasil = AFhelper::dbSaveReturnID($sql);
            if ($hasil <> 0 && $hasil <> '') {
                $sql2 = "UPDATE tb_iklan_order SET id_iklan = '$hasil' WHERE id_order = '$id'; ";
                $sql2 .= "UPDATE tb_iklan_posisi SET status_$iklan->layout = 'release' WHERE id_posisi = '$iklan->id_posisi'; ";
                $data = array("tanggal" =>  date('Y-m-d H:i:s'), "judul" => "iklan", "id" => $hasil);
		        AFhelper::setFirebase("laporan/4", $data);
                AFhelper::dbSaveMulti($sql2, null);
            }
        }
    }
}

?>