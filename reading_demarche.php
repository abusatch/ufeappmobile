<?php

require_once "helper.php";

$mode = $_GET['mode'];

$reading = new ReadingDemarche();
switch ($mode) {
    case 'menu':
      $reading->menu();
      break;
    case 'demar2':
      $reading->demar2();
      break;
    case 'demar3':
      $reading->demar3();
      break;
    default:
      echo "Mode Not Found";
      break;
}

class ReadingDemarche
{
  function menu() {
    $id = $_GET['id'];
    $where = "";
    if(!empty($id)) {
      $where = "AND id_menu = '$id'";
    }

    $sql = "SELECT id_menu, id_kategori, jenis, nama_menu, short_desc, long_desc, gambar, gambar2, gambar3, bg, bg2, ket, 
      tanggal, tanggal2, linkweb, id_kate, menu_bg, menu_drop1, menu_drop2, sort 
    FROM tb_menu
    WHERE jenis = 'DEMARCHES' $where 
    ORDER BY sort";

    $data = AFhelper::dbSelectAll($sql);
    $hasil = array();
    
    foreach ($data as $row) {
      $gambar = $row->gambar2 ? "https://ufe-section-indonesie.org/ufeapp/images/menu/".$row->gambar2 : '';
      $a = array(
        "id_menu" => $row->id_menu,
        "menu_bg" => $row->menu_bg,
        "menu_drop" => $row->menu_drop1,
        "gambar" => $gambar,
        "judul" => $row->nama_menu,
      );
      array_push($hasil, $a);
    }
      
    AFhelper::kirimJson($hasil);
  }

  function demar2() {
    $id = $_GET['id'];
    
    $where = "AND id_kategori = '$_GET[kategori]'";

    if(!empty($id)) {
      $where = "AND id_demar = '$id'";
    }

    $sql = "SELECT id_demar, id_kategori, judul, judul2, short_desc, long_desc, gambar, bg, visibility 
      FROM tb_demar2 
      WHERE visibility = '1' $where
      ORDER BY id_kategori";

    $data = AFhelper::dbSelectAll($sql);
    $hasil = array();
    
    foreach ($data as $row) {
      $gambar = $row->gambar ? "https://ufe-section-indonesie.org/ufeapp/images/menu/".$row->gambar : '';
      $a = array(
        "id_demar" => $row->id_demar,
        "judul" => $row->judul,
        "short_desc" => $row->short_desc,
        "long_desc" => $row->long_desc,
        "gambar" => $gambar,
      );
      array_push($hasil, $a);
    }
      
    AFhelper::kirimJson($hasil);
  }

  function demar3() {
    $id = $_GET['id'];
    
    $where = "AND id_kategori = '$_GET[kategori]'";
    
    if(!empty($id)) {
      $where = "AND id_demar = '$id'";
    }

    $sql = "SELECT id_demar, id_kategori, judul, judul2, short_desc, long_desc, gambar, visibility, ket2
    FROM tb_demar3 
    WHERE visibility = '1' $where";

    $data = AFhelper::dbSelectAll($sql);
    $hasil = array();
    
    foreach ($data as $row) {
      $a = array(
        "id_demar" => $row->id_demar,
        "judul" => $row->judul,
        "short_desc" => $row->short_desc,
        "long_desc" => $row->long_desc,
        "gambar" =>  $row->gambar,
      );
      array_push($hasil, $a);
    }
      
    AFhelper::kirimJson($hasil);
  }

}


?>