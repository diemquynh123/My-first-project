<div style="background: #000">
    <video width="100%" height="450px"  autoplay loop muted>
        <source src="video/intro2.mp4" type="video/mp4">
        Your browser does not support the <code>video</code> tag.
    </video>
</div>
<?php

if (isset($_GET['page1'])) {
    $page1 = $_GET['page1'];
} else {
    $page1 = 1;
}
$soDMmottrang =8;
$perRow = $page1 * $soDMmottrang - $soDMmottrang;

$sql = "SELECT *FROM sanpham WHERE sl_da_ban>='40' ORDER BY sl_da_ban DESC LIMIT $perRow,$soDMmottrang";
$query = mysqli_query($conn, $sql);
$tongBanGhi = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sanpham WHERE sl_da_ban>='20'"));
$tongSoTrang = ceil($tongBanGhi / $soDMmottrang); //ceil là làm tròn
$dsTrang = "";

for ($i = 1; $i <= $tongSoTrang; $i++) {
    if ($page1 == $i) {
        $dsTrang .= ' <li class="active"><a href="index.php?page1=' . $i . '">' . $i . '</a></li>';
    } else {
        $dsTrang .= '<li><a href="index.php?page1=' . $i . '">' . $i . '</a></li>';
    }
}

?>


<div class="products">
    <h2 class="h2-bar">sản phẩm bán chạy</h2>
    <div class="row" style="margin-top: 15px;">
        <?php
        while ($row = mysqli_fetch_array($query)) {
            ?>  
            <div class="col-md-3 col-sm-6 product-item text-center">
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
                    echo '<p class="price">Giá:'. number_format($row['gia_sp']).'<sup>VNĐ</sup></p>';
                    }else {
                        $giamoi=$row['gia_sp']-$row['tiet_kiem'];
                        echo '<p class="price">Giá mới:'.number_format($giamoi).'<sup>VNĐ</sup></p>';
                        echo '<p><strike>Giá cũ:'.number_format($row['gia_sp']).'</strike><sup>VNĐ</sup></p>';
                    }
                ?>
                
                </div>
                <?php }
            ?>


            </div>
    <div id="pagination">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?php echo $dsTrang; ?>
        </ul>
    </nav>
</div> 

            <div id="slider">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
            <li data-target="#myCarousel" data-slide-to="5"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
            <div class="item active">
            <img src="images/sd1.jpg" alt="Chania">
            </div>

            <div class="item">
            <img src="images/sd2.jpg" alt="Chania">
            </div>

            <div class="item">
            <img src="images/sd3.jpg" alt="Flower">
            </div>

            <div class="item">
            <img src="images/sd4.jpg" alt="Flower">
            </div>

            <div class="item">
            <img src="images/sd5.jpg" alt="Flower">
            </div>

            <div class="item">
            <img src="images/sd6.jpg" alt="Flower">
            </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
            </div>
            </div>
    
            <?php
          
  $sql2 = "SELECT * FROM sanpham WHERE sp_moi=1 ORDER BY id_sp DESC LIMIT 8";
  $query2 = mysqli_query($conn, $sql2);
  ?>
            <div class="products">
            <h2 class="h2-bar">sản phẩm mới</h2>
            <div class="row" style="margin-top: 15px;">
            <?php
            while ($row2 = mysqli_fetch_array($query2)) {
                ?>               
                <div class="col-md-3 col-sm-6 product-item text-center">


               <?php
                if($row2['tiet_kiem']>0) {?>
                <img style="width: 43px;height: 42px;position: absolute;top: 0px;left: 0px;"src="images/km.png">
                <p style="color: #fff;position: absolute;top: 25px;left: 20px;">
                <?php
                $gia_cu = $row2['gia_sp'];
                $tiet_kiem = $row2['tiet_kiem'];
                $phan_tram = floor(($tiet_kiem / $gia_cu) * 100);
                echo '-'.$phan_tram.'%';
                }?>                
                </p>
                
               <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row2['id_sp']; ?>"><img width="100" height="144" src="quantri/img/<?php echo $row2['anh_sp']; ?>"></a>
                <h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row2['id_sp']; ?>"><?php echo $row2['ten_sp']; ?></a></h3>
                <?php
                if($row2['tiet_kiem']<=0) {
                    echo '<p class="price">Giá:'.number_format($row2['gia_sp']).'<sup>VNĐ</sup></p>';
                    }else {
                        $giamoi=$row2['gia_sp']-$row2['tiet_kiem'];
                        echo '<p class="price">Giá mới:'.number_format($giamoi).'<sup>VNĐ</sup></p>';
                        echo '<p><strike>Giá cũ:'.number_format($row2['gia_sp']).'</strike><sup>VNĐ</sup></p>';
                    }
                ?>
                
                
                </div>

    <?php
}
?>

            </div>
     </div>
            </div>


