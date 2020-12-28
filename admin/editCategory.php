
<?php
$conn   = new mysqli ("localhost","root","","ecomm6");
class editCategory{
  public function select($conn){
   $query    = "select * from category where cat_id = {$_GET['id']}";
   $result   = $conn->query($query);
   $select   = $result->fetch_assoc();
   return $select;
    }

  public function update($conn,$n,$d,$i){
   $query  = "update category set cat_name ='$n' ,cat_desc ='$d', cat_img ='$i'
              where cat_id = {$_GET['id']}";
    $result = $conn->query($query);
    if($query){header("location:manageCategory.php");}
   }
}

$obj = new editCategory();
if (isset($_POST['update'])) {
  $category_name        = $_POST['categoryName'];
  $category_description = $_POST['categoryDescription'];
  $category_image       = $_FILES['categoryImage']['name'];
  $tmpName              = $_FILES['categoryImage']['tmp_name'];
  $path                 = 'images/';
  move_uploaded_file($tmpName, $path.$category_image);
  $obj->update($conn,$category_name,$category_description,$category_image);
}
include('includes/adminHeader.php');
?>

            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Update Category</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Update Category</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="categoryName" class="control-label mb-1">Category Name</label>
                                                <input name="categoryName" type="text" class="form-control" value="<?php echo $obj->select($conn)['cat_name']?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="categoryDescription" class="control-label mb-1">Category Description</label>
                                                <input name="categoryDescription" type="text" class="form-control" value="<?php echo $obj->select($conn)['cat_desc']?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="categoryImage" class="control-label mb-1">Category Image</label>
                                                <input name="categoryImage" type="file" class="form-control" value="<?php echo $obj->select($conn)['cat_img']?>">
                                            </div>


                                            <div>
                                                <button type="submit" class="btn btn-lg btn-info btn-block" name="update">
                                                  Update Category
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


          <?php include('includes/adminFooter.php') ?>
