<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Kirim Notifikasi</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
   <!--Made with love by Mutiullah Samim -->
   	<link rel="icon" href="http://ufe-section-indonesie.org/pages/wp-content/uploads/2017/11/Artboard-2-copy-7.png" type="image/png" sizes="16x16"/><link rel="icon" href="http://ufe-section-indonesie.org/pages/wp-content/uploads/2017/11/Artboard-2-copy-6.png" type="image/png" sizes="32x32"/><link rel="apple-touch-icon" href="http://ufe-section-indonesie.org/pages/wp-content/uploads/2017/11/Artboard-2-copy-11.png"><link rel="apple-touch-icon" sizes="76x76" href="http://ufe-section-indonesie.org/pages/wp-content/uploads/2017/11/Artboard-2-copy-8.png"><link rel="apple-touch-icon" sizes="120x120" href="http://ufe-section-indonesie.org/pages/wp-content/uploads/2017/11/Artboard-2-copy-9.png"><link rel="apple-touch-icon" sizes="152x152" href="http://ufe-section-indonesie.org/pages/wp-content/uploads/2017/11/Artboard-2-copy-10.png">
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">

	<style>
	@import url('https://fonts.googleapis.com/css?family=Numans');

html,body{
background-image: url('https://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;
}

.container{
height: 100%;
align-content: center;
}

.card{
height: 370px;
margin-top: auto;
margin-bottom: auto;
width: 400px;
background-color: rgba(0,0,0,0.5) !important;
}

.social_icon span{
font-size: 60px;
margin-left: 10px;
color: #FFC312;
}

.social_icon span:hover{
color: white;
cursor: pointer;
}

.card-header h3{
color: white;
}

.social_icon{
position: absolute;
right: 20px;
top: -45px;
}

.input-group-prepend span{
width: 50px;
background-color: #FFC312;
color: black;
border:0 !important;
}

input:focus{
outline: 0 0 0 0  !important;
box-shadow: 0 0 0 0 !important;

}

.remember{
color: white;
}

.remember input
{
width: 20px;
height: 20px;
margin-left: 15px;
margin-right: 5px;
}

.login_btn{
color: black;
background-color: #FFC312;
width: 100px;
}

.login_btn:hover{
color: black;
background-color: white;
}

.links{
color: white;
}

.links a{
margin-left: 4px;
}
	</style>
	
	
	</head>
<body style="background-image:url('bintang.jpg');">
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Kirim Notifikasi</h3>
			<!--	<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>  -->
			</div>
			<?php 
			if(isset($_POST['submit'])){
				
				
				
				?>
				<?php
class startSendNotification
{
	
		function sendNoti($titleNoti, $bodyNoti){

		define( 'API_ACCESS_KEY', 'AAAARVfjooY:APA91bEAKbWGNffjb80WnOsnE4U_iNWJOUhW1UqiMsnLiJXah2oFmEcn2Y5EcBvUeCWHWgAfBwmFZHhnCdKvyvrUf4m7okrNCICisXtzNyxfKu4F8FxfhXcnxPICACaUrLQJekNqYZPy');
        include 'db.php';

		$ewww = mysqli_query($koneksi,"select * from user where token_push != '' ");
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
			'icon' => 'image/look24-logo-s.png'
		
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

// How to use
$titleNoti = $_POST['judul'];
$bodyNoti = $_POST['deskripsi'];
$actionNoti = "https://medium.com/@ptuckyeagle";

$callNoti = new startSendNotification();



//$callNoti->sendNoti($titleNoti, $bodyNoti, $actionNoti);
$callNoti->sendNoti($titleNoti, $bodyNoti);

?>
<script>
location = "post_notif.php";
</script>


			<?php	
			}
			?>
			
			
			<div class="card-body">
				<form method="POST">
					<div class="input-group form-group">
						<!--<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>-->
						<input type="text" class="form-control" name="judul" placeholder="Judul">
						
					</div>
					<div class="input-group form-group">
						<!--<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>-->
						<textarea type="text" class="form-control" style="height:150px;" name = "deskripsi" placeholder="Deskripsi"></textarea>
					</div>
					<!--<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>-->
					<div class="form-group">
						<input type="submit" name="submit" value="Kirim" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<!--<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="#">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
			</div>-->
		</div>
	</div>
</div>
</body>
</html>