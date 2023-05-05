<?php

require_once "helper.php";

$mode = $_GET['mode'];

$reading = new ReadingArticle();
switch ($mode) {
  case 'lihat':
    $reading->lihat();
    break;
  case 'profilambasador':
    $reading->profilAmbasador();
    break;
  default:
    $reading->lihat();
    break;
}

class ReadingArticle {

  function lihat() {
    $username = $_GET['username'];
    $halaman = $_GET['halaman'];
    $jenis = $_GET['jenis'];
    $id_template = $_GET['id_template'];
  
    $where = "";
  
    if(!empty($username)) {
      $sql = "SELECT * from user where username = '$username'";
    } else {
      $country_id = AFhelper::countryID();
      $sql = "SELECT * from user where kode_vip = '$country_id'";
    }
    $user = AFhelper::dbSelectOne($sql);
    $idUser = $user->idUser;
    $where .= " AND a.id_member_vip = '$idUser'";
  
    if($jenis == "all") {
      $where .= "";
    } else if($jenis == "pending") {
      $where .= " AND a.keterangan = 'pending'";
    } else {
      $where .= " AND a.keterangan = 'release'";
    }
  
    if(!empty($id_template)) {
      $where = " AND a.id_template = '$id_template'";
    }
  
    if(empty($halaman)) {
      $halaman = 0;  
    }
  
    $urutan = $halaman + 1;
    $offset = " offset $halaman";
  
    $sql_get_data = "SELECT a.*, b.username, b.first_name, b.second_name, b.propic
      FROM tb_template a
      JOIN user b ON(a.id_member_vip = b.idUser)
      WHERE a.visibility = '1' $where ORDER BY a.id_template DESC limit 10 $offset";
  
    $data = AFhelper::dbSelectAll($sql_get_data);
    $hasil = array();
  
    foreach ($data as $row) {
      $tgl = explode("-", $row->tanggal);
      $propic = $row->propic ? "https://ufe-section-indonesie.org/ufeapp/images/propic/".$row->propic : '';
      $a = array(
        "id_advert" => $row->id_template,
        "id_member" => $row->id_member_vip,
        "judul" => AFhelper::formatText($row->judul),
        "deskripsi" => AFhelper::formatText($row->deskripsi),
        "gambar" => "https://ufe-section-indonesie.org/ufeapp/images/actualite/".$row->gambar,
        "tanggal" => $tgl[2]."/".$tgl[1]."/".$tgl[0],
        "tanggal2" => $row->tanggal2,
        "url" => $row->linkweb,
        "email" => $row->username,
        "urutan" => "$urutan",
        "keterangan" =>  AFhelper::formatText($row->keterangan),
        "first_name" => $row->first_name,
        "second_name" => $row->second_name,
        "propic" => $propic,
      );
      array_push($hasil, $a);
      $urutan++;
    }
      
    AFhelper::kirimJson($hasil);
  }

  function profilAmbasador() {
    $country_id = AFhelper::countryID();
    $sql = "SELECT u.idUser, u.username, u.masa_aktif, u.first_name, u.second_name, u.deskripsi, u.tempat_lahir, u.tanggal_lahir, u.phone, u.mobile, 
        u.password, u.propic, u.level, u.kode_vip, u.member_dari, u.device_id, u.token_push, u.alamat, u.link_alamat, u.kota, u.kodepos, u.ket2, u.fax, 
        u.website, u.cover, u.logo, u.company, u.email_company, u.alamat_company, u.kota_company, u.kodepos_company, u.telp_company, u.fax_company, u.mobile_company, 
        u.employement, u.facebook, u.twitter, u.instagram, u.verifikasi, u.verifikasi_admin, u.kode_verif, u.tgl_daftar, u.tgl_daftar2, u.warning_member, u.kirim_email,
        u.otp_lupa, u.last_online, u.last_online2, u.kuota_advert, u.kuota_terpakai, u.country_id, u.ip_address, u.ip_country, u.ip_city, c.name AS country_name, d.name AS ip_country_name
        FROM user u
        LEFT JOIN country c ON(u.country_id = c.code)  
        LEFT JOIN country d ON(u.ip_country = d.code)  
        WHERE u.kode_vip = '$country_id'";
    $data = AFhelper::dbSelectOne($sql);
    $data->propic = $data->propic ? "https://ufe-section-indonesie.org/ufeapp/images/propic/".$data->propic : '';
    AFhelper::kirimJson($data, 'Get Detail User');
}


}

?>