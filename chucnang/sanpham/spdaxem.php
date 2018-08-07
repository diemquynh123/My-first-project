<?php
if(isset($_SESSION['user'])){
    $email=$_SESSION['user'];

if(isset($_GET['page'])){
    $page=$_GET['page'];
}
else{
    $page=1;
}
$rowsPerPage=8;
$perRow=$page*$rowsPerPage-$rowsPerPage;
   $sql_checkls="SELECT * FROM sanpham JOIN spdaxem ON sanpham.id_sp=spdaxem.id_sp WHERE email='$email' ORDER BY id_ls DESC LIMIT $perRow,$rowsPerPage";
 $query_checkls=mysqli_query($conn,$sql_checkls);

//tong so ban ghi
$totalRows= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM spdaxem"));

//tong so trang
$totalPages=ceil($totalRows/$rowsPerPage);

//xay dung thanh phan trang
$listPage="";
for($i=1; $i<=$totalPages; $i++){
    if($page==$i){
         $listPage.='<li class="active"><a href="index.php?page_layout=spdaxem&page='.$i.'">'.$i.'</a></li>';
    }
    else{
      $listPage.=' <li><a href="index.php?page_layout=spdaxem&page='.$i.'">'.$i.'</a></li>';
    }
}
?>

<div class="products">
    <h2 class="h2-bar">Sản Phẩm Đã Xem</h2> <br/>
    <div class="row">
        <?php
        while ($row_checkls = mysqli_fetch_array($query_checkls)) {
            ?>  
            <div class="col-md-3 col-sm-6 product-item text-center">
                <?php
                if($row_checkls['tiet_kiem']>0) {?>
                <img style="width: 43px;height: 42px;position: absolute;top: 0px;left: 0px; "src="images/km.png">
                <p style="color: #fff;position: absolute;top: 25px;left: 20px;">
                <?php
                $gia_cu = $row_checkls['gia_sp'];
                $tiet_kiem = $row_checkls['tiet_kiem'];
                $phan_tram = floor(($tiet_kiem / $gia_cu) * 100);
                echo '-'.$phan_tram.'%';
                }?> 
                
                </p>


                <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row_checkls['id_sp']; ?>"><img width="100" height="144" src="quantri/img/<?php echo $row_checkls['anh_sp']; ?>"></a>
                <h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row_checkls['id_sp']; ?>"><?php echo $row_checkls['ten_sp']; ?></a></h3>
                <?php
                if($row_checkls['tiet_kiem']<=0) {
                    echo '<p class="price">Giá:'.number_format($row_checkls['gia_sp']).'<sup>VNĐ</sup></p>';
                    }else {
                        $giamoi=$row_checkls['gia_sp']-$row_checkls['tiet_kiem'];
                        echo '<p class="price">Giá mới:'.number_format($giamoi).'<sup>VNĐ</sup></p>';
                        echo '<p><strike>Giá cũ:'.number_format($row_checkls['gia_sp']).'</strike><sup>VNĐ</sup></p>';
                    }
                ?>
                
                </div>
                <?php }
            ?>
</div>

 </div>

 <?php
} //end if
 ?>

 <!-- Pagination -->
<div id="pagination">
    <nav aria-label="Page navigation">
        <ul class="pagination">
             <?php
            echo $listPage;
            ?>
        </ul>
    </nav>
</div>            
<!-- End Pagination --> 