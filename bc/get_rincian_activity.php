<?php
include("db.php");
echo "[";

$no = 1;
//$de = mysqli_query($koneksi,"select * from tb_activites order by id_activites //desc");
//while($de2 = mysqli_fetch_array($de)){


$sql_get_rincian_activity = "select * from tb_activites order by id_activites desc";
$koneksi->set_charset("utf8");
$query = $koneksi->query($sql_get_rincian_activity);


while ($de2 = $query->fetch_assoc()) {



?>




<?php if($no == 1){}else{echo ",";} ?>
  {    
       "title": "<?php echo $de2['judul'] ?>",
        "image": "https://ufe-section-indonesie.org/ufeapp/images/activites/<?php echo $de2['gambar'] ?>",
        "rating": "<?php echo $de2['deskripsi'] ?>",
        "releaseYear": "<?php echo $de2['deskripsi'] ?>",
        "genre": "<?php echo $de2['deskripsi'] ?>"
    }


<?php
$no++;}

echo "]";
?>
