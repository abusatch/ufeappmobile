
<?php
include('db.php');
$if = mysqli_query($koneksi,"select * from user where username = '$_POST[username2]'");
if(mysqli_num_rows($if) == 0){
    ?>
[{

    "success":0,
    "message": "L'e-mail n'existe pas dans la base de données"
}]
    <?php
}else {


    $wd = mysqli_query($koneksi,"select * from user where username = '$_POST[username2]'  and verifikasi  = 'belum'");
    $wd2 = mysqli_fetch_assoc($wd);
if(mysqli_num_rows($wd) == 0){
    ?>
[{
    "success" :0,
    "message" :"L'e-mail n'existe pas ou a été confirmé par l'administrateur"
}]
    <?php
}else{
    ?>

[{
    "success" :1,
    "message" :"keotp"
}]
<?php
}
    ?>

<?php
}


?>
