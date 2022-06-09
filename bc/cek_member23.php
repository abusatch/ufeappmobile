<?php 

include('db.php');

date_default_timezone_set('Asia/Jakarta');

$hariini = date('Y-m-d');

$tanggal7 = date('Y-m-d', strtotime($hariini . ' +7 day'));

$re = mysqli_query($koneksi,"select * from user where level = 'vip-admin' and verifikasi_admin = 'sudah'");
while($re2 = mysqli_fetch_array($re)){

$masaa = date('D M d, Y', strtotime($re2['masa_aktif'] . ' +0 day'));


if($re2['company'] == ""){
	
	$to = "abusatch@gmail.com,".$re2['username'];
$subject = "Veuillez remplir les données de votre profil d’entreprise";

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
<tr><td style='font-size:20px;'>
Nous vous écrivons pour vous rappeler de remplir votre profil d’entreprise
</td></tr></table>
<table style='width:100%;margin-top:10px;'>




</table>
<br>
<table style='width:100%;margin-top:10px;'>
<tr><td style='font-size:20px;'>
Nous espérons que cette aide, bonne chance.</td></tr></table>
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
$headers .= 'From: <indonesie@ufe.org>' . "\r\n";
$headers .= 'Cc: abusatch@gmail.com' . "\r\n";

mail($to,$subject,$message,$headers);

 mysqli_query($koneksi,"update user set warning_member = 'iya' where  idUser = '$re2[idUser]'");

}

}
?>















	<?php
	
	
date_default_timezone_set('Asia/Jakarta');

$hariini = date('Y-m-d');

$tanggal7 = date('Y-m-d', strtotime($hariini . ' +7 day'));
	
	
class startSendNotification
{
	
		function sendNoti($titleNoti, $bodyNoti,$gambarrr){
// 	function sendNoti($titleNoti, $bodyNoti){
		define( 'API_ACCESS_KEY', 'AAAARVfjooY:APA91bEAKbWGNffjb80WnOsnE4U_iNWJOUhW1UqiMsnLiJXah2oFmEcn2Y5EcBvUeCWHWgAfBwmFZHhnCdKvyvrUf4m7okrNCICisXtzNyxfKu4F8FxfhXcnxPICACaUrLQJekNqYZPy');
        include 'db.php';

		$ewww = mysqli_query($koneksi,"select * from user where level = 'vip-admin' and (company = '' or company = null) and verifikasi_admin = 'sudah'");
while ($tyu = mysqli_fetch_array($ewww)){
	
	
$qw[] = $tyu['token_push'];


}
		$fcmMsg = array(
			'title' => $titleNoti,
			'body' => $bodyNoti,
				'icon' => 'image/look24-logo-s.png',
// 			'click_action' => "creche",
            'image' => $gambarrr
            // 'icon' => 'image/look24-logo-s.png'
// 			'link' => 'main'
		);
		
		$fcmFields = array(
		//	'to' => "e2Ns7U3A0GI:APA91bFVM1soWWG-MrQAsjkiuxgkMdnDdZY3jKzYnhzcx4bJFblyuAdBTkiocnrJNBOWCQuieQVNoOWIttpknML46HF-zgjeEHsm9iGvZ4wfyShCKVX-BO83yLSnq4AoVhIUvqXT2sYq",
		//	'registration_ids' => $registrationIDs,
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
?>

<?php 

$bagian = $_GET['dsafds'];
$nama = $_GET['fdfvcx'];
$tujuan = $_GET['vsde'];


// include ('koneksi3.php');

// $iu = mysqli_query($con,"select * from temanuser where idtemanuser = '$_POST[dari]'");
// $iu2 = mysqli_fetch_array($iu);


include('db.php');

$fro = mysqli_query($koneksi,"select * from tb_actualite order by id_actualite desc");
$fro2 = mysqli_fetch_array($fro);



// How to use
$titleNoti = "Dear Member";
$bodyNoti = "We writing to remind you to completing your company profile";
$actionNoti = ".creche.Creche2Activity";
$gambarrr = "https://icons.iconarchive.com/icons/hopstarter/gloss-mac/256/Get-Info-icon.png";
$callNoti = new startSendNotification();



//$callNoti->sendNoti($titleNoti, $bodyNoti, $actionNoti);
$callNoti->sendNoti($titleNoti, $bodyNoti,$gambarrr);
// $callNoti->sendNoti($titleNoti, $bodyNoti);

?>