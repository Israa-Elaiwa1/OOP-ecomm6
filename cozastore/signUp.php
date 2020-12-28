<?php
session_start();

include("includes/connection.php");
if(isset($_POST['submit']))  {
  $name     = $_POST['name'];
  $email    = $_POST['email'];
  $password = $_POST['password'];
  $number   = $_POST['number'];
  $address  = $_POST['address'];
  //
  // $query1    = "select *from customer where cust_email = $email and cust_password = $password";
  // $result1   = mysqli_query($conn,$query1);
  // $fetch1    = mysqli_fetch_assoc($result1);
  // if (mysqli_num_rows($result1)!=0)
  // {
  //   $error    = "Sorry this account already belongs to someone!";
  // }
  //
  //  else
  //  {
  //    $error    = "Sorry this accountttttttttttt to someone!";
  //
  //      $query     = "insert into customer (cust_name, cust_email, cust_password,
  //                                          cust_mobile, cust_add)
  //                    values                ($name, $email, $password, $number, $address)";
  //
  //      $result    =  mysqli_query($conn,$query);
  //  }
   $query     = "insert into customer (cust_name, cust_email, cust_password,
                                       cust_mobile, cust_add)
                 values                ($name, $email, $password, $number, $address)";

   $result    =  mysqli_query($conn,$query);




}
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="../admin/css/font-face.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../admin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../admin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../admin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="../admin/css/theme.css" rel="stylesheet" media="all">


</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="../admin/images/icon/signup.png" style="height:100px;width:200px;" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="login.php" method="post">
                              <div class="form-group">
                                  <label>Full Name</label>
                                  <input class="au-input au-input--full" type="text" name="name" placeholder="Full Name">
                              </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label> Mobile Number</label>
                                    <input class="au-input au-input--full" type="number" name="number" placeholder="Mobile Number">
                                </div>
                                <div class="form-group">
                                    <label> Address</label>
                                    <input class="au-input au-input--full" type="text" name="address" placeholder="Address">
                                </div>


                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name='submit'>sign in</button>
                                <?php
                                if (isset($error)) {

                                  echo  "<div class='alert alert-danger' role='alert'>"
                                            .$error
                                        ."</div>";
                                }

                                 ?>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="../admin/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../admin/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../admin/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../admin/vendor/slick/slick.min.js">
    </script>
    <script src="../admin/vendor/wow/wow.min.js"></script>
    <script src="../admin/vendor/animsition/animsition.min.js"></script>
    <script src="../admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../admin/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../admin/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../admin/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../admin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../admin/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../admin/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../admin/js/main.js"></script>

</body>

</html>
<!-- end document-->
