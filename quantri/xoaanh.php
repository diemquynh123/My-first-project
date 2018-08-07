<?php
session_start();
  include_once 'ketnoi.php';
if(isset($_SESSION['email'])&& isset($_SESSION['mk'])){
    $id_chi_tiet = $_GET['id_chi_tiet'];
    include_once 'ketnoi.php';
    $sql="DELETE FROM chitietsp WHERE id_chi_tiet='$id_chi_tiet'";
    $query= mysqli_query($conn,$sql);
    header('location:quantri.php?page_layout=qlanhsp');
} else {
    header('location:index.php'); 
}
?>
