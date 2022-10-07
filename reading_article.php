<?php

require_once "helper.php";

$email = $_GET['email'];
$halaman = $_GET['halaman'];
$jenis = $_GET['jenis'];
$id_template = $_GET['id_template'];

$where = "";

if(!empty($email)) {
  $sql = "SELECT * from user where username = '$email'";
  $user = AFhelper::dbSelectOne($sql);
  $idUser = $user->idUser;
  $where .= " AND a.id_member_vip = '$idUser'";
}

if($jenis == "all") {
  $where .= "";
} else if($jenis == "pending") {
  $where .= " AND a.keterangan = 'pending'";
} else {
  $where .= " AND a.keterangan = 'release'";
}

if(!empty($id_template)) {
  $where = " AND a.id_template = '$id_template'";
}

if(empty($halaman)) {
  $halaman = 0;  
}

$urutan = $halaman + 1;
$offset = " offset $halaman";

$sql_get_data = "SELECT a.*, b.username, b.first_name, b.second_name, b.propic
  FROM tb_template a
  JOIN user b ON(a.id_member_vip = b.idUser)
  WHERE a.visibility = '1' $where ORDER BY a.id_template DESC limit 10 $offset";

$data = AFhelper::dbSelectAll($sql_get_data);
$hasil = array();

foreach ($data as $row) {
  $tgl = explode("-", $row->tanggal);
  $propic = $row->propic ? "https://ufe-section-indonesie.org/ufeapp/images/propic/".$row->propic : '';
  $a = array(
    "id_advert" => $row->id_template,
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