<?php

    $id_tv = $_GET['id_tv'];
    include_once 'ketnoi.php';
    $sql="DELETE FROM qlthanhvien WHERE id_tv='$id_tv'";
    $query= mysqli_query($conn,$sql);
    header('location:quantri.php?page_layout=qlthanhvien');
   

?>



