<!-- backend -->
<?php
@include 'connect.php';
$id = $_GET['loanid'];




 $deletequery = "DELETE from `loan_request` where loanid=$id ";
$query = mysqli_query($con, $deletequery);

header('Location:cus_loan.php');










?>