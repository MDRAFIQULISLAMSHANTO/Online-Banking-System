<!-- backend -->
<?php
@include 'connect.php';
$id = $_GET['id'];
$deletequery = "DELETE from all_user_info where id=$id ";
$query = mysqli_query($con, $deletequery);

header('Location: employee_home.php');










?>