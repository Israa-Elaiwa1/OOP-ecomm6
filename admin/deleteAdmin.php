<?php
$conn = new mysqli("localhost","root","","ecomm6");
include("manageAdmin.php");
$obj1 = new admin();
$id   = $_GET['id'];
$obj1->deleteAdmin($conn,$id);

 ?>
