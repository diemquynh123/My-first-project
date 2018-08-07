<?php
if (isset($_SESSION['giohang'])) {
    $arrId = array();
    foreach($_SESSION['giohang']as $id_sp=>$sl) {
        $arrId[] = $id_sp;
    }
    $strId = implode(',', $arrId);

    $sql = "SELECT * FROM sanpham WHERE id_sp IN($strId) ORDER BY id_sp DESC";
    $query = mysqli_query($conn, $sql);
}

?>

<div id="checkout">
    <h2 class="h2-bar">XÁC NHẬN HÓA ĐƠN THANH TOÁN</h2>
  
    <table class="table table-bordered">
        <tr>
        <thead>
        <th>tên sản phẩm</th>
        <th>giá</th>
        <th>số lượng</th>
       
        <th>thành tiền</th>
         
        </thead>
        </tr>
        <?php
        $tongtien=0;
        while ($row= mysqli_fetch_array($query)){
            if($row['tiet_kiem']>0){
                $gia_moi=$row['gia_sp']-$row['tiet_kiem'];
                $tongtien1sp=$gia_moi*$_SESSION['giohang'][$row['id_sp']];
               
              
            }else{
            $tongtien1sp=$row['gia_sp']*$_SESSION['giohang'][$row['id_sp']];
            }
        ?>
        <tr>
            <td style="color: #333;"><?php echo $row['ten_sp']; ?></td>
            <td><span><?php if($row['tiet_kiem']>0){echo number_format($gia_moi);}else{echo number_format($row['gia_sp']);} ?> VNĐ</span></td>
            <td style="color: red;"><?php echo $_SESSION['giohang'][$row['id_sp']]; ?></td>
            <td><span><?php echo number_format($tongtien1sp); ?> VNĐ</span></td>
        </tr>
       <?php

       $tongtien+=$tongtien1sp;
       $chietkhau=$tongtien*0.05;
       
        } 
       
       ?>
         <tr>
            <td style="color: #333;">Tổng Số Lượng Sản Phẩm Trên Hóa Đơn:</td>
            <td ></td>
            <?php
            $tong_sp=array_sum($_SESSION['giohang']);

            ?>
            <td colspan="2"><b><span><?php echo $tong_sp; ?> Sản Phẩm</span></b></td>         
     
        </tr> 
       <tr>
        <td style="color: #333;">Tổng Giá Trị Hóa Đơn:</td>
        <td colspan="2"></td>
        <td><b><span><?php echo  number_format($tongtien);?> VNĐ</span></b></td> 
        </tr>
        <tr>
          <td style="color: #333;">Chiết Khấu:(5% áp dụng với hóa đơn trên 10 triệu đồng)</td>
          <td colspan="2"></td>
          <td><b><span><?php if($tongtien>=10000000){echo number_format($chietkhau);} else {echo '0';}?> VNĐ</span></b></td>  
        </tr>
        <tr>
            <td style="color: #333;">Thành Tiền:</td>
            <td colspan="2"></td>
            <td><b><span><?php if($tongtien>=10000000){ echo number_format($tongtien-$chietkhau);} else {echo number_format($tongtien);} ?> VNĐ</span></b></td>         
          
        </tr>
  
             

        

        
    </table>
</div>
<?php

if(isset($_POST['submit'])){
    $ten=$_POST['ten_tv'];
    $mail=$_POST['email'];
    $mobi=$_POST['dien_thoai'];
    $dc=$_POST['dia_chi'];
   
     $ngay_gio= date("Y:m:d H:i:s");
    if(isset($ten)&& isset($mail)&& isset($mobi)&& isset($dc)){
        if (isset($_SESSION['giohang'])) {
    $arrId = array();
    foreach($_SESSION['giohang']as $id_sp=>$sl) {
        $arrId[] = $id_sp; 
        
    //update lại số lượng khi mua hàng thành công    
    $sql_kt="SELECT * FROM sanpham WHERE id_sp='$id_sp'";
    $query_kt= mysqli_query($conn, $sql_kt);
    $row_kt= mysqli_fetch_array($query_kt);
    $numrows= mysqli_num_rows($query_kt);
    $sl=$_SESSION['giohang'][$id_sp];
    $soluong=$row_kt['so_luong']-$sl;
    $soluongdaban=$row_kt['sl_da_ban']+$sl;
    if($sl<=$row_kt['so_luong']){
    $sql_ud="UPDATE sanpham SET so_luong='$soluong',sl_da_ban='$soluongdaban' WHERE id_sp='$id_sp'";
    $query_ud= mysqli_query($conn, $sql_ud); 
 
    }
    }
    $strId = implode(',', $arrId);

    $sql = "SELECT * FROM sanpham WHERE id_sp IN($strId) ORDER BY id_sp DESC";
    $query = mysqli_query($conn, $sql);
    
   
    
                                        }
    $strBody='';
    // Thông tin Khách hàng
$strBody = '<p>
    <b>Khách hàng:</b> '.$ten.'<br />
    <b>Email:</b> '.$mail.'<br />
    <b>Điện thoại:</b> '.$mobi.'<br />
    <b>Địa chỉ:</b> '.$dc.'
</p>';
// Danh sách Sản phẩm đã mua
$strBody .= '<table border="1px" cellpadding="10px" cellspacing="1px" width="100%">
    <tr>
        <td align="center" bgcolor="#3F3F3F" colspan="4"><font color="white"><b>XÁC NHẬN HÓA ĐƠN THANH TOÁN</b></font></td>
    </tr>
    <tr id="invoice-bar">
        <td width="45%"><b>Tên Sản phẩm</b></td>
        <td width="20%"><b>Giá</b></td>
        <td width="15%"><b>Số lượng</b></td>
        <td width="20%"><b>Thành tiền</b></td>
    </tr>';

    $strname = "";
    $tongtien = 0;
    while($row = mysqli_fetch_array($query)){
        //lấy chuỗi tên in vào hóa đơn
        $strname .= $row['ten_sp'].',';

        //loại bỏ dấu phẩy ở cuối chuỗi

        $newstrname = rtrim($strname, ",");

    if($row['tiet_kiem']==0){
    $tongtien1sp = $row['gia_sp']*$_SESSION['giohang'][$row['id_sp']];
    } else {
        $gia_moi=$row['gia_sp']-$row['tiet_kiem'];
        $tongtien1sp = $gia_moi*$_SESSION['giohang'][$row['id_sp']];
    }
    if($row['tiet_kiem']==0){
    $strBody .= '<tr>
        <td class="prd-name">'.$row['ten_sp'].'</td>
        <td class="prd-price"><font color="#C40000">'.number_format($row['gia_sp']).' VNĐ</font></td>
        <td class="prd-number">'.$_SESSION['giohang'][$row['id_sp']].'</td>
        <td class="prd-total"><font color="#C40000">'.number_format($tongtien1sp).' VNĐ</font></td>
    </tr>';
    }
 else {
        $gia_moi=$row['gia_sp']-$row['tiet_kiem'];
        $strBody .= '<tr>
        <td class="prd-name">'.$row['ten_sp'].'</td>
        <td class="prd-price"><font color="#C40000">'.number_format($gia_moi).' VNĐ</font></td>
        <td class="prd-number">'.$_SESSION['giohang'][$row['id_sp']].'</td>
        <td class="prd-total"><font color="#C40000">'.number_format($tongtien1sp).' VNĐ</font></td>
    </tr>';
    }

    $tongtien += $tongtien1sp;
    $chietkhau=$tongtien*0.05;
    }
//tổng số lượng sản phẩm
       $strBody .= '<tr>
        <td class="prd-name">Tổng số lượng sản phẩm trên hóa đơn là:</td>
        <td colspan="2"></td>
        <td class="prd-total"><b><font color="#C40000">'.$tong_sp.' Sản Phẩm</font></b></td>
    </tr>';



    //tổng tiền hóa đơn
        $strBody .= '<tr>
        <td class="prd-name">Tổng giá trị hóa đơn là:</td>
        <td colspan="2"></td>
        <td class="prd-total"><b><font color="#C40000">'.number_format($tongtien).' VNĐ</font></b></td>
    </tr>';
//kiểm tra triết khấu
    if($tongtien>10000000){
        $strBody.='<tr>
        <td class="prd-name">Chiết Khấu:(5% áp dụng với hóa đơn trên 10 triệu đồng):</td>
        <td colspan="2"></td>
        <td class="prd-total"><b><font color="#C40000">'.number_format($chietkhau).' VNĐ</font></b></td>
    </tr>';
    }else{
         $strBody.='<tr>
        <td class="prd-name">Chiết Khấu:(5% áp dụng với hóa đơn trên 10 triệu đồng):</td>
        <td colspan="2"></td>
        <td class="prd-total"><b><font color="#C40000">'.'0'.' </font></b></td>
    </tr>';
    }
//tính tiền sau khi triết khấu
    if($tongtien<10000000){
    $strBody .= '<tr>
        <td class="prd-name">Tổng giá trị hóa đơn sau chiết khấu là:</td>
        <td colspan="2"></td>
        <td class="prd-total"><b><font color="#3370f4">'.number_format($tongtien).' VNĐ</font></b></td>
    </tr>';
    } else {
        $tongtiensautrietkhau=$tongtien*0.95;
         $strBody .= '<tr>
        <td class="prd-name">Tổng giá trị hóa đơn sau chiết khấu là:</td>
        <td colspan="2"></td>
        <td class="prd-total"><b><font color="#3370f4">'.number_format($tongtiensautrietkhau).' VNĐ</font></b></td>
    </tr>
</table>';
    }

$strBody .= '<p align="justify">
    <b>Quý khách đã đặt hàng thành công!</b><br />
    • Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.<br />
    • Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng.<br />
    <b><br />Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</b>
</p>';

    // Thiết lập SMTP Server
require("class.phpmailer.php"); // nạp thư viện
$mailer = new PHPMailer(); // khởi tạo đối tượng
$mailer->IsSMTP(); // gọi class smtp để đăng nhập
$mailer->CharSet="utf-8"; // bảng mã unicode

//Đăng nhập Gmail
$mailer->SMTPAuth = true; // Đăng nhập
$mailer->SMTPSecure = "ssl"; // Giao thức SSL
$mailer->Host = "smtp.gmail.com"; // SMTP của GMAIL
$mailer->Port = 465; // cổng SMTP

// Phải chỉnh sửa lại
$mailer->Username = "diemquynh231296@gmail.com"; // GMAIL username
$mailer->Password = "bhoytwiwvpkyjkad"; // GMAIL password
$mailer->AddAddress($mail, $ten); //email người nhận, $email và $ten là 2 biến đc gán bởi $_POST lấy từ trong form
$mailer->AddCC("diemquynh231296@gmail.com", "bhoytwiwvpkyjkad"); // gửi thêm một email cho Admin

// Chuẩn bị gửi thư nào
$mailer->FromName = 'MIN SHOP'; // tên người gửi
$mailer->From = 'diemquynh231296@gmail.com'; // mail người gửi
$mailer->Subject = 'Hóa đơn xác nhận mua hàng từ MIN SHOP';
$mailer->IsHTML(TRUE); //Bật HTML không thích thì false

// Nội dung lá thư
$mailer->Body = $strBody;
    //gửi mail
//trước khi gửi kiểm tra số lượng hàng còn đủ không
 if (isset($_SESSION['giohang'][$id_sp])) {
    $sql_kt="SELECT * FROM sanpham";
    $query_kt= mysqli_query($conn, $sql_kt);
    $row_kt= mysqli_fetch_array($query_kt);
    $sl=$_SESSION['giohang'][$id_sp];
    
    if($sl<=$row_kt['so_luong']){
        if(!$mailer->Send()){
        echo 'Lỗi Gửi Email'.$mailer->ErrorInfo;
        } else {
            
             //Lập Hóa Đơn
    if($sl<=$row_kt['so_luong']){
       // var_dump($newstrname);die; -- lấy chuỗi  tên sp ở phần foreach
    $ngay_gio= date("Y-m-d H:i:s");
    $today = date("Y-m-d");
    $sql_hd="INSERT INTO orders(ten_kh,email,dien_thoai,dia_chi,ngay,ds_san_pham,tong_sl_sp,tong_tien,status,created_at) VALUES ('$ten','$mail','$mobi','$dc','$today','$newstrname','$tong_sp','$tongtien','0','$ngay_gio')";
    $query_hd= mysqli_query($conn, $sql_hd);  
                                 } 
            
        header('location:index.php?page_layout=hoanthanh');
        unset($_SESSION['giohang']);
        }
        }else{
  echo "<center class='alert alert-danger'>Số Lượng Hàng Trong Kho Không Đủ !</center>"; 
  echo '<script>alert("Số Lượng Hàng Trong Kho Không Đủ !");</script>';
  echo '<a style="margin-left:275px;" class="btn btn-info" href="index.php?page_layout=giohang">Sửa Lại Số Lượng</a>';
             }
 }
    
 }
 
}


if(isset($_SESSION['user'])){
    $mail=$_SESSION['user'];
    $sql_kt="SELECT * FROM qlthanhvien WHERE email='$mail'";
    $query_kt= mysqli_query($conn, $sql_kt);
    $row_kt= mysqli_fetch_array($query_kt);
}


?>

<div id="custom-form" class="col-md-6 col-sm-8 col-xs-12">
    <form method="post">
        <div class="form-group">
            <label >Tên Khách Hàng</label>
            <input required type="text" class="form-control" name="ten_tv" value="<?php if(isset($_SESSION['user'])){echo $row_kt['ten_tv'];}?>">
        </div>
        <div class="form-group">
            <label>Địa chỉ Email</label>
            <input id="email" required type="text" class="form-control" name="email" value="<?php if(isset($_SESSION['user'])){echo $row_kt['email'];}?>">
        </div>
        <div class="form-group">
            <label>Số Điện Thoại</label>
            <input required type="number" class="form-control" name="dien_thoai" value="<?php if(isset($_SESSION['user'])){echo $row_kt['dien_thoai'];} ?>">
        </div>
        <div class="form-group">
            <label>Địa Chỉ Nhận Hàng</label>
            <input required type="text" class="form-control" name="dia_chi" value="<?php if(isset($_SESSION['user'])){echo $row_kt['dia_chi'];} ?>">
        </div>
        
        
        <button class="btn btn-info" name="submit">Mua hàng</button>
    </form>
</div>
