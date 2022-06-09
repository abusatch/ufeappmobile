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
		
		
		$sql = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' AND password='$_POST[password]'");
		$sql234 = mysqli_fetch_array($sql);


		

		if (mysqli_num_rows($sql) > 0) {
			
			
			
			
			if($_POST["kode_vip"] != ""){
			    
			    
			    if($sql234['verifikasi_admin'] == "belum"){
			        $response['result'] = "0";
				$response['msg'] = "Le compte n'a pas été vérifié par l'administrateur";
			    }else{

				$sql2 = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' AND password='$password'  AND kode_vip='$_POST[kode_vip]'");
				$sql22 = mysqli_num_rows($sql2);
				if($sql22 == 0){
				$response['result'] = "0";
				$response['msg'] = "Kode VIP Salah".$_POST['kode_vip'];
				}else{
				// 	mysqli_query($koneksi,"update user set device_id = '$_POST[device_info]' where username = '$_POST[username]'");

					$response['result'] = "1";
					$response['pss'] = $password;
					
					$response['msg'] = "Connexion reussie!!1";
					$response['username'] = $username;
					$response['level'] = "vip-admin";
					$response['id_user'] = $sql234['idUser'];
				}
}
			}else{

  if($sql234['verifikasi_admin'] == "belum"){
			        $response['result'] = "0";
					$response['result2'] = "3";
				$response['msg'] = "Le compte n'a pas été vérifié par l'administrateur";
			    }else{
				
				
			date_default_timezone_set('Asia/Jakarta');
			$tanggal2 = date('Y-m-d H:i:s');
				
			$mle = mysqli_query($koneksi,"select * from user_filter where id_user = '$sql234[idUser]'");
			if(mysqli_num_rows($mle) == 0){
			   $mnf = mysqli_query($koneksi,"insert into user_filter
			   (id_user,
			   id_filter,
			   tanggal2
			   )
			   values
			   (
			   '$sql234[idUser]',
			   '$_POST[id_filter]',
			   '$tanggal2'
			   )
			   "); 
			}else{
                $mle = mysqli_query($koneksi,"update user_filter set id_filter = '$_POST[id_filter]' where id_user = '$sql234[idUser]'");			    
			}
				
// 			mysqli_query($koneksi,"update user set device_id = '$_POST[device_info]' where username = '$_POST[username]'");
			if($sql234['kode_vip'] == $_POST["kode_vip"]){
			$response['result'] = "1";
			$response['pss'] = $password;
			$response['msg'] = "Connexion reussie!!3";
			$response['username'] = $username;
			$response['level'] = $sql234['level'];
			$response['id_user'] = $sql234['idUser'];
			}else{

$response['result'] = "1";
			$response['pss'] = $password;
			$response['msg'] = "Connexion reussie!!2";
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
			
			$response['msg'] = "Wrong password";
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