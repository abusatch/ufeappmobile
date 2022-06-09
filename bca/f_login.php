<?php 
	include 'db.php';
	$response = array();

	if (isset($_POST["username"]) && isset($_POST["password"])) {
		$username = $_POST["username"];
		$password = md5($_POST["password"]);
       // $level = $_POST["level"];
		
		if($_POST['device_id'] == "registrasi"){
		    
		   if($username == ""){
		       	$response['result'] = "0";
				$response['msg'] = "Email tidak boleh kosong";
		   }else if($password == ""){
		       		       	$response['result'] = "0";
				$response['msg'] = "Password tidak boleh kosong";
		   }else if($password != $_POST['kode_vip']){
		       		       	$response['result'] = "0";
				$response['msg'] = "Password tidak sama";
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
				$response['msg'] = "Akun belum di verifikasi oleh Admin";
			    }else{

				$sql2 = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' AND password='$password'  AND kode_vip='$_POST[kode_vip]'");
				$sql22 = mysqli_num_rows($sql2);
				if($sql22 == 0){
				$response['result'] = "0";
				$response['msg'] = "Kode VIP Salah".$_POST['kode_vip'];
				}else{
					mysqli_query($koneksi,"update user set device_id = '$_POST[device_id]' where username = '$_POST[username]'");

					$response['result'] = "1";
					$response['msg'] = "Connexion reussie!!";
					$response['username'] = $username;
					$response['level'] = "vip-admin";
					$response['id_user'] = $sql234['idUser'];
				}
}
			}else{

  if($sql234['verifikasi_admin'] == "belum"){
			        $response['result'] = "0";
				$response['msg'] = "Akun belum di verifikasi oleh Admin";
			    }else{
				
			mysqli_query($koneksi,"update user set device_id = '$_POST[device_id]' where username = '$_POST[username]'");
			if($sql234['kode_vip'] == $_POST["kode_vip"]){
			$response['result'] = "1";
			$response['msg'] = "Connexion reussie!!";
			$response['username'] = $username;
			$response['level'] = $sql234['level'];
			$response['id_user'] = $sql234['idUser'];
			}else{

				$response['result'] = "0";
				$response['msg'] = "Akun VIP Admin, Kode VIP tidak boleh kosong";
			}
			    }
		
		}
			echo json_encode($response);
		}else{
			$response['result'] = "0";
			$response['msg'] = "Mot de passe incorrect ou identifiant non-enregristre";

			echo json_encode($response);
		}

}
	}else{
			$response['result'] = "0";
			$response['msg'] = "Échec de connexion!!, Identifiant et Le mot de passe";

			echo json_encode($response);
	}


 ?>