<?php 

//mysqli_query('SET CHARACTER SET utf8');

mysqli_set_charset('utf8');

header('Content-type: text/html; charset=utf-8');

include("db.php");

echo "[";

$no = 1;

// $de = mysqli_query($koneksi,"select * from tb_activites where id_jenis = '1' order by id_activites desc");



// while($de2 = mysqli_fetch_array($de)){



    $sql_get_activities_artistiques = "select * from tb_halaman_depan limit 1";

    $koneksi->set_charset("utf8");

    $query = $koneksi->query($sql_get_activities_artistiques);

    

    

    while ($de2 = $query->fetch_assoc()) {



    $name = $de2['deskripsi'];

    $str = ['é','à','L'];

    $rplc =['e','a','L'];

    

    $hasil = str_replace("$str","$rplc",$name);

    $hasil2 = str_replace(['L','é','&',':','\n'],['L','é','&','=','<br>'],$de2['judul']);





if($no == 1){}else{echo ",";}



$sd = mysqli_query($koneksi,"select * from tb_educatives limit 1");

$sd2 = mysqli_fetch_array($sd);


$fpp = mysqli_query($koneksi,"select * from tb_tulisan where jenis = 'splash_indo'");
$fpp2 = mysqli_fetch_assoc($fpp);

$desk1 = str_replace('\n',"",$de2['tulisan4']);
$desk2 = str_replace("'","`",$desk1);
$desk3 = str_replace('"',"`",$desk2);
$desk4 = str_replace(str_split('\\/:*?"<>|'), ' ', $desk3);
$desk5 = trim(preg_replace('/\s\s+/', ' ', $desk4));
$desk6 = str_replace("<br>","",$desk5);
$desk7 = str_replace(".","",$desk6);


$tul1 = str_replace('\n',"-enter-",$de2['tulisan19']);
$tul2 = str_replace("'","`",$tul1);
$tul3 = str_replace('"',"-petikdua-",$tul2);
$tul4 = str_replace(str_split('\\/:*?"<>|'), ' ', $tul3);
$tul5 = trim(preg_replace('/\s\s+/', ' ', $tul4));
$tul6 = str_replace("<br>","-enter-",$tul5);
$tul7 = str_replace(".","-titik-",$tul6);

$tull1 = str_replace('\n',"-enter-",$de2['tulisan20']);
$tull2 = str_replace("'","`",$tull1);
$tull3 = str_replace('"',"-petikdua-",$tull2);
$tull4 = str_replace(str_split('\\/:*?"<>|'), ' ', $tull3);
$tull5 = trim(preg_replace('/\s\s+/', ' ', $tull4));
$tull6 = str_replace("<br>","-enter-",$tull5);
$tull7 = str_replace(".","-titik-",$tull6);

$tulll1 = str_replace('\n',"-enter-",$de2['tulisan21']);
$tulll2 = str_replace("'","`",$tulll1);
$tulll3 = str_replace('"',"-petikdua-",$tulll2);
$tulll4 = str_replace(str_split('\\/:*?"<>|'), ' ', $tulll3);
$tulll5 = trim(preg_replace('/\s\s+/', ' ', $tulll4));
$tulll6 = str_replace("<br>","-enter-",$tulll5);
$tulll7 = str_replace(".","-titik-",$tulll6);



$desktujuh1 = str_replace('\n',"",$de2['tulisan7']);
$desktujuh2 = str_replace("'","`",$desktujuh1);
$desktujuh3 = str_replace('"',"`",$desktujuh2);
$desktujuh4 = str_replace(str_split('\\/:*?"<>|'), ' ', $desktujuh3);
$desktujuh5 = trim(preg_replace('/\s\s+/', ' ', $desktujuh4));
$desktujuh6 = str_replace("<br>","",$desktujuh5);
$desktujuh7 = str_replace(".","",$desktujuh6);

$desksembilan1 = str_replace('\n',"",$de2['tulisan9']);
$desksembilan2 = str_replace("'","`",$desksembilan1);
$desksembilan3 = str_replace('"',"`",$desksembilan2);
$desksembilan4 = str_replace(str_split('\\/:*?"<>|'), ' ', $desksembilan3);
$desksembilan5 = trim(preg_replace('/\s\s+/', ' ', $desksembilan4));
$desksembilan6 = str_replace("<br>","",$desksembilan5);
$desksembilan7 = str_replace(".","",$desksembilan6);


$desksepuluh1 = str_replace('\n',"",$de2['tulisan10']);
$desksepuluh2 = str_replace("'","`",$desksepuluh1);
$desksepuluh3 = str_replace('"',"`",$desksepuluh2);
$desksepuluh4 = str_replace(str_split('\\/:*?"<>|'), ' ', $desksepuluh3);
$desksepuluh5 = trim(preg_replace('/\s\s+/', ' ', $desksepuluh4));
$desksepuluh6 = str_replace("<br>","",$desksepuluh5);
$desksepuluh7 = str_replace(".","",$desksepuluh6);



$deskk1 = str_replace('\n',"",$de2['tulisan5']);
$deskk2 = str_replace("'","`",$deskk1);
$deskk3 = str_replace('"',"`",$deskk2);
$deskk4 = str_replace(str_split('\\/:*?"<>|'), ' ', $deskk3);
$deskk5 = trim(preg_replace('/\s\s+/', ' ', $deskk4));
$deskk6 = str_replace("<br>","",$deskk5);
$deskk7 = str_replace(".","",$deskk6);


$deskkz1 = str_replace('\n',"",$fpp2['tulisan2']);
$deskkz2 = str_replace("'","`",$deskkz1);
$deskkz3 = str_replace('"',"`",$deskkz2);
$deskkz4 = str_replace(str_split('\\/:*?"<>|'), ' ', $deskkz3);
$deskkz5 = trim(preg_replace('/\s\s+/', ' ', $deskkz4));
$deskkz6 = str_replace("<br>","",$deskkz5);
$deskkz7 = str_replace(".","",$deskkz6);

?>



  {



    "alt_description": "",

    "user":  {

        "name": "<?php echo $desk7; ?>",
      "location": "tes",
      "url": "https://unilabperdana.com",
      "bio": "<?php echo $deskkz7 ?>",
      "id_jenis": "3",
      "id_activites": "8",
      "regular": "https://ufe-section-indonesie.org/ufeapp/images/activites/creche_1.png",
      "email": "",
      "id_educatives": "1",
      "gambar1": "logo_crehe.jpg",
      "judul1": "Crèche Croque La Vie 3",
      "deskripsi1": "<?php echo $deskk7; ?>",
      "gambar2": "creche2.jpg",
      "deskripsi2": "<?php echo $desksepuluh7; ?>",
      "judul2": "<?php echo $desktujuh7; ?>",
      "deskripsi3": "Chez UFE, vous pouvez vous bénéficiez des certaines installations afin de vous faire comme chez soi.",
      "judul3": "<?php echo $desksembilan7; ?>",
      "tulisan19":"<?php echo $tul7 ?>",
      "tulisan20":"<?php echo $tull7 ?>",
      "tulisan21":"<?php echo $tulll7 ?>",

      "tanggal": "Package B (07H45 - 15H30)"
    }

    

    }

<?php $no++;} ?>

    ]

