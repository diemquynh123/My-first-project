<div style="background: #000">
<video width="100%" height="450px"  autoplay loop muted>
    <source src="video/intro1.mp4" type="video/mp4">
    Your browser does not support the <code>video</code> tag.
</video>
</div>
          
<?php
$sql_new = "SELECT * FROM sanpham ORDER BY id_sp DESC LIMIT 8";
$query_new = mysqli_query($conn, $sql_new);
?>


<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$soDMmottrang =8;
$perRow = $page * $soDMmottrang - $soDMmottrang;


$sql_sale = "SELECT * FROM sanpham WHERE tiet_kiem>0 ORDER BY (gia_sp-tiet_kiem) ASC LIMIT $perRow,$soDMmottrang";
$query_sale = mysqli_query($conn, $sql_sale);

$tongBanGhi = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sanpham WHERE tiet_kiem>0"));
$tongSoTrang = ceil($tongBanGhi / $soDMmottrang); //ceil là làm tròn
$dsTrang = "";

for ($i = 1; $i <= $tongSoTrang; $i++) {
    if ($page == $i) {
        $dsTrang .= ' <li class="active"><a href="index.php?page_layout=khuyenmai&page=' . $i . '">' . $i . '</a></li>';
    } else {
        $dsTrang .= '<li><a href="index.php?page_layout=khuyenmai&page=' . $i . '">' . $i . '</a></li>';
    }
}
?>
<div class="products">
    <h2 class="h2-bar">Sản Phẩm Giảm Giá</h2>
    <marquee width="100%" height="35px" behavior="alternate" bgcolor="pink">  
   <p style="font-size: 20px;color: blue;">Chương Trình Giảm Giá Áp Dụng Đến Hết Ngày 2/8/2018</p>
</marquee>
    <div class="row">
<?php
while ($row_sale = mysqli_fetch_array($query_sale)) {
    ?> 

            <div class="col-md-3 col-sm-6 product-item text-center"  style="margin-top: 15px;">
                <img style="width: 45px;height: 40px;position: absolute;top: 0px;left: 0px;"src="images/km.png">
                <p style="color: #fff;position: absolute;top: 25px;left: 15px;"> -
    <?php
    $gia_cu = $row_sale['gia_sp'];
    $tiet_kiem = $row_sale['tiet_kiem'];
    $phan_tram = floor(($tiet_kiem / $gia_cu) * 100);
    echo $phan_tram;
    ?> 
                    %</p>
                <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row_sale['id_sp']; ?>"><img class="sp" width="80" height="144" src="quantri/img/<?php echo $row_sale['anh_sp']; ?>"></a>
                <h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row_sale['id_sp']; ?>"><?php echo $row_sale['ten_sp']; ?></a></h3>
                
              
                <p class="price">Giá Mới :<?php echo number_format($row_sale['gia_sp'] - $row_sale['tiet_kiem']); ?><sup>đ</sup></p>
                <p><strike>Giá Cũ: <?php echo number_format($row_sale['gia_sp']); ?></strike><sup>đ</sup></p>
            </div>
            <?php
        }
        ?>
    </div>  

</div>
<div id="pagination">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?php echo $dsTrang; ?>
        </ul>
    </nav>
</div> 