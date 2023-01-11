<!-- Customer Money Traansfer  page backend starts-->
<?php

/* Connect db */

@include 'connect.php';
session_start();
if (isset($_POST['submit'])) {

    $money = $_POST['money'];
    $id = $_SESSION['cus_id'];
    $receiverid = $_POST['rid'];
    $category = "Transfer to $receiverid";
    $select = "SELECT * FROM all_user_info where id = '$receiverid'";
    $result = mysqli_query($con,$select);
    $present = mysqli_num_rows($result);
    if($present>0){
        $query =" INSERT INTO `cus_record`(`id`, `amount`, `category`) VALUES ('$id','$money','$category')";
            $res = mysqli_query($con, $query);
        $sql = "SELECT amount From cus_deposit where id= '$id'";
        $result = mysqli_query($con, $sql);
        $second = mysqli_num_rows($result);
        if($second >0){
            $row = mysqli_fetch_array($result);
            $amount = $row['amount'];
            if($amount>$money){
                $query = "SELECT id from all_user_info where id= '$receiverid'";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_array($result);
                $rid = $row['id'];

                $sql = "SELECT amount from cus_deposit where id='$id'";
                $result = mysqli_query($con, $sql);
                $third = mysqli_num_rows($result);
                if($third> 0){
                    $sum = $amount - $money;
                    $query = "UPDATE cus_deposit SET amount = '$sum' where id = '$id' ";
                    $result = mysqli_query($con, $query);

                    $sql = "SELECT amount from cus_deposit where id =  '$rid'";
                    $results = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($results);
                    $mon = $row['amount'];
                    $total = $mon  + $money;


                    $query = "UPDATE cus_deposit SET amount ='$total' where id= '$rid' ";
                    $result = mysqli_query($con, $query);
                    echo "<script>alert('Money Transfer Successful'); </script>";

                }else{
                    $sum = $amount - $money;
                    $query = "UPDATE cus_deposit SET amount ='$sum' where id= '$id' ";
                    $result = mysqli_query($con, $query);
                    $query = "INSERT INTO cus_deposit (id, amount) VALUES ('$rid','$money') ";
                    $result = mysqli_query($con, $query);
                    echo "<script>alert('Money Transfer Successful'); </script>";


                }

            } else {
                $error[]  = 'Your Account do not have enough money! ';

            }
        }

    } else {
        $error[]  = 'Account not exist';

    }



}
;






?>
<!--Customer Money Traansfer  page backend ends-->





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


    <div class="card-body py-8 px-md-5 m-5 p-5 bg-light">

        <div class="row d-flex  justify-content-center align-items-center">
            <div class="col-lg-8">
                <form action=" " method="post">
                    <h1 class="heading text-center">Transfer Money</h1>





                    <div class="form-row mt-3">
                        <div class="form-group col-md-6">
                            <div class="form-outline mb-4">

                                <!--  error message  start-->
                                <?php
                                 if(isset($error)){
                                    foreach($error as $error){
                                        echo '<span class="error-msg" style="color:red" >'.$error.'</span>';

                                    }
                                }
                                ?>
                                <!--  error message  end-->

                                <label class="form-label">Receiver Bank Account Number</label>
                                <input type="number" name="rid" class="form-control form-control-lg"
                                    placeholder="Write receiver account number here" required />

                            </div>
                            <label for="inputCity">Enter Amount</label>



                            <input type="number" name="money" class="form-control mt-2" id="inputCity" min="1"
                                placeholder="Enter Amount Here">
                        </div>


                        <button type="submit" name="submit" class="btn btn-primary mt-5">Confirm</button>
                </form>



                <div class="  d-flex justify-content-end ">
                    <a class="bg-dark  m-5 p-2  rounded " href="customer_home.php" class="btn mt-5 "
                        style="color: white;">Back</a>
                </div>





            </div>
        </div>
    </div>

    <!--    footer -->
    <?php include'footer.php'; ?>


    <!--  bootstrap js, popper link  -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>


</body>