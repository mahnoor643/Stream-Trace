<?php
include "shared/config.php";
$id_d=$_GET['id'];
$d_query="DELETE FROM `contactus` WHERE contactID ='$id_d' ";
$d__run=mysqli_query($conn,$d_query);
header("location:contact.php");

?>