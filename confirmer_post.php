<?php 
//echo $_POST['token'];
include('db.php');

$bf = mysqli_query($koneksi,"select * from user where username = '$_POST[email]' and token_push = '$_POST[token]'");

if(mysqli_num_rows($bf) == 0){
echo "Access denied";    
}else{
    
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('Y-m-d');
    $tanggal2 = date('Y-m-d H:i:s');
    
    $bfw = mysqli_query($koneksi,"select * from tb_banding where username = '$_POST[email]' and tanggal2 = '$tanggal2'");
    
    if(mysqli_num_rows($bfw) == 0){
        $kq = mysqli_query($koneksi,"insert into tb_banding (username,alasan, tanggal,tanggal2, telp)
        values
        ('$_POST[email]',
        '$_POST[text]',
        '$tanggal',
        '$tanggal2',
        '$_POST[mobile]'
        )
        ");
        
        $kg = mysqli_query($koneksi,"select * from user where username = '$_POST[email]'");
  $kg2 = mysqli_fetch_assoc($kg);
  
  if(empty($kg2['first_name'])){
       $namanya = $kg2['username'];
  }else{
           $namanya = $kg2['first_name']." ".$kg2['second_name'];
  }
 
  
  
  
    $to = "abusatch@gmail.com,".$kg2['username'];
$subject = "Demande de déblocage refusée";

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

<p style='font-size:15px;text-align:justify;'><b>Bonjour ".$namanya.",</b> <br><br><br>
Merci, notre équipe examinera votre demande, si votre demande est acceptée, nous vous en informerons par e-mail
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
        ?><?php
	

	
date_default_timezone_set('Asia/Jakarta');

$hariini = date('Y-m-d');

$tanggal7 = date('Y-m-d', strtotime($hariini . ' +7 day'));
	
	
class startSendNotification
{
    
   
	
		function sendNoti($titleNoti, $bodyNoti,$gambarrr){

		define( 'API_ACCESS_KEY', 'AAAARVfjooY:APA91bEAKbWGNffjb80WnOsnE4U_iNWJOUhW1UqiMsnLiJXah2oFmEcn2Y5EcBvUeCWHWgAfBwmFZHhnCdKvyvrUf4m7okrNCICisXtzNyxfKu4F8FxfhXcnxPICACaUrLQJekNqYZPy');
        include 'db.php';


 date_default_timezone_set('Asia/Jakarta');

$hariini = date('Y-m-d');

$tanggal7 = date('Y-m-d', strtotime($hariini . ' +7 day'));

		$ewww = mysqli_query($koneksi,"select * from user where username = '$_POST[email]'");
while ($tyu = mysqli_fetch_array($ewww)){
	
	
$qw[] = $tyu['token_push'];


}
		$fcmMsg = array(
			'title' => $titleNoti,
			'body' => $bodyNoti,
				'icon' => 'image/look24-logo-s.png',
            'sound' => 'default',
            'image' => $gambarrr
    
		);
		
		$fcmFields = array(
	
			'registration_ids' => $qw,
			
			'priority' => 'high',
			'notification' => $fcmMsg
		);

		$headers = array(
			'Authorization: key=' . API_ACCESS_KEY,
			'Content-Type: application/json'
		);
		
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fcmFields ) );
		$result = curl_exec($ch );
		curl_close( $ch );
		echo $result . "\n\n".$qw;
	}

}
?><?php 

$bagian = $_GET['dsafds'];
$nama = $_GET['fdfvcx'];
$tujuan = $_GET['vsde'];




include('db.php');


$ewww = mysqli_query($koneksi,"select * from user where username = '$_POST[email]'");
$ewww2 = mysqli_fetch_assoc($ewww);

if(empty($ewww2['first_name'])){
    $namanya = $ewww2['username'];
}else{
    $namanya = $ewww2['first_name']." ".$ewww2['second_name'];
}


$titleNoti = "Bonjour ".$namanya;
$bodyNoti = "Merci, notre équipe examinera votre demande, si votre demande est acceptée, nous vous en informerons par e-mail";
$actionNoti = ".creche.Creche2Activity";
$gambarrr = "https://icons.iconarchive.com/icons/hopstarter/gloss-mac/256/Get-Info-icon.png";
$callNoti = new startSendNotification();




$callNoti->sendNoti($titleNoti, $bodyNoti,$gambarrr);


?><?php echo "success";
    }
}

?>