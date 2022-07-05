<?php

require_once "helper.php";

$email = $_GET['email'];
$halaman = $_GET['halaman'];
$jenis = $_GET['jenis'];
$kategori = $_GET['kategori'];
$id_advert = $_GET['id_advert'];

$where = "";

if(!empty($email)) {
  $sql = "SELECT * from user where username = '$email'";
  $user = AFhelper::dbSelectOne($sql);
  $idUser = $user->idUser;
  $where .= " AND a.id_member = '$idUser'";
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
  $where = " AND a.id_advert = '$id_advert'";
}

if(empty($halaman)) {
  $halaman = 0;  
}

$urutan = $halaman + 1;
$offset = " offset $halaman";

$sql_get_data = "SELECT a.*, b.username, b.first_name, b.second_name, b.propic, COALESCE(c.jumlah_view,0) AS jumlah_view
  FROM tb_advert a
  JOIN user b ON(a.id_member = b.idUser)
  LEFT JOIN (
    SELECT id_advert, COUNT(*) AS jumlah_view FROM tb_advert_view GROUP BY id_advert
  ) c ON(a.id_advert = c.id_advert)
  WHERE a.visibility = '1' $where ORDER BY a.id_advert DESC limit 10 $offset";

$data = AFhelper::dbSelectAll($sql_get_data);
$hasil = array();

foreach ($data as $row) {
  $tgl = explode("-", $row->tanggal);
  $propic = $row->propic ? "https://ufe-section-indonesie.org/ufeapp/images/propic/".$row->propic : '';
  $a = array(
    "id_advert" => $row->id_advert,
    "id_member" => $row->id_member,
    "id_category" => $row->id_category,
    "judul" => AFhelper::formatText($row->judul),
    "deskripsi" => AFhelper::formatText($row->deskripsi),
    "gambar" => "https://ufe-section-indonesie.org/ufeapp/images/advert/".$row->gambar,
    "tanggal" => $tgl[2]."/".$tgl[1]."/".$tgl[0],
    "tanggal2" => $row->tanggal2,
    "url" => $row->linkweb,
    "email" => $row->username,
    "urutan" => $urutan,
    "keterangan" =>  AFhelper::formatText($row->keterangan),
    "first_name" => $row->first_name,
    "second_name" => $row->second_name,
    "propic" => $propic,
    "jumlah_view" => $row->jumlah_view,
  );
  array_push($hasil, $a);
  $urutan++;
}
  
AFhelper::kirimJson($hasil);

?>