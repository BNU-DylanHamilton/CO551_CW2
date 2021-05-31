<?php
  
header("Content-type:image/jpeg");

include("_includes/dbconnect.inc");

    
    $sql = "SELECT studentimage FROM student WHERE studentid='" . $_GET['id'] ."';";
	
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  
  $jpg = $row['studentimage'];

  echo $jpg;

?>