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

$iw = mysqli_query($koneksi,"select * from tb_tulisan where jenis = 'payment'");
$iw2 = mysqli_fetch_assoc($iw);


$bj = mysqli_query($koneksi,"select * from tb_order where id_order = '$_POST[id_order]'");
$bj2 = mysqli_fetch_assoc($bj);

?>

[   {
"success":1,
"message":"oke",
"tulisan1":"<?php echo $iw2['tulisan1']; ?>",
"tulisan2":"<?php echo $iw2['tulisan2']; ?>",
"tulisan3":"<?php echo $iw2['tulisan3']; ?>",

"tulisan4":"<?php echo $iw2['tulisan4']; ?>",
"tulisan5":"<?php echo $iw2['tulisan5']; ?>",
"tulisan6":"<?php echo $iw2['tulisan6']; ?>",
"tulisan7":"<?php echo $iw2['tulisan7']; ?>",
"tulisan8":"<?php echo $iw2['tulisan8']; ?>",
"tulisan9":"<?php echo $iw2['tulisan9']; ?>",
"tulisan10":"<?php echo $iw2['tulisan10']; ?>",
"tulisan11":"<?php echo $iw2['tulisan11']; ?>",
"harga_asli":"<?php echo $bj2['harga']; ?>",
"harga":"IDR. <?php echo number_format($bj2['harga'],0,".",","); ?>"    }]
    <?php } ?>