<?php
include_once 'ketnoi.php';
$id_pd=$_GET['id_pheduyet'];
$sql_pd="SELECT * FROM pheduyet WHERE id_pheduyet='$id_pd'";
$query_pd= mysqli_query($conn, $sql_pd);
$row_pd= mysqli_fetch_array($query_pd);
$ten=$row_pd['ten_tv'];
$email=$row_pd['email'];
$mk=$row_pd['mat_khau'];
$dia_chi=$row_pd['dia_chi'];
$mobi=$row_pd['dien_thoai'];
if(isset($ten)&&isset($email)&&isset($mk)&&isset($dia_chi)&&isset($mobi)){
$sql="INSERT INTO qlthanhvien(ten_tv,email,mat_khau,dia_chi,dien_thoai,quyen_truy_cap) VALUES ('$ten','$email','$mk','$dia_chi','$mobi','1')";
$query= mysqli_query($conn, $sql);
$sql_xoa="DELETE FROM pheduyet WHERE id_pheduyet='$id_pd'";
$query_xoa= mysqli_query($conn, $sql_xoa);
header('location:quantri.php?page_layout=qlthanhvien');
}

?>
