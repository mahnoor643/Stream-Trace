<?php
require "shared/config.php";
$id=$_GET['id'];
$status=$_GET['status'];
if($status== '0'){
    $update_query = "UPDATE `subscriptions` SET  `status` = '1' WHERE  `subcriptionID` = '$id'";

}else{
    $update_query ="UPDATE `subscriptions` SET  `status` = '0' WHERE  `subcriptionID` ='$id'";
}
$run=mysqli_query($conn,$update_query);
header("location:subcription.php");



?>















