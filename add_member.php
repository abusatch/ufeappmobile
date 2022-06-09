<?php 

	include "db.php";

	$response = array();

if(!empty($_POST['email_admin'])){

$emm1 = str_replace('-at-', '@', $_POST['email_admin']);
$emm2 = str_replace('-titik-', '.', $emm1);

$ji = mysqli_query($koneksi,"select * from user where username = '$emm2'");
$ji2 = mysqli_fetch_assoc($ji);

if($_POST['password'] != $_POST['retype']){


	$response['result'] = 0;

	$response['msg'] = "Password not match";

	echo json_encode($response);


}else if($_POST['username'] == ""){
    
	$response['result'] = 0;

	$response['msg'] = "Email can not be empty";

	echo json_encode($response);

}else if($_POST['password'] == ""){
    
	$response['result'] = 0;

	$response['msg'] = "Password can not be empty";

	echo json_encode($response);

}else{



	$username = $_POST["username"];

	$nama = $_POST["nama"];

	//$level = $_POST["level"];

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



	$wq = mysqli_query($koneksi,"select * from tb_limit_member limit 1");

	$wq2 = mysqli_fetch_array($wq);



	$rg = mysqli_query($koneksi,"select * from user where member_dari = '$ji2[idUser]'");

	$rg2 = mysqli_num_rows($rg);



	if($rg2 >= $wq2['jumlah']){

		$response['result'] = 0;

		$response['msg'] = "Sudah melewati limit";

	}else{



	$sql = mysqli_query($koneksi,"insert into user (idUser,username,password,level,kode_vip,member_dari,device_id, verifikasi, verifikasi_admin) VALUES (null,'$username','$password','vip-user',null,'$ji2[idUser]',null,'sudah','sudah')");

		if($sql){

		$response['result'] = 1;

		$response['msg'] = "Registration successful!!";

		}else{

		$response['result'] = 0;

		$response['msg'] = "Registration failed2!!";

	}

}

echo json_encode($response);

}


}
}else{

	if (isset($_POST["username"]) && isset($_POST["password"])) {




		$username = $_POST["username"];

		$nama = $_POST["nama"];

		//$level = $_POST["level"];

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



        $wq = mysqli_query($koneksi,"select * from tb_limit_member limit 1");

        $wq2 = mysqli_fetch_array($wq);



        $rg = mysqli_query($koneksi,"select * from user where member_dari = '$_POST[id_admin]'");

        $rg2 = mysqli_num_rows($rg);



        if($rg2 >= $wq2['jumlah']){

            $response['result'] = 0;

			$response['msg'] = "Sudah melewati limit";

        }else{



		$sql = mysqli_query($koneksi,"insert into user (idUser,username,password,level,kode_vip,member_dari,device_id,verifikasi, verifikasi_admin) VALUES (null,'$username','$password','vip-user',null,'$_POST[id_admin]',null, 'sudah', 'sudah')");

			if($sql){

			$response['result'] = 1;

			$response['msg'] = "Registration successful!!";

			}else{

			$response['result'] = 0;

			$response['msg'] = "Registration failed2!!";

        }

    }

	echo json_encode($response);

	}

}else{
	$response['result'] = 0;

			$response['msg'] = "Sudah melewati limit";
			echo json_encode($response);
}
}

 ?>