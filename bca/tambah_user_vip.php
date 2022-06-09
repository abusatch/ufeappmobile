<?php
	include "db.php";
	
	class usr{}
    
    

    // $kg = mysqli_query($koneksi,"select * from user where idUser = '$_POST[username]'");
    // $kg2 = mysqli_fetch_array($kg);

    // if($kg2['member_dari'] != ""){

    //     $kepada = $_POST['username'];
    // }else{
    //     $kepada = $_POST['username'];
    // }

	// $username = $_POST["username"];
	// $password = $_POST["password"];
	
	// if ((empty($username)) || (empty($password))) { 
	// 	$response = new usr();
	// 	$response->success = 0;
	// 	$response->message = "Kolom tidak boleh kosong"; 
	// 	die(json_encode($response));
    // }
    



    $pss = md5($_POST['pss']);

    $dibaca = "-".$_POST['username']."-";
 
    $query = mysqli_query($koneksi,"SELECT * FROM user where idUser = '$_POST[username]' and password = '$pss'  ");
    // $query2 = mysqli_query($koneksi,"select * from tb_notifikasi");
	


    $row = mysqli_fetch_array($query);
    $row2 = mysqli_num_rows($query);
	
	if ($row2 >= 1){

$email = $_POST['email'];
$nf = mysqli_query($koneksi,"select * from user where username = '$_POST[email]'");
$nf2 = mysqli_num_rows($nf);


function valid_email($email) {
    return !filter_var($email, FILTER_VALIDATE_EMAIL);
}


if(valid_email($email)){

?>
{
  "success": 0,
  "message": "E-mail invalide",
  "id": "<?php echo $row2 ?>",
  "username": "<?php echo $row2 ?>"
}


<?php
}else if($_POST['email'] == ""){
?>

{
  "success": 0,
  "message": "E-mails ne peuvent pas être vierges",
  "id": "<?php echo $row2 ?>",
  "username": "<?php echo $row2 ?>"
}
<?php
}else if($_POST['password1'] == ""){
?>

{
  "success": 0,
  "message": "Mot de passe ne doit pas être vide",
  "id": "<?php echo $row2 ?>",
  "username": "<?php echo $row2 ?>"
}



<?php
}else if($nf2 >= 1){
?>

{
  "success": 0,
  "message": "E-mail existe déjà, essayez un autre e-mail",
  "id": "<?php echo $row2 ?>",
  "username": "<?php echo $row2 ?>"
}
<?php
}else{

         
if($_POST['password1'] != $_POST['password2']){

?>

{
  "success": 0,
  "message": "Mot de passe n’est pas le même",
  "id": "<?php echo $row2 ?>",
  "username": "<?php echo $row2 ?>"
}

<?php 
}else{        

?>

<?php 
$pss2 = md5($_POST['password1']);








$dw = mysqli_query($koneksi,"insert into user (idUser,username,password,member_dari,level,verifikasi,verifikasi_admin,masa_aktif) values (null,'$_POST[email]','$pss2','$_POST[username]','vip-user','sudah','sudah','$row[masa_aktif]')");
?>
{

 "propic": "https://ufe-section-indonesie.org/ufeapp/images/propic/<?php echo $row['propic'] ?>",
  "success": 1,
  "message": "<?php echo mysqli_error($koneksi); ?> ini ya - <?php echo $_POST['email'].' - '.$_POST['username'] ?>"
 
}
	
<?php
} }

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
  "message": "<?php echo $_POST['username']." - ".$pss." - ".$row2 ?> <?php echo mysqli_error($koneksi); ?>",
  "id": "<?php echo $row2 ?>",
  "username": "<?php echo $row2 ?>"
}

<?php
    }
    $username = $_POST["username"];
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