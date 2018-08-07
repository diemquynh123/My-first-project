<?php
$sql="SELECT *FROM dmsanpham";
$query= mysqli_query($conn, $sql);
?> 

<div id="star" class="col-md-8 col-sm-12 col-xs-12 sidebar collapse navbar-collapse">
<ul>
    <li><a href="index.php?page_layout=khuyenmai">Giảm Giá</a></li>
    <li ><a href="#">Thương Hiệu</a>
        <ul >
            <?php 
            while ($row = mysqli_fetch_array($query)) {
            ?>
            <li><a href="index.php?page_layout=danhsachsp&id_dm=<?php echo $row['id_dm']?>"><?php echo $row['ten_dm'];?></a></li>
            
            <?php
            }?>
        </ul>

    </li>

   <li ><a href="#">Giá</a>
        <ul >
           <li><a href="index.php?page_layout=tktheogia&muc=1">0->1.500.000đ</a></li>
        <li><a href="index.php?page_layout=tktheogia&muc=2">1.500.000đ->2.000.000đ</a></li>
        <li><a href="index.php?page_layout=tktheogia&muc=3">2.000.000đ->2.500.000đ</a></li>
        <li><a href="index.php?page_layout=tktheogia&muc=4">trên 2.500.00đ</a></li>
        </ul>

    </li>
    <li><a href="index.php?page_layout=quangcao">Store</a>
        <ul>
            <li><a href="index.php?page_layout=store">Store Locator</a></li>
            <li><a href="index.php?page_layout=hotrokh">Hỗ Trợ KH</a></li>
            <li><a href="index.php?page_layout=tintuc">Tin Tức</a></li>
            <li><a href="index.php?page_layout=maps">MAPS</a></li>
        </ul>
    </li>

<?php
if(isset($_SESSION['user'])){
    include_once 'chucnang/login/xinchao.php';
    
}
 else {
    include_once 'chucnang/login/dangnhap.php';
}
?>
</ul>
 </div>