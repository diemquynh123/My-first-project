<script>
function xoa(){
    var del=confirm("Bạn Chắc Chắn Muốn Xóa Sản Phẩm Này Khỏi Giỏ Hàng !");
    return del;
}
</script>
<link rel="stylesheet" href="css/giohang.css">
<div id="cart">
    <h2 class="h2-bar">giỏ hàng của bạn</h2>
    <?php
    if(isset($_SESSION['giohang'])){
        if(isset($_POST['sl'])){
            foreach ($_POST['sl'] as $id_sp=>$sl){//vòng lặp duyệt mảng
                if($sl==0){
                    unset($_SESSION['giohang'][$id_sp]);
                }
                elseif ($sl>0) {
                    $_SESSION['giohang'][$id_sp]=$sl;
                
            }
        }
        }
        $arrId= array();
        foreach ($_SESSION['giohang']as $id_sp=>$sl) {
            $arrId[]=$id_sp;
        }
        $strId= implode(',', $arrId);
        $sql="SELECT * FROM sanpham WHERE id_sp IN($strId) ORDER BY id_sp DESC";
        $query= mysqli_query($conn, $sql);
        
    ?>
    <form method="post" id="giohang">
    <table id="cart" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:40%;font-size: 15px;">Sản phẩm</th>
                <th style="width:10%;font-size: 15px;">Giá</th>
                <th style="width:10%;font-size: 15px;">Số lượng</th>
                <th style="width:30%;font-size: 15px;" class="text-center">Tổng tiền</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <!-- Product Item -->
        <?php
        $tongtien=0;
            while($row= mysqli_fetch_array($query)){
                if($sl<=$row['so_luong']){
            if($row['tiet_kiem']>0){
            $giamoi=$row['gia_sp']-$row['tiet_kiem'];
            $tongtien1sp=$giamoi*$_SESSION['giohang'][$row['id_sp']];
            }else
            {
              $tongtien1sp=$row['gia_sp']*$_SESSION['giohang'][$row['id_sp']];  
                }}
 else {
     echo '<script>alert("số lượng trong kho không đủ")</script>';
     if($row['tiet_kiem']>0){
     $giamoi=$row['gia_sp']-$row['tiet_kiem'];}
 }
            
        ?>
        <tbody>
            <tr>
                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-2 hidden-xs"><img src="quantri/img/<?php echo $row['anh_sp']; ?>" alt="..." class="img-responsive"/></div>
                        <div class="col-sm-10">
                            <h5 style="color: red;"><?php echo $row['ten_sp']; ?></h5>
                        </div>
                    </div>
                </td>
                <td data-th="Price" style="color: #000;"><?php if($row['tiet_kiem']>0){echo number_format($giamoi);}else { echo number_format($row['gia_sp']);} ?><sup>đ</sup></td>
                <td data-th="Quantity">
                    <input name="sl[<?php echo $row['id_sp']; ?>]" type="number" min="1" max="<?php echo $row['so_luong'] ?>" class="form-control text-center" value="<?php echo $_SESSION['giohang'][$row['id_sp']]; ?>">
                </td>
                <td data-th="Subtotal" class="text-center"><span><?php  if($sl<=$row['so_luong']){ echo number_format($tongtien1sp);}else{echo 0;} ?><sup>đ</sup></span></td>
                <td class="actions" data-th="">
                    <a onclick="return xoa()"  href="chucnang/giohang/xoahang.php?id_sp=<?php echo $row['id_sp']; ?>">Xóa</a>                              
                </td>
            </tr>
        </tbody>
        <?php 
        if(isset($tongtien)&&isset($tongtien1sp)){
        $tongtien+=$tongtien1sp;}   
        } ?>
        <!-- End Product Item -->
        <tfoot>
            <tr class="visible-xs">
               
                <td class="text-center"><strong>Total <span><?php echo number_format($tongtien); ?></span></strong></td>
            </tr>
            <tr>
                <td>
                    <a href="index.php" class="btn btn-warning">Tiếp tục mua hàng</a>
                    <button  name="cap_nhat" class="btn btn-default" onclick="document.getElementById('giohang').submit();">Cập Nhật Giỏ Hàng</button>  
                   
                </td>
                <td colspan="2" class="hidden-xs">
                    <a href="chucnang/giohang/xoahang.php?id_sp=0" class="btn btn-default" style="color: red;">Xóa Toàn Bộ</a>
                </td>
                <td class="hidden-xs text-center"><strong style="color: #000;">Thành Tiền: <span><?php echo number_format($tongtien); ?></span></strong></td>
                <td><a href="index.php?page_layout=muahang" class="btn btn-info btn-block">Thanh toán</a></td>
            </tr>
        </tfoot>
    </table>
    </form>
    <?php
    } else {
        echo '<script> alert("Hiện Không Có Sản Phẩm Nào Trong Giỏ Hàng Của Bạn !");
            window.location="index.php";
         </script>';    
    }

    ?>
</div>