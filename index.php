<?php
ob_start();
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
include_once 'cauhinh/ketnoi.php';
?>
<html>
    <head><title>Min Shop</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <script src="js/styles.js" type="text/javascript"></script>
   
        <meta property="fb:app_id" content="{175934823113567}" />

        <?php
        if (isset($_GET['page_layout'])) {
            switch ($_GET['page_layout']) {
                case 'danhsachtimkiem':
                    echo ' <link rel="stylesheet" href="css/danhsachtimkiem.css">';
                    break;
                case 'danhsachsp':
                    echo ' <link rel="stylesheet" href="css/danhsachsp.css">';
                    break;
                case 'chitietsp':
                    echo ' <link rel="stylesheet" href="css/chitietsp.css">';
                    break;
                case 'giohang':
                    echo ' <link rel="stylesheet" href="css/giohang.css">';
                    break;
                case 'muahang':
                    echo ' <link rel="stylesheet" href="css/muahang.css">';
                    break;
                case 'hoanthanh':
                    echo ' <link rel="stylesheet" href="css/hoanthanh.css">';
                    break;
                case 'khuyenmai':
                    echo ' <link rel="stylesheet" href="css/khuyenmai.css">';
                    break;
                    
            }
        }
        ?>

    </head>
    <body>
        <div id="header">
            <div class="row">
                <!-- search -->
                <?php
                include_once './chucnang/timkiem/timkiem.php';
                ?>
                <!-- end search -->
                <!-- y-cart -->
                <?php
                include_once './chucnang/giohang/giohangcuaban.php';
                ?>
                <!-- end y-cart -->

            </div>
        </div>
        <div id="banner">
            <div class="row">           
                <div id="logo" class="col-md-4 col-sm-12 col-xs-12">
                    <h1>
                        <a href="index.php">
                            <marquee behavior="alternate"><marquee width="200px">MIN SHOP</marquee></marquee>
                        </a>
                    </h1>
                </div>

                <?php
                include_once './chucnang/sanpham/danhmucsp.php';
                ?>



            </div>    
          
        </div>


        <div class="container">
            <!-- Body -->
            <div id="body">
                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">



                        <div id="main">
                            <?php
                            //master
                            if (isset($_GET['page_layout'])) {
                                switch ($_GET['page_layout']) {

                                    case 'danhsachtimkiem':
                                        include_once './chucnang/timkiem/danhsachtimkiem.php';
                                        break;
                                    case 'danhsachsp':
                                        include_once './chucnang/sanpham/danhsachsp.php';
                                        break;
                                    case 'chitietsp':
                                        include_once './chucnang/sanpham/chitietsp.php';
                                        break;
                                    case 'giohang':
                                        include_once './chucnang/giohang/giohang.php';
                                        break;
                                    case 'muahang':
                                        include_once './chucnang/giohang/muahang.php';
                                        break;
                                    case 'hoanthanh':
                                        include_once './chucnang/giohang/hoanthanh.php';
                                        break;
                                    case 'khuyenmai':
                                        include_once './chucnang/sanpham/khuyenmai.php';
                                        break;
                                    case 'dangnhap':include_once './chucnang/login/login.php';
                                        break;
                                    case 'dangky':include_once './chucnang/login/dangky.php';
                                        break;
                                    case 'suathongtintk':include_once './chucnang/login/suathongtintk.php';
                                        break;
                                    case 'dangxuat':include_once './chucnang/login/dangxuat.php';
                                        break;

                                    case 'doimk':include_once './chucnang/login/doimk.php';
                                        break;
                                    case 'dangxuat':include_once './chucnang/login/dangxuat.php';
                                        break;
                                    case 'tktheogia':include_once './chucnang/sanpham/tktheogia.php';
                                        break;
                                    case 'store':include_once './chucnang/quangcao/cuahang.php';
                                        break;
                                     case 'hotrokh':include_once './chucnang/quangcao/hotrokh.php';
                                        break;
                                     case 'tintuc':include_once './chucnang/quangcao/tintuc.php';
                                        break;
                                     case 'maps':include_once './chucnang/quangcao/maps.php';
                                        break;
                                         case 'kqtintuc':include_once './chucnang/quangcao/kqtintuc.php';
                                        break;
                                         case 'chinhsach':include_once './chucnang/quangcao/chinhsach.php';
                                        break;
                                        case 'spdaxem':include_once './chucnang/sanpham/spdaxem.php';
                                        break;
                                         case 'quangcao':include_once './chucnang/quangcao/trangcuahang.php';
                                        break;
                                }
                            } else {
                                include_once './chucnang/sanpham/sanpham.php';
                            }
                            ?>

                        </div>
                    </div>
                </div>  
                <!-- End Body -->

                                         
            </div>
        </div><!--container-->

  
        <!-- Footer -->
        <div id="footer">
            <div class="row">
               <div id="brand">
                <div class="row">
                    <div class="col-md-12 text-center">

                        <img src="images/ban.jpg">
                        
                    </div>
                </div>
            </div> 


            
            <?php
            include_once './chucnang/thongke/thongke.php';
            ?>
            <div id="footer-main" class="col-md-12 col-sm-12 col-xs-12">
                <h4>ĐỀ TÀI:XÂY DỰNG WEBSITE BÁN TÚI XÁCH</h4>
                <p><b>Trụ sở chính:</b> Số 17,64/19 Phan Đình Giót,Thanh Xuân, Hà Nội | </br><b>Hotline</b> 012345678</p> 


            </div>   
                    </div>
                </div>
                <!-- End Footer -->
    </body>
</html>