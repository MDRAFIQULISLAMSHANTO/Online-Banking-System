<!-- backend -->
<?php
@include 'connect.php';
$id = $_GET['id'];
$deletequery = "DELETE from homeuserfeedbackdata where id=$id ";
$query = mysqli_query($con, $deletequery);

header('Location: admin_home.php');










?>