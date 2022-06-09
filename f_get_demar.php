<?php

echo '[';
include('db.php');
$no = 1;
if($_GET['jenis'] == "demar"){

    $om = mysqli_query($koneksi,"select * from tb_demar2 where id_demar = '$_GET[iddd]'");
    $om2 = mysqli_fetch_assoc($om);


    $ew = mysqli_query($koneksi,"select * from tb_demar2 where id_kategori = '$om2[id_kategori]' and
    visibility = '1'
    ");
}else{
    $ew = mysqli_query($koneksi,"select * from tb_menu where jenis = 'indonesie' ");
}
    while($ew2 = mysqli_fetch_array($ew)){



if($no == 1){}else{echo ",";}
$desk1 = str_replace('\n',"",$ew2['short_desc']);
$desk2 = str_replace("'","`",$desk1);
$desk3 = str_replace('"',"`",$desk2);
$desk4 = str_replace(str_split('\\/:*?"<>|'), ' ', $desk3);
$desk5 = trim(preg_replace('/\s\s+/', ' ', $desk4));
$desk6 = str_replace("<br>","",$desk5);
$desk7 = str_replace(".","",$desk6);

?>
{
"id_actualite":"<?php echo $ew2['id_demar'] ?>",
"id_actualite2":"<?php echo $ew2['id_demar'] ?>",
"url":"<?php echo $ew2['url'] ?>",
"gambar":"https://ufe-section-indonesie.org/ufeapp/images/menu/<?php echo $ew2['gambar'] ?>",

"judul":"<?php echo $ew2['judul'] ?>",
"deskripsi":"<?php echo $desk7 ?>"

}
<?php 

$no++;}

echo "]";
?>