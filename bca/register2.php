<?php 

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

	include "db.php";
	$response = array();
//	if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["level"])) {
		$username = "ajat2@gmail.com";
		$level = "freeuser";
		$password = "202cb962ac59075b964b07152d234b70";

		// $username = 'andi';
		// $level = 'admin';
		// $password = '123456';

	// Cek data sudah ada apa belum
	$sql = "SELECT * FROM user WHERE username ='$username'";
	$check = mysqli_num_rows(mysqli_query($koneksi,$sql));
	if($check >= 1){
		$response['result'] = 0;
		$response['msg'] = "Oops! username already registered!";
		echo json_encode($response);
	}else{
		$sql = mysqli_query($koneksi,"INSERT INTO user (idUser,username,nama, password,level) VALUES ('','$username','tes','$password','$level')");
			if($sql){
			$response['result'] = 1;
			$response['msg'] = "Registration successful!!";
			}else{
			$response['result'] = 0;
			$response['msg'] = "Registration failed2!!";
		}
	echo json_encode($response);
	}
//}
 ?>