<?php

echo '[';
include('db.php');
$no = 1;


if(!empty($_GET['jenis'])){
$ew = mysqli_query($koneksi,"select * from tb_menu where jenis = '$_GET[jenis]' ");
}else{
$ew = mysqli_query($koneksi,"select * from tb_menu where jenis = 'DEMARCHES' ");
}
while($ew2 = mysqli_fetch_array($ew)){
if($no == 1){}else{echo ",";}

$desk1 = str_replace('\n',"",$ew2['short_desc']);
$desk2 = str_replace("'","`",$desk1);
$desk3 = str_replace('"',"`",$desk2);
$desk4 = str_replace(str_split('\\/:*?"<>|'), ' ', $desk3);
$desk5 = trim(preg_replace('/\s\s+/', ' ', $desk4));
$desk6 = str_replace("<br>","",$desk5);
$desk7 = str_replace(".","",$desk6);
?>
{
"id_actualite":"<?php echo $ew2['id_menu'] ?>",
"id_actualite2":"<?php echo $ew2['id_menu'] ?>",
"url":"<?php echo $ew2['url'] ?>",
"gambar":"https://ufe-section-indonesie.org/ufeapp/images/menu/<?php echo $ew2['gambar2'] ?>",

"judul":"<?php echo $ew2['nama_menu'] ?>",
"tree":[
    <?php 
    $nooo = 1;
        $nk = mysqli_query($koneksi,"select * from tb_demar2 where id_kategori = '$ew2[id_menu]' and visibility = '1'");
        while($nk2 = mysqli_fetch_array($nk)){
            if($nooo == 1){}else{echo ",";}
        ?>
           { "judull" : "<?php echo $nk2['judul'] ?>",
            "gambarr" : "https://ufe-section-indonesie.org/ufeapp/images/menu/<?php echo $nk2['gambar'] ?>",
            "menu_bg" : "<?php echo $nk2['menu_bg'] ?>",
            "menu_drop" : "<?php echo $nk2['menu_drop1'] ?>",
            "id_kategorii" : "<?php echo $nk2['id_kategori'] ?>"
        }
        
           <?php $nooo++;} ?>
                    ],
"deskripsi":"<?php echo $desk7; ?>"

}
<?php $no++;}

echo "]";
?>