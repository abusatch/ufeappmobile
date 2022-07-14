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
    default:
        echo "Mode tidak sesuai";
        break;
}

class ReadingUser
{
    function detil() {
        $email = $_GET['email'];
        $sql = "SELECT idUser, username, masa_aktif, first_name, second_name, deskripsi, tempat_lahir, tanggal_lahir, phone, mobile, password, 
                propic, level, kode_vip, member_dari, device_id, token_push, alamat, link_alamat, kota, kodepos, ket2, fax, website, cover, 
                logo, company, email_company, alamat_company, kota_company, kodepos_company, telp_company, fax_company, mobile_company, employement, 
                facebook, twitter, instagram, verifikasi, verifikasi_admin, kode_verif, tgl_daftar, tgl_daftar2, warning_member, kirim_email, otp_lupa, 
                last_online, last_online2, kuota_advert, kuota_terpakai
            FROM user 
            WHERE username = '$email'";
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
        AFhelper::dbSave($sql, null, 'Data changed successfully');
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
                AFhelper::kirimJson($data2, 'Password changed successfully');       
            } else {
                AFhelper::kirimJson($hasil[2], $hasil[1], 0); 
            }
        } else {
            AFhelper::kirimJson(null, "Current password is not correct", 0);
        }
    }
}

?>