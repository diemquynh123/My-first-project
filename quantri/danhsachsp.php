<script>
function xoaSanPham()
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
$rowPerpage=10;
$perRow=$page*$rowPerpage-$rowPerpage;

$sql="SELECT * FROM sanpham INNER JOIN dmsanpham ON sanpham.id_dm=dmsanpham.id_dm ORDER BY id_sp DESC LIMIT $perRow,$rowPerpage";
$query= mysqli_query($conn, $sql);

$totalRows= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sanpham"));
$totalPage= ceil($totalRows/$rowPerpage);
$listPage="";
for($i=1;$i<=$totalPage;$i++){
    if($page==$i){
        $listPage.='<li class="active"><a href="quantri.php?page_layout=danhsachsp&page='.$i.'">'.$i.'</a></li>';
    } else {
        $listPage.=' <li><a href="quantri.php?page_layout=danhsachsp&page='.$i.'">'.$i.'</a></li>';
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
        <h1 class="page-header">Quản lý sản phẩm</h1>
    </div>
</div><!--/.row-->


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">					
            <div class="panel-body" style="position: relative;">
                <a href="quantri.php?page_layout=themsp" class="btn btn-primary" style="margin: 10px 0 20px 0; position: absolute; background: #af5772;">Thêm sản phẩm mới</a>				
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>						        
                            <th data-sortable="true">ID</th>
                            <th data-sortable="true">Tên sản phẩm</th>
                            <th data-sortable="true">Giá</th>
                            <th data-sortable="true">Giá tiết kiệm</th>
                            <th data-sortable="true">Thương Hiệu</th>
                            <th data-sortable="true">Tặng Kèm</th>
                            <th data-sortable="true">Chất Liệu</th>
                            <th data-sortable="true">Kích Thước</th>
                            <th data-sortable="true">Dây Đeo</th>
                             <th data-sortable="true">Ngăn Túi</th>
                              <th data-sortable="true">Màu Sắc</th>
                            <th data-sortable="true">Hàng trong kho</th>
                            <th data-sortable="true">Hàng đã bán</th>
                            <th data-sortable="true">Hàng Mới</th>
                            <th data-sortable="true">Ảnh mô tả</th>
                            <th data-sortable="true">Sửa</th>
                            <th data-sortable="true">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php
                             while($row=mysqli_fetch_array($query)){
                            ?>
                            
                        <tr style="height: 300px;">
                            <td data-checkbox="true"><?php echo $row['id_sp'];?></td>
                            <td data-checkbox="true"><a href="quantri.php?page_layout=suasp&id_sp=<?php echo $row['id_sp'];?>"><?php echo $row['ten_sp'];?></a></td>
                            <td data-checkbox="true"><?php echo number_format($row['gia_sp']);?> VNĐ</td>
                            <td data-checkbox="true"><?php echo number_format($row['tiet_kiem']);?> VNĐ</td>
                            <td data-sortable="true"><?php echo $row['ten_dm'];?></td>
                             <td data-sortable="true"><?php echo $row['khuyen_mai'];?></td>
                             <td data-sortable="true"><?php echo $row['chat_lieu'];?></td>
                             <td data-sortable="true"><?php echo $row['kich_thuoc'];?></td>
                             <td data-sortable="true"><?php echo $row['day_deo'];?></td>
                             <td data-sortable="true"><?php echo $row['ngan_tui'];?></td>
                             <td data-sortable="true"><?php echo $row['mau_sac'];?></td>
                            <td data-sortable="true"><?php echo $row['so_luong'];?></td>
                            <td data-sortable="true"><?php echo $row['sl_da_ban'];?></td>
                              <td data-sortable="true"><?php echo $row['sp_moi'];?></td>
                            <td data-sortable="true">
                                <span class="thumb"><img width="80px" height="150px" src="img/<?php echo $row['anh_sp'];?>" /></span>

                            </td>						        
                            <td>
                                <a href="quantri.php?page_layout=suasp&id_sp=<?php echo $row['id_sp'];?>"><span><svg class="glyph stroked brush" style="width: 20px;height: 20px;"><use xlink:href="#stroked-brush"/></svg></span></a>
                            </td>

                            <td>
                                <a onclick="return xoaSanPham();" href="xoasp.php?id_sp=<?php echo $row['id_sp'];?>"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;"><use xlink:href="#stroked-cancel"/></svg></span></a>
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


