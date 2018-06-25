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
  
 <form action="http://localhost/final/control/xulyadduser.php" method="POST">
                 <h1 >Thêm User</h1>
                  <br>
                 <span id="so">1</span><span id="chuso">Thông tin cá nhân</span>

                 <br>
                 <span class="chufontdk">Name</span>
                 <br>
                 <input type="text" name="name" placeholder="Nhập họ tên" class="textbox">
                  <br>
                  <br>
                 <span class="chufontdk">Birthday</span>
                 <br>
                 
                 <input type="date" name="ns" placeholder="Ngay/tháng/năm" class="textbox">
                  <br>
                  <br>
                 <span class="chufontdk">Địa Chỉ</span>
                 <br>
                 
                 <input type="text" name="dc" placeholder="Nhập Đia Chỉ" class="textbox">
                  <br>
                  <br>
                 <span class="chufontdk">Email</span>
                 <br>
                 
                 <input type="text" name="gmail" placeholder="Nhập gmail" class="textbox">
                  <br>
                  <br>
                 <span class="chufontdk">Số Điện Thoại</span>
                 <br>
                 
                 <input type="text" name="sdt" placeholder="Nhập Sồ Điện Thoại" class="textbox">
                 <br>
                  <br>
                  <br>
                 <span id="so">2</span><span id="chuso">Thông tin tài khoản</span>
                 <br>
             
                 <span class="chufontdk">Tên Tài Khoản</span>
                 <br>
               
                 <input type="text" name="tendn" placeholder="Tên Đăng Nhập" class="textbox">
                  <br>
                  <br>
                 <span class="chufontdk">Mật Khẩu</span>
                 <br>
            
                 <input type="password" name="mk" placeholder="Nhập Mật Khẩu" class="textbox">
                  <br>
                 <br>
           
                 <input type="submit" name="submit" value="Thêm" class="textbox">



                
            </form>
            <br>
            <a href="http://localhost/final/view/thanhvien.php/" class="chufontdk">Trở về</a>
            
</body>
</html>