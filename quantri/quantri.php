<?php
ob_start();
session_start();
include_once 'ketnoi.php';

$today = Date('Y-m-d');
//check số lượng hóa đơn trong ngày 

$sql_check_order = "SELECT * FROM orders WHERE ngay = '$today'";
$count = mysqli_num_rows(mysqli_query($conn,$sql_check_order));

$sql_check_tk = "SELECT * FROM thongke WHERE ngay = '$today'";
$numrow = mysqli_num_rows(mysqli_query($conn,$sql_check_tk));

if($count > 0){
    if($numrow==0){
        $sql_create = "INSERT INTO thongke(ngay,sl_hoa_don) VALUES ('$today','$count')";
        $sql_query_create = mysqli_query($conn,$sql_create);
    }else{
        $sql_update = "UPDATE thongke SET sl_hoa_don = '$count' WHERE ngay = '$today'";
        $sql_query_update = mysqli_query($conn,$sql_update);
    }
}


if(isset($_SESSION['email'])&& isset($_SESSION['mk'])){

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Min Shop</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/datepicker3.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">

        <!--Icons-->
        <script src="js/lumino.glyphs.js"></script>
        <script src="js/Chart.js"></script>

        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background: #630f38;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="cuahang.php"><span>MINSHOP Admin</span></a>
                    <ul class="user-menu">
                        <li class="dropdown pull-right">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg><span style="color: white;">Xin chào,<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];}?></span> <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Thông tin thành viên</a></li>
                                <li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Cài đặt</a></li>
                                <li><a href="dangxuat.php"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Đăng xuất</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </div><!-- /.container-fluid -->
        </nav>

        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <form role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Tìm kiếm">
                </div>
            </form>
            <ul class="nav menu">
                <li class="active" ><a href="quantri.php" style="background: #f2dede;"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang Chủ Quản Trị</a></li>
                <li class="parent">
                    <a href="quantri.php?page_layout=qlthanhvien">
                        <span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản Lý Thành Viên
                    </a>
                    <ul class="children collapse" id="sub-item-1">
                        <li>
                            <a href="quantri.php?page_layout=themtv">
                                <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg>
                                Thêm mới
                            </a>
                        </li>
                    </ul>			
                </li>
                <li class="parent">
                    <a href="quantri.php?page_layout=danhsachdm">
                        <span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản Lý Danh Mục
                    </a>
                    <ul class="children collapse" id="sub-item-2">
                        <li>
                            <a class="" href="quantri.php?page_layout=themdm">
                                <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Thêm mới
                            </a>
                        </li>

                    </ul>			
                </li>
                <li class="parent ">
                    <a href="quantri.php?page_layout=danhsachsp">
                        <span data-toggle="collapse" href="#sub-item-3"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản Lý Sản Phẩm
                    </a>
                    <ul class="children collapse" id="sub-item-3">
                        <li>
                            <a class="" href="quantri.php?page_layout=themsp">
                                <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Thêm mới
                            </a>
                        </li>

                    </ul>				
                </li>
                <li class="parent ">
                    <a href="quantri.php?page_layout=danhgiasp">
                        <span data-toggle="collapse" href="#sub-item-4"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"/></svg></span> Quản Lý Bình Luận
                    </a>

                </li>
                <li class="parent ">
                    <a href="quantri.php?page_layout=qlanhsp">
                        <span data-toggle="collapse" href="#sub-item-5"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản Lý Ảnh Sản Phẩm
                    </a>
                    <ul class="children collapse" id="sub-item-5">
                        <li>
                            <a class="" href="#">
                                <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Thêm mới
                            </a>
                        </li>

                    </ul>			
                </li>
                 <li class="parent ">
                    <a href="quantri.php?page_layout=qlhoadon">
                        <span data-toggle="collapse" href="#sub-item-4"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"/></svg></span> Quản Lý Hóa Đơn
                    </a>

                </li>
                 <li class="parent ">
                    <a href="quantri.php?page_layout=pheduyet">
                        <span data-toggle="collapse" href="#sub-item-4"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"/></svg></span> Phê Duyệt Tài Khoản
                    </a>

                </li>

                

                <li role="presentation" class="divider"></li>
                <li><a href="dangxuat.php"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Đăng xuất</a></li>
            </ul>

        </div><!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <?php
            //maser page
            if (isset($_GET["page_layout"])) {
                switch ($_GET["page_layout"]) {
                    case 'danhsachsp':include_once './danhsachsp.php';
                        break;
                    case 'themsp':include_once './themsp.php';
                        break;
                    case 'suasp':include_once './suasp.php';
                        break;
                    case 'danhsachdm':include_once './danhsachdm.php';
                        break;
                    case 'themdm':include_once './themdm.php';
                        break;
                    case 'suadm':include_once './suadm.php';
                        break;
                      case 'qlanhsp':include_once './chitietsp.php';
                        break;
                     case 'themanh':include_once './themanh.php';
                        break;
                     case 'suaanh':include_once './suaanh.php';
                        break;
                    case 'xoaanh':include_once './xoaanh.php';
                        break;
                     case 'danhgiasp':include_once './danhgiasp.php';
                        break;
                    case 'xoabl':include_once './xoabl.php';
                        break;
                    case 'qlthanhvien':include_once './qlthanhvien.php';
                        break;                   
                    case 'themtv':include_once './themtv.php';
                        break;
                    case 'suatv':include_once './suatv.php';
                        break;
                    case 'xoatv':include_once './xoatv.php';
                        break;
                      case 'pheduyet':include_once './pheduyet.php';
                        break;
                      case 'duyetthem':include_once './duyetthem.php';
                        break;
                     case 'qlhoadon':include_once './qlhoadon.php';
                        break;
                        case 'thongke':include_once './thongkeDT.php';
                        break;
                        case 'mucthongke':include_once './muctk.php';
                        break;
                        case 'thongkehoadonND':include_once './thongkehoadonND.php';
                        break;
                        case 'suahd':include_once './suahd.php';
                        break;
                    
                    
                  
                }
            } else {
                include_once './gioithieu.php';
            }
            ?>


        </div>	<!--/.main-->

        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/chart.min.js"></script>
        <script src="js/chart-data.js"></script>
        <script src="js/easypiechart.js"></script>
        <script src="js/easypiechart-data.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>	
        <script src="js/bootstrap-table.js"></script>
        <link rel="stylesheet" href="css/bootstrap-table.css"/>
        <script>
            $('#calendar').datepicker({
            });

            !function ($) {
                $(document).on("click", "ul.nav li.parent > a > span.icon", function () {
                    $(this).find('em:first').toggleClass("glyphicon-minus");
                });
                $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
            }(window.jQuery);

            $(window).on('resize', function () {
                if ($(window).width() > 768)
                    $('#sidebar-collapse').collapse('show')
            })
            $(window).on('resize', function () {
                if ($(window).width() <= 767)
                    $('#sidebar-collapse').collapse('hide')
            })
        </script>	
    </body>

</html>
<?php
 } else {
     header('location:index.php');
}
?>
