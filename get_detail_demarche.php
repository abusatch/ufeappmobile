<?php

require_once('db.php');

$result = array();


$nj = mysqli_query($koneksi,"select * from user where idUser = '$_GET[idmember]'");
$nj2 = mysqli_fetch_array($nj);

if($nj2['member_dari'] == ""){
$idmemberr = $_GET['idmember'];
}else{
  $idmemberr = $nj2['member_dari'];
}


$je = mysqli_query($koneksi,"select * from tb_profile_ufe limit 1");
$je2 = mysqli_fetch_assoc($je);

if($_GET['filter'] == ""){
  if(empty($_GET['id_demar'])){
$sql_get_data = "select * from tb_halaman_depan ";
  }else{
    $sql_get_data = "SELECT * FROM tb_menu where jenis = 'DEMARCHES' and id_menu = '$_GET[id_demar]'";
  }
}else if($_GET['filter'] == "demarches"){
  $sql_get_data = "SELECT * FROM tb_menu where jenis = 'DEMARCHES' ORDER BY id_menu ASC";
}else if($_GET['filter'] == "menu1"){
  $sql_get_data = "SELECT * FROM tb_menu where jenis = 'MENU1' ORDER BY id_menu ASC";
}else if($_GET['filter'] == "menu2"){
  $sql_get_data = "SELECT * FROM tb_menu where jenis = 'MENU2' ORDER BY id_menu ASC";
}else if($_GET['filter'] == "menu3"){
  $sql_get_data = "SELECT * FROM tb_menu where jenis = 'MENU3' ORDER BY id_menu ASC";
}else if($_GET['filter'] == "menu4"){
  $sql_get_data = "SELECT * FROM tb_menu where jenis = 'MENU4' ORDER BY id_menu ASC";
}else if($_GET['filter'] == "menu5"){
  $sql_get_data = "SELECT * FROM tb_menu where jenis = 'MENU5' ORDER BY id_menu ASC";

}

$koneksi->set_charset("utf8");
$query = $koneksi->query($sql_get_data);

echo"{";
 echo  '"result": [';

$no = 1;
while($row = mysqli_fetch_assoc($query)){

    $hg = mysqli_query($koneksi,"select * from tb_profile_ufe limit 1");
    $hg2 = mysqli_fetch_array($hg);

$alamat1 = str_replace('\n',"",$row['tulisan1']);
$alamat2 = str_replace("'","`",$alamat1);
$alamat3 = str_replace('"',"`",$alamat2);
$alamat4 = str_replace(str_split('\\/:*?"<>|'), ' ', $alamat3);
$alamat5 = trim(preg_replace('/\s\s+/', ' ', $alamat4));
$alamat6 = str_replace("<br>","",$alamat5);
$alamat7 = str_replace(".","",$alamat6);

if(!empty($_GET['id_demar'])){
  $desk1 = str_replace('\n',"",$row['short_desc']);
  $desk2 = str_replace("'","`",$desk1);
  $desk3 = str_replace('"',"`",$desk2);
  $desk4 = str_replace(str_split('\\/:*?"<>|'), ' ', $desk3);
  $desk5 = trim(preg_replace('/\s\s+/', ' ', $desk4));
  $desk6 = str_replace("<br>","",$desk5);
  $desk7 = str_replace(".","",$desk6);
}else{
$desk1 = str_replace('\n',"",$row['tulisan7']);
$desk2 = str_replace("'","`",$desk1);
$desk3 = str_replace('"',"`",$desk2);
$desk4 = str_replace(str_split('\\/:*?"<>|'), ' ', $desk3);
$desk5 = trim(preg_replace('/\s\s+/', ' ', $desk4));
$desk6 = str_replace("<br>","",$desk5);
$desk7 = str_replace(".","",$desk6);
}
// if($no <= 3){}else{

//   $nh = mysqli_query($koneksi,"select * from user where idUser = '$row[id_member_vip]'");
//   $nh2 = mysqli_fetch_array($nh);
  //$result[] = $row;
  if($no == 1){}else{echo ",";}
?>
{
<?php 
$nom = 1;
$nh = mysqli_query($koneksi,"select * from tb_profile_ufe limit 1");
$nh3 = mysqli_num_rows($nh);


$bco = mysqli_query($koneksi,"select * from tb_tulisan where jenis = 'splash_ufe' limit 1");
$bco2 = mysqli_fetch_assoc($bco);

$deskk1 = str_replace('\n',"",$row['tulisan7']);
$deskk2 = str_replace("'","`",$deskk1);
$deskk3 = str_replace('"',"`",$deskk2);
$deskk4 = str_replace(str_split('\\/:*?"<>|'), ' ', $deskk3);
$deskk5 = trim(preg_replace('/\s\s+/', ' ', $deskk4));
$deskk6 = str_replace("<br>","",$deskk5);
$deskk7 = str_replace(".","",$deskk6);
?>
"idUser":"<?php echo $hg2['id_profile']; ?>",
  "username":"Sur \nL`Indonésie",
  "first_name":"<?php echo $row['nama_menu'] ?>",
  "second_name":"Sur \nL`Indonésie",
  "deskripsi":"<?php echo $deskk7; ?>",
  "phone":"<?php echo $hg2['telepon']; ?>",
  "mobile":"<?php echo $hg2['mobile']; ?>",
  "propic":"https://ufe-section-indonesie.org/ufeapp/images/menu/<?php echo $row['gambar2']; ?>",
  "token_push":"<?php echo $hg2['token_push']; ?>",
  "alamat":"<?php echo $alamat7; ?>",
  "link_alamat":"<?php echo $hg2['link_alamat']; ?>",
  "kota":"<?php echo $hg2['kota']; ?>",
  "kodepos":"<?php echo $hg2['kodepos']; ?>",
  "ket2":"<?php echo $desk7; ?>",
  "fax":"<?php echo $hg2['fax']; ?>",
  "website":"<?php echo $hg2['website']; ?>",
  "cover":"https://ufe-section-indonesie.org/ufeapp/images/gunung.png",
  "logo":"https://ufe-section-indonesie.org/ufeapp/images/menu/<?php echo $row['gambar3']; ?>",
  "company":"<?php echo $hg2['company']; ?>",
  "email_company":"<?php echo $hg2['email']; ?>",
  "alamat_company":"<?php echo $alamat7; ?>",
  "kota_company":"<?php echo $hg2['kota_company']; ?>",
  "kodepos_company":"<?php echo $hg2['kodepos']; ?>",
  "telp_company":"<?php echo $hg2['telepon']; ?>",
  "fax_company":"<?php echo $hg2['fax_company']; ?>",
  "mobile_company":"<?php echo $hg2['mobile']; ?>",
  "facebook":"<?php echo $hg2['facebook']; ?>",
  "twitter":"<?php echo $hg2['twitter']; ?>",
  "instagram":"<?php echo $hg2['instagram']; ?>"
  

}
<?php
// }
$no++;}
echo "]}";
//echo json_encode(array('result'=>$result));

?>