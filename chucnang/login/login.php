<?php
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $mk = $_POST["mat_khau"];
    if (isset($email) && isset($mk)) {
        $sql = "SELECT * FROM qlthanhvien WHERE email='$email' AND mat_khau='$mk'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);
        $rows = mysqli_num_rows($query);
        if ($rows >= 1) {

            $_SESSION['user'] = $email;
            $_SESSION['pass'] = $mk;
            print_r($_SESSION);
            header("location:index.php");
        } else {
            echo "<center class='alert alert-danger'>tài khoản hoặc mật khẩu không đúng !</center>";
        }
    }
}
if (!isset($_SESSION['user'])) {
    ?>



    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">Đăng nhập hệ thống</div>
                <div class="panel-body">

                    <form method="post" role="form">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Tài khoản E-mail" name="email" type="email" autofocus="" required="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Mật khẩu" name="mat_khau" type="password" required="">
                            </div>
                            <div class="checkbox">  
                            </div>
                            <br/>
                            <input type="submit" name="submit" value="Đăng nhập" class="btn btn-primary">
                            <a class="btn btn-primary" href="index.php?page_layout=dangky">Đăng Ký</a>							
                        </fieldset>
                    </form>

                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->	

    <?php
} else {
    header('location:index.php');
}
?>

