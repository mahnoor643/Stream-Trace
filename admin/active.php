<?php
require "shared/config.php";
$id=$_GET['id'];
$status=$_GET['status'];
if($status==0){
    $update_query = "UPDATE `serviceproviders` SET  `status` = '1' WHERE  `serviceProvidersID` = '$id'";

}else{
    $update_query ="UPDATE `serviceproviders` SET  `status` = '0' WHERE  `serviceProvidersID` ='$id'";
}
$run=mysqli_query($conn,$update_query);
header("location:services_provider.php");



?>















