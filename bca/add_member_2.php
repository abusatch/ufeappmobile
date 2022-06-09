<?php 
	include "db.php";
	$response = array();
	if (isset($_POST['first_name']) && isset($_POST['second_name'])) {
		$first_name = $_POST['first_name'];
		$second_name = $_POST['second_name'];
		//$level = $_POST["level"];
		$password = md5($_POST['password']);
        $path = $_POST['image2'];
		$path2 = "images/propic/".$_POST['image2'];


        if($_POST['id_admin'] != "null"){



                // $username = 'andi';
                // $level = 'admin';
                // $password = '123456';
        
            // Cek data sudah ada apa belum
     

            if($_POST['password'] != ""){



$jumlah_karakter = strlen($_POST['password']);

 
   if($jumlah_karakter <= "5"){
        $response['success'] = 0;
		$response['message'] = "Password min 6 character";
        echo json_encode($response);


     }else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $response['success'] = 0;
            $response['message'] = "Invalid email format";
            echo json_encode($response);
     }else{




        $wq = mysqli_query($koneksi,"select * from tb_limit_member limit 1");
        $wq2 = mysqli_fetch_array($wq);

        $wq3 = $wq2['jumlah'] +1;

        $rg = mysqli_query($koneksi,"select * from user where member_dari = '$_POST[id_user]'");
        $rg2 = mysqli_num_rows($rg);

        if($rg2 >= $wq3){
            $response['success'] = 0;
            $response['message'] = "Sudah melewati limit";
        }else{

        if($_POST['image'] == ""){
            $sql = mysqli_query($koneksi,"update user set username = '$_POST[email]'
            ,first_name = '$_POST[first_name]'
            ,second_name = '$_POST[second_name]',password = '$password' where username = '$_POST[email]'
            "); 
           
        }else{
        file_put_contents($path2,base64_decode($_POST['image']));
        $sql = mysqli_query($koneksi,"update user set username = '$_POST[email]'
        ,first_name = '$_POST[first_name]'
        ,second_name = '$_POST[second_name]'
        ,propic = '$_POST[image2]',password = '$password' where username = '$_POST[email]'
        "); 
        }    
        if($sql){
            $response['success'] = 1;
            $response['message'] = "Data has been changed!!";
            }else{
            $response['success'] = 0;
            $response['message'] = "Change failed!!".mysqli_error($koneksi);
        }
    }
    echo json_encode($response);
   









     }
  }else{
        
                $wq = mysqli_query($koneksi,"select * from tb_limit_member limit 1");
                $wq2 = mysqli_fetch_array($wq);

                $wq3 = $wq2['jumlah'] +1;

                $rg = mysqli_query($koneksi,"select * from user where member_dari = '$_POST[id_user]'");
                $rg2 = mysqli_num_rows($rg);
        
                if($rg2 >= $wq3){
                    $response['success'] = 0;
                    $response['message'] = "Sudah melewati limit";
                }else{
        
                if($_POST['image'] == ""){
                    $sql = mysqli_query($koneksi,"update user set username = '$_POST[email]'
                    ,first_name = '$_POST[first_name]'
                    ,second_name = '$_POST[second_name]'  where username = '$_POST[email]'
                    "); 
                   
                }else{
                file_put_contents($path2,base64_decode($_POST['image']));
                $sql = mysqli_query($koneksi,"update user set username = '$_POST[email]'
                ,first_name = '$_POST[first_name]'
                ,second_name = '$_POST[second_name]'
                ,propic = '$_POST[image2]' where username = '$_POST[email]'
                "); 
                }    
                if($sql){
                    $response['success'] = 1;
                    $response['message'] = "Data has been changed!!";
                    }else{
                    $response['success'] = 0;
                    $response['message'] = "Change failed!!".mysqli_error($koneksi);
                }
            }
            echo json_encode($response);
           
       






















        }


        }else{

        $jumlah_karakter = strlen($_POST['password']);

    if($_POST['image'] == ""){

        $response['success'] = 0;
		$response['message'] = "Image can't be empty";
        echo json_encode($response);
        
    }else if($jumlah_karakter <= "5"){
        $response['success'] = 0;
		$response['message'] = "Password min 6 character";
        echo json_encode($response);


     }else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $response['success'] = 0;
            $response['message'] = "Invalid email format";
            echo json_encode($response);

    }else{
		// $username = 'andi';
		// $level = 'admin';
		// $password = '123456';

	// Cek data sudah ada apa belum
	$sql = "SELECT * FROM user WHERE username ='$_POST[email]'";
	$check = mysqli_fetch_array(mysqli_query($koneksi,$sql));
	if(isset($check)){
		$response['success'] = 0;
		$response['message'] = "Oops! email already registered!";
        echo json_encode($response);
        
    


	}else{

        $wq = mysqli_query($koneksi,"select * from tb_limit_member limit 1");
        $wq2 = mysqli_fetch_array($wq);

        $rg = mysqli_query($koneksi,"select * from user where member_dari = '$_POST[id_user]'");
        $rg2 = mysqli_num_rows($rg);

        if($rg2 >= $wq2['jumlah']){
            $response['success'] = 0;
			$response['message'] = "Sudah melewati limit";
        }else{


        file_put_contents($path2,base64_decode($_POST['image']));
        $sql = mysqli_query($koneksi,"insert into user (idUser,username,first_name,second_name,password,level,kode_vip,member_dari,device_id,propic) 
        VALUES (null,'$_POST[email]','$first_name','$second_name','$password','vip-user',null,'$_POST[id_user]',null,'$_POST[image2]')");
			if($sql){
			$response['success'] = 1;
			$response['message'] = "Registration successful!!";
			}else{
			$response['success'] = 0;
			$response['message'] = "Registration failed2!!".mysqli_error($koneksi);
        }
    }
	echo json_encode($response);
	}
} }
    }
 ?>