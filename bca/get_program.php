<?php
include("db.php");
//include("koneksi.php");
echo "[";

$no = 1;
//$de = mysqli_query($koneksi,"select * from tb_facilites order by id_facilites desc");

$dw = mysqli_query($koneksi,"select * from tb_activites where id_jenis = '$_GET[idjenis]' order by id_activites desc");
$dw2 = mysqli_num_rows($dw);


$sql_get_fasilitas = "select * from tb_activites where id_jenis = '$_GET[idjenis]' order by id_activites desc";
$koneksi->set_charset("utf8");
$query = $koneksi->query($sql_get_fasilitas);


while ($de2 = $query->fetch_assoc()) {
    
    $kl = mysqli_query($koneksi,"select * from tb_activites_jenis where id_jenis = '$de2[id_jenis]'");
    $kl2 = mysqli_fetch_array($kl);

//while ($data = $query->fetch_assoc()) {

//while($de2 = mysqli_fetch_array($query)){
?>
<?php if($no == 1){}else{echo ",";} ?>
  {    
       "title": "<?php echo $de2['judul'] ?>",
       "urutan": "<?php echo $no; ?>",
       "jumlah": "<?php echo $dw2; ?>",
        "image": "<?php echo $de2['gambar'] ?>",
        "rating": "<?php echo $de2['deskripsi'] ?>",
        "releaseYear": "<?php echo $kl2['nama'] ?>",
        "genre": "<?php echo $de2['id_activites'] ?>"
    }


<?php
$no++;}

echo "]";
?>
