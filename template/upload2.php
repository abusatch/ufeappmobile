<?php
	include_once "koneksi.php";
	
	class emp{}
	
	$image = $_POST['image'];
	$name = $_POST['name'];
	$linkweb = $_POST['linkweb'];
	
	if (empty($name)) { 
		$response = new emp();
		$response->success = 0;
		$response->message = "Deskripsi atau Linkweb tidak boleh kosong"; 
		die(json_encode($response));
	} else {
		$random = random_word(20);
		
		$path = "images2/".$random.".png";
		
		// sesuiakan ip address laptop/pc atau URL server
		$actualpath = "http://ufe-section-indonesie.org/ufeapp/template/$path";
		
		$query = mysqli_query($con, "INSERT INTO volley_upload2 (photo,name,linkweb) VALUES ('$actualpath','$name','$linkweb')");
		
		if ($query){
			file_put_contents($path,base64_decode($image));
			
			$response = new emp();
			$response->success = 1;
			$response->message = "Successfully Uploaded";
			die(json_encode($response));
		} else{ 
			$response = new emp();
			$response->success = 0;
			$response->message = "Error Upload image";
			die(json_encode($response)); 
		}
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

