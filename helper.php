<?php

require_once("db.php");

$koneksi->set_charset("utf8mb4");

class AFhelper
{
    public static function kirimJson($data, string $msg = '', $status = 1)
    {
        $response = array(
            'status' => $status,
            'message' => $msg,
            'data' => $data
        );
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public static function dbSelectAll(string $sql)
    {
        global $koneksi;
        $data = array();
        $result = $koneksi->query($sql);
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public static function dbSelectOne(string $sql)
    {
        global $koneksi;
        $data = array();
        $result = $koneksi->query($sql);
        $data = mysqli_fetch_object($result);
        return $data;
    }

    public static function dbSave(string $sql, $data = null, string $message = 'Sukses')
    {
        global $koneksi;
        $result = $koneksi->query($sql);
        if ($result) {
            return AFhelper::kirimJson($data, $message, 1);
        } else {
            return AFhelper::kirimJson($sql, $koneksi->error, 0);
        }
    }

    public static function dbSaveCek(string $sql)
    {
        global $koneksi;
        $hasil = array();
        $result = $koneksi->query($sql);
        if ($result) {
            $hasil[0] = true;
        } else {
            $hasil[0] = false;
            $hasil[1] = $koneksi->error;
            $hasil[2] = $sql;
        }
        return $hasil;
    }

    public static function dbSaveReturnID(string $sql)
    {
        global $koneksi;
        $result = $koneksi->query($sql);
        if ($result) {
            $hasil = $koneksi->insert_id;
        } else {
            $hasil = 0;
        }
        return $hasil;
    }

    public static function dbSaveMulti(string $sql, $data = null, string $message = 'Sukses')
    {
        global $koneksi;
        $result = $koneksi->multi_query($sql);
        if ($result) {
            return AFhelper::kirimJson($data, $message, 1);
        } else {
            return AFhelper::kirimJson($sql, $koneksi->error, 0);
        }
    }

    public static function dbSaveCekMulti(string $sql)
    {
        global $koneksi;
        $hasil = array();
        $result = $koneksi->multi_query($sql);
        if ($result) {
            $hasil[0] = true;
        } else {
            $hasil[0] = false;
            $hasil[1] = $koneksi->error;
            $hasil[2] = $sql;
        }
        return $hasil;
    }

    public static function formatText(string $text)
    {
        // $text = str_replace('\n',"-enter-",$text);
        $text = str_replace("'","`",$text);
        $text = str_replace('"',"-petikdua-",$text);
        $text = str_replace(str_split('\\/:*?"<>|'), ' ', $text);
        $text = str_replace("<br>","-enter-",$text);
        $text = str_replace(".","-titik-",$text);
        $text = str_replace("-","-",$text);
        $text = str_replace("!","-tandaseru-",$text);
        $text = str_replace("’"," ",$text);
        $text = str_replace("é","-ekanan-",$text);
        $text = str_replace("à","-akiri-",$text);
        $text = str_replace("è","-ekiri-",$text);
        // $text = preg_replace("/\r\n|\r|\n/", '-enter-', $text);
        // $text = str_replace(array("\r\n","\r","\n","\\r","\\n","\\r\\n"),"-enter-",$text);

        return $text;
    }

    public static function formatTextHTML(string $text)
    {
        // $text = str_replace('\n',"-enter-",$text);
        $text = str_replace("'","`",$text);
        $text = str_replace('"',"-petikdua-",$text);
        $text = str_replace(".","-titik-",$text);
        $text = str_replace("-","-",$text);
        $text = str_replace("!","-tandaseru-",$text);
        $text = str_replace("’"," ",$text);
        $text = str_replace("é","-ekanan-",$text);
        $text = str_replace("à","-akiri-",$text);
        $text = str_replace("è","-ekiri-",$text);
        // $text = preg_replace("/\r\n|\r|\n/", '-enter-', $text);
        // $text = str_replace(array("\r\n","\r","\n","\\r","\\n","\\r\\n"),"-enter-",$text);

        return $text;
    }

    public static function generalText($text)
    {
        if($text == null) {
            return "";
        }
        $text = str_replace("-spasi-",' ',$text);
        $text = str_replace("-enter-",'\n',$text);
        $text = str_replace("`","'",$text);
        $text = str_replace("-petikdua-",'"',$text);
        $text = str_replace("-titik-",".",$text);
        $text = str_replace("-tandaseru-","!",$text);
        $text = str_replace("-ekanan-","é",$text);
        $text = str_replace("-akiri-","à",$text);
        $text = str_replace("-ekiri-","è",$text);
        $text = str_replace("&petiksatu&","'",$text);
        $text = str_replace("&amp;petiksatu&amp;","'",$text);
        return $text;
    }

    public static function YMDtoDMY(string $text)
    {
        $tanggal = explode(" ", $text);
        $tgl = explode("-", $tanggal[0]);
        $new_tgl = $tgl[2]."/".$tgl[1]."/".$tgl[0]; 
        return $new_tgl;
    }

    public static function sendNotification(string $judul, string $isi, string $gambar = "", string $halaman = "", string $nomor = "", $penerima = null) {
        $accesstoken = 'AAAARVfjooY:APA91bEAKbWGNffjb80WnOsnE4U_iNWJOUhW1UqiMsnLiJXah2oFmEcn2Y5EcBvUeCWHWgAfBwmFZHhnCdKvyvrUf4m7okrNCICisXtzNyxfKu4F8FxfhXcnxPICACaUrLQJekNqYZPy';
        $header = array(
            'Content-type: application/json',
            'Authorization: key=' . $accesstoken
        );

        $qw = array();

        if($penerima == null) {
            $sql = "SELECT idUser, username, CONCAT(first_name, ' ', second_name) fullname, token_push, propic, last_online2 AS last_seen, isonline 
                FROM user
                WHERE token_push != '' ";
            $user = AFhelper::dbSelectAll($sql);
            foreach ($user as $r) {
                $qw[] = $r->token_push;
            }
        } else {
            $qw = $penerima;
        }

        $fcmMsg = array(
            'title' => $judul,
            'body' => $isi,
            'icon' => 'image/look24-logo-s.png',
            'sound' => 'default',
        );
        if($gambar != "") {
            $fcmMsg['image'] = $gambar;
        }

        $fcmFields = array(
            'registration_ids' => $qw,
            'priority' => 'high',
            'notification' => $fcmMsg
        );
        if($halaman != "") {
            $fcmFields['data'] = array(
                'halaman' => $halaman,
                'nomor' => $nomor,
            ); 
        }

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($curl, CURLOPT_POST, true );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public static function setFirebase(string $rute, $data) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://ufe-indonesie-f76c4-default-rtdb.asia-southeast1.firebasedatabase.app/'.$rute.'.json');
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data) );
        $response = curl_exec( $curl );
        curl_close( $curl );
        return $response;
    }

}