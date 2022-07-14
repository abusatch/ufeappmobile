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
}

?>