
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<?php
$id_sp = $_GET['id_sp'];
$sql = "SELECT * FROM sanpham WHERE id_sp=$id_sp";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

$gia_moi = $row['gia_sp'] - $row['tiet_kiem'];

$sql_a="SELECT * FROM chitietsp WHERE id_sp=$id_sp ORDER BY id_chi_tiet ASC";
$query_a= mysqli_query($conn, $sql_a);

if(isset($_SESSION['user'])){
    $email=$_SESSION['user'];

    $sql_check="SELECT * FROM spdaxem WHERE email='$email' AND id_sp='$id_sp'";
    $query_check=mysqli_query($conn,$sql_check);
    $numrow_check=mysqli_num_rows($query_check);

    if($numrow_check==0){
    $sql_ls="INSERT INTO spdaxem(email,id_sp) VALUES('$email','$id_sp')";
    $query_ls=mysqli_query($conn,$sql_ls);
    }
}
?>

<div id="product">
    <div id="prd-thumb" class="col-md-8 col-sm-12 col-xs-12 text-center">
        <div class="row">
            <div id="prd-thumb" class="col-md-3 col-sm-12 col-xs-12 text-center">
                
            <?php
            while ($row_a= mysqli_fetch_array($query_a)){
            ?>
            
            <div class="column">
                <img src="quantri/img/<?php echo $row_a['anh_sp'];?>" style="width:100%" onload="myFunction(this);" onclick="myFunction(this);">
            </div>
            <?php } ?>
            </div>      
            <div class="container-1 col-md-9">
            <span onclick="this.parentElement.style.display = 'none'" class="closebtn">&times;</span>
            <img id="expandedImg" style="width:100%;">
            <div id="imgtext"></div>
        </div>

        </div>
        

    </div>
    <div id="prd-intro" class="col-md-4 col-sm-12 col-xs-12">
        <h2  style="color: red;"><span style="color: #000;font-size: 18px;"> </span><?php echo $row['ten_sp']; ?></h2>
    
        <table class="table">
             <tr>
                <td><label><p>GIÁ</p> </label></td>
                <td><b  style="color: red;"><span class="tl"><?php echo number_format($gia_moi); ?></span><sup>đ</sup></b></span></td>
            </tr>
            <tr>
                <td><label><p>ĐI KÈM</p></label></td>
                <td class="tl"><?php echo $row['phu_kien']; ?></td>
            </tr>
            <tr>
                <td><label><p>TÌNH TRẠNG </p></label></td>
                <td class="tl"><?php echo $row['tinh_trang']; ?></td>
            </tr>
            <tr>
                <td><label><p>KHUYẾN MẠI </p></label></td>
                <td class="tl"><?php echo $row['khuyen_mai']; ?></td>
            </tr>
           
            <tr>
                <td><label><p>CHẤT LIỆU </p></label></td>
                <td class="tl"><?php echo $row['chat_lieu']; ?></td>
            </tr>
            <tr>
                <td><label><p>KÍCH THƯỚC</p> </label></td>
                <td class="tl"><?php echo $row['kich_thuoc']; ?></td>
            </tr>
            <tr>
                <td><label><p>DÂY ĐEO </p></label></td>
                <td class="tl"><?php echo $row['day_deo']; ?></td>
            </tr>
            <tr>
                <td><label><p>NGĂN TÚI</p> </label></td>
                <td class="tl"><?php echo $row['ngan_tui']; ?></td>
            </tr>
               <tr>
                <td><label><p>MÀU SẮC </p></label></td>
                <td class="tl"><?php echo $row['mau_sac']; ?></td>
            </tr>
        </table>
        <?php
     if($row['so_luong']==0){
            ?>
             <tr>
                <td><p style="color: red;">SẢN PHẨM TẠM HẾT HÀNG</p></td>
            </tr>
       <?php } ?>        
            
        </table>
        <?php
        if($row['so_luong']>0){
        ?>
        <a href="chucnang/giohang/themhang.php?id_sp=<?php echo $row['id_sp'];?>"><button type="button" class="btn btn-danger">đặt mua</button></a>
        <?php } ?>
    </div> 
    <div id="prd-details" class="col-md-12 col-sm-12 col-xs-12 text-justify">
        <p>Nhận xét về sản phẩm:
            <?php echo $row['chi_tiet_sp']; ?>
        </p>
    </div>
</div> 

<!-- sản phẩm đã xem -->
<?php
if(isset($_SESSION['user'])){
    $id_sp = $_GET['id_sp'];
    $email=$_SESSION['user'];
    $sql_checkls="SELECT * FROM sanpham JOIN spdaxem ON sanpham.id_sp=spdaxem.id_sp WHERE sanpham.id_sp!='$id_sp' AND email='$email' ORDER BY id_ls DESC LIMIT 4";
    $query_checkls=mysqli_query($conn,$sql_checkls);


?>

<div class="products">

    <h2 class="h2-bar">Sản Phẩm Bạn Đã Xem</h2> <br/>
    <div class="row">
        <?php
        while ($row_checkls = mysqli_fetch_array($query_checkls)) {
            ?>  
            <div class="col-md-3 col-sm-6 product-item text-center"  style="border: 1px solid #333; padding-top: 15px;">
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
<a href="index.php?page_layout=spdaxem"><span>Xem Thêm>></span></a>
 </div>


 <?php
} //end if
 ?>


<?php
if(isset($_POST['submit'])){
    $ten=$_POST['ten'];
    $dien_thoai=$_POST['dien_thoai'];
    $binh_luan=$_POST['binh_luan'];
    
    //xu ly them moi binh luan
    $ngay_gio=date("Y-m-d H:i:s");
    if(isset($ten)&&isset($dien_thoai)&&isset($binh_luan)){
        $sql="INSERT INTO danhgiasp(ten,dien_thoai,binh_luan,ngay_gio,id_sp) VALUES('$ten','$dien_thoai',"
                . "'$binh_luan','$ngay_gio','$id_sp')";
        $query= mysqli_query($conn, $sql);
        header('location: index.php?page_layout=chitietsp&id_sp='.$id_sp);
    }
}
?>

<!-- phần sản phẩm tương tự -->
<?php
$gia_moi = $row['gia_sp'] - $row['tiet_kiem'];
$sql_ss="SELECT * FROM sanpham WHERE ABS(gia_sp-tiet_kiem-'$gia_moi')<=300000 AND id_sp!='$id_sp' ORDER BY gia_sp ASC LIMIT 4";
$query_ss=mysqli_query($conn,$sql_ss);

?>
<div class="products">
    <h2 class="h2-bar">Sản Phẩm Tương Tự</h2> <br/>
    <div class="row">
        <?php
        while ($row_ss = mysqli_fetch_array($query_ss)) {
            ?>  
            <div class="col-md-3 col-sm-6 product-item text-center"  style="border: 1px solid #333; padding-top: 15px;">
                <?php
                if($row_ss['tiet_kiem']>0) {?>
                <img style="width: 43px;height: 42px;position: absolute;top: 0px;left: 0px; "src="images/km.png">
                <p style="color: #fff;position: absolute;top: 25px;left: 20px;">
                <?php
                $gia_cu = $row_ss['gia_sp'];
                $tiet_kiem = $row_ss['tiet_kiem'];
                $phan_tram = floor(($tiet_kiem / $gia_cu) * 100);
                echo '-'.$phan_tram.'%';
                }?> 
                
                </p>


                <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row_ss['id_sp']; ?>"><img width="100" height="144" src="quantri/img/<?php echo $row_ss['anh_sp']; ?>"></a>
                <h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row_ss['id_sp']; ?>"><?php echo $row_ss['ten_sp']; ?></a></h3>
                <?php
                if($row_ss['tiet_kiem']<=0) {
                    echo '<p class="price">Giá:'.number_format($row_ss['gia_sp']).'<sup>VNĐ</sup></p>';
                    }else {
                        $giamoi=$row_ss['gia_sp']-$row_ss['tiet_kiem'];
                        echo '<p class="price">Giá mới:'.number_format($giamoi).'<sup>VNĐ</sup></p>';
                        echo '<p><strike>Giá cũ:'.number_format($row_ss['gia_sp']).'</strike><sup>VNĐ</sup></p>';
                    }
                ?>
                
                </div>
                <?php }
            ?>
</div>
 </div>

<div id="comment" class="col-md-8 col-sm-9 col-xs-12">
    <h3>Bình luận sản phẩm</h3>

 <!--    <form method="post" action="index.php?page_layout=chitietsp&id_sp=<?php echo $id_sp;?>">
        <div class="form-group">
            <label>Tên</label>
            <input type="text" name="ten" required="" class="form-control" placeholder="nhập tên...">
        </div>
        <div class="form-group">
            <label>Điện thoại</label>
            <input type="text" required="" name="dien_thoai" class="form-control" placeholder="số điện thoại">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Nội dung</label>
            <textarea class="form-control" name="binh_luan" required="" placeholder="hãy đánh giá sản phẩm..."></textarea >
        </div>
        <button type="submit" name="submit" class="btn btn-default">Bình luận</button>
    </form> -->
    <div class="fb-comments" data-href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp'];?>" data-width="100%" data-numposts="10"></div>
</div>
<?php
if(isset($_GET['page'])){
    $page=$_GET['page'];
}
else{
    $page=1;
}

$rowsPerPage=3;
$perRow=$page*$rowsPerPage-$rowsPerPage;

$sqlBl="SELECT * FROM danhgiasp WHERE id_sp=$id_sp ORDER BY id_bl ASC LIMIT $perRow,$rowsPerPage";
$queryBl= mysqli_query($conn, $sqlBl);

//tong so ban ghi(tong so binh luan)
$totalRows= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM danhgiasp WHERE id_sp=$id_sp"));
//tong so trang
$totalPages=ceil($totalRows/$rowsPerPage);

//xay dung thanh phan trang
$listPage="";
for($i=1; $i<=$totalPages;$i++){
    if($page==$i){
        $listPage.='<li class="active"><a href="index.php?page_layout=chitietsp&id_sp='.$id_sp.'&page='.$i.'">'.$i.'</a></li>';
    }
    else{
        $listPage.='<li><a href="index.php?page_layout=chitietsp&id_sp='.$id_sp.'&page='.$i.'">'.$i.'</a></li>';
    }
}

$totalBl= mysqli_num_rows($queryBl);
if($totalBl>0){
?>
<div id="comments" class="col-md-12 col-sm-12 col-xs-12">
    <h3 style="color: #333;">ĐÁNH GIÁ CỦA KHÁCH HÀNG</h3>
    <?php
    while($row= mysqli_fetch_array($queryBl)){
    ?>
    <ul>
        <li class="comm-name"><?php echo $row['ten']; ?></li>
        <li class="comm-time"><?php echo $row['ngay_gio']; ?></li>
        <li class="comm-details" >
            <p>
                <?php echo $row['binh_luan']; ?>
            </p>
        </li>
    </ul>
    <?php
    }
    ?>
</div>
<?php
}
?>

<!-- Pagination -->
<div id="pagination" class="col-md-12 col-sm-12 col-xs-12">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?php
            echo $listPage;
            ?>
        </ul>
    </nav>
</div>    


<!-- End Pagination -->  
