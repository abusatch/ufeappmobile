<?php
include('db.php');


$hf = mysqli_query($koneksi,"select * from user where username = '$_POST[username2]'
and password = '$_POST[pss2]'
");

$row = mysqli_fetch_assoc($hf);


$hari = date('D', strtotime($row['masa_aktif'] . "+0 days"));
$bulan = date('M', strtotime($row['masa_aktif'] . "+0 days"));


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


   date_default_timezone_set('Asia/Jakarta');
   $hariini = date('Y-m-d');
   
   	$date1 = date_create($hariini);
	$date2 = date_create($row['masa_aktif']);
				
	$diff = date_diff($date1, $date2);
	$selisih = $diff->format('%R%a');


if(mysqli_num_rows($hf) == 0){
?>
[
{
	"success":0,
	"message":"gagal"
}
]
<?php	
}else{
if($_GET['page'] == "update"){
$dw = mysqli_query($koneksi,"select * from tb_tulisan where jenis = 'update_versi'");
}else{
    $dw = mysqli_query($koneksi,"select * from tb_tulisan where jenis = 'perpanjang'");
}
$dw2 = mysqli_fetch_assoc($dw);


$fed = mysqli_query($koneksi,"select * from tb_version_code ");
$fed2 = mysqli_fetch_assoc($fed);



if($selisih == "+0" || $selisih == "+1"){
    $jorr = "Jour";
}else{
    $jorr = "Jours";
}

?>
[
{
	"success":1,
	"message":"berhasil",
	"tulisan1":"<?php echo $dw2['tulisan1'] ?>",
	"tulisan2":"<?php echo $dw2['tulisan2'] ?>",
	"tulisan3":"<?php echo $dw2['tulisan3'] ?>",
	"tulisan4":"<?php echo $dw2['tulisan4'] ?>",
	"tulisan5":"<?php echo $dw2['tulisan5'] ?>",
	"tulisan6":"<?php echo $dw2['tulisan6'] ?>",
	"tulisan7":"<?php echo $fed2['version_code'] ?>",
	"link_download":"<?php echo $fed2['download'] ?>",
		"link_downloadios":"<?php echo $fed2['download_ios'] ?>",
	"namadepan":"<?php echo $row['first_name'] ?>",
	"namabelakang":"<?php echo $row['second_name'] ?>",	
    "masa_aktif": "<?php echo 'dans '.str_replace('+','',$selisih).' '.$jorr; ?> (<?php echo $masa_ak ?>)"
  
}
]

<?php	
}



?>