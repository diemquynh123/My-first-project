<?php
include_once '../../cauhinh/ketnoi.php';
$email=$_GET['email'];
$sql="SELECT * FROM hoadon WHERE email='$email'";
$query= mysqli_query($conn, $sql);
$row= mysqli_fetch_array($query);
echo $row['tong_so_hd'];
?>

