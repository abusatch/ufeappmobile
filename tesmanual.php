<?php
    $to = "abusatch@gmail.com,it@fratekindo.com,ufe.jakarta@gmail.com";
$subject = "Pemberitahuan Akun";

$message = "
<html>
<head>
<title>UFE Indonésie</title>
</head>
<body>
    <center>
    <fieldset style='text-align:left;border:1px solid #D1D1D1;padding:10px;border-radius:3px;max-width:600px;'>
<table style='width:100%;'>
<tr style='padding:10px 10px 10px 10px;'>
<th style='width:100%;text-align:right;'><img src='https://ufe-section-indonesie.org/pages/wp-content/uploads/2017/11/Asset-2.png' style='width:150px;'/></th>
</tr>
</table>
<table style='width:100%;border-top:1px solid #D1D1D1;margin-top:5px;'>
    <tr>
        <th></th>
    </tr>
    </table>

<p style='font-size:15px;text-align:justify;'><b>Bonjour ".$kg2['username'].",</b> <br><br><br>Terima kasih, tim kami akan mereview permintaan anda, jika permintaan anda diterima, kami akan memberitahukan via email
</p>
<br>
<table style='width:100%;border-top:1px solid #D1D1D1;margin-top:20px;'>
    <tr>
        <th></th>
    </tr>
    </table>
<table style='width:100%;margin-top:5px;'>
<tr><th style='font-size:20px;text-align:left;'>
UFE Section Indonésie</th></tr></table>

<table style='width:100%;'>
<tr><td style='font-size:15px;'>
Jakarta - Indonésie<br>
e-mail: indonesie@ufe.org<br>
site internet: ufe-section-indonesie.org
</td></tr></table>
</fieldset></center>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: UFE Indon\ésie<info@ufe-section-indonesie.org>' . "\r\n";
$headers .= 'Cc: abusatch@gmail.com' . "\r\n";

mail($to,$subject,$message,$headers);


?>