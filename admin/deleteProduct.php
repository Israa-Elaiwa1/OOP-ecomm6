<?php
$conn = new mysqli("localhost","root","","ecomm6");
include("manageproducts.php");
$obj1 = new product();
$id   = $_GET['id'];
$obj1->deleteProduct($conn,$id);
?>
