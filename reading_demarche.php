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
    case 'searchdemar':
      $reading->searchdemar();
      break;
    case 'searchagent':
      $reading->searchagent();
      break;
    case 'searching':
      $reading->searching();
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
      $where = "AND a.id_menu = '$id'";
    }

    $sql = "SELECT a.id_menu, a.id_kategori, a.jenis, a.nama_menu, a.short_desc, a.long_desc, a.gambar, a.gambar2, a.gambar3, a.bg, a.bg2, a.ket, 
      a.tanggal, a.tanggal2, a.linkweb, a.id_kate, a.menu_bg, a.menu_drop1, a.menu_drop2, a.sort, a.warna 
    FROM tb_menu a
    WHERE a.jenis = 'DEMARCHES' $where 
    ORDER BY a.sort";

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
        "warna" => $row->warna,
      );
      array_push($hasil, $a);
    }
      
    AFhelper::kirimJson($hasil);
  }

  function demar2() {
    $id = $_GET['id'];
    
    $where = "AND b.id_kategori = '$_GET[kategori]'";

    if(!empty($id)) {
      $where = "AND b.id_demar = '$id'";
    }

    $sql = "SELECT b.id_demar, b.id_kategori, b.judul, b.judul2, b.short_desc, b.long_desc, b.gambar, b.bg, b.visibility, b.searching,
        a.nama_menu, a.gambar2 AS gambar_kategori, a.warna
      FROM tb_demar2 b
      JOIN tb_menu a ON(b.id_kategori = a.id_menu) 
      WHERE b.visibility = '1' $where
      ORDER BY b.id_kategori";

    $data = AFhelper::dbSelectAll($sql);
    $hasil = array();
    
    foreach ($data as $row) {
      $gambar = $row->gambar ? "https://ufe-section-indonesie.org/ufeapp/images/menu/".$row->gambar : '';
      $gambar_kategori = $row->gambar_kategori ? "https://ufe-section-indonesie.org/ufeapp/images/menu/".$row->gambar_kategori : '';
      $a = array(
        "id_demar" => $row->id_demar,
        "judul" => $row->judul,
        "short_desc" => $row->short_desc,
        "long_desc" => $row->long_desc,
        "gambar" => $gambar,
        "id_kategori" => $row->id_kategori,
        "judul_kategori" => $row->nama_menu,
        "gambar_kategori" => $gambar_kategori,
        "warna" => $row->warna,  
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

  function searchdemar() {
    $sql = "SELECT b.id_demar, b.id_kategori, b.judul, b.judul2, b.short_desc, b.long_desc, b.gambar, b.bg, b.visibility, b.searching,
        a.nama_menu, a.gambar2 AS gambar_kategori, a.warna 
      FROM tb_demar2 b
      JOIN tb_menu a ON(b.id_kategori = a.id_menu) 
      WHERE b.visibility = '1' AND b.searching = '1'";

    $data = AFhelper::dbSelectAll($sql);
    $hasil = array();
    
    foreach ($data as $row) {
      $gambar = $row->gambar ? "https://ufe-section-indonesie.org/ufeapp/images/menu/".$row->gambar : '';
      $gambar_kategori = $row->gambar_kategori ? "https://ufe-section-indonesie.org/ufeapp/images/menu/".$row->gambar_kategori : '';
      $a = array(
        "id_demar" => $row->id_demar,
        "judul" => $row->judul,
        "short_desc" => $row->short_desc,
        "long_desc" => $row->long_desc,
        "gambar" => $gambar,
        "id_kategori" => $row->id_kategori,
        "judul_kategori" => $row->nama_menu,
        "gambar_kategori" => $gambar_kategori,
        "warna" => $row->warna,  
      );
      array_push($hasil, $a);
    }
      
    AFhelper::kirimJson($hasil);
  }

  function searchagent() {
    $sql = "SELECT a.id_agent, a.id_kategori, a.judul, a.judul2, a.short_desc, a.long_desc, a.gambar, a.gambar2, a.namaagent, a.gmaps, a.alamatagent, a.alamat2agent, 
            a.kotaagent, a.kodeposagent, a.telpagent, a.mobileagent, a.emailagent, a.webagent, a.fbagent, a.twiteragent, a.igagent, a.playstoreagent,
            a.rating1, a.rating2, a.rating3, a.visibility, b.judul AS judul_kategori, b.gambar AS gambar_kategori, c.id_menu, c.nama_menu AS judul_menu, c.gambar2 AS gambar_menu, c.warna
        FROM tb_agent a
        JOIN tb_demar2 b ON(a.id_kategori = b.id_demar)
        JOIN tb_menu c ON(b.id_kategori = c.id_menu)
        WHERE a.visibility = '1' AND a.searching = '1'";

    $data = AFhelper::dbSelectAll($sql);
    $hasil = array();

    foreach ($data as $row) {
        $logo = $row->gambar ? "https://ufe-section-indonesie.org/ufeapp/images/agent/".$row->gambar : '';
        $gambar = $row->gambar2 ? "https://ufe-section-indonesie.org/ufeapp/images/agent/".$row->gambar2 : '';
        $gambar_kategori = $row->gambar_kategori ? "https://ufe-section-indonesie.org/ufeapp/images/menu/".$row->gambar_kategori : '';
        $gambar_menu = $row->gambar_menu ? "https://ufe-section-indonesie.org/ufeapp/images/menu/".$row->gambar_menu : '';
        $kota = str_replace($row->kodeposagent, "", $row->kotaagent);
        $a = array(
        "id_agent" => $row->id_agent,
        "deskripsi" => AFhelper::formatText($row->long_desc),
        "nama" => $row->namaagent,
        "alamat" => AFhelper::formatText($row->alamatagent),
        "kota" => $kota,
        "kode_pos" => $row->kodeposagent,
        "gmaps" => $row->gmaps,
        "phone" => $row->telpagent,
        "mobile" => $row->mobileagent,
        "email" => $row->emailagent,
        "web" => $row->webagent,
        "facebook" => $row->fbagent,
        "twitter" => $row->twiteragent,
        "instagram" => $row->igagent,
        "playstore" => $row->playstoreagent,
        "logo" => $logo,
        "gambar" => $gambar,
        "rating1" => $row->rating1,
        "rating2" => $row->rating2,
        "rating3" => $row->rating3,
        "id_kategori" => $row->id_kategori,
        "judul_kategori" => $row->judul_kategori,
        "gambar_kategori" => $gambar_kategori,
        "id_menu" => $row->id_menu,
        "judul_menu" => $row->judul_menu,
        "gambar_menu" => $gambar_menu,
        "warna" => $row->warna,
        );
        array_push($hasil, $a);
    }
        
    AFhelper::kirimJson($hasil);
  }

  function searching() {
    $cari = strtolower($_POST['cari']);
    if(empty($cari)) {
      AFhelper::kirimJson(null, "word search cannot be empty", 0);
    } else {
      $sql = "SELECT b.id_demar, b.id_kategori, b.judul, b.judul2, b.short_desc, b.long_desc, b.gambar, b.bg, b.visibility, b.searching,
          a.nama_menu, a.gambar2 AS gambar_kategori, a.warna 
        FROM tb_demar2 b
        JOIN tb_menu a ON(b.id_kategori = a.id_menu) 
        WHERE b.visibility = '1' AND ( LOWER(b.judul) LIKE '%$cari%' OR LOWER(b.long_desc) LIKE '%$cari%' )";

      $data = AFhelper::dbSelectAll($sql);
      $hasil = array();
      
      foreach ($data as $row) {
        $gambar = $row->gambar ? "https://ufe-section-indonesie.org/ufeapp/images/menu/".$row->gambar : '';
        $gambar_kategori = $row->gambar_kategori ? "https://ufe-section-indonesie.org/ufeapp/images/menu/".$row->gambar_kategori : '';
        $a = array(
          "id_demar" => $row->id_demar,
          "judul" => $row->judul,
          "short_desc" => $row->short_desc,
          "long_desc" => $row->long_desc,
          "gambar" => $gambar,
          "id_kategori" => $row->id_kategori,
          "judul_kategori" => $row->nama_menu,
          "gambar_kategori" => $gambar_kategori,
          "warna" => $row->warna,  
        );
        array_push($hasil, $a);
      }

      $sql2 = "SELECT a.id_agent, a.id_kategori, a.judul, a.judul2, a.short_desc, a.long_desc, a.gambar, a.gambar2, a.namaagent, a.gmaps, a.alamatagent, a.alamat2agent, 
              a.kotaagent, a.kodeposagent, a.telpagent, a.mobileagent, a.emailagent, a.webagent, a.fbagent, a.twiteragent, a.igagent, a.playstoreagent,
              a.rating1, a.rating2, a.rating3, a.visibility, b.judul AS judul_kategori, b.gambar AS gambar_kategori, c.id_menu, c.nama_menu AS judul_menu, c.gambar2 AS gambar_menu, c.warna
          FROM tb_agent a
          JOIN tb_demar2 b ON(a.id_kategori = b.id_demar)
          JOIN tb_menu c ON(b.id_kategori = c.id_menu)
          WHERE a.visibility = '1' AND ( LOWER(a.long_desc) LIKE '%$cari%' OR LOWER(a.namaagent) LIKE '%$cari%' OR LOWER(a.alamatagent) LIKE '%$cari%' )";

      $data2 = AFhelper::dbSelectAll($sql2);
      $hasil2 = array();

      foreach ($data2 as $row2) {
        $logo = $row2->gambar ? "https://ufe-section-indonesie.org/ufeapp/images/agent/".$row2->gambar : '';
        $gambar = $row2->gambar2 ? "https://ufe-section-indonesie.org/ufeapp/images/agent/".$row2->gambar2 : '';
        $gambar_kategori = $row2->gambar_kategori ? "https://ufe-section-indonesie.org/ufeapp/images/menu/".$row2->gambar_kategori : '';
        $gambar_menu = $row2->gambar_menu ? "https://ufe-section-indonesie.org/ufeapp/images/menu/".$row2->gambar_menu : '';
        $kota = str_replace($row2->kodeposagent, "", $row2->kotaagent);
        $b = array(
        "id_agent" => $row2->id_agent,
        "deskripsi" => AFhelper::formatText($row2->long_desc),
        "nama" => $row2->namaagent,
        "alamat" => AFhelper::formatText($row2->alamatagent),
        "kota" => $kota,
        "kode_pos" => $row2->kodeposagent,
        "gmaps" => $row2->gmaps,
        "phone" => $row2->telpagent,
        "mobile" => $row2->mobileagent,
        "email" => $row2->emailagent,
        "web" => $row2->webagent,
        "facebook" => $row2->fbagent,
        "twitter" => $row2->twiteragent,
        "instagram" => $row2->igagent,
        "playstore" => $row2->playstoreagent,
        "logo" => $logo,
        "gambar" => $gambar,
        "rating1" => $row2->rating1,
        "rating2" => $row2->rating2,
        "rating3" => $row2->rating3,
        "id_kategori" => $row2->id_kategori,
        "judul_kategori" => $row2->judul_kategori,
        "gambar_kategori" => $gambar_kategori,
        "id_menu" => $row2->id_menu,
        "judul_menu" => $row2->judul_menu,
        "gambar_menu" => $gambar_menu,
        "warna" => $row->warna,
        );
        array_push($hasil2, $b);
      }
      $hasil3 = array(
        'demar' => $hasil, 
        'agent' => $hasil2
      );
      AFhelper::kirimJson($hasil3);
    }
  }
  
}


?>