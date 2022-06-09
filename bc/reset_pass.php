<?php
	include "db.php";
	
    $piss = md5($_POST['newpass']);	
	
  $wd = mysqli_query($koneksi,"update user set password = '$piss' where username = '$_POST[username]'");
    
    if(!$wd){
        ?>
        {
        "success":0,
        "message":"<?php echo mysqli_error($koneksi); ?>"
        }
        <?php
    }else{
?>
{
"success":1,
    "message":"Password succesfully changed"
}

<?php } ?>