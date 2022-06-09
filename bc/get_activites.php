<?php

require_once('db.php');

$result = array();
echo "{";
   echo '"result": [';
$sql_get_data = "SELECT * FROM tb_activites where id_activites != '$_GET[id_activites]' and id_jenis = '$_GET[id_jenis]' ORDER BY id_activites DESC";
$koneksi->set_charset("utf8");
$query = $koneksi->query($sql_get_data);
$no = 1;
$sw = mysqli_query($koneksi,"select * from tb_activites where id_activites = '$_GET[id_activites]'");
$sw2 = mysqli_fetch_array($sw);

$gts = mysqli_query($koneksi,"select * from tb_activites_jenis where id_jenis = '$sw2[id_jenis]'");
$gts2 = mysqli_fetch_array($gts);
?>
{
      "id_actualite": "<?php echo $sw2['id_activites'] ?>",
      "jenis_activity": "<?php echo $gts2['nama'] ?>",
      "id_member": "<?php echo $sw2['id_jenis'] ?>",
      "harga_1": "<?php echo $sw2['harga1'] ?>",
      "harga_2": "<?php echo $sw2['harga2'] ?>",
      "harga_3": "<?php echo $sw2['harga3'] ?>",
      "judul": "<?php echo $sw2['judul'] ?>",
      "deskripsi": "<?php echo $sw2['judul'] ?>",
      "gambar": "<?php echo $sw2['gambar'] ?>",
      "tanggal": null,
      "email": "",
      "tanggal2": null,
      "url": "<?php echo $sw2['deskripsi'] ?>",
      "keterangan": null
    }
<?php
while($row = mysqli_fetch_assoc($query)){


$gt = mysqli_query($koneksi,"select * from tb_activites_jenis where id_jenis = '$row[id_jenis]'");
$gt2 = mysqli_fetch_array($gt);

    //if($no == 1){}else{echo ",";}
    echo ",";
    ?>
  {
      "id_actualite": "<?php echo $row['id_activites'] ?>",
      "id_member": "<?php echo $row['id_jenis'] ?>",
      "jenis_activity": "<?php echo $gt2['nama'] ?>",
      "harga_1": "<?php echo $row['harga1'] ?>",
      "harga_2": "<?php echo $row['harga2'] ?>",
      "harga_3": "<?php echo $row['harga3'] ?>",
      "judul": "<?php echo $row['judul'] ?>",
      "deskripsi": "<?php echo $row['judul'] ?>",
      "gambar": "<?php echo $row['gambar'] ?>",
      "tanggal": null,
      "email": "",
      "tanggal2": null,
      "url": "<?php echo $row['deskripsi'] ?>",
      "keterangan": null
    }
<?php
$no++;}
echo "]}";
//echo json_encode(array('result'=>$result));

?>