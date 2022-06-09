<?php

require_once('db.php');

$result = array();


$nj = mysqli_query($koneksi,"select * from user where username = '$_GET[email]'");
$nj2 = mysqli_fetch_array($nj);

if($nj2['member_dari'] == ""){
$idmemberr = $nj2['idUser'];
}else{
  $idmemberr = $nj2['member_dari'];
}

if($_GET['filter'] == ""){
    
    // $dua = 0;
   // limit $dua,10
    
$sql_get_data = "SELECT * FROM tb_template where id_member_vip = '$idmemberr'  and keterangan = 'release' and visibility = '1' ORDER BY id_template desc";
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


if($no <= 1){}else{

//   $nh = mysqli_query($koneksi,"select * from user where idUser = '$row[id_member_vip]'");
//   $nh2 = mysqli_fetch_array($nh);
  //$result[] = $row;
  if($no == 2){}else{echo ",";}
?>
{
      "id_actualite": "<?php echo $row['id_template'] ?>",
      "id_member": "<?php echo $row['id_template'] ?>",
      "judul": "<?php echo $row['judul'] ?>",
      "deskripsi": "<?php echo $row['deskripsi'] ?>",
      "gambar": "<?php echo $row['gambar'] ?>",
      "tanggal": "<?php echo $row['judul'] ?>",
      "tanggal2": "<?php echo $row['judul'] ?>",
      "url": "<?php echo $row['linkweb'] ?>",
      "email": "<?php echo $nh2['linkweb'] ?>",
      "keterangan": "<?php echo $row['judul'] ?>"
    }
<?php
}
$no++;}
echo "]}";
//echo json_encode(array('result'=>$result));

?>