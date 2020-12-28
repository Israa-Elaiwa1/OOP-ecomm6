
<?php
$conn   = new mysqli ("localhost","root","","ecomm6");
class admin{

public function insert($conn,$e,$p,$f,$i){
  $create="insert into admin (admin_email ,admin_password, admin_fullname, admin_image)
 values('$e','$p','$f','$i') ";
 $conn->query($create);
}
public function deleteAdmin($conn,$ID){
$query="delete from admin where admin_id='$ID'";
$conn->query($query);
}
 }

$object = new admin();
if (isset($_POST['save'])) {
  $adminEmail     = $_POST['adminEmail'];
  $adminPassword  = $_POST['adminPassword'];
  $adminFullName  = $_POST['adminFullName'];
  $imageName    = $_FILES['adminImage']['name'];
  $tmpName      = $_FILES['adminImage']['tmp_name'];
  $path         = 'images/';
  move_uploaded_file($tmpName, $path.$imageName);
  $object->insert($conn,$adminEmail,$adminPassword,$adminFullName,$imageName);
}
include('includes/adminHeader.php');
 ?>


            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Manage Admin</div>
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Create Admin</h3>
                                        </div>
                                        <hr>
                                        <form action="manageAdmin.php" method="post" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label for="adminEmail" class="control-label mb-1">Admin Email</label>
                                                <input name="adminEmail" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="adminPassword" class="control-label mb-1">Admin Password</label>
                                                <input name="adminPassword" type="password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="adminFullName" class="control-label mb-1">Admin Full Name</label>
                                                <input name="adminFullName" type="text" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="adminImage" class="control-label mb-1">Admin Image</label>
                                                <input name="adminImage" type="file" class="form-control">
                                            </div>



                                            <div>
                                                <button type="submit" class="btn btn-lg btn-info btn-block" name="save">
                                                  Save
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
                                            <th>Image</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                      <?php

                                      $query  ="select* from admin";
                                      $result = $conn->query($query) ;
                                     while($row = $result->fetch_assoc())
                                      {
                                        echo"<tr>";
                                        echo"<td> {$row['admin_id']} </td>";
                                        echo"<td> {$row['admin_fullname']} </td>";
                                        echo"<td> {$row['admin_email']} </td>";
                                        echo"<td> <img src='images/{$row['admin_image']}' width='100' height='120' /> </td>";
                                        echo"<td> <a href ='editAdmin.php?id={$row['admin_id']}' class='btn btn-info'> Update  </a></td>";
                                        echo"<td> <a href='deleteAdmin.php?id={$row['admin_id']}' class='btn btn-danger'>Delete</a></td>";
                                        echo"</tr>";
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
