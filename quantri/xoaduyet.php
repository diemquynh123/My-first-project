<?php
include_once 'ketnoi.php';
$id_pd=$_GET['id_pheduyet'];
$sql="DELETE FROM pheduyet WHERE id_pheduyet='$id_pd'";
$query= mysqli_query($conn, $sql);
header('location:quantri.php?page_layout=pheduyet');
?>

