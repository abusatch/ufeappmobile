<?php 

include('db.php');
$pss = md5($_POST['pss']);

$hj = mysqli_query($koneksi,"select * from user where username = '$_POST[username]' and password = '$pss'");
$hj2 = mysqli_num_rows($hj);
$hj3 = mysqli_fetch_array($hj);

if($hj2 == 0){
    ?>
    {
    "success" : 0
    }
    <?php
}else{
    ?>
    {
    "success":1,
    "email":"<?php echo $hj3['username'] ?>"
    
    
    <?php
}    

?>