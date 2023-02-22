<?php

require_once('db.php');
require_once "helper.php";

$hg = mysqli_query($koneksi,"select * from tb_profile_ufe limit 1");
    $hg2 = mysqli_fetch_array($hg);
    $hasil = [
      "idUser" => $hg2['id_profile'],
      "username" => $hg2['nama_ufe'],
      "first_name" => $hg2['nama_ufe'],
      "second_name" => $hg2['nama_ufe'],
      "deskripsi" => AFhelper::formatTextHTML($hg2['deskripsi']),
      "phone" => $hg2['telepon'],
      "mobile" => $hg2['mobile'],
      "propic" => $hg2['logo_ufe'],
      "token_push" => $hg2['token_push'],
      "alamat" => $hg2['alamat'],
      "link_alamat" => $hg2['link_alamat'],
      "kota" => $hg2['kota'],
      "kodepos" => $hg2['kodepos'],
      "ket2" => $deskk7,
      "fax" => $hg2['fax'],
      "website" => $hg2['website'],
      "cover" => $hg2['foto_cover'],
      "logo" => $hg2['logo_ufe'],
      "company" => $hg2['company'],
      "email_company" => $hg2['email'],
      "alamat_company" => $hg2['alamat'],
      "kota_company" => $hg2['kota_company'],
      "kodepos_company" => $hg2['kodepos'],
      "telp_company" => $hg2['telepon'],
      "fax_company" => $hg2['fax_company'],
      "mobile_company" => $hg2['mobile'],
      "facebook" => $hg2['facebook'],
      "twitter" => $hg2['twitter'],
      "instagram" => $hg2['instagram'],
      "datanotfound" => "pas encore de données. si vous avez des informations sur ce programme, merci de contacter notre admin, merci pour votre contribution.",
    ];

    $response = array(
      'result' => [$hasil],
    );
  header('Content-Type: application/json');
  echo json_encode($response);