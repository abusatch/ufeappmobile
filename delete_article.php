<?php

require_once "helper.php";
$username2 = $_POST['username2'];
$pss2 = $_POST['pss2'];
$id_template = $_POST['id_template'];

if(!empty($username2)){
    $sql = "SELECT * from user where username = '$username2' and password = '$pss2'";
    $user = AFhelper::dbSelectOne($sql);
    $idUser = $user->idUser;
    if($idUser) {
        $sqlUpdate = "UPDATE tb_template set visibility = '0' where id_template = '$id_template'";
        AFhelper::dbSave($sqlUpdate, null, 'Data berhasil di hapus');
    } else {
        AFhelper::kirimJson(null, 'autentifikasi username tidak cocok', 0);
    }
} else {
    AFhelper::kirimJson(null, 'username tidak boleh kosong', 0);
}
	
?>