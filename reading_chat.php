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
    case 'statusdelivered':
        $chat->statusDelivered();
        break;
    case 'statusread':
        $chat->statusRead();
        break;
    case 'addmessage':
        $chat->addMessage();
        break;
    case 'updatestatusmessage':
        $chat->updateStatusMessage();
        break;
    case 'removemessage':
        $chat->removeMessage();
        break;
    case 'addchatpermission':
        $chat->addChatPermission();
        break;
    case 'getchatpermission':
        $chat->getChatPermission();
        break;
    case 'getchatconfirmation':
        $chat->getChatConfirmation();
        break;
    case 'updatechatconfirmation':
        $chat->updateChatConfirmation();
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
        $country_id = AFhelper::countryID();
        if($_POST['isonline'] == 'Y') {
            $where = " AND isonline = 'Y'";
        } else if($_POST['isonline'] == 'all') {
            $where = "";
        } else {
            $where = " AND (isonline <> 'Y' OR isonline IS NULL)";
        }
        $sql = "SELECT idUser, username, CONCAT(first_name, ' ', second_name) fullname, token_push, propic, last_online2 AS last_seen, isonline 
            FROM user
            WHERE country_id = '$country_id' $where
            ORDER BY first_name, second_name";
        $data = AFhelper::dbSelectAll($sql);
        $hasil = array();
        foreach ($data as $row) {
            $row->propic = $row->propic ? "https://ufe-section-indonesie.org/ufeapp/images/propic/".$row->propic : '';
            array_push($hasil, $row);
        }
        AFhelper::kirimJson($hasil, 'Get user with isonline = ' . $_POST['isonline']);
    }

    function getMessage()
    {
        $sql = "SELECT id, sender, receiver, contents, created_at, status
            FROM messages 
            WHERE status = 'S' AND receiver = '$_POST[receiver]'
            ORDER BY id";
        $data = AFhelper::dbSelectAll($sql);
        AFhelper::kirimJson($data, 'Get Messages');
    }

    function statusDelivered()
    {
        $sql = "SELECT id, sender, receiver, contents, created_at, status
            FROM messages 
            WHERE status = 'D' AND sender = '$_POST[sender]'
            ORDER BY id";
        $data = AFhelper::dbSelectAll($sql);
        AFhelper::kirimJson($data, 'Get Messages');
    }

    function statusRead()
    {
        $sql = "SELECT id, sender, receiver, contents, created_at, status
            FROM messages 
            WHERE status = 'R' AND sender = '$_POST[sender]'
            ORDER BY id";
        $data = AFhelper::dbSelectAll($sql);
        AFhelper::kirimJson($data, 'Get Messages');
    }

    function addMessage()
    {
        $sql = "INSERT INTO messages(sender, receiver, contents, created_at, status) 
            VALUES ('$_POST[sender]', '$_POST[receiver]', '$_POST[contents]', '$_POST[created_at]', 'S')";
        $hasil = AFhelper::dbSaveReturnID($sql);
        if ($hasil <> 0 && $hasil <> '') {
            $sql_sender = "SELECT idUser, username, CONCAT(first_name, ' ', second_name) fullname, token_push, propic, last_online2 AS last_seen, isonline 
                FROM user
                WHERE username = '$_POST[sender]'";
            $user_sender = AFhelper::dbSelectOne($sql_sender);
            $user_sender->propic = $user_sender->propic ? "https://ufe-section-indonesie.org/ufeapp/images/propic/".$user_sender->propic : '';

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
                'title' => $user_sender->fullname,
                'body' => $_POST['contents'],
                'icon' => 'image/look24-logo-s.png',
                'sound' => 'default',
            );
            $fcmData = array(
                'halaman' => 'roomchat',
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

            $sql = "SELECT id, sender, receiver, contents, created_at, status
                FROM messages
                WHERE id = $hasil LIMIT 1";
            $data = AFhelper::dbSelectOne($sql);
            AFhelper::kirimJson($data, $rest);
        } else {
            AFhelper::kirimJson($sql, 'Gagal insert messages ', 0);
        }
    }

    function updateStatusMessage()
    {
        $sql = "UPDATE messages SET status = '$_POST[status]' WHERE id = $_POST[id]";
        AFhelper::dbSave($sql, null);
    }

    function removeMessage()
    {
        $sql = "DELETE FROM messages WHERE id = $_POST[id]";
        AFhelper::dbSave($sql, null);
    }

    function addChatPermission()
    {
        $sql = "INSERT INTO chat_permission(sender, receiver, created_at, contents) 
            VALUES ('$_POST[sender]', '$_POST[receiver]', '$_POST[created_at]', 'W')";
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
            
            $tgl = date('d/m/Y');
            $sql = "INSERT INTO tb_notification(kategori, judul, isi, keterangan, tanggal, gambar, data, kepada, dibaca, dihapus) 
                VALUES ('mychat', 'UFE Chat!', '".$user_sender->fullname." envoyer une demande de chat', '', '$tgl', '', '', '".$user_receiver->idUser."', '-', '-')";
            $aa = AFhelper::dbSaveCek($sql);

            $accesstoken = 'AAAARVfjooY:APA91bEAKbWGNffjb80WnOsnE4U_iNWJOUhW1UqiMsnLiJXah2oFmEcn2Y5EcBvUeCWHWgAfBwmFZHhnCdKvyvrUf4m7okrNCICisXtzNyxfKu4F8FxfhXcnxPICACaUrLQJekNqYZPy';
            $header = array(
                'Content-type: application/json',
                'Authorization: key=' . $accesstoken
            );
            $fcmMsg = array(
                'title' => $user_sender->fullname,
                'body' => 'UFE Chat, en attente de confirmation...',
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

            $sql = "SELECT id, sender, receiver, created_at, contents
                FROM chat_permission
                WHERE id = $hasil LIMIT 1";
            $data = AFhelper::dbSelectOne($sql);
            AFhelper::kirimJson($data, 'Get Permission Data');
        } else {
            AFhelper::kirimJson(null, 'Gagal insert chat permission ', 0);
        }
    }

    function getChatPermission()
    {
        $sql = "SELECT id, sender, receiver, created_at, contents
            FROM chat_permission 
            WHERE contents = 'W' AND sender = '$_POST[sender]'
            ORDER BY id";
        $data = AFhelper::dbSelectAll($sql);
        AFhelper::kirimJson($data, 'Get Chat Permission');
    }

    function getChatConfirmation()
    {
        $sql = "SELECT id, sender, receiver, created_at, contents
            FROM chat_permission 
            WHERE contents = 'W' AND receiver = '$_POST[receiver]'
            ORDER BY id";
        $data = AFhelper::dbSelectAll($sql);
        AFhelper::kirimJson($data, 'Get Chat Permission');
    }

    function updateChatConfirmation()
    {
        $sql = "UPDATE chat_permission SET contents = '$_POST[contents]' WHERE id = $_POST[id]";
        $hasil = AFhelper::dbSaveCek($sql);
        if ($hasil[0]) {
            $sql = "SELECT id, sender, receiver, created_at, contents
                FROM chat_permission
                WHERE id = $_POST[id]";
            $data = AFhelper::dbSelectOne($sql);
            if($data->contents == "A") {
                $body = "Votre demande de chat a été acceptée";
            } else {
                $body = "Votre demande de chat a été rejetée";
            }
            $sql_sender = "SELECT idUser, username, CONCAT(first_name, ' ', second_name) fullname, token_push, propic, last_online2 AS last_seen, isonline 
                FROM user
                WHERE username = '".$data->sender."'";
            $user_sender = AFhelper::dbSelectOne($sql_sender);
            $qw[] = $user_sender->token_push;

            $sql_receiver = "SELECT idUser, username, CONCAT(first_name, ' ', second_name) fullname, token_push, propic, last_online2 AS last_seen, isonline 
                FROM user
                WHERE username = '".$data->receiver."'";
            $user_receiver = AFhelper::dbSelectOne($sql_receiver);

            $tgl = date('d/m/Y');
            $sql = "INSERT INTO tb_notification(kategori, judul, isi, keterangan, tanggal, gambar, data, kepada, dibaca, dihapus) 
                VALUES ('mychat', 'UFE Chat!', '".$body." - ".$user_receiver->fullname."', '', '$tgl', '', '', '".$user_sender->idUser."', '-', '-')";
            $aa = AFhelper::dbSaveCek($sql);

            $accesstoken = 'AAAARVfjooY:APA91bEAKbWGNffjb80WnOsnE4U_iNWJOUhW1UqiMsnLiJXah2oFmEcn2Y5EcBvUeCWHWgAfBwmFZHhnCdKvyvrUf4m7okrNCICisXtzNyxfKu4F8FxfhXcnxPICACaUrLQJekNqYZPy';
            $header = array(
                'Content-type: application/json',
                'Authorization: key=' . $accesstoken
            );
            $fcmMsg = array(
                'title' => $user_receiver->fullname,
                'body' => $body,
                'icon' => 'image/look24-logo-s.png',
                'sound' => 'default',
            );
            $fcmData = array(
                'halaman' => 'mychat',
                'nomor' => 'a',
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

            if($data->contents == "A") {
                $sql2 = "INSERT INTO messages(sender, receiver, contents, created_at, status) 
                    VALUES ('".$data->receiver."', '".$data->sender."', '$body', '".$data->created_at."', 'S')";
                $hasil2 = AFhelper::dbSaveReturnID($sql2);
                if ($hasil2 <> 0 && $hasil2 <> '') {
                    $sql2 = "SELECT id, sender, receiver, contents, created_at, status
                        FROM messages
                        WHERE id = $hasil2 LIMIT 1";
                    $data2 = AFhelper::dbSelectOne($sql2);
                    AFhelper::kirimJson($data2, 'Get Message Confirmation');
                } else {
                    AFhelper::kirimJson($data, 'Get Chat Confirmation');
                }
            } else {
                AFhelper::kirimJson($data, 'Get Chat Confirmation');
            }
        } else {
            AFhelper::kirimJson($hasil[1], 'Gagal update chat confirmation ', 0);
        };
    }
    
}
