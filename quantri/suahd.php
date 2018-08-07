<?php 
include_once 'ketnoi.php';
$id_od=$_GET['id_od'];

$sql="SELECT * FROM orders WHERE id_od=$id_od";
$query= mysqli_query($conn, $sql);
$row= mysqli_fetch_array($query);

if(isset($_POST['submit'])){
    $ten=$_POST['ten_kh'];
    $mail=$_POST['email'];
    $dc=$_POST['dia_chi'];
    $mobi=$_POST['dien_thoai'];
    $so_luong=$_POST['tong_sl_sp'];
    $tong_tien=$_POST['tong_tien'];
    $ngaygio=$_POST['created_at'];
    
    
    if(isset($ten) && isset($mail)  && isset($so_luong) && isset($dc) && 
            isset($mobi) && isset($tong_tien) && 
            isset($ngaygio) ){

        $sql="UPDATE orders SET ten_kh='$ten',email='$mail',tong_sl_sp='$so_luong',dia_chi='$dc',"
                . "dien_thoai='$mobi',tong_tien='$tong_tien',"
                . "created_at='$ngaygio' WHERE id_od='$id_od'";
        $query= mysqli_query($conn, $sql);
        header('location: quantri.php?page_layout=qlhoadon');
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
        <h1 class="page-header">Sửa Thông Tin Hóa Đơn</h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Sửa Thông Tin Hóa Đơn</div>
            <div class="panel-body">

                <form method="post" enctype="multipart/form-data" role="form">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tên Khách Hàng</label>
                            <input type="text" class="form-control"  name="ten_kh" value="<?php if(isset($_POST['ten_kh'])){echo $_POST['ten_kh'];} else{echo $row['ten_kh'];} ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} else{ echo $row['email'];} ?>" required="">
                        </div>
                                            

                        <div class="form-group">
                            <label>Địa Chỉ</label>
                            <input type="text" class="form-control" name="dia_chi" value="<?php if(isset($_POST['dia_chi'])){echo $_POST['dia_chi'];} else{ echo $row['dia_chi'];} ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Điện Thoại</label>
                            <input type="text" class="form-control" name="dien_thoai" value="<?php if(isset($_POST['dien_thoai'])){echo $_POST['dien_thoai'];}  else{echo $row['dien_thoai'];} ?>" required="">
                        </div>


                    </div>
                    <div class="col-md-6">
                          <div class="form-group">
                            <label>Số Lượng</label>
                            <input type="text" class="form-control" name="tong_sl_sp" value="<?php if(isset($_POST['tong_sl_sp'])){echo $_POST['tong_sl_sp'];} else{ echo $row['tong_sl_sp'];} ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Tổng Tiền</label>
                            <input type="text" class="form-control" name="tong_tien" value="<?php if(isset($_POST['tong_tien'])){echo $_POST['tong_tien'];} else{ echo $row['tong_tien'];} ?>" required="">
                        </div>    

                       <div class="form-group">
                            <label>Ngày Giờ</label>
                            <input type="date-time" class="form-control" name="created_at" value="<?php if(isset($_POST['created_at'])){echo $_POST['created_at'];} else{ echo $row['created_at'];} ?>" required="">
                        </div>



                    </div>

                    <button type="submit" class="btn btn-primary" name="submit" style="background: #13a6ef;">Cập nhật</button>
                    <button type="reset" class="btn btn-default" name="reset">Làm mới</button>


                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->

