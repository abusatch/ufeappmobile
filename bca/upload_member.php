<?php
	include "db.php";
	
	class emp{}
	
	$image = $_POST['image'];
	$first_name = $_POST['first_name'];
    $second_name = $_POST['second_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];

    // $judul = $_POST['judul'];
	// $linkweb = $_POST['linkweb'];
	
	date_default_timezone_set('Asia/Jakarta');
	$tanggal = date('Y-m-d');
	$tanggal2 = date('Y-m-d H:i:s');



	




	if (empty($first_name)) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Nama Tidak Boleh Kosong"; 
		die(json_encode($response));
    
    }else if(empty($second_name)){
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
		// 	file_put_contents($path2,base64_decode($image));
		// $query = mysqli_query($koneksi, "INSERT INTO tb_template (id_template,
		// judul,
		// deskripsi,
		// id_member_vip,
		// gambar,
		// linkweb,
		// tanggal,
		// tanggal2,
		// keterangan,
		// keterangan2,
		// visibility) VALUES (null,'$judul','$name','$idinput','$path','$linkweb','$tanggal','$tanggal2','pending',null,'1')");

		$response = new emp();
			$response->success = 1;
			$response->message = "Téléchargement réussi";
			die(json_encode($response));

		}	
		
		
		
		
		
		
		
		}else if($_POST['id_template'] == null){
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
		// 	file_put_contents($path2,base64_decode($image));
		// $query = mysqli_query($koneksi, "INSERT INTO tb_template (id_template,
		// judul,
		// deskripsi,
		// id_member_vip,
		// gambar,
		// linkweb,
		// tanggal,
		// tanggal2,
		// keterangan,
		// keterangan2,
		// visibility) VALUES (null,'$judul','$name','$idinput','$path','$linkweb','$tanggal','$tanggal2','pending',null,'1')");

		$response = new emp();
			$response->success = 1;
			$response->message = "Téléchargement réussi";
			die(json_encode($response));

		}	
		
		
		
		
		
	}else{

		if ($_POST['image'] == ""){

		// $query = mysqli_query($koneksi, "UPDATE tb_template set judul = '$judul',deskripsi = '$name',linkweb = '$linkweb',
		// tanggal_edit = '$tanggal',tanggal_edit2 = '$tanggal2',user_edit = '$idinput', keterangan = '$_POST[keterangan]'
		//  where id_template = '$_POST[id_template]'");
		
		$response = new emp();
		$response->success = 1;
			if($hf2['level'] == "admin-ufe"){

		$response->message = "Data berhasil di ubah - admin";
			}else{
				$response->message = "Data berhasil di ubah";
			}

		die(json_encode($response));
		}else{
		// 	file_put_contents($path2,base64_decode($image));
		// $query = mysqli_query($koneksi, "UPDATE tb_template set judul = '$judul',deskripsi = '$name',gambar = '$path' ,linkweb = '$linkweb',
		// tanggal_edit = '$tanggal',tanggal_edit2 = '$tanggal2',user_edit = '$idinput'
		//  where id_template = '$_POST[id_template]'");
		

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