<script>
function xoaHoaDon()
{
var conf=confirm("bạn chắc chắn muốn xóa danh mục này ?");
return conf;
}
</script> 
<?php
include_once 'ketnoi.php';
if(isset($_GET['page'])){
    $page=$_GET['page'];
} else {
$page=1;
}
$rowPerpage=5;
$perRow=$page*$rowPerpage-$rowPerpage;

$sql="SELECT * FROM orders ORDER BY id_od DESC LIMIT $perRow,$rowPerpage";
$query= mysqli_query($conn, $sql);

$totalRows= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM orders"));
$totalPage= ceil($totalRows/$rowPerpage);
$listPage="";
for($i=1;$i<=$totalPage;$i++){
    if($page==$i){
        $listPage.='<li class="active"><a href="quantri.php?page_layout=qlhoadon&page='.$i.'">'.$i.'</a></li>';
    } else {
        $listPage.=' <li><a href="quantri.php?page_layout=qlhoadon&page='.$i.'">'.$i.'</a></li>';
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
        <h1 class="page-header">Quản lý Hóa Đơn</h1>
    </div>
</div><!--/.row-->


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">					
            <div class="panel-body" style="position: relative;">
                <a href="quantri.php?page_layout=thongke" class="btn btn-primary" style="margin: 10px 0 20px 0; position: absolute; background: #af5772;">Thống Kê Doanh Thu</a>				
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>						        
                            <th data-sortable="true">ID</th>
                            <th data-sortable="true">Tên khách hàng</th>
                            <th data-sortable="true">Email</th>
                            <th data-sortable="true">Địa Chỉ</th> 
                            <th data-sortable="true">Điện Thoại</th>
                            <th data-sortable="true">số lượng sản phẩm</th>  
                            <th data-sortable="true">danh sách sản phẩm</th> 
                            <th data-sortable="true">Tổng Tiền</th>                          
                            <th data-sortable="true">ngày giờ thanh toán</th>
                            <th data-sortable="true">Sửa</th>
                            <th data-sortable="true">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php
                             while($row=mysqli_fetch_array($query)){
                            ?>
                            
                        <tr style="height: 300px;">
                            <td data-checkbox="true"><?php echo $row['id_od'];?></td>
                           <td data-checkbox="true"><?php echo $row['ten_kh'];?></td>
                            <td data-checkbox="true"><?php echo $row['email'];?></td>
                            <td data-checkbox="true"><?php echo $row['dia_chi'];?></td>
                            <td data-checkbox="true"><?php echo $row['dien_thoai'];?></td>
                            <td data-checkbox="true"><?php echo $row['tong_sl_sp'];?></td>
                             <td data-checkbox="true"><?php echo $row['ds_san_pham'];?></td>
                            <td data-sortable="true"><?php echo number_format($row['tong_tien']);?></td>
                           
                            <td data-sortable="true"><?php echo $row['created_at'];?></td>
             						        
                            <td>
                                <a href="quantri.php?page_layout=suahd&id_od=<?php echo $row['id_od'];?>"><span><svg class="glyph stroked brush" style="width: 20px;height: 20px;"><use xlink:href="#stroked-brush"/></svg></span></a>
                            </td>

                            <td>
                                <a onclick="return xoaHoaDon();" href="xoaHoadon.php?id_od=<?php echo $row['id_od'];?>"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;"><use xlink:href="#stroked-cancel"/></svg></span></a>
                            </td>
                            <?php
                             }
                             ?>
                        </tr>
                       
                    </tbody>
                </table>
                <ul class="pagination" style="float: right;">
                     <?php
                        echo $listPage;
                        ?>
                </ul>
            </div>
        </div>
    </div>
</div><!--/.row-->	