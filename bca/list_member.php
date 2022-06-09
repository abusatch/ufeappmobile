<?php

require_once('db.php');

$result = array();

$pss = md5($_GET['pss']);

$nj = mysqli_query($koneksi,"select * from user where idUser = '$_GET[idmember]' and password = '$pss'");
$nj2 = mysqli_fetch_array($nj);

if($nj2['member_dari'] == ""){
$idmemberr = $_GET['idmember'];
}else{
  $idmemberr = $nj2['member_dari'];
}



$nj3 = mysqli_num_rows($nj);

if($nj3 == 0){}else{
$sql_get_data = "SELECT * FROM user where member_dari = '$_GET[idmember]'  ORDER BY idUser DESC";
$koneksi->set_charset("utf8");
$query = $koneksi->query($sql_get_data);

echo"{";
 echo  '"result": [';

$no = 1;
while($row = mysqli_fetch_assoc($query)){

//   $nh = mysqli_query($koneksi,"select * from user where idUser = '$row[id_member_vip]'");
//   $nh2 = mysqli_fetch_array($nh);
  //$result[] = $row;
  if($no == 1){}else{echo ",";}
?>
{
      "id_actualite": "<?php echo $row['idUser'] ?>",
      "id_member": "<?php echo $row['member_dari'] ?>",
      "judul": "<?php echo $row['second_name'] ?>",
      "deskripsi": "<?php echo $row['first_name'] ?>",
      "gambar": "<?php echo $row['propic'] ?>",
      "tanggal": "<?php echo $row['second_name'] ?>",
      "tanggal2": "<?php echo $row['second_name'] ?>",
      "url": "<?php echo $row['username'] ?>",
      "email": "<?php echo $row['username'] ?>",
      "keterangan": "<?php echo $row['password'] ?>"
    }
<?php
$no++;}
echo "]}";
//echo json_encode(array('result'=>$result));
}
?>