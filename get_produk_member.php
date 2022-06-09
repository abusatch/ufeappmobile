<?php



require_once('db.php');



$result = array();






$nv = mysqli_query($koneksi,"select * from tb_template where id_template = '$_GET[idd]'");
$nv2 = mysqli_fetch_assoc($nv);



if(empty($_GET['id'])){
  $nj = mysqli_query($koneksi,"select * from user where idUser = '$nv2[id_member_vip]'");
}else{
$nj = mysqli_query($koneksi,"select * from user where username = '$_GET[id]'");
}
$nj2 = mysqli_fetch_array($nj);



if($nj2['member_dari'] == ""){

$idmemberr = $nj2['idUser'];

}else{

  $idmemberr = $nj2['member_dari'];

}















if($_GET['filter'] == ""){

$sql_get_data = "SELECT * FROM tb_produk_member where id_member_vip = '$idmemberr' and visibility = 1 order by id_produk desc";

}else if($_GET['filter'] == "demarches"){

  $sql_get_data = "SELECT * FROM tb_menu where jenis = 'DEMARCHES' ORDER BY id_menu ASC";

}else if($_GET['filter'] == "menu1"){

  $sql_get_data = "SELECT * FROM tb_menu where jenis = 'MENU1' ORDER BY id_menu ASC";

}else if($_GET['filter'] == "menu2"){

  $sql_get_data = "SELECT * FROM tb_menu where jenis = 'MENU2' ORDER BY id_menu ASC";

}else if($_GET['filter'] == "menu3"){

  $sql_get_data = "SELECT * FROM tb_menu where jenis = 'MENU3' ORDER BY id_menu ASC";

}else if($_GET['filter'] == "menu4"){

  $sql_get_data = "SELECT * FROM tb_menu where jenis = 'MENU4' ORDER BY id_menu ASC";

}else if($_GET['filter'] == "menu5"){

  $sql_get_data = "SELECT * FROM tb_menu where jenis = 'MENU5' ORDER BY id_menu ASC";



}



$koneksi->set_charset("utf8");

$query = $koneksi->query($sql_get_data);



echo"{";

 echo  '"result": [';



$no = 1;

while($row = mysqli_fetch_assoc($query)){





//if($no <= 3){}else{



//   $nh = mysqli_query($koneksi,"select * from user where idUser = '$row[id_member_vip]'");

//   $nh2 = mysqli_fetch_array($nh);

  //$result[] = $row;

  if($no == 1){}else{echo ",";}



//   $desk1 = substr($row['deskripsi'],0,50);
//   $desk2 = str_replace("'","`",$desk1);
//   $desk3 = str_replace('"',"`",$desk2);
//   $desk4 = str_replace('\n',"\nn",$desk3);
//   $desk5 = str_replace('ç',"c",$desk4);



  $desk1 = str_replace('\n',"-enter-",$row['deskripsi']);
  $desk2 = str_replace("'","`",$desk1);
  $desk3 = str_replace('"',"`",$desk2);
  $desk4 = str_replace(str_split('\\/:*?"<>|'), '-enter-', $desk3);
  $desk5 = trim(preg_replace('/\s\s+/', '-enter-', $desk4));
  $desk6 = str_replace("<br>","-enter-",$desk5);
  $desk7 = str_replace(".","-titik-",$desk6);

?>

{



              "id_produk": "<?php echo $row['id_produk']; ?>",	
              "id_member_vip": "<?php echo $row['id_member_vip'] ?>",

              "linkweb": "<?php echo $row['linkweb'] ?>",

              "tanggal_edit":"<?php echo $row['tanggal_edit']; ?>",
              "tanggal_edit2":"<?php echo $row['tanggal_edit2']; ?>",
              "user_edit":"<?php echo $row['user_edit']; ?>",
              "keterangan":"<?php echo $desk7; ?>",	
              "keterangan2":"<?php echo $row['keterangan2']; ?>",
              "visibility":"<?php echo $row['visibility']; ?>"	,

              "id_actualite": "<?php echo $row['id_produk'] ?>",

              "id_member": "<?php echo $row['id_member_vip'] ?>",

              "judul": "<?php echo $row['judul'] ?>",

              "deskripsi": "<?php //echo $desk5; ?>",

              "gambar": "<?php echo $row['judul'] ?>",

              "tanggal": "<?php echo $row['judul'] ?>",

              "tanggal2": "<?php echo $row['judul'] ?>",

              "url": "<?php echo $row['linkweb'] ?>",

              "email": "<?php echo $row['judul'] ?>"

    }

<?php

//}

$no++;}

echo "]}";

//echo json_encode(array('result'=>$result));



?>