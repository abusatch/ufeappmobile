<?php
include('db.php');

$fr = mysqli_query($koneksi,"select * from user where username = '$_POST[email]' limit 1");
$fr2 = mysqli_fetch_array($fr); 


$wd = mysqli_query($koneksi,"select * from tb_menu where id_menu = '$_POST[idd]'");
$wd2 = mysqli_fetch_array($wd);
$wd3 = mysqli_query($koneksi,"select * from tb_background where keterangan = 'splash_demar'");
$wd4 = mysqli_fetch_array($wd3);


$ht = mysqli_query($koneksi,"select * from tb_halaman_depan");
$ht2 = mysqli_fetch_assoc($ht);

$desk1 = str_replace('\n',"",$ht2['tulisan3']);
$desk2 = str_replace("'","`",$desk1);
$desk3 = str_replace('"',"`",$desk2);
$desk4 = str_replace(str_split('\\/:*?"<>|'), ' ', $desk3);
$desk5 = trim(preg_replace('/\s\s+/', ' ', $desk4));
$desk6 = str_replace("<br>","",$desk5);
$tulisann3 = str_replace(".","",$desk6);

$tulisann1 = str_replace("&petiksatu&","'",$fr2['tulisan1']);
$tulisann2 = str_replace("&petiksatu&","'",$fr2['tulisan2']);
//$tulisann3 = str_replace("&petiksatu&","'",$fr2['tulisan3']);
$tulisann4 = str_replace("&petiksatu&","'",$fr2['tulisan4']);
$tulisann5 = str_replace("&petiksatu&","'",$fr2['tulisan5']);
$tulisann6 = str_replace("&petiksatu&","'",$fr2['tulisan6']);
$tulisann7 = str_replace("&petiksatu&","'",$fr2['tulisan7']);
$tulisann8 = str_replace("&petiksatu&","'",$fr2['tulisan8']);
$tulisann9 = str_replace("&petiksatu&","'",$fr2['tulisan9']);
$tulisann10 = str_replace("&petiksatu&","'",$fr2['tulisan10']);
$tulisann11 = str_replace("&petiksatu&","'",$fr2['tulisan11']);
$tulisann12 = str_replace("&petiksatu&","'",$fr2['tulisan12']);
$tulisann13 = str_replace("&petiksatu&","'",$fr2['tulisan13']);
$tulisann14 = str_replace("&petiksatu&","'",$fr2['tulisan14']);
$tulisann15 = str_replace("&petiksatu&","'",$fr2['tulisan15']);
$tulisann16 = str_replace("&petiksatu&","'",$fr2['tulisan16']);
$tulisann17 = str_replace("&petiksatu&","'",$fr2['tulisan17']);
$tulisann18 = str_replace("&petiksatu&","'",$fr2['tulisan18']);
$tulisann19 = str_replace("&petiksatu&","'",$fr2['tulisan19']);
$tulisann20 = str_replace("&petiksatu&","'",$fr2['tulisan20']);
$tulisann21 = str_replace("&petiksatu&","'",$fr2['tulisan21']);


$bw = mysqli_query($koneksi,"select * from tb_tulisan where jenis = 'slideup'");
$bw2 = mysqli_fetch_assoc($bw);






if($_POST['t'] == "profile"){
 
    
if($_POST['d'] == "compro"){
   $in = mysqli_query($koneksi,"select * from tb_tulisan where jenis = 'company_profile'");
   $in2 = mysqli_fetch_assoc($in);
}else if($_POST['d'] == "list_user"){   
   $in = mysqli_query($koneksi,"select * from tb_tulisan where jenis = 'list_user'");
   $in2 = mysqli_fetch_assoc($in);
}else{
   $in = mysqli_query($koneksi,"select * from tb_tulisan where jenis = 'profile_fragment'");
   $in2 = mysqli_fetch_assoc($in);
   
}

$tsatu1 = str_replace('\n',"",$in2['tulisan1']);
$tsatu2 = str_replace("'","`",$tsatu1);
$tsatu3 = str_replace('"',"`",$tsatu2);
$tsatu4 = str_replace(str_split('\\/:*?"<>|'), ' ', $tsatu3);
$tsatu5 = trim(preg_replace('/\s\s+/', ' ', $tsatu4));
$tsatu6 = str_replace("<br>","",$tsatu5);
$tsatu7 = str_replace(".","",$tsatu6);


$t1 = str_replace('\n',"",$in2['tulisan2']);
$t2 = str_replace("'","`",$t1);
$t3 = str_replace('"',"`",$t2);
$t4 = str_replace(str_split('\\/:*?"<>|'), ' ', $t3);
$t5 = trim(preg_replace('/\s\s+/', ' ', $t4));
$t6 = str_replace("<br>","",$t5);
$t7 = str_replace(".","",$t6);

$t31 = str_replace('\n',"",$in2['tulisan3']);
$t32 = str_replace("'","`",$t31);
$t33 = str_replace('"',"`",$t32);
$t34 = str_replace(str_split('\\/:*?"<>|'), ' ', $t33);
$t35 = trim(preg_replace('/\s\s+/', ' ', $t34));
$t36 = str_replace("<br>","",$t35);
$t37 = str_replace(".","",$t36);

$t41 = str_replace('\n',"",$in2['tulisan4']);
$t42 = str_replace("'","`",$t41);
$t43 = str_replace('"',"`",$t42);
$t44 = str_replace(str_split('\\/:*?"<>|'), ' ', $t43);
$t45 = trim(preg_replace('/\s\s+/', ' ', $t44));
$t46 = str_replace("<br>","",$t45);
$t47 = str_replace(".","",$t46);


$t51 = str_replace('\n',"",$in2['tulisan5']);
$t52 = str_replace("'","`",$t51);
$t53 = str_replace('"',"`",$t52);
$t54 = str_replace(str_split('\\/:*?"<>|'), ' ', $t53);
$t55 = trim(preg_replace('/\s\s+/', ' ', $t54));
$t56 = str_replace("<br>","",$t55);
$t57 = str_replace(".","",$t56);


$t61 = str_replace('\n',"",$in2['tulisan6']);
$t62 = str_replace("'","`",$t61);
$t63 = str_replace('"',"`",$t62);
$t64 = str_replace(str_split('\\/:*?"<>|'), ' ', $t63);
$t65 = trim(preg_replace('/\s\s+/', ' ', $t64));
$t66 = str_replace("<br>","",$t65);
$t67 = str_replace(".","",$t66);


$t71 = str_replace('\n',"",$in2['tulisan7']);
$t72 = str_replace("'","`",$t71);
$t73 = str_replace('"',"`",$t72);
$t74 = str_replace(str_split('\\/:*?"<>|'), ' ', $t73);
$t75 = trim(preg_replace('/\s\s+/', ' ', $t74));
$t76 = str_replace("<br>","",$t75);
$t77 = str_replace(".","",$t76);


$t81 = str_replace('\n',"",$in2['tulisan8']);
$t82 = str_replace("'","`",$t81);
$t83 = str_replace('"',"`",$t82);
$t84 = str_replace(str_split('\\/:*?"<>|'), ' ', $t83);
$t85 = trim(preg_replace('/\s\s+/', ' ', $t84));
$t86 = str_replace("<br>","",$t85);
$t87 = str_replace(".","",$t86);


$t91 = str_replace('\n',"",$in2['tulisan9']);
$t92 = str_replace("'","`",$t91);
$t93 = str_replace('"',"`",$t92);
$t94 = str_replace(str_split('\\/:*?"<>|'), ' ', $t93);
$t95 = trim(preg_replace('/\s\s+/', ' ', $t94));
$t96 = str_replace("<br>","",$t95);
$t97 = str_replace(".","",$t96);


$t101 = str_replace('\n',"",$in2['tulisan10']);
$t102 = str_replace("'","`",$t101);
$t103 = str_replace('"',"`",$t102);
$t104 = str_replace(str_split('\\/:*?"<>|'), ' ', $t103);
$t105 = trim(preg_replace('/\s\s+/', ' ', $t104));
$t106 = str_replace("<br>","",$t105);
$t107 = str_replace(".","",$t106);


$t111 = str_replace('\n',"",$in2['tulisan11']);
$t112 = str_replace("'","`",$t111);
$t113 = str_replace('"',"`",$t112);
$t114 = str_replace(str_split('\\/:*?"<>|'), ' ', $t113);
$t115 = trim(preg_replace('/\s\s+/', ' ', $t114));
$t116 = str_replace("<br>","",$t115);
$t117 = str_replace(".","",$t116);

$t121 = str_replace('\n',"",$in2['tulisan12']);
$t122 = str_replace("'","`",$t121);
$t123 = str_replace('"',"`",$t122);
$t124 = str_replace(str_split('\\/:*?"<>|'), ' ', $t123);
$t125 = trim(preg_replace('/\s\s+/', ' ', $t124));
$t126 = str_replace("<br>","",$t125);
$t127 = str_replace(".","",$t126);


$t131 = str_replace('\n',"",$in2['tulisan13']);
$t132 = str_replace("'","`",$t131);
$t133 = str_replace('"',"`",$t132);
$t134 = str_replace(str_split('\\/:*?"<>|'), ' ', $t133);
$t135 = trim(preg_replace('/\s\s+/', ' ', $t134));
$t136 = str_replace("<br>","",$t135);
$t137 = str_replace(".","",$t136);


$t141 = str_replace('\n',"",$in2['tulisan14']);
$t142 = str_replace("'","`",$t141);
$t143 = str_replace('"',"`",$t142);
$t144 = str_replace(str_split('\\/:*?"<>|'), ' ', $t143);
$t145 = trim(preg_replace('/\s\s+/', ' ', $t144));
$t146 = str_replace("<br>","",$t145);
$t147 = str_replace(".","",$t146);


$t151 = str_replace('\n',"",$in2['tulisan15']);
$t152 = str_replace("'","`",$t151);
$t153 = str_replace('"',"`",$t152);
$t154 = str_replace(str_split('\\/:*?"<>|'), ' ', $t153);
$t155 = trim(preg_replace('/\s\s+/', ' ', $t154));
$t156 = str_replace("<br>","",$t155);
$t157 = str_replace(".","",$t156);


$t161 = str_replace('\n',"",$in2['tulisan16']);
$t162 = str_replace("'","`",$t161);
$t163 = str_replace('"',"`",$t162);
$t164 = str_replace(str_split('\\/:*?"<>|'), ' ', $t163);
$t165 = trim(preg_replace('/\s\s+/', ' ', $t164));
$t166 = str_replace("<br>","",$t165);
$t167 = str_replace(".","",$t166);

$t171 = str_replace('\n',"",$in2['tulisan17']);
$t172 = str_replace("'","`",$t171);
$t173 = str_replace('"',"`",$t172);
$t174 = str_replace(str_split('\\/:*?"<>|'), ' ', $t173);
$t175 = trim(preg_replace('/\s\s+/', ' ', $t174));
$t176 = str_replace("<br>","",$t175);
$t177 = str_replace(".","",$t176);


$t181 = str_replace('\n',"",$in2['tulisan18']);
$t182 = str_replace("'","`",$t181);
$t183 = str_replace('"',"`",$t182);
$t184 = str_replace(str_split('\\/:*?"<>|'), ' ', $t183);
$t185 = trim(preg_replace('/\s\s+/', ' ', $t184));
$t186 = str_replace("<br>","",$t185);
$t187 = str_replace(".","",$t186);


$t191 = str_replace('\n',"",$in2['tulisan19']);
$t192 = str_replace("'","`",$t191);
$t193 = str_replace('"',"`",$t192);
$t194 = str_replace(str_split('\\/:*?"<>|'), ' ', $t193);
$t195 = trim(preg_replace('/\s\s+/', ' ', $t194));
$t196 = str_replace("<br>","",$t195);
$t197 = str_replace(".","",$t196);



$bh = mysqli_query($koneksi,"select * from tb_halaman_depan");
$bh2 = mysqli_fetch_assoc($bh);


   mysqli_query($koneksi,"insert into tes_pesan (isipesan, keterangan) values ('ps1111', 'ps2222')");
?>


[
{
    "success":1,
 "tulisan1":"<?php echo $fr2['first_name']." ".$fr2['second_name'] ?>",
    "tulisan2":"<?php echo $fr2['level']; ?>",
    "tulisan3":"<?php echo $tsatu7; ?>",
    "tulisan4":"<?php echo $t7; ?>",
    "tulisan5":"<?php echo $t37; ?>",    
    "tulisan6":"<?php echo $t47; ?>",
    "tulisan7":"<?php echo $t57; ?>",
    "tulisan8":"<?php echo $t67; ?>",
    "tulisan9":"<?php echo $t77; ?>",
    "tulisan10":"<?php echo $t87; ?>",
    "tulisan11":"<?php echo $t97; ?>",
    "tulisan12":"<?php echo $t107; ?>",
    "tulisan13":"<?php echo $t117; ?>",
    "tulisan14":"<?php echo $t127; ?>",
    "tulisan15":"<?php echo $t137; ?>",
    "tulisan16":"<?php echo $t147; ?>",
    "tulisan17":"<?php echo $t157; ?>",
    "tulisan18":"<?php echo $fr2['level']; ?>",
    "tulisan19":"<?php echo $t197; ?>",
    "tulisan20":"<?php echo $erg2['linkweb'] ?>",
    "tulisan21":"<?php echo $t197; ?>",
        "tulisan31":"<?php echo $bh2['tulisan12'] ?>",
    "tulisan32":"<?php echo $bh2['tulisan13'] ?>",
    "tulisan33":"<?php echo $bh2['tulisan14'] ?>",
    "tulisan34":"<?php echo $bh2['tulisan15'] ?>",
    "tulisan35":"<?php echo $bh2['tulisan16'] ?>",
    "tulisan36":"<?php echo $bh2['tulisan17'] ?>",
    "tulisan37":"<?php echo $bh2['tulisan18'] ?>",
        "ket_verifikasi":"<?php echo  $fr2['verifikasi_admin'] ?>",
    "bg":"https://ufe-section-indonesie.org/ufeapp/images/propic/<?php echo $fr2['propic'] ?>",
     "bg2":"https://ufe-section-indonesie.org/ufeapp/admin/bg/<?php echo $wd4['gambar'] ?>",
     "logo":"https://ufe-section-indonesie.org/ufeapp/images/propic/<?php echo $fr2['logo'] ?>",    
     "cover":"https://ufe-section-indonesie.org/ufeapp/images/propic/<?php echo $fr2['cover'] ?>"
    }
    ]
<?php
}else{

$nfd = mysqli_query($koneksi,"select * from tb_tulisan where jenis = 'keterangan_device'");
$nfd2 = mysqli_fetch_assoc($nfd);

$owd = mysqli_query($koneksi,"select * from tb_version_code");
$owd2 = mysqli_fetch_assoc($owd);

$bh = mysqli_query($koneksi,"select * from tb_halaman_depan");
$bh2 = mysqli_fetch_assoc($bh);


date_default_timezone_set('Asia/Jakarta');
$hariini = date('Y-m-d');

$erg = mysqli_query($koneksi,"select a.judul, a.visibility,
a.id_member_vip, b.idUser, a.keterangan, a.deskripsi, b.masa_aktif, a.tanggal,
a.deskripsi, a.gambar

from tb_template a, user b where
a.id_member_vip = b.idUser and
a.keterangan = 'release' and a.visibility = '1' and b.masa_aktif >= '$hariini' order by a.tanggal desc");
$erg2 = mysqli_fetch_assoc($erg);


$t171 = str_replace('\n',"",$erg2['judul']);
$t172 = str_replace("'","`",$t171);
$t173 = str_replace('"',"`",$t172);
$t174 = str_replace(str_split('\\/:*?"<>|'), ' ', $t173);
$t175 = trim(preg_replace('/\s\s+/', ' ', $t174));
$t176 = str_replace("<br>","",$t175);
$t177 = str_replace(".","",$t176);


$t181 = str_replace('\n',"",$in2['tulisan18']);
$t182 = str_replace("'","`",$t181);
$t183 = str_replace('"',"`",$t182);
$t184 = str_replace(str_split('\\/:*?"<>|'), ' ', $t183);
$t185 = trim(preg_replace('/\s\s+/', ' ', $t184));
$t186 = str_replace("<br>","",$t185);
$t187 = str_replace(".","",$t186);


$t191 = str_replace('\n',"",$erg2['deskripsi']);
$t192 = str_replace("'","`",$t191);
$t193 = str_replace('"',"`",$t192);
$t194 = str_replace(str_split('\\/:*?"<>|'), ' ', $t193);
$t195 = trim(preg_replace('/\s\s+/', ' ', $t194));
$t196 = str_replace("<br>","",$t195);
$t197 = str_replace(".","",$t196);


mysqli_query($koneksi,"insert into tes_pesan (isipesan, keterangan) values ('ps11', 'ps22')");


$erg = mysqli_query($koneksi,"select a.judul, a.visibility,
a.id_member_vip, b.idUser, a.keterangan, a.deskripsi, b.masa_aktif, a.tanggal,
a.deskripsi, a.gambar, a.linkweb

from tb_template a, user b where
a.id_member_vip = b.idUser and
a.keterangan = 'release' and a.visibility = '1' and b.masa_aktif >= '$hariini' order by a.tanggal desc");
$erg2 = mysqli_fetch_assoc($erg);
?>
[
{
    "success":1,
 "tulisan1":"<?php echo ucfirst(strtolower($bw2['tulisan1'])); ?>",
    "tulisan2":"<?php echo ucfirst(strtolower($bw2['tulisan2'])); ?>",
    "tulisan3":"<?php echo $tulisann3 ?>",
    "tulisan4":"<?php echo ucfirst(strtolower($bw2['tulisan3'])); ?>",
    "tulisan5":"<?php echo ucfirst(strtolower($bw2['tulisan4'])); ?>",    
    "tulisan6":"<?php echo $bw2['tulisan5'] ?>",
    "tulisan7":"<?php echo $bw2['tulisan6'] ?>",
    "tulisan8":"<?php echo $bw2['tulisan7'] ?>",
    "tulisan9":"<?php echo $bw2['tulisan8'] ?>",
    "tulisan10":"<?php echo $fr2['propic']; ?>",
    "tulisan11":"<?php echo $fr2['device_id']; ?>",
    "tulisan12":"<?php echo $nfd2['tulisan1'] ?>",
    "tulisan13":"<?php echo $owd2['version_code'] ?>",
    "tulisan14":"<?php echo $bh2['tulisan2']; ?>",
    "tulisan15":"<?php echo $bh2['tulisan3']; ?>",
    "tulisan16":"<?php echo $bh2['tulisan11']; ?>",
    "tulisan17":"<?php echo $t177; ?>",
    "tulisan18":"https://ufe-section-indonesie.org/ufeapp/images/actualite/<?php echo $erg2['gambar']; ?>",
    "tulisan19":"<?php echo $t197; ?>",
    "tulisan20":"<?php echo $erg2['linkweb'] ?>",
    "tulisan21":"",
    
    "tulisan31":"<?php echo $bh2['tulisan12'] ?>",
    "tulisan32":"<?php echo $bh2['tulisan13'] ?>",
    "tulisan33":"<?php echo $bh2['tulisan14'] ?>",
    "tulisan34":"<?php echo $bh2['tulisan15'] ?>",
    "tulisan35":"<?php echo $bh2['tulisan16'] ?>",
    "tulisan36":"<?php echo $bh2['tulisan17'] ?>",
    "tulisan37":"<?php echo $bh2['tulisan18'] ?>",
    "ket_verifikasi":"<?php echo  $fr2['verifikasi_admin'] ?>",
    
    "bg":"https://ufe-section-indonesie.org/ufeapp/images/propic/<?php echo $fr2['propic'] ?>",
     "bg2":"https://ufe-section-indonesie.org/ufeapp/admin/bg/<?php echo $wd4['gambar'] ?>"    
    }
    ]
      <?php } ?>