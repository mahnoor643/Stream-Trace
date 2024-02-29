<?php
$streamersEmail=$_SESSION['streamerEmail'];
$streamersPwd=$_SESSION['streamerPass'];
$streamersID=$_SESSION['streamerID'];
// header("location:");
include 'shared/config.php';

if (isset($streamersEmail) && isset($streamersPwd)) {
    session_unset();
    session_destroy();
    header('location:index.php');
} else {
    header('location:login.php');
}
?>