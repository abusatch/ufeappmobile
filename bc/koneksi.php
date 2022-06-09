<?php
// mengkoneksikan ke database
$server = "localhost";
$server_username = "t49403_admufeapp";
$server_password = "sovereignplaza";
$database_name =  "t49403_ufeapp";

$conn = new Mysqli($server, $server_username, $server_password, $database_name);
mysqli_select_db($conn,$database_name);