<?php

echo '[';
include('db.php');
$no = 1;


if(!empty($_GET['jenis'])){
$ew = mysqli_query($koneksi,"select * from tb_menu where jenis = '$_GET[jenis]' ");
}else{
$ew = mysqli_query($koneksi,"select * from tb_template where id_template = '$_GET[idd]' ");
}
while($ew2 = mysqli_fetch_array($ew)){
if($no == 1){}else{echo ",";}

$desk1 = str_replace('\n',"",$ew2['judul']);
$desk2 = str_replace("'","`",$desk1);
$desk3 = str_replace('"',"`",$desk2);
$desk4 = str_replace(str_split('\\/:*?"<>|'), ' ', $desk3);
$desk5 = trim(preg_replace('/\s\s+/', ' ', $desk4));
$desk6 = str_replace("<br>","",$desk5);
$desk7 = str_replace(".","",$desk6);




$deskc1 = str_replace('\n',"",$ew2['deskripsi']);
$deskc2 = str_replace("'","`",$deskc1);
$deskc3 = str_replace('"',"`",$deskc2);
$deskc4 = str_replace(str_split('\\/:*?"<>|'), ' ', $deskc3);
$deskc5 = trim(preg_replace('/\s\s+/', ' ', $deskc4));
$deskc6 = str_replace("<br>","",$deskc5);
$deskc7 = str_replace(".","",$deskc6);

?>
{
"id_actualite":"<?php echo $ew2['id_template'] ?>",
"id_actualite2":"<?php echo $ew2['id_template'] ?>",
"url":"<?php echo $ew2['linkweb'] ?>",
"gambar":"https://ufe-section-indonesie.org/ufeapp/images/actualite/<?php echo $ew2['gambar'] ?>",

"judul":"<?php echo $desk7; ?>",
"deskripsi":"<?php echo $deskc7; ?>"

}
<?php $no++;}

echo "]";
?>