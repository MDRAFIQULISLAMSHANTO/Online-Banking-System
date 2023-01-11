<!-- backend -->
<?php
@include 'connect.php';
$ids = $_GET['id'];
$showquery = "SELECT * from all_user_info where id={$ids} ";
$showdata = mysqli_query($con, $showquery);
$arrdata = mysqli_fetch_array($showdata);

if (isset($_POST['submit'])) {
    $idupdate = $_GET['id'];
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];

    $updatequery = "UPDATE `all_user_info` SET `name`='$name',`address`='$address',`phone`='$phone',`email`='$email',`gender`='$gender',`dob`='$dob' WHERE id=$idupdate";
    $result = mysqli_query($con, $updatequery);
    if($result){


         header('Location: employee_home.php');
    }else{
       /*  echo "<script>alert('Update Unsuccessful'); </script>"; */
        header('Location: employee_home.php');
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
    <div class="p-5 bg-image" style="
        background-image: url('../mblbank/images/update_bg.jpg');
        height: 800px;
        "></div>

    <div class="container">

        <section class="text-center">



            <div class="card mx-3  mx-md-5 shadow-5-strong" style="
        margin-top: -750px;
        background: hsla(0, 0%, 100%, 1);
        /* backdrop-filter: blur(10px); */
        ">
                <div class="card-body py-5 px-md-5">

                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <h2 class="fw-bold mb-4">Update Information</h2>


                            <!-- Form starts -->
                            <form action=" " method="post">

                                <!--  name -->
                                <div class="form-outline mb-3">
                                    <h4 style="opacity: .5;
                                    ">NAME</h4>
                                    <input type="text" name="name" placeholder="Full Name"
                                        value="<?php echo $arrdata['name'] ?>" class="form-control" />
                                </div>
                                <!-- address -->

                                <div class="form-outline mb-3">
                                    <h4 style="opacity: .5;
                                    ">ADDRESS</h4>
                                    <input type="text" name="address" placeholder="Full Address"
                                        value="<?php echo $arrdata['address'] ?>" class="form-control" />
                                </div>
                                <!-- phone -->
                                <div class="form-outline mb-3">
                                    <h4 style="opacity: .5;
                                    ">PHONE NUMBER</h4>
                                    <input type="text" name="phone" placeholder="Phone Number"
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        maxlength="11" value="<?php echo $arrdata['phone'] ?>" class="form-control" />
                                </div>
                                <!-- Email input -->
                                <div class="form-outline mb-3">
                                    <h4 style="opacity: .5;
                                    ">EMAIL</h4>
                                    <input type="email" name="email" placeholder="Email"
                                        value="<?php echo $arrdata['email'] ?>" class="form-control" />
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

                                            <input type="date" name="dob" required class="form-control " />

                                        </div>
                                    </div>

                                </div>




                                <!-- Submit button -->
                                <button type="submit" name="submit" value="Update"
                                    class="btn btn-primary btn-block mb-4">
                                    Update
                                </button>

                            </form>
                            <div class="  d-flex justify-content-end ">
                                <a class="bg-dark  m-5 p-2  rounded " href="admin_home.php" class="btn mt-5 "
                                    style="color: white;">Back</a>
                            </div>
                            <!-- Form end -->

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>










    <!--  bootstrap js, popper link  -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>


</body>