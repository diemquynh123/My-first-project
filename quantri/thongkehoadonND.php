<?php
include_once'ketnoi.php';
if(isset($_POST['sbm'])){
	$user=$_POST['email'];

	if(isset($user)){
		$sql_nd="SELECT * FROM orders WHERE email='$user' ";
		$query_nd=mysqli_query($conn, $sql_nd);
		
		$rows=mysqli_fetch_array($query_nd);
		$numrows_nd= mysqli_num_rows($query_nd);

		$sql_t="SELECT SUM(tong_tien) as total FROM orders WHERE email='$user'";
		$query_t= mysqli_query($conn, $sql_t);
        $row_t=mysqli_fetch_array($query_t);

        $sql_sl="SELECT SUM(tong_sl_sp) as total FROM orders WHERE email='$user'";
		$query_sl= mysqli_query($conn, $sql_sl);
        $row_sl=mysqli_fetch_array($query_sl);
	}
}
?>
<div class="products">

 <h2 class="h2-bar">Người Dùng <?php if(isset($rows['email'])){echo $rows['email'];
?> 
<table>
	<tr>
		<td> Tổng Số Lượng Hóa Đơn:</td>
		<td> <?php echo $numrows_nd ;?> hóa đơn</td>
		
	</tr>
	<tr>
		<td> Tổng Số Sản Phẩm Đã Mua: </td>
		<td> <?php echo $row_sl['total'];?> sản phẩm</td>
	</tr>
	<tr>
		<td> Tổng Giá Trị Hóa Đơn Đã Mua:</td>
		<td> <?php echo number_format($row_t['total']);?> VNĐ</td>	
	</tr>
</table>
<?php }
else{ echo 'Chưa Có Hóa Đơn';}?></h2>


        
    </div> 
<a href="quantri.php?page_layout=thongke"> << Back </a>