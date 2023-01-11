<?php

/* Connect db */

$con = mysqli_connect('localhost','root');
 /* if($con){
    echo"Connection successful";

 }else{
    echo"No Connection";
 } */
 mysqli_select_db($con,'online_banking_system');


?>