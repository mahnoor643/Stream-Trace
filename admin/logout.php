<?php
require "shared/config.php";

session_start();

if(isset($_SESSION['adminEmail'])&& isset ($_SESSION['adminPwd'])){
    session_unset();
    session_destroy();
    header('location:index.php');
}else{
    header('location:login.php');
}
?>