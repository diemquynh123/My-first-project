<?php
if(isset($_GET['id_tv'])){
    $id_thanhvien=$_GET['id_tv'];
    if(isset($_POST['capnhat'])){
    $mkcu=$_POST['mkcu'];
    $mkmoi=$_POST['mkmoi'];
    $nhaplai=$_POST['nhaplaimkmoi'];
    
    $sql_kt="SELECT *FROM qlthanhvien WHERE id_tv='$id_thanhvien'";
    $query_kt= mysqli_query($conn, $sql_kt);
    $row_kt= mysqli_fetch_array($query_kt);
    $mk=$row_kt['mat_khau'];
    
    if(($mkcu==$mk)){
        if($mkmoi==$nhaplai){
        $sql="UPDATE qlthanhvien SET mat_khau='$mkmoi' WHERE id_tv='$id_thanhvien'";
        $query= mysqli_query($conn, $sql);
        echo "<center class='alert alert-success'>Thay Đổi Mật Khẩu Thành Công !</center>";
        } else {
           echo "<center class='alert alert-danger'>Mật Khẩu Bạn Nhập Không Khớp !</center>";   
        }
    }
 else {
    echo "<center class='alert alert-danger'>Nhập Sai Mật Khẩu Cũ !</center>";    
    }
    }
    
}
?>
 <?php
 if(isset($_SESSION['user'])){
?>
<div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">Đổi mật khẩu</div>
                    <div class="panel-body">
                       
                        <form method="post" role="form">
                            <fieldset>
                                <div class="form-group">
                                    <label>Mật khẩu Cũ</label>
                                    <input required type="password" class="form-control" name="mkcu">
                                </div>
                                
                                <div class="form-group">
                                    <label>Mật Khẩu Mới</label>
                                    <input required type="password" class="form-control" name="mkmoi">
                                </div>
                                <div class="form-group">
                                    <label>Nhập Lại Mật Khẩu Mới</label>
                                    <input required type="password" class="form-control" name="nhaplaimkmoi">
                                </div>
                                <?php if(!isset($_POST['capnhat'])){
                                echo '<button class="btn btn-info" name="capnhat">Cập Nhật</button>';
                                } else {
                                    echo '<a class="btn btn-primary" href="index.php">Quay Lại Trang Chủ</a>';
                                }
                                ?>
                            						
                            </fieldset>
                        </form>
                        
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->
<?php
    } else {
    header('location:index.php?page_layout=login');    
    }
?>