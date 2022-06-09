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

$pss = md5($_POST['pss']);


 $khj = mysqli_query($koneksi,"select * from tb_pembayaran where id_order = '$_POST[id_order]'");
        $khj2 = mysqli_fetch_array($khj);
        
$lu = mysqli_query($koneksi,"select * from user where idUser = '$khj2[id_user]'");        
$lu2 = mysqli_fetch_array($lu);
// $wq2 = mysqli_num_rows($wq);
// $wq3 = mysqli_fetch_array($wq);	

if($lu2['masa_aktif'] <= $tanggal ){
$tanggal_awal = date('Y-m-d');
}else{
$tanggal_awal = $lu2['masa_aktif'];
}


//echo 'date before day adding: ' . $stop_date; 
$tanggal_akhir = date('Y-m-d', strtotime($tanggal_awal . ' +1 year'));
$tanggal_akhir2 = date('Y-m-d', strtotime($tanggal_awal . ' +1 month'));
//echo 'date after adding 1 day: ' . $stop_date;

$tanggal_2minggu = date('Y-m-d', strtotime($tanggal_awal . ' +14 day'));
$tanggal_1bulan = date('Y-m-d', strtotime($tanggal_awal . ' +1 month'));
$tanggal_3bulan = date('Y-m-d', strtotime($tanggal_awal . ' +3 month'));
$tanggal_6bulan = date('Y-m-d', strtotime($tanggal_awal . ' +6 month'));
$tanggal_1tahun = date('Y-m-d', strtotime($tanggal_awal . ' +1 year'));

$pss = md5($_POST['pss']);


$wq = mysqli_query($koneksi,"select * from user where idUser = '$_POST[id_user]' and password = '$pss'");
$wq2 = mysqli_num_rows($wq);
$wq3 = mysqli_fetch_array($wq);	




	if ($wq2 == 0) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Akses ditolak"; 
		die(json_encode($response));
		
	}else if($wq3['level'] != "admin-ufe"){	
		 
		$response = new emp();
		$response->success = 0;
		$response->message = "Akses ditolak"; 
		die(json_encode($response));
		
	} else {
		$random = random_word(20);
		
		// $path = $random.".jpg";
		$path = $_POST['image2'];
		$path2 = "images/buktipembayaran/".$_POST['image2'];
		
		  $khj = mysqli_query($koneksi,"select * from tb_pembayaran where id_order = '$_POST[id_order]'");
        $khj2 = mysqli_fetch_array($khj);
		
		
		$hf = mysqli_query($koneksi,"select * from user where idUser = '$khj2[id_user]'");
		$hf2 = mysqli_fetch_array($hf);
		if($hf2['member_dari'] == ""){
			$idinput = $khj2['id_user'];
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
// 		if ($_POST['image'] == ""){
// 				$response = new emp();
// 			$response->success = 0;
// 			$response->message = "Gambar tidak boleh kosong";
// 			die(json_encode($response)); 
// 		}else{
// 			file_put_contents($path2,base64_decode($image));
// 		$query = mysqli_query($koneksi, "INSERT INTO tb_pembayaran (
// 		bank,
// 		norek,
// 		id_user,
// 		id_order,
// 		nilai,
// 		tanggal,
// 		tanggal2,
// 		gambar) VALUES ('$judul','$name','$idinput','$_POST[id_order]','$_POST[harga_asli]','$tanggal','$tanggal2','$path')");


        $hj = mysqli_query($koneksi,"select * from tb_order where id_order = '$_POST[id_order]'");
        $hj2 = mysqli_fetch_array($hj);


        $khj = mysqli_query($koneksi,"select * from tb_pembayaran where id_order = '$_POST[id_order]'");
        $khj2 = mysqli_fetch_array($khj);



        mysqli_query($koneksi,"update tb_order set ket = 'sudahdibayar' where id_order = '$_POST[id_order]'");
        mysqli_query($koneksi,"update tb_pembayaran set keterangan = 'sudah' where id_order = '$_POST[id_order]'");

















	
	$kg = mysqli_query($koneksi,"select * from user where idUser = '$hj2[id_user]'");
	$kg2 = mysqli_fetch_array($kg);
	
	
	$ht = mysqli_query($koneksi,"select * from tb_pembayaran where id_order = '$_POST[id_order]' ");
	$ht2 = mysqli_fetch_array($ht);
	
	$harie = date('H:i | D M d, Y', strtotime($ht2['tanggal2'] . ' +0 day'));
	
	
	
	
	
	
// 		$to = "indonesie@ufe.org,abusatch@gmail.com,".$kg2['username'];
// $subject = "Pembayaran telah dikonfirmasi";

// $message = "
// <html>
// <head>
// <title>UFE Indonesie</title>
// </head>
// <body>
// <fieldset style='text-align:left;border:1px solid #707070;padding:10px;border-radius:3px;max-width:600px;'>
// <table style='width:100%;'>
// <th>Dear ".$kg2['username']."<th>
// </table>
// <table style='width:100%;'>
// <td style='font-size:15px;'>
// Pembayaran Anda telah dikonfirmasi oleh Admin, Berikut rincian order Anda:
// </td>
// </table>

// <table style='width:100%;margin-top:10px;'>

// <tr>
// <td style='font-size:15px;'>No. Invoice</td>
// <td style='font-size:15px;'>:</td>
// <td style='font-size:15px;'>".$hj2['no_invoice']."</td>
// </tr>

// <tr>
// <td style='font-size:15px;'>Nilai transfer</td>
// <td style='font-size:15px;'>:</td>
// <td style='font-size:15px;'>IDR: ".number_format($hj2['harga'],0,',','.')."</td>
// </tr>

// <tr>
// <td style='font-size:15px;'>Tanggal Pembayaran</td>
// <td style='font-size:15px;'>:</td>
// <td style='font-size:15px;'> ".$harie."</td>
// </tr>

// <tr>
// <td style='font-size:15px;'>Jenis Order</td>
// <td style='font-size:15px;'>:</td>
// <td style='font-size:15px;'> ".$hj2['nama_produk']."</td>
// </tr>



// <tr>
// <td style='font-size:15px;'>Masa Aktif</td>
// <td style='font-size:15px;'>:</td>
// <td style='font-size:15px;'> ".$kg2['masa_aktif']."</td>
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
// </center>

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

		$ewww = mysqli_query($koneksi,"select * from user where idUser = '$hj2[id_user]'");
while ($tyu = mysqli_fetch_array($ewww)){
	
	
$qw[] = $tyu['token_push'];

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
$bagian = $_GET['dsafds'];
$nama = $_GET['fdfvcx'];
$tujuan = $_GET['vsde'];




include('db.php');

$fro = mysqli_query($koneksi,"select * from tb_actualite order by id_actualite desc");
$fro2 = mysqli_fetch_array($fro);



// How to use
$titleNoti = "Hello ".$tyu['username'];
$bodyNoti = "Pembayaran Anda telah dikonfirmasi oleh Admin";
$actionNoti = "https://medium.com/@ptuckyeagle";
$gambarrr = "https://ufe-section-indonesie.org/ufeapp/berhasil.png";
$callNoti = new startSendNotification();



//$callNoti->sendNoti($titleNoti, $bodyNoti, $actionNoti);
$callNoti->sendNoti($titleNoti, $bodyNoti,$gambarrr);

	
	























        if($_POST['jenis_order'] == "memberufe"){
           
           
           if($hj2['harga'] == "5000000"){
           
            mysqli_query($koneksi,"insert into tb_order_aktif (id_order,id_user,nama_kegiatan,tanggal_awal,tanggal_akhir,id_activites,ket)
            values
            ('$_POST[id_order]','$khj2[id_user]','MEMBER UFE','$tanggal_awal','$tanggal_2minggu','123','1')
            ");



            mysqli_query($koneksi,"update user set masa_aktif = '$tanggal_2minggu' where idUser = '$khj2[id_user]'");
           
           
            
           }else if($hj2['harga'] == "10000000"){
            
           
            mysqli_query($koneksi,"insert into tb_order_aktif (id_order,id_user,nama_kegiatan,tanggal_awal,tanggal_akhir,id_activites)
            values
            ('$_POST[id_order]','$khj2[id_user]','MEMBER UFE','$tanggal_awal','$tanggal_1bulan','123')
            ");
            
            
            mysqli_query($koneksi,"update user set masa_aktif = '$tanggal_1bulan' where idUser = '$khj2[id_user]'");
          
          
          
          
           }else if($hj2['harga'] == "20000000"){
            
           
            mysqli_query($koneksi,"insert into tb_order_aktif (id_order,id_user,nama_kegiatan,tanggal_awal,tanggal_akhir,id_activites)
            values
            ('$_POST[id_order]','$khj2[id_user]','MEMBER UFE','$tanggal_awal','$tanggal_3bulan','123')
            ");
            
            
            mysqli_query($koneksi,"update user set masa_aktif = '$tanggal_3bulan' where idUser = '$khj2[id_user]'");
            
          
          
           }else if($hj2['harga'] == "35000000"){
            
           
            mysqli_query($koneksi,"insert into tb_order_aktif (id_order,id_user,nama_kegiatan,tanggal_awal,tanggal_akhir,id_activites)
            values
            ('$_POST[id_order]','$khj2[id_user]','MEMBER UFE','$tanggal_awal','$tanggal_6bulan','123')
            ");
            
            
            mysqli_query($koneksi,"update user set masa_aktif = '$tanggal_6bulan' where idUser = '$khj2[id_user]'");
            
            
           }else if($hj2['harga'] == "50000000"){
            
           
            mysqli_query($koneksi,"insert into tb_order_aktif (id_order,id_user,nama_kegiatan,tanggal_awal,tanggal_akhir,id_activites)
            values
            ('$_POST[id_order]','$khj2[id_user]','MEMBER UFE','$tanggal_awal','$tanggal_1tahun','123')
            ");
            
            
            mysqli_query($koneksi,"update user set masa_aktif = '$tanggal_1tahun' where idUser = '$khj2[id_user]'");
            
           }
        }else {
          
            $hj = mysqli_query($koneksi,"select * from tb_order where id_order = '$_POST[id_order]'");
        $hj2 = mysqli_fetch_array($hj);
            if($hj2['harga'] >= 10000000){
                
          
          	date_default_timezone_set('Asia/Jakarta');
                $sekarang = date('Y-m-d');
            $tanggalu = date('Y-m-d', strtotime($sekarang . ' +12 month'));
          
                mysqli_query($koneksi,"insert into tb_order_aktif (id_order,id_user,nama_kegiatan,tanggal_awal,tanggal_akhir,id_activites,ket)
            values
            ('$_POST[id_order]','$khj2[id_user]','$hj2[nama_produk]','$tanggal_awal','$tanggalu','$hj2[id_activites]','2')
            ");
            }else{
            
            
            	date_default_timezone_set('Asia/Jakarta');
                $sekarang = date('Y-m-d');
            $tanggali = date('Y-m-d', strtotime($sekarang . ' +1 month'));
         
            
            
            
                mysqli_query($koneksi,"insert into tb_order_aktif (id_order,id_user,nama_kegiatan,tanggal_awal,tanggal_akhir,id_activites,ket)
            values
            ('$_POST[id_order]','$khj2[id_user]','$hj2[nama_produk]','$tanggal_awal','$tanggali','$hj2[id_activites]','3')
            ");
            }
            
         
            
        }

        $fl = mysqli_query($koneksi,"select * from user where idUser = '$_POST[id_user]'");
        $fl2 = mysqli_fetch_array($fl);

		$isipesan = "Merci. votre paiement ".$hj2['no_invoice']." a été confirmé par l’administrateur";
		$isipesanadmin = "payment ".$hj2['no_invoice']." is has been confirmed by ".$fl2['username'];

		$hf = mysqli_query($koneksi,"select * from user where idUser = '$khj2[id_user]'");
		$hf2 = mysqli_fetch_array($hf);
		if($hf2['member_dari'] == ""){
			mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
			values
			('Le paiement a été confirmé confirmed','$isipesan','$khj2[id_user]','-','-','$tanggal','$tanggal2')");



	$gg = mysqli_query($koneksi,"select * from user where level = 'admin-ufe'");
			while ($gg2 = mysqli_fetch_array($gg)){

				mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
			values
			('Le paiement a été confirmé confirmed','$isipesanadmin','$gg2[idUser]','-','-','$tanggal','$tanggal2')");
			}



			$gh = mysqli_query($koneksi,"select * from user where member_dari = '$khj2[id_user]'");
			while ($gh2 = mysqli_fetch_array($gh)){

				mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
			values
			('Le paiement a été confirmé confirmed','$isipesan','$gh2[idUser]','-','-','$tanggal','$tanggal2')");
			}

		}else{
			
			$hfc = mysqli_query($koneksi,"select * from user where idUser = '$hf2[member_dari]'");
			$hfc2 = mysqli_fetch_array($hfc);
			mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
			values
			('Le paiement a été confirmé confirmed','$isipesan','$hfc2[idUser]','-','-','$tanggal','$tanggal2')");

            
	$gg = mysqli_query($koneksi,"select * from user where level = 'admin-ufe'");
			while ($gg2 = mysqli_fetch_array($gg)){

				mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
			values
			('Le paiement a été confirmé confirmed','$isipesanadmin','$gg2[idUser]','-','-','$tanggal','$tanggal2')");
			}


			
			$gh = mysqli_query($koneksi,"select * from user where member_dari = '$hf2[member_dari]'");
			while ($gh2 = mysqli_fetch_array($gh)){

				mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
			values
			('Le paiement a été confirmé confirmed','$isipesan','$gh2[idUser]','-','-','$tanggal','$tanggal2')");
			}
		}



		// mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
		// values
		// ('Confirmation d’attente','$isipesan','$idinput','-','-','$tanggal','$tanggal2')");


$pl = mysqli_query($koneksi,"select * from tb_order_aktif where id_order = '$_POST[id_order]'");
$pl2 = mysqli_fetch_array($pl);


	$to = "indonesie@ufe.org,abusatch@gmail.com,".$kg2['username'];
$subject = "Paiement confirmé";

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
<th style='text-align:left;'>Cher ".$kg2['username']."<th>
</table>
<table style='width:100%;margin-top:10px;'>
<td style='font-size:15px;'>
Votre paiement a été confirmé par l’Administrateur, Voici les détails de votre commande:
</td>
</table>

<table style='width:100%;margin-top:10px;'>

<tr>
<td style='font-size:15px;'>Numéro de facture</td>
<td style='font-size:15px;'>:</td>
<td style='font-size:15px;'>".$hj2['no_invoice']."</td>
</tr>

<tr>
<td style='font-size:15px;'>Valeur de transfert</td>
<td style='font-size:15px;'>:</td>
<td style='font-size:15px;'>IDR: ".number_format($hj2['harga'],0,',','.')."</td>
</tr>

<tr>
<td style='font-size:15px;'>Date de paiement</td>
<td style='font-size:15px;'>:</td>
<td style='font-size:15px;'> ".$harie."</td>
</tr>

<tr>
<td style='font-size:15px;'>Type de commande</td>
<td style='font-size:15px;'>:</td>
<td style='font-size:15px;'> ".$hj2['nama_produk']."</td>
</tr>



<tr>
<td style='font-size:15px;'>Période active</td>
<td style='font-size:15px;'>:</td>
<td style='font-size:15px;'> ".$pl2['tanggal_akhir']."</td>
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

mail($to,$subject,$message,$headers);

		$response = new emp();
			$response->success = 1;
			$response->message = "Téléchargement réussi ini ".mysqli_error($koneksi);
			die(json_encode($response));



class startSendNotification
{
	
		function sendNoti($titleNoti, $bodyNoti,$gambarrr){

		define( 'API_ACCESS_KEY', 'AAAARVfjooY:APA91bEAKbWGNffjb80WnOsnE4U_iNWJOUhW1UqiMsnLiJXah2oFmEcn2Y5EcBvUeCWHWgAfBwmFZHhnCdKvyvrUf4m7okrNCICisXtzNyxfKu4F8FxfhXcnxPICACaUrLQJekNqYZPy');
        include 'db.php';

		  $hj = mysqli_query($koneksi,"select * from tb_order where id_order = '$_POST[id_order]'");
        $hj2 = mysqli_fetch_array($hj);
		
		
		$ewww = mysqli_query($koneksi,"select * from user where idUser = '$hj2[id_user]'");
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

$bagian = $_GET['dsafds'];
$nama = $_GET['fdfvcx'];
$tujuan = $_GET['vsde'];


// include ('koneksi3.php');

// $iu = mysqli_query($con,"select * from temanuser where idtemanuser = '$_POST[dari]'");
// $iu2 = mysqli_fetch_array($iu);


include('db.php');


  $hj = mysqli_query($koneksi,"select * from tb_order where id_order = '$_POST[id_order]'");
        $hj2 = mysqli_fetch_array($hj);

$bn = mysqli_query($koneksi,"select * from user where idUser = '$hj2[id_user]'");
$bn2 = mysqli_fetch_array($bn);

// How to use
$titleNoti = "Pembayaran dikonfirmasi";
$bodyNoti = "Hello ".$bn2['username']." Pembayaran Anda telah dikonfirmasi";
$actionNoti = "https://medium.com/@ptuckyeagle";
$gambarrr = "https://ufe-section-indonesie.org/ufeapp/berhasil.png";
$callNoti = new startSendNotification();



//$callNoti->sendNoti($titleNoti, $bodyNoti, $actionNoti);
$callNoti->sendNoti($titleNoti, $bodyNoti,$gambarrr);






// 		}	
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

	mysqli_close($con);
	
?>	











