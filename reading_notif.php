<?php

require_once "helper.php";

$mode = $_GET['mode'];

$reading = new ReadingNotif();
switch ($mode) {
    case 'lihat':
        $reading->lihat();
        break;
    case 'baca':
        $reading->baca();
        break;
    case 'hapus':
        $reading->hapus();
        break;
    case 'belumdibaca':
        $reading->belumdibaca();
        break;
    default:
        echo "Mode Not Found";
        break;
}

class ReadingNotif
{
  function lihat() {
    $email = $_GET['email'];
    $halaman = $_GET['halaman'];
    $id_notif = $_GET['id_notif'];

    $where = "";

    if(!empty($email)) {
        $sql = "SELECT * from user where username = '$email'";
        $user = AFhelper::dbSelectOne($sql);
        $idUser = $user->idUser;
    }

    if(!empty($id_notif)) {
        $where = " AND a.id_notif = '$id_notif'";
    }

    if(empty($halaman)) {
        $halaman = 0;  
    }

    $offset = " offset $halaman";
    $dibaca = "-".$idUser."-";

    $sql = "SELECT a.id_notif, a.kategori, a.judul, a.isi, a.keterangan, a.tanggal, a.gambar, a.data, a.kepada, a.dibaca, a.dihapus 
        FROM tb_notification a
        WHERE 1=1 AND a.dihapus NOT LIKE '%$dibaca%' AND (a.kepada = 'all' OR a.kepada = '$idUser') $where 
        ORDER BY a.id_notif DESC limit 15 $offset";

    $data = AFhelper::dbSelectAll($sql, 'Get Notification');
    
    AFhelper::kirimJson($data);  
  }

  function baca() {
    $email = $_GET['email'];
    $id_notif = $_GET['id_notif'];

    if(!empty($email)) {
        $sql = "SELECT * from user where username = '$email'";
        $user = AFhelper::dbSelectOne($sql);
        $idUser = $user->idUser;
    }
    $dibaca = "-".$idUser."-";

    $sql = "SELECT * 
        FROM tb_notification
        WHERE id_notif = '$id_notif' AND dibaca LIKE '%$dibaca%'";
    $data = AFhelper::dbSelectOne($sql);
    if($data) {
        AFhelper::kirimJson($data);
    } else {
        $nilai = $idUser."-";
        $sql = "UPDATE tb_notification SET dibaca = CONCAT(dibaca,'$nilai') WHERE id_notif = '$id_notif'";
        AFhelper::dbSave($sql, null, "Données enregistrées avec succès");
    }  
  }

  function hapus() {
    $email = $_GET['email'];
    $id_notif = $_GET['id_notif'];

    if(!empty($email)) {
        $sql = "SELECT * from user where username = '$email'";
        $user = AFhelper::dbSelectOne($sql);
        $idUser = $user->idUser;
    }

    $sql = "SELECT * 
        FROM tb_notification
        WHERE id_notif = '$id_notif' AND kepada = '$idUser'";
    $data = AFhelper::dbSelectOne($sql);
    if($data) {
        $sql = "DELETE FROM tb_notification WHERE id_notif = '$id_notif'";
        AFhelper::dbSave($sql, null, "Données enregistrées avec succès");
    } else {
        $nilai = $idUser."-";
        $sql = "UPDATE tb_notification SET dihapus = CONCAT(dihapus,'$nilai') WHERE id_notif = '$id_notif'";
        AFhelper::dbSave($sql, null, "Données enregistrées avec succès");
    }  
  }

  function belumdibaca() {
    $email = $_GET['email'];

    if(!empty($email)) {
        $sql = "SELECT * from user where username = '$email'";
        $user = AFhelper::dbSelectOne($sql);
        $idUser = $user->idUser;
    }
    $useridstrip = "-".$idUser."-";

    $sql = "SELECT count(*) AS jumlah
        FROM tb_notification
        WHERE dihapus NOT LIKE '%$useridstrip%' AND dibaca NOT LIKE '%$useridstrip%' AND (kepada = 'all' OR kepada = '$idUser')";
    $data = AFhelper::dbSelectOne($sql);
    AFhelper::kirimJson($data);  
  }
  
}

?>