<?php 
include('db.php');
$nd = mysqli_query($koneksi,"select * from user where username = '$_GET[e]' and token_push = '$_GET[t]'");
if(mysqli_num_rows($nd) == 0){
echo "Access denied";
}else{
?>
<html lang="fr"><head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title>UFE Section Indonésie</title>
<meta name="description" content="">
<meta name="author" content="-">

<link rel="stylesheet" href="../cs/css/bootstrap.min.css">
<link href="../cs/css/animate.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="../cs/css/styles.css">
<link href="../cs/font/css/font-awesome.min.css" rel="stylesheet">
</head>

<body style="background: url(https://www.ufe-section-indonesie.org/cs/images/img3.jpg);
  background-repeat: no-repeat;
  background-size: cover;">




<section id="home">
  <div class="banner-container">
    <div class="container">
      <div class="row">
        <div>  </div>
      </div>
      <div class="heading text-center">
		<br><br><br><br><br>
		<img src="../cs/images/logo_ufe.png" width="50%" style="max-width:200px;" alr="logo">
       <center>
           <fieldset style="padding:30px;margin-top:30px;width:90%;max-width:800px;border:1px #d1d1d1 solid;border-radius:10px;background-color:white;">
               
               
               
               
               <table style="width:100%;">
                   <tr><td style="text-align:left;font-size:25px;">
                       <?php
                       
               $nd = mysqli_query($koneksi,"select * from user where username = '$_GET[e]' and token_push = '$_GET[t]'");
               $nd2 = mysqli_fetch_assoc($nd);
               
               if(empty($nd2['first_name'])){
               
                       echo $_GET['e'];
               }else{
                     echo $nd2['first_name']." ".$nd2['second_name'];
               }       
                       ?></td></tr>
               </table>
               
                 <table id="tb5" style="width:100%;margin-top:20px;">
                   <tr><td style="text-align:left;">Phone Number:</td></tr>
               </table>
               
          
               
               
                 <table id="tb6" style="width:100%;margin-top:10px;">
                   <tr><td style="text-align:left;">
                     
                       <input style="border-radius:10px;width:100%;height:35px;
                       border:1px #707070 solid;padding:5px 10px 5px 10px;"  
                   value="<?php echo $nd2['mobile'] ?>" type="number"
                    id="mobilee"/>
                    
                    </td></tr>
               </table>
               
                <table id="tb4" style="width:100%;margin-top:20px;">
                   <tr><td style="text-align:left;">Reason:</td></tr>
               </table>
               
               <?php 
               if(isset($_POST['submitt'])){
                   ?>
                   <script>
                       alert("<?php echo $_POST['emaill'] ?>");
                   </script>
                   
                   <?php
               }
               ?>
               
               <form method="POST">
                   <input style="display:none;" name="emaill" id="emaill" value="<?php echo $_GET['e'] ?>" />
                <table id="tb1" style="width:100%;margin-top:10px;">
                   <tr><td style="text-align:left;"><textarea id="reasonn" name="reasonn" style="border-radius:10px;padding:5px;10px;5px;10px;width:100%;height:200px;" required></textarea></td></tr>
               </table>
               
                 <table id="tb2" style="display:none;width:100%;margin-top:20px;">
                   <tr><td style="text-align:left;color:blue;">Thankyou, Pesan Anda telah kami simpan. Ikuti perkembangan selanjutnya melalui informasi yang kami kirim via email</td></tr>
               </table>
               
               
                <table id="tb3" style="width:100%;margin-top:50px;">
                   <tr><td style="text-align:right;"><span 
                  onclick="subb()"
                   style="cursor:pointer;
                   border:1px blue solid;padding:5px 20px 5px 20px;
                   margin-right:2px;color:blue;border-radius:5px;">SUBMIT</span></td></tr>
               </table>
               
               <script>
                   function subb(){
                  
                  
                  if(document.getElementById("reasonn").value == ""){
                      alert("Reason cannot be empty");
                  }else if(document.getElementById("mobilee").value == ""){
                       alert("Phone number cannot be empty");
                  }else{
                  
                        $.post("confirmer_post.php",
  {
    email: document.getElementById("emaill").value,
    mobile: document.getElementById("mobilee").value,
    
    text: document.getElementById("reasonn").value,
    token: "<?php echo $_GET['t']; ?>"
  },
  function(data, status){
      if(data == "success"){
          document.getElementById("reasonn").value = "";
          document.getElementById("tb1").style.display = "none";
        document.getElementById("tb3").style.display = "none";
            document.getElementById("tb4").style.display = "none";
        document.getElementById("tb5").style.display = "none";
    document.getElementById("tb6").style.display = "none";              
        document.getElementById("tb2").style.display = "inherit";
      }else{
    alert("Error");
      }
  });
                  }
                   }
               </script>
               
               </form>
           </fieldset>
       </center>
    </div>
  </div>
</section> 

<!--[if lte IE 8]><script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script><![endif]--> 
<script src="../cs/js/modernizr-latest.js"></script> 
<script src="../cs/js/jquery-1.8.2.min.js" type="text/javascript"></script> 
<script src="../cs/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="../cs/js/jquery.nav.js" type="text/javascript"></script> 
<script src="../cs/js/waypoints.js"></script> 
<script src="../cs/js/Backstretch.js" type="text/javascript"></script> 
<script src="../cs/js/custom.js" type="text/javascript"></script> 
<script type="text/javascript" src="../cs/js/jquery.countdown.js"></script>


</body></html>
<?php } ?>