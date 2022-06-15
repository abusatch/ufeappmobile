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
    case 'hapus':
        $reading->hapus();
        break;
    default:
        echo "Mode tidak sesuai";
        break;
}

class ReadingAdvert
{
    function lihat() {
        $id_advert = $_POST['id_advert'];
        $sql = "SELECT a.id_favorit, a.id_advert, a.id_user, a.tanggal, a.tanggal2, a.jenis, 
           b.username, b.first_name, b.second_name, b.propic 
            FROM tb_advert_favorit a
            JOIN user b ON(a.id_user = b.idUser) 
            WHERE a.jenis = 'LIKE' AND a.id_advert = '$id_advert'";
        $data = AFhelper::dbSelectAll($sql);
        $hasil = array();
        foreach ($data as $row) {
            $tgl = explode("-", $row->tanggal);
            $a = array(
                "id_favorit" => $row->id_favorit,
                "id_advert" => $row->id_advert,
                "id_user" => $row->id_user,
                "email_user" => $row->username,
                "nama_user" => $row->first_name.' '.$row->second_name,
                "foto_user" => "https://ufe-section-indonesie.org/ufeapp/images/propic/".$row->propic,
                "tanggal" => $tgl[2]."/".$tgl[1]."/".$tgl[0],
                "jenis" => $row->jenis,
            );
            array_push($hasil, $a);
        }
        AFhelper::kirimJson($hasil, 'Get Comment');
    }

    function tambah()
    {
        $email = $_POST['email'];
        $id_advert = $_POST['id_advert'];
        $jenis = $_POST['jenis'];

        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d');
        $tanggal2 = date('Y-m-d H:i:s');

        $sql = "SELECT * from user where username = '$email'";
        $user = AFhelper::dbSelectOne($sql);
        $idUser = $user->idUser;

        $sql = "INSERT INTO tb_advert_favorit(id_advert, id_user, tanggal, tanggal2, jenis) 
            VALUES ('$id_advert', '$idUser', '$tanggal', '$tanggal2', '$jenis')";
        AFhelper::dbSave($sql, null);

    }

    function hapus()
    {
        $email = $_POST['email'];
        $id_advert = $_POST['id_advert'];
        $jenis = $_POST['jenis'];

        $sql = "SELECT * from user where username = '$email'";
        $user = AFhelper::dbSelectOne($sql);
        $idUser = $user->idUser;

        $sql = "DELETE FROM tb_advert_favorit WHERE id_advert = '$id_advert' AND id_user = '$idUser' AND jenis = '$jenis'";
        AFhelper::dbSave($sql, null);

    }
}

?>