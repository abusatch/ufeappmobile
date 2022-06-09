<?php 
	include 'db.php';
	$response = array();

	
		$username = $_POST['username'];
		$password = md5($_POST['token']);
        $level = "member";
		
		$sql = mysqli_query($koneksi,"SELECT * FROM user WHERE idUser='$_POST[username]' and password = '$password'");

		if (mysqli_num_rows($sql) > 0) {
			$sql2 = mysqli_fetch_array($sql);

		//	mysqli_query($koneksi,"UPDATE user set token_push = '$_POST[token]' where idUser = '$sql2[idUser]'");

			$bg = mysqli_query($koneksi,"select * from tb_template order by id_template desc limit 1");
			$bg2 = mysqli_fetch_array($bg);

			$response['result'] = "1";
			$response['msg'] = "Connexion reussie!!".$_POST['token'];
			$response['username'] = $username;
			$response['level'] = $level;
			$response['token'] = $sql2['propic'];
			$response['device_id'] = $sql2['device_id'];
			
			$response['judul'] = $sql2['username'];
			$response['deskripsi'] = $sql2['first_name'];
			$response['gambar'] = $sql2['second_name'];
			$response['link'] = $sql2['phone'];;



			echo json_encode($response);
		}else{
			$response['result'] = "0";
			$response['msg'] = "Mot de passe incorrect ou identifiant non-enregristre".$_POST['username'];

			echo json_encode($response);
		}


	


 ?>