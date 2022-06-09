
<?php
	include "db.php";
	
	class usr{}
    $pss = md5($_POST['pss']);
    $jk = mysqli_query($koneksi,"select * from user where idUser = '$_POST[username]' and password = '$pss'");
    $jk2 = mysqli_num_rows($jk);
    
    $jk3 = mysqli_fetch_array($jk);
    if($jk3['member_dari'] == ""){
        $md = $jk3['idUser'];
    }else{
        
        $md = $jk3['member_dari'];
    }
    
    if($jk2 == 0){
    
?>

    {
  "success": 0,
  "message": "Accès refusé<?php echo $_POST['username'] ?> <?php echo $pss ?>"
}

<?php
    }else{
        
        
        $phonee = str_replace("'","&petiksatu&",$_POST['phone']);
        $mobilee = str_replace("'","&petiksatu&",$_POST['mobile']);
        $alamatt = str_replace("'","&petiksatu&",$_POST['alamat']);
        $link_alamatt = str_replace("'","&petiksatu&",$_POST['link_alamat']);
        $kotaa = str_replace("'","&petiksatu&",$_POST['kota']);
        $kodeposs = str_replace("'","&petiksatu&",$_POST['kodepos']);
        $ket22 = str_replace("'","&petiksatu&",$_POST['ket2']);
        $faxx = str_replace("'","&petiksatu&",$_POST['fax']);
        $email_companyy =str_replace("'","&petiksatu&",$_POST['email_company']);
        $websitee = str_replace("'","&petiksatu&",$_POST['website']);
        $companyy = str_replace("'","&petiksatu&",$_POST['company']);
        $deskripsii = str_replace("'","&petiksatu&",$_POST['deskripsi']);
        $facebookk = str_replace("'","&petiksatu&",$_POST['facebook']);
        $twitterr = str_replace("'","&petiksatu&",$_POST['twitter']);
        $instagramm = str_replace("'","&petiksatu&",$_POST['instagram']);
        
        
        
    mysqli_query($koneksi,"update user set 
    telp_company = '$phonee',
    mobile_company = '$mobilee',
    alamat_company = '$alamatt',
    link_alamat = '$link_alamatt',
    kota_company = '$kotaa',
    kodepos_company = '$kodeposs',
    ket2 = '$ket22',
    fax_company = '$faxx',
    email_company = '$email_companyy',
    
    website = '$websitee',
    company = '$companyy',
        deskripsi = '$deskripsii',
    facebook = '$facebookk',
    twitter = '$twitterr',
    instagram = '$instagramm'
    
    where idUser = '$md'
    ");        
        ?>
        
          {
  "success": 1,
  "message": "Mise à jour réussie des données<?php echo mysqli_error($koneksi) ?>"
}
        <?php
        
    }
    $username = $_POST["username"];

?>