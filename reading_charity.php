<?php

require_once "helper.php";

$mode = $_GET['mode'];

$reading = new ReadingCharity();
switch ($mode) {
    case 'lihat':
        $reading->lihat();
        break;
    case 'jumlahagent':
        $reading->jumlahAgent();
        break;
    default:
      $reading->lihat();
      break;
}

class ReadingCharity
{

  function lihat() {
    $id_agent = $_GET['id_agent'];
    $is_ufe = $_GET['is_ufe'];
    $halaman = $_GET['halaman'];
    $limit = $_GET['limit'];
    
    $where = "";
    
    if(!empty($is_ufe)) {
        if($is_ufe == 'Y') {
            $where .= "AND b.judul = 'ufe'";    
        } else {
            $where .= "AND b.judul IS NULL";
        }
        
    }
    
    if(!empty($id_agent)) {
        $where = "AND a.id_agent = '$id_agent'";
    }

    if(empty($halaman)) {
      $halaman = 0;  
    }

    $offset = " offset $halaman";

    if(empty($limit)) {
      $limit = 10;  
    }

    $sql = "SELECT b.judul AS logo, a.id_agent, a.id_kategori, a.id_subkategori, a.judul, a.judul2, a.short_desc, a.long_desc, a.gambar, a.gambar2, a.namaagent, a.gmaps, a.alamatagent, a.alamat2agent, 
            a.kotaagent, a.kodeposagent, a.telpagent, a.mobileagent, a.emailagent, a.webagent, a.fbagent, a.twiteragent, a.igagent, a.waagent, a.telegramagent, a.linkedagent, a.youtubeagent, a.appstoreagent, a.playstoreagent,
            a.rating1, a.rating2, a.rating3, a.visibility
        FROM tb_agent a
        LEFT JOIN tb_demar_subkategori b ON(a.id_subkategori = b.id_subkategori)
        WHERE a.visibility = '1' AND a.id_kategori = '99' $where
        ORDER BY a.topsort DESC, a.sorting, a.rating1 DESC, a.rating2 DESC, a.rating3 DESC, a.namaagent, a.id_agent LIMIT $limit $offset";

    $data = AFhelper::dbSelectAll($sql);
    $hasil = array();

    foreach ($data as $row) {
        $gambar = $row->gambar2 ? "https://ufe-section-indonesie.org/ufeapp/images/agent/".$row->gambar2 : '';
        $whatsapp = $row->waagent ? "https://api.whatsapp.com/send?phone=".preg_replace("/[^0-9]/", "", $row->waagent) : '';
        $kota = str_replace($row->kodeposagent, "", $row->kotaagent);
        $a = array(
        "id_agent" => $row->id_agent,
        "deskripsi" => AFhelper::formatTextHTML($row->long_desc),
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
        "whatsapp" => $whatsapp, 
        "telegram" => $row->telegramagent, 
        "linkedin" => $row->linkedagent, 
        "youtube" => $row->youtubeagent, 
        "appstore" => $row->appstoreagent,
        "playstore" => $row->playstoreagent,
        "logo" => $row->logo,
        "gambar" => $gambar,
        "rating1" => $row->rating1,
        "rating2" => $row->rating2,
        "rating3" => $row->rating3,
        "id_kategori" => $row->id_kategori,
        "judul_kategori" => "",
        "gambar_kategori" => "",
        "id_menu" => "",
        "judul_menu" => "",
        "gambar_menu" => "",
        );
        array_push($hasil, $a);
    }
        
    AFhelper::kirimJson($hasil);
  }

  function jumlahAgent() {
    $sql = "SELECT COUNT(a.id_agent) as jumlah
        FROM tb_agent a
        WHERE a.visibility = '1' AND a.id_kategori = '99'";
    $data = AFhelper::dbSelectOne($sql);
    AFhelper::kirimJson($data);
  }

}


?>