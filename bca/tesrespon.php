<?php 
	include 'db.php';
	$response = array();
date_default_timezone_set('Asia/Jakarta');
$tanggal_today = "COPYRIGHT UFE - ".date('Y');

	
		$username = $_POST['username'];
		$password = md5("123");
        $level = "member";
		
		$sql = mysqli_query($koneksi,"SELECT * FROM user WHERE idUser='$_POST[username]'");

		if (mysqli_num_rows($sql) > 0) {
			$sql2 = mysqli_fetch_array($sql);

			mysqli_query($koneksi,"UPDATE user set token_push = '$_POST[token]' where idUser = '$sql2[idUser]'");

			$bg = mysqli_query($koneksi,"select * from tb_template where visibility = '1' and keterangan = 'release' order by id_template desc limit 1");
			$bg2 = mysqli_fetch_array($bg);

$judul1 = str_replace("&petiksatu&","\'",$bg2['judul']);
$judul2 = str_replace("&petikdua&",'\"',$judul1);

$deskripsi1 = str_replace("&petiksatu&","\'",$bg2['deskripsi']);
$deskripsi2 = str_replace("&petikdua&",'\"',$deskripsi1);



			$response['result'] = "1";
			$response['msg'] = "Connexion reussie!!";
			$response['username'] = $username;
			$response['level'] = $level;
			$response['token'] = "https://ufe-section-indonesie.org/ufeapp/images/propic/".$sql2['propic'];
			$response['device_id'] = $sql2['device_id'];
			$response['propic'] = "https://ufe-section-indonesie.org/ufeapp/images/propic/".$sql2['device_id'];
			
			$response['judul'] = $judul2;
			$response['deskripsi'] = $deskripsi2;
			$response['gambar'] = "https://ufe-section-indonesie.org/ufeapp/images/actualite/".$bg2['gambar'];
			$response['link'] = $tanggal_today;



			echo json_encode($response);
		}else{
			$response['result'] = "0";
			$response['msg'] = "Mot de passe incorrect ou identifiant non-enregristre".$_POST['username'];

			echo json_encode($response);
		}


	


 ?>