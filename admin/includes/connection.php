
<?php
$conn   = new mysqli ("localhost","root","","ecomm6");
if($conn->connect_error)  //mysql func to check connection result
{
  echo("can't connect to the server!!!");
  die;
}
 ?>
