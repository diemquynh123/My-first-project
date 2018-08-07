<?php
if (isset($_GET['id_tv'])) {
    $id_tv = $_GET['id_tv'];
    $sql_tv = "SELECT * FROM qlthanhvien WHERE id_tv='$id_tv'";
    $query_tv = mysqli_query($conn, $sql_tv);
    $row_tv = mysqli_fetch_array($query_tv);
    if (isset($_POST['btn'])) {
        $ten=$_POST['ten_tv'];
        $dia_chi=$_POST['dia_chi'];
        $mobi=$_POST['dien_thoai'];
        if (isset($ten)&& isset($dia_chi) && isset($mobi)) {
            $sql_ud = "UPDATE qlthanhvien SET ten_tv='$ten',dien_thoai='$mobi', dia_chi='$dia_chi' WHERE id_tv='$id_tv'";
            $query_ud = mysqli_query($conn, $sql_ud);
            echo "<center class='alert alert-success'>Thông Tin Cá Nhân Đã Được Cập Nhật !</center>";
        }
    }
}
?>
<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">Sửa Thông Tin Tài Khoản</div>
            <div class="panel-body">
                <?php
                if (isset($_SESSION['user'])) {
                    ?>
                    <form method="post" role="form">
                        <fieldset>
                            <div class="form-group">
                                <label>Tên khách hàng</label>
                                <input required type="text" class="form-control" name="ten_tv" value="<?php if (isset($_POST['ten_tv'])) {
                    echo $_POST['ten_tv'];
                } else {
                    echo $row_tv['ten_tv'];
                } ?>">
                            </div>
                  
                            <div class="form-group">
                                <label>Số Điện thoại</label>
                                <input required type="text" class="form-control" name="dien_thoai" value="<?php if (isset($_POST['dien_thoai'])) {
                    echo $_POST['dien_thoai'];
                } else {
                    echo $row_tv['dien_thoai'];
                } ?>">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input required type="text" class="form-control" name="dia_chi" value="<?php if (isset($_POST['dia_chi'])) {
                            echo $_POST['dia_chi'];
                        } else {
                            echo $row_tv['dia_chi'];
                        } ?>">
                            </div>
                    <?php
                    if (!isset($_POST['btn'])) {
                        echo '<button class="btn btn-info" name="btn">Cập Nhật</button>';
                    } else {

                        echo '<a class="btn btn-primary" href="index.php">Quay Lại Trang Chủ</a>';
                    }
                    ?>
                        </fieldset>
                    </form>
    <?php
} else {
    header('location:index.php?page_layout=dangnhap');
}
?>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->
