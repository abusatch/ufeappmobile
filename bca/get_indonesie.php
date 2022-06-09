<?php 
//mysqli_query('SET CHARACTER SET utf8');
mysqli_set_charset('utf8');
header('Content-type: text/html; charset=utf-8');
include("db.php");
echo "[";
$no = 1;

//$de = mysqli_query($koneksi,"select * from tb_actualite order by id_actualite //desc");

//while($de2 = mysqli_fetch_array($de)){
   
   
$sql_get_actualite = "select * from tb_menu where jenis = 'indonesie' order by id_menu asc";
$koneksi->set_charset("utf8");
$query = $koneksi->query($sql_get_actualite);


while ($de2 = $query->fetch_assoc()) {
   
   
   
   
    $name = $de2['deskripsi'];
    $str = ['é','à','L'];
    $rplc =['e','a','L'];
    
    $hasil = str_replace("$str","$rplc",$name);
    $hasil2 = str_replace(['L','é','&'],['L','é','&'],$de2['deskripsi']);


if($no == 1){}else{echo ",";}
?>

  {

    "alt_description": "",
    "user":  {
    "name":"<?php echo $de2['nama_menu'] ?><?php //echo $de2['url'] ?>",
    "long_desc":"<?php echo  $de2['long_desc']  ?>",
    "url":"<?php echo $de2['id_menu'] ?>",
    "bio":"<?php echo  substr($de2['short_desc'],0,150)  ?>",
     
      "regular": "https://ufe-section-indonesie.org/ufeapp/images/menu/<?php echo $de2['gambar2'] ?>"
     
    }
    
    }
<?php $no++;} ?>
    ]
