<?php 
header('Access-Control-Allow-Origin: *');
	$server = "localhost";
	$user	= "t49403_admufeapp";
	$pass	="sovereignplaza";
	$db 	="t49403_ufeapp";
	$koneksi =mysqli_connect($server, $user, $pass,$db);
	$koneksi->set_charset("utf8");
//	mysqli_select_db($koneksi,$db);
	
	
// 	$koneks->set_charset("utf8");
// 	if ($koneksi) {
// 		echo "koneksi berhasil";
// 	}

?>