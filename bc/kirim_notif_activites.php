
<html>
<head>
</head>
<body style="background-color:white;">



				<?php
				
				
				
				
				$to = "indonesie@ufe.org,abusatch@gmail.com";
$subject = "Order baru";

$message = "
<html>
<head>
<title>UFE Indonesie</title>
</head>
<body>
<p>Hello Admin, ada user yang melakukan order. cek yu</p>
<table>

<tr>
<td style='font-size:20px;'>".$randd."</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <admin.ufe@ufe.com>' . "\r\n";
$headers .= 'Cc: abusatch@gmail.com' . "\r\n";

mail($to,$subject,$message,$headers);

				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
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
				'icon' => 'image/look24-logo-s.png',
            'image' => $gambarrr
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
$titleNoti = "Order baru";
$bodyNoti = "Hello Admin, ada order baru";
$actionNoti = "https://medium.com/@ptuckyeagle";
$gambarrr = "https://ufe-section-indonesie.org/ufeapp/berhasil.png";
$callNoti = new startSendNotification();



//$callNoti->sendNoti($titleNoti, $bodyNoti, $actionNoti);
$callNoti->sendNoti($titleNoti, $bodyNoti,$gambarrr);

?>
<script>
location = "meluncur:";
</script>


		</body>
        </html>