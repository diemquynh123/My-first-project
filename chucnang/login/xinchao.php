<?php
if (isset($_SESSION['user'])) {
    $email = $_SESSION['user'];
    $sql = "SELECT * FROM qlthanhvien WHERE email='$email'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
}
?>
<li>
<a href="index.php?page_layout=suathongtintk&id_tv=<?php echo $row['id_tv'] ?>" class="dropdown-toggle"><span style="color:#05549D;">Xin Chào, <?php if (isset($_SESSION['user'])) {
    echo $row['ten_tv'];
} ?> </span> <span class="caret"></span></a>
<ul style="width: 250px;margin-top:-5px;" class="dropdown-menu" role="menu">
    <li><a style="color:#333;" href="index.php?page_layout=suathongtintk&id_tv=<?php echo $row['id_tv'] ?>">Thông Tin Tài Khoản</a></li>
    <li><a style="color:#333;" href="index.php?page_layout=doimk&id_tv=<?php echo $row['id_tv'] ?>">Đổi Mật Khẩu</a></li>  
    <li><a style="color:#333;" href="index.php?page_layout=dangxuat"> Đăng Xuất</a></li>
</ul>
</li>