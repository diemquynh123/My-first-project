<?php
if (isset($_GET['muc'])) {
    $muc = $_GET['muc'];
}
?>
<?php
if ($muc == 1) {
    $sql = "SELECT * FROM sanpham WHERE gia_sp>=0 AND gia_sp<=1500000 ORDER BY (gia_sp-tiet_kiem) ASC";
    $query = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($query);
    ?>

    <div class="products">
        <h2 class="h2-bar">Tìm Được <?php echo $numrows; ?> Sản Phẩm Có Giá Nhỏ Hơn 1.500.000<sup>đ</sup> </h2>
        <div class="row">
    <?php
    while ($row = mysqli_fetch_array($query)) {
        ?>
                <div class="col-md-3 col-sm-6 product-item text-center" style="margin-top: 15px;">
                <?php
                if ($row['tiet_kiem'] > 0) {
                    $gia_cu = $row['gia_sp'];
                    $tiet_kiem = $row['tiet_kiem'];
                    $phan_tram = floor(($tiet_kiem / $gia_cu) * 100); //floor là hàm làm tròn lên hoặc xuống
                    echo '<img style="width: 43px;height: 42px;position: absolute;top: 0px;left: 0px;"src="images/km.png">';
                    echo '<p style="color: #fff;position: absolute;top: 25px;left: 20px;"> -' . $phan_tram . ' %</p>';
                }
                ?>
                    <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>"><img class="sp" width="80" height="144" src="quantri/img/<?php echo $row['anh_sp']; ?>"></a>
                    <h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>"><?php echo $row['ten_sp']; ?></a></h3>   
                    <!--kiểm tra có phải sản phẩm km không và hiện giá-->
        <?php
        if ($row['tiet_kiem'] > 0) {
            $gia_moi = $row['gia_sp'] - $row['tiet_kiem'];
            echo '<p class="price">Giá Mới :' .number_format($gia_moi) . ' <sup>đ</sup></p>';
            echo '<p><strike>Giá Cũ :' .number_format($row["gia_sp"]) . '</strike><sup>đ</sup></p>';
        } else {
            echo '<p class="price">Giá :' .number_format($row["gia_sp"]) . '<sup>đ</sup></p>';
        }
        ?>
                </div>
                    <?php
                }
                ?>
        </div>
    </div> 

    <?php
} elseif ($muc == 2) {

    $sql = "SELECT * FROM sanpham WHERE gia_sp>=1500000 AND gia_sp<=2000000 ORDER BY (gia_sp-tiet_kiem) ASC";
    $query = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($query);
    ?>
    <div class="products">
        <h2 class="h2-bar">Tìm Được <?php echo $numrows; ?> Sản Phẩm Có Giá Từ 1.500.000<sup>đ</sup> - 2.000.000<sup>đ</sup></h2>
        <div class="row">
    <?php
    while ($row = mysqli_fetch_array($query)) {
        ?>
                <div class="col-md-3 col-sm-6 product-item text-center"  style="margin-top: 15px;">
                <?php
                //kiểm tra nếu là sp khuyến mãi thì hiện ra
                if ($row['tiet_kiem'] > 0) {
                    $gia_cu = $row['gia_sp'];
                    $tiet_kiem = $row['tiet_kiem'];
                    $phan_tram = floor(($tiet_kiem / $gia_cu) * 100); //floor là hàm làm tròn lên hoặc xuống
                    echo '<img style="width: 43px;height: 42px;position: absolute;top: 0px;left: 0px;"src="images/km.png">';
                    echo '<p style="color: #fff;position: absolute;top: 25px;left: 20px;"> -' . $phan_tram . ' %</p>';
                }
                ?>
                    <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>"><img class="sp" width="80" height="144" src="quantri/img/<?php echo $row['anh_sp']; ?>"></a>
                    <h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>"><?php echo $row['ten_sp']; ?></a></h3>
                    <!--kiểm tra có phải sản phẩm km không và hiện giá-->
        <?php
        if ($row['tiet_kiem'] > 0) {
            $gia_moi = $row['gia_sp'] - $row['tiet_kiem'];
            echo '<p class="price">Giá Mới :' .number_format($gia_moi) . ' <sup>đ</sup></p>';
            echo '<p><strike>Giá Cũ :' . number_format($row["gia_sp"]) . '</strike><sup>đ</sup></p>';
        } else {
            echo '<p class="price">Giá :' .number_format($row["gia_sp"]) . '<sup>đ</sup></p>';
        }
        ?>
                </div>
                    <?php
                }
                ?>
        </div>
    </div>
   
    <?php
} elseif ($muc == 3) {
    $sql = "SELECT * FROM sanpham WHERE gia_sp>=2000000 AND gia_sp<=2500000 ORDER BY (gia_sp-tiet_kiem) ASC";
    $query = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($query);
    ?>
    <div class="products">
        <h2 class="h2-bar">Tìm Được <?php echo $numrows; ?> Sản Phẩm Có Giá Từ 2.000.000<sup>đ</sup> - 2.500.000<sup>đ</sup></h2>
        <div class="row">
    <?php
    while ($row = mysqli_fetch_array($query)) {
        ?>
                <div class="col-md-3 col-sm-6 product-item text-center"  style="margin-top: 15px;">
        <?php
        if ($row['tiet_kiem'] > 0) {
            $gia_cu = $row['gia_sp'];
            $tiet_kiem = $row['tiet_kiem'];
            $phan_tram = floor(($tiet_kiem / $gia_cu) * 100); //floor là hàm làm tròn lên hoặc xuống
            echo '<img style="width: 43px;height: 42px;position: absolute;top: 0px;left: 0px;"src="images/km.png">';
            echo '<p style="color: #fff;position: absolute;top: 25px;left: 20px;"> -' . $phan_tram . ' %</p>';
        }
        ?>
                    <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>"><img class="sp" width="80" height="144" src="quantri/img/<?php echo $row['anh_sp']; ?>"></a>
                    <h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>"><?php echo $row['ten_sp']; ?></a></h3>
                    <!--kiểm tra có phải sản phẩm khuyến mãi không và hiện giá cách 2 full php(OK)-->
                    <?php
                    if ($row['tiet_kiem'] > 0) {
                        $gia_moi = $row['gia_sp'] - $row['tiet_kiem'];
                        echo '<p class="price">Giá Mới :' . number_format($gia_moi) . ' <sup>đ</sup></p>';
                        echo '<p><strike>Giá Cũ :' .number_format( $row["gia_sp"] ). '</strike><sup>đ</sup></p>';
                    } else {
                        echo '<p class="price">Giá :' .number_format( $row["gia_sp"]) . '<sup>đ</sup></p>';
                    }
                    ?>
                </div>
                    <?php
                }
                ?>
        </div>
    </div> 
    <?php
} else {
    $sql = "SELECT * FROM sanpham WHERE gia_sp>=2500000 ORDER BY (gia_sp-tiet_kiem) ASC";
    $query = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($query);
    ?>
    <div class="products">
        <h2 class="h2-bar">Tìm Được <?php echo $numrows; ?> Sản Phẩm Có Giá Trên 2.500.000<sup>đ</sup> </h2>
        <div class="row">
    <?php
    while ($row = mysqli_fetch_array($query)) {
        ?>
                <div class="col-md-3 col-sm-6 product-item text-center"  style="margin-top: 15px;">
        <?php
        if ($row['tiet_kiem'] > 0) {
            $gia_cu = $row['gia_sp'];
            $tiet_kiem = $row['tiet_kiem'];
            $phan_tram = floor(($tiet_kiem / $gia_cu) * 100); //floor là hàm làm tròn lên hoặc xuống
            echo '<img style="width: 43px;height: 42px;position: absolute;top: 0px;left: 0px;"src="images/km.png">';
            echo '<p style="color: #fff;position: absolute;top: 25px;left: 20px;"> -' . $phan_tram . ' %</p>';
        }
        ?>
                    <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>"><img class="sp" width="80" height="144" src="quantri/img/<?php echo $row['anh_sp']; ?>"></a>
                    <h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>"><?php echo $row['ten_sp']; ?></a></h3>
               
                    <!--kiểm tra có phải sản phẩm km không và hiện giá cách 1 (code dài hơn)-->
                    <?php if ($row['tiet_kiem'] > 0) {
                        $gia_moi = $row['gia_sp'] - $row['tiet_kiem'];
                        ?>
                        <p class="price">Giá Mới :<?php echo number_format($gia_moi); ?> <sup>đ</sup></p>
                        <p><strike>Giá Cũ :<?php echo number_format($row["gia_sp"]); ?></strike><sup>đ</sup></p>

            <?php
        } else {
            ?>
                        <p class="price">Giá :<?php echo number_format($row["gia_sp"]); ?> <sup>đ</sup></p>
                        <?php
                    }
                    ?>
                </div>
                    <?php
                }
                ?>
        </div>
    </div>
    <!-- Pagination -->
    <div id="pagination">
        <nav aria-label="Page navigation">
            <ul class="pagination">

            </ul>
        </nav>
    </div>  
    <?php
}
?>