<?php
$dbHost="localhost";
$dbUser="root";
$dbPass="";
$dbName="doantotnghiep";

$conn= mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
mysqli_set_charset($conn, "utf8");
if($conn){
    $setLang=mysqli_query($conn,"SET NAMES 'utf8'");
}
else{
    die("Kết nối thất bại ".mysqli_connect_error());
}
?>