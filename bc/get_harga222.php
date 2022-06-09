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


$sql_get_data = "SELECT * FROM tb_harga_program where id_activites = '$_GET[filter]'";


$koneksi->set_charset("utf8");
$query = $koneksi->query($sql_get_data);

echo"{";
 echo  '"result": [';

$no = 1;
while($row = mysqli_fetch_assoc($query)){


// if($no <= 3){}else{

//   $nh = mysqli_query($koneksi,"select * from user where idUser = '$row[id_member_vip]'");
//   $nh2 = mysqli_fetch_array($nh);
  //$result[] = $row;
  if($no == 1){}else{echo ",";}
?>
{
      "id_actualite": "<?php echo $row['id_activites'] ?>",
      "id_member": "<?php echo $row['id_harga'] ?>",
    <?php if($row['harga'] == "Gratuit"){ ?>
        "judul": "Gratuit",
      <?php }else{ ?>
      "judul": "<?php echo $row['harga'] ?>",
      <?php } ?>
      "deskripsi": "<?php echo $row['keterangan'] ?>",
      "gambar": "<?php echo $row['harga'] ?>",
      "tanggal": "<?php echo $row['harga'] ?>",
      "tanggal2": "<?php echo $row['harga'] ?>",
      "url": "IDR <?php echo number_format($row['harga'],0,',','.') ?>",
      "email": "<?php echo $nh2['harga'] ?>",
      "keterangan": "<?php echo $row['keterangan'] ?>"
    }
<?php
// }
$no++;}
echo "]}";
//echo json_encode(array('result'=>$result));

?>