<?php
include_once 'ketnoi.php';
$id_tv=$_GET['id_tv'];
if(isset($_POST['submit'])){
    $tentv = $_POST['ten_tv'];
    $email = $_POST['email'];
    $mk = $_POST['mk'];
    $quyen = $_POST['quyen'];
    if(isset($tentv)&& isset($email)&& isset($mk)&& isset($quyen)){
        $sql="UPDATE qlthanhvien SET ten_tv='$tentv',email='$email',mat_khau='$mk',quyen_truy_cap='$quyen' WHERE id_tv='$id_tv'";
        $query= mysqli_query($conn, $sql);
        header('location:quantri.php?page_layout=qlthanhvien');
    }
}

 $sql_tv="SELECT * FROM qlthanhvien WHERE id_tv='$id_tv'";
 $query_tv= mysqli_query($conn, $sql_tv);
 $row= mysqli_fetch_array($query_tv);
?>
<div class="row">
        <ol class="breadcrumb">
            <li><a href="quantri.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active"></li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sửa thông tin thành viên</h1>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Sửa thông tin thành viên</div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <form role="form" method="post">
                            

                            <div class="form-group">
                                <label>tên thành viên</label>
                                <input class="form-control" type="text" name="ten_tv" value="<?php if(isset($_POST['ten_tv'])){echo $_POST['ten_tv'];}else{ echo $row['ten_tv'];}?>" required="">
                            </div>
                             <div class="form-group">
                                <label>email</label>
                                <input class="form-control" type="email" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}else{ echo $row['email'];}?>" required="">
                            </div>
                             <div class="form-group">
                                <label>mật khẩu</label>
                                <input class="form-control" type="text" name="mk" value="<?php if(isset($_POST['mk'])){echo $_POST['mk'];}else{ echo $row['mat_khau'];}?>" required="">
                            </div>
                                                             
                            <div class="form-group">
                                <label>Quyền Truy Cập</label>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="quyen" 
                                           <?php 
                                           if($row['quyen_truy_cap']==1){
                                               echo 'checked';
                                           }
                                           ?>
                                           id="optionsRadios1" value=1>1 (thành viên thường)
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="quyen" 
                                           <?php 
                                           if($row['quyen_truy_cap']==2){
                                               echo 'checked';
                                           }
                                           ?>
                                           id="optionsRadios2" value=2>2 (quản trị viên)
                                </label>
                            </div>

                            </div>
                            <button type="submit" class="btn btn-primary" name="submit" style="background: #13a6ef;">Cập Nhật</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>

                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->



