<?php

require_once "helper.php";

$email = $_GET['email'];
$halaman = $_GET['halaman'];
$jenis = $_GET['jenis'];

$result = array();

if(!empty($email)) {
  $sql = "SELECT * from user where username = '$email'";
  $user = AFhelper::dbSelectOne($sql);
  $idUser = $user->idUser;

  if(empty($halaman) || $halaman == "") {
    $urutan = 1;
    if($jenis == "pending") {
      $sql_get_data = "SELECT * FROM tb_advert where id_member = '$idUser' and keterangan = 'pending' and visibility = '1'  ORDER BY id_advert DESC limit 5";
    } else {
      $sql_get_data = "SELECT * FROM tb_advert where id_member = '$idUser' and keterangan = 'release' and visibility = '1' ORDER BY id_advert DESC limit 5";
    }
  } else {
    $urutan = (5 * $halaman )+1;
    $offset = $halaman * 5;
    if($jenis == "pending"){
      $sql_get_data = "SELECT * FROM tb_advert where id_member = '$idUser' and keterangan = 'pending' and visibility = '1' ORDER BY id_advert DESC limit 5 offset $offset";
    } else {
      $sql_get_data = "SELECT * FROM tb_advert where id_member = '$idUser' and keterangan = 'release' and visibility = '1' ORDER BY id_advert DESC limit 5 offset $offset";
    }   
  }
  
  $data = AFhelper::dbSelectAll($sql_get_data);
  $hasil = array();
  if(count($data) == 0) {
    $a = array(
      "id_actualite" => "empty",
      "id_member" => "empty",
      "judul" => "empty",
      "deskripsi" => "empty",
      "gambar" => "empty",
      "tanggal" => "empty",
      "tanggal2" => "empty",
      "url" => "empty",
      "email" => "empty",
      "urutan" => 0,
      "keterangan" => "empty"
    );
    array_push($hasil, $a);
  } else {
    foreach ($data as $row) {
      $desk1 = str_replace('\n',"-enter-",$row->deskripsi);
      $desk2 = str_replace("'","`",$desk1);
      $desk3 = str_replace('"',"-petikdua-",$desk2);
      $desk4 = str_replace(str_split('\\/:*?"<>|'), ' ', $desk3);
      $desk5 = trim(preg_replace('/\s\s+/', ' ', $desk4));
      $desk6 = str_replace("<br>","-enter-",$desk5);
      $desk7 = str_replace(".","-titik-",$desk6);
      $desk8 = nl2br($desk7);
      $desk9 = preg_replace("/\r\n|\r|\n/", '-enter-', $desk8);
      $desk10 = str_replace(array("\r\n","\r","\n","\\r","\\n","\\r\\n"),"-enter-",$desk9);

      $deskx1 = str_replace('\n',"-enter-",$row->keterangan);
      $deskx2 = str_replace("'","`",$deskx1);
      $deskx3 = str_replace('"',"-petikdua-",$deskx2);
      $deskx4 = str_replace(str_split('\\/:*?"<>|'), ' ', $deskx3);
      $deskx5 = trim(preg_replace('/\s\s+/', ' ', $deskx4));
      $deskx6 = str_replace("<br>","-enter-",$deskx5);
      $deskx7 = str_replace(".","-titik-",$deskx6);
      $deskx8 = str_replace("-","-",$deskx7);
      $deskx9 = str_replace("!","-tandaseru-",$deskx8);
      $deskx10 = str_replace("’"," ",$deskx9);
      $deskx11 = str_replace("é","-ekanan-",$deskx10);
      $deskx12 = str_replace("à","-akiri-",$deskx11);
      $deskx13 = str_replace("è","-ekiri-",$deskx12);
  
      $deskk1 = str_replace('\n',"-enter-",$row->judul);
      $deskk2 = str_replace("'","`",$deskk1);
      $deskk3 = str_replace('"',"-petikdua-",$deskk2);
      $deskk4 = str_replace(str_split('\\/:*?"<>|'), ' ', $deskk3);
      $deskk5 = trim(preg_replace('/\s\s+/', ' ', $deskk4));
      $deskk6 = str_replace("<br>","-enter-",$deskk5);
      $deskk7 = str_replace(".","-titik-",$deskk6);
      $deskk8 = str_replace("-","-",$deskk7);
      $deskk9 = str_replace("!","-tandaseru-",$deskk8);
      $deskk10 = str_replace("’"," ",$deskk9);
      $deskk11 = str_replace("é","-ekanan-",$deskk10);
      $deskk12 = str_replace("à","-akiri-",$deskk11);
      $deskk13 = str_replace("è","-ekiri-",$deskk12);

      $a = array(
        "id_actualite" => $row->id_advert,
        "id_member" => $row->id_member,
        "judul" => $deskk13,
        "deskripsi" => substr($desk10,0,100),
        "gambar" => "https://ufe-section-indonesie.org/ufeapp/images/advert/".$row->gambar,
        "tanggal" => $row->tanggal,
        "tanggal2" => $row->tanggal2,
        "url" => $row->linkweb,
        "email" => $email,
        "urutan" => $urutan,
        "keterangan" =>  $deskx13
      );
      array_push($hasil, $a);
      $urutan++;
    }
  }
  AFhelper::kirimJson($hasil);
} else {
  AFhelper::kirimJson(null, 'Email tidak boleh kosong', 0);
}

?>