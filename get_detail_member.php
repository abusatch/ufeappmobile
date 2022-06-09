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


$je = mysqli_query($koneksi,"select * from tb_template where id_template = '$_GET[id]'");
$je2 = mysqli_fetch_assoc($je);

if($_GET['filter'] == ""){
$sql_get_data = "SELECT * FROM tb_template where keterangan = 'release' 
and visibility = '1' and id_template = '$_GET[id]'  group by id_member_vip ORDER BY id_template asc";
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

    $hg = mysqli_query($koneksi,"select * from user where idUser = '$row[id_member_vip]'");
    $hg2 = mysqli_fetch_array($hg);
// if($no <= 3){}else{

//   $nh = mysqli_query($koneksi,"select * from user where idUser = '$row[id_member_vip]'");
//   $nh2 = mysqli_fetch_array($nh);
  //$result[] = $row;
  if($no == 1){}else{echo ",";}
?>
{
<?php 
$nom = 1;
$nh = mysqli_query($koneksi,"select * from tb_template where id_member_vip = '$row[id_member_vip]' and keterangan = 'release' and visibility = '1' order by id_template desc limit 3");
$nh3 = mysqli_num_rows($nh);
?>
"idUser":"<?php echo $hg2['idUser']; ?>",
  "username":"<?php echo $hg2['username']; ?>",
  "first_name":"<?php echo $hg2['first_name']; ?>",
  "second_name":"<?php echo $hg2['second_name']; ?>",
  "deskripsi":"<?php //echo $hg2['deskripsi']; ?>",
  "phone":"<?php echo $hg2['phone']; ?>",
  "mobile":"<?php echo $hg2['mobile']; ?>",
  "propic":"<?php echo $hg2['propic']; ?>",
  "token_push":"<?php echo $hg2['token_push']; ?>",
  "alamat":"<?php echo $hg2['alamat']; ?>",
  "link_alamat":"<?php echo $hg2['link_alamat']; ?>",
  "kota":"<?php echo $hg2['kota']; ?>",
  "kodepos":"<?php echo $hg2['kodepos']; ?>",
  "ket2":"<?php echo $hg2['ket2']; ?>",
  "fax":"<?php echo $hg2['fax']; ?>",
  "website":"<?php echo $hg2['website']; ?>",
  "cover":"https://ufe-section-indonesie.org/ufeapp/images/propic/<?php echo $hg2['cover']; ?>",
  "logo":"https://ufe-section-indonesie.org/ufeapp/images/propic/<?php echo $hg2['logo']; ?>",
  "company":"<?php echo $hg2['company']; ?>",
  "email_company":"<?php echo $hg2['email_company']; ?>",
  "alamat_company":"<?php echo $hg2['alamat_company']; ?>",
  "kota_company":"<?php echo $hg2['kota_company']; ?>",
  "kodepos_company":"<?php echo $hg2['kodepos_company']; ?>",
  "telp_company":"<?php echo $hg2['telp_company']; ?>",
  "fax_company":"<?php echo $hg2['fax_company']; ?>",
  "mobile_company":"<?php echo $hg2['mobile_company']; ?>",
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