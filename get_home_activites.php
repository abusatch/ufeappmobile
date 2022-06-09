<?php
include('db.php');

$nj = mysqli_query($koneksi,"select * from user where username = '$_POST[username2]' and password = '$_POST[pss2]'");
$nj2 = mysqli_fetch_assoc($nj);
if(mysqli_num_rows($nj) == 0){



?>

[   {
"success":0,
"message":"akses di tolak"
    }]
<?php
}else{
$idc =mysqli_query($koneksi,"select * from tb_activites where id_jenis = '1'");
$idc2 = mysqli_fetch_assoc($idc);

$idx =mysqli_query($koneksi,"select * from tb_activites where id_jenis = '2'");
$idx2 = mysqli_fetch_assoc($idx);

$ov = mysqli_query($koneksi,"select * from tb_halaman_depan");
$ov2 = mysqli_fetch_assoc($ov);

$t1 = str_replace('\n',"",$idc2['ket_instruktur']);
$t2 = str_replace("'","`",$t1);
$t3 = str_replace('"',"`",$t2);
$t4 = str_replace(str_split('\\/:*?"<>|'), ' ', $t3);
$t5 = trim(preg_replace('/\s\s+/', ' ', $t4));
$t6 = str_replace("<br>","",$t5);
$t7 = str_replace(".","",$t6);


$tx1 = str_replace('\n',"",$idx2['ket_instruktur']);
$tx2 = str_replace("'","`",$tx1);
$tx3 = str_replace('"',"`",$tx2);
$tx4 = str_replace(str_split('\\/:*?"<>|'), ' ', $tx3);
$tx5 = trim(preg_replace('/\s\s+/', ' ', $tx4));
$tx6 = str_replace("<br>","",$tx5);
$tx7 = str_replace(".","",$tx6);

?>

[   {
"success":1,
"message":"oke",
"id_act1":"<?php echo $idc2['id_activites'] ?>",
"id_act2":"<?php echo $idx2['id_activites'] ?>",
"judul1":"<?php echo $idc2['judul'] ?>",
"judul2":"<?php echo $idx2['judul'] ?>",
"desk1":"<?php echo $t7 ?>",
"desk2":"<?php echo $tx7 ?>",
"tulisann7":"<?php echo $ov2['tulisan7'] ?>",
"tulisann9":"<?php echo $ov2['tulisan9'] ?>"

    }]
    <?php } ?>