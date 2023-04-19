<?php

require_once "helper.php";

$country_id = AFhelper::countryID();
$image = $_POST['image'];
$judul = $_POST['judul'];
$deskripsi = $_POST['name'];
$linkweb = $_POST['linkweb'];
$email = $_POST['email'];
$id_advert = $_POST['id_advert'];
$kategori = $_POST['kategori'];

date_default_timezone_set('Asia/Jakarta');
$tanggal = date('Y-m-d');
$tanggal2 = date('Y-m-d H:i:s');

if (empty($deskripsi)) {
    AFhelper::kirimJson(null, "la description ne peut pas être vide", 0);
} else {
    $sql = "SELECT * from user where username = '$email'";
    $user = AFhelper::dbSelectOne($sql);
    $idUser = $user->idUser;
    
    $path = $email.substr(date('YmdHis'),0,-1).".png";
    $path2 = "images/advert/".$path;
    
    if($id_advert == "") {
        if (!$_FILES['image']['tmp_name']) {
            AFhelper::kirimJson(null, "photo ne peut pas être vide", 0);
        } else {
            $tmp_name = $_FILES['image']['tmp_name'];
            $inputimage = move_uploaded_file($tmp_name,$path2);
            if($inputimage) {
                $sql = "INSERT INTO tb_advert (
                    id_category, judul, deskripsi, id_member,
                    gambar, linkweb, tanggal,
                    tanggal2, tanggal_edit2, user_edit,
                    keterangan, visibility, long_textt, country_id) VALUES (
                    '$kategori', '$judul', '$deskripsi', '$idUser',
                    '$path', '$linkweb', '$tanggal',
                    '$tanggal2', '', '$idUser',
                    'pending', '1', '$image', '$country_id')";
                $hasil = AFhelper::dbSaveCek($sql);
                if($hasil[0]) {
                    AFhelper::kirimJson(null, "Téléchargement réussi..");         
                } else {
                    AFhelper::kirimJson(null, "une erreur de connexion s'est produite ".$hasil[1], 0); 
                }
            } else {
                AFhelper::kirimJson(null, "une erreur de connexion s'est produite", 0); 
            }
        }	
    } else {
        if (!$_FILES['image']['tmp_name']) {
            $sql = "UPDATE tb_advert set id_category = '$kategori', judul = '$judul', deskripsi = '$deskripsi', linkweb = '$linkweb', 
                tanggal_edit = '$tanggal', tanggal_edit2 = '$tanggal2', user_edit = '$idUser', 
                keterangan = 'pending' where id_advert = '$id_advert'";
            AFhelper::dbSave($sql, null, "Données enregistrées avec succès");
        } else {
            $tmp_name = $_FILES['image']['tmp_name'];
            $inputimage = move_uploaded_file($tmp_name,$path2);
            $sql = "UPDATE tb_advert set id_category = '$kategori', judul = '$judul', deskripsi = '$deskripsi', linkweb = '$linkweb', 
                tanggal_edit = '$tanggal', tanggal_edit2 = '$tanggal2', user_edit = '$idUser', 
                keterangan = 'pending', gambar = '$path'  where id_advert = '$id_advert'"; 
            AFhelper::dbSave($sql, null, "Données enregistrées avec succès");
        }
    }
}

?>