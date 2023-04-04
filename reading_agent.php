<?php

require_once "helper.php";

$mode = $_GET['mode'];
$reading = new ReadingAgent();
switch ($mode) {
    case 'add':
        $reading->save('add');
        break;
    default:
        $reading->view();
        break;
}

class ReadingAgent
{
    function view() {
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
            ORDER BY a.topsort DESC, a.sorting, a.rating1 DESC, a.rating2 DESC, a.rating3 DESC, a.namaagent, a.id_agent LIMIT 10 $offset";

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
            "warna" => $row->warna,
            );
            array_push($hasil, $a);
        }  
        AFhelper::kirimJson($hasil);
    }

    function save($stat) {
        $txt_id_demar = $_POST["txt_id_demar"];
        $txt_name = AFhelper::formatText($_POST["txt_name"]);
        $txt_maps = $_POST["txt_maps"];
        $txt_address = AFhelper::formatText($_POST["txt_address"]);
        $txt_city = $_POST["txt_city"];
        $txt_postal = $_POST["txt_postal"];
        $txt_phone = $_POST["txt_phone"];
        $txt_mobile = $_POST["txt_mobile"];
        $txt_whatsapp = $_POST["txt_whatsapp"];
        $txt_email = $_POST["txt_email"];
        $txt_web = $_POST["txt_web"];
        $txt_telegram = $_POST["txt_telegram"];
        $txt_facebook = $_POST["txt_facebook"];
        $txt_twitter = $_POST["txt_twitter"];
        $txt_instagram = $_POST["txt_instagram"];
        $txt_youtube = $_POST["txt_youtube"];
        $txt_linkedin = $_POST["txt_linkedin"];
        $txt_playstore = $_POST["txt_playstore"];
        $txt_appstore = $_POST["txt_appstore"];
        $txt_description = AFhelper::formatTextHTML($_POST["txt_description"]);
        $id = $_POST['txt_id'];
    
        date_default_timezone_set('Asia/Jakarta');
    
        if($stat=='add' && !$_FILES['txt_image']['tmp_name']) {
            AFhelper::kirimJson(null, "photo ne peut pas être vide", 0);
            exit();
        }
    
        $nama_image = "";
        $sql = "";
        if ($_FILES['txt_image']['tmp_name']) {
            $nama_image = $_FILES['txt_image']['name'];
            $uploadimage = move_uploaded_file($_FILES['txt_image']['tmp_name'], "images/agent/".$nama_image);
            if(!$uploadimage) {
                AFhelper::kirimJson(null, "une erreur de connexion s'est produite", 0);
                exit();
            }
        }
        if($stat=='edit') {
            if($nama_image != "") {
                $sql = "UPDATE tb_agent SET 
                    gambar2 = '$nama_image',
                    id_kategori = '$txt_id_demar',
                    namaagent = '$txt_name', 
                    long_desc = '$txt_description',
                    gmaps = '$txt_maps',
                    alamatagent = '$txt_address',
                    kotaagent = '$txt_city',
                    kodeposagent = '$txt_postal',
                    telpagent = '$txt_phone',
                    mobileagent = '$txt_mobile',
                    emailagent = '$txt_email',
                    webagent = '$txt_web',
                    fbagent = '$txt_facebook',
                    twiteragent = '$txt_twitter',
                    igagent = '$txt_instagram',
                    waagent = '$txt_whatsapp',
                    telegramagent = '$txt_telegram',
                    linkedagent = '$txt_linkedin',
                    youtubeagent = '$txt_youtube',
                    playstoreagent = '$txt_playstore',
                    appstoreagent = '$txt_appstore'
                    WHERE id_agent = '$id'";	
            } else {
                $sql = "UPDATE tb_agent SET 
                    id_kategori = '$txt_id_demar',
                    namaagent = '$txt_name', 
                    long_desc = '$txt_description',
                    gmaps = '$txt_maps',
                    alamatagent = '$txt_address',
                    kotaagent = '$txt_city',
                    kodeposagent = '$txt_postal',
                    telpagent = '$txt_phone',
                    mobileagent = '$txt_mobile',
                    emailagent = '$txt_email',
                    webagent = '$txt_web',
                    fbagent = '$txt_facebook',
                    twiteragent = '$txt_twitter',
                    igagent = '$txt_instagram',
                    waagent = '$txt_whatsapp',
                    telegramagent = '$txt_telegram',
                    linkedagent = '$txt_linkedin',
                    youtubeagent = '$txt_youtube',
                    playstoreagent = '$txt_playstore',
                    appstoreagent = '$txt_appstore'
                    WHERE id_agent = '$id'";
            }
            $hasil = AFhelper::dbSaveCek($sql);
            if($hasil[0]) {
                AFhelper::kirimJson($hasil);
            } else {
                AFhelper::kirimJson($sql, $hasil[1], 0);	
            }
        } else {
            $sql = "INSERT INTO tb_agent (id_kategori, judul, judul2, short_desc, long_desc,
                gambar, gambar2, namaagent, gmaps, alamatagent, 
                alamat2agent, kotaagent, kodeposagent, telpagent, mobileagent,
                emailagent, webagent, fbagent, twiteragent, igagent,
                waagent, telegramagent, linkedagent, youtubeagent, playstoreagent,
                appstoreagent, visibility) 
                VALUES ('$txt_id_demar', '', '', '', '$txt_description',
                '', '$nama_image', '$txt_name', '$txt_maps', '$txt_address',
                '', '$txt_city', '$txt_postal', '$txt_phone', '$txt_mobile',
                '$txt_email', '$txt_web', '$txt_facebook', '$txt_twitter', '$txt_instagram',
                '$txt_whatsapp', '$txt_telegram', '$txt_linkedin', '$txt_youtube', '$txt_playstore',
                '$txt_appstore', '3')";
            $hasil = AFhelper::dbSaveReturnID($sql);
            if ($hasil <> 0 && $hasil <> '') {
                AFhelper::kirimJson($hasil, "Les données sont enregistrées avec succès, l'administrateur les examinera. Merci pour votre contribution.");
            } else {
                AFhelper::kirimJson(null, "une erreur de connexion s'est produite", 0);	
            }
        }	
    }
}



?>