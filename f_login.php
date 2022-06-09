<?php 
header('Access-Control-Allow-Origin: *');
	include 'db.php';
	$response = array();

	if (isset($_POST["username"]) && isset($_POST["password"])) {
		$username = $_POST["username"];
		$password = md5($_POST["password"]);
       // $level = $_POST["level"];
		
		if($_POST['device_id'] == "registrasi"){
		    
		   if($username == ""){
		       	$response['result'] = "0";
				$response['msg'] = "L'e-mail ne peut pas être vide";
		   }else if($password == ""){
		       		       	$response['result'] = "0";
				$response['msg'] = "Le mot de passe ne peut pas être vide";
		   }else if($password != $_POST['kode_vip']){
		       		       	$response['result'] = "0";
				$response['msg'] = "les mots de passe ne sont pas les mêmes";
		   }else{
		       
		
		$sql = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username'");
		$sql234 = mysqli_fetch_array($sql);       
		$cek = mysqli_num_rows($sql);
		if($cek == 0){
		    
		    
		    
		       mysqli_query($koneksi,"insert into user (username,password) values ('$username','$password')");
		       
		       
		       	$response['result'] = "1";
					$response['msg'] = "Inscription Réussie";
				// 	$response['username'] = $username;
				// 	$response['level'] = "vip-admin";
				// 	$response['id_user'] = $sql234['idUser'];
		       
		   
		}else{
		       		       	$response['result'] = "0";
				$response['msg'] = "e-mail Déjà Enregistré";
		}
		    
		    
		}
		    
		    
		    
		    
		}else{
		
		
		$sql = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' AND password='$password'");
		$sql234 = mysqli_fetch_array($sql);


		

		if (mysqli_num_rows($sql) > 0) {
			
			
			
			
			if($_POST["kode_vip"] != ""){
			    
			    
			    if($sql234['verifikasi_admin'] == "belum"){
			        $response['result'] = "0";
			        $response['result2'] = "3";
				$response['msg'] = "Le compte n'a pas été vérifié par l'administrateur";
			    }else{

				$sql2 = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' AND password='$password'  AND kode_vip='$_POST[kode_vip]'");
				$sql22 = mysqli_num_rows($sql2);
				if($sql22 == 0){
				$response['result'] = "0";
				$response['msg'] = "Kode VIP Salah".$_POST['kode_vip'];
				}else{
				//	mysqli_query($koneksi,"update user set device_id = '$_POST[device_info]' where username = '$_POST[username]'");

					$response['result'] = "1";
					$response['pss'] = $password;
					
					$response['msg'] = "Connexion reussie!!";
					$response['username'] = $username;
					$response['level'] = "vip-admin";
					$response['id_user'] = $sql234['idUser'];
				}
}
			}else{

  if($sql234['verifikasi_admin'] == "belum"){
			        $response['result'] = "0";
				//	$response['result2'] = "3";
				
				if(empty($sql234['device_id'])){
				$response['msg'] = "Le compte n'a pas été vérifié par l'administrateur";
				}else{
				$response['msg'] = "Votre compte est bloqué temporairement, veuillez consulter votre email pour plus d’informations.";
				
				
				
				     
  $kg = mysqli_query($koneksi,"select * from user where username = '$username'");
  $kg2 = mysqli_fetch_assoc($kg);
  
  
  
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
				
				}
			    }else{
				
		//	mysqli_query($koneksi,"update user set device_id = '$_POST[device_info]' where username = '$_POST[username]'");
			if($sql234['kode_vip'] == $_POST["kode_vip"]){
			$response['result'] = "1";
			$response['pss'] = $password;
			$response['msg'] = "Connexion reussie!!";
			$response['username'] = $username;
			$response['level'] = $sql234['level'];
			$response['id_user'] = $sql234['idUser'];
			}else{

$response['result'] = "1";
			$response['pss'] = $password;
			$response['msg'] = "Connexion reussie!!";
			$response['username'] = $username;
			$response['level'] = $sql234['level'];
			$response['id_user'] = $sql234['idUser'];

				// $response['result'] = "0";
				// $response['msg'] = "Akun VIP Admin, Kode VIP tidak boleh kosong";
			}
			    }
		
		}
			echo json_encode($response);
		}else{
			
				$fed = mysqli_query($koneksi,"select * from user where username = '$username'");
		$fed2 = mysqli_fetch_assoc($fed);	
			
			if(mysqli_num_rows($fed) == 0){
			
			
			$response['result'] = "0";
			$response['result2'] = "0";
			
			$response['msg'] = "Mot de passe incorrect ou identifiant non-enregristre";

			}else{
			$response['result'] = "0";
			$response['result2'] = "4";
			
			$response['msg'] = "Mauvais mot de passe";
			}

			echo json_encode($response);
		}

}
	}else{
			$response['result'] = "0";
			$response['msg'] = "Échec de connexion!!, Identifiant et Le mot de passe";

			echo json_encode($response);
	}


 ?>