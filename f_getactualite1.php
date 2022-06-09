<?php

echo '[';
include('db.php');
$no = 1;
$ew = mysqli_query($koneksi,"select * from tb_actualite where visibility = '1' order by id_actualite desc limit 3");
while($ew2 = mysqli_fetch_array($ew)){
if($no == 1){}else{echo ",";}




$hari = date('D', strtotime($ew2['tanggal'] . "+0 days"));
$bulan = date('M', strtotime($ew2['tanggal'] . "+0 days"));


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





$mc = mysqli_query($koneksi,"select * from tb_kategori_artikel where id_kategori = '$ew2[id_kate]'");

$mc2 = mysqli_fetch_assoc($mc);



$deskk1 = str_replace('\n',"",$ew2['judul']);
$deskk2 = str_replace("'","`",$deskk1);
$deskk3 = str_replace('"',"`",$deskk2);
$deskk4 = str_replace(str_split('\\/:*?"<>|'), ' ', $deskk3);
$deskk5 = trim(preg_replace('/\s\s+/', ' ', $deskk4));
$deskk6 = str_replace("<br>","",$deskk5);
$deskk7 = str_replace(".","",$deskk6);


?>
{
"id_actualite":"<?php echo $ew2['id_actualite'] ?>",
"id_actualite2":"<?php echo $ew2['id_actualite'] ?>",
"url":"<?php echo $ew2['url'] ?>",
"gambar":"https://ufe-section-indonesie.org/ufeapp/images/actualite/<?php echo $ew2['gambar'] ?>",

"judul":"<?php echo $deskk7 ?>",
"kategori":"<?php echo $mc2['nama_kategori'] ?>",
"tanggal":"<?php echo $masa_ak ?>",
"deskripsi":"<?php echo $ew2['deskripsi'] ?>"

}
<?php $no++;}

echo "]";
?>