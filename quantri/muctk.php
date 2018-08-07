<?php
include_once'ketnoi.php';
if(isset($_POST['submit'])){
    $ngay_lap=$_POST['created_at'];
    $update=$_POST['updated_at'];

if(isset($ngay_lap)&& isset($update)){
 $sql = "SELECT * FROM orders WHERE created_at BETWEEN '$ngay_lap' AND '$update'";
    $query=mysqli_query($conn, $sql);
     $numrows = mysqli_num_rows($query);

    $sql_kq= "SELECT SUM(tong_tien) as total FROM orders WHERE created_at BETWEEN '$ngay_lap' AND '$update'";
$query_kq= mysqli_query($conn, $sql_kq);
$row_kq=mysqli_fetch_array($query_kq);

 $sql_sl= "SELECT SUM(tong_sl_sp) as total FROM orders WHERE created_at BETWEEN '$ngay_lap' AND '$update'";
$query_sl= mysqli_query($conn, $sql_sl);
$row_sl=mysqli_fetch_array($query_sl);

}
}
?>

<div class="products">
	<h2>Thống Kê Từ Ngày: <?php echo $ngay_lap;?> đến ngày <?php echo $update;?>  </h2>
	<table >
		<tr>
			<td>Tổng Đơn Hàng : </td>
			<td> <?php echo $numrows;?><span> <đơn hàng></span> </td>
		</tr>
		<tr>
			<td>Tổng Số Lượng Sản Phẩm Bán Được: </td>
			<td>  <?php echo $row_sl['total']; ?> sản phẩm </td>
		</tr>
		<tr>
			<td>Tổng Doanh Thu:  </td>
			<td> <?php echo number_format($row_kq['total']); ?> VNĐ </td>
		</tr>

	</table>
    </div> 
<a href="quantri.php?page_layout=thongke"> << Back </a>

