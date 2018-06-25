<?php 
  include_once("../model/connect.php");
  $id = $_GET['id'];
  echo $id;
  $sql = "SELECT * FROM account_information,account WHERE account.ID='$id'and account.ID = account_information.IDTAIKHOAN "; 
  $ketqua = $connect->query($sql);
  $row = mysqli_fetch_assoc($ketqua);
  echo $row['TEN'];
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <style>
          .chufontdk {
        
        font-size: 15px;
        font-weight: 700;
        
      }
      #so {
        display: inline-block;
        background-color: #bbbb32;
        padding: 10px;
        border-radius: 100px;
      }
  </style>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  
 <form action="http://localhost/final/control/xulyupdate_user.php" method="POST">
                 <h1 >Thay Đổi Thông Tin</h1>
                  <br>
                 <span id="so">1</span><span id="chuso">Thông tin cá nhân</span>

                 <br>
                 <span class="chufontdk">Name</span>
                 <br>
                  <input type="hidden" name="id" value="<?php echo $id;?>" class="textbox">
                 <input type="text" name="name" value="<?php echo $row['TEN'];?>" class="textbox">
                  <br>
                  <br>
                 <span class="chufontdk">Birthday</span>
                 <br>
                 
                 <input type="date" name="ns" value="<?php echo $row['NGSINH'];?>" class="textbox">
                  <br>
                  <br>
                 <span class="chufontdk">Địa Chỉ</span>
                 <br>
                 
                 <input type="text" name="dc" value="<?php echo $row['DC'];?>" class="textbox">
                  <br>
                  <br>
                 <span class="chufontdk">Email</span>
                 <br>
                 
                 <input type="text" name="gmail" value="<?php echo $row['EMAIL'];?>" class="textbox">
                  <br>
                  <br>
                 <span class="chufontdk">Số Điện Thoại</span>
                 <br>
                 
                 <input type="text" name="sdt" value="<?php echo $row['SDT'];?>" class="textbox">
                 <br>
                  <br>
                  <br>
                 <span id="so">2</span><span id="chuso">Thông tin tài khoản</span>
                 <br>
             
                 <span class="chufontdk">Tên Tài Khoản</span>
                 <br>
               
                 <input type="text" name="tendn" value="<?php echo $row['TAIKHOAN'];?>" class="textbox">
                  <br>
                  <br>
                 <span class="chufontdk">Mật Khẩu</span>
                 <br>
            
                 <input type="password" name="mk" value="<?php echo $row['MATKHAU'];?>" class="textbox">
                  <br>
                 <br>
           
                 <input type="submit" name="submit" value="Thay Đổi" class="textbox">



                
            </form>
            <br>
            <a href="http://localhost/final/view/thanhvien.php/" class="chufontdk">Trở về</a>
            
</body>
</html>