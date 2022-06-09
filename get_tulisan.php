<?php
include('db.php');


if($_GET['idd'] == "oke" || $_GET['p'] == "splash_demar3" || $_GET['p'] == "splash_demar4"){
    echo "[";
}


if($_GET['p'] == "splash_login"){
    
    // $ki = mysqli_query($koneksi,"select * from user where username");
$fr = mysqli_query($koneksi,"select * from tb_tulisan where jenis = 'splash_login' limit 1");
$fr2 = mysqli_fetch_array($fr);

$tulisann1 = str_replace("&petiksatu&","'",$fr2['tulisan1']);
$tulisann2 = str_replace("&petiksatu&","'",$fr2['tulisan2']);
$tulisann3 = str_replace("&petiksatu&","'",$fr2['tulisan3']);
$tulisann4 = str_replace("&petiksatu&","'",$fr2['tulisan4']);
$tulisann5 = str_replace("&petiksatu&","'",$fr2['tulisan5']);
$tulisann6 = str_replace("&petiksatu&","'",$fr2['tulisan6']);
$tulisann7 = str_replace("&petiksatu&","'",$fr2['tulisan7']);
$tulisann8 = str_replace("&petiksatu&","'",$fr2['tulisan8']);
$tulisann9 = str_replace("&petiksatu&","'",$fr2['tulisan9']);
$tulisann10 = str_replace("&petiksatu&","'",$fr2['tulisan10']);
$tulisann11 = str_replace("&petiksatu&","'",$fr2['tulisan11']);
$tulisann12 = str_replace("&petiksatu&","'",$fr2['tulisan12']);
$tulisann13 = str_replace("&petiksatu&","'",$fr2['tulisan13']);
$tulisann14 = str_replace("&petiksatu&","'",$fr2['tulisan14']);
$tulisann15 = str_replace("&petiksatu&","'",$fr2['tulisan15']);
$tulisann16 = str_replace("&petiksatu&","'",$fr2['tulisan16']);
$tulisann17 = str_replace("&petiksatu&","'",$fr2['tulisan17']);
$tulisann18 = str_replace("&petiksatu&","'",$fr2['tulisan18']);
$tulisann19 = str_replace("&petiksatu&","'",$fr2['tulisan19']);
$tulisann20 = str_replace("&petiksatu&","'",$fr2['tulisan20']);
$tulisann21 = str_replace("&petiksatu&","'",$fr2['tulisan21']);
    ?>
    {
    "success":1,
    "tulisan1":"<?php echo $tulisann1 ?>",
    "tulisan2":"<?php echo $tulisann2 ?>",
    "tulisan3":"<?php echo $tulisann3 ?>",
    "tulisan4":"<?php echo $tulisann4 ?>",
    "tulisan5":"<?php echo $tulisann5 ?>",    
    "tulisan6":"<?php echo $tulisann6 ?>",
    "tulisan7":"<?php echo $tulisann7 ?>",
    "tulisan8":"<?php echo $tulisann8 ?>",
    "tulisan9":"<?php echo $tulisann9 ?>",
    "tulisan10":"<?php echo $tulisann10 ?>",
    "tulisan11":"<?php echo $tulisann11 ?>",
    "tulisan12":"<?php echo $tulisann12 ?>",
    "tulisan13":"<?php echo $tulisann13 ?>",
    "tulisan14":"<?php echo $tulisann14 ?>",
    "tulisan15":"<?php echo $tulisann15 ?>",
    "tulisan16":"<?php echo $tulisann16 ?>",
    "tulisan17":"<?php echo $tulisann17 ?>",
    "tulisan18":"<?php echo $tulisann18 ?>",
    "tulisan19":"<?php echo $tulisann19 ?>",
    "tulisan20":"<?php echo $tulisann20 ?>",
    "tulisan21":"<?php echo $tulisann21 ?>"   
    }
    <?php
}else if($_GET['p'] == "login"){

if($_GET['from'] == "flutter"){
    echo "[";
}
    
   $fr = mysqli_query($koneksi,"select * from tb_tulisan where jenis = 'login' limit 1");
$fr2 = mysqli_fetch_array($fr); 

$tulisann1 = str_replace("&petiksatu&","'",$fr2['tulisan1']);
$tulisann2 = str_replace("&petiksatu&","'",$fr2['tulisan2']);
$tulisann3 = str_replace("&petiksatu&","'",$fr2['tulisan3']);
$tulisann4 = str_replace("&petiksatu&","'",$fr2['tulisan4']);
$tulisann5 = str_replace("&petiksatu&","'",$fr2['tulisan5']);
$tulisann6 = str_replace("&petiksatu&","'",$fr2['tulisan6']);
$tulisann7 = str_replace("&petiksatu&","'",$fr2['tulisan7']);
$tulisann8 = str_replace("&petiksatu&","'",$fr2['tulisan8']);
$tulisann9 = str_replace("&petiksatu&","'",$fr2['tulisan9']);
$tulisann10 = str_replace("&petiksatu&","'",$fr2['tulisan10']);
$tulisann11 = str_replace("&petiksatu&","'",$fr2['tulisan11']);
$tulisann12 = str_replace("&petiksatu&","'",$fr2['tulisan12']);
$tulisann13 = str_replace("&petiksatu&","'",$fr2['tulisan13']);
$tulisann14 = str_replace("&petiksatu&","'",$fr2['tulisan14']);
$tulisann15 = str_replace("&petiksatu&","'",$fr2['tulisan15']);
$tulisann16 = str_replace("&petiksatu&","'",$fr2['tulisan16']);
$tulisann17 = str_replace("&petiksatu&","'",$fr2['tulisan17']);
$tulisann18 = str_replace("&petiksatu&","'",$fr2['tulisan18']);
$tulisann19 = str_replace("&petiksatu&","'",$fr2['tulisan19']);
$tulisann20 = str_replace("&petiksatu&","'",$fr2['tulisan20']);
$tulisann21 = str_replace("&petiksatu&","'",$fr2['tulisan21']);

?>

{
    "success":1,
"tulisan1":"<?php echo $tulisann1 ?>",
    "tulisan2":"<?php echo $tulisann2 ?>",
    "tulisan3":"<?php echo $tulisann3 ?>",
    "tulisan4":"<?php echo $tulisann4 ?>",
    "tulisan5":"<?php echo $tulisann5 ?>",    
    "tulisan6":"<?php echo $tulisann6 ?>",
    "tulisan7":"<?php echo $tulisann7 ?>",
    "tulisan8":"<?php echo $tulisann8 ?>",
    "tulisan9":"<?php echo $tulisann9 ?>",
    "tulisan10":"<?php echo $tulisann10 ?>",
    "tulisan11":"<?php echo $tulisann11 ?>",
    "tulisan12":"<?php echo $tulisann12 ?>",
    "tulisan13":"<?php echo $tulisann13 ?>",
    "tulisan14":"<?php echo $tulisann14 ?>",
    "tulisan15":"<?php echo $tulisann15 ?>",
    "tulisan16":"<?php echo $tulisann16 ?>",
    "tulisan17":"<?php echo $tulisann17 ?>",
    "tulisan18":"<?php echo $tulisann18 ?>",
    "tulisan19":"<?php echo $tulisann19 ?>",
    "tulisan20":"<?php echo $tulisann20 ?>",
    "tulisan21":"<?php echo $tulisann21 ?>"    
    }
    <?php
    
    if($_GET['from'] == "flutter"){
    echo "]";
}
}else if($_GET['p'] == "regis"){
    
   $fr = mysqli_query($koneksi,"select * from tb_tulisan where jenis = 'regis' limit 1");
$fr2 = mysqli_fetch_array($fr); 

$tulisann1 = str_replace("&petiksatu&","'",$fr2['tulisan1']);
$tulisann2 = str_replace("&petiksatu&","'",$fr2['tulisan2']);
$tulisann3 = str_replace("&petiksatu&","'",$fr2['tulisan3']);
$tulisann4 = str_replace("&petiksatu&","'",$fr2['tulisan4']);
$tulisann5 = str_replace("&petiksatu&","'",$fr2['tulisan5']);
$tulisann6 = str_replace("&petiksatu&","'",$fr2['tulisan6']);
$tulisann7 = str_replace("&petiksatu&","'",$fr2['tulisan7']);
$tulisann8 = str_replace("&petiksatu&","'",$fr2['tulisan8']);
$tulisann9 = str_replace("&petiksatu&","'",$fr2['tulisan9']);
$tulisann10 = str_replace("&petiksatu&","'",$fr2['tulisan10']);
$tulisann11 = str_replace("&petiksatu&","'",$fr2['tulisan11']);
$tulisann12 = str_replace("&petiksatu&","'",$fr2['tulisan12']);
$tulisann13 = str_replace("&petiksatu&","'",$fr2['tulisan13']);
$tulisann14 = str_replace("&petiksatu&","'",$fr2['tulisan14']);
$tulisann15 = str_replace("&petiksatu&","'",$fr2['tulisan15']);
$tulisann16 = str_replace("&petiksatu&","'",$fr2['tulisan16']);
$tulisann17 = str_replace("&petiksatu&","'",$fr2['tulisan17']);
$tulisann18 = str_replace("&petiksatu&","'",$fr2['tulisan18']);
$tulisann19 = str_replace("&petiksatu&","'",$fr2['tulisan19']);
$tulisann20 = str_replace("&petiksatu&","'",$fr2['tulisan20']);
$tulisann21 = str_replace("&petiksatu&","'",$fr2['tulisan21']);
$tulisann22 = str_replace("&petiksatu&","'",$fr2['tulisan22']);
$tulisann23 = str_replace("&petiksatu&","'",$fr2['tulisan23']);



$tt11 = preg_replace("/[\n\r]/"," ", $tulisann11);

if($_GET['from'] == "flutter"){
    echo "[";
}
?>

{
    "success":1,
    "tulisan1":"<?php echo str_replace("*","*",$tulisann1); ?>",
    "tulisan2":"<?php echo str_replace("*","*",$tulisann2); ?>",
    "tulisan3":"<?php echo str_replace("*","*",$tulisann3); ?>",
    "tulisan4":"<?php echo str_replace("*","*",$tulisann4); ?>",
    "tulisan5":"<?php echo str_replace("*","*",$tulisann5); ?>",    
    "tulisan6":"<?php echo str_replace("*","*",$tulisann6); ?>",
    "tulisan7":"<?php echo str_replace("*","*",$tulisann7); ?>",
    "tulisan8":"<?php echo str_replace("*","*",$tulisann8); ?>",
    "tulisan9":"<?php echo str_replace("*","*",$tulisann9); ?>",
    "tulisan10":"<?php echo str_replace("*","*",$tulisann10); ?>",
    "tulisan11":"<?php echo str_replace("*","*",$tt11); ?>",
    "tulisan12":"<?php echo str_replace("*","*",$tulisann12); ?>",
    "tulisan13":"<?php echo str_replace("*","*",$tulisann13); ?>",
    "tulisan14":"<?php echo str_replace("*","*",$tulisann14); ?>",
    "tulisan15":"<?php echo str_replace("*","*",$tulisann15); ?>",
    "tulisan16":"<?php echo str_replace("*","*",$tulisann16); ?>",
    "tulisan17":"<?php echo str_replace("*","*",$tulisann17); ?>",
    "tulisan18":"<?php echo str_replace("*","*",$tulisann18); ?>",
    "tulisan19":"<?php echo str_replace("*","*",$tulisann19); ?>",
    "tulisan20":"<?php echo str_replace("*","*",$tulisann20); ?>",
    "tulisan21":"<?php echo str_replace("*","*",$tulisann21); ?>",
    "tulisan22":"<?php echo str_replace("*","*",$tulisann22); ?>",    
    "tulisan23":"<?php echo str_replace("*","*",$tulisann23); ?>"    
    }
 <?php
 if($_GET['from'] == "flutter"){
    echo "]";
}
}else if($_GET['p'] == "profile_fragment"){
    
   $fr = mysqli_query($koneksi,"select * from tb_tulisan where jenis = 'profile_fragment' limit 1");
$fr2 = mysqli_fetch_array($fr); 

$tulisann1 = str_replace("&petiksatu&","'",$fr2['tulisan1']);
$tulisann2 = str_replace("&petiksatu&","'",$fr2['tulisan2']);
$tulisann3 = str_replace("&petiksatu&","'",$fr2['tulisan3']);
$tulisann4 = str_replace("&petiksatu&","'",$fr2['tulisan4']);
$tulisann5 = str_replace("&petiksatu&","'",$fr2['tulisan5']);
$tulisann6 = str_replace("&petiksatu&","'",$fr2['tulisan6']);
$tulisann7 = str_replace("&petiksatu&","'",$fr2['tulisan7']);
$tulisann8 = str_replace("&petiksatu&","'",$fr2['tulisan8']);
$tulisann9 = str_replace("&petiksatu&","'",$fr2['tulisan9']);
$tulisann10 = str_replace("&petiksatu&","'",$fr2['tulisan10']);
$tulisann11 = str_replace("&petiksatu&","'",$fr2['tulisan11']);
$tulisann12 = str_replace("&petiksatu&","'",$fr2['tulisan12']);
$tulisann13 = str_replace("&petiksatu&","'",$fr2['tulisan13']);
$tulisann14 = str_replace("&petiksatu&","'",$fr2['tulisan14']);
$tulisann15 = str_replace("&petiksatu&","'",$fr2['tulisan15']);
$tulisann16 = str_replace("&petiksatu&","'",$fr2['tulisan16']);
$tulisann17 = str_replace("&petiksatu&","'",$fr2['tulisan17']);
$tulisann18 = str_replace("&petiksatu&","'",$fr2['tulisan18']);
$tulisann19 = str_replace("&petiksatu&","'",$fr2['tulisan19']);
$tulisann20 = str_replace("&petiksatu&","'",$fr2['tulisan20']);
$tulisann21 = str_replace("&petiksatu&","'",$fr2['tulisan21']);

?>

{
    "success":1,
"tulisan1":"<?php echo $tulisann1 ?>",
    "tulisan2":"<?php echo $tulisann2 ?>",
    "tulisan3":"<?php echo $tulisann3 ?>",
    "tulisan4":"<?php echo $tulisann4 ?>",
    "tulisan5":"<?php echo $tulisann5 ?>",    
    "tulisan6":"<?php echo $tulisann6 ?>",
    "tulisan7":"<?php echo $tulisann7 ?>",
    "tulisan8":"<?php echo $tulisann8 ?>",
    "tulisan9":"<?php echo $tulisann9 ?>",
    "tulisan10":"<?php echo $tulisann10 ?>",
    "tulisan11":"<?php echo $tulisann11 ?>",
    "tulisan12":"<?php echo $tulisann12 ?>",
    "tulisan13":"<?php echo $tulisann13 ?>",
    "tulisan14":"<?php echo $tulisann14 ?>",
    "tulisan15":"<?php echo $tulisann15 ?>",
    "tulisan16":"<?php echo $tulisann16 ?>",
    "tulisan17":"<?php echo $tulisann17 ?>",
    "tulisan18":"<?php echo $tulisann18 ?>",
    "tulisan19":"<?php echo $tulisann19 ?>",
    "tulisan20":"<?php echo $tulisann20 ?>",
    "tulisan21":"<?php echo $tulisann21 ?>"    
    }
    <?php
}else if($_GET['p'] == "company_profile"){
    
   $fr = mysqli_query($koneksi,"select * from tb_tulisan where jenis = 'company_profile' limit 1");
$fr2 = mysqli_fetch_array($fr); 

$tulisann1 = str_replace("&petiksatu&","'",$fr2['tulisan1']);
$tulisann2 = str_replace("&petiksatu&","'",$fr2['tulisan2']);
$tulisann3 = str_replace("&petiksatu&","'",$fr2['tulisan3']);
$tulisann4 = str_replace("&petiksatu&","'",$fr2['tulisan4']);
$tulisann5 = str_replace("&petiksatu&","'",$fr2['tulisan5']);
$tulisann6 = str_replace("&petiksatu&","'",$fr2['tulisan6']);
$tulisann7 = str_replace("&petiksatu&","'",$fr2['tulisan7']);
$tulisann8 = str_replace("&petiksatu&","'",$fr2['tulisan8']);
$tulisann9 = str_replace("&petiksatu&","'",$fr2['tulisan9']);
$tulisann10 = str_replace("&petiksatu&","'",$fr2['tulisan10']);
$tulisann11 = str_replace("&petiksatu&","'",$fr2['tulisan11']);
$tulisann12 = str_replace("&petiksatu&","'",$fr2['tulisan12']);
$tulisann13 = str_replace("&petiksatu&","'",$fr2['tulisan13']);
$tulisann14 = str_replace("&petiksatu&","'",$fr2['tulisan14']);
$tulisann15 = str_replace("&petiksatu&","'",$fr2['tulisan15']);
$tulisann16 = str_replace("&petiksatu&","'",$fr2['tulisan16']);
$tulisann17 = str_replace("&petiksatu&","'",$fr2['tulisan17']);
$tulisann18 = str_replace("&petiksatu&","'",$fr2['tulisan18']);
$tulisann19 = str_replace("&petiksatu&","'",$fr2['tulisan19']);
$tulisann20 = str_replace("&petiksatu&","'",$fr2['tulisan20']);
$tulisann21 = str_replace("&petiksatu&","'",$fr2['tulisan21']);
?>

{
    "success":1,
    "tulisan1":"<?php echo $tulisann1 ?>",
    "tulisan2":"<?php echo $tulisann2 ?>",
    "tulisan3":"<?php echo $tulisann3 ?>",
    "tulisan4":"<?php echo $tulisann4 ?>",
    "tulisan5":"<?php echo $tulisann5 ?>",    
    "tulisan6":"<?php echo $tulisann6 ?>",
    "tulisan7":"<?php echo $tulisann7 ?>",
    "tulisan8":"<?php echo $tulisann8 ?>",
    "tulisan9":"<?php echo $tulisann9 ?>",
    "tulisan10":"<?php echo $tulisann10 ?>",
    "tulisan11":"<?php echo $tulisann11 ?>",
    "tulisan12":"<?php echo $tulisann12 ?>",
    "tulisan13":"<?php echo $tulisann13 ?>",
    "tulisan14":"<?php echo $tulisann14 ?>",
    "tulisan15":"<?php echo $tulisann15 ?>",
    "tulisan16":"<?php echo $tulisann16 ?>",
    "tulisan17":"<?php echo $tulisann17 ?>",
    "tulisan18":"<?php echo $tulisann18 ?>",
    "tulisan19":"<?php echo $tulisann19 ?>",
    "tulisan20":"<?php echo $tulisann20 ?>",
    "tulisan21":"<?php echo $tulisann21 ?>"    
    }
     <?php
}else if($_GET['p'] == "list_user"){
    
   $fr = mysqli_query($koneksi,"select * from tb_tulisan where jenis = 'list_user' limit 1");
$fr2 = mysqli_fetch_array($fr); 

$tulisann1 = str_replace("&petiksatu&","'",$fr2['tulisan1']);
$tulisann2 = str_replace("&petiksatu&","'",$fr2['tulisan2']);
$tulisann3 = str_replace("&petiksatu&","'",$fr2['tulisan3']);
$tulisann4 = str_replace("&petiksatu&","'",$fr2['tulisan4']);
$tulisann5 = str_replace("&petiksatu&","'",$fr2['tulisan5']);
$tulisann6 = str_replace("&petiksatu&","'",$fr2['tulisan6']);
$tulisann7 = str_replace("&petiksatu&","'",$fr2['tulisan7']);
$tulisann8 = str_replace("&petiksatu&","'",$fr2['tulisan8']);
$tulisann9 = str_replace("&petiksatu&","'",$fr2['tulisan9']);
$tulisann10 = str_replace("&petiksatu&","'",$fr2['tulisan10']);
$tulisann11 = str_replace("&petiksatu&","'",$fr2['tulisan11']);
$tulisann12 = str_replace("&petiksatu&","'",$fr2['tulisan12']);
$tulisann13 = str_replace("&petiksatu&","'",$fr2['tulisan13']);
$tulisann14 = str_replace("&petiksatu&","'",$fr2['tulisan14']);
$tulisann15 = str_replace("&petiksatu&","'",$fr2['tulisan15']);
$tulisann16 = str_replace("&petiksatu&","'",$fr2['tulisan16']);
$tulisann17 = str_replace("&petiksatu&","'",$fr2['tulisan17']);
$tulisann18 = str_replace("&petiksatu&","'",$fr2['tulisan18']);
$tulisann19 = str_replace("&petiksatu&","'",$fr2['tulisan19']);
$tulisann20 = str_replace("&petiksatu&","'",$fr2['tulisan20']);
$tulisann21 = str_replace("&petiksatu&","'",$fr2['tulisan21']);
?>

{
    "success":1,
"tulisan1":"<?php echo $tulisann1 ?>",
    "tulisan2":"<?php echo $tulisann2 ?>",
    "tulisan3":"<?php echo $tulisann3 ?>",
    "tulisan4":"<?php echo $tulisann4 ?>",
    "tulisan5":"<?php echo $tulisann5 ?>",    
    "tulisan6":"<?php echo $tulisann6 ?>",
    "tulisan7":"<?php echo $tulisann7 ?>",
    "tulisan8":"<?php echo $tulisann8 ?>",
    "tulisan9":"<?php echo $tulisann9 ?>",
    "tulisan10":"<?php echo $tulisann10 ?>",
    "tulisan11":"<?php echo $tulisann11 ?>",
    "tulisan12":"<?php echo $tulisann12 ?>",
    "tulisan13":"<?php echo $tulisann13 ?>",
    "tulisan14":"<?php echo $tulisann14 ?>",
    "tulisan15":"<?php echo $tulisann15 ?>",
    "tulisan16":"<?php echo $tulisann16 ?>",
    "tulisan17":"<?php echo $tulisann17 ?>",
    "tulisan18":"<?php echo $tulisann18 ?>",
    "tulisan19":"<?php echo $tulisann19 ?>",
    "tulisan20":"<?php echo $tulisann20 ?>",
    "tulisan21":"<?php echo $tulisann21 ?>"    
    }
    
     <?php
}else if($_GET['p'] == "splash_ufe"){
    
   $fr = mysqli_query($koneksi,"select * from tb_tulisan where jenis = 'splash_ufe' limit 1");
$fr2 = mysqli_fetch_array($fr); 

$tulisann1 = str_replace("&petiksatu&","'",$fr2['tulisan1']);
$tulisann2 = str_replace("&petiksatu&","'",$fr2['tulisan2']);
$tulisann3 = str_replace("&petiksatu&","'",$fr2['tulisan3']);
$tulisann4 = str_replace("&petiksatu&","'",$fr2['tulisan4']);
$tulisann5 = str_replace("&petiksatu&","'",$fr2['tulisan5']);
$tulisann6 = str_replace("&petiksatu&","'",$fr2['tulisan6']);
$tulisann7 = str_replace("&petiksatu&","'",$fr2['tulisan7']);
$tulisann8 = str_replace("&petiksatu&","'",$fr2['tulisan8']);
$tulisann9 = str_replace("&petiksatu&","'",$fr2['tulisan9']);
$tulisann10 = str_replace("&petiksatu&","'",$fr2['tulisan10']);
$tulisann11 = str_replace("&petiksatu&","'",$fr2['tulisan11']);
$tulisann12 = str_replace("&petiksatu&","'",$fr2['tulisan12']);
$tulisann13 = str_replace("&petiksatu&","'",$fr2['tulisan13']);
$tulisann14 = str_replace("&petiksatu&","'",$fr2['tulisan14']);
$tulisann15 = str_replace("&petiksatu&","'",$fr2['tulisan15']);
$tulisann16 = str_replace("&petiksatu&","'",$fr2['tulisan16']);
$tulisann17 = str_replace("&petiksatu&","'",$fr2['tulisan17']);
$tulisann18 = str_replace("&petiksatu&","'",$fr2['tulisan18']);
$tulisann19 = str_replace("&petiksatu&","'",$fr2['tulisan19']);
$tulisann20 = str_replace("&petiksatu&","'",$fr2['tulisan20']);
$tulisann21 = str_replace("&petiksatu&","'",$fr2['tulisan21']);
?>

{
    "success":1,
"tulisan1":"<?php echo $tulisann1 ?>",
    "tulisan2":"<?php echo $tulisann2 ?>",
    "tulisan3":"<?php echo $tulisann3 ?>",
    "tulisan4":"<?php echo $tulisann4 ?>",
    "tulisan5":"<?php echo $tulisann5 ?>",    
    "tulisan6":"<?php echo $tulisann6 ?>",
    "tulisan7":"<?php echo $tulisann7 ?>",
    "tulisan8":"<?php echo $tulisann8 ?>",
    "tulisan9":"<?php echo $tulisann9 ?>",
    "tulisan10":"<?php echo $tulisann10 ?>",
    "tulisan11":"<?php echo $tulisann11 ?>",
    "tulisan12":"<?php echo $tulisann12 ?>",
    "tulisan13":"<?php echo $tulisann13 ?>",
    "tulisan14":"<?php echo $tulisann14 ?>",
    "tulisan15":"<?php echo $tulisann15 ?>",
    "tulisan16":"<?php echo $tulisann16 ?>",
    "tulisan17":"<?php echo $tulisann17 ?>",
    "tulisan18":"<?php echo $tulisann18 ?>",
    "tulisan19":"<?php echo $tulisann19 ?>",
    "tulisan20":"<?php echo $tulisann20 ?>",
    "tulisan21":"<?php echo $tulisann21 ?>"    
    }
      <?php
}else if($_GET['p'] == "splash_indo"){
    
   $fr = mysqli_query($koneksi,"select * from tb_tulisan where jenis = 'splash_indo' limit 1");
$fr2 = mysqli_fetch_array($fr); 


$desk1 = str_replace('\n',"",$fr2['tulisan1']);
$desk2 = str_replace("'","`",$desk1);
$desk3 = str_replace('"',"`",$desk2);
$desk4 = str_replace(str_split('\\/:*?"<>|'), ' ', $desk3);
$desk5 = trim(preg_replace('/\s\s+/', ' ', $desk4));
$desk6 = str_replace("<br>","",$desk5);
$tulisann1 = str_replace(".","",$desk6);

$deskk1 = str_replace('\n',"",$fr2['tulisan2']);
$deskk2 = str_replace("'","`",$deskk1);
$deskk3 = str_replace('"',"`",$deskk2);
$deskk4 = str_replace(str_split('\\/:*?"<>|'), ' ', $deskk3);
$deskk5 = trim(preg_replace('/\s\s+/', ' ', $deskk4));
$deskk6 = str_replace("<br>","",$deskk5);
$tulisann2 = str_replace(".","",$deskk6);



$tulisan3 = str_replace("&petiksatu&","`",$fr2['tulisan3']);
$tulisan4 = str_replace("&petiksatu&","`",$fr2['tulisan4']);
$tulisan5 = str_replace("&petiksatu&","`",$fr2['tulisan5']);
$tulisan6 = str_replace("&petiksatu&","`",$fr2['tulisan6']);
$tulisan7 = str_replace("&petiksatu&","`",$fr2['tulisan7']);
$tulisan8 = str_replace("&petiksatu&","`",$fr2['tulisan8']);
$tulisan9 = str_replace("&petiksatu&","`",$fr2['tulisan9']);
$tulisan10 = str_replace("&petiksatu&","`",$fr2['tulisan10']);
$tulisan11 = str_replace("&petiksatu&","`",$fr2['tulisan11']);
$tulisan12 = str_replace("&petiksatu&","`",$fr2['tulisan12']);
$tulisan13 = str_replace("&petiksatu&","`",$fr2['tulisan13']);
$tulisan14 = str_replace("&petiksatu&","`",$fr2['tulisan14']);
$tulisan15 = str_replace("&petiksatu&","`",$fr2['tulisan15']);
$tulisan16 = str_replace("&petiksatu&","`",$fr2['tulisan16']);
$tulisan17 = str_replace("&petiksatu&","`",$fr2['tulisan17']);
$tulisan18 = str_replace("&petiksatu&","`",$fr2['tulisan18']);
$tulisan19 = str_replace("&petiksatu&","`",$fr2['tulisan19']);
$tulisan20 = str_replace("&petiksatu&","`",$fr2['tulisan20']);
$tulisan21 = str_replace("&petiksatu&","`",$fr2['tulisan21']);



$tulisann3 = str_replace("'","`",$tulisan3);
$tulisann4 = str_replace("'","`",$tulisan4);
$tulisann5 = str_replace("'","`",$tulisan5);
$tulisann6 = str_replace("'","`",$tulisan6);
$tulisann7 = str_replace("'","`",$tulisan7);
$tulisann8 = str_replace("'","`",$tulisan8);
$tulisann9 = str_replace("'","`",$tulisan9);
$tulisann10 = str_replace("'","`",$tulisan10);
$tulisann11 = str_replace("'","`",$tulisan11);
$tulisann12 = str_replace("'","`",$tulisan12);
$tulisann13 = str_replace("'","`",$tulisan13);
$tulisann14 = str_replace("'","`",$tulisan14);
$tulisann15 = str_replace("'","`",$tulisan15);
$tulisann16 = str_replace("'","`",$tulisan16);
$tulisann17 = str_replace("'","`",$tulisan17);
$tulisann18 = str_replace("'","`",$tulisan18);
$tulisann19 = str_replace("'","`",$tulisan19);
$tulisann20 = str_replace("'","`",$tulisan20);
$tulisann21 = str_replace("'","`",$tulisan21);
?>

{
    "success":1,
    "tulisan1":"<?php echo $tulisann1 ?>",
    "tulisan2":"<?php echo $tulisann2 ?>",
    "tulisan3":"<?php echo $tulisann3 ?>",
    "tulisan4":"<?php echo $tulisann4 ?>",
    "tulisan5":"<?php echo $tulisann5 ?>",    
    "tulisan6":"<?php echo $tulisann6 ?>",
    "tulisan7":"<?php echo $tulisann7 ?>",
    "tulisan8":"<?php echo $tulisann8 ?>",
    "tulisan9":"<?php echo $tulisann9 ?>",
    "tulisan10":"<?php echo $tulisann10 ?>",
    "tulisan11":"<?php echo $tulisann11 ?>",
    "tulisan12":"<?php echo $tulisann12 ?>",
    "tulisan13":"<?php echo $tulisann13 ?>",
    "tulisan14":"<?php echo $tulisann14 ?>",
    "tulisan15":"<?php echo $tulisann15 ?>",
    "tulisan16":"<?php echo $tulisann16 ?>",
    "tulisan17":"<?php echo $tulisann17 ?>",
    "tulisan18":"<?php echo $tulisann18 ?>",
    "tulisan19":"<?php echo $tulisann19 ?>",
    "tulisan20":"<?php echo $tulisann20 ?>",
    "tulisan21":"<?php echo $tulisann21 ?>"   
    }
    
    <?php
}else if($_GET['p'] == "splash_demar3"){
    
   $fr = mysqli_query($koneksi,"select * from tb_background where keterangan = 'demar' limit 1");
$fr2 = mysqli_fetch_array($fr); 


$wd = mysqli_query($koneksi,"select * from tb_menu where id_menu = '$_POST[id_menu]'");
$wd2 = mysqli_fetch_array($wd);
$wd3 = mysqli_query($koneksi,"select * from tb_background where keterangan = 'splash_demar'");
$wd4 = mysqli_fetch_array($wd3);


$tulisann1 = str_replace("&petiksatu&","'",$fr2['tulisan1']);
$tulisann2 = str_replace("&petiksatu&","'",$fr2['tulisan2']);
$tulisann3 = str_replace("&petiksatu&","'",$fr2['tulisan3']);
$tulisann4 = str_replace("&petiksatu&","'",$fr2['tulisan4']);
$tulisann5 = str_replace("&petiksatu&","'",$fr2['tulisan5']);
$tulisann6 = str_replace("&petiksatu&","'",$fr2['tulisan6']);
$tulisann7 = str_replace("&petiksatu&","'",$fr2['tulisan7']);
$tulisann8 = str_replace("&petiksatu&","'",$fr2['tulisan8']);
$tulisann9 = str_replace("&petiksatu&","'",$fr2['tulisan9']);
$tulisann10 = str_replace("&petiksatu&","'",$fr2['tulisan10']);
$tulisann11 = str_replace("&petiksatu&","'",$fr2['tulisan11']);
$tulisann12 = str_replace("&petiksatu&","'",$fr2['tulisan12']);
$tulisann13 = str_replace("&petiksatu&","'",$fr2['tulisan13']);
$tulisann14 = str_replace("&petiksatu&","'",$fr2['tulisan14']);
$tulisann15 = str_replace("&petiksatu&","'",$fr2['tulisan15']);
$tulisann16 = str_replace("&petiksatu&","'",$fr2['tulisan16']);
$tulisann17 = str_replace("&petiksatu&","'",$fr2['tulisan17']);
$tulisann18 = str_replace("&petiksatu&","'",$fr2['tulisan18']);
$tulisann19 = str_replace("&petiksatu&","'",$fr2['tulisan19']);
$tulisann20 = str_replace("&petiksatu&","'",$fr2['tulisan20']);
$tulisann21 = str_replace("&petiksatu&","'",$fr2['tulisan21']);
?>

{
    "success":1,
 "tulisan1":"",
    "tulisan2":"",
    "tulisan3":"<?php echo $tulisann3 ?>",
    "tulisan4":"<?php echo $tulisann4 ?>",
    "tulisan5":"<?php echo $tulisann5 ?>",    
    "tulisan6":"<?php echo $tulisann6 ?>",
    "tulisan7":"<?php echo $tulisann7 ?>",
    "tulisan8":"<?php echo $tulisann8 ?>",
    "tulisan9":"<?php echo $tulisann9 ?>",
    "tulisan10":"<?php echo $tulisann10 ?>",
    "tulisan11":"<?php echo $tulisann11 ?>",
    "tulisan12":"<?php echo $tulisann12 ?>",
    "tulisan13":"<?php echo $tulisann13 ?>",
    "tulisan14":"<?php echo $tulisann14 ?>",
    "tulisan15":"<?php echo $tulisann15 ?>",
    "tulisan16":"<?php echo $tulisann16 ?>",
    "tulisan17":"<?php echo $tulisann17 ?>",
    "tulisan18":"<?php echo $tulisann18 ?>",
    "tulisan19":"",
    "tulisan20":"",
    "tulisan21":"",
    "bg":"https://ufe-section-indonesie.org/ufeapp/admin/bg/<?php echo $fr2['gambar'] ?>",
     "bg2":"https://ufe-section-indonesie.org/ufeapp/admin/bg/<?php echo $wd4['gambar'] ?>"    
    }
    <?php
}else if($_GET['p'] == "splash_demar4"){
    
   $fr = mysqli_query($koneksi,"select * from tb_tulisan where jenis = 'splash_demar' limit 1");
$fr2 = mysqli_fetch_array($fr); 


$wd = mysqli_query($koneksi,"select * from tb_menu where id_menu = '$_GET[idd]'");
$wd2 = mysqli_fetch_array($wd);
$wd3 = mysqli_query($koneksi,"select * from tb_background where keterangan = 'splash_demar'");
$wd4 = mysqli_fetch_array($wd3);


$tulisann1 = str_replace("&petiksatu&","'",$fr2['tulisan1']);
$tulisann2 = str_replace("&petiksatu&","'",$fr2['tulisan2']);
$tulisann3 = str_replace("&petiksatu&","'",$fr2['tulisan3']);
$tulisann4 = str_replace("&petiksatu&","'",$fr2['tulisan4']);
$tulisann5 = str_replace("&petiksatu&","'",$fr2['tulisan5']);
$tulisann6 = str_replace("&petiksatu&","'",$fr2['tulisan6']);
$tulisann7 = str_replace("&petiksatu&","'",$fr2['tulisan7']);
$tulisann8 = str_replace("&petiksatu&","'",$fr2['tulisan8']);
$tulisann9 = str_replace("&petiksatu&","'",$fr2['tulisan9']);
$tulisann10 = str_replace("&petiksatu&","'",$fr2['tulisan10']);
$tulisann11 = str_replace("&petiksatu&","'",$fr2['tulisan11']);
$tulisann12 = str_replace("&petiksatu&","'",$fr2['tulisan12']);
$tulisann13 = str_replace("&petiksatu&","'",$fr2['tulisan13']);
$tulisann14 = str_replace("&petiksatu&","'",$fr2['tulisan14']);
$tulisann15 = str_replace("&petiksatu&","'",$fr2['tulisan15']);
$tulisann16 = str_replace("&petiksatu&","'",$fr2['tulisan16']);
$tulisann17 = str_replace("&petiksatu&","'",$fr2['tulisan17']);
$tulisann18 = str_replace("&petiksatu&","'",$fr2['tulisan18']);
$tulisann19 = str_replace("&petiksatu&","'",$fr2['tulisan19']);
$tulisann20 = str_replace("&petiksatu&","'",$fr2['tulisan20']);
$tulisann21 = str_replace("&petiksatu&","'",$fr2['tulisan21']);
?>

{
    "success":1,
 "tulisan1":"",
    "tulisan2":"",
    "tulisan3":"<?php echo $tulisann3 ?>",
    "tulisan4":"<?php echo $tulisann4 ?>",
    "tulisan5":"<?php echo $tulisann5 ?>",    
    "tulisan6":"<?php echo $tulisann6 ?>",
    "tulisan7":"<?php echo $tulisann7 ?>",
    "tulisan8":"<?php echo $tulisann8 ?>",
    "tulisan9":"<?php echo $tulisann9 ?>",
    "tulisan10":"<?php echo $tulisann10 ?>",
    "tulisan11":"<?php echo $tulisann11 ?>",
    "tulisan12":"<?php echo $tulisann12 ?>",
    "tulisan13":"<?php echo $tulisann13 ?>",
    "tulisan14":"<?php echo $tulisann14 ?>",
    "tulisan15":"<?php echo $tulisann15 ?>",
    "tulisan16":"<?php echo $tulisann16 ?>",
    "tulisan17":"<?php echo $tulisann17 ?>",
    "tulisan18":"<?php echo $tulisann18 ?>",
    "tulisan19":"",
    "tulisan20":"",
    "tulisan21":"",
    "bg":"https://ufe-section-indonesie.org/ufeapp/admin/bg/<?php echo $wd2['bg'] ?>",
     "bg2":"https://ufe-section-indonesie.org/ufeapp/admin/bg/<?php echo $wd4['gambar'] ?>"    
    }
      
      <?php
}else if($_GET['p'] == "splash_demar2"){
    
   $fr = mysqli_query($koneksi,"select * from tb_tulisan where jenis = 'splash_demar' limit 1");
$fr2 = mysqli_fetch_array($fr); 


$wd = mysqli_query($koneksi,"select * from tb_menu where id_menu = '$_POST[id_menu]'");
$wd2 = mysqli_fetch_array($wd);
$wd3 = mysqli_query($koneksi,"select * from tb_background where keterangan = 'splash_demar'");
$wd4 = mysqli_fetch_array($wd3);


$tulisann1 = str_replace("&petiksatu&","'",$fr2['tulisan1']);
$tulisann2 = str_replace("&petiksatu&","'",$fr2['tulisan2']);
$tulisann3 = str_replace("&petiksatu&","'",$fr2['tulisan3']);
$tulisann4 = str_replace("&petiksatu&","'",$fr2['tulisan4']);
$tulisann5 = str_replace("&petiksatu&","'",$fr2['tulisan5']);
$tulisann6 = str_replace("&petiksatu&","'",$fr2['tulisan6']);
$tulisann7 = str_replace("&petiksatu&","'",$fr2['tulisan7']);
$tulisann8 = str_replace("&petiksatu&","'",$fr2['tulisan8']);
$tulisann9 = str_replace("&petiksatu&","'",$fr2['tulisan9']);
$tulisann10 = str_replace("&petiksatu&","'",$fr2['tulisan10']);
$tulisann11 = str_replace("&petiksatu&","'",$fr2['tulisan11']);
$tulisann12 = str_replace("&petiksatu&","'",$fr2['tulisan12']);
$tulisann13 = str_replace("&petiksatu&","'",$fr2['tulisan13']);
$tulisann14 = str_replace("&petiksatu&","'",$fr2['tulisan14']);
$tulisann15 = str_replace("&petiksatu&","'",$fr2['tulisan15']);
$tulisann16 = str_replace("&petiksatu&","'",$fr2['tulisan16']);
$tulisann17 = str_replace("&petiksatu&","'",$fr2['tulisan17']);
$tulisann18 = str_replace("&petiksatu&","'",$fr2['tulisan18']);
$tulisann19 = str_replace("&petiksatu&","'",$fr2['tulisan19']);
$tulisann20 = str_replace("&petiksatu&","'",$fr2['tulisan20']);
$tulisann21 = str_replace("&petiksatu&","'",$fr2['tulisan21']);
?>

{
    "success":1,
 "tulisan1":"",
    "tulisan2":"",
    "tulisan3":"<?php echo $tulisann3 ?>",
    "tulisan4":"<?php echo $tulisann4 ?>",
    "tulisan5":"<?php echo $tulisann5 ?>",    
    "tulisan6":"<?php echo $tulisann6 ?>",
    "tulisan7":"<?php echo $tulisann7 ?>",
    "tulisan8":"<?php echo $tulisann8 ?>",
    "tulisan9":"<?php echo $tulisann9 ?>",
    "tulisan10":"<?php echo $tulisann10 ?>",
    "tulisan11":"<?php echo $tulisann11 ?>",
    "tulisan12":"<?php echo $tulisann12 ?>",
    "tulisan13":"<?php echo $tulisann13 ?>",
    "tulisan14":"<?php echo $tulisann14 ?>",
    "tulisan15":"<?php echo $tulisann15 ?>",
    "tulisan16":"<?php echo $tulisann16 ?>",
    "tulisan17":"<?php echo $tulisann17 ?>",
    "tulisan18":"<?php echo $tulisann18 ?>",
    "tulisan19":"",
    "tulisan20":"",
    "tulisan21":"",
    "bg":"https://ufe-section-indonesie.org/ufeapp/admin/bg/<?php echo $wd2['bg'] ?>",
     "bg2":"https://ufe-section-indonesie.org/ufeapp/admin/bg/<?php echo $wd4['gambar'] ?>"    
    }
    
      <?php
}else if($_GET['p'] == "splash_demar"){
    
   $fr = mysqli_query($koneksi,"select * from tb_tulisan where jenis = 'splash_demar' limit 1");
$fr2 = mysqli_fetch_array($fr); 


$wd = mysqli_query($koneksi,"select * from tb_background where keterangan = 'demar'");
$wd2 = mysqli_fetch_array($wd);
$wd3 = mysqli_query($koneksi,"select * from tb_background where keterangan = 'splash_demar'");
$wd4 = mysqli_fetch_array($wd3);

$tulisann1 = str_replace("&petiksatu&","'",$fr2['tulisan1']);
$tulisann2 = str_replace("&petiksatu&","'",$fr2['tulisan2']);
$tulisann3 = str_replace("&petiksatu&","'",$fr2['tulisan3']);
$tulisann4 = str_replace("&petiksatu&","'",$fr2['tulisan4']);
$tulisann5 = str_replace("&petiksatu&","'",$fr2['tulisan5']);
$tulisann6 = str_replace("&petiksatu&","'",$fr2['tulisan6']);
$tulisann7 = str_replace("&petiksatu&","'",$fr2['tulisan7']);
$tulisann8 = str_replace("&petiksatu&","'",$fr2['tulisan8']);
$tulisann9 = str_replace("&petiksatu&","'",$fr2['tulisan9']);
$tulisann10 = str_replace("&petiksatu&","'",$fr2['tulisan10']);
$tulisann11 = str_replace("&petiksatu&","'",$fr2['tulisan11']);
$tulisann12 = str_replace("&petiksatu&","'",$fr2['tulisan12']);
$tulisann13 = str_replace("&petiksatu&","'",$fr2['tulisan13']);
$tulisann14 = str_replace("&petiksatu&","'",$fr2['tulisan14']);
$tulisann15 = str_replace("&petiksatu&","'",$fr2['tulisan15']);
$tulisann16 = str_replace("&petiksatu&","'",$fr2['tulisan16']);
$tulisann17 = str_replace("&petiksatu&","'",$fr2['tulisan17']);
$tulisann18 = str_replace("&petiksatu&","'",$fr2['tulisan18']);
$tulisann19 = str_replace("&petiksatu&","'",$fr2['tulisan19']);
$tulisann20 = str_replace("&petiksatu&","'",$fr2['tulisan20']);
$tulisann21 = str_replace("&petiksatu&","'",$fr2['tulisan21']);
?>

{
    "success":1,
"tulisan1":"<?php echo $tulisann1 ?>",
    "tulisan2":"<?php echo $tulisann2 ?>",
    "tulisan3":"<?php echo $tulisann3 ?>",
    "tulisan4":"<?php echo $tulisann4 ?>",
    "tulisan5":"<?php echo $tulisann5 ?>",    
    "tulisan6":"<?php echo $tulisann6 ?>",
    "tulisan7":"<?php echo $tulisann7 ?>",
    "tulisan8":"<?php echo $tulisann8 ?>",
    "tulisan9":"<?php echo $tulisann9 ?>",
    "tulisan10":"<?php echo $tulisann10 ?>",
    "tulisan11":"<?php echo $tulisann11 ?>",
    "tulisan12":"<?php echo $tulisann12 ?>",
    "tulisan13":"<?php echo $tulisann13 ?>",
    "tulisan14":"<?php echo $tulisann14 ?>",
    "tulisan15":"<?php echo $tulisann15 ?>",
    "tulisan16":"<?php echo $tulisann16 ?>",
    "tulisan17":"<?php echo $tulisann17 ?>",
    "tulisan18":"<?php echo $tulisann18 ?>",
    "tulisan19":"<?php echo $tulisann19 ?>",
    "tulisan20":"<?php echo $tulisann20 ?>",
    "bg":"https://ufe-section-indonesie.org/ufeapp/admin/bg/<?php echo $wd2['gambar'] ?>",
     "bg2":"https://ufe-section-indonesie.org/ufeapp/admin/bg/<?php echo $wd4['gambar'] ?>",
"tulisan21":"<?php echo $tulisann21 ?>"    
    }


}else if($_GET['p'] == "splash_demar"){
    
    $fr = mysqli_query($koneksi,"select * from tb_tulisan where jenis = 'splash_demar' limit 1");
 $fr2 = mysqli_fetch_array($fr); 
 
 
 $wd = mysqli_query($koneksi,"select * from tb_background where keterangan = 'demar'");
 $wd2 = mysqli_fetch_array($wd);
 $wd3 = mysqli_query($koneksi,"select * from tb_background where keterangan = 'splash_demar'");
 $wd4 = mysqli_fetch_array($wd3);
 
 $tulisann1 = str_replace("&petiksatu&","'",$fr2['tulisan1']);
 $tulisann2 = str_replace("&petiksatu&","'",$fr2['tulisan2']);
 $tulisann3 = str_replace("&petiksatu&","'",$fr2['tulisan3']);
 $tulisann4 = str_replace("&petiksatu&","'",$fr2['tulisan4']);
 $tulisann5 = str_replace("&petiksatu&","'",$fr2['tulisan5']);
 $tulisann6 = str_replace("&petiksatu&","'",$fr2['tulisan6']);
 $tulisann7 = str_replace("&petiksatu&","'",$fr2['tulisan7']);
 $tulisann8 = str_replace("&petiksatu&","'",$fr2['tulisan8']);
 $tulisann9 = str_replace("&petiksatu&","'",$fr2['tulisan9']);
 $tulisann10 = str_replace("&petiksatu&","'",$fr2['tulisan10']);
 $tulisann11 = str_replace("&petiksatu&","'",$fr2['tulisan11']);
 $tulisann12 = str_replace("&petiksatu&","'",$fr2['tulisan12']);
 $tulisann13 = str_replace("&petiksatu&","'",$fr2['tulisan13']);
 $tulisann14 = str_replace("&petiksatu&","'",$fr2['tulisan14']);
 $tulisann15 = str_replace("&petiksatu&","'",$fr2['tulisan15']);
 $tulisann16 = str_replace("&petiksatu&","'",$fr2['tulisan16']);
 $tulisann17 = str_replace("&petiksatu&","'",$fr2['tulisan17']);
 $tulisann18 = str_replace("&petiksatu&","'",$fr2['tulisan18']);
 $tulisann19 = str_replace("&petiksatu&","'",$fr2['tulisan19']);
 $tulisann20 = str_replace("&petiksatu&","'",$fr2['tulisan20']);
 $tulisann21 = str_replace("&petiksatu&","'",$fr2['tulisan21']);
 ?>
 
 {
     "success":1,
 "tulisan1":"<?php echo $tulisann1 ?>",
     "tulisan2":"<?php echo $tulisann2 ?>",
     "tulisan3":"<?php echo $tulisann3 ?>",
     "tulisan4":"<?php echo $tulisann4 ?>",
     "tulisan5":"<?php echo $tulisann5 ?>",    
     "tulisan6":"<?php echo $tulisann6 ?>",
     "tulisan7":"<?php echo $tulisann7 ?>",
     "tulisan8":"<?php echo $tulisann8 ?>",
     "tulisan9":"<?php echo $tulisann9 ?>",
     "tulisan10":"<?php echo $tulisann10 ?>",
     "tulisan11":"<?php echo $tulisann11 ?>",
     "tulisan12":"<?php echo $tulisann12 ?>",
     "tulisan13":"<?php echo $tulisann13 ?>",
     "tulisan14":"<?php echo $tulisann14 ?>",
     "tulisan15":"<?php echo $tulisann15 ?>",
     "tulisan16":"<?php echo $tulisann16 ?>",
     "tulisan17":"<?php echo $tulisann17 ?>",
     "tulisan18":"<?php echo $tulisann18 ?>",
     "tulisan19":"<?php echo $tulisann19 ?>",
     "tulisan20":"<?php echo $tulisann20 ?>",
     "bg":"https://ufe-section-indonesie.org/ufeapp/admin/bg/<?php echo $wd2['gambar'] ?>",
      "bg2":"https://ufe-section-indonesie.org/ufeapp/admin/bg/<?php echo $wd4['gambar'] ?>",
 "tulisan21":"<?php echo $tulisann21 ?>"    
     } 
<?php
}



if($_GET['idd'] == "oke" || $_GET['p'] == "splash_demar3" || $_GET['p'] == "splash_demar4"){
    echo "]";
}


?>

