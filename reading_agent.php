<?php

require_once "helper.php";

$id = $_GET['id'];
$halaman = $_GET['halaman'];
    
$where = "AND id_kategori = '$_GET[kategori]'";

if(!empty($id)) {
    $where = "AND id_agent = '$id'";
}

if(empty($halaman)) {
    $halaman = 0;  
}

$offset = " offset $halaman";

$sql = "SELECT id_agent, id_kategori, judul, judul2, short_desc, long_desc, gambar, gambar2, namaagent, gmaps, alamatagent, alamat2agent, 
    kotaagent, kodeposagent, telpagent, mobileagent, emailagent, webagent, fbagent, twiteragent, igagent, playstoreagent, rating1, rating2, rating3, visibility 
    FROM tb_agent 
    WHERE visibility = '1' $where
    ORDER BY rating1 DESC, rating2 DESC, rating3 DESC, namaagent, id_agent LIMIT 5 $offset";

$data = AFhelper::dbSelectAll($sql);
$hasil = array();

foreach ($data as $row) {
    $logo = $row->gambar ? "https://ufe-section-indonesie.org/ufeapp/images/agent/".$row->gambar : '';
    $gambar = $row->gambar2 ? "https://ufe-section-indonesie.org/ufeapp/images/agent/".$row->gambar2 : '';
    $a = array(
    "id_agent" => $row->id_agent,
    "id_kategori" => $row->id_kategori,
    "deskripsi" => AFhelper::formatText($row->long_desc),
    "nama" => $row->namaagent,
    "alamat" => AFhelper::formatText($row->alamatagent),
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
    );
    array_push($hasil, $a);
}
    
AFhelper::kirimJson($hasil);

?>