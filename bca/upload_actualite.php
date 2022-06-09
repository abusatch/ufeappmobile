<?php
	include "db.php";
	
	class emp{}
	
	$image = $_POST['image'];
	$name = $_POST['name'];
	$judul = $_POST['judul'];
	$linkweb = $_POST['linkweb'];
	
	date_default_timezone_set('Asia/Jakarta');
	$tanggal = date('Y-m-d');
	$tanggal2 = date('Y-m-d H:i:s');



	




	if (empty($name)) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Deskripsi atau Linkweb tidak boleh kosong"; 
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
		$query = mysqli_query($koneksi, "INSERT INTO tb_actualite (id_actualite,
		judul,
		deskripsi,
		id_member,
		gambar,
		url,
		tanggal,
		tanggal2,
		keterangan) VALUES (null,'$judul','$name','$idinput','$path','$linkweb','$tanggal','$tanggal2','')");


		$isipesan = "Your article ".$judul." is published";
		

		$hf = mysqli_query($koneksi,"select * from user where idUser = '$_POST[id_user]'");
		$hf2 = mysqli_fetch_array($hf);
		if($hf2['member_dari'] == ""){
			mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
			values
			('Published','$isipesan','$_POST[id_user]','-','-','$tanggal','$tanggal2')");

			$gh = mysqli_query($koneksi,"select * from user where member_dari = '$_POST[id_user]'");
			while ($gh2 = mysqli_fetch_array($gh)){

				mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
			values
			('Published','$isipesan','$gh2[idUser]','-','-','$tanggal','$tanggal2')");
			}

		}else{
			
			$hfc = mysqli_query($koneksi,"select * from user where idUser = '$hf2[member_dari]'");
			$hfc2 = mysqli_fetch_array($hfc);
			mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
			values
			('Published','$isipesan','$hfc2[idUser]','-','-','$tanggal','$tanggal2')");

			
			$gh = mysqli_query($koneksi,"select * from user where member_dari = '$hf2[member_dari]'");
			while ($gh2 = mysqli_fetch_array($gh)){

				mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
			values
			('Published','$isipesan','$gh2[idUser]','-','-','$tanggal','$tanggal2')");
			}
		}



		// mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
		// values
		// ('Confirmation d’attente','$isipesan','$idinput','-','-','$tanggal','$tanggal2')");






		$response = new emp();
			$response->success = 1;
			$response->message = "Téléchargement réussi";
			die(json_encode($response));

		}	
		
		}else if($_POST['id_template'] == "null"){
		    
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
		$query = mysqli_query($koneksi, "INSERT INTO tb_actualite (id_actualite,
		judul,
		deskripsi,
		id_member,
		gambar,
		url,
		tanggal,
		tanggal2,
		keterangan) VALUES (null,'$judul','$name','$idinput','$path','$linkweb','$tanggal','$tanggal2','')");


		$isipesan = "Your article ".$judul." is published";
		

		$hf = mysqli_query($koneksi,"select * from user where idUser = '$_POST[id_user]'");
		$hf2 = mysqli_fetch_array($hf);
		if($hf2['member_dari'] == ""){
			mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
			values
			('Published','$isipesan','$_POST[id_user]','-','-','$tanggal','$tanggal2')");

			$gh = mysqli_query($koneksi,"select * from user where member_dari = '$_POST[id_user]'");
			while ($gh2 = mysqli_fetch_array($gh)){

				mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
			values
			('Published','$isipesan','$gh2[idUser]','-','-','$tanggal','$tanggal2')");
			}

		}else{
			
			$hfc = mysqli_query($koneksi,"select * from user where idUser = '$hf2[member_dari]'");
			$hfc2 = mysqli_fetch_array($hfc);
			mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
			values
			('Published','$isipesan','$hfc2[idUser]','-','-','$tanggal','$tanggal2')");

			
			$gh = mysqli_query($koneksi,"select * from user where member_dari = '$hf2[member_dari]'");
			while ($gh2 = mysqli_fetch_array($gh)){

				mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
			values
			('Published','$isipesan','$gh2[idUser]','-','-','$tanggal','$tanggal2')");
			}
		}



		// mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
		// values
		// ('Confirmation d’attente','$isipesan','$idinput','-','-','$tanggal','$tanggal2')");






		$response = new emp();
			$response->success = 1;
			$response->message = "Data berhasil di ubah - admin";
			die(json_encode($response));

		}	
	}else{

		if ($_POST['image'] == ""){

		$query = mysqli_query($koneksi, "UPDATE tb_actualite set judul = '$judul',deskripsi = '$name',url = '$linkweb',
		tanggal_edit = '$tanggal',tanggal_edit2 = '$tanggal2',user_edit = '$idinput', keterangan = '$_POST[keterangan]'
		 where id_actualite = '$_POST[id_template]'");
		
		$response = new emp();
		$response->success = 1;
			if($hf2['level'] == "admin-ufe"){

		$response->message = "Data berhasil di ubah - admin";
			}else{
				$response->message = "Data berhasil di ubah";
			}

		die(json_encode($response));
		}else{
			file_put_contents($path2,base64_decode($image));
		$query = mysqli_query($koneksi, "UPDATE tb_actualite set judul = '$judul',deskripsi = '$name',gambar = '$path' ,url = '$linkweb',
		tanggal_edit = '$tanggal',tanggal_edit2 = '$tanggal2',user_edit = '$idinput'
		 where id_actualite = '$_POST[id_template]'");
		

		$response = new emp();
			$response->success = 1;
			$response->message = "Data berhasil di ubah 2 ini ".$_POST['id_template'];
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