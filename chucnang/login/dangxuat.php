<?php
include_once("../../cauhinh/ketnoi.php");
ob_start();
session_start();
if(isset($_SESSION['user'])){
    $email=$_SESSION['user'];
    $sql_xoals="DELETE FROM spdaxem WHERE email='$email'";
    $query_xoals=mysqli_query($conn,$sql_xoals);
    
 	unset($_SESSION['user']);
    unset($_SESSION['giohang']);
    header("location:index.php");

}
 else {
    header("location:index.php");
}
?>

