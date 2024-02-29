<?php
echo json_encode(array("status" => "success"));
$id = $_GET['id'];
session_start();
$userEmail = $_SESSION['userEmail'];
$userPwd = $_SESSION['userPass'];
$userID = $_SESSION['userID'];
if (isset($userEmail) && isset($userPwd)) {
} else {
    header('location:login.php');
}
include 'shared/config.php';
if (isset($_POST['submitSubscriptions'])) {
    $price = $_POST['price'];

    $streamersQ = "insert into subscriptions(subscriptionFor,subscriptionBy,payedAmount,renewalDate) values('$id','$userID','$price',DATE_ADD(CURRENT_DATE(), INTERVAL 30 DAY))";
    $streamers = mysqli_query($conn, $streamersQ);
    if (!$streamers) {
        die(mysqli_error($conn));
    } else {
       echo '<script> alert("recorrd");</script>';
    }
}
?>
