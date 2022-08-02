<?php

require_once "helper.php";

$method = $_SERVER["REQUEST_METHOD"];
$mode = $_GET['mode'];
$chat = new Chat();
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
    case 'getmessage':
        $chat->getMessage();
        break;
    case 'sendmessage':
        $chat->sendMessage();
        break;
    case 'delmessage':
        $chat->delMessage();
        break;
    default:
        echo "Mode tidak sesuai";
        break;
}

class Chat
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
        AFhelper::kirimJson($data, 'Get user with isonline = ' . $_POST['isonline']);
    }

    function getMessage()
    {
        $sql = "SELECT id, sender, receiver, contents, created_at
            FROM messages 
            WHERE receiver = '$_POST[receiver]'
            ORDER BY id";
        $data = AFhelper::dbSelectAll($sql);
        AFhelper::kirimJson($data, 'Get Messages');
    }

    function sendMessage()
    {
        $sql = "INSERT INTO messages(sender, receiver, contents, created_at) 
            VALUES ('$_POST[sender]', '$_POST[receiver]', '$_POST[contents]', '$_POST[created_at]')";
        $hasil = AFhelper::dbSaveReturnID($sql);
        if ($hasil <> 0 && $hasil <> '') {
            $sql_sender = "SELECT idUser, username, CONCAT(first_name, ' ', second_name) fullname, token_push, propic, last_online2 AS last_seen, isonline 
                FROM user
                WHERE username = '$_POST[sender]'";
            $user_sender = AFhelper::dbSelectOne($sql_sender);

            $sql_receiver = "SELECT idUser, username, CONCAT(first_name, ' ', second_name) fullname, token_push, propic, last_online2 AS last_seen, isonline 
                FROM user
                WHERE username = '$_POST[receiver]'";
            $user_receiver = AFhelper::dbSelectOne($sql_receiver);
            $qw[] = $user_receiver->token_push;

            $sql = "SELECT id, sender, receiver, contents, created_at
                FROM messages
                WHERE id = $hasil LIMIT 1";
            $data = AFhelper::dbSelectOne($sql);
            AFhelper::kirimJson($data, 'Get Message');

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
                'halaman' => 'mychat',
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
        } else {
            AFhelper::kirimJson(null, 'Gagal insert messages ', 0);
        }
    }

    function delMessage()
    {
        $sql = "DELETE FROM messages WHERE id = $_POST[id]";
        AFhelper::dbSave($sql, null);
    }
    
}
