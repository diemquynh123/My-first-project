<?php
$sql = "SELECT * FROM thongke order by ngay DESC LIMIT 14";
$query = mysqli_query($conn,$sql);


$arrdate = [];
$dataSL =[];

while ($row = mysqli_fetch_array($query)) {
    $date[] = strtotime($row['ngay']);
    $soluong[] = $row['sl_hoa_don'];

}

foreach ($date as $value) {
    $newdate[] = date('F j',$value);
    $arrdate =  $arrdate + $newdate;
}

$dataDate = array_reverse($arrdate);
$dataSL = array_reverse($soluong);

$newdataDate = json_encode($dataDate);
$newdataSL = json_encode($dataSL);

?>

 <a href="quantri.php?page_layout=qlhoadon"> << Back </a>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thống Kê Doanh Thu</h1>
                </div>
            </div><!--/.row-->


            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">

                           
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Doanh Thu Theo Tháng</label>                            
                                    <form method="post" action="quantri.php?page_layout=mucthongke" name="thongke">
                                        <input type="date" name="created_at" required="">
                                        <input type="date" name="updated_at" required="">
                                        <button type="submit" class="btn btn-primary" name="submit" style="background:#b73c40">Thống kê</button>

                                    </form>
                                </div>
                            </div>
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Thống Kê Số Hóa Đơn Người Dùng</label>                            
                                    <form method="post" action="quantri.php?page_layout=thongkehoadonND" name="tkhdnd">
                                        <input type="email" name="email" required="">  
                                        <button type="submit" class="btn btn-primary" name="sbm" style="background:#b73c40">Thống kê</button>

                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
<div style="padding-bottom: 100px;" class="col-md-10 col-sm-12 col-xs-12 col-md-offset-1 col-sm-offset-0 col-xs-offset-0">            
<canvas id="myChart"></canvas>
<h3 class='text-center'><i>Biểu Đồ Thống Kê Số Lượng Hóa Đơn Theo Ngày</i></h3>
</div>
<script>

var datasl = <?php echo $newdataSL ;?>;
var datadate = <?php echo $newdataDate ;?>;

var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: datadate,
        datasets: [{
            label: "Số Lượng Hóa Đơn",
            //backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: datasl
        }]
    },

    // Configuration options go here
    options: {}
});
</script>