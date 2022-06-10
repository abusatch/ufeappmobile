<?php

require_once "helper.php";

$image = $_POST['image'];
$judul = $_POST['judul'];
$deskripsi = $_POST['name'];
$linkweb = $_POST['linkweb'];
$email = $_POST['email'];
$idAdvert = $_POST['id_advert'];

date_default_timezone_set('Asia/Jakarta');
$tanggal = date('Y-m-d');
$tanggal2 = date('Y-m-d H:i:s');

if (empty($deskripsi)) {
    AFhelper::kirimJson(null, "Deskripsi tidak boleh kosong", 0);
} else {
    $sql = "SELECT * from user where username = '$email'";
    $user = AFhelper::dbSelectOne($sql);
    $idUser = $user->idUser;
    
    $path = $email.substr(date('YmdHis'),0,-1).".png";
    $path2 = "images/advert/".$path;
    
    if($id_advert == "") {
        if (!$_FILES['image']['tmp_name']) {
            AFhelper::kirimJson(null, "Gambar tidak boleh kosong", 0);
        } else {
            $tmp_name = $_FILES['image']['tmp_name'];
            $inputimage = move_uploaded_file($tmp_name,$path2);
            if($inputimage) {
                $sql = "INSERT INTO tb_advert (
                    judul, deskripsi, id_member,
                    gambar, linkweb, tanggal,
                    tanggal2, tanggal_edit2, user_edit,
                    keterangan, visibility, long_textt) VALUES (
                    '$judul', '$deskripsi', '$idUser',
                    '$path', '$linkweb', '$tanggal',
                    '$tanggal2', '', '$idUser',
                    'pending', '1', '$image')";
                $hasil = AFhelper::dbSaveCek($sql);
                if($hasil[0]) {
                    $isipesan = "Thank You. Iklan akan segera di publish";
                    $sql2 = "INSERT INTO tb_notifikasi (
                        judul, isi, kepada,
                        dibaca, dihapus, tanggal,tanggal2) values (
                        'Confirmation d’attente', '$isipesan', '$idUser',
                        '-','-','$tanggal','$tanggal2')";
                    $hasil2 = AFhelper::dbSaveCek($sql2);
                    if($hasil2[0]) {
                        AFhelper::kirimJson(null, 'Téléchargement réussi');
                    } else {
                        AFhelper::kirimJson(null, 'Téléchargement réussi..');
                    }         
                } else {
                    AFhelper::kirimJson(null, 'Connection problem, please try again '.$hasil[1], 0); 
                }
            } else {
                AFhelper::kirimJson(null, "Connection problem, please try again, can't save image", 0); 
            }
        }	
    } else {
        if (!$_FILES['image']['tmp_name']) {
            $sql = "UPDATE tb_advert set judul = '$judul', deskripsi = '$deskripsi', linkweb = '$linkweb', 
                tanggal_edit = '$tanggal', tanggal_edit2 = '$tanggal2', user_edit = '$idUser', 
                keterangan = 'pending' where id_advert = '$id_advert'";
            AFhelper::dbSave($sql, null, 'Data berhasil di ubah');
        } else {
            $tmp_name = $_FILES['image']['tmp_name'];
            $inputimage = move_uploaded_file($tmp_name,$path2);
            $sql = "UPDATE tb_advert set judul = '$judul', deskripsi = '$deskripsi', linkweb = '$linkweb', 
                tanggal_edit = '$tanggal', tanggal_edit2 = '$tanggal2', user_edit = '$idUser', 
                gambar = '$path'  where id_advert = '$id_advert'"; 
            AFhelper::dbSave($sql, null, 'Data berhasil di ubah 2');
        }
    }
}

?>