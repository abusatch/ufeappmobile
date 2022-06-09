<?php 

include('db.php');

date_default_timezone_set('Asia/Jakarta');

$hariini = date('Y-m-d');

$tanggal7 = date('Y-m-d', strtotime($hariini . ' +7 day'));

$re = mysqli_query($koneksi,"select * from user where level = 'vip-admin' and verifikasi_admin = 'sudah'
and kirim_email = 'iya'
");
while($re2 = mysqli_fetch_array($re)){

$masaa = date('D M d, Y', strtotime($re2['masa_aktif'] . ' +0 day'));


if($re2['masa_aktif'] <= $tanggal7){
	
	$to = "abusatch@gmail.com,".$re2['username'];
$subject = "La période active de votre compte expirera";

$message = "
<html>
<head>
<title>UFE Indonésie</title>
</head>
<body>

<fieldset style='text-align:left;border:1px solid #D1D1D1;padding:10px;border-radius:3px;max-width:600px;'>
<table style='width:100%;'>
<tr style='padding:10px 10px 10px 10px;'>
<th style='width:100%;text-align:right;'><img src='http://ufe-section-indonesie.org/pages/wp-content/uploads/2017/11/Asset-2.png' style='width:150px;'/></th>
</tr>
</table>
<table style='width:100%;border-top:1px solid #D1D1D1;margin-top:5px;'>
    <tr>
        <th></th>
    </tr>
    </table>
<table style='width:100%;'>
<tr><th style='font-size:20px;text-align:left;'>
Cher ".$re2['username']."</th></tr></table> 
<table style='width:100%;margin-top:10px;'>
<tr><td style='font-size:15px;'>
Avec ce courriel, nous tenons à vous informer que la période active de votre membre expirera le :
</td></tr></table>
<table style='width:100%;margin-top:10px;'>

<tr>

<td style='font-size:20px;'>".$masaa."</td>
</tr>



</table>
<br>
<table style='width:100%;margin-top:10px;'>
<tr><td style='font-size:15px;'>
Prolongez immédiatement votre période active, ou ignorez cet 
e-mail si vous avez déjà effectué la mise à jour</td></tr></table>

<table style='width:100%;margin-top:10px;'>
<tr><td style='font-size:15px;'>
<a href='https://ufe-section-indonesie.org/ufeapp/unsub.php?e=".$re2['username']."'><span style='cursor:pointer;padding:5px;width:100px;border-radius:4px;border:1px #d1d1d1 solid;'>
Ne me le rappelle plus</span></a>
</td>
</tr>
</table>

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
</fieldset>

</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: UFE Indonésie<indonesie@ufe.org>' . "\r\n";
$headers .= 'Cc: abusatch@gmail.com' . "\r\n";

//mail($to,$subject,$message,$headers);
echo $message;
 mysqli_query($koneksi,"update user set warning_member = 'iya' where  idUser = '$re2[idUser]'");

}

}
?>


