<!-- Emoployee home page backend starts-->
<?php

/* Connect db */
@include 'connect.php';
session_start();
$name = $_SESSION['cus_name'];
$id = $_SESSION['cus_id'];
$select = "SELECT amount From cus_deposit Where id ='$id'";
$result = mysqli_query($con, $select);
$present = mysqli_num_rows($result);
if ($present > 0) {
    $row = mysqli_fetch_array($result);
    $balance = $row['amount'];

}else{
    $balance = 0;
}


$selects = "SELECT * from cus_record where id = '$id' ";
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







    <div class="container bg-light text-center mt-5">
        <div class="balance_show">
            <div class=" d-flex justify-content-end">



                <div class="card-bottom pt-3 px-3 mb-2 bg-secondary">
                    <div class="">
                        <div class="text-white"><span>Available Balance</span>
                            <p><i class="fa-light fa-dollar-sign"></i> <span
                                    class="text-white"><?php echo $balance ?></span></p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <h1>Welcome <span><?php echo $name ?></span></h1>
        <h3>Account Number: <span><?php echo $id ?></h3>
        <p>This is your Dashboard </p>
        <section class="my-5">

            <div class="container-fliud">
                <div class="row">
                    <div class="col-lg-3 col-md3 col-12 d-flex justify-content-center">
                        <div class="card d-flex text-center bg-info" style="width: 18rem;">
                            <i class="fa-solid fa-money-check-dollar fa-5x"></i>
                            <div class="card-body">
                                <a class=" m-1  rounded" href="cus_deopsit.php" class="btn"
                                    style="color: white;">DIPOSIT</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md3 col-12 d-flex justify-content-center">
                        <div class="card d-flex text-center bg-secondary" style="width: 18rem;">
                            <i class="fa-solid fa-piggy-bank fa-5x"></i>
                            <div class="card-body">
                                <a class=" m-1  rounded" href="cus_withdraw.php" class="btn"
                                    style="color: white;">WITHDRAW</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md3 col-12 d-flex justify-content-center">
                        <div class="card d-flex text-center bg-success" style="width: 18rem;">
                            <i class="fa-solid fa-landmark fa-5x"></i>
                            <div class="card-body">
                                <a class=" m-1  rounded" href="cus_loan.php" class="btn" style="color: white;">LOAN</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md3 col-12 d-flex justify-content-center">
                        <div class="card d-flex text-center bg-info" style="width: 18rem;">
                            <i class="fa-solid fa-money-bill-transfer fa-5x"></i>
                            <div class="card-body">
                                <a class=" m-1  rounded" href="cus_money_transfer.php" class="btn"
                                    style="color: white;">Money Transfer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                                    <th style=" padding: 15px;">Amount</th>
                                    <th style=" padding: 15px;">Category</th>
                                    <th style=" padding: 15px;">Time</th>

                            </thead>


                            <!--Table body-->
                            <tbody>
                                <?php
                    while($res = mysqli_fetch_array($querys)){


                    ?>
                                <tr class="bg-secondary">
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















        <div class="d-flex justify-content-end"> <a class="bg-primary m-5 p-2  rounded" href="logout.php" class="btn"
                style="color: white;">Log out</a></div>




    </div>

    <!--    footer -->
    <?php include'footer.php'; ?>

    <!--  bootstrap js, popper link  -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>


</body>