<?php
header('Content-Type: application/json; charset=utf-8');
echo '[';
include('db.php');
$no = 1;
date_default_timezone_set('Asia/Jakarta');
$tanggal = date('Y-m-d');
$ew = mysqli_query($koneksi,"select * from tb_template a, user b where a.id_member_vip = b.idUser and a.visibility = '1' and a.keterangan = 'release' 
	 group by a.id_member_vip order by a.id_template asc");
while($ew2 = mysqli_fetch_array($ew)){
if($no == 1){}else{echo ",";}
$jh = mysqli_query($koneksi,"select * from tb_template where id_member_vip = '$fe2[id_member_vip]' order by id_template desc");
$jh2 = mysqli_fetch_array($jh);

$koneksi->set_charset("utf8");
$de = mysqli_query($koneksi,"select * from user where idUser = '$fe2[id_member_vip]'  order by idUser asc limit 1");
$de2 = mysqli_fetch_assoc($de); 







$dess2 = str_replace("'","`",$ew2['deskripsi']);
$dess3 = str_replace("é","e",$dess2);
?>
{
"id_actualite":"<?php echo $ew2['id_template'] ?>",
"id_actualite2":"<?php echo $ew2['id_template'] ?>",
"url":"<?php echo $ew2['linkweb'] ?>",
"gambar":"https://ufe-section-indonesie.org/ufeapp/images/propic/<?php echo $ew2['logo'] ?>",
"judul":"<?php echo $ew2['judul'] ?>",
"success": 1,
<?php 
$nom = 1;
$nh = mysqli_query($koneksi,"select * from tb_template where id_member_vip = '$ew2[id_member_vip]' and keterangan = 'release' and visibility = '1' order by id_template desc limit 3");
$nh3 = mysqli_num_rows($nh);


while($nh2 = mysqli_fetch_array($nh)){

$judol1 = str_replace("&petiksatu&","\'",$nh2['judul']);
$judol2 = str_replace("&petikdua&",'\"',$judol1);
    
$deskripso1 = str_replace("&petiksatu&","\'",$nh2['deskripsi']);
$deskripso2 = str_replace("&petikdua&",'\"',$deskripso1);
  ?>
"berita<?php echo $nom ?>_gbr":"https://ufe-section-indonesie.org/ufeapp/images/actualite/<?php echo $nh2['gambar'] ?>",
"berita<?php echo $nom ?>_judul":"<?php echo $judol2 ?>",
"berita<?php echo $nom ?>_deskripsi":"<?php if(strlen($deskripso2) >= 70){ echo substr($deskripso2,0,70).".."; }else{echo $deskripso;} ?>",
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
"tes111": "123"
}
<?php 
$no++;}
echo "]";
?>