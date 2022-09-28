<?php

require_once "helper.php";

$mode = $_GET['mode'];

$reading = new ReadingIklan();
switch ($mode) {
    case 'lihat':
        $reading->lihat();
        break;
    default:
        $reading->lihat();
        break;
}

class ReadingIklan
{

  function lihat() {
    $posisi = $_GET['posisi'];
    $sql = "SELECT a.id_iklan, a.posisi, a.sub_posisi, a.customer, a.tanggal, a.expired, a.gambar, a.url, a.visibility 
        FROM tb_iklan a
        WHERE a.visibility = '1' AND a.posisi = '$posisi'";
    $data = AFhelper::dbSelectAll($sql);
    $hasil = array();
    foreach ($data as $row) {
        $gambar = $row->gambar ? "https://ufe-section-indonesie.org/ufeapp/images/iklan/".$row->gambar : '';
        $a = array(
            "id_iklan" => $row->id_iklan,
            "sub_posisi" => $row->sub_posisi,
            "gambar" => $gambar,
            "url" => $row->url,
        );
        array_push($hasil, $a);
    }
    AFhelper::kirimJson($hasil);
  }

}


?>