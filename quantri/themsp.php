<?php
include_once 'ketnoi.php';
$sqlDm="SELECT * fROM dmsanpham";
$queryDm= mysqli_query($conn, $sqlDm);
if(isset($_POST['submit'])){
    $ten_sp=$_POST['ten_sp'];
    $gia_sp=$_POST['gia_sp'];
    $tiet_kiem=$_POST['tiet_kiem'];
    $sp_moi=$_POST['sp_moi'];
    $phu_kien=$_POST['phu_kien'];
    $tinh_trang=$_POST['tinh_trang'];
    $khuyen_mai=$_POST['khuyen_mai'];
    $chat_lieu=$_POST['chat_lieu'];
    $kich_thuoc=$_POST['kich_thuoc'];
    $day_deo=$_POST['day_deo'];
    $ngan_tui=$_POST['ngan_tui'];
    $mau_sac=$_POST['mau_sac'];
   $so_luong=$_POST['so_luong'];
    $chi_tiet_sp=$_POST['chi_tiet_sp'];
    if($_FILES['anh_sp']['name']==''){
        $error_anh_sp='<span style=color:red;"></span>';
    } else {
    $anh_sp=$_FILES['anh_sp']['name'];
$tmp_name=$_FILES['anh_sp']['tmp_name'];    
    }
    
    if($_POST['id_dm']=='unselect'){
    $error_anh_sp='<span style=color:red;"></span>';}
 else {
$id_dm=$_POST['id_dm'];    
}


if(isset($ten_sp)&& isset($gia_sp)&& isset($tiet_kiem)&& isset($chat_lieu)&& isset($kich_thuoc)&& isset($day_deo)&& isset($ngan_tui)&& isset($mau_sac)&& isset($phu_kien)&&isset($sp_moi)&& isset($so_luong) 
        && isset($tinh_trang)&& isset($khuyen_mai)  && isset($chi_tiet_sp)
                && isset($anh_sp) && isset($id_dm)){
    move_uploaded_file($tmp_name,'img/'.$anh_sp); 
    $sql="INSERT INTO sanpham(ten_sp,gia_sp,tiet_kiem,chat_lieu,kich_thuoc,day_deo,ngan_tui,mau_sac,phu_kien,tinh_trang,so_luong,anh_sp,"
            . "khuyen_mai,chi_tiet_sp,id_dm,sp_moi) VALUES ('$ten_sp','$gia_sp','$tiet_kiem','$chat_lieu',
            "."'$kich_thuoc','$day_deo','$ngan_tui','$mau_sac','$phu_kien',"
            . "'$tinh_trang','$so_luong','$anh_sp','$khuyen_mai','$chi_tiet_sp','$id_dm','$sp_moi')";
    $query= mysqli_query($conn,$sql);
    header('location:quantri.php?page layout=danhsachsp');
                }
}
?>
<div class="row">
        <ol class="breadcrumb">
            <li><a href="quantri.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active"></li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm sản phẩm mới</h1>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Thêm sản phẩm mới</div>
                <div class="panel-body">

                    <form method="post" enctype="multipart/form-data" role="form">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" class="form-control"  name="ten_sp" required="">
                            </div>
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input type="text" class="form-control" name="gia_sp" required="">
                            </div>
                             <div class="form-group">
                                <label>Giá tiết kiệm</label>
                                <input type="text" class="form-control" name="tiet_kiem" required="">
                            </div>
                            <div class="form-group">
                                <label>Đi kèm</label>
                                <input type="text" class="form-control" name="phu_kien" value="Hộp,dây đeo" required="">
                            </div>
                            <div class="form-group">
                                <label>Tình trạng</label>
                                <input type="text" class="form-control" name="tinh_trang" value="hàng nhập khẩu" required="">
                            </div>
                             <div class="form-group">
                                <label>Chất Liệu</label>
                                <input type="text" class="form-control" name="chat_lieu" value="da tổng hợp" required="">
                            </div>
                             <div class="form-group">
                                <label>Kích Thước</label>
                                <input type="text" class="form-control" name="kich_thuoc" value="24cm(dài) x 26cm(cao) x 11cm(rộng )" required="">
                            </div>
                             <div class="form-group">
                                <label>Dây Đeo</label>
                                <input type="text" class="form-control" name="day_deo" value="túi đeo chéo,xách tay" required="">
                            </div>
                             <div class="form-group">
                                <label>Ngăn Túi</label>
                                <input type="text" class="form-control" name="ngan_tui" value="2 ngăn chính lớn,1 ngăn phụ nhỏ" required="">
                            </div>
                             <div class="form-group">
                                <label>Màu Sắc</label>
                                <input type="text" class="form-control" name="mau_sac" value="màu" required="">
                            </div>
                            <div class="form-group">
                                <label>Số Lượng</label>
                                <input type="text" class="form-control" name="so_luong" value="0" required="">
                            </div>
                           

                            <div class="form-group">
                                <label>Ảnh mô tả</label>
                                <input type="file" name="anh_sp">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Khuyến mãi</label>
                                <input type="text" class="form-control" name="khuyen_mai" value="tặng kèm ví" required="">
                            </div>
                            <div class="form-group">
                               
                                <label>Thương Hiệu</label>
                                <select name="id_dm" class="form-control">
                                    <option value="unselect" selected>Lựa chọn nhà cung cấp</option> 
                                <?php
                                while($rowDm = mysqli_fetch_array($queryDm)) {                                              
                                ?>
                                    <option value="<?php echo $rowDm['id_dm'];?>"><?php echo $rowDm['ten_dm'];?></option>
                                    
                               
                                <?php
                                }
                                ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Thông tin chi tiết sản phẩm</label>
                                <textarea class="form-control" rows="3" name="chi_tiet_sp"></textarea>
                            </div>
                            <div class="form-group">
                                        <label>Sản phẩm mới</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="sp_moi" id="optionsRadios1" value=1>Có
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="sp_moi" id="optionsRadios2" value=0 checked>Không
                                            </label>
                                        </div>

                                    </div>



                        </div>

                        <button type="submit" class="btn btn-primary" name="submit" style="background: #13a6ef;">Thêm mới</button>
                        <button type="reset" class="btn btn-default" name="reset">Làm mới</button>


                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->




