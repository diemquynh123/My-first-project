<?php

    $id_bl = $_GET['id_bl'];
    include_once 'ketnoi.php';
    $sql="DELETE FROM danhgiasp WHERE id_bl='$id_bl'";
    $query= mysqli_query($conn,$sql);
    header('location:quantri.php?page_layout=danhgiasp');
   

?>


