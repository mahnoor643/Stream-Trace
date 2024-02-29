<?php
session_start();
if(isset($_POST['submit'])){
    $_SESSION['userEmail']=$_POST['email'];
    header('location:usersRegistrations.php');
}
?>