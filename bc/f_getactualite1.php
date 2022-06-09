<?php

echo '[';
include('db.php');
$no = 1;
$ew = mysqli_query($koneksi,"select * from tb_actualite where visibility = '1' order by id_actualite desc limit 3");
while($ew2 = mysqli_fetch_array($ew)){
if($no == 1){}else{echo ",";}


?>
{
"id_actualite":"<?php echo $ew2['id_actualite'] ?>",
"id_actualite2":"<?php echo $ew2['id_actualite'] ?>",
"url":"<?php echo $ew2['url'] ?>",
"gambar":"https://ufe-section-indonesie.org/ufeapp/images/actualite/<?php echo $ew2['gambar'] ?>",

"judul":"<?php echo $ew2['judul'] ?>",
"deskripsi":"<?php echo $ew2['deskripsi'] ?>"

}
<?php $no++;}

echo "]";
?>