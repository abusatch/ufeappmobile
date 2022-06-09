<?php
	include "db.php";
	  date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('Y-m-d');
    $tanggal2 = date('Y-m-d H:i:s');

	class usr{}
    

$pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';


    
    $email = $_POST['username'];

// Remove all illegal characters from email
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    
    $dibaca = "-".$_POST['username']."-";
    $pss = md5($_POST['pss']);

    $query = mysqli_query($koneksi,"SELECT * FROM user where username = '$_POST[username]' ");
    
  
	
    $row = mysqli_fetch_array($query);
    $row2 = mysqli_num_rows($query);
	
	if ($row2 >= 1){

?>

<?php
// $fr = mysqli_query($koneksi,"select * from tb_agent where id_agent = '$_POST[id_agent]'");
// $fr2 = mysqli_fetch_array($fr);
?>


{
  "success": 0,
  "message": "e-mail Déjà Enregistré",
  "id": "<?php echo $row2 ?>",
  
  "username": "<?php echo $row2 ?>"
}
	
<?php		

	} else { 

    if($_POST['username'] == ""){
        ?>
{        
         "success": 0,
  "message": "Email tidak boleh kosong <?php //echo $_POST['ket_level'] ?>"
 
 }
 
 <?php
 
 
 }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ ?>
 {
   "success": 0,
  "message": "Email tidak valid"
 }
 
 
 <?php
    }else if($_POST['pss'] == ""){
      ?>
      {
             "success": 0,
  "message": "Password tidak boleh kosong"
}
<?php
    }else if($_POST['pss'] != $_POST['pss2']){
?>
{
             "success": 0,
  "message": "Password tidak sama"
}


<?php
    }else if($_POST['first_name'] == ""){
?>
{
             "success": 0,
  "message": "Nama depan tidak boleh kosong"
}



<?php
    }else if($_POST['second_name'] == ""){
?>
{
             "success": 0,
  "message": "Nama belakang tidak boleh kosong"
}



<?php
    }else{
        
        
        if($_POST['ket_level'] == "PERSONAL MEMBER"){
            $ket_memberr = "personal";
        }else{
            
        //     	include "db.php";
        //     $psw = md5($_POST['pss']);
            
        //     $yu = mysqli_query($koneksi,"select * from user where username = '$_POST[username]' and password = '$psw'");
        //     $yu2 = mysqli_fetch_array($yu);
            
            
        //      if($_POST['harga_daftar'] == "14 JOURS - IDR 5.000.000"){
	       //     $hargaa = "5000000";
	       // }else if($_POST['harga_daftar'] == "1 MOIS - IDR 10.000.000"){
	       //      $hargaa = "10000000";
	       // }else if($_POST['harga_daftar'] == "3 MOIS - IDR 20.000.000"){
	       //     $hargaa = "20000000";
	       // }else if($_POST['harga_daftar'] == "6 MOIS - IDR 35.000.000"){
	       //     $hargaa = "35000000";
	       // }else if($_POST['harga_daftar'] == "1 AN - IDR 50.000.000"){
	       //     $hargaa = "50000000";
	       // }
	        
	        
	       // mysqli_query($koneksi,"insert into tb_order (
	       // id_activites,
	       // jenis_order,
	       // id_user,
	       // nama_produk,
	       // harga,
	       // tanggal,
	       // tanggal2
	       // )
	       // values
	       // (
	       // '123',
	       // 'memberufe',
	       // '$yu2[idUser]',
	       // 'Member UFE',
	       // '$hargaa',
	       // '$tanggal',
	       // '$tanggal2'
	       // )
	       // ");
            
            
            $ket_memberr = "vip-admin";
        }
        
        
        
        
        
        
        
        $pass23 = md5($_POST['pss']);
        
        mysqli_query($koneksi,"insert into user (
            username,
            password,
            level,
            device_id,
            first_name,
            second_name,
            phone,
            mobile,
            alamat,
            company,
            employement,
            tgl_daftar,
            tgl_daftar2,
            token_push
            ) values (
                '$_POST[username]',
                '$pass23',
                '$ket_memberr',
                '$_POST[device_id]',
                '$_POST[first_name]',
                '$_POST[second_name]',
                '$_POST[phone]',
                '$_POST[mobile]',
                '$_POST[alamat]',
                '$_POST[company]',
                '$_POST[employement]',
                '$tanggal',
                '$tanggal2',
                '$_POST[token_push]'
                
                )");
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
          if($_POST['ket_level'] == "PERSONAL MEMBER"){
            // $ket_memberr = "personal";
        }else{
            
            	include "db.php";
            $psw = md5($_POST['pss']);
            
            $yu = mysqli_query($koneksi,"select * from user where username = '$_POST[username]' and password = '$psw'");
            $yu2 = mysqli_fetch_array($yu);
            
            
              $daftur = strtoupper($_POST['harga_daftar']);

             if($daftur == "14 JOURS - IDR 5.000.000"){
	            $hargaa = "5000000";
	        }else if($daftur == "1 MOIS - IDR 10.000.000"){
	             $hargaa = "10000000";
	        }else if($daftur == "3 MOIS - IDR 20.000.000"){
	            $hargaa = "20000000";
	        }else if($daftur == "6 MOIS - IDR 35.000.000"){
	            $hargaa = "35000000";
	        }else if($daftur == "1 AN - IDR 50.000.000"){
	            $hargaa = "50000000";
	        }
	        
	        
	        mysqli_query($koneksi,"insert into tb_order (
	        id_activites,
	        jenis_order,
	        id_user,
	        nama_produk,
	        harga,
	        tanggal,
	        tanggal2
	        )
	        values
	        (
	        '123',
	        'memberufe',
	        '$yu2[idUser]',
	        'Member UFE',
	        '$hargaa',
	        '$tanggal',
	        '$tanggal2'
	        )
	        ");
            
			
			
			
			
			$pl = mysqli_query($koneksi,"select * from tb_order where id_user = '$yu2[idUser]' order by id_order desc");
	$pl2 = mysqli_fetch_array($pl);
	
	date_default_timezone_set('Asia/Jakarta');
		$stop_date = date('Y-m-d');
	$stop_date = date('ymd', strtotime($stop_date . ' +0 day'));
	
	$noin = "INV/".$yu2['idUser'].$pl2['id_order'].$stop_date;
	
	mysqli_query($koneksi,"update tb_order set no_invoice = '$noin' where id_order = '$pl2[id_order]'");
            
            // $ket_memberr = "vip-admin";
        }
        
        
        
        
        
        
        
        ?>
        
        {
         "success": 1,
  "message": "Inscription Réussie <?php // $ket_memberr ?>",
  "ket_check": "<?php echo $_POST['ket_check'] ?>"
    
    }
    <?php
    }





?>


<?php
    }
    $username = $_POST["username"];

?>