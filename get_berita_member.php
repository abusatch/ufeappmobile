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

if($_GET['filter'] == ""){
  if(!empty($_GET['id'])){


    $pd = mysqli_query($koneksi,"select * from tb_template where id_template = '$_GET[id]'");
    $pd2 = mysqli_fetch_assoc($pd); 

$sql_get_data = "SELECT * FROM tb_template where keterangan = 'release' and visibility = '1' 
and id_member_vip = '$pd2[id_member_vip]'
group by id_member_vip ORDER BY id_template asc";


//echo "ini".$pd2['id_member_vip'];

  }else{
    $sql_get_data = "SELECT * FROM tb_template where keterangan = 'release' and visibility = '1' group by id_member_vip ORDER BY id_template asc";


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


  if($no == 1){}else{echo ",";}
?>
{
<?php 
$nom = 1;



  $nh = mysqli_query($koneksi,"select * from tb_template where id_member_vip = '$row[id_member_vip]' 
  and keterangan = 'release' and visibility = '1' order by id_template desc limit 3");

$nh3 = mysqli_num_rows($nh);


while($nh2 = mysqli_fetch_array($nh)){

$judol1 = str_replace("&petiksatu&","\'",$nh2['judul']);
$judol2 = str_replace("&petikdua&",'\"',$judol1);
    
$deskripso1 = str_replace("&petiksatu&","\'",$nh2['deskripsi']);
$deskripso2 = str_replace("&petikdua&",'\"',$deskripso1);

    
    
    
    
    
$desk1 = str_replace('\n',"",$row['judul']);
$desk2 = str_replace("'","`",$desk1);
$desk3 = str_replace('"',"`",$desk2);
$desk4 = str_replace(str_split('\\/:*?"<>|'), ' ', $desk3);
$desk5 = trim(preg_replace('/\s\s+/', ' ', $desk4));
$desk6 = str_replace("<br>","",$desk5);
$desk7 = str_replace(".","",$desk6);    


$deskk1 = str_replace('\n',"",$row['deskripsi']);
$deskk2 = str_replace("'","`",$deskk1);
$deskk3 = str_replace('"',"`",$deskk2);
$deskk4 = str_replace(str_split('\\/:*?"<>|'), ' ', $deskk3);
$deskk5 = trim(preg_replace('/\s\s+/', ' ', $deskk4));
$deskk6 = str_replace("<br>","",$deskk5);
$deskk7 = str_replace(".","",$deskk6);    
    
    ?>
"berita<?php echo $nom ?>_gbr":"https://ufe-section-indonesie.org/ufeapp/images/actualite/<?php echo $nh2['gambar'] ?>",
"berita<?php echo $nom ?>_judul":"<?php echo $desk7 ?>",
"berita<?php echo $nom ?>_deskripsi":"<?php echo $deskk7; ?>",
"berita<?php echo $nom ?>_url":"<?php echo $nh2['linkweb'] ?>",

<?php $nom++;} ?>
    
<?php 
if($nh3 == 1){
?>
"berita2_gbr":"",
"berita2_judul":"",
"berita2_deskripsi":"",
"berita3_gbr":"",
"berita3_judul":"",
"berita3_deskripsi":"",
"berita2_url":"",
"berita3_url":"",

<?php }else if($nh3 == 0){
?>
"berita1_gbr":"",
"berita1_judul":"",
"berita1_deskripsi":"",
"berita1_url":"",
"berita2_gbr":"",
"berita2_judul":"",
"berita2_deskripsi":"",
"berita2_url":"",
"berita3_gbr":"",
"berita3_judul":"",
"berita3_deskripsi":"",
"berita3_url":"",


<?php }else if($nh3 == 2){ ?>

"berita3_gbr":"",
"berita3_judul":"",
"berita3_deskripsi":"",
"berita3_url":"",


<?php } ?>

<?php 
$hg = mysqli_query($koneksi,"select * from user where idUser = '$row[id_member_vip]'");
$hg2 = mysqli_fetch_array($hg);

$judul1 = str_replace("&petiksatu&","\'",$row['judul']);
$judul2 = str_replace("&petikdua&",'\"',$judul1);

$deskripsi1 = str_replace("&petiksatu&","\'",$row['deskripsi']);
$deskripsi2 = str_replace("&petikdua&",'\"',$deskripsi1);


$vip_deskripsi1 = str_replace("&petiksatu&","\'",$hg2['deskripsi']);
$vip_deskripsi2 = str_replace("&petikdua&",'\"',$vip_deskripsi1);
$vip_deskripsi3 = str_replace("'","",$vip_deskripsi2);
$vip_deskripsi4 = str_replace("é","e",$vip_deskripsi3);
$vip_deskripsi5 = str_replace("è","e",$vip_deskripsi4);


$company1 = str_replace("&petiksatu&","'",$hg2['company']);

?>
"vip_gbr":"https://ufe-section-indonesie.org/ufeapp/images/propic/<?php echo $hg2['logo'] ?>",
"vip_judul":"<?php echo $company1 ?>",
"vip_deskripsi":"<?php if(strlen($vip_deskripsi5) >= 30){ echo substr($vip_deskripsi5,0,30).""; }else{echo $vip_deskripsi5;} ?>",
"ket":"String?",
"id_actualite": "<?php echo $row['id_template'] ?>",
"id_member": "<?php echo $row['id_template'] ?>",
"judul": "<?php echo $judul2 ?>",
"deskripsi": "<?php //echo $deskripsi2 ?>tes123",
"gambar": "https://ufe-section-indonesie.org/ufeapp/images/propic/<?php echo $hg2['cover'] ?>",
"tanggal": "<?php echo $judul2 ?>",
"tanggal2": "<?php echo $judul2 ?>",
"url": "<?php echo $row['linkweb'] ?>",
"email": "<?php echo $nh2['linkweb'] ?>",
"first_name":"<?php echo $hg2['first_name'] ?>",
"second_name":"<?php echo $hg2['second_name'] ?>",
"alamat":"<?php echo $hg2['alamat'] ?>",
"kota":"<?php echo $hg2['kota'] ?>",
"kodepos":"<?php echo $hg2['kodepos'] ?>",
"ket2":"<?php echo $hg2['ket2'] ?>",
"phone":"<?php echo $hg2['phone'] ?>",
"fax":"<?php echo $hg2['fax'] ?>",
"email2":"<?php echo $hg2['username'] ?>",
"website":"<?php echo $hg2['website'] ?>",
"success":1,
"keterangan": "<?php echo $judul2 ?>"
}
<?php
// }
$no++;}
echo "]}";
//echo json_encode(array('result'=>$result));

?>