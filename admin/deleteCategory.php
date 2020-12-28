<?php
$conn = new mysqli("localhost","root","","ecomm6");
include("manageCategory.php");
$obj1 = new category();
$id   = $_GET['id'];
$obj1->deleteCategory($conn,$id);
?>
