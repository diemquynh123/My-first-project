<?php
include_once 'ketnoi.php';
$sql_a="SELECT * chitietsp";
$query_a= mysqli_query($conn, $sql_a);
if(isset($_POST['submit'])){
    $id_sp=$_POST['id_sp'];
 
    if($_FILES['anh_sp']['name']==''){
        $error_anh_sp='<span style=color:red;"></span>';
    } else {
    $anh_sp=$_FILES['anh_sp']['name'];
$tmp_name=$_FILES['anh_sp']['tmp_name'];    
    }

if(isset($id_sp)&& isset($anh_sp)){
    move_uploaded_file($tmp_name,'img/'.$anh_sp); 
    $sql="INSERT INTO chitietsp(id_sp,anh_sp) VALUES ('$id_sp','$anh_sp')";
    $query= mysqli_query($conn,$sql);
    header('location:quantri.php?page layout=qlanhsp');
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
            <h1 class="page-header">Thêm ảnh mới</h1>
        </div>
    </div><!--/.row-->


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Thêm ảnh mới</div>
                <div class="panel-body">

                    <form method="post" enctype="multipart/form-data" role="form">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>id_sp</label>
                                <input type="text" class="form-control"  name="id_sp" required="">
                            </div>
                            <div class="form-group">
                                <label>Ảnh mô tả</label>
                                <input type="file" name="anh_sp">
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary" name="submit" style="background: #13a6ef;">Thêm mới</button>
                        <button type="reset" class="btn btn-default" name="reset">Làm mới</button>


                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->




