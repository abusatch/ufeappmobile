<?php
	include "db.php";
	
	class emp{}
	
	$namo = str_replace("'","\'",$_POST['name']);
	$namo2 = str_replace('"','\"',$namo);
	
	$judol = str_replace("'","\'",$_POST['judul']);
	$judol2 = str_replace('"','\"',$judol);
	
	
	$image = $_POST['image'];
	$name = $namo2;
	$judul = $judol2;
	$linkweb = $_POST['linkweb'];
	
	date_default_timezone_set('Asia/Jakarta');
	$tanggal = date('Y-m-d');
	$tanggal2 = date('Y-m-d H:i:s');



	




	if (empty($name)) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Description ou Linkweb ne doit pas être vierge"; 
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
		
		if(empty($_POST['id_template']) || $_POST['id_template'] == "null"){


		// $query = mysqli_query($koneksi, "INSERT INTO tb_actualite (id_actualite,judul,deskripsi,gambar,url) VALUES (null,'$name','$name','$path','$linkweb')");
		// }else{
		// $query = mysqli_query($koneksi, "UPDATE tb_actualite set judul = '$name',deskripsi = '$name',gambar = '$path' ,url = '$linkweb' where id_actualite = '$_POST[id_artikel]'");
		// }
		if ($_POST['image'] == ""){
				$response = new emp();
			$response->success = 0;
			$response->message = "L’image ne peut pas être vierge";
			die(json_encode($response)); 
		}else{
			file_put_contents($path2,base64_decode($image));
			
			
			$judul2 = str_replace("'","&petiksatu&",$_POST['judul']);
			$judul3 = str_replace('"',"&petikdua&",$judul2);
			
			$name2 = str_replace("'","&petiksatu&",$_POST['name']);
			$name3 = str_replace('"',"&petikdua&",$name2);
			
			
			$nc = mysqli_query($koneksi,"select * from tb_template where judul = '$judul3' and id_member_vip = '$idinput'");
			$nc2 = mysqli_num_rows($nc);
			
			if($nc2 == 0){
			
		$query = mysqli_query($koneksi, "INSERT INTO tb_template (id_template,
		judul,
		deskripsi,
		id_member_vip,
		gambar,
		linkweb,
		tanggal,
		tanggal2,
		keterangan,
		keterangan2,
		visibility) VALUES (null,'$judul3','$name3','$idinput','$path','$linkweb','$tanggal','$tanggal2','pending',null,'1')");
}

		$isipesan = "Merci. Votre article ".$judul3." est en attente de confirmation par admin";
		

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
			$response->message = "Téléchargement réussi";
			die(json_encode($response));

		}	
		
		
		
		
		
		
		
		
	}else{

		if (empty($_POST['image'])){
		    
		    
		    
		    
		    
		    $mg = mysqli_query($koneksi,"select * from user where idUser = '$_POST[id_user]'");
		    $mg2 = mysqli_fetch_array($mg);
		    
		    $isipesanadmin = "Template has been ".$_POST['keterangan']." by ".$mg2['username'];
		    
		    $judul10 = "Template has been ".$_POST['keterangan'];
		    
		    
		    
			
			$pendong = strtoupper($_POST['keterangan']);
			
			
		    
		    if($pendong == "PENDING"){
		        $keter = 'pending';
		    }else{
		        $keter = 'release';
		    }
		    

			$judul2 = str_replace("'","&petiksatu&",$_POST['judul']);
			$judul3 = str_replace('"',"&petikdua&",$judul2);
			
			$name2 = str_replace("'","&petiksatu&",$_POST['name']);
			$name3 = str_replace('"',"&petikdua&",$name2);

		$query = mysqli_query($koneksi, "UPDATE tb_template set judul = '$judul3',deskripsi = '$name3',linkweb = '$linkweb',
		tanggal_edit = '$tanggal',tanggal_edit2 = '$tanggal2',user_edit = '$idinput', keterangan = '$keter'
		 where id_template = '$_POST[id_template]'");
		
		
		
		
			if($hf2['level'] == "admin-ufe"){
			    
			    
			 	$gg = mysqli_query($koneksi,"select * from user where level = 'admin-ufe'");
			while ($gg2 = mysqli_fetch_array($gg)){

				mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
			values
			('$judul10','$isipesanadmin','$gg2[idUser]','-','-','$tanggal','$tanggal2')");
			}   
			    
			    
			}
		
		
		
		$pi = mysqli_query($koneksi,"select * from tb_template where id_template = '$_POST[id_template]'");
		$pi2 = mysqli_fetch_array($pi);
		
		
		
			$isipesan = "merci, votre article ".$judul3." a été publié par admin";
		

		$hf = mysqli_query($koneksi,"select * from user where idUser = '$pi2[id_member_vip]'");
		$hf2 = mysqli_fetch_array($hf);
		
			mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
			values
			('L’article a été publié','$isipesan','$pi2[id_member_vip]','-','-','$tanggal','$tanggal2')");

			$gh = mysqli_query($koneksi,"select * from user where member_dari = '$pi2[id_member_vip]'");
			while ($gh2 = mysqli_fetch_array($gh)){

				mysqli_query($koneksi,"insert into tb_notifikasi (judul,isi,kepada,dibaca,dihapus,tanggal,tanggal2)
			values
			('L’article a été publié','$isipesan','$gh2[idUser]','-','-','$tanggal','$tanggal2')");
			}


		
		
		
		
		
			$hv = mysqli_query($koneksi,"select * from user where idUser = '$_POST[id_user]'");
		$hv2 = mysqli_fetch_array($hv);
		
		
		
		
		
		$response = new emp();
		$response->success = 1;
			if($hv2['level'] == "admin-ufe"){
if($_POST['keterangan'] == "Pending"){
		$response->message = "Data berhasil di ubah - pending";
}else{
    	$response->message = "Data berhasil di ubah - admin";
}
			}else{
				$response->message = "Données modifiées avec succès";
			}

		die(json_encode($response));
		}else{
			file_put_contents($path2,base64_decode($image));
		$query = mysqli_query($koneksi, "UPDATE tb_template set judul = '$judul',deskripsi = '$name',gambar = '$path' ,linkweb = '$linkweb',
		tanggal_edit = '$tanggal',tanggal_edit2 = '$tanggal2',user_edit = '$idinput'
		 where id_template = '$_POST[id_template]'");
		

		$response = new emp();
			$response->success = 1;
			$response->message = "Données modifiées avec succès";
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