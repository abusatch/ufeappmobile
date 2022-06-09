
<html>
<head>
</head>
<body style="background-color:white;">



				<?php
				
				
				
				
// 				$to = "indonesie@ufe.org,abusatch@gmail.com";
// $subject = "User Baru";

// $message = "
// <html>
// <head>
// <title>UFE Indonesie</title>
// </head>
// <body>
// <fieldset style='text-align:left;border:1px solid #707070;padding:10px;border-radius:3px;max-width:600px;'>

// <p>Hello Admin, <br><br>ada user baru, berikut ini rinciannya:</p>

// <table style='width:100%;margin-top:10px;'>

// <tr>
// <td style='font-size:20px;'>Email</td>
// <td style='font-size:20px;'>:</td>
// <td style='font-size:20px;'> ".$_GET['email']."</td>
// </tr>

// <tr>
// <td style='font-size:20px;'>Level</td>
// <td style='font-size:20px;'>:</td>
// <td style='font-size:20px;'> ".$_GET['level']."</td>
// </tr>
// </table>


// <table style='width:100%;margin-top:10px;'>
// <tr><th style='font-size:20px;'>
// UFE Section Indonesie</th></tr></table>
// <table style='width:100%;'>
// <tr><td style='font-size:20px;'>
// Jakarta - Indonesie
// </td></tr></table>

// </fieldset>
// </body>
// </html>
// ";

// // Always set content-type when sending HTML email
// $headers = "MIME-Version: 1.0" . "\r\n";
// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// // More headers
// $headers .= 'From: <indonesie@ufe.org>' . "\r\n";
// $headers .= 'Cc: abusatch@gmail.com' . "\r\n";

// mail($to,$subject,$message,$headers);

				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
class startSendNotification
{
	
		function sendNoti($titleNoti, $bodyNoti,$gambarrr){

		define( 'API_ACCESS_KEY', 'AAAARVfjooY:APA91bEAKbWGNffjb80WnOsnE4U_iNWJOUhW1UqiMsnLiJXah2oFmEcn2Y5EcBvUeCWHWgAfBwmFZHhnCdKvyvrUf4m7okrNCICisXtzNyxfKu4F8FxfhXcnxPICACaUrLQJekNqYZPy');
        include 'db.php';

		$ewww = mysqli_query($koneksi,"select * from user where token_push != '' and level = 'admin-ufe'");
while ($tyu = mysqli_fetch_array($ewww)){
	
	
$qw[] = $tyu['token_push'];

//	'cOBybN36ytM:APA91bF8E44iCwgwI6aSL7XGMIpQXA8u-PD3SpPbVJUSBbkYJgDEwiGFlYnkFQcTRrjdwac0BSpsA6elLn5wpuH7tyrLGbqfIDJ0imGt6_lvF1tRz5G8nxtKVvlAWUo7Pzbq829kPbIC',
	//	'faldz28ZSVs:APA91bEZ26qqfKMN9j2Vo9Dp1iMNVRLwbcPYOUL4cTVrcWcckpprX2x6sVG4Wxn_UTIxfpjzT_DV9-eobIiWpco-5KhLy-S8pBKPQtrTdeVPtSrAgcf8_ICg28w8sgwtOD88mEhrkxE3',

//echo $qw;


	//	$registrationIDs = [
	//	'cOBybN36ytM:APA91bF8E44iCwgwI6aSL7XGMIpQXA8u-PD3SpPbVJUSBbkYJgDEwiGFlYnkFQcTRrjdwac0BSpsA6elLn5wpuH7tyrLGbqfIDJ0imGt6_lvF1tRz5G8nxtKVvlAWUo7Pzbq829kPbIC',
//		'faldz28ZSVs:APA91bEZ26qqfKMN9j2Vo9Dp1iMNVRLwbcPYOUL4cTVrcWcckpprX2x6sVG4Wxn_UTIxfpjzT_DV9-eobIiWpco-5KhLy-S8pBKPQtrTdeVPtSrAgcf8_ICg28w8sgwtOD88mEhrkxE3',

	//	];
//echo $qw;

}
		$fcmMsg = array(
			'title' => $titleNoti,
			'body' => $bodyNoti,
            'image' => $gambarrr,
            	'icon' => 'image/look24-logo-s.png'
            // 'link' => 'notifikasi'
// 			'click_action' => $actionNoti
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
$titleNoti = "Pembayaran Baru";
$bodyNoti = "Hello Admin, pembayaran baru";
$actionNoti = "https://medium.com/@ptuckyeagle";
$gambarrr = "https://ufe-section-indonesie.org/ufeapp/berhasil.png";
$callNoti = new startSendNotification();



//$callNoti->sendNoti($titleNoti, $bodyNoti, $actionNoti);
$callNoti->sendNoti($titleNoti, $bodyNoti,$gambarrr);

?>



















				<?php
				
		
				
				
class startSendNotification2
{
	
		function sendNoti2($titleNoti, $bodyNoti,$gambarrr){

		define( 'API_ACCESS_KEY', 'AAAARVfjooY:APA91bEAKbWGNffjb80WnOsnE4U_iNWJOUhW1UqiMsnLiJXah2oFmEcn2Y5EcBvUeCWHWgAfBwmFZHhnCdKvyvrUf4m7okrNCICisXtzNyxfKu4F8FxfhXcnxPICACaUrLQJekNqYZPy');
        include 'db.php';

		$ewww = mysqli_query($koneksi,"select * from user where username = '$_GET[email]'");
while ($tyu = mysqli_fetch_array($ewww)){
	
	
$qw[] = $tyu['token_push'];

//	'cOBybN36ytM:APA91bF8E44iCwgwI6aSL7XGMIpQXA8u-PD3SpPbVJUSBbkYJgDEwiGFlYnkFQcTRrjdwac0BSpsA6elLn5wpuH7tyrLGbqfIDJ0imGt6_lvF1tRz5G8nxtKVvlAWUo7Pzbq829kPbIC',
	//	'faldz28ZSVs:APA91bEZ26qqfKMN9j2Vo9Dp1iMNVRLwbcPYOUL4cTVrcWcckpprX2x6sVG4Wxn_UTIxfpjzT_DV9-eobIiWpco-5KhLy-S8pBKPQtrTdeVPtSrAgcf8_ICg28w8sgwtOD88mEhrkxE3',

//echo $qw;


	//	$registrationIDs = [
	//	'cOBybN36ytM:APA91bF8E44iCwgwI6aSL7XGMIpQXA8u-PD3SpPbVJUSBbkYJgDEwiGFlYnkFQcTRrjdwac0BSpsA6elLn5wpuH7tyrLGbqfIDJ0imGt6_lvF1tRz5G8nxtKVvlAWUo7Pzbq829kPbIC',
//		'faldz28ZSVs:APA91bEZ26qqfKMN9j2Vo9Dp1iMNVRLwbcPYOUL4cTVrcWcckpprX2x6sVG4Wxn_UTIxfpjzT_DV9-eobIiWpco-5KhLy-S8pBKPQtrTdeVPtSrAgcf8_ICg28w8sgwtOD88mEhrkxE3',

	//	];
//echo $qw;

}
		$fcmMsg = array(
			'title' => $titleNoti,
			'body' => $bodyNoti,
            'image' => $gambarrr,
            	'icon' => 'image/look24-logo-s.png'
            // 'link' => 'notifikasi'
// 			'click_action' => $actionNoti
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
$titleNoti = $_GET['email'];
$bodyNoti = "Votre paiement est sous examen admin";
$actionNoti = "https://medium.com/@ptuckyeagle";
$gambarrr = "https://ufe-section-indonesie.org/ufeapp/berhasil.png";
$callNoti = new startSendNotification2();



//$callNoti->sendNoti($titleNoti, $bodyNoti, $actionNoti);
$callNoti->sendNoti2($titleNoti, $bodyNoti,$gambarrr);

?>
<script>
location = "meluncur:";
</script>


		</body>
        </html>