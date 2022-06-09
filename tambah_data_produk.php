
<?php
	include "db.php";
	
// 	class usr{}
    $pss = md5($_POST['pss']);


    if(!empty($_POST['username2'])){
        $jk = mysqli_query($koneksi,"select * from user where username = '$_POST[username2]' and password = '$_POST[pss2]'");
    
    }else{
        $jk = mysqli_query($koneksi,"select * from user where idUser = '$_POST[username]' and password = '$pss'");
    
    }
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
  "message": "Accès refusé <?php echo $_POST['username'] ?> <?php echo $pss ?>"
}

<?php
    }else{
        if($_POST['edit'] == ""){
        
        
        if($_POST['judul'] == ""){
        ?>
        
        {
  "success": 0,
  "message": "titre ne peut pas être vide <?php //echo mysqli_error($koneksi); ?>"
  }
        <?php
        }else if($_POST['deskripsi'] == ""){
             ?>
        {
  "success": 0,
  "message": "La description ne peut pas être vierge <?php //echo mysqli_error($koneksi); ?>"
  }         
             <?php
        }else if($_POST['linkweb'] == ""){
             ?>
        {
  "success": 0,
  "message": "Le lien ne peut pas être vide <?php //echo mysqli_error($koneksi); ?>"
  }         
               
         <?php   
        }else{
        
        
    mysqli_query($koneksi,"insert into tb_produk_member (id_member_vip,judul,deskripsi,linkweb,visibility)
    values
    ('$md','$_POST[judul]','$_POST[deskripsi]','$_POST[linkweb]',1)
    ");        
        ?>
        
          {
  "success": 1,
  "message": "Ajouter le produit avec succès <?php //echo mysqli_error($koneksi); ?>"
}
        <?php
        }
        }else if($_POST['edit'] == "null"){
        
        
         
        if($_POST['judul'] == ""){
        ?>
        
        {
  "success": 0,
  "message": "titre ne peut pas être vide <?php //echo mysqli_error($koneksi); ?>"
  }
        <?php
        }else if($_POST['deskripsi'] == ""){
             ?>
        {
  "success": 0,
  "message": "La description ne peut pas être vierge <?php //echo mysqli_error($koneksi); ?>"
  }         
             <?php
        }else if($_POST['linkweb'] == ""){
             ?>
        {
  "success": 0,
  "message": "Le lien ne peut pas être vide <?php //echo mysqli_error($koneksi); ?>"
  }         
               
         <?php   
        }else{
        
    mysqli_query($koneksi,"insert into tb_produk_member (id_member_vip,judul,deskripsi,linkweb,visibility)
    values
    ('$md','$_POST[judul]','$_POST[deskripsi]','$_POST[linkweb]',1)
    ");        
        ?>
        
 
          {
  "success": 1,
  "message": "Ajouter le produit avec succès <?php //echo mysqli_error($koneksi); ?>"
}       
        
        <?php
 
        }
 
        
        }else{
            
    mysqli_query($koneksi,"update tb_produk_member set judul = '$_POST[judul]',
    deskripsi = '$_POST[deskripsi]',
    linkweb = '$_POST[linkweb]' where id_produk = '$_POST[edit]'
    ");     
            
            ?>
       {
  "success": 1,
  "message": "Modifier le produit avec succès <?php echo mysqli_error($koneksi).$_POST['edit']; ?>"
}           
            
<?php            
        }
        
    }
    $username = $_POST["username"];

?>