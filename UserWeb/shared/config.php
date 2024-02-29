<?php
$server="localhost";
$username="root";
$pwd="";
$db="movieweb";
$conn=mysqli_connect($server,$username,$pwd,$db);
if(!$conn){

    die(mysqli_error($conn));
}
// else{
//    echo "Connected";
// }
?>