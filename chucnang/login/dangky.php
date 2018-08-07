<?php
if (isset($_POST["submit"])) {
    $email = $_POST['email'];
    $pass = $_POST['mat_khau'];
    $ten = $_POST['ten_tv'];
    $dia_chi= $_POST['dia_chi'];
    $mobi = $_POST['dien_thoai'];
    $quyen = $_POST['quyen_truy_cap'];
    if (isset($email) && isset($pass) && isset($ten) && isset($dia_chi) && isset($mobi) && isset($quyen)) {
        $sql_kt = "SELECT * FROM qlthanhvien WHERE email='$email'";
        $query_kt = mysqli_query($conn, $sql_kt);
        $row_kt = mysqli_num_rows($query_kt);

       $sql_set = "SELECT * FROM pheduyet WHERE email='$email'";
        $query_set = mysqli_query($conn, $sql_set);
        $row_set = mysqli_num_rows($query_set);

        if ($row_kt == 0 && $row_set == 0) {
            $sql = "INSERT INTO pheduyet(email,mat_khau,ten_tv,dia_chi,dien_thoai,quyen_truy_cap) "
                    . "VALUES('$email','$pass','$ten','$dia_chi','$mobi','$quyen')";
            $query = mysqli_query($conn, $sql);
            echo '<script>';
            echo 'alert("Yêu Cầu Của Bạn Đã Được Gửi, Vui Lòng Chờ Phê Duyệt !")';
            echo '</script>';
        } elseif ($row_kt == 0 && $row_set > 0) {
            echo "<center class='alert alert-danger'>Tên Tài Khoản Đã Có Người Đăng Ký !</center>";
        } else {
            echo "<center class='alert alert-danger'>Tên Tài Khoản Đã Có Người Sử Dụng!</center>";
        }
    }
}
?>


<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">Đăng Ký Tài Khoản</div>
            <div class="panel-body">
<?php
if (!isset($_SESSION['mail'])) {
    ?>
                    <form method="post" role="form">
                        <fieldset>

                            <div class="form-group">
                                <label>Địa chỉ Email</label>
                                <input required type="email" class="form-control" name="email" value="<?php if (isset($_POST['email'])) {
        echo $_POST['email'];
    } ?>">
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input required type="password" class="form-control" name="mat_khau" value="<?php if (isset($_POST['mat_khau'])) {
        echo $_POST['mat_khau'];
    } ?>">
                            </div>
                            <div class="form-group">
                                <label>Tên khách hàng</label>
                                <input required type="text" class="form-control" name="ten_tv" value="<?php if (isset($_POST['ten_tv'])) {
        echo $_POST['ten_tv'];
    } ?>">
                            </div>
                            <div class="form-group">
                                <label>Địa Chỉ</label>
                                <input required type="text" class="form-control" name="dia_chi" value="<?php if (isset($_POST['dia_chi'])) {
        echo $_POST['dia_chi'];
    } ?>">
                            </div>

                            <div class="form-group">
                                <label>Số Điện thoại</label>
                                <input required type="number" class="form-control" name="dien_thoai" value="<?php if (isset($_POST['dien_thoai'])) {
        echo $_POST['dien_thoai'];
    } ?>">
                            </div>
                            <div class="form-group">
                                <label>Quyền Truy Cập</label>
                                <input required type="text" class="form-control" name="quyen_truy_cap" value="1">
                            </div>
                            <button class="btn btn-info" name="submit">Đăng ký</button>
                            <a href="index.php" class="btn btn-primary">Trang Chủ</a>

                        </fieldset>
                    </form>
    <?php
} else {
    header('location:index.php');
}
?>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->	

