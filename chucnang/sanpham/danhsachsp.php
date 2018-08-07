<?php
$id_dm=$_GET['id_dm'];
$sqlDm="SELECT * FROM dmsanpham WHERE id_dm=$id_dm";
$queryDm= mysqli_query($conn, $sqlDm);
$rowDm= mysqli_fetch_array($queryDm);


if(isset($_GET['page'])){
    $page=$_GET['page'];
}
else{
    $page=1;
}
$rowsPerPage=8;
$perRow=$page*$rowsPerPage-$rowsPerPage;
$sql="SELECT * FROM sanpham WHERE id_dm=$id_dm ORDER BY (gia_sp-tiet_kiem) ASC LIMIT $perRow,$rowsPerPage";
$query= mysqli_query($conn, $sql);

//tong so ban ghi
$totalRows= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sanpham WHERE id_dm=$id_dm"));

//tong so trang
$totalPages=ceil($totalRows/$rowsPerPage);

//xay dung thanh phan trang
$listPage="";
for($i=1; $i<=$totalPages; $i++){
    if($page==$i){
        $listPage.='<li class="active"><a href="index.php?page_layout=danhsachsp&id_dm='.$id_dm.'&page='.$i.'">'.$i.'</a></li>';
    }
    else{
        $listPage.='<li><a href="index.php?page_layout=danhsachsp&id_dm='.$id_dm.'&page='.$i.'">'.$i.'</a></li>';
    }
}
?>

<div style="background: #000">
<video width="100%" height="450px"  autoplay loop muted>
    <source src="video/intro3.mp4" type="video/mp4">
    Your browser does not support the <code>video</code> tag.
</video>
</div>
<div class="products">
    <h2 class="h2-bar"><?php echo $rowDm['ten_dm'];?></h2>
    <div class="row" >
        <?php
        while ($row = mysqli_fetch_array($query)) {
            
        
        ?>
        <div class="col-md-3 col-sm-6 product-item text-center"  style="margin-top: 15px;">
        <?php
                if($row['tiet_kiem']>0) {?>
                <img style="width: 43px;height: 42px;position: absolute;top: 0px;left: 0px;"src="images/km.png">
                <p style="color: #fff;position: absolute;top: 25px;left: 20px;">
                <?php
                $gia_cu = $row['gia_sp'];
                $tiet_kiem = $row['tiet_kiem'];
                $phan_tram = floor(($tiet_kiem / $gia_cu) * 100);
                echo '-'.$phan_tram.'%';
                }?> 
                
                </p>


                <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>"><img width="100" height="144" src="quantri/img/<?php echo $row['anh_sp']; ?>"></a>
                <h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>"><?php echo $row['ten_sp']; ?></a></h3>
                <?php
                if($row['tiet_kiem']<=0) {
                    echo '<p class="price">Giá:'.number_format($row['gia_sp']).'<sup>VNĐ</sup></p>';
                    }else {
                        $giamoi=$row['gia_sp']-$row['tiet_kiem'];
                        echo '<p class="price">Giá mới:'.number_format($giamoi).'<sup>VNĐ</sup></p>';
                        echo '<p><strike>Giá cũ:'.number_format($row['gia_sp']).'</strike><sup>VNĐ</sup></p>';
                    }
                ?>
                
                </div>
        <?php
        }?>
    </div>
</div>
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
