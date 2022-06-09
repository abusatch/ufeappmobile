<?php if($_GET['page'] == "regiss"){ ?>
<?php echo $_GET['page']."ini2".$_GET['emailtujuan']; ?>
<br><br><br>
<a  href="meluncurregis:"><button id="klik">tes</button></a>




<script>
window.onload = pageLoad;

function pageLoad() {
setInterval(alertMe,1000);

}
function alertMe() {
  document.getElementById('klik').click();
}


    location = "meluncurregis:";
</script>


<?php }else if($_GET['page'] == "regis"){ ?>
<?php


include('db.php');

$randd = rand(1000,9999);



$kj = mysqli_query($koneksi,"select * from user where username = '$_GET[emailtujuan]'");
$kj2 = mysqli_num_rows($kj);
$kj3 = mysqli_fetch_array($kj);


if($kj2 == 0){
?>    
    {
    "success" : 0,
    "message": "Akses di tolak"
    }
  
  <?php  
}else{


mysqli_query($koneksi,"update user set kode_verif = '$randd' where username = '$_GET[emailtujuan]'");

$to = $_GET['emailtujuan'].",abusatch@gmail.com";
$subject = "Code de vérification";

$message = "
<html>
<head>
<title>UFE Indonesie</title>
</head>
<body>
<fieldset style='text-align:left;border:1px solid #707070;padding:10px;border-radius:3px;max-width:600px;'>
<p>Voici le code de vérification</p>
<table>

<tr>
<td style='font-size:20px;'>".$randd."</td>
</tr>
</table>



<table style='width:100%;margin-top:10px;'>
<tr><td style='font-size:15px;'>
Entrez le code ci-dessus pour vérifier votre email</td></tr></table>


<table style='width:100%;margin-top:15px;'>
<tr><th style='font-size:20px;'>
UFE Section Indonesie</th></tr></table>
<table style='width:100%;'>
<tr><td style='font-size:15px;'>
Jakarta - Indonesie
</td></tr></table>
</fieldset>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: UFE Indonésie<info@ufe-section-indonesie.org>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);

//echo "oke".$_GET['emailtujuan'];

}
?>



<?php //echo $_GET['page']."ini1"; ?>


<script>
    //location = "meluncurregis:";
</script>


<?php
}else if($_GET['page'] == "perpanjang"){
	
	
	include('db.php');
	date_default_timezone_set('Asia/Jakarta');
	$tanggal = date('Y-m-d');
	$tanggal2 = date('Y-m-d H:i:s');
$nf = mysqli_query($koneksi,"select * from user where username = '$_GET[username2]' and password = '$_GET[pss2]'");
$nf2  = mysqli_fetch_assoc($nf);
if(mysqli_num_rows($nf) == 0){
	
	mysqli_query($koneksi,"insert into tb_tes_tulisan (keterangan,tanggal,tanggal2) values ('ket1','$tanggal','$tanggal2')");
	
}	else{
	
	mysqli_query($koneksi,"insert into tb_tes_tulisan (keterangan,tanggal,tanggal2) values ('ket2','$tanggal','$tanggal2')");
	
	
}
	
 ?>

<script>
    location = "meluncurregis:";
</script>

<?php 

} ?>


<?php
// sleep(2);
?>
<!--
// <script>
// }, delayInMilliseconds);
// </script> -->