<?php

$server = 'localhost';
$username = 't49403_admufeapp';
$password = 'sovereignplaza';
$database = 't49403_ufe_template';
	
	$con = mysqli_connect($server, $username, $password, $database);
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>