<?php
	include "db.php";
	
	class usr{}
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('Y-m-d');
    $tanggal2 = date('Y-m-d H:i:s');

    
    $kode = $_POST['angka1'].$_POST['angka2'].$_POST['angka3'].$_POST['angka4'];

    $query = mysqli_query($koneksi,"SELECT * FROM user where username = '$_POST[email]' and kode_verif = '$kode'");
    // $query2 = mysqli_query($koneksi,"select * from tb_notifikasi");
	
    $row = mysqli_fetch_array($query);
    $row2 = mysqli_num_rows($query);
	
	if ($row2 >= 1){
	    
	    
	    if($_POST['ket_check'] == "personal"){}else{
	        
	        
	        
	       // if($_POST['harga_daftar'] == "14 JOURS - IDR 5.000.000"){
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
	       // '$row[idUser]',
	       // 'Member UFE',
	       // '$hargaa',
	       // '$tanggal',
	       // '$tanggal2'
	       // )
	       // ");
	    }
	    

        mysqli_query($koneksi,"update user set verifikasi = 'sudah', token_push = '$_POST[token_push]' where username = '$_POST[email]'");

?>

{
  "success": 1,
  "message": "",
  "id": "<?php echo $row2 ?>",
  "username": "<?php echo $row['idUser'] ?>",
  "email": "<?php echo $row['username'] ?>",
  "level": "<?php echo $row['level'] ?>"
  
}
	
<?php		
	// $response = new usr();
		// $response->success = 1;
		// $response->message = '"'.$row2.'"';
		// $response->id = '"'.$row2.'"';
		// $response->username = '"'.$row2.'"';
		// die(json_encode($response));
	} else { 

		// $response = new usr();
		// $response->success = 0;
		// $response->message = '"'.$row2.'"';
		// die(json_encode($response));
?>
{
  "success": 0,
  "message": "Mauvais code",
  "id": "<?php echo $row2 ?>",
  "username": "<?php echo $row2 ?>"
}

<?php
    }
    $username = $_POST["email"];
	// $password = $_POST["password"];
	
	// if ((empty($username)) || (empty($password))) { 
	// 	$response = new usr();
	// 	$response->success = 0;
	// 	$response->message = "Kolom tidak boleh kosong"; 
	// 	die(json_encode($response));
	// }
    
    // $dibaca = "-".$_POST['username']."-";

    // $u1 = $_POST['username']."-";
    // $u2 = $_POST['username']."-";

    // $qu = mysqli_query($koneksi,"SELECT * FROM tb_notifikasi where dibaca not like '%$dibaca%' and kepada = 'all' or kepada = '$_POST[username]' ");
    // while($qu2 = mysqli_fetch_array($qu)){

    //     $gh1 = $qu2['dibaca'];
    //     $gh2 = $gh1.$u1;

    //     if($qu2['dibaca'] == ""){
    //         mysqli_query($koneksi, "update tb_notifikasi set dibaca = '$gh2' where id_notifikasi = '$qu2[id_notifikasi]'" );
    //     }else{
    //     mysqli_query($koneksi, "update tb_notifikasi set dibaca = '$gh2' where id_notifikasi = '$qu2[id_notifikasi]'" );
    //     }
    // }


    // $mixedStr = "hello world. This is john duvey";
    // $searchStr= "john";

    // if(strpos($mixedStr,$searchStr)) {
    //   echo "Your string here";
    // }else {
    //   echo "String not here";
    // }

?>