<?php

require_once('connection.php');

$id = $_GET['id'];

$query = mysqli_query($CON, "DELETE FROM volley_upload WHERE id='$id'");

  if($query){
    echo json_encode(array('message'=>'Data successfully deleted.'));
  }else{
    echo json_encode(array('message'=>'Data failed to delete.'));
  }


?>