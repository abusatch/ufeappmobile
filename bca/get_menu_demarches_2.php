<?php

require_once('db.php');

$result = array();


$nj = mysqli_query($koneksi,"select * from user where idUser = '$_GET[idmember]'");
$nj2 = mysqli_fetch_array($nj);

if($nj2['member_dari'] == ""){
$idmemberr = $_GET['idmember'];
}else{
  $idmemberr = $nj2['member_dari'];
}

if($_GET['filter'] == ""){
$sql_get_data = "select * from tb_demar2 where id_kategori = '$_GET[id_kategori]' and visibility = '1' order by id_demar asc";
}else if($_GET['filter'] == "demarches"){
  $sql_get_data = "SELECT * FROM tb_menu where jenis = 'DEMARCHES' and visibility = '1' ORDER BY id_menu ASC";
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

}else{
 $sql_get_data = "select * from tb_demar2 where id_kategori = '$_GET[id_kategori]' order by id_demar desc";   
}

$koneksi->set_charset("utf8");
$query = $koneksi->query($sql_get_data);

echo"{";
 echo  '"result": [';

$no = 1;
while($row = mysqli_fetch_assoc($query)){

$gf = mysqli_query($koneksi,"select * from tb_menu where id_menu = '$_GET[id_kategori]'");
$gf2 = mysqli_fetch_array($gf);

// if($no <= 1){}else{

//   $nh = mysqli_query($koneksi,"select * from user where idUser = '$row[id_member_vip]'");
//   $nh2 = mysqli_fetch_array($nh);
  //$result[] = $row;
  if($no == 1){}else{echo ",";}

    $judul1 = str_replace("&petiksatu&","'",$row['judul']);
    $judul21 = str_replace("&petiksatu&","'",$row['judul2']);
    $short_desc1 = str_replace("&petiksatu&","'",$row['short_desc']);
    $long_desc1 = str_replace("&petiksatu&","'",$row['long_desc']);
    

?>
{
      "id_actualite": "<?php echo $row['id_demar'] ?>",
      "id_member": "<?php echo $row['id_demar'] ?>",
      "judul": "<?php echo $judul1 ?>",
      "deskripsi": "<?php echo $short_desc1 ?>",
      "gambar": "<?php echo $row['gambar'] ?>",
      "tanggal": "<?php echo $judul1 ?>",
      "tanggal2": "<?php echo $judul1 ?>",
      "url": "<?php echo $long_desc1 ?>",
      "email": "<?php echo $judul21 ?>",
      "keterangan": "<?php echo $gf2['nama_menu'] ?>"
    }
<?php
// }
$no++;}
echo "]}";
//echo json_encode(array('result'=>$result));

?>