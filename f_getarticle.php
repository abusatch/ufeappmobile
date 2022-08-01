<?php

require_once "helper.php";

$hasil = array();

$sql = "SELECT * from user where idUser = '56'";
$user = AFhelper::dbSelectOne($sql);
$a = array(
"id_template" => $user->idUser,
"id_member" => $user->idUser,
"judul" => $user->first_name." ".$user->second_name,
"deskripsi" => $user->deskripsi,
"gambar" => "https://ufe-section-indonesie.org/ufeapp/images/propic/".$user->propic,
"tanggal" => $user->deskripsi,
);
array_push($hasil, $a);

$sql_get_data = "SELECT a.*, b.username, b.first_name, b.second_name, b.propic
  FROM tb_template a
  JOIN user b ON(a.id_member_vip = b.idUser)
  WHERE a.visibility = '1' AND a.keterangan = 'release' AND a.id_member_vip = '56' ORDER BY a.id_template DESC limit 3";

$data = AFhelper::dbSelectAll($sql_get_data);

foreach ($data as $row) {
  $tgl = explode("-", $row->tanggal);
  $propic = $row->propic ? "https://ufe-section-indonesie.org/ufeapp/images/propic/".$row->propic : '';
  $a = array(
    "id_template" => $row->id_template,
    "id_member" => $row->id_member_vip,
    "judul" => AFhelper::formatText($row->judul),
    "deskripsi" => AFhelper::formatText($row->deskripsi),
    "gambar" => "https://ufe-section-indonesie.org/ufeapp/images/actualite/".$row->gambar,
    "tanggal" => $tgl[2]."/".$tgl[1]."/".$tgl[0],
    "tanggal2" => $row->tanggal2,
    "url" => $row->linkweb,
    "email" => $row->username,
    "urutan" => $urutan,
    "keterangan" =>  AFhelper::formatText($row->keterangan),
    "first_name" => $row->first_name,
    "second_name" => $row->second_name,
    "propic" => $propic,
  );
  array_push($hasil, $a);
  $urutan++;
}
  
AFhelper::kirimJson($hasil);

?>