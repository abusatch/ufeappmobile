<?php

require_once "helper.php";

$mode = $_GET['mode'];

$reading = new ReadingUser();
switch ($mode) {
    case 'detil':
        $reading->detil();
        break;
    case 'edit':
        $reading->edit();
        break;
    case 'changepwd':
        $reading->changePassword();
        break;
    case 'changeshowprofil':
        $reading->changeShowProfil();
        break;
    case 'changeshowpost':
        $reading->changeShowPost();
        break;
    case 'changeshowchat':
        $reading->changeShowChat();
        break;
    case 'delete':
        $reading->delete();
        break;
    case 'ufecountry':
        $reading->ufeCountry();
        break;
    case 'addufecountry':
        $reading->addUfeCountry();
        break;
    default:
        echo "Mode tidak sesuai";
        break;
}

class ReadingUser
{
    function detil() {
        $email = $_GET['email'];
        $sql = "SELECT u.*, c.name AS country_name, d.name AS ip_country_name
            FROM user u
            LEFT JOIN country c ON(u.country_id = c.code)  
            LEFT JOIN country d ON(u.ip_country = d.code)  
            WHERE u.username = '$email'";
        $data = AFhelper::dbSelectOne($sql);
        $data->propic = $data->propic ? "https://ufe-section-indonesie.org/ufeapp/images/propic/".$data->propic : '';
        AFhelper::kirimJson($data, 'Get Detail User');
    }

    function edit() {
        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $mobile = $_POST['mobile'];
        $profession = $_POST['profession'];
        $company = $_POST['company'];

        if (!$_FILES['image']['tmp_name']) {
            $sql = "UPDATE user 
                SET first_name = '$firstname', second_name = '$lastname', alamat = '$address', phone = '$phone', mobile = '$mobile', 
                    employement = '$profession', company = '$company' 
                WHERE username = '$username'";
        } else {
            $path = $username.substr(date('YmdHis'),0,-1).".png";
            $path2 = "images/propic/".$path;
            $tmp_name = $_FILES['image']['tmp_name'];
            $inputimage = move_uploaded_file($tmp_name,$path2);
            if($inputimage) {
                $sql = "UPDATE user 
                    SET first_name = '$firstname', second_name = '$lastname', alamat = '$address', phone = '$phone', mobile = '$mobile', 
                        employement = '$profession', company = '$company', propic = '$path' 
                    WHERE username = '$username'";
            } else {
                $sql = "UPDATE user 
                    SET first_name = '$firstname', second_name = '$lastname', alamat = '$address', phone = '$phone', mobile = '$mobile', 
                        employement = '$profession', company = '$company' 
                    WHERE username = '$username'";
            }
        }
        AFhelper::dbSave($sql, null, "Données modifiées avec succès");
    }

    function changePassword() {
        $username = $_POST['username'];
        $password_lama = $_POST['password_lama'];
        $password_baru = $_POST['password_baru'];

        date_default_timezone_set('Asia/Jakarta');
        $sql = "SELECT * FROM user WHERE username = '$username' AND password = md5('$password_lama')";
        $data = AFhelper::dbSelectOne($sql);
        if ($data) {
            $sql = "UPDATE user SET 
                password = md5('$password_baru')
                WHERE username = '$username'";
            $hasil = AFhelper::dbSaveCek($sql);
            if($hasil[0]) {
                $sql = "SELECT * FROM user WHERE username = '$username'";
                $data2 = AFhelper::dbSelectOne($sql);
                $data2->propic = $data2->propic ? "https://ufe-section-indonesie.org/ufeapp/images/propic/".$data2->propic : '';
                AFhelper::kirimJson($data2, "Le mot de passe a été changé avec succès");       
            } else {
                AFhelper::kirimJson($hasil[2], $hasil[1], 0); 
            }
        } else {
            AFhelper::kirimJson(null, "Le mot de passe actuel n'est pas correct", 0);
        }
    }

    function delete() {
        $username = $_POST['username'];
        $password_lama = $_POST['password_lama'];

        date_default_timezone_set('Asia/Jakarta');
        $sql = "SELECT * FROM user WHERE username = '$username' AND password = md5('$password_lama')";
        $data = AFhelper::dbSelectOne($sql);
        if ($data) {
            $sql = "DELETE FROM user WHERE username = '$username' AND password = md5('$password_lama')";
            AFhelper::dbSave($sql, null, "compte supprimé avec succès");
        } else {
            AFhelper::kirimJson(null, "Le mot de passe actuel n'est pas correct", 0);
        }
    }

    function changeShowProfil() {
        $email = $_GET['email'];
        $nilai = $_POST['nilai'];
        $sql = "UPDATE user SET show_profil = '$nilai' WHERE username = '$email'";
        AFhelper::dbSave($sql);
    }

    function changeShowPost() {
        $email = $_GET['email'];
        $nilai = $_POST['nilai'];
        $sql = "UPDATE user SET show_post = '$nilai' WHERE username = '$email'";
        AFhelper::dbSave($sql);
    }

    function changeShowChat() {
        $email = $_GET['email'];
        $nilai = $_POST['nilai'];
        $sql = "UPDATE user SET show_chat = '$nilai' WHERE username = '$email'";
        AFhelper::dbSave($sql);
    }

    function ufeCountry() {
        $arr_status = array(
            "O" => "demander l'autorisation",
            "P" => "en attente de confirmation",
            "A" => "autorisation approuvée",
            "R" => "autorisation refusée",
        );
        $email = $_GET['email'];
        $sql = "SELECT * from user where username = '$email'";
        $user = AFhelper::dbSelectOne($sql);

        $sql = "SELECT c.code, c.dial_code, c.code_3, c.name_french AS name , COALESCE(b.status, 'O') AS status
            FROM country c
            LEFT JOIN user_country b ON(c.code = b.country_code AND b.username = '$email')
            WHERE c.is_active = 'Y' 
            ORDER BY c.name_french";
        $data = AFhelper::dbSelectAll($sql);
        $hasil = array();
        foreach ($data as $r) {
            if($r->code == $user->country_id) {
                $r->status = 'A';
            }
            $r->status_label = $arr_status[$r->status];
            array_push($hasil, $r);
        }
        AFhelper::kirimJson($hasil);
    }

    function addUfeCountry() {
        $email = $_GET['email'];
        $country_code = $_GET['country_code'];
        $sql = "INSERT INTO user_country (username, country_code, status) 
            VALUES ('$email', '$country_code', 'P')";
        AFhelper::dbSave($sql, null, "autorisation appliquée avec succès");
    }
}

?>