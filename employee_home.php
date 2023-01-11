<!-- Emoployee home page backend starts-->
<?php

/* Connect db */
@include 'connect.php';
session_start();
$employeename = $_SESSION['em_name'];
$id = $_SESSION['em_id'];
$select = "SELECT * from loan_request ";
$query = mysqli_query($con, $select);
$num = mysqli_num_rows($query);




/* customer list */
$usertype = 'customer';
$selects = "SELECT * from all_user_info where user_type= '$usertype'";
$querys = mysqli_query($con, $selects);
$num = mysqli_num_rows($querys);




?>
<!-- Employee home page backend ends-->




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





    <!-- loan start -->

    <div class="container mt-5 bg-light text-center ">
        <h1>Welcome to <span><?php echo $employeename ?></span></h1>

        <div class="updateinfo">
            <div class="col-1   ms-auto " style="border-radius: 4px;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.16);
  background: #FF5E45;">
                <a class="text-white text-decoration-none" href="employee_update.php?id=<?php echo $id; ?> ">Update
                    Information</a>

            </div>
            <div class=" mb-4">
                <h1 class="h3  text-gray-800 ">Loan Request List</h1>
            </div>
            <!-- DataTales -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered  text-white bg-dark" id="dataTable" width="100%"
                            cellspacing="0">
                            <thead>
                                <tr class="bg-info text-center">
                                    <th style=" padding: 15px;" colspan="2">Customer Id </th>
                                    <th style=" padding: 15px;">Loan Id</th>

                                    <th style=" padding: 15px;">Loan Type</th>
                                    <th style=" padding: 15px;">Amount</th>
                                    <th style=" padding: 15px;">Duration(Months)</th>
                                    <th style=" padding: 15px;">Comment</th>
                                    <th style=" padding: 15px;">status</th>
                                    <th style=" padding: 15px;" colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                    while($res = mysqli_fetch_array($query)){




                    ?>
                                <tr class="text-center">
                                    <td style=" padding: 20px;"><?php echo $res['cid'] ?></td>
                                    <td style=" padding: 20px;" class="text-center "><a
                                            href="show_profile.php?cid=<?php echo $res['cid']; ?> "
                                            data-toggle="tooltip" data-placement="bottom" title="Profile"><i
                                                class="fa-solid fa-user"></i></a>
                                    </td>
                                    <td style=" padding: 20px;"><?php echo $res['loanid'] ?></td>

                                    <td style=" padding: 20px;"><?php echo $res['loantype'] ?>
                                    </td>
                                    <td style=" padding: 20px;"><?php echo $res['loanamount'] ?>
                                    </td>
                                    <td style=" padding: 20px;"><?php echo $res['loantime'] ?>
                                    </td>
                                    <td style=" padding: 20px;"><?php echo $res['comment'] ?></td>
                                    <?php switch($res['status']):

                                case 0:?>
                                    <td style=" padding: 20px; color:#ffff00">Pending</td>
                                    <?php break; ?>
                                    <?php case 1: ?>
                                    <td style=" padding: 20px; color:#40ff00">Accepted</td>
                                    <?php break; ?>
                                    <?php case 2: ?>
                                    <td style=" padding: 20px; color:#ff0000">Rejected</td>
                                    <?php break; ?>
                                    <?php endswitch; ?>

                                    <?php switch($res['status']):

                                case 0:?>
                                    <td class="text-center " style=" padding: 15px;"><a
                                            href="loan_approve.php?loanid=<?php echo $res['loanid']; ?> "
                                            title="Approve">
                                            <i class="fa-solid fa-check"></i></a></td>
                                    <td class="text-center " id="button" style=" padding: 15px;"><a
                                            href="loan_reject.php?loanid=<?php echo $res['loanid']; ?> "
                                            title="Reject"><i class="fa-solid fa-xmark"></i></a></td>
                                    <td class="text-center " style=" padding: 15px;"><a
                                            href="loan_delete_from_employee.php?loanid=<?php echo $res['loanid']; ?> "
                                            title="Delete"><i class="fa fa-trash " style="color: #ff0000;"
                                                aria-hidden="true"></i></a>
                                    </td>
                                    <?php break; ?>
                                    <?php case 1: ?>
                                    <td></td>
                                    <?php break; ?>
                                    <?php case 2: ?>
                                    <td></td>
                                    <?php break; ?>
                                    <?php endswitch; ?>

                                </tr>

                                <?php
                    } ;

                    ?>


                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
            <!--   loan end -->



            <!--  customer list -->
            <h2 class="mt-4 text-center">All Customer Information
            </h2>

            <section class="my-5 " style="--bs-bg-opacity: .5;">
                <div class="card shadow  mb-4">
                    <div class="card-body  ">
                        <div class="table-responsive">
                            <!--Table-->
                            <table class="table table-bordered table-hover table-fixed bg-dark text-white  text-center">

                                <!--Table head-->
                                <thead>
                                    <tr class="bg-info">
                                        <th style=" padding: 15px;">Account Id</th>
                                        <th style=" padding: 15px;">Name</th>
                                        <th style=" padding: 15px;">Address</th>
                                        <th style=" padding: 15px;">Phone</th>
                                        <th style=" padding: 15px;">Email</th>
                                        <th style=" padding: 15px;">Gender</th>
                                        <th style=" padding: 15px;">Date of Birth</th>

                                        <th style=" padding: 15px;" colspan="2">Operation</th>

                                    </tr>
                                </thead>


                                <!--Table body-->
                                <tbody>
                                    <?php
                    while($res = mysqli_fetch_array($querys)){


                    ?>
                                    <tr class="bg-secondary">
                                        <td style=" padding: 15px;"><?php echo $res['id'] ?></td>
                                        <td style=" padding: 15px;"><?php echo $res['name'] ?></td>
                                        <td style=" padding: 15px;"><?php echo $res['address'] ?></td>
                                        <td style=" padding: 15px;"><?php echo $res['phone'] ?></td>
                                        <td style=" padding: 15px;"><span class="email-style">
                                                <?php echo $res['email'] ?>
                                            </span></td>
                                        <td style=" padding: 15px;"><?php echo $res['gender'] ?></td>
                                        <td style=" padding: 15px;"><?php echo $res['dob'] ?></td>

                                        <td style=" padding: 15px;"><a
                                                href="cus_update.php?id=<?php echo $res['id']; ?> "
                                                data-toggle="tooltip" data-placement="bottom" title="UPDATE"><i
                                                    class="fa fa-edit" aria-hidden="true"></i></a>
                                        </td>
                                        <td style=" padding: 15px;"><a
                                                href="cus_delete.php?id=<?php echo $res['id']; ?> "
                                                data-toggle="tooltip" data-placement="bottom" title="Delete"><i
                                                    class="fa fa-trash " style="color: #ff0000;"
                                                    aria-hidden="true"></i></a>
                                        </td>

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



            <div class="d-flex justify-content-end"> <a class="bg-primary m-5 p-2  rounded" href="logout.php"
                    class="btn" style="color: white;">Log out</a></div>




        </div>

        <!--    footer -->
        <?php include'footer.php'; ?>

        <!--  bootstrap js, popper link ,jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
        <script>
        //For delete row

        function deleteRow(r) {
            var i = r.parentNode.parentNode.rowIndex;
            document.getElementById('dataTable').deleteRow(i);
        }
        </script>


</body>