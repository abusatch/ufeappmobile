<?php

require_once "helper.php";

$mode = $_GET['mode'];

$reading = new ReadingActualite();
switch ($mode) {
    case 'lihat':
        $reading->lihat();
        break;
    case 'kategori':
        $reading->kategori();
        break;
    default:
      $reading->lihat();
      break;
}

class ReadingActualite
{
  function kategori() {
    $sql = "SELECT id_kategori, nama_kategori 
      FROM tb_kategori_artikel 
      ORDER BY nama_kategori";

    $data = AFhelper::dbSelectAll($sql);
    $hasil = array();

    $a = array(
      "id" => "all",
      "nama" => "All",
    );
    array_push($hasil, $a);
    
    foreach ($data as $row) {
      $a = array(
        "id" => $row->id_kategori,
        "nama" => $row->nama_kategori,
      );
      array_push($hasil, $a);
    }
      
    AFhelper::kirimJson($hasil);
  }

  function lihat() {
    $halaman = $_GET['halaman'];
    $kategori = $_GET['kategori'];
    $id_actualite = $_GET['id_actualite'];

    $where = "";

    if(!empty($kategori) && $kategori != "all") {
      $where .= " AND a.id_kate = '$kategori'";
    }

    if(!empty($id_actualite)) {
      $where = " AND a.id_actualite = '$id_actualite'";
    }

    if(empty($halaman)) {
      $halaman = 0;  
    }

    $offset = " offset $halaman";

    $sql = "SELECT a.id_actualite, a.id_member, a.id_kate, a.id_kate2, a.judul, a.deskripsi, a.gambar, 
        a.tanggal, a.tanggal2, a.url, a.keterangan, a.tanggal_edit, a.tanggal_edit2, a.user_edit, a.visibility, 
        CASE WHEN a.id_kate2 = 2 THEN 'fr' ELSE 'id' END AS jenis, b.nama_kategori
      FROM tb_actualite a
      JOIN tb_kategori_artikel b ON(a.id_kate = b.id_kategori) 
      where a.visibility = '1' $where 
      ORDER BY a.tanggal DESC LIMIT 10 $offset";

    $data = AFhelper::dbSelectAll($sql);
    $hasil = array();

    foreach ($data as $row) {
      $tgl = explode("-", $row->tanggal);
      $a = array(
        "id" => $row->id_actualite,
        "jenis" => $row->jenis,
        "kategori" => $row->nama_kategori,
        "judul" => AFhelper::formatText($row->judul),
        "deskripsi" => AFhelper::formatText($row->deskripsi),
        "gambar" => "https://ufe-section-indonesie.org/ufeapp/images/actualite/".$row->gambar,
        "tanggal" => $tgl[2]."/".$tgl[1]."/".$tgl[0],
        "url" => $row->url,
      );
      array_push($hasil, $a);
    }
      
    AFhelper::kirimJson($hasil);
  }

}


?>