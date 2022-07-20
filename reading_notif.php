<?php

require_once "helper.php";

$mode = $_GET['mode'];

$reading = new ReadingNotif();
switch ($mode) {
    case 'lihat':
      $reading->lihat();
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
  
}

?>