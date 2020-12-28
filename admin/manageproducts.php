
<?php
$conn   = new mysqli ("localhost","root","","ecomm6");
class product{

public function insert($conn,$n,$d,$p,$q,$ci,$i){
  $create="insert into product (productName ,productDesc, productPrice, quantity,catID,productImage)
           values('$n','$d','$p','$q','$ci','$i') ";
  $conn->query($create);
}

public function deleteProduct($conn,$ID){
  $query="delete from product where productId='$ID'";
  $conn->query($query);
}
}
$object = new product();
if (isset($_POST['submit'])) {
  $product_name        = $_POST['productName'];
  $product_description = $_POST['productDescription'];
  $product_price       = $_POST['productPrice'];
  $product_quantity    = $_POST['productQuantity'];
  $catName             = $_POST['select_option'];
  $product_image       = $_FILES['productImage']['name'];
  $tmpName             = $_FILES['productImage']['tmp_name'];
  $path                = 'images/';
  move_uploaded_file($tmpName, $path.$product_image);

  $query2   = "select cat_id from category where  cat_name = '$catName' ";  //getting category id by it's name
  $result2  = $conn->query($query2);
  $fetch2   = $result2->fetch_assoc();
  $cats     = $fetch2['cat_id'];
  $object->insert($conn,$product_name,$product_description,$product_price,$product_quantity,$cats,$product_image);
}
include('includes/adminHeader.php');

?>

            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Manage Product</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Create Product</h3>
                                        </div>
                                        <hr>
                                        <form action="manageproducts.php" method="post"  enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="productName" class="control-label mb-1">Product Name</label>
                                                <input name="productName" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="productDescription" class="control-label mb-1">Product Description</label>
                                                <input name="productDescription" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="productPrice" class="control-label mb-1">Product Price</label>
                                                <input name="productPrice" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="productQuantity" class="control-label mb-1">Product Quantity</label>
                                                <input name="productQuantity" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="productImage" class="control-label mb-1">Product Image</label>
                                                <input name="productImage" type="file" class="form-control">
                                            </div>


                                            <!-- getting category names from table category -->
                                            <div class="form-group">
                                            <select class= "btn btn-secondary" name = "select_option">
                                              <?php
                                              $query1   = "select * from category ";
                                              $result1  = $conn->query($query1);
                                              while( $fetch1   = $result1->fetch_assoc())
                                              {
                                                echo "<option> {$fetch1['cat_name']}</option>";
                                              }
                                              ?>
                                            </select>
                                             </div>

                                            <div>
                                                <button type="submit" class="btn btn-lg btn-info btn-block" name="submit">
                                                  Create Product
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
                                            <th>Name</th>
                                            <th>product Description</th>
                                            <th>product Price</th>
                                            <th>product Quantity</th>
                                            <th>product Image</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php

                                      $select  = "select * from product";
                                      $result  = $conn->query($select);
                                      while( $fetch=$result->fetch_assoc())
                                      {
                                        echo "<tr>";
                                        echo "<td>{$fetch['productId']} </td>";
                                        echo "<td>{$fetch['productName'] }</td>";
                                        echo "<td>{$fetch['productDesc']} </td>";
                                        echo "<td>{$fetch['productPrice'] }</td>";
                                        echo "<td>{$fetch['quantity']} </td>";
                                        echo "<td><img src ='images/{$fetch['productImage']}' width='100' height='120' /> </td>";
                                        echo "<td><a href='editProduct.php?id={$fetch['productId']}' class='btn btn-info'>Edit</a></td>";
                                        echo "<td><a href='deleteProduct.php?id={$fetch['productId']}' class='btn btn-danger'>Delete</a> </td>";
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
