<?php

require_once "helper.php";

$method = $_SERVER["REQUEST_METHOD"];
$mode = $_GET['mode'];
$chat = new Concierge();
switch ($mode) {
    case 'getuser':
        $chat->getUser();
        break;
    case 'connect':
        $chat->connectUser();
        break;
    case 'disconnect':
        $chat->disconnectUser();
        break;
    case 'online':
        $chat->onlineUser();
        break;
    case 'getconcierge':
        $chat->getConcierge();
        break;
    case 'getadminconcierge':
        $chat->getAdminConcierge();
        break;
    case 'statusdelivered':
        $chat->statusDelivered();
        break;
    case 'statusread':
        $chat->statusRead();
        break;
    case 'addconcierge':
        $chat->addConcierge();
        break;
    case 'addadminconcierge':
        $chat->addAdminConcierge();
        break;
    case 'updatestatusconcierge':
        $chat->updateStatusConcierge();
        break;
    case 'updatestatusadminconcierge':
        $chat->updateStatusAdminConcierge();
        break;
    case 'removeconcierge':
        $chat->removeConcierge();
        break;
    default:
        echo "Mode tidak sesuai";
        break;
}

class Concierge
{

    function getUser()
    {
        $sql = "SELECT idUser, username, CONCAT(first_name, ' ', second_name) fullname, token_push, propic, last_online2 AS last_seen, isonline 
            FROM user
            WHERE username = '$_POST[email]'";
        $data = AFhelper::dbSelectOne($sql);
        $data->propic = $data->propic ? "https://ufe-section-indonesie.org/ufeapp/images/propic/".$data->propic : '';
        AFhelper::kirimJson($data, 'Get User');
    }

    function connectUser()
    {
        $sql = "UPDATE user SET
            last_online2 = '$_POST[last_seen]',
            isonline = 'Y'
            WHERE username = '$_POST[email]'";
        $hasil = AFhelper::dbSaveCek($sql);
        if ($hasil[0]) {
            $sql = "SELECT idUser, username, CONCAT(first_name, ' ', second_name) fullname, token_push, propic, last_online2 AS last_seen, isonline 
            FROM user
            WHERE username = '$_POST[email]'";
            $data = AFhelper::dbSelectOne($sql);
            $data->propic = $data->propic ? "https://ufe-section-indonesie.org/ufeapp/images/propic/".$data->propic : '';
            AFhelper::kirimJson($data, 'Sukses update connect');
        } else {
            AFhelper::kirimJson($hasil[1], 'Gagal update connect ', 0);
        };
    }

    function disconnectUser()
    {
        $sql = "UPDATE user SET
            last_online2 = '$_POST[last_seen]',
            isonline = 'N'
            WHERE username = '$_POST[email]'";
        AFhelper::dbSave($sql, null);
    }

    function onlineUser()
    {
        if($_POST['isonline'] == 'Y') {
            $where = "isonline = 'Y'";
        } else if($_POST['isonline'] == 'all') {
            $where = "";
        } else {
            $where = "isonline <> 'Y' OR isonline IS NULL";
        }
        $sql = "SELECT idUser, username, CONCAT(first_name, ' ', second_name) fullname, token_push, propic, last_online2 AS last_seen, isonline 
            FROM user
            WHERE $where
            ORDER BY first_name, second_name";
        $data = AFhelper::dbSelectAll($sql);
        $hasil = array();
        foreach ($data as $row) {
            $row->propic = $row->propic ? "https://ufe-section-indonesie.org/ufeapp/images/propic/".$row->propic : '';
            array_push($hasil, $row);
        }
        AFhelper::kirimJson($hasil, 'Get user with isonline = ' . $_POST['isonline']);
    }

    function getConcierge()
    {
        $sql = "SELECT id, sender, receiver, contents, created_at, status, created_by, received_by
            FROM concierges 
            WHERE status = 'S' AND receiver = '$_POST[receiver]'
            ORDER BY id";
        $data = AFhelper::dbSelectAll($sql);
        AFhelper::kirimJson($data, 'Get Concierges');
    }

    function getAdminConcierge()
    {
        $sql = "SELECT id, sender, receiver, contents, created_at, status, created_by, received_by
            FROM concierges 
            WHERE (receiver = 'admin-ufe' OR sender = 'admin-ufe') AND received_by NOT LIKE '%-$_POST[email]-%'
            ORDER BY id";
        $data = AFhelper::dbSelectAll($sql);
        AFhelper::kirimJson($data, 'Get Concierges');
    }

    function statusDelivered()
    {
        $sql = "SELECT id, sender, receiver, contents, created_at, status, created_by, received_by
            FROM concierges 
            WHERE status = 'D' AND sender = '$_POST[sender]'
            ORDER BY id";
        $data = AFhelper::dbSelectAll($sql);
        AFhelper::kirimJson($data, 'Get Concierges');
    }

    function statusRead()
    {
        $sql = "SELECT id, sender, receiver, contents, created_at, status, created_by, received_by
            FROM concierges 
            WHERE status = 'R' AND sender = '$_POST[sender]'
            ORDER BY id";
        $data = AFhelper::dbSelectAll($sql);
        AFhelper::kirimJson($data, 'Get Concierges');
    }

    function addConcierge()
    {
        $sql = "INSERT INTO concierges(sender, receiver, contents, created_at, status, received_by) 
            VALUES ('$_POST[sender]', 'admin-ufe', '$_POST[contents]', '$_POST[created_at]', 'S', '-')";
        $hasil = AFhelper::dbSaveReturnID($sql);
        if ($hasil <> 0 && $hasil <> '') {
            $sql_sender = "SELECT idUser, username, CONCAT(first_name, ' ', second_name) fullname, token_push, propic, last_online2 AS last_seen, isonline 
                FROM user
                WHERE username = '$_POST[sender]'";
            $user_sender = AFhelper::dbSelectOne($sql_sender);
            $user_sender->propic = $user_sender->propic ? "https://ufe-section-indonesie.org/ufeapp/images/propic/".$user_sender->propic : '';

            $sql_receiver = "SELECT idUser, username, CONCAT(first_name, ' ', second_name) fullname, token_push, propic, last_online2 AS last_seen, isonline 
                FROM user
                WHERE level = 'admin-ufe' AND token_push != ''";
            $user_receiver = AFhelper::dbSelectOne($sql_receiver);
            $qw[] = $user_receiver->token_push;

            $accesstoken = 'AAAARVfjooY:APA91bEAKbWGNffjb80WnOsnE4U_iNWJOUhW1UqiMsnLiJXah2oFmEcn2Y5EcBvUeCWHWgAfBwmFZHhnCdKvyvrUf4m7okrNCICisXtzNyxfKu4F8FxfhXcnxPICACaUrLQJekNqYZPy';
            $header = array(
                'Content-type: application/json',
                'Authorization: key=' . $accesstoken
            );
            $fcmMsg = array(
                'title' => $user_sender->fullname,
                'body' => $_POST['contents'],
                'icon' => 'image/look24-logo-s.png',
                'sound' => 'default',
            );
            $fcmData = array(
                'halaman' => 'conciergeadmin',
                'nomor' => $_POST['sender'],
            );
            $fcmFields = array(
                'registration_ids' => $qw,
                'priority' => 'high',
                'notification' => $fcmMsg,
                'data' => $fcmData
            );
            $crl = curl_init();
            curl_setopt($crl, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($crl, CURLOPT_POST, true );
            curl_setopt($crl, CURLOPT_HTTPHEADER, $header);
            curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($crl, CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
            $rest = curl_exec($crl);

            $sql = "SELECT id, sender, receiver, contents, created_at, status, created_by, received_by
                FROM concierges
                WHERE id = $hasil LIMIT 1";
            $data = AFhelper::dbSelectOne($sql);
            AFhelper::kirimJson($data, $rest);
        } else {
            AFhelper::kirimJson($sql, 'Gagal insert concierges ', 0);
        }
    }

    function addAdminConcierge()
    {
        $sql = "INSERT INTO concierges(sender, receiver, contents, created_at, status, created_by, received_by) 
            VALUES ('admin-ufe', '$_POST[receiver]', '$_POST[contents]', '$_POST[created_at]', 'S', '$_POST[sender]', '-$_POST[sender]-')";
        $hasil = AFhelper::dbSaveReturnID($sql);
        if ($hasil <> 0 && $hasil <> '') {
            $sql_receiver = "SELECT idUser, username, CONCAT(first_name, ' ', second_name) fullname, token_push, propic, last_online2 AS last_seen, isonline 
                FROM user
                WHERE username = '$_POST[receiver]'";
            $user_receiver = AFhelper::dbSelectOne($sql_receiver);
            $qw[] = $user_receiver->token_push;

            $accesstoken = 'AAAARVfjooY:APA91bEAKbWGNffjb80WnOsnE4U_iNWJOUhW1UqiMsnLiJXah2oFmEcn2Y5EcBvUeCWHWgAfBwmFZHhnCdKvyvrUf4m7okrNCICisXtzNyxfKu4F8FxfhXcnxPICACaUrLQJekNqYZPy';
            $header = array(
                'Content-type: application/json',
                'Authorization: key=' . $accesstoken
            );
            $fcmMsg = array(
                'title' => "Conciergerie UFE",
                'body' => $_POST['contents'],
                'icon' => 'image/look24-logo-s.png',
                'sound' => 'default',
            );
            $fcmData = array(
                'halaman' => 'conciergeuser',
                'nomor' => $_POST['sender'],
            );
            $fcmFields = array(
                'registration_ids' => $qw,
                'priority' => 'high',
                'notification' => $fcmMsg,
                'data' => $fcmData
            );
            $crl = curl_init();
            curl_setopt($crl, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($crl, CURLOPT_POST, true );
            curl_setopt($crl, CURLOPT_HTTPHEADER, $header);
            curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($crl, CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
            $rest = curl_exec($crl);

            $sql = "SELECT id, sender, receiver, contents, created_at, status, created_by, received_by
                FROM concierges
                WHERE id = $hasil LIMIT 1";
            $data = AFhelper::dbSelectOne($sql);
            AFhelper::kirimJson($data, $rest);
        } else {
            AFhelper::kirimJson($sql, 'Gagal insert concierges ', 0);
        }
    }

    function updateStatusConcierge()
    {
        $sql = "UPDATE concierges SET status = '$_POST[status]' WHERE id = $_POST[id]";
        AFhelper::dbSave($sql, null);
    }

    function updateStatusAdminConcierge()
    {
        if($_POST['status'] == "D") {
            $nilai = $_POST['email']."-";
            $sql = "UPDATE concierges SET status = '$_POST[status]', received_by = CONCAT(received_by,'$nilai') WHERE id = $_POST[id]";
        } else {
            $sql = "UPDATE concierges SET status = '$_POST[status]' WHERE id = $_POST[id]";
        }
        AFhelper::dbSave($sql, null);
    }

    function removeConcierge()
    {
        $sql = "DELETE FROM concierges WHERE id = $_POST[id]";
        AFhelper::dbSave($sql, null);
    }

}
