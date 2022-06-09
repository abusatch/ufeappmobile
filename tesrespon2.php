<?php 
	include 'db.php';
	$response = array();

	
		//$username = $_POST['username'];
		$password = md5("123");
        $level = "member";
		
		$sql = mysqli_query($koneksi,"SELECT * FROM tb_template group by id_member_vip");
        $jum = mysqli_num_rows($sql);
		if (mysqli_num_rows($sql) > 0) {
			$sql2 = mysqli_fetch_array($sql);

		//	mysqli_query($koneksi,"UPDATE user set token_push = '$_POST[token]' where idUser = '$sql2[idUser]'");


			$response['result'] = "1";
			$response['msg'] = "Connexion reussie!!";
			$response['username'] = "";
			$response['level'] = $level;
			//$response['token'] = $_POST['token'];
			$response['device_id'] = "$jum";


			echo json_encode($response);
		}else{
			$response['result'] = "0";
			$response['msg'] = "Mot de passe incorrect ou identifiant non-enregristre";

			echo json_encode($response);
		}


	


 ?>