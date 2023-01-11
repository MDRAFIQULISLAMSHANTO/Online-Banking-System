<!-- backend -->
<?php
@include 'connect.php';
$id = $_GET['loanid'];
$status = 2;
$query = "UPDATE `loan_request` SET `status`='$status' where loanid=$id ";
$query = mysqli_query($con,$query);


header('Location:employee_home.php');










?>