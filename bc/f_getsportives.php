<?php

echo '[';
include('db.php');
$no = 1;
$ew = mysqli_query($koneksi,"select * from tb_actualite where visibility = '1' order by id_actualite desc limit 3");
while($ew2 = mysqli_fetch_array($ew)){
if($no == 1){}else{echo ",";}


?>
{
"id":"<?php echo $ew2['id_actualite'] ?>",
"name":"<?php echo $ew2['judul'] ?>",
"location":"<?php echo $ew2['url'] ?>",
"image":"https://ufe-section-indonesie.org/ufeapp/images/actualite/<?php echo $ew2['gambar'] ?>",

"rating":"<?php echo $ew2['id_actualite'] ?>",
"description":"<?php echo $ew2['deskripsi'] ?>"

}
<?php $no++;}

echo "]";
?>