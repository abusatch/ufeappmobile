<?php
include('db.php');

$nj = mysqli_query($koneksi,"select * from user where username = '$_POST[username2]'
 and password = '$_POST[pss2]'");
$nj2 = mysqli_fetch_assoc($nj);
if(mysqli_num_rows($nj) == 0){
?>

[   {
"success":0,
"message":"akses di tolak"
    }]
<?php
}else{




$hari = date('D', strtotime($nj2['masa_aktif'] . "+0 days"));
$bulan = date('M', strtotime($nj2['masa_aktif'] . "+0 days"));


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


$masa_ak = $hari2.' '.date('d ',strtotime($nj2['masa_aktif'] . "+0 days")).$bulan2.date(' Y',strtotime($nj2['masa_aktif'] . "+0 days"));


$mr  = mysqli_query($koneksi,"select * from tb_halaman_depan");
$mr2 = mysqli_fetch_assoc($mr);


$desk1 = str_replace('\n',"-enter-",$mr2['tulisan8']);
$desk2 = str_replace("'","`",$desk1);
$desk3 = str_replace('"',"-petikdua-",$desk2);
$desk4 = str_replace(str_split('\\/:*?"<>|'), ' ', $desk3);
$desk5 = trim(preg_replace('/\s\s+/', ' ', $desk4));
$desk6 = str_replace("<br>","-enter-",$desk5);
$desk7 = str_replace(".","-titik-",$desk6);

?>

[   {
"success":1,
"message":"oke",
"propic":"https://ufe-section-indonesie.org/ufeapp/images/propic/<?php echo $nj2['propic']; ?>",
"first_name":"<?php echo $nj2['first_name'] ?>",
"level":"<?php echo $nj2['level'] ?>",

"masa_aktif":"<?php echo $masa_ak; ?>",
"second_name":"<?php echo $nj2['second_name'] ?>",
"address":"<?php echo $nj2['alamat'] ?>",
"phone":"<?php echo $nj2['phone'] ?>",
"tulisan8":"<?php echo $desk7 ?>",

"mobile":"<?php echo $nj2['fax'] ?>"
    }]
    <?php } ?>