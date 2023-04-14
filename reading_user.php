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
    case 'delete':
        $reading->delete();
        break;
    case 'ufecountry':
        $reading->ufeCountry();
        break;
    default:
        echo "Mode tidak sesuai";
        break;
}

class ReadingUser
{
    function detil() {
        $email = $_GET['email'];
        $sql = "SELECT u.idUser, u.username, u.masa_aktif, u.first_name, u.second_name, u.deskripsi, u.tempat_lahir, u.tanggal_lahir, u.phone, u.mobile, 
            u.password, u.propic, u.level, u.kode_vip, u.member_dari, u.device_id, u.token_push, u.alamat, u.link_alamat, u.kota, u.kodepos, u.ket2, u.fax, 
            u.website, u.cover, u.logo, u.company, u.email_company, u.alamat_company, u.kota_company, u.kodepos_company, u.telp_company, u.fax_company, u.mobile_company, 
            u.employement, u.facebook, u.twitter, u.instagram, u.verifikasi, u.verifikasi_admin, u.kode_verif, u.tgl_daftar, u.tgl_daftar2, u.warning_member, u.kirim_email,
            u.otp_lupa, u.last_online, u.last_online2, u.kuota_advert, u.kuota_terpakai, u.country_id, u.ip_address, u.ip_country, u.ip_city, c.name AS country_name, d.name AS ip_country_name
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

    function ufeCountry() {
        $email = $_GET['email'];
        $sql = "SELECT * from country ORDER BY name";
        $data = AFhelper::dbSelectAll($sql);
        AFhelper::kirimJson($data);
    }
}

?>