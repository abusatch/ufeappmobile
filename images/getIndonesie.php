<?php

include("db.php");

//include("koneksi.php");

echo "[";



$no = 1;

//$de = mysqli_query($koneksi,"select * from tb_facilites order by id_facilites desc");



$sql_get_fasilitas = "select * from tb_menu where jenis = 'indonesie'";

$koneksi->set_charset("utf8");

$query = $koneksi->query($sql_get_fasilitas);





while ($de2 = $query->fetch_assoc()) {



//while ($data = $query->fetch_assoc()) {


    $desk1 = str_replace('\n',"",$de2['short_desc']);
$desk2 = str_replace("'","`",$desk1);
$desk3 = str_replace('"',"`",$desk2);
$desk4 = str_replace(str_split('\\/:*?"<>|'), ' ', $desk3);
$desk5 = trim(preg_replace('/\s\s+/', ' ', $desk4));
$desk6 = str_replace("<br>","",$desk5);
$desk7 = str_replace(".","",$desk6);

//while($de2 = mysqli_fetch_array($query)){

?>

<?php if($no == 1){}else{echo ",";} ?>

  {    

       "title": "<?php echo $de2['nama_menu'] ?>",

        "image": "https://ufe-section-indonesie.org/ufeapp/images/menu/<?php echo $de2['gambar'] ?>",

        "rating": "<?php echo $desk7; ?>",

        "releaseYear": "<?php echo $desk7; ?>",

        "genre": "<?php echo  $desk7; ?>"

    }





<?php

$no++;}



echo "]";

?>

