<?php

require_once('db.php');

$result = array();


// $nj = mysqli_query($koneksi,"select * from user where idUser = '$_GET[idmember]'");
// $nj2 = mysqli_fetch_array($nj);

// if($nj2['member_dari'] == ""){
// $idmemberr = $_GET['idmember'];
// }else{
//   $idmemberr = $nj2['member_dari'];
// }

$sql_get_data = "SELECT * FROM tb_agent where id_kategori = '$_GET[idmember]' and visibility = '1' ORDER BY judul ASC";
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
      "id_actualite": "<?php echo $row['id_agent'] ?>",
      "id_member": "<?php echo $row['id_kategori'] ?>",
      "judul": "<?php echo $row['namaagent'] ?>",
      "deskripsi": "<?php echo $row['alamatagent'] ?>",
      "gambar": "<?php echo $row['gambar'] ?>",
      "tanggal": "<?php echo $row['gambar'] ?>",
      "tanggal2": "<?php echo $row['gambar'] ?>",
      "url": "<?php echo $row['gambar'] ?>",
      "email": "<?php echo $nh2['judul'] ?>",
      "keterangan": "<?php echo $row['alamatagent'] ?>"
    }
<?php
$no++;}
echo "]}";
//echo json_encode(array('result'=>$result));

?>