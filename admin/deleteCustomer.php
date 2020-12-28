<?php
$conn = new mysqli("localhost","root","","ecomm6");
include("manageCustomers.php");
$obj1 = new customer();
$id   = $_GET['id'];
$obj1->deleteCustomer($conn,$id);
 ?>
