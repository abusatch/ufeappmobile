<?php
	include "db.php";
	
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
	
	if ($row >= 1){

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
  "message": "E-mail ne peut pas être vide"
 
 }
 
 <?php
 
 
 }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ ?>
 {
   "success": 0,
  "message": "E-mail invalide"
 }
 
 
 <?php
    }else if($_POST['pss'] == ""){
      ?>
      {
             "success": 0,
  "message": "Le mot de passe ne peut pas être vide"
}
<?php
    }else if($_POST['pss'] != $_POST['pss2']){
?>
{
             "success": 0,
  "message": "Les mots de passe ne sont pas les mêmes"
}
<?php
    }else{
        
        $pass23 = md5($_POST['pss']);
        
        mysqli_query($koneksi,"insert into user (username,password,level,device_id) values ('$_POST[username]','$pass23','personal','$_POST[device_id]')");
        
        ?>
        
        {
         "success": 1,
  "message": "Inscription Réussie"
    
    }
    <?php
    }





?>


<?php
    }
    $username = $_POST["username"];

?>