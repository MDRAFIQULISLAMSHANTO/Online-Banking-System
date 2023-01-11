<!-- backend -->
<?php
@include 'connect.php';
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);

    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $user_type = "customer";


    $select = "SELECT * FROM all_user_info where email = '$email' && password = '$pass'";
    $result = mysqli_query($con,$select);
    if (mysqli_num_rows($result) > 0) {
        $error[] = 'user already exists';


    } else {
        if ($pass != $cpass) {

           $error[] = 'password not matched , try again!';


        } else {
            $insert = "INSERT INTO  `all_user_info`(`name`,`address`,`phone`,`email`,`password`,`gender`,`dob`,`user_type` )values('$name','$address','$phone','$email', '$pass','$gender','$dob', '$user_type')";
            mysqli_query($con, $insert);
            header('location:login_page.php');
        }
    }
}
;




?>

<!-- frontend -->

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
        <!-- Section: Design Block -->
        <section class="text-center">

            <!-- Background image -->
            <div class="p-5 bg-image" style="
        background-image: url('../mblbank/images/register_bg.jpg');
        height: 800px;
        "></div>
            <!-- Background image -->

            <div class="card mx-3  mx-md-5 shadow-5-strong" style="
        margin-top: -750px;
        background: hsla(0, 0%, 100%, 0.5);
        /* backdrop-filter: blur(10px); */
        ">
                <div class="card-body py-5 px-md-5">

                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <h2 class="fw-bold mb-4">Sign up now</h2>
                            <!--  error message  start-->
                            <?php
                                 if(isset($error)){
                                    foreach($error as $error){
                                        echo '<span class="error-msg"style="color:red"  >'.$error.'</span>';

                                    }
                                }
                                ?>
                            <!--  error message  end-->
                            <!-- Form starts -->
                            <form action=" " method="post">

                                <!--  name -->
                                <div class="form-outline mb-3">
                                    <input type="text" name="name" required placeholder="Full Name"
                                        class="form-control" />
                                </div>
                                <!-- address -->
                                <div class="form-outline mb-3">
                                    <input type="text" name="address" required placeholder="Full Address"
                                        class="form-control" />
                                </div>
                                <!-- phone -->
                                <div class="form-outline mb-3">
                                    <input type="number" name="phone" required placeholder="Phone Number"
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        maxlength="11" class="form-control" />
                                </div>




                                <!-- Email input -->
                                <div class="form-outline mb-3">
                                    <input type="email" name="email" required placeholder="Email"
                                        class="form-control" />
                                </div>
                                <!-- Password input -->
                                <div class="form-outline mb-3">
                                    <input type="password" name="password" required placeholder="Password"
                                        class="form-control" />
                                </div>
                                <div class="form-outline mb-3">
                                    <input type="password" name="cpassword" required placeholder="Confirm Password"
                                        class="form-control" />
                                </div>
                                <!-- gender -->
                                <div class="row">
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label">Gender</label>
                                        <select name="gender">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>

                                        </select>
                                    </div>
                                    <!--date of Birth -->
                                    <div class="col-md-4 mb-4">
                                        <div class="form-outline ">
                                            <label class="form-label">Date of
                                                Birth</label>


                                        </div>
                                    </div>

                                    <div class=" col-md-4 mb-4">
                                        <div class="form-outline ">

                                            <input type="date" name="dob" required class="form-control "
                                                max="2004-12-31" />

                                        </div>
                                    </div>

                                </div>



                                <!-- Submit button -->
                                <button type="submit" name="submit" value="register now"
                                    class="btn btn-primary btn-block mb-4">
                                    Sign up
                                </button>
                            </form>
                            <!-- Form end -->
                        </div>
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