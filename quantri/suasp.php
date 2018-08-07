<?php 
include_once 'ketnoi.php';
$id_sp=$_GET['id_sp'];

$sqlDm="SELECT * FROM dmsanpham";
$queryDm= mysqli_query($conn, $sqlDm);

$sql="SELECT * FROM sanpham WHERE id_sp=$id_sp";
$query= mysqli_query($conn, $sql);
$row= mysqli_fetch_array($query);

if(isset($_POST['submit'])){
    $ten_sp=$_POST['ten_sp'];
    $gia_sp=$_POST['gia_sp'];
    $tiet_kiem=$_POST['tiet_kiem'];
    $so_luong=$_POST['so_luong'];
    $phu_kien=$_POST['phu_kien'];
    $tinh_trang=$_POST['tinh_trang'];
    $khuyen_mai=$_POST['khuyen_mai'];
    $chat_lieu=$_POST['chat_lieu'];
    $kich_thuoc=$_POST['kich_thuoc'];
    $day_deo=$_POST['day_deo'];
    $ngan_tui=$_POST['ngan_tui'];
    $mau_sac=$_POST['mau_sac'];
    $sp_moi=$_POST['sp_moi'];
    $chi_tiet_sp=$_POST['chi_tiet_sp'];
    
    if($_FILES['anh_sp']['name']==""){
        $anh_sp=$_POST['anh_sp'];
    }
    else{
        $anh_sp=$_FILES['anh_sp']['name'];
        $tmp_name=$_FILES['anh_sp']['tmp_name'];
    }
    
    $id_dm=$_POST['id_dm'];
    
   
    
    if(isset($ten_sp)&&isset($sp_moi) && isset($gia_sp)&& isset($tiet_kiem)&& isset($chat_lieu)&& isset($kich_thuoc)&& isset($day_deo)&& isset($ngan_tui)&& isset($mau_sac)  && isset($so_luong) && isset($phu_kien) && 
            isset($tinh_trang) && isset($khuyen_mai) && 
            isset($chi_tiet_sp) ){
        move_uploaded_file($tmp_name, 'img/'.$anh_sp);
        $sql="UPDATE sanpham SET ten_sp='$ten_sp',gia_sp='$gia_sp',tiet_kiem='$tiet_kiem',chat_lieu='$chat_lieu',kich_thuoc='$kich_thuoc',day_deo='$day_deo',ngan_tui='$ngan_tui',mau_sac='$mau_sac',phu_kien='$phu_kien',so_luong='$so_luong',khuyen_mai='$khuyen_mai',"
                . "phu_kien='$phu_kien',tinh_trang='$tinh_trang',"
                . "chi_tiet_sp='$chi_tiet_sp',anh_sp='$anh_sp',id_dm='$id_dm',sp_moi='$sp_moi' WHERE id_sp=$id_sp";
        $query= mysqli_query($conn, $sql);
        header('location: quantri.php?page_layout=danhsachsp');
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
        <h1 class="page-header">Sửa thông tin sản phẩm</h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Sửa thông tin sản phẩm</div>
            <div class="panel-body">

                <form method="post" enctype="multipart/form-data" role="form">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" class="form-control"  name="ten_sp" value="<?php if(isset($_POST['ten_sp'])){echo $_POST['ten_sp'];} else{echo $row['ten_sp'];} ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Giá sản phẩm</label>
                            <input type="text" class="form-control" name="gia_sp" value="<?php if(isset($_POST['gia_sp'])){echo $_POST['gia_sp'];} else{ echo $row['gia_sp'];} ?>" required="">
                        </div>
                          <div class="form-group">
                            <label>Giá tiết kiệm</label>
                            <input type="text" class="form-control" name="tiet_kiem" value="<?php if(isset($_POST['tiet_kiem'])){echo $_POST['tiet_kiem'];} else{ echo $row['tiet_kiem'];} ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Số Lượng</label>
                            <input type="text" class="form-control" name="so_luong" value="<?php if(isset($_POST['so_luong'])){echo $_POST['so_luong'];} else{ echo $row['so_luong'];} ?>" required="">
                        </div>

                       

                        <div class="form-group">
                            <label>Đi kèm</label>
                            <input type="text" class="form-control" name="phu_kien" value="<?php if(isset($_POST['phu_kien'])){echo $_POST['phu_kien'];} else{ echo $row['phu_kien'];} ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Tình trạng</label>
                            <input type="text" class="form-control" name="tinh_trang" value="<?php if(isset($_POST['tinh_trang'])){echo $_POST['tinh_trang'];}  else{echo $row['tinh_trang'];} ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Chất Liệu</label>
                            <input type="text" class="form-control" name="chat_lieu" value="<?php if(isset($_POST['chat_lieu'])){echo $_POST['chat_lieu'];} else{ echo $row['chat_lieu'];} ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Kích Thước</label>
                            <input type="text" class="form-control" name="kich_thuoc" value="<?php if(isset($_POST['kich_thuoc'])){echo $_POST['kich_thuoc'];} else{ echo $row['kich_thuoc'];} ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Dây Đeo</label>
                            <input type="text" class="form-control" name="day_deo" value="<?php if(isset($_POST['day_deo'])){echo $_POST['day_deo'];} else{ echo $row['day_deo'];} ?>" required="">
                        </div>

                        <div class="form-group">
                            <label>Ảnh mô tả</label>
                            <input type="file" name="anh_sp"><input type="hidden" name="anh_sp"	  value="<?php echo $row['anh_sp']; ?>" />
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ngăn Túi</label>
                            <input type="text" class="form-control" name="ngan_tui" value="<?php if(isset($_POST['ngan_tui'])){echo $_POST['ngan_tui'];} else{ echo $row['ngan_tui'];} ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Màu Sắc</label>
                            <input type="text" class="form-control" name="mau_sac" value="<?php if(isset($_POST['mau_sac'])){echo $_POST['mau_sac'];} else{ echo $row['mau_sac'];} ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Khuyến mãi</label>
                            <input type="text" class="form-control" name="khuyen_mai" value="<?php if(isset($_POST['khuyen_mai'])){echo $_POST['khuyen_mai'];} else{ echo $row['khuyen_mai'];} ?>" required="">
                        </div>   


                        <div class="form-group">
                            <label>Thương Hiệu</label>
                            <select name="id_dm" class="form-control">
                                <?php
                                while($rowDm= mysqli_fetch_array($queryDm)){
                                ?>
                                <option 
                                    <?php
                                    if($row['id_dm']==$rowDm['id_dm']){
                                        echo 'selected="selected"';
                                    }
                                    ?>
                                    value="<?php echo $rowDm['id_dm']; ?>"><?php echo $rowDm['ten_dm']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                         <div class="form-group">
                                        <label>Sản phẩm mới</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio"
                                                <?php
                                                if($row['sp_moi']==1){echo 'checked';}
                                                ?>
                                                 name="sp_moi" id="optionsRadios1" value=1>Có
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio"
                                                <?php
                                                if($row['sp_moi']==0){echo 'checked';}
                                                ?>
                                                 name="sp_moi" id="optionsRadios2" value=0 >Không
                                            </label>
                                        </div>

                                    </div>
                        <div class="form-group">
                            <label>Thông tin chi tiết sản phẩm</label>
                            <textarea required="" class="form-control" rows="3" name="chi_tiet_sp"><?php if(isset($_POST['chi_tiet_sp'])){echo $_POST['chi_tiet_sp'];} else{echo $row['chi_tiet_sp'];}?></textarea>
                          
                        </div>



                    </div>

                    <button type="submit" class="btn btn-primary" name="submit" style="background: #13a6ef;">Cập nhật</button>
                    <button type="reset" class="btn btn-default" name="reset">Làm mới</button>


                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->

