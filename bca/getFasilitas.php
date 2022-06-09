<?php
include("db.php");
//include("koneksi.php");
echo "[";

$no = 1;
//$de = mysqli_query($koneksi,"select * from tb_facilites order by id_facilites desc");

$sql_get_fasilitas = "select * from tb_facilites order by id_facilites desc";
$koneksi->set_charset("utf8");
$query = $koneksi->query($sql_get_fasilitas);


while ($de2 = $query->fetch_assoc()) {

//while ($data = $query->fetch_assoc()) {

//while($de2 = mysqli_fetch_array($query)){
?>
<?php if($no == 1){}else{echo ",";} ?>
  {    
       "title": "<?php echo $de2['judul'] ?>",
        "image": "https://ufe-section-indonesie.org/ufeapp/images/facilites/<?php echo $de2['gambar'] ?>",
        "rating": "<?php echo $de2['deskripsi'] ?>",
        "releaseYear": "<?php echo $de2['deskripsi'] ?>",
        "genre": "<?php echo $de2['deskripsi'] ?>"
    }


<?php
$no++;}

echo "]";
?>
