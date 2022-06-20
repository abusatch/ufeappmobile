<?php

require_once "helper.php";

$mode = $_GET['mode'];

$reading = new ReadingAdvert();
switch ($mode) {
    case 'lihat':
        $reading->lihat();
        break;
    case 'tambah':
        $reading->tambah();
        break;
    default:
        echo "Mode tidak sesuai";
        break;
}

class ReadingAdvert
{
    function lihat() {
        $id_advert = $_POST['id_advert'];
        $sql = "SELECT a.id_view, a.id_advert, a.id_user, a.tanggal, a.tanggal2, 
           b.username, b.first_name, b.second_name, b.propic 
            FROM tb_advert_view a
            JOIN user b ON(a.id_user = b.idUser) 
            WHERE a.id_advert = '$id_advert'";
        $data = AFhelper::dbSelectAll($sql);
        $hasil = array();
        foreach ($data as $row) {
            $tgl = explode("-", $row->tanggal);
            $a = array(
                "id_view" => $row->id_view,
                "id_advert" => $row->id_advert,
                "id_user" => $row->id_user,
                "email_user" => $row->username,
                "nama_user" => $row->first_name.' '.$row->second_name,
                "foto_user" => "https://ufe-section-indonesie.org/ufeapp/images/propic/".$row->propic,
                "tanggal" => $tgl[2]."/".$tgl[1]."/".$tgl[0],
            );
            array_push($hasil, $a);
        }
        AFhelper::kirimJson($hasil, 'Get view');
    }

    function tambah()
    {
        $email = $_POST['email'];
        $id_advert = $_POST['id_advert'];

        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d');
        $tanggal2 = date('Y-m-d H:i:s');

        $sql = "SELECT * from user where username = '$email'";
        $user = AFhelper::dbSelectOne($sql);
        $idUser = $user->idUser;

        $sql = "INSERT INTO tb_advert_view(id_advert, id_user, tanggal, tanggal2) 
            VALUES ('$id_advert', '$idUser', '$tanggal', '$tanggal2')
            ON DUPLICATE KEY UPDATE
            tanggal2 = '$tanggal2'";
        AFhelper::dbSave($sql, "add view success");

    }
    
}

?>