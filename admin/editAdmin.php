
<?php
$conn   = new mysqli ("localhost","root","","ecomm6");
class editAdmin{
  public function select($conn){
   $query    = "select * from admin where admin_id = {$_GET['id']}";
   $result   = $conn->query($query);
   $select   = $result->fetch_assoc();
   return $select;
  }

  public function update($conn,$e,$p,$n,$i){
   $query  = "update admin set admin_email ='$e' ,admin_password ='$p',
              admin_fullname ='$n', admin_image ='$i'
              where admin_id = {$_GET['id']}";
    $result = $conn->query($query);
    if($query){header("location:manageAdmin.php");}
  }
}

$obj = new editAdmin();
if (isset($_POST['submit'])) {
  $adminEmail     = $_POST['adminEmail'];
  $adminPassword  = $_POST['adminPassword'];
  $adminFullName  = $_POST['adminFullName'];
  $imageName    = $_FILES['adminImage']['name'];
  $tmpName      = $_FILES['adminImage']['tmp_name'];
  $path         = 'images/';
  move_uploaded_file($tmpName, $path.$imageName);
  $obj->update($conn,$adminEmail,$adminPassword,$adminFullName,$imageName);
}
include('includes/adminHeader.php');
 ?>

            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Update Admin</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Update Admin</h3>
                                        </div>
                                        <hr>
                                        <form action="" method="post" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label for="adminEmail" class="control-label mb-1">Admin Email</label>
                                                <input name="adminEmail" type="text" class="form-control" value="<?php echo $obj->select($conn)['admin_email']?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="adminPassword" class="control-label mb-1">Admin Password</label>
                                                <input name="adminPassword" type="password" class="form-control" value="<?php echo $obj->select($conn)['admin_password']?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="adminFullName" class="control-label mb-1">Admin Full Name</label>
                                                <input name="adminFullName" type="text" class="form-control" value="<?php echo $obj->select($conn)['admin_fullname']?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="adminImage" class="control-label mb-1">Admin Image</label>
                                                <input name="adminImage" type="file" class="form-control" value="">
                                            </div>


                                            <div>
                                                <button type="submit" class="btn btn-lg btn-info btn-block" name="submit">
                                                  Update
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


          <?php include('includes/adminFooter.php')  ?>
