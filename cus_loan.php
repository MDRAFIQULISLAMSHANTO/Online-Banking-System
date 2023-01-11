<!-- Customer Deposit page backend starts-->
<?php

/* Connect db */


@include 'connect.php';
session_start();
/* user info */
$id = $_SESSION['cus_id'];

$select = "SELECT * from loan_request  where cid={$id}  ";
$query = mysqli_query($con, $select);








?>
<!--Customer Deposit  page backend ends-->





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
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">



            <!-- Begin Page Content -->
            <div class="container-fluid">


                <a class="m-3 btn btn-lg btn-success" href="cus_loan_request.php"><span class="fa fa-plus"></span>
                    Create new Loan Application</a>

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Loan List</h1>
                </div>
                <!-- DataTales -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="bg-info text-center">
                                        <th>Loan Id</th>
                                        <th>Loan Type</th>
                                        <th>Amount</th>
                                        <th>Duration(Months)</th>
                                        <th>Comment</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                    while($res = mysqli_fetch_array($query)){




                    ?>
                                    <tr class="text-center">
                                        <td class="bg-secondary" style="color:white;"><?php echo $res['loanid'] ?></td>
                                        <td class="bg-secondary" style="color:white;"><?php echo $res['loantype'] ?>
                                        </td>
                                        <td class="bg-secondary" style="color:white;"><?php echo $res['loanamount'] ?>
                                        </td>
                                        <td class="bg-secondary" style="color:white;"><?php echo $res['loantime'] ?>
                                        </td>
                                        <td class="bg-secondary" style="color:white;"><?php echo $res['comment'] ?></td>
                                        <?php switch($res['status']):

                                        case 0: ?>
                                        <td class="bg-warning" style="color:white;">Pending</td>
                                        <?php break; ?>
                                        <?php case 1: ?>
                                        <td class="bg-success" style="color:white;">Accepted</td>
                                        <?php break; ?>
                                        <?php case 2: ?>
                                        <td class="bg-danger" style="color:white;">Rejected</td>
                                        <?php break; ?>
                                        <?php endswitch; ?>
                                        <td class="text-center bg-dark"><a
                                                href="loan_delete.php?loanid=<?php echo $res['loanid']; ?> "
                                                data-toggle="tooltip" data-placement="bottom" title="Delete"><i
                                                    class="fa fa-trash " style="color: #ff0000;"
                                                    aria-hidden="true"></i></a></td>





                                    </tr>



                                    <?php
                    } ;

                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="  d-flex justify-content-end ">
                        <a class="bg-dark  m-5 p-2  rounded " href="customer_home.php" class="btn mt-5 "
                            style="color: white;">Back</a>
                    </div>

                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="stocky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Loan Management System <?php echo date("Y")?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- old -->
    <!-- <div class="card-body py-8 px-md-5 m-5 p-5 bg-light">

        <div class="row d-flex  justify-content-center align-items-center">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Loan List</h1>
                <a class="mb-2 btn btn-lg btn-success" href="cus_loan_request.php"><span class="fa fa-plus"></span>
                    Create new Loan Application</a>
            </div>






        </div>
        <div class="  d-flex justify-content-end ">
            <a class="bg-dark  m-5 p-2  rounded " href="customer_home.php" class="btn mt-5 "
                style="color: white;">Back</a>
        </div>
    </div> -->

    <!--    footer -->
    <?php include'footer.php'; ?>




    <!--  bootstrap js, popper link  -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>


</body>