<?php

require_once('connection2.php');

$result = array();


$query = mysqli_query($CON2,"SELECT * FROM tb_artikel ORDER BY id DESC");
while($row = mysqli_fetch_assoc($query)){
  $result[] = $row;
}

echo json_encode(array('result'=>$result));

?>
