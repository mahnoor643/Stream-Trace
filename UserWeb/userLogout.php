<?php 
session_start();
$userEmail = $_SESSION['userEmail'];
$userPwd = $_SESSION['userPass'];
$userID = $_SESSION['userID'];
include 'shared/config.php';

if(isset($userEmail)&& isset($userPwd)){
    session_unset();
    session_destroy();
    header('location:index.php');
 }
 else {
  header('location:login.php');
 }
?>