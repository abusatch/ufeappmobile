<?php 
	include "db.php";
	$response = array();
	if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["level"])) {
		$username = $_POST["username"];
		$nama = $_POST["nama"];
		$level = $_POST["level"];
		$password = md5($_POST["password"]);

		// $username = 'andi';
		// $level = 'admin';
		// $password = '123456';

	// Cek data sudah ada apa belum
	$sql = "SELECT * FROM user WHERE username ='$username'";
	$check = mysqli_fetch_array(mysqli_query($koneksi,$sql));
	if(isset($check)){
		$response['result'] = 0;
		$response['msg'] = "Oops! username already registered!";
		echo json_encode($response);
	}else{
		$sql = mysqli_query($koneksi,"insert into user (idUser,username,nama,password,level) VALUES (null,'$username','$nama','$password','$level')");
			if($sql){
			$response['result'] = 1;
			$response['msg'] = "Registration successful!!";
			}else{
			$response['result'] = 0;
			$response['msg'] = "Registration failed!!";
		}
	echo json_encode($response);
	}
}
 ?>