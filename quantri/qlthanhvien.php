<script>
function xoathanhvien()
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

$sql="SELECT * FROM qlthanhvien ORDER BY id_tv DESC LIMIT $perRow,$rowPerpage";
$query= mysqli_query($conn, $sql);

$totalRows= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM qlthanhvien"));
$totalPage= ceil($totalRows/$rowPerpage);
$listPage="";
for($i=1;$i<=$totalPage;$i++){
    if($page==$i){
        $listPage.='<li class="active"><a href="quantri.php?page_layout=qlthanhvien&page='.$i.'">'.$i.'</a></li>';
    } else {
        $listPage.=' <li><a href="quantri.php?page_layout=qlthanhvien&page='.$i.'">'.$i.'</a></li>';
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
                    <h1 class="page-header">Quản lý thành viên</h1>
                </div>
            </div><!--/.row-->


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">					
                        <div class="panel-body" style="position: relative;">
                            <a href="quantri.php?page_layout=themtv" class="btn btn-primary" style="margin: 10px 0 20px 0; position: absolute;background: #af5772;">Thêm thành viên mới</a>				
                            <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                                <thead>
                                    <tr>						        
                                        <th data-sortable="true">ID</th>
                                        <th data-sortable="true">Tên thành viên</th>
                                        <th data-sortable="true">Email</th>
                                        <th data-sortable="true">Địa Chỉ</th>
                                        <th data-sortable="true">Điện Thoại</th>
                                        <th data-sortable="true">mật khẩu</th>
                                        <th data-sortable="true">quyền truy cập</th>
                                        <th data-sortable="true">Sửa</th>
                                        <th data-sortable="true">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  while ($row=mysqli_fetch_array($query)) {
                                      
                                  
                                  ?>
                                    <tr style="height: 300px;">
                                        <td data-checkbox="true"><?php echo $row['id_tv'];?></td>
                                        <td data-checkbox="true"><a href="quantri.php?page_layout=suatv&id_tv=<?php echo $row['id_tv'];?>"><?php echo $row['ten_tv'];?></a></td>
                                        <td data-checkbox="true"><?php echo $row['email'];?></td>
                                        <td data-checkbox="true"><?php echo $row['dia_chi'];?></td>
                                        <td data-checkbox="true"><?php echo $row['dien_thoai'];?></td>
                                        <td data-checkbox="true"><?php echo $row['mat_khau'];?></td>
                                        <td data-sortable="true"><?php if($row['quyen_truy_cap']==1){echo "thành viên thường";}else echo "quản trị viên";?></td>
                                        						        
                                        <td>
                                            <a href="quantri.php?page_layout=suatv&id_tv=<?php echo $row['id_tv'];?>"><span><svg class="glyph stroked brush" style="width: 20px;height: 20px;"><use xlink:href="#stroked-brush"/></svg></span></a>
                                        </td>

                                        <td>
                                            <a onclick="return xoathanhvien();" href="quantri.php?page_layout=xoatv&id_tv=<?php echo $row['id_tv'];?>"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;"><use xlink:href="#stroked-cancel"/></svg></span></a>
                                        </td>
                                    </tr>
                                   <?php
                                  }
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
