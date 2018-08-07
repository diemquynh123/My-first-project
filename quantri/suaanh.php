<?php 
include_once 'ketnoi.php';
$id_chi_tiet=$_GET['id_chi_tiet'];

$sql_a="SELECT * FROM chitietsp";
$query_a= mysqli_query($conn, $sql_a);

$sql="SELECT * FROM chitietsp WHERE id_chi_tiet=$id_chi_tiet";
$query= mysqli_query($conn, $sql);
$row= mysqli_fetch_array($query);

if(isset($_POST['submit'])){
    $id_sp=$_POST['id_sp'];
    
    if($_FILES['anh_sp']['name']==""){
        $anh_sp=$_POST['anh_sp'];
    }
    else{
        $anh_sp=$_FILES['anh_sp']['name'];
        $tmp_name=$_FILES['anh_sp']['tmp_name'];
    }
     
    if(isset($id_sp) && isset($anh_sp) ){
        move_uploaded_file($tmp_name, 'img/'.$anh_sp);
        $sql="UPDATE chitietsp SET id_sp='$id_sp',anh_sp='$anh_sp' WHERE id_chi_tiet=$id_chi_tiet";
        $query= mysqli_query($conn, $sql);
        header('location: quantri.php?page_layout=qlanhsp');
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
        <h1 class="page-header">Sửa ảnh sản phẩm</h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Sửa ảnh sản phẩm</div>
            <div class="panel-body">

                <form method="post" enctype="multipart/form-data" role="form">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ID sản phẩm</label>
                            <input type="text" class="form-control"  name="id_sp" value="<?php if(isset($_POST['id_sp'])){echo $_POST['id_sp'];} else{echo $row['id_sp'];} ?>" required="">
                        </div>
                        
                        <div class="form-group">
                            <label>Ảnh mô tả</label>
                            <input type="file" name="anh_sp"><input type="hidden" name="anh_sp"	  value="<?php echo $row['anh_sp']; ?>" />
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary" name="submit" style="background: #13a6ef;">Cập nhật</button>
                    <button type="reset" class="btn btn-default" name="reset">Làm mới</button>


                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->


