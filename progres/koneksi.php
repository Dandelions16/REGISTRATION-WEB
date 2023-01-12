<?php
$con = mysqli_connect("localhost","root","","si");

// check connection
if(mysqli_connect_errno()){
  echo "Failed to connect MySQl:" . mysqli_connect_errno();
}
?>