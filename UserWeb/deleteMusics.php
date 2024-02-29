<?php
$id=$_GET['id'];
$conn=mysqli_connect('localhost','root','','movieweb');
$message="Your music is not deleted";
$deleteQ="delete from musicalbum where MusicID='$id'";
$delete=mysqli_query($conn,$deleteQ);
if(!$delete){
    echo "<script type='text/javascript'>alert('$message');</script>";
}else{
    header('location:Movies_Musics.php');
}
?>