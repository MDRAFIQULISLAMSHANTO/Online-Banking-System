<!-- login backend start -->
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
@include 'connect.php';
session_start();
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);

    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $user_type = $_POST['user_type'];


    $select = "SELECT * FROM all_user_info where email = '$email' && password = '$pass'";
    $result = mysqli_query($con,$select);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        if ($row['user_type'] == 'employee' ) {
           $_SESSION['em_name'] = $row['name'];
           $_SESSION['em_id'] = $row['id'];

           header('location:employee_home.php');
        } elseif ($row['user_type'] == 'customer') {
           $_SESSION['cus_name'] = $row['name'];
           $_SESSION['cus_id'] = $row['id']; /* for deposit */
           header('location:customer_home.php');
        } elseif ($row['user_type'] == 'admin') {
           $_SESSION['admin_name'] = $row['name'];
           header('location:admin_home.php');
        }else {
          $error[] = 'Incorrect email or password';
    }
        }
        else {
           $error[] = 'Incorrect email or password';
     }
  }
  ;



  ?>









<!-- login backend end -->



<!-- login frontend start -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mercantile Bank</title>
    <link rel="stylesheet" href="../mblbank/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <!--    header -->
    <?php include'header.php'; ?>
    <div class="container">
        <section class="form-container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 text-black">



                        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                            <form action="" method="post" style="width: 23rem;">

                                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>


                                <div class="form-outline mb-4">
                                    <input type="email" name="email" class="form-control form-control-lg" required />
                                    <label class="form-label" for="email">Email address</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" name="password" class="form-control form-control-lg"
                                        required />
                                    <label class="form-label" for="password">Password</label>
                                </div>
                                <!--  error message  start-->
                                <?php
                                 if(isset($error)){
                                    foreach($error as $error){
                                        echo '<span class="error-msg" style="color:red" >'.$error.'</span>';

                                    }
                                }
                                ?>
                                <!--  error message  end-->
                                <div class="pt-1 mb-4">
                                    <button class="btn btn-info btn-lg btn-block " name="submit" type="submit"
                                        value="login now">Login</button>
                                </div>


                                <p>Don't have an account? <a href="register_page.php"
                                        class="link-info text-center">Register here</a>
                                </p>

                            </form>

                        </div>

                    </div>
                    <div class="col-sm-6 px-0 d-none d-sm-block mt-5 pt-5 pt-xl-0 mt-xl-n5 ">
                        <img src="../mblbank/images/bank_login.jpg" alt="Login image" class="w-100 vh-100% rounded"
                            style="object-fit: cover; object-position: left;">
                    </div>
                </div>
            </div>
        </section>
    </div>








    <!--    footer -->
    <?php include'footer.php'; ?>

    <!--  bootstrap js, popper link  -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>


</body>