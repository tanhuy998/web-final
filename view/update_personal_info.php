
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
  
 <form action="http://localhost/final/control/C_Update_Personal_Info.php" method="POST">
                 
                 <span id="so">1</span><span id="chuso">Thông tin cá nhân</span>

                 <br>
                 <span class="chufontdk">Name</span>
                 <br>
                  <input type="hidden" name="id" value="<?php echo $id;?>" class="textbox">
                 <input type="text" name="name" value="<?php echo $personal_info['TEN'];?>" class="textbox">
                  <br>
                  <br>
                 <span class="chufontdk">Birthday</span>
                 <br>
                 
                 <input type="date" name="ns" value="<?php echo $date;?>" class="textbox">
                  <br>
                  <br>
                 <span class="chufontdk">Địa Chỉ</span>
                 <br>
                 
                 <input type="text" name="dc" value="<?php echo $personal_info['DC'];?>" class="textbox">
                  <br>
                  <br>
                 <span class="chufontdk">Email</span>
                 <br>
                 
                 <input type="text" name="gmail" value="<?php echo $personal_info['EMAIL'];?>" class="textbox">
                  <br>
                  <br>
                 <span class="chufontdk">Số Điện Thoại</span>
                 <br>
                 
                 <input type="text" name="sdt" value="<?php echo $personal_info['SDT'];?>" class="textbox">
                 <br>
                  <br>
                  <br>
           
                 <input type="submit" name="submit" value="Thay Đổi thông tin" class="textbox">



                
            </form>
            <br>
            <!-- <a href="http://localhost/final/view/thanhvien.php/" class="chufontdk">Trở về</a> -->
            
</body>
</html>