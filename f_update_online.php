<?php

include('db.php');


date_default_timezone_set('Asia/Jakarta');
$tanggal = date('Y-m-d');
$tanggal2 = date('Y-m-d H:i:s');

$be = mysqli_query($koneksi,"select * from user where username = '$_POST[email]' and password = '$_POST[pss]'");
$be2 = mysqli_fetch_assoc($be);


if($_POST['tokenn'] == $be2['token_push']){}else{
    	$en = mysqli_query($koneksi,"update user set token_push = '$_POST[tokenn]',
	last_online = '$tanggal', last_online2 = '$tanggal2'
	where idUser = '$be2[idUser]'");
}



if(mysqli_num_rows($be) >= 1){
if($be2['last_online'] == $tanggal){
	$en = mysqli_query($koneksi,"update user set last_online = '$tanggal', last_online2 = '$tanggal2'
	where idUser = '$be2[idUser]'");
	
}else{
	if(!empty($_POST['tokenn'])){
	$en = mysqli_query($koneksi,"update user set token_push = '$_POST[tokenn]',
	last_online = '$tanggal', last_online2 = '$tanggal2'
	where idUser = '$be2[idUser]'");
	}else{
	$en = mysqli_query($koneksi,"update user set last_online = '$tanggal', last_online2 = '$tanggal2'
	where idUser = '$be2[idUser]'");
	
	}
}

	?>
	[{
		"message":"okesip"
	}]
	<?php
}else{
?>
	[{
		"message":"No Permit"
	}]
<?php	
}

?>