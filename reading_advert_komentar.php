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
        $hariini = $tanggal = date('Y-m-d');
        $id_advert = $_POST['id_advert'];
        $sql = "SELECT a.id_komentar, a.id_advert, a.id_user, a.tanggal, a.tanggal2, a.isi, 
           b.username, b.first_name, b.second_name, b.propic 
            FROM tb_advert_komentar a
            JOIN user b ON(a.id_user = b.idUser) 
            WHERE a.id_advert = '$id_advert'
            ORDER BY a.id_komentar DESC";
        $data = AFhelper::dbSelectAll($sql);
        $hasil = array();
        foreach ($data as $row) {
            if($row->tanggal == $hariini) {
                $tanggal = substr($row->tanggal2, 11, 5);
            } else {
                $tgl = explode("-", $row->tanggal);
                $tanggal = $tgl[2]."/".$tgl[1]."/".$tgl[0];
            }
            
            $a = array(
                "id_komentar" => $row->id_komentar,
                "id_advert" => $row->id_advert,
                "id_user" => $row->id_user,
                "email_user" => $row->username,
                "nama_user" => $row->first_name.' '.$row->second_name,
                "foto_user" => "https://ufe-section-indonesie.org/ufeapp/images/propic/".$row->propic,
                "tanggal" => $tanggal,
                "isi" => $row->isi,
            );
            array_push($hasil, $a);
        }
        AFhelper::kirimJson($hasil, 'Get Comment');
    }

    function tambah()
    {
        $email = $_POST['email'];
        $id_advert = $_POST['id_advert'];
        $isi = $_POST['isi'];

        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date('Y-m-d');
        $tanggal2 = date('Y-m-d H:i:s');

        $sql = "SELECT * from user where username = '$email'";
        $user = AFhelper::dbSelectOne($sql);
        $idUser = $user->idUser;

        $sql = "INSERT INTO tb_advert_komentar(id_advert, id_user, tanggal, tanggal2, isi) 
            VALUES ('$id_advert', '$idUser', '$tanggal', '$tanggal2', '$isi')";
        ?>

<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous">
</script>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin="">
</script>
  
<script src="https://code.jquery.com/jquery-2.2.4.min.js"
 integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
 crossorigin="anonymous">
</script>
<script src="https://www.gstatic.com/firebasejs/8.2.3/firebase.js"></script> 
<script type="text/javascript">
 var nextkey =0;
 var config = {
    apiKey: "AIzaSyCLaApKgiVWIg3ylCHoM339-3zp_ilHDlQ",
    authDomain: "ufe-indonesie-f76c4.firebaseapp.com",
    databaseURL: "https://ufe-indonesie-f76c4-default-rtdb.asia-southeast1.firebasedatabase.app",
    projectId: "ufe-indonesie-f76c4",
    storageBucket: "ufe-indonesie-f76c4.appspot.com",
    messagingSenderId: "297827279494",
    appId: "1:297827279494:web:da1440b3e1fb07d752e707",
    measurementId: "G-8G1DDJS92V"
 };
 firebase.initializeApp(config);
 var database = firebase.database();
function writeUserData(id_user) {
    database.ref('komentar').child("1").set({
        id_user:id_user
    });
} 
writeUserData("2");
</script>

<?php
        AFhelper::dbSave($sql, "add comment success");

    }

    function hapus()
    {
        $email = $_POST['email'];
        $id_advert = $_POST['id_advert'];
        $isi = $_POST['isi'];

        $sql = "SELECT * from user where username = '$email'";
        $user = AFhelper::dbSelectOne($sql);
        $idUser = $user->idUser;

        $sql = "DELETE FROM tb_advert_komentar WHERE id_advert = '$id_advert' AND id_user = '$idUser'";
        AFhelper::dbSave($sql, "delete comment success");

    }
}

?>