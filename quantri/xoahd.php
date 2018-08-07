<?php

    $id_od = $_GET['id_od'];
    include_once 'ketnoi.php';
    $sql="DELETE FROM orders WHERE id_od='$id_od'";
    $query= mysqli_query($conn,$sql);
    header('location:quantri.php?page_layout=qlhoadon');
   

?>