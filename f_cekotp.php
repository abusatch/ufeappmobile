<?php 
	include 'db.php';
// 	$response = array();

	
// 		$response['result'] = "0";
// 		$response['msg'] = "tes".$_POST['emailtujuan'];
		  
$kodeverif = $_POST['t1'].$_POST['t2'].$_POST['t3'].$_POST['t4'];

$de = mysqli_query($koneksi,"select * from user where username = '$_POST[emailtujuan]' and kode_verif = '$kodeverif'");
$de2 = mysqli_num_rows($de);

if($de2 == 0){
 ?>
 {
 "result":"0",
 "msg":"Mauvais code <?php echo $kodeverif."-".$_POST['emailtujuan'] ?>" 
 }
 
 <?php 
}else{
    
    
    
    $nkw = mysqli_query($koneksi,"select * from user where username = '$_POST[emailtujuan]' and kode_verif = '$kodeverif'");
    $nkw2 = mysqli_fetch_assoc($nkw);
    
    if(empty($nkw2['device_id'])){
               mysqli_query($koneksi,"update user set device_id = '$_POST[device_info]' where username = '$_POST[emailtujuan]'");
    }else{
        
        if($_POST['device_info'] == $nkw2['device_id']){
            mysqli_query($koneksi,"update user set device_id = '$_POST[device_info]' where username = '$_POST[emailtujuan]'");
        }else{
            
            
            
  $kg = mysqli_query($koneksi,"select * from user where idUser = '$_POST[emailtujuan]'");
  $kg2 = mysqli_fetch_array($kg);
  
  
  

  
  
  
    $to = "abusatch@gmail.com,".$kg2['username'];
$subject = "Pemberitahuan Akun";

$message = "
<html>
<head>
<title>UFE Indonésie</title>
</head>
<body>
    <center>
    <fieldset style='text-align:left;border:1px solid #D1D1D1;padding:10px;border-radius:3px;max-width:600px;'>
<table style='width:100%;'>
<tr style='padding:10px 10px 10px 10px;'>
<th style='width:100%;text-align:right;'><img src='https://ufe-section-indonesie.org/pages/wp-content/uploads/2017/11/Asset-2.png' style='width:150px;'/></th>
</tr>
</table>
<table style='width:100%;border-top:1px solid #D1D1D1;margin-top:5px;'>
    <tr>
        <th></th>
    </tr>
    </table>

<p style='font-size:15px;text-align:justify;'><b>Bonjour ".$kg2['username'].",</b> <br><br><br>Votre compte est bloqué temporairement, car nous avons remarqué une connexion inhabituelle. <br><br> Veuillez noter que nos conditions <b>ne permettent pas de connexion sur deux ou plusieurs appareils.</b><br><br>Pour débloquer votre compte, vous devez faire une demande de déblocage en cliquant sur le lien ci-dessous:<br>
<br><br>
<table style='width:100%;'>
<tr><td style='text-align:center;'>
<a style='text-decoration: none;' href='https://ufe-section-indonesie.org/ufeapp/confirmer.php?e=".$kg2['username']."&t=".$kg2['token_push']."'><span style='padding-left:20px;padding-right:20px;padding-top:5px;padding-bottom:5px;border-radius:15px;border:1px solid blue;cursor:pointer;color:blue;'>Débloquer mon compte</span></a>
</td>
</tr></table>
</p>
<br>
<table style='width:100%;border-top:1px solid #D1D1D1;margin-top:20px;'>
    <tr>
        <th></th>
    </tr>
    </table>
<table style='width:100%;margin-top:5px;'>
<tr><th style='font-size:20px;text-align:left;'>
UFE Section Indonésie</th></tr></table>

<table style='width:100%;'>
<tr><td style='font-size:15px;'>
Jakarta - Indonésie<br>
e-mail: indonesie@ufe.org<br>
site internet: ufe-section-indonesie.org
</td></tr></table>
</fieldset></center>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: UFE Indonésie<info@ufe-section-indonesie.org>' . "\r\n";
$headers .= 'Cc: abusatch@gmail.com' . "\r\n";

mail($to,$subject,$message,$headers);

         mysqli_query($koneksi,"update user set verifikasi_admin = 'belum' where username = '$_POST[emailtujuan]'");
        }
    }
    
    mysqli_query($koneksi,"update user set verifikasi = 'sudah' where username = '$_POST[emailtujuan]'");
    
 ?>
 {
 "result":"1",
 "msg":"Le code est correct"
 }
 
 <?php } ?>