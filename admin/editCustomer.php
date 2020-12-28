
<?php
$conn   = new mysqli ("localhost","root","","ecomm6");
class Customer{
  public function select($conn){
   $query    = "select * from customer where cust_ID = {$_GET['id']}";
   $result   = $conn->query($query);
   $select   = $result->fetch_assoc();
   return $select;
  }

  public function update($conn,$n,$e,$p,$m,$a,$i){
   $query  = "update customer set cust_name ='$n' ,cust_email ='$e',
              cust_password ='$p', cust_mobile ='$m',
              cust_add = '$a', cust_img ='$i'
              where cust_ID = {$_GET['id']}";
    $result = $conn->query($query);
    if($query){header("location:manageCustomers.php");}
  }
}

$obj = new Customer();
if (isset($_POST['submit'])) {
  $customer_name     = $_POST['customerName'];
  $customer_email    = $_POST['customerEmail'];
  $customer_password = $_POST['customerPassword'];
  $customer_mobile   = $_POST['customerMobile'];
  $customer_address  = $_POST['customerAddress'];
  $customer_image    = $_FILES['customerImage']['name'];
  $tmpName           = $_FILES['customerImage']['tmp_name'];
  $path              = 'images/';
  move_uploaded_file($tmpName, $path.$customer_image);
  $obj->update($conn,$customer_name,$customer_email,$customer_password,$customer_mobile,$customer_address,$customer_image);

}
include('includes/adminHeader.php');
?>

            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Update Customer</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Update Customer</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="customerEmail" class="control-label mb-1">Customer Email</label>
                                                <input name="customerEmail" type="text" class="form-control" value="<?php echo $obj->select($conn)['cust_email']?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="customerPassword" class="control-label mb-1">Customer Password</label>
                                                <input name="customerPassword" type="password" class="form-control" value="<?php echo $obj->select($conn)['cust_password']?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="customerName" class="control-label mb-1">Customer Full Name</label>
                                                <input name="customerName" type="text" class="form-control" value="<?php echo $obj->select($conn)['cust_name']?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="customerMobile" class="control-label mb-1">Customer Mobile Number</label>
                                                <input name="customerMobile" type="text" class="form-control" value="<?php echo $obj->select($conn)['cust_mobile']?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="customerAddress" class="control-label mb-1">Customer Address</label>
                                                <input name="customerAddress" type="text" class="form-control" value="<?php echo $obj->select($conn)['cust_add']?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="customerImage" class="control-label mb-1">Customer Image</label>
                                                <input name="customerImage" type="file" class="form-control">
                                            </div>


                                            <div>
                                                <button type="submit" class="btn btn-lg btn-info btn-block" name="submit">
                                                  Update Customer Information
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                          </div>
                      </div>
                   </div>
               </div>


          <?php include('includes/adminFooter.php')      ?>
