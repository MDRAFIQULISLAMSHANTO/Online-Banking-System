<!-- backend -->
<?php
@include 'connect.php';
$id = $_GET['cid'];
$showquery = "SELECT * from all_user_info where id={$id} ";
$showdata = mysqli_query($con, $showquery);
$arrdata = mysqli_fetch_array($showdata);


/* balance */
$select = "SELECT amount From cus_deposit Where id ='$id'";
$result = mysqli_query($con, $select);
$present = mysqli_num_rows($result);

if ($present > 0) {

    $row = mysqli_fetch_array($result);
    $balance = $row['amount'];

}else{
    $balance = 0;
}



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
                            <h2 class="fw-bold mb-4">Customer Information</h2>


                            <!-- Form starts -->
                            <form action=" " method="post">

                                <!--  name -->
                                <div class="form-outline mb-3">
                                    <h4 style="opacity: .5;
                                    ">NAME</h4>
                                    <h2><?php echo $arrdata['name'] ?>
                                    </h2>
                                </div>
                                <!-- address -->

                                <div class="form-outline mb-3">
                                    <h4 style="opacity: .5;
                                    ">ADDRESS</h4>
                                    <h2>
                                        <?php echo $arrdata['address'] ?></h2>
                                </div>
                                <!-- phone -->
                                <div class="form-outline mb-3">
                                    <h4 style="opacity: .5;
                                    ">PHONE NUMBER</h4>
                                    <h2>
                                        <?php echo $arrdata['phone'] ?> </h2>
                                </div>
                                <!-- Email input -->
                                <div class="form-outline mb-3">
                                    <h4 style="opacity: .5;
                                    ">EMAIL</h4>
                                    <h2 type="email">
                                        <?php echo $arrdata['email'] ?></h2>
                                </div>

                                <!-- gender -->
                                <div class="row">
                                    <div class="col-md-4 mb-4">
                                        <label class="form-label">Gender</label>
                                        <h2 type="email" name="email">
                                            <?php echo $arrdata['gender'] ?></h2>
                                    </div>
                                    <!--date of Birth -->
                                    <div class="col-md-4 mb-4">
                                        <div class="form-outline ">
                                            <label class="form-label">Date of
                                                Birth</label>
                                            <h3>
                                                <?php echo $arrdata['dob'] ?></h3>


                                        </div>
                                    </div>
                                    <div class=" col-md-4 mb-4">
                                        <div class="form-outline ">
                                            <label class="form-label">Balance</label>

                                            <h3>
                                                <i class="fa-light fa-dollar-sign"></i> <?php echo $balance ?>
                                            </h3>

                                        </div>
                                    </div>


                            </form>
                            <div class="  d-flex justify-content-end ">
                                <a class="bg-dark  m-5 p-2  rounded " href="employee_home.php" class="btn mt-5 "
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