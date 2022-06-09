<?php



require_once('db.php');



$result = array();



date_default_timezone_set('Asia/Jakarta');

$tang22 = date('Y-m-d');


if(!empty($_GET['email'])){


$ow = mysqli_query($koneksi,"select * from user where username = '$_GET[email]'");
$ow2 = mysqli_fetch_assoc($ow);

?>
<?php

$nj = mysqli_query($koneksi,"select * from user where idUser = '$ow2[idUser]'");

$nj2 = mysqli_fetch_array($nj);



if($nj2['member_dari'] == ""){

$idmemberr = $ow2['idUser'];

}else{

  $idmemberr = $nj2['member_dari'];

}





$halaman = $_GET['halaman'];

$limit = 5;



if($halaman <= 1){

    $stur = 0;

}else if(empty($halaman)){

    $stur = 0;

}else{

    $stur = $halaman * $limit;

}



$sql_get_data = "SELECT * FROM tb_order where id_user = '$idmemberr' and ket = 'sudahdibayar' ORDER BY tanggal DESC limit $stur,$limit";

$koneksi->set_charset("utf8");

$query = $koneksi->query($sql_get_data);



echo"{";

 echo  '"result": [';



$no = 1;

while($row = mysqli_fetch_assoc($query)){



$yo = mysqli_query($koneksi,"select * from tb_order_aktif where id_order =  '$row[id_order]'");

$yo2 = mysqli_fetch_array($yo);





$tangg5 = date('d/m/Y', strtotime($row['tanggal'] . ' +0 day'));



$tangg = date('M Y', strtotime($yo2['tanggal_awal'] . ' +0 day'));

$tangg33 = date('M Y', strtotime($yo2['tanggal_akhir'] . ' +0 day'));





$sq = mysqli_query($koneksi,"select * from tb_activites where id_activites = '$row[id_activites]'");

$sq2 = mysqli_fetch_array($sq);



// $gf = mysqli_query($koneksi,"select * from tb_creche where ket1 = '$row[harga]'");

// $gf2 = mysqli_fetch_array($gf);



  $nh = mysqli_query($koneksi,"select * from user where idUser = '$ow2[idUser]'");

  $nh2 = mysqli_fetch_array($nh);

  

  $tangg4 = date('M Y', strtotime($nh2['masa_aktif'] . ' -1 year'));

    $tangg44 = date('M Y', strtotime($nh2['masa_aktif'] . ' +0 year'));

  

  

  //$result[] = $row;

  if($no == 1){}else{echo ",";}

?>

{





      "id_actualite": "<?php echo $row['id_order'] ?>",

      "id_member": "<?php echo $row['id_user'] ?>",

            "emailuser": "",

      "judul": "<?php echo $row['nama_produk'] ?>",

      "deskripsi": "<?php echo $row['nama_produk'] ?>",

       "no_invoice": "<?php echo $row['no_invoice'] ?>",

      <?php if($row['jenis_order'] == "biaya_member"){ ?>

      "gambar": "https://ufe-section-indonesie.org/ufeapp/images/activites/grup340.png",

      <?php }else{ ?>


        <?php 
      if($row['jenis_order'] == "memberufe"){
?>

"gambar": "https://ufe-section-indonesie.org/ufeapp/images/ufe.png",

<?php
      }else{
        ?>
      "gambar": "https://ufe-section-indonesie.org/ufeapp/images/activites/<?php echo $sq2['gambar2'] ?>",

        <?php
      }
      ?>


    
      <?php } ?>

      "tanggal": "<?php echo $row['tanggal'] ?>",

      "harga_asli": "<?php echo $row['jenis_order'] ?>",

      "tanggal2": "<?php echo $row['tanggal'] ?>",

      "url": "<?php echo $row['tanggal'] ?>",

      "email": "DATE: <?php echo $tangg5 ?>",

      <?php if($row['jenis_order'] == "biaya_member"){ ?>

            "urutan": "PERIODE: <?php echo $tangg4.' - '.$tangg44 ?>",

<?php }else{ ?>

            "urutan": "PERIODE: <?php echo $tangg.' - '.$tangg33 ?>",

<?php } ?>

      "keterangan": "<?php echo $row['nama_produk'] ?>"

    }

<?php

$no++;}

echo "]}";
?>
<?php
}else{
?>


<?php

$nj = mysqli_query($koneksi,"select * from user where idUser = '$_GET[idmember]'");

$nj2 = mysqli_fetch_array($nj);



if($nj2['member_dari'] == ""){

$idmemberr = $_GET['idmember'];

}else{

  $idmemberr = $nj2['member_dari'];

}





$halaman = $_GET['halaman'];

$limit = 5;



if($halaman <= 1){

    $stur = 0;

}else if(empty($halaman)){

    $stur = 0;

}else{

    $stur = $halaman * $limit;

}



$sql_get_data = "SELECT * FROM tb_order where id_user = '$idmemberr' and ket = 'sudahdibayar' ORDER BY tanggal DESC limit $stur,$limit";

$koneksi->set_charset("utf8");

$query = $koneksi->query($sql_get_data);



echo"{";

 echo  '"result": [';



$no = 1;

while($row = mysqli_fetch_assoc($query)){



$yo = mysqli_query($koneksi,"select * from tb_order_aktif where id_order =  '$row[id_order]'");

$yo2 = mysqli_fetch_array($yo);





$tangg5 = date('d/m/Y', strtotime($row['tanggal'] . ' +0 day'));



$tangg = date('M Y', strtotime($yo2['tanggal_awal'] . ' +0 day'));

$tangg33 = date('M Y', strtotime($yo2['tanggal_akhir'] . ' +0 day'));





$sq = mysqli_query($koneksi,"select * from tb_activites where id_activites = '$row[id_activites]'");

$sq2 = mysqli_fetch_array($sq);



// $gf = mysqli_query($koneksi,"select * from tb_creche where ket1 = '$row[harga]'");

// $gf2 = mysqli_fetch_array($gf);



  $nh = mysqli_query($koneksi,"select * from user where idUser = '$_GET[idmember]'");

  $nh2 = mysqli_fetch_array($nh);

  

  $tangg4 = date('M Y', strtotime($nh2['masa_aktif'] . ' -1 year'));

    $tangg44 = date('M Y', strtotime($nh2['masa_aktif'] . ' +0 year'));

  

  

  //$result[] = $row;

  if($no == 1){}else{echo ",";}

?>

{





      "id_actualite": "<?php echo $row['id_order'] ?>",

      "id_member": "<?php echo $row['id_user'] ?>",

            "emailuser": "",

      "judul": "<?php echo $row['nama_produk'] ?>",

      "deskripsi": "<?php echo $row['nama_produk'] ?>",

       "no_invoice": "<?php echo $row['no_invoice'] ?>",

      <?php if($row['jenis_order'] == "biaya_member"){ ?>

      "gambar": "https://ufe-section-indonesie.org/ufeapp/images/activites/grup340.png",

      <?php }else{ ?>

      "gambar": "https://ufe-section-indonesie.org/ufeapp/images/activites/<?php echo $sq2['gambar2'] ?>",

      <?php } ?>

      "tanggal": "<?php echo $row['tanggal'] ?>",

      "harga_asli": "<?php echo $row['jenis_order'] ?>",

      "tanggal2": "<?php echo $row['tanggal'] ?>",

      "url": "<?php echo $row['tanggal'] ?>",

      "email": "DATE: <?php echo $tangg5 ?>",

      <?php if($row['jenis_order'] == "biaya_member"){ ?>

            "urutan": "PERIODE: <?php echo $tangg4.' - '.$tangg44 ?>",

<?php }else{ ?>

            "urutan": "PERIODE: <?php echo $tangg.' - '.$tangg33 ?>",

<?php } ?>

      "keterangan": "<?php echo $row['nama_produk'] ?>"

    }

<?php

$no++;}

echo "]}";
?>
//echo json_encode(array('result'=>$result));

<?php
  }
?>