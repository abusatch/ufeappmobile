<?php

require_once "helper.php";

$id = $_GET['id'];
$halaman = $_GET['halaman'];
    
$where = "AND a.id_kategori = '$_GET[kategori]'";

if(!empty($id)) {
    $where = "AND a.id_agent = '$id'";
}

if(empty($halaman)) {
    $halaman = 0;  
}

$offset = " offset $halaman";

$sql = "SELECT a.id_agent, a.id_kategori, a.judul, a.judul2, a.short_desc, a.long_desc, a.gambar, a.gambar2, a.namaagent, a.gmaps, a.alamatagent, a.alamat2agent, 
        a.kotaagent, a.kodeposagent, a.telpagent, a.mobileagent, a.emailagent, a.webagent, a.fbagent, a.twiteragent, a.igagent, a.waagent, a.telegramagent, a.linkedagent, a.youtubeagent, a.appstoreagent, a.playstoreagent,
        a.rating1, a.rating2, a.rating3, a.visibility, b.judul AS judul_kategori, b.gambar AS gambar_kategori, c.id_menu, c.nama_menu AS judul_menu, c.gambar2 AS gambar_menu, c.warna
    FROM tb_agent a
    JOIN tb_demar2 b ON(a.id_kategori = b.id_demar)
    JOIN tb_menu c ON(b.id_kategori = c.id_menu)
    WHERE a.visibility = '1' $where
    ORDER BY a.rating1 DESC, a.rating2 DESC, a.rating3 DESC, a.namaagent, a.id_agent LIMIT 10 $offset";

$data = AFhelper::dbSelectAll($sql);
$hasil = array();

foreach ($data as $row) {
    $logo = $row->gambar ? "https://ufe-section-indonesie.org/ufeapp/images/agent/".$row->gambar : '';
    $gambar = $row->gambar2 ? "https://ufe-section-indonesie.org/ufeapp/images/agent/".$row->gambar2 : '';
    $gambar_kategori = $row->gambar_kategori ? "https://ufe-section-indonesie.org/ufeapp/images/menu/".$row->gambar_kategori : '';
    $gambar_menu = $row->gambar_menu ? "https://ufe-section-indonesie.org/ufeapp/images/menu/".$row->gambar_menu : '';
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
    );
    array_push($hasil, $a);
}
    
AFhelper::kirimJson($hasil);

?>