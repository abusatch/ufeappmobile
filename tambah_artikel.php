<?php

	include "db.php";

// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
	

	class emp{}

	

	if($_GET['source'] == "flutter"){

$image = $_POST['image'];



	$name = $_GET['name'];

	$judul = $_GET['judul'];

	$linkweb = $_GET['linkweb'];
	}else{

	$image = $_POST['image'];



	$name = $_POST['name'];

	$judul = $_POST['judul'];

	$linkweb = $_POST['linkweb'];

	}

	date_default_timezone_set('Asia/Jakarta');

	$tanggal = date('Y-m-d');

	$tanggal2 = date('Y-m-d H:i:s');







	



	if($_GET['source'] == "flutter"){
?>
[
<?php

if (empty($name)) { 

	// $response = new emp();

	// $response->success = 0;

	// $response->message = "Deskripsi atau Linkweb tidak boleh kosong 1"; 

	// die(json_encode($response))."]";


	?>
{"success":0,"message":"Deskripsi atau Linkweb tidak boleh kosong 1"}]

	<?php

} else {

// 	$random = random_word(20);

// 	function random_word($id = 20){

// 	$pool = '1234567890abcdefghijkmnpqrstuvwxyz';

	

// 	$word = '';

// 	for ($i = 0; $i < $id; $i++){

// 		$word .= substr($pool, mt_rand(0, strlen($pool) -1), 1);

// 	}

// 	return $word; 

// }

	// $path = $random.".jpg";

	

	$path = $_GET['email'].substr(date('YmdHis'),0,-1).".png";

	$path2 = "images/actualite/".$path;

	
	$dfe = mysqli_query($koneksi,"select * from user where username = '$_GET[email]'");
	$dfe2 = mysqli_fetch_assoc($dfe);


	$hf = mysqli_query($koneksi,"select * from user where idUser = '$dfe2[idUser]'");

	$hf2 = mysqli_fetch_array($hf);

	if($hf2['member_dari'] == ""){

		$idinput = $dfe2['idUser'];

	}else{

		$idinput = $hf2['member_dari'];

	}



	// sesuiakan ip address laptop/pc atau URL server

	$actualpath = "http://ufe-section-indonesie.org/ufeapp/images/actualite/$path";

	

	if($_GET['id_template'] == ""){





	// $query = mysqli_query($koneksi, "INSERT INTO tb_actualite (id_actualite,judul,deskripsi,gambar,url) VALUES (null,'$name','$name','$path','$linkweb')");

	// }else{

	// $query = mysqli_query($koneksi, "UPDATE tb_actualite set judul = '$name',deskripsi = '$name',gambar = '$path' ,url = '$linkweb' where id_actualite = '$_GET[id_artikel]'");

	// }

	if (!$_FILES['image']['tmp_name']){

		// 	$response = new emp();

		// $response->success = 0;

		// $response->message = "Gambar tidak boleh kosong";

		// die(json_encode($response)); 
		// 	echo "]";
		?>
{"success":0,"message":"Gambar tidak boleh kosong"}]
		<?php

	}else{
		$imm = $_FILES['image']['name'];
		//$inputimage = file_put_contents($path2,base64_decode($image));
		$tmp_name = $_FILES['image']['tmp_name'];
			$inputimage = move_uploaded_file($tmp_name,$path2);
		if($inputimage){

	$query = mysqli_query($koneksi, "INSERT INTO tb_template (
	judul,
	deskripsi,
	id_member_vip,
	gambar,
	linkweb,
	tanggal,
	tanggal2,
	tanggal_edit2,
	user_edit,
	keterangan,
	visibility,
	long_textt

	) VALUES (
	'$judul',
	'$name',
	'$idinput',
	'$path',
	'$linkweb',
	'$tanggal',
	'$tanggal2',

	'',
	'$dfe2[idUser]',
	'pending',
	'1',
	'$image'
)");

}




	$isipesan = "Thank You. Artikel akan segera di publish";

	



	$hf = mysqli_query($koneksi,"select * from user where idUser = '$dfe2[idUser]'");

	$hf2 = mysqli_fetch_array($hf);

	if($hf2['member_dari'] == ""){

		mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)

		values

		('Confirmation d’attente','$isipesan','$dfe2[idUser]','-','-','$tanggal','$tanggal2')");



		$gh = mysqli_query($koneksi,"select * from user where member_dari = '$dfe2[idUser]'");

		while ($gh2 = mysqli_fetch_array($gh)){



			mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)

		values

		('Confirmation d’attente','$isipesan','$gh2[idUser]','-','-','$tanggal','$tanggal2')");

		}



	}else{

		

		$hfc = mysqli_query($koneksi,"select * from user where idUser = '$hf2[member_dari]'");

		$hfc2 = mysqli_fetch_array($hfc);

		mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)

		values

		('Confirmation d’attente','$isipesan','$hfc2[idUser]','-','-','$tanggal','$tanggal2')");



		

		$gh = mysqli_query($koneksi,"select * from user where member_dari = '$hf2[member_dari]'");

		while ($gh2 = mysqli_fetch_array($gh)){



			mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)

		values

		('Confirmation d’attente','$isipesan','$gh2[idUser]','-','-','$tanggal','$tanggal2')");

		}

	}







	// mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)

	// values

	// ('Confirmation d’attente','$isipesan','$idinput','-','-','$tanggal','$tanggal2')");













	// $response = new emp();

	// 	$response->success = 1;

	// 	$response->message = "Téléchargement réussi".mysqli_error($koneksi)."-iduser-".$dfe2['idUser']."-idinput-".$idinput;

	// 	die(json_encode($response));

	// echo "]";
	?>
<?php if($query){ ?>
{"success":1,"message":"Téléchargement réussi", "email":"<?php echo $_POST['username2'] ?>"}]
<?php }else{ ?>
{"success":0,"message":"Connection problem, please try again <?php echo mysqli_error($koneksi)."-"; ?>"}]
<?php } ?>
	<?php

	}	

}else{



	if (!$_FILES['image']['tmp_name']){



	$query = mysqli_query($koneksi, "UPDATE tb_template set judul = '$judul',deskripsi = '$name',linkweb = '$linkweb',

	tanggal_edit = '$tanggal',tanggal_edit2 = '$tanggal2',user_edit = '$idinput', keterangan = 'pending'

	 where id_template = '$_GET[id_template]'");

	

	// $response = new emp();

	// $response->success = 1;

		if($hf2['level'] == "admin-ufe"){
?>

{"success":1,"message":"Data berhasil di ubah - admin"}]

<?php
//	$response->message = "Data berhasil di ubah - admin";

		}else{
?>
{"success":1,"message":"Data berhasil di ubah 1"}]

<?php
//			$response->message = "Data berhasil di ubah baru";

		}



	// die(json_encode($response));
	// echo "]";
	}else{

		$tmp_name = $_FILES['image']['tmp_name'];
			$inputimage = move_uploaded_file($tmp_name,$path2);
//		$inputimage = file_put_contents($path2,base64_decode($image));

	$query = mysqli_query($koneksi, "UPDATE tb_template set judul = '$judul',deskripsi = '$name',gambar = '$path' ,linkweb = '$linkweb',

	tanggal_edit = '$tanggal',tanggal_edit2 = '$tanggal2',user_edit = '$idinput'

	 where id_template = '$_GET[id_template]'");

	
?>


{"success":1,"message":"Data berhasil di ubah 2"}]

<?php
	// $response = new emp();

	// 	$response->success = 1;

	// 	$response->message = "Data berhasil di ubah 2";

	// 	die(json_encode($response));
	// echo "]";
	}



}







	// if ($query){

	// 	if ($_GET['image'] == ""){

	// 	}else{

	// 	file_put_contents($path2,base64_decode($image));

	// 	}

	// 	$response = new emp();

	// 	$response->success = 1;

	// 	$response->message = "Téléchargement réussi";

	// 	die(json_encode($response));

	// } else{ 

	// 	$response = new emp();

	// 	$response->success = 0;

	// 	$response->message = "Error Upload image";

	// 	die(json_encode($response)); 

	// }

}	



// fungsi random string pada gambar untuk menghindari nama file yang sama

function random_word($id = 20){

	$pool = '1234567890abcdefghijkmnpqrstuvwxyz';

	

	$word = '';

	for ($i = 0; $i < $id; $i++){

		$word .= substr($pool, mt_rand(0, strlen($pool) -1), 1);

	}

	return $word; 

}



mysqli_close($con);
?>

<?php
	}else{
?>
	



<?php

	if (empty($name)) { 

		$response = new emp();

		$response->success = 0;

		$response->message = "Deskripsi atau Linkweb tidak boleh kosong 2"; 

		die(json_encode($response));

	} else {

		$random = random_word(20);

		

		// $path = $random.".jpg";

		$path = $_POST['image2'];

		$path2 = "images/actualite/".$_POST['image2'];

		

		$hf = mysqli_query($koneksi,"select * from user where idUser = '$_POST[id_user]'");

		$hf2 = mysqli_fetch_array($hf);

		if($hf2['member_dari'] == ""){

			$idinput = $_POST['id_user'];

		}else{

			$idinput = $hf2['member_dari'];

		}



		// sesuiakan ip address laptop/pc atau URL server

		$actualpath = "http://ufe-section-indonesie.org/ufeapp/images/actualite/$path";

		

		if($_POST['id_template'] == ""){





		// $query = mysqli_query($koneksi, "INSERT INTO tb_actualite (id_actualite,judul,deskripsi,gambar,url) VALUES (null,'$name','$name','$path','$linkweb')");

		// }else{

		// $query = mysqli_query($koneksi, "UPDATE tb_actualite set judul = '$name',deskripsi = '$name',gambar = '$path' ,url = '$linkweb' where id_actualite = '$_POST[id_artikel]'");

		// }

		if ($_POST['image'] == ""){

				$response = new emp();

			$response->success = 0;

			$response->message = "Gambar tidak boleh kosong";

			die(json_encode($response)); 

		}else{

			file_put_contents($path2,base64_decode($image));

		$query = mysqli_query($koneksi, "INSERT INTO tb_indonesie (id_indonesie,

        judul,

        header,

        gambar,

        deskripsi

        ) VALUES (null,'$judul','$_POST[short]','$path','$name')");





		$isipesan = "Thank You. Artikel akan segera di publish";

		



		$hf = mysqli_query($koneksi,"select * from user where idUser = '$_POST[id_user]'");

		$hf2 = mysqli_fetch_array($hf);

		if($hf2['member_dari'] == ""){

			mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)

			values

			('Confirmation d’attente','$isipesan','$_POST[id_user]','-','-','$tanggal','$tanggal2')");



			$gh = mysqli_query($koneksi,"select * from user where member_dari = '$_POST[id_user]'");

			while ($gh2 = mysqli_fetch_array($gh)){



				mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)

			values

			('Confirmation d’attente','$isipesan','$gh2[idUser]','-','-','$tanggal','$tanggal2')");

			}



		}else{

			

			$hfc = mysqli_query($koneksi,"select * from user where idUser = '$hf2[member_dari]'");

			$hfc2 = mysqli_fetch_array($hfc);

			mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)

			values

			('Confirmation d’attente','$isipesan','$hfc2[idUser]','-','-','$tanggal','$tanggal2')");



			

			$gh = mysqli_query($koneksi,"select * from user where member_dari = '$hf2[member_dari]'");

			while ($gh2 = mysqli_fetch_array($gh)){



				mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)

			values

			('Confirmation d’attente','$isipesan','$gh2[idUser]','-','-','$tanggal','$tanggal2')");

			}

		}







		// mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)

		// values

		// ('Confirmation d’attente','$isipesan','$idinput','-','-','$tanggal','$tanggal2')");













		$response = new emp();

			$response->success = 1;

			$response->message = "Téléchargement réussi".mysqli_error($koneksi)."-iduser-".$_POST['id_user']."-idinput-".$idinput;

			die(json_encode($response));



		}	

	}else{



		if ($_POST['image'] == ""){



		$query = mysqli_query($koneksi, "UPDATE tb_template set judul = '$judul',deskripsi = '$name',linkweb = '$linkweb',

		tanggal_edit = '$tanggal',tanggal_edit2 = '$tanggal2',user_edit = '$idinput', keterangan = '$_POST[keterangan]'

		 where id_template = '$_POST[id_template]'");

		

		$response = new emp();

		$response->success = 1;

			if($hf2['level'] == "admin-ufe"){



		$response->message = "Data berhasil di ubah - admin";

			}else{

				$response->message = "Data berhasil di ubah baru";

			}



		die(json_encode($response));

		}else{

			file_put_contents($path2,base64_decode($image));

		$query = mysqli_query($koneksi, "UPDATE tb_template set judul = '$judul',deskripsi = '$name',gambar = '$path' ,linkweb = '$linkweb',

		tanggal_edit = '$tanggal',tanggal_edit2 = '$tanggal2',user_edit = '$idinput'

		 where id_template = '$_POST[id_template]'");

		



		$response = new emp();

			$response->success = 1;

			$response->message = "Data berhasil di ubah 2";

			die(json_encode($response));

		}

	

	}







		// if ($query){

		// 	if ($_POST['image'] == ""){

		// 	}else{

		// 	file_put_contents($path2,base64_decode($image));

		// 	}

		// 	$response = new emp();

		// 	$response->success = 1;

		// 	$response->message = "Téléchargement réussi";

		// 	die(json_encode($response));

		// } else{ 

		// 	$response = new emp();

		// 	$response->success = 0;

		// 	$response->message = "Error Upload image";

		// 	die(json_encode($response)); 

		// }

	}	

	

	// fungsi random string pada gambar untuk menghindari nama file yang sama

	function random_word($id = 20){

		$pool = '1234567890abcdefghijkmnpqrstuvwxyz';

		

		$word = '';

		for ($i = 0; $i < $id; $i++){

			$word .= substr($pool, mt_rand(0, strlen($pool) -1), 1);

		}

		return $word; 

	}



	mysqli_close($con);
?>

	<?php
}

?>	