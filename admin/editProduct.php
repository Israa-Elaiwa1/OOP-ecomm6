
<?php
$conn   = new mysqli ("localhost","root","","ecomm6");
class editProduct{

  public function select($conn){
   $query    = "select * from product where productId = {$_GET['id']}";
   $result   = $conn->query($query);
   $select   = $result->fetch_assoc();
   return $select;
  }

  public function update($conn,$n,$d,$p,$q,$ci,$i){
   $query  = "update product set productName ='$n' ,productDesc ='$d',
              productPrice ='$p', quantity ='$q',
              catID ='$ci',productImage ='$i'
              where productId = {$_GET['id']}";
    $result = $conn->query($query);
    if($query){header("location:manageproducts.php");}
  }
}

$obj = new editProduct();
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

  $query2   = "select cat_id from category where cat_name = '$catName' ";  //getting category id by it's name
  $result2  = $conn->query($query2);
  $fetch2   = $result2->fetch_assoc();
  $cats     = $fetch2['cat_id'];
  $obj->update($conn,$product_name,$product_description,$product_price,$product_quantity,$cats,$product_image);
}
include('includes/adminHeader.php');

?>


            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Update Product</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Update Product</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="productName" class="control-label mb-1">Product Name</label>
                                                <input name="productName" type="text" class="form-control" value="<?php echo $obj->select($conn)['productName']?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="productDescription" class="control-label mb-1">Product Description</label>
                                                <input name="productDescription" type="text" class="form-control" value="<?php echo $obj->select($conn)['productDesc']?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="productPrice" class="control-label mb-1">Product Price</label>
                                                <input name="productPrice" type="text" class="form-control" value="<?php echo $obj->select($conn)['productPrice']?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="productQuantity" class="control-label mb-1">Product Quantity</label>
                                                <input name="productQuantity" type="text" class="form-control" value="<?php echo $obj->select($conn)['quantity']?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="productImage" class="control-label mb-1">Product Image</label>
                                                <input name="productImage" type="file" class="form-control">
                                            </div>
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
                                                  Update Product
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
