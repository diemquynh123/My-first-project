<?php
//nhận từ khóa tìm kiếm
$stext=$_POST['stext'];

//loại bỏ các khảng trắng đầu và cuối của từ khóa
$stextNew= trim($stext);
$arr_stextNew= explode(' ', $stextNew);
$stextNew= implode('%', $arr_stextNew);
$stextNew='%'.$stextNew.'%';
$sql="SELECT * FROM sanpham WHERE ten_sp LIKE ('$stextNew') ORDER BY id_sp DESC";
$query= mysqli_query($conn, $sql);
?>

            <div class="products">
                <h2 class="h2-bar search-bar">kết quả tìm được với từ khóa 
                <span><?php echo $stext;?></span></h2>
                <div class="row">
                    <?php
                    while ($row= mysqli_fetch_array($query)) {
                        
                   
                    ?>
                    <div class="col-md-3 col-sm-6 product-item text-center">
                        <a href="#"><img width="80" height="144" src="quantri/img/<?php echo $row['anh_sp'];?>"></a>
                        <h3><a href="#"><?php echo $row['ten_sp'];?></a></h3>
                        
                     
                        <p class="price">GIÁ:<?php echo $row['gia_sp'];?>VNĐ</p>
                    </div>
                    <?php
                    
                    }
                    ?>
                </div>
            </div>
            <!-- Pagination -->
          <!--   <div id="pagination">
                         <nav aria-label="Page navigation">
                           <ul class="pagination">
                             <li><a href="#">1</a></li>
                             <li><a href="#">2</a></li>
                             <li><a href="#">3</a></li>
                             <li><a href="#">4</a></li>
                             <li><a href="#">5</a></li>
                             <li><a href="#">6</a></li>
                           </ul>
                         </nav>
                     </div>  -->           
            <!-- End Pagination -->     
            