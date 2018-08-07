<script>
function xoabinhluan()
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
$sql = "SELECT * FROM danhgiasp ORDER BY id_bl DESC LIMIT $perRow,$rowPerpage";
$query = mysqli_query($conn, $sql);

$totalRows= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM danhgiasp"));
$totalPage= ceil($totalRows/$rowPerpage);
$listPage="";
for($i=1;$i<=$totalPage;$i++){
    if($page==$i){
        $listPage.='<li class="active"><a href="quantri.php?page_layout=danhgiasp&page='.$i.'">'.$i.'</a></li>';
    } else {
        $listPage.=' <li><a href="quantri.php?page_layout=danhgiasp&page='.$i.'">'.$i.'</a></li>';
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
                    <h1 class="page-header">Quản lý bình luận</h1>
                </div>
            </div><!--/.row-->


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">					
                        <div class="panel-body" style="position: relative;">
                        		
                            <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                                <thead>
                                    <tr>
                                        <th data-sortable="true">ngày giờ</th>						        
                                        <th data-sortable="true">id_bình luận</th>
                                        <th data-sortable="true">id_sản phẩm</th>
                                        <th data-sortable="true">tên</th>
                                         <th data-sortable="true">số điện thoại</th>
                                        <th data-sortable="true">bình luận</th>
                                        <th data-sortable="true">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php
                                 while ($row = mysqli_fetch_array($query)) {
                                     
                                 
                                 ?>
                                    <tr style="height: 300px;">
                                        <td data-sortable="true"><?php echo $row['ngay_gio'];?></td>
                                        <td data-checkbox="true"><?php echo $row['id_bl'];?></td>
                                        <td data-checkbox="true"><?php echo $row['id_sp'];?></a></td>
                                        <td data-checkbox="true"><?php echo $row['ten'];?></td>
                                        <td data-checkbox="true"><?php echo $row['dien_thoai'];?></td>
                                        <td data-sortable="true"><?php echo $row['binh_luan'];?></td>
                                        <td>
                                            <a onclick="return xoabinhluan();" href="quantri.php?page_layout=xoabl&id_bl=<?php echo $row['id_bl'];?>"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;"><use xlink:href="#stroked-cancel"/></svg></span></a>
                                        </td>
                                    </tr>
                                 <?php }
                                 ?>
                                    
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
