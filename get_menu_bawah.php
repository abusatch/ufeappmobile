<?php

include("db.php");

//include("koneksi.php");

echo "[";









$feg = mysqli_query($koneksi,"select * from user where username = '$_GET[username2]' and password = '$_GET[pss2]'");

if(mysqli_num_rows($feg) == 0){
    ?>
     {    

       "title": "<?php echo $de2['judul'] ?>",

       "urutan": "<?php echo $no; ?>",

       "jumlah": "<?php echo $de2['instruktur']; ?>",

        "image": "<?php echo $de2['gambar'] ?>",

        "rating": "<?php echo $desk7; ?>",

        "releaseYear": "<?php echo $kl2['nama'] ?>",

        "genre": "<?php echo $de2['id_activites'] ?>"

    }
    
    <?php
}else{
    






$no = 1;

//$de = mysqli_query($koneksi,"select * from tb_facilites order by id_facilites desc");



$dw = mysqli_query($koneksi,"select * from tb_activites where id_jenis = '$_GET[idjenis]' order by id_activites desc");

$dw2 = mysqli_num_rows($dw);





$sql_get_fasilitas = "select * from tb_activites where id_jenis = '2' order by id_activites desc limit 2";

$koneksi->set_charset("utf8");

$query = $koneksi->query($sql_get_fasilitas);


$feg = mysqli_query($koneksi,"select * from user where username = '$_GET[username2]' and password = '$_GET[pss2]'");
$feg2 = mysqli_fetch_assoc($feg);

while ($de2 = $query->fetch_assoc()) {

    $desk1 = str_replace('\n',"",$de2['ket_instruktur']);
$desk2 = str_replace("'","`",$desk1);
$desk3 = str_replace('"',"`",$desk2);
$desk4 = str_replace(str_split('\\/:*?"<>|'), ' ', $desk3);
$desk5 = trim(preg_replace('/\s\s+/', ' ', $desk4));
$desk6 = str_replace("<br>","",$desk5);
$desk7 = str_replace(".","",$desk6);

    $kl = mysqli_query($koneksi,"select * from tb_activites_jenis where id_jenis = '$de2[id_jenis]'");

    $kl2 = mysqli_fetch_array($kl);



//while ($data = $query->fetch_assoc()) {



//while($de2 = mysqli_fetch_array($query)){

?>

<?php if($no == 1){}else{echo ",";} ?>

  {    

       "title": "<?php echo $de2['judul'] ?>",

       "urutan": "<?php echo $no; ?>",

       "jumlah": "<?php echo $de2['instruktur']; ?>",

        "image": "https://ufe-section-indonesie.org/ufeapp/images/propic/<?php echo $feg2['propic'] ?>",

        "rating": "<?php echo $desk7; ?>",

        "releaseYear": "<?php echo $kl2['nama'] ?>",

        "genre": "<?php echo $de2['id_activites'] ?>"

    }





<?php

$no++;}

}

echo "]";

?>

