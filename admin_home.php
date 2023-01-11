<!-- AAdmin home page backend starts-->
<?php

/* Connect db */
@include 'connect.php';
session_start();
/* user info */
$usertype = 'employee';
$select = "SELECT * from all_user_info where user_type= '$usertype' ";
$query = mysqli_query($con, $select);
$num = mysqli_num_rows($query);

/* Feedback */
$sql ="SELECT * from homeuserfeedbackdata ";
$querys = mysqli_query($con, $sql);
$nums = mysqli_num_rows($querys);

/* Records */
$selects = "SELECT * from cus_record ORDER BY id DESC LIMIT 10";
$queryss = mysqli_query($con, $selects);
$num = mysqli_num_rows($querys);





?>
<!-- AAdmin home page backend ends-->





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







    <div class="container bg-light text-center">
        <h1>Welcome <span style="color: #0000ff; text-transform: uppercase;"><?php echo $_SESSION['admin_name']?></span>
        </h1>




        <section class="my-5  " style="--bs-bg-opacity: .5;">
            <h2>All Employee Information
            </h2>

            <!--  Add Employee buttion -->
            <div class="addbuttion col-3 ms-auto">
                <a class="mb-2  btn btn-lg btn-success  " href="employee_registration.php"><span
                        class="fa fa-plus"></span>
                    Add New Employee</a>



            </div>



            <!--Table-->
            <table class="table table-responsive table-bordered table-hover table-fixed text-center bg-info">


                <!--Table head-->
                <thead>
                    <tr class="bg-dark text-white-50">
                        <th style=" padding: 15px;">Account Id</th>
                        <th style=" padding: 15px;">Name</th>
                        <th style=" padding: 15px;">Address</th>
                        <th style=" padding: 15px;">Phone</th>
                        <th style=" padding: 15px;">Email</th>
                        <th style=" padding: 15px;">Gender</th>
                        <th style=" padding: 15px;">Date of Birth</th>

                        <th style=" padding: 15px;">Operation</th>

                    </tr>
                </thead>


                <!--Table body-->
                <tbody>
                    <?php
                    while($res = mysqli_fetch_array($query)){


                    ?>
                    <tr>
                        <td style=" padding: 15px;"><?php echo $res['id'] ?></td>
                        <td style=" padding: 15px;"><?php echo $res['name'] ?></td>
                        <td style=" padding: 15px;"><?php echo $res['address'] ?></td>
                        <td style=" padding: 15px;"><?php echo $res['phone'] ?></td>
                        <td style=" padding: 15px;"><span class="email-style"> <?php echo $res['email'] ?> </span>
                        </td>
                        <td style=" padding: 15px;"><?php echo $res['gender'] ?></td>
                        <td style=" padding: 15px;"><?php echo $res['dob'] ?></td>


                        <td style=" padding: 15px;"><a href="employee_delete.php?id=<?php echo $res['id']; ?> "
                                data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-trash "
                                    style="color: #ff0000;" aria-hidden="true"></i></a></td>

                    </tr>
                    <?php
                    } ;

                    ?>

                </tbody>

            </table>
            <!--Table-->


        </section>
        <h2> Messages From Guests
        </h2>
        <section class="my-5 bg-success " style="--bs-bg-opacity: .5;">

            <!--Table-->
            <table class="table table-hover table-bordered table-fixed text-center">

                <!--Table head-->
                <thead>
                    <tr class="bg-dark text-white-50">

                        <th style=" padding: 15px;">Name</th>
                        <th style=" padding: 15px;">Email</th>
                        <th style=" padding: 15px;">Phone</th>
                        <th colspan="2">Comment</th>


                    </tr>
                </thead>


                <!--Table body-->
                <tbody>
                    <?php
                    while($result = mysqli_fetch_array($querys)){


                    ?>
                    <tr>

                        <td style=" padding: 15px;"><?php echo $result['user'] ?></td>
                        <td style=" padding: 15px;"><span class="email-style"> <?php echo $result['email'] ?>
                            </span>
                        </td>
                        <td style=" padding: 15px;"><?php echo $result['mobile'] ?></td>

                        <td style=" padding: 15px;"><?php echo $result['comment'] ?></td>



                        <td style=" padding: 15px;"><a href="contact_us_delete.php?id=<?php echo $result['id']; ?> "
                                data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fa fa-trash "
                                    style="color: #ff0000;" aria-hidden="true"></i></a></td>

                    </tr>
                    <?php
                    } ;

                    ?>

                </tbody>

            </table>
            <!--Table-->


        </section>
        <!--   show record -->

        <h2 class="mt-4 text-center">Transaction History
        </h2>

        <section class="my-5 " style="--bs-bg-opacity: .5;">
            <div class="card shadow  mb-4">
                <div class="card-body  ">
                    <div class="table-responsive">
                        <!--Table-->
                        <table class="table table-bordered  table-fixed bg-dark text-white  text-center">

                            <!--Table head-->
                            <thead>
                                <tr class="bg-info">

                                    <th style=" padding: 15px;"> Account Number</th>
                                    <th style=" padding: 15px;">Amount</th>
                                    <th style=" padding: 15px;">Category</th>
                                    <th style=" padding: 15px;">Time</th>

                            </thead>


                            <!--Table body-->
                            <tbody>
                                <?php
                    while($res = mysqli_fetch_array($queryss)){


                    ?>
                                <tr class="bg-secondary">
                                    <td style=" padding: 15px;"><?php echo $res['id'] ?></td>
                                    <td style=" padding: 15px;"><?php echo $res['amount'] ?></td>
                                    <td style=" padding: 15px;"><?php echo $res['category'] ?></td>
                                    <td style=" padding: 15px;"><?php echo $res['time'] ?></td>

                                </tr>
                                <?php
                    } ;

                    ?>

                            </tbody>

                        </table>
                        <!--Table-->
                    </div>
                </div>
            </div>

        </section>





        <a href="logout.php" class="btn bg-black m-3" style="color:white;">Log out</a>

    </div>

    <!--    footer -->
    <?php include'footer.php'; ?>

    <!--  bootstrap js, popper link  -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>


</body>