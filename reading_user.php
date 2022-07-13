<?php

require_once "helper.php";

$mode = $_GET['mode'];

$reading = new ReadingUser();
switch ($mode) {
    case 'detil':
        $reading->detil();
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
        AFhelper::kirimJson($data, 'Get Detail User');
    }
}

?>