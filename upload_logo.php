<?php
	include "db.php";
	
	class emp{}
	
	 $image = $_POST['image'];
	$name = "ya";
	// $judul = $_POST['judul'];
	// $linkweb = $_POST['linkweb'];
	
	date_default_timezone_set('Asia/Jakarta');
	$tanggal = date('Y-m-d');
	$tanggal2 = date('Y-m-d H:i:s');



    	
		$username = $_POST['id_user'];
		
		
		
		
		
		$password = md5($_POST['pss']);
        // $level = "member";
		
		$sql = mysqli_query($koneksi,"SELECT * FROM user WHERE idUser='$username' and password = '$password'");
        $sql3 = mysqli_num_rows($sql);

        $kt = mysqli_fetch_array($sql);
        
        if($kt['member_dari'] == null){
            $username = $_POST['id_user'];
        }else if($kt['member_dari'] == "null"){
            $username = $_POST['id_user'];            
        }else if($kt['member_dari'] == ""){
            $username = $_POST['id_user'];            
        }else{
            $username = $kt['member_dari'];
        }


	if ($sql3 == 0) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Accès refusé"; 
		die(json_encode($response));
	} else {
		$random = random_word(20);
		
		// $path = $random.".jpg";
		$path = $_POST['image2'];
		$path2 = "images/propic/".$_POST['image2'];
		
		$hf = mysqli_query($koneksi,"select * from user where idUser = '$_POST[id_user]'");
		$hf2 = mysqli_fetch_array($hf);
		if($hf2['member_dari'] == ""){
			$idinput = $_POST['id_user'];
		}else{
			$idinput = $hf2['member_dari'];
		}

		// sesuiakan ip address laptop/pc atau URL server
		$actualpath = "http://ufe-section-indonesie.org/ufeapp/images/propic/$path";
		
		

		// if ($query){
			if ($sql3 == 0){
                $response = new emp();
			$response->success = 0;
			$response->message = "Échoué";
			}else{

            $kompani1 = str_replace("'","&petiksatu&",$_POST['kompani']);
            $deskripsi1 = str_replace("'","&petiksatu&",$_POST['deskripsi']);

                $eg = mysqli_query($koneksi,"UPDATE user set logo = '$_POST[image2]',
                company = '$kompani1',
                deskripsi = '$deskripsi1'
                
                WHERE idUser='$idinput'");

            file_put_contents($path2,base64_decode($image));
            $response = new emp();
			$response->success = 1;
			
			if($eg){
			$response->message = "Téléchargement réussi ini ".$_POST['image2']."id input ".$idinput;
			}else{
			    			$response->message = "Gagal Téléchargement réussi ini ".$_POST['image2']."id input ".$idinput." ket ".mysqli_error($koneksi);
			}
			}
			
			die(json_encode($response));
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