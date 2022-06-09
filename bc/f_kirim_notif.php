<!-- <script>
// var delayInMilliseconds = 1200; //1 second

// setTimeout(function() {
//   //your code to be executed after 1 second
// </script>
-->
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



$kj = mysqli_query($koneksi,"select * from user where username = '$_GET[emailtujuan]'  and verifikasi  = 'belum'");
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
$subject = "Kode Verifikasi";

$message = "
<html>
<head>
<title>UFE Indonesie</title>
</head>
<body>
<fieldset style='text-align:left;border:1px solid #707070;padding:10px;border-radius:3px;max-width:600px;'>
<p>Berikut ini kode verifikasi</p>
<table>

<tr>
<td style='font-size:20px;'>".$randd."</td>
</tr>
</table>



<table style='width:100%;margin-top:10px;'>
<tr><td style='font-size:15px;'>
Masukan kode diatas untuk verifikasi email Anda</td></tr></table>


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
$headers .= 'From: UFE Indonésie<admin.ufe@ufe.com>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);

}
?>



<?php echo $_GET['page']."ini1"; ?>


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