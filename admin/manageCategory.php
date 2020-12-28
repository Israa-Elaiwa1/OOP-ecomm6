
<?php
$conn   = new mysqli ("localhost","root","","ecomm6");
class category{

public function insert($conn,$n,$d,$i){
  $create="insert into category (cat_name ,cat_desc, cat_img)
 values('$n','$d','$i') ";
 $conn->query($create);
  }

public function deleteCategory($conn,$ID){
$query="delete from category where cat_id='$ID'";
$conn->query($query);
 }
}
$object = new category();
if (isset($_POST['submit'])) {
  $category_name        = $_POST['categoryName'];
  $category_description = $_POST['categoryDescription'];
  $category_image       = $_FILES['categoryImage']['name'];
  $tmpName              = $_FILES['categoryImage']['tmp_name'];
  $path                 = 'images/';
  move_uploaded_file($tmpName, $path.$category_image);
  $object->insert($conn,$category_name,$category_description,$category_image);
}
include('includes/adminHeader.php');
?>



            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Manage Category</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Create Category</h3>
                                        </div>
                                        <hr>
                                        <form action="manageCategory.php" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="categoryName" class="control-label mb-1">Category Name</label>
                                                <input name="categoryName" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="categoryDescription" class="control-label mb-1">Category Description</label>
                                                <input name="categoryDescription" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="categoryImage" class="control-label mb-1">Category Image</label>
                                                <input name="categoryImage" type="file" class="form-control">
                                            </div>


                                            <div>
                                                <button type="submit" class="btn btn-lg btn-info btn-block" name="submit">
                                                  Create Category
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
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $select = "select * from category";
                                      $result = $conn->query($select);
                                      while( $fetch= $result->fetch_assoc())
                                      {
                                        echo "<tr>";
                                        echo "<td>{$fetch['cat_id']}</td>";
                                        echo "<td>{$fetch['cat_name']}</td>";
                                        echo "<td>{$fetch['cat_desc']}</td>";
                                        echo "<td><img src = 'images/{$fetch['cat_img']}'  width='100' height='100'/></td>";
                                        echo "<td><a href='editCategory.php?id={$fetch['cat_id']}' class='btn btn-info'>Edit</a></td>";
                                        echo "<td><a href='deleteCategory.php?id={$fetch['cat_id']}' class='btn btn-danger'>Delete</a></td>";
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


          <?php include('includes/adminFooter.php') ?>
