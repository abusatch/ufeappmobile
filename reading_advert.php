<?php

require_once "helper.php";

$email = $_GET['email'];
$halaman = $_GET['halaman'];
$jenis = $_GET['jenis'];
$kategori = $_GET['kategori'];
$id_advert = $_GET['id_advert'];

$where = "";
$offset = "";

if(!empty($email)) {
  $sql = "SELECT * from user where username = '$email'";
  $user = AFhelper::dbSelectOne($sql);
  $idUser = $user->idUser;
  $where .= " AND id_member = '$idUser'";
}

if($jenis == "pending") {
  $where .= " AND a.keterangan = 'pending'";
} else {
  $where .= " AND a.keterangan = 'release'";
}

if(!empty($kategori) && $kategori != "all") {
  $where .= " AND a.id_category = '$kategori'";
}

if(!empty($id_advert)) {
  $where = " AND id_advert = '$id_advert'";
}

if(!empty($halaman)) {
  $urutan = (5 * $halaman )+1;
  $jmloffset = $halaman * 5;
  $offset = " offset $jmloffset";
} else {
  $urutan = 1;
}

$sql_get_data = "SELECT a.*, b.username, b.first_name, b.second_name
  FROM tb_advert a
  JOIN user b ON(a.id_member = b.idUser) 
  where a.visibility = '1' $where ORDER BY a.id_advert DESC limit 5 $offset";

$data = AFhelper::dbSelectAll($sql_get_data);
$hasil = array();

if(count($data) == 0) {
  $a = array(
    "id_advert" => "empty",
    "id_member" => "empty",
    "id_category" => "empty",
    "judul" => "empty",
    "deskripsi" => "empty",
    "gambar" => "empty",
    "tanggal" => "empty",
    "tanggal2" => "empty",
    "url" => "empty",
    "email" => "empty",
    "urutan" => 0,
    "keterangan" => "empty",
    "first_name" => "empty",
    "second_name" => "empty"
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
      "id_advert" => $row->id_advert,
      "id_member" => $row->id_member,
      "id_category" => $row->id_category,
      "judul" => $deskk13,
      "deskripsi" => substr($desk10,0,100),
      "gambar" => "https://ufe-section-indonesie.org/ufeapp/images/advert/".$row->gambar,
      "tanggal" => $row->tanggal,
      "tanggal2" => $row->tanggal2,
      "url" => $row->linkweb,
      "email" => $row->username,
      "urutan" => $urutan,
      "keterangan" =>  $deskx13,
      "first_name" => $row->first_name,
      "second_name" => $row->second_name
    );
    array_push($hasil, $a);
    $urutan++;
  }
}
  
AFhelper::kirimJson($hasil, $sql_get_data);

?>