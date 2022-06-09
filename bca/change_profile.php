<?php 
	include 'db.php';
	$response = array();

	
		$username = $_POST['username'];
		$password = md5($_POST['token']);
        $level = "member";
		
		$sql = mysqli_query($koneksi,"SELECT * FROM user WHERE idUser='$_POST[username]' and password = '$password'");

		if (mysqli_num_rows($sql) > 0) {
			$sql2 = mysqli_fetch_array($sql);

		//	mysqli_query($koneksi,"UPDATE user set token_push = '$_POST[token]' where idUser = '$sql2[idUser]'");


        if($_POST['level'] == "ganti_password"){

            
            if(md5($_POST['judul']) != $sql2['password']){
            $response['result'] = "0";
			$response['msg'] = "Mauvais mot de passe";
            }else {

            if($_POST['deskripsi'] == $_POST['password']){
            $psd = md5($_POST['password']);

            mysqli_query($koneksi,"UPDATE user set password = '$psd' where idUser = '$_POST[username]' and password = '$password'");

            $response['result'] = "1";
			$response['msg'] = "Mot de passe modifié avec succès";
			$response['username'] = $username;
            $response['level'] = $level;
            $response['token'] = $_POST['token'];
            $response['device_id'] = $sql2['device_id'];
                
            $response['judul'] = $sql2['username'];
            $response['deskripsi'] = $sql2['first_name'];
            $response['gambar'] = $sql2['second_name'];
            $response['link'] = $sql2['phone'];
            }else{
                $response['result'] = "0";
                $response['msg'] = "Mot de passe pas le même";
            }

            }
        }else{
        
        
        $judul1 = str_replace("'","&petiksatu&",$_POST['judul']);
        $deskripsi1 = str_replace("'","&petiksatu&",$_POST['deskripsi']);
        $alamat1 = str_replace("'","&petiksatu&",$_POST['alamat']);
        $company1 = str_replace("'","&petiksatu&",$_POST['company']);
        
        mysqli_query($koneksi,"UPDATE user set 
        first_name = '$judul1',
        second_name = '$deskripsi1', 
        phone = '$_POST[phone_number]',
        alamat = '$alamat1',
        fax = '$_POST[mobile]',
        employement = '$_POST[employement]',
        company = '$company1'
         where idUser = '$_POST[username]' and password = '$password'");

        $response['result'] = "1";
        $response['msg'] = "Profil modifié avec succès";
        $response['username'] = $username;
        $response['level'] = $level;
        $response['token'] = $_POST['token'];
        $response['device_id'] = $sql2['device_id'];
            
        $response['judul'] = $sql2['username'];
        $response['deskripsi'] = $sql2['first_name'];
        $response['gambar'] = $sql2['second_name'];
        $response['link'] = $sql2['phone'];
        }
            // $bg = mysqli_query($koneksi,"select * from tb_template order by id_template desc limit 1");
            // $bg2 = mysqli_fetch_array($bg);
        
           



			echo json_encode($response);
		}else{
			$response['result'] = "0";
			$response['msg'] = "Mot de passe incorrect ou identifiant non-enregristre ".$_POST['username'];

			echo json_encode($response);
		}


	


 ?>