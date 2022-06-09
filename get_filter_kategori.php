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
$fgt = mysqli_query($koneksi,"select * from tb_actualite where visibility = '1' order by tanggal desc limit 1");
$fgt2 = mysqli_fetch_assoc($fgt);

  if(!empty($_GET['id'])){


  





$sql_get_data = "select * from tb_kategori_artikel order by nama_kategori asc";


//echo "ini".$pd2['id_member_vip'];

  }else{
    


$sql_get_data = "select * from tb_kategori_artikel order by nama_kategori asc";

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
?>

 {
      "berita1_gbr": "https://ufe-section-indonesie.org/ufeapp/images/actualite/",
      "berita1_judul": "",
      "berita1_deskripsi": "",
      "berita1_url": "",
      "berita2_gbr": "",
      "berita2_judul": "All",
      "berita2_deskripsi": "",
      "berita3_gbr": "",
      "berita3_judul": "",
      "berita3_deskripsi": "",
      "berita2_url": "",
      "berita3_url": "",
      "vip_gbr": "https://ufe-section-indonesie.org/ufeapp/images/propic/",
      "vip_judul": "",
      "vip_deskripsi": "",
      "ket": "String?",
      "id_actualite": "all",
      "id_member": "",
      "judul": "",
      "deskripsi": "tes123",
      "gambar": "https://ufe-section-indonesie.org/ufeapp/images/propic/",
      "tanggal": "",
      "tanggal2": "",
      "url": "",
      "email": "",
      "first_name": "",
      "second_name": "",
      "alamat": "",
      "kota": "",
      "kodepos": "",
      "ket2": "",
      "phone": "",
      "fax": "",
      "email2": "",
      "website": "",
      "success": 1,
      "keterangan": ""
    }

<?php
$no = 1;
while($row = mysqli_fetch_assoc($query)){


//  if($no == 1){}else{echo ",";}
?>
,{
<?php 
$nom = 1;



  $nh = mysqli_query($koneksi,"select * from tb_actualite where visibility = '1' order by tanggal desc limit 1");

$nh3 = mysqli_num_rows($nh);


while($nh2 = mysqli_fetch_array($nh)){

$judol1 = str_replace("&petiksatu&","\'",$row['judul']);
$judol2 = str_replace("&petikdua&",'\"',$judol1);
    
$deskripso1 = str_replace("&petiksatu&","\'",$row['deskripsi']);
$deskripso2 = str_replace("&petikdua&",'\"',$deskripso1);





$hari = date('D', strtotime($row['tanggal'] . "+0 days"));
$bulan = date('M', strtotime($row['tanggal'] . "+0 days"));


if($hari == "Sun"){
    $hari2 = "Dimanche -";
}else if($hari == "Mon"){
    $hari2 = "Lundi -";    
}else if($hari == "Tue"){
    $hari2 = "Mardi -";
}else if($hari == "Wed"){
    $hari2 = "Mercredi -";
}else if($hari == "Thu"){
    $hari2 = "Jeudi -";
}else if($hari == "Fri"){
    $hari2 = "Vendredi -";
}else if($hari == "Sat"){
    $hari2 = "Samedi -";
}


if($bulan == "Jan"){
    $bulan2 = "Jan";
}else if($bulan == "Feb"){
    $bulan2 = "Fév.";
}else if($bulan == "Mar"){
    $bulan2 = "Mars";
}else if($bulan == "Apr"){
    $bulan2 = "Avr.";
}else if($bulan == "May"){
    $bulan2 = "Mai";
}else if($bulan == "Jun"){
    $bulan2 = "Juin";
}else if($bulan == "Jul"){
    $bulan2 = "Juillet";
}else if($bulan == "Aug"){
    $bulan2 = "Août";
}else if($bulan == "Sep"){
    $bulan2 = "Sep.";
}else if($bulan == "Oct"){
    $bulan2 = "Oct.";
}else if($bulan == "Nov"){
    $bulan2 = "Nov.";
}else if($bulan == "Dec"){
    $bulan2 = "Déc.";

    
}else {
    $bulan2 = $bulan;
}


$masa_ak = $hari2.' '.date('d ',strtotime($ew2['masa_aktif'] . "+0 days")).$bulan2.date(' Y',strtotime($ew2['masa_aktif'] . "+0 days"));
    
    
    $mc = mysqli_query($koneksi,"select * from tb_kategori_artikel where id_kategori = '$row[id_kate]'");

$mc2 = mysqli_fetch_assoc($mc);
    
    
    ?>
"berita<?php echo $nom ?>_gbr":"https://ufe-section-indonesie.org/ufeapp/images/actualite/<?php echo $row['gambar'] ?>",
"berita<?php echo $nom ?>_judul":"<?php echo $judol2 ?>",
"berita<?php echo $nom ?>_deskripsi":"<?php if(strlen($deskripso2) >= 50){ echo substr($deskripso2,0,50).".."; }else{echo $deskripso2;} ?>",
"berita<?php echo $nom ?>_url":"<?php echo $row['url'] ?>",

<?php $nom++;} ?>
    
<?php 
if($nh3 == 1){
?>
"berita2_gbr":"",
"berita2_judul":"<?php echo $row['nama_kategori']; ?>",
"berita2_deskripsi":"<?php echo $mc2['nama_kategori'] ?>",
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
"id_actualite": "<?php echo $row['id_kategori'] ?>",
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