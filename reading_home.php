<?php

require_once "helper.php";

$mode = $_GET['mode'];

$reading = new ReadingHome();
switch ($mode) {
    case 'tulisan':
        $reading->tulisan();
        break;
    case 'text':
        $reading->text();
        break;
    case 'logo':
        $reading->logo();
        break;
    case 'profil':
        $reading->profil();
        break;
    case 'saveip':
        $reading->saveIP();
        break;
    case 'artikelambasador':
        $reading->artikelAmbasador();
        break;
    case 'ufemenu':
        $reading->getUFeMenu();
        break;
    case 'ufemenudetil':
        $reading->getUFeMenuDetil();
        break;
    case 'addufemenudetil':
        $reading->addUFeMenuDetil();
        break;
    case 'addcontribute':
        $reading->addContribute();
        break;
    default:
        echo "Mode tidak sesuai";
        break;
}

class ReadingHome
{
    function tulisan() {
        $sql = "SELECT * FROM tb_halaman_depan";
        $data = AFhelper::dbSelectOne($sql);
        AFhelper::kirimJson($data, 'Get tulisan halaman depan');
    }

    function text() {
        $sql = "SELECT text_id, text_kode, text_nama, text_isi FROM tb_text";
        $data = AFhelper::dbSelectAll($sql);
        $hasil = array();
        foreach ($data as $r) {
            $hasil[$r->text_kode] = $r->text_isi;
        }
        AFhelper::kirimJson($hasil);
    }

    function logo() {
        $sql = "SELECT logo_id, logo_kode, logo_nama, logo_isi FROM tb_logo";
        $data = AFhelper::dbSelectAll($sql);
        $hasil = array();
        foreach ($data as $r) {
            $hasil[$r->logo_kode] = $r->logo_isi ? "https://ufe-section-indonesie.org/ufeapp/images/logo/".$r->logo_isi : "";
        }
        AFhelper::kirimJson($hasil);
    }

    function profil() {
        $hasil = array();
        
        $sql = "SELECT id_version, version_code, build_number, download, download_ios FROM tb_version_code LIMIT 1";
        $v = AFhelper::dbSelectOne($sql);
        $hasil['version_code'] = $v->version_code;
        $hasil['build_number'] = $v->build_number;
        $hasil['download'] = $v->download;
        $hasil['download_ios'] = $v->download_ios;

        $sql = "SELECT * FROM user WHERE username = '$_POST[email]' LIMIT 1";
        $u = AFhelper::dbSelectOne($sql);
        $hasil['device_id'] = $u->device_id;
        $hasil['verifikasi_admin'] = $u->verifikasi_admin;

        $sql = "SELECT * FROM tb_tulisan WHERE jenis = 'update_versi'";
        $t = AFhelper::dbSelectOne($sql);
        $hasil['upgrade_tulisan1'] = $t->tulisan1;
        $hasil['upgrade_tulisan2'] = $t->tulisan2;
        $hasil['upgrade_tulisan3'] = $t->tulisan3;
        $hasil['upgrade_tulisan4'] = $t->tulisan4;

        $sql = "SELECT text_isi FROM tb_text WHERE text_kode = 'verification_rule'";
        $t = AFhelper::dbSelectOne($sql);
        $hasil['verification_rule'] = $t->text_isi;

        $sql = "SELECT text_isi FROM tb_text WHERE text_kode = 'two_device_rule'";
        $t = AFhelper::dbSelectOne($sql);
        $hasil['two_device_rule'] = $t->text_isi;

        $hasil['url_check_ip'] = 'http://ip-api.com/json';
        
        AFhelper::kirimJson($hasil);
    }

    function saveIP() {
        $ip_address = $_POST['query'];
        $ip_country = $_POST['countryCode'];
        $ip_city = $_POST['city'];
        $sql = "UPDATE user SET ip_address = '$ip_address', ip_country = '$ip_country', ip_city = '$ip_city' WHERE username = '$_GET[email]'";
        AFhelper::dbSave($sql);
    }

    function artikelAmbasador() {
        $hasil = array();

        $sql = "SELECT * from user where idUser = '56'";
        $user = AFhelper::dbSelectOne($sql);
        $a = array(
            "id_template" => $user->idUser,
            "id_member" => $user->idUser,
            "judul" => $user->first_name." ".$user->second_name,
            "deskripsi" => $user->deskripsi,
            "gambar" => "https://ufe-section-indonesie.org/ufeapp/images/propic/".$user->propic,
            "tanggal" => $user->deskripsi,
        );
        array_push($hasil, $a);

        $sql_get_data = "SELECT a.*, b.username, b.first_name, b.second_name, b.propic
        FROM tb_template a
        JOIN user b ON(a.id_member_vip = b.idUser)
        WHERE a.visibility = '1' AND a.keterangan = 'release' AND a.id_member_vip = '56' ORDER BY a.id_template DESC limit 3";

        $data = AFhelper::dbSelectAll($sql_get_data);

        foreach ($data as $row) {
            $tgl = explode("-", $row->tanggal);
            $propic = $row->propic ? "https://ufe-section-indonesie.org/ufeapp/images/propic/".$row->propic : '';
            $a = array(
                "id_template" => $row->id_template,
                "id_member" => $row->id_member_vip,
                "judul" => AFhelper::formatText($row->judul),
                "deskripsi" => AFhelper::formatText($row->deskripsi),
                "gambar" => "https://ufe-section-indonesie.org/ufeapp/images/actualite/".$row->gambar,
                "tanggal" => $tgl[2]."/".$tgl[1]."/".$tgl[0],
                "tanggal2" => $row->tanggal2,
                "url" => $row->linkweb,
                "email" => $row->username,
                "keterangan" =>  AFhelper::formatText($row->keterangan),
                "first_name" => $row->first_name,
                "second_name" => $row->second_name,
                "propic" => $propic,
            );
            array_push($hasil, $a);
        }
        AFhelper::kirimJson($hasil);
    }

    function getUFeMenu() {
        $sql = "SELECT * from tb_ufemenu order by sort";
        $hasil = AFhelper::dbSelectAll($sql);
        AFhelper::kirimJson($hasil);
    }

    function getUFeMenuDetil() {
        $sql = "SELECT detil_id, id, judul, deskripsi, gambar, tanggal, link 
            FROM tb_ufe_menu_detil 
            WHERE status = 'Y' AND id = '$_GET[id]'";

        $data = AFhelper::dbSelectAll($sql);
        $hasil = array();

        foreach ($data as $row) {
        $gambar = $row->gambar ? "https://ufe-section-indonesie.org/ufeapp/images/actualite/".$row->gambar : '';
        $a = array(
            "id_advert" => $row->detil_id,
            "id_member" => $row->id,
            "judul" => AFhelper::formatText($row->judul),
            "deskripsi" => AFhelper::formatText($row->deskripsi),
            "gambar" => $gambar,
            "tanggal" => $row->tanggal,
            "url" => $row->link,
        );
        array_push($hasil, $a);
        }
        
        AFhelper::kirimJson($hasil);
    }

    function addUFeMenuDetil() {
        $menu_id = $_POST['id'];
        $judul = $_POST['judul'];
        $tanggal = $_POST['tanggal'];
        $deskripsi = $_POST['deskripsi'];
        $link = $_POST['link'];
        
        $path = substr(date('YmdHis'),0,-1).".png";
        if (!$_FILES['gambar']['tmp_name']) {
            AFhelper::kirimJson(null, "photo ne peut pas être vide", 0);
        } else {
            $tmp_name = $_FILES['gambar']['tmp_name'];
            $inputimage = move_uploaded_file($tmp_name, "images/actualite/".$path);
            if($inputimage) {
                $sql = "INSERT INTO tb_ufe_menu_detil(id, judul, deskripsi, gambar, tanggal, link, status) 
                    VALUES ('$menu_id', '$judul', '$deskripsi', '$path', '$tanggal', '$link', 'R')";
                $hasil = AFhelper::dbSaveReturnID($sql);
                if ($hasil <> 0 && $hasil <> '') {
                    AFhelper::kirimJson($hasil, "Les données sont enregistrées avec succès, l'administrateur les examinera. Merci pour votre contribution.");
                } else {
                    AFhelper::kirimJson(null, "une erreur de connexion s'est produite", 0);
                }
            } else {
                AFhelper::kirimJson(null, "une erreur de connexion s'est produite", 0); 
            }
        }	
    }

    function addContribute() {
        $email = $_POST['email'];
        $jenis = $_POST['jenis'];
        $for_id = $_POST['for_id'];
        
        $sql = "INSERT INTO tb_contribute(email, jenis, for_id, status) 
            VALUES ('$email', '$jenis', '$for_id', 'R')";
        $hasil = AFhelper::dbSaveCek($sql);
        if($hasil[0]) {
            AFhelper::kirimJson(null, "Les données sont enregistrées avec succès, l'administrateur les examinera. Merci pour votre contribution.");
        } else {
            AFhelper::kirimJson(null, "une erreur de connexion s'est produite ".$hasil[1], 0);
        }
    }


}

?>