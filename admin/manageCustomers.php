
<?php
$conn   = new mysqli ("localhost","root","","ecomm6");
class customer{
public function insert($conn,$n,$e,$p,$m,$a,$i){
  $create="insert into customer (cust_name ,cust_email, cust_password, cust_mobile, cust_add, cust_img)
 values('$n','$e','$p','$m','$a','$i') ";
 $conn->query($create);
  }

public function deleteCustomer($conn,$ID){
$query="delete from customer where cust_ID='$ID'";
$conn->query($query);

  }
}
$object = new customer();
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
  $object->insert($conn,$customer_name,$customer_email,$customer_password,$customer_mobile,$customer_address,$customer_image);
}
include('includes/adminHeader.php');

?>


            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Manage Customer</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Create Customer</h3>
                                        </div>
                                        <hr>
                                        <form action="manageCustomers.php" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="customerEmail" class="control-label mb-1">Customer Email</label>
                                                <input name="customerEmail" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="customerPassword" class="control-label mb-1">Customer Password</label>
                                                <input name="customerPassword" type="password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="customerName" class="control-label mb-1">Customer Full Name</label>
                                                <input name="customerName" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="customerMobile" class="control-label mb-1">Customer Mobile Number</label>
                                                <input name="customerMobile" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="customerAddress" class="control-label mb-1">Customer Address</label>
                                                <input name="customerAddress" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="customerImage" class="control-label mb-1">Customer Image</label>
                                                <input name="customerImage" type="file" class="form-control">
                                            </div>


                                            <div>
                                                <button type="submit" class="btn btn-lg btn-info btn-block" name="submit">
                                                  Add Customer
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                          </div>



                    <div class="row m-t-30">
                        <div class="col-md-12">
                            <!-- DATA TABLE-->
                            <div class="table-responsive m-b-40">
                                <table class="table table-borderless table-data3">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Full name</th>
                                            <th>Email</th>
                                            <th>Mobile Number</th>
                                            <th>Address</th>
                                            <th>Image</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                      <?php
                                      $select = "select * from customer";
                                      $result = $conn->query($select);
                                      while( $fetch = $result->fetch_assoc())
                                      {
                                        echo "<tr>";
                                        echo "<td>{$fetch['cust_ID']}</td>";
                                        echo "<td>{$fetch['cust_name']}</td>";
                                        echo "<td>{$fetch['cust_email']}</td>";
                                        echo "<td>{$fetch['cust_mobile']}</td>";
                                        echo "<td>{$fetch['cust_add']}</td>";
                                        echo "<td><img src = 'images/{$fetch['cust_img']}' height='120' width='100'/></td>";
                                        echo "<td> <a href='editCustomer.php?id={$fetch['cust_ID']}'  class='btn btn-info'> Edit</a></td>";
                                        echo "<td><a href='deleteCustomer.php?id={$fetch['cust_ID']}' class='btn btn-danger'> Delete</a></td>";
                                        echo "</tr>";
                                      }
                                       ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- END DATA TABLE-->
                        </div>
                    </div>
                  </div>
                </div>
              </div>


          <?php include('includes/adminFooter.php')      ?>
