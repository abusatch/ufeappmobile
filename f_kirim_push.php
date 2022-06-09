<?php

include('db.php');

$oj = mysqli_query($koneksi,"select * from user where username = '$_GET[email]'
and password = '$_GET[password]'
");

$oj2 = mysqli_fetch_assoc($oj);

if(mysqli_num_rows($oj) == 0){
    ?>
    
    	<script>
	    
	    window.location.href = "http://meluncurregis:";
	</script>
    
    <?php
    
}else{
    ?>
    
    <?php 
    if($_GET['ket'] == "wb7"){
    ?>
    
    
    	<?php
class startSendNotification
{
	
		function sendNoti($titleNoti, $bodyNoti){

		define( 'API_ACCESS_KEY', 'AAAARVfjooY:APA91bEAKbWGNffjb80WnOsnE4U_iNWJOUhW1UqiMsnLiJXah2oFmEcn2Y5EcBvUeCWHWgAfBwmFZHhnCdKvyvrUf4m7okrNCICisXtzNyxfKu4F8FxfhXcnxPICACaUrLQJekNqYZPy');
        include 'db.php';

        // if($_GET['ket'] == "wb7"){
        
        $oj = mysqli_query($koneksi,"select * from user where username = '$_GET[email]'
and password = '$_GET[password]'
");

$oj2 = mysqli_fetch_assoc($oj);
        
        $ewww = mysqli_query($koneksi,"select * from user where token_push != '' and idUser = '$oj2[idUser]'");   
        
        
        mysqli_query($koneksi,"insert into tes_pesan (isipesan, keterangan) values ('$oj2[idUser]', 'kett123')");
        
        // }else{

        // mysqli_query($koneksi,"insert into tes_pesan (isipesan, keterangan) values ('kett2', 'kett2')");

// 		$ewww = mysqli_query($koneksi,"select * from user where token_push != '' and level = 'admin-ufe'");
        //}
while ($tyu = mysqli_fetch_array($ewww)){
	
	
$qw[] = $tyu['token_push'];



}



$ps = mysqli_query($koneksi,"select * from tb_template where id_member_vip = '$oj2[idUser]' order id_template desc");



   $oj = mysqli_query($koneksi,"select * from user where username = '$_GET[email]'
and password = '$_GET[password]'
");

$oj2 = mysqli_fetch_assoc($oj);

$grf = mysqli_query($koneksi,"select * from tb_pembayaran where id_user = '$oj2[idUser]' and ket = 'belumdikonfirmasi' order by id_pembayaran desc limit 1");
$grf2 = mysqli_fetch_assoc($grf);


		$fcmMsg = array(
			'title' => $titleNoti,
			'body' => $bodyNoti,
			'icon' => 'image/look24-logo-s.png',
			'image' => 'https://ufe-section-indonesie.org/ufeapp/images/buktipembayaran/'.$grf2['gambar']
		
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
       
        $oj = mysqli_query($koneksi,"select * from user where username = '$_GET[email]'
and password = '$_GET[password]'
");

$oj2 = mysqli_fetch_assoc($oj);

$grf = mysqli_query($koneksi,"select * from tb_pembayaran where id_user = '$oj2[idUser]' and ket = 'belumdikonfirmasi' order by id_pembayaran desc limit 1");
$grf2 = mysqli_fetch_assoc($grf);

$titleNoti = "Hello ".$_GET['email'];
$bodyNoti = "Pembayaran Anda sebesar ".number_format($grf2['nilai'],0,".",",")." menunggu konfirmasi oleh Admin";
$actionNoti = "https://medium.com/@ptuckyeagle";

$callNoti = new startSendNotification();



//$callNoti->sendNoti($titleNoti, $bodyNoti, $actionNoti);
$callNoti->sendNoti($titleNoti, $bodyNoti);

?>
	
	<script>
	    
	    window.location.href = "http://meluncurregis:";
	</script>
	
    
    <?php
}else{


?>

	<?php
class startSendNotification
{
	
		function sendNoti($titleNoti, $bodyNoti){

		define( 'API_ACCESS_KEY', 'AAAARVfjooY:APA91bEAKbWGNffjb80WnOsnE4U_iNWJOUhW1UqiMsnLiJXah2oFmEcn2Y5EcBvUeCWHWgAfBwmFZHhnCdKvyvrUf4m7okrNCICisXtzNyxfKu4F8FxfhXcnxPICACaUrLQJekNqYZPy');
        include 'db.php';

        // if($_GET['ket'] == "wb7"){
        // $ewww = mysqli_query($koneksi,"select * from user where token_push != '' and idUser = '$oj2[idUser]'");   
        
        
        // mysqli_query($koneksi,"insert into tes_pesan (isipesan, keterangan) values ('kett1', 'kett1')");
        
        // }else{

        // mysqli_query($koneksi,"insert into tes_pesan (isipesan, keterangan) values ('kett2', 'kett2')");

		$ewww = mysqli_query($koneksi,"select * from user where token_push != '' and level = 'admin-ufe'");
        //}
while ($tyu = mysqli_fetch_array($ewww)){
	
	
$qw[] = $tyu['token_push'];



}



$ps = mysqli_query($koneksi,"select * from tb_template where id_member_vip = '$oj2[idUser]' order id_template desc");

		$fcmMsg = array(
			'title' => $titleNoti,
			'body' => $bodyNoti,
			'icon' => 'image/look24-logo-s.png',
			'image' => 'https://www.rxwallpaper.site/wp-content/uploads/gotham-city-background-wallpapers-hd-wallpapers.jpg'
		
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
$titleNoti = "Hello Admin";
$bodyNoti = $_GET['email']." Upload artikel baru";
$actionNoti = "https://medium.com/@ptuckyeagle";

$callNoti = new startSendNotification();



//$callNoti->sendNoti($titleNoti, $bodyNoti, $actionNoti);
$callNoti->sendNoti($titleNoti, $bodyNoti);

?>
	
	<script>
	    
	    window.location.href = "http://meluncurregis:";
	</script>
	
    

<?php } ?>

<?php }
?>

