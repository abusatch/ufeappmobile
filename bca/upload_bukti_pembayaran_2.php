

<?php
	include "db.php";
	
	class emp{}
	
	$image = $_POST['image'];
	$name = $_POST['name'];
	$judul = $_POST['judul'];
// 	$linkweb = $_POST['linkweb'];
	
	date_default_timezone_set('Asia/Jakarta');
	$tanggal = date('Y-m-d');
	$tanggal2 = date('Y-m-d H:i:s');



	




	if ($name == "") { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Le nom de la Banque ne peut pas être vierge"; 
		die(json_encode($response));
	} else {
		$random = random_word(20);
		
		// $path = $random.".jpg";
		$path = $_POST['image2'];
		$path2 = "images/buktipembayaran/".$_POST['image2'];
		
		$hf = mysqli_query($koneksi,"select * from user where idUser = '$_POST[id_user]'");
		$hf2 = mysqli_fetch_array($hf);
		if($hf2['member_dari'] == ""){
			$idinput = $_POST['id_user'];
		}else{
			$idinput = $hf2['member_dari'];
		}

		// sesuiakan ip address laptop/pc atau URL server
		$actualpath = "http://ufe-section-indonesie.org/ufeapp/images/buktipembayaran/$path";
		
// 		if($_POST['id_template'] == ""){


		// $query = mysqli_query($koneksi, "INSERT INTO tb_actualite (id_actualite,judul,deskripsi,gambar,url) VALUES (null,'$name','$name','$path','$linkweb')");
		// }else{
		// $query = mysqli_query($koneksi, "UPDATE tb_actualite set judul = '$name',deskripsi = '$name',gambar = '$path' ,url = '$linkweb' where id_actualite = '$_POST[id_artikel]'");
		// }
		if ($_POST['image'] == ""){
				$response = new emp();
			$response->success = 0;
			$response->message = "Les photos ne peuvent pas être vierges";
			die(json_encode($response)); 
		
		}else if($_POST['image'] == null){   
			$response = new emp();
			$response->success = 0;
			$response->message = "Les photos ne peuvent pas être vierges";
			die(json_encode($response)); 
		    
		}else{
		    
		    
		        
		    $gb = mysqli_query($koneksi,"select * from tb_order where id_order = '$_POST[id_order]'");
		    $gb2 = mysqli_fetch_array($gb);
		    
		    
$to = "indonesie@ufe.org,abusatch@gmail.com,".$hf2['username'];
$subject = "Paiement en attente de confirmation";

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
<tr><th style='font-size:15px;text-align:left;'><b>
Cher ".$hf2['username']."</b></th></tr></table> 
<table style='width:100%;margin-top:10px;'>
<tr><td style='font-size:15px;'>
Merci d’avoir fait le paiement, voici les détails de votre commande:
</td></tr></table>
<table style='width:100%;margin-top:10px;'>

<tr>
<td style='font-size:15px;'>Numéro de facture</td>
<td style='font-size:15px;'>:</td>
<td style='font-size:15px;'>".$gb2['no_invoice']."</td>
</tr>

<tr>
<td style='font-size:15px;'>Valeur de transfert</td>
<td style='font-size:15px;'>:</td>
<td style='font-size:15px;'>IDR: ".number_format($gb2['harga'],0,',','.')."</td>
</tr>

</table>
<br>
<table style='width:100%;margin-top:10px;'>
<tr><td style='font-size:15px;'>
Nous vous informerons par e-mail si le paiement a été confirmé par l’Administrateur.</td></tr></table>
<table style='width:100%;border-top:1px solid #D1D1D1;margin-top:15px;'>
    <tr>
        <th></th>
    </tr>
    </table>

<table style='width:100%;margin-top:5px;'>
<tr><th style='font-size:15px;text-align:left;'>
<b>UFE Section Indonésie</b></th></tr></table>

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

mail($to,$subject,$message,$headers);

		    
		
		    
		    
		    
		    
		    
			file_put_contents($path2,base64_decode($image));
			
			
		$fd = mysqli_query($koneksi,"select * from tb_pembayaran where id_user = '$idinput' and id_order = '$_POST[id_order]'");
		$fd2 = mysqli_num_rows($fd);
		
		if($fd2 == 0){
			
		$query = mysqli_query($koneksi, "INSERT INTO tb_pembayaran (
		bank,
		norek,
		id_user,
		id_order,
		nilai,
		tanggal,
		tanggal2,
		gambar) VALUES ('$judul','$name','$idinput','$_POST[id_order]','$_POST[harga_asli]','$tanggal','$tanggal2','$path')");


        // mysqli_query($koneksi,"update user set verifikasi_admin = 'sudah' where idUser = '$idinput'");

        mysqli_query($koneksi,"update tb_order set ket = 'menunggu' where id_order = '$_POST[id_order]'");



		$isipesan = "Merci. votre paiement ".$judul." en attente de confirmation de l’administrateur";
		

		$hf = mysqli_query($koneksi,"select * from user where idUser = '$_POST[id_user]'");
		$hf2 = mysqli_fetch_array($hf);
		if($hf2['member_dari'] == ""){
			mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
			values
			('Confirmation d’attente','$isipesan','$_POST[id_user]','-','-','$tanggal','$tanggal2')");

			$gh = mysqli_query($koneksi,"select * from user where member_dari = '$_POST[id_user]'");
			while ($gh2 = mysqli_fetch_array($gh)){

				mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
			values
			('Confirmation d’attente','$isipesan','$gh2[idUser]','-','-','$tanggal','$tanggal2')");
			}

		}else{
			
			$hfc = mysqli_query($koneksi,"select * from user where idUser = '$hf2[member_dari]'");
			$hfc2 = mysqli_fetch_array($hfc);
			mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
			values
			('Confirmation d’attente','$isipesan','$hfc2[idUser]','-','-','$tanggal','$tanggal2')");

			
			$gh = mysqli_query($koneksi,"select * from user where member_dari = '$hf2[member_dari]'");
			while ($gh2 = mysqli_fetch_array($gh)){

				mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
			values
			('Confirmation d’attente','$isipesan','$gh2[idUser]','-','-','$tanggal','$tanggal2')");
			}
		}




$to = "indonesie@ufe.org,abusatch@gmail.com";
$subject = "Pembayaran Baru";

$message = "
<html>
<head>
<title>UFE Indonesie</title>
</head>
<body>
<p>Helo Admin, ada pembayaran baru, cek yu.</p>
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
$headers .= 'From: <indonesie@ufe.org>' . "\r\n";
$headers .= 'Cc: abusatch@gmail.com' . "\r\n";

mail($to,$subject,$message,$headers);



		// mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
		// values
		// ('Confirmation d’attente','$isipesan','$idinput','-','-','$tanggal','$tanggal2')");






		$response = new emp();
			$response->success = 1;
			$response->message = "Téléchargement réussi";
			die(json_encode($response));
}else{
    		$response = new emp();
			$response->success = 1;
			$response->message = "Téléchargement réussi";
			die(json_encode($response));
}



		}	
// 	}else{

// 		if ($_POST['image'] == ""){

// 		$query = mysqli_query($koneksi, "UPDATE tb_template set judul = '$judul',deskripsi = '$name',linkweb = '$linkweb',
// 		tanggal_edit = '$tanggal',tanggal_edit2 = '$tanggal2',user_edit = '$idinput', keterangan = 'pending'
// 		 where id_template = '$_POST[id_template]'");
		
// 		$response = new emp();
// 		$response->success = 1;
// 			if($hf2['level'] == "admin-ufe"){

// 		$response->message = "Data berhasil di ubah - admin";
// 			}else{
// 				$response->message = "Data berhasil di ubah";
// 			}

// 		die(json_encode($response));
// 		}else{
// 			file_put_contents($path2,base64_decode($image));
// 		$query = mysqli_query($koneksi, "UPDATE tb_template set judul = '$judul',deskripsi = '$name',gambar = '$path' ,linkweb = '$linkweb',
// 		tanggal_edit = '$tanggal',tanggal_edit2 = '$tanggal2',user_edit = '$idinput'
// 		 where id_template = '$_POST[id_template]'");
		

// 		$response = new emp();
// 			$response->success = 1;
// 			$response->message = "Data berhasil di ubah 2";
// 			die(json_encode($response));
// 		}
	
// 	}



		// if ($query){
		// 	if ($_POST['image'] == ""){
		// 	}else{
		// 	file_put_contents($path2,base64_decode($image));
		// 	}
		// 	$response = new emp();
		// 	$response->success = 1;
		// 	$response->message = "Téléchargement réussi";
		// 	die(json_encode($response));
		// } else{ 
		// 	$response = new emp();
		// 	$response->success = 0;
		// 	$response->message = "Error Upload image";
		// 	die(json_encode($response)); 
		// }
	}	
	
	// fungsi random string pada gambar untuk menghindari nama file yang sama
	function random_word($id = 20){
		$pool = '1234567890abcdefghijkmnpqrstuvwxyz';
		
		$word = '';
		for ($i = 0; $i < $id; $i++){
			$word .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
		}
		return $word; 
	}

//	mysqli_close($con);
	
?>	


<?php
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
		//	'click_action' => $actionNoti
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


		
// 		$fd = mysqli_query($koneksi,"select * from tb_pembayaran where id_user = '$idinput' and id_order = '$_POST[id_order]'");
// 		$fd2 = mysqli_num_rows($fd);
		
// 		if($fd2 == 0){


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
$bodyNoti = "Cek yu";
$actionNoti = "https://medium.com/@ptuckyeagle";
$gambarrr = "https://ufe-section-indonesie.org/ufeapp/berhasil.png";
$callNoti = new startSendNotification();



//$callNoti->sendNoti($titleNoti, $bodyNoti, $actionNoti);
$callNoti->sendNoti($titleNoti, $bodyNoti,$gambarrr);
// }
?>






















<?php
class startSendNotification2
{
	
		function sendNoti2($titleNoti, $bodyNoti,$gambarrr){

		define( 'API_ACCESS_KEY', 'AAAARVfjooY:APA91bEAKbWGNffjb80WnOsnE4U_iNWJOUhW1UqiMsnLiJXah2oFmEcn2Y5EcBvUeCWHWgAfBwmFZHhnCdKvyvrUf4m7okrNCICisXtzNyxfKu4F8FxfhXcnxPICACaUrLQJekNqYZPy');
        include 'db.php';


    $gb = mysqli_query($koneksi,"select * from tb_order where id_order = '$_POST[id_order]'");
		    $gb2 = mysqli_fetch_array($gb);

		$ewww = mysqli_query($koneksi,"select * from user where idUser = '$gb2[id_user]'");
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
		//	'click_action' => $actionNoti
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


		
// 		$fd = mysqli_query($koneksi,"select * from tb_pembayaran where id_user = '$idinput' and id_order = '$_POST[id_order]'");
// 		$fd2 = mysqli_num_rows($fd);
		
// 		if($fd2 == 0){


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
$titleNoti = $gb2['username'];
$bodyNoti = "Merci, votre paiement est confirmé par l’Administrateur";
$actionNoti = "https://medium.com/@ptuckyeagle";
$gambarrr = "https://ufe-section-indonesie.org/ufeapp/berhasil.png";
$callNoti = new startSendNotification2();



//$callNoti->sendNoti($titleNoti, $bodyNoti, $actionNoti);
$callNoti->sendNoti2($titleNoti, $bodyNoti,$gambarrr);
// }
?>










