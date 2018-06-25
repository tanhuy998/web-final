<!DOCTYPE html>
<html lang="en">
<head>
  <style type="text/css">
    #tieudethanhvien {
    
      margin-top: 30px; 
      height: 40px;
      background-color: #ff0;
      text-align: center;
    }
    #formxulythanhvien {
      height: 300px;
      background-color: #00BCD4;
    }
   
    
    #viewthanhvien {
      width: 100%;
      height: 260px;
      margin-top: 20px;
      
      padding-left: 50px;
      background-color: #00bcd45e;
      border-radius: 30px;
       overflow-y: scroll;

      }
  </style>
  <meta charset="UTF-8">
  <title>Thành Viên</title>
</head>
<body>
  <div id="tieudethanhvien">
    
    <h1>QUẢN LÝ THÀNH VIÊN</h1>

  </div>

  
  <div id="viewthanhvien">
    <table border="1">
      <tr>
        <th>STT</th>
        <th>Họ Tên</th>
        <th>Năm Sinh</th>
        <th>Địa Chỉ</th>
        <th>Gmail</th>
        <th>SĐT</th>
        <th>Tài Khoản</th>
        <th>Loại Tài Khoản</th>
        <th>Action</th>
        <th><a href="http://localhost/final/view/add_user.php/">+</a></th>
      </tr>
   <?php

   
     include_once("../model/connect.php");
     echo "<h1>Thông Tin User</h1> ";
    
          $sql = "SELECT * FROM account_information, account where LOAITK='2' and account.ID = account_information.IDTAIKHOAN ";
          $ketqua = $connect->query($sql);
        /*  $sql2 = "SELECT * FROM account";
        $ketqua2 = $connect->query($sql2);
        $row = mysqli_fetch_assoc($ketqua)*/
        $i = 1;
        while($row = mysqli_fetch_assoc($ketqua))
        {
          echo "<tr>";
          echo "<td>".$i."</td>";
          echo "<td>".$row["TEN"]."</td>";
          echo "<td>".$row["NGSINH"]."</td>";
          echo "<td>".$row["DC"]."</td>";
          echo "<td>".$row["EMAIL"]."</td>";
          echo "<td>".$row["SDT"]."</td>";
          echo "<td>".$row["TAIKHOAN"]."</td>";
          echo "<td>".'User'."</td>";
          echo "<td>
          
           <a href = 'http://localhost/final/view/delete_user.php?id=".$row['ID']."'>Xóa</a>|
          <a href = 'http://localhost/final/view/update_user.php?id=".$row['ID']."'>Sửa</a>
          </td>";
          echo "</tr>";
          $i++;
        }
     
    ?>
    </table>
  </div>
  <div id="viewthanhvien">
   
    <table border="1">
      <tr>
        <th>STT</th>
        <th>Họ Tên</th>
        <th>Năm Sinh</th>
        <th>Địa Chỉ</th>
        <th>Gmail</th>
        <th>SĐT</th>
        <th>Tài Khoản</th>
        <th>Loại Tài Khoản</th>
        <th>Action</th>
        <th><a href="http://localhost/final/view/add_admin.php/">+</a></th>
      </tr>
    <?php

   
     include_once("../model/connect.php");
     echo "<h1>Thông Tin Admin</h1> ";
    
          $sql = "SELECT * FROM account_information, account where LOAITK='1' and account.ID = account_information.IDTAIKHOAN ";
          $ketqua = $connect->query($sql);
        /*  $sql2 = "SELECT * FROM account";
        $ketqua2 = $connect->query($sql2);
        $row = mysqli_fetch_assoc($ketqua)*/
        $i = 1;
        while($row = mysqli_fetch_assoc($ketqua))
        {
          echo "<tr>";
          echo "<td>".$i."</td>";
          echo "<td>".$row["TEN"]."</td>";
          echo "<td>".$row["NGSINH"]."</td>";
          echo "<td>".$row["DC"]."</td>";
          echo "<td>".$row["EMAIL"]."</td>";
          echo "<td>".$row["SDT"]."</td>";
          echo "<td>".$row["TAIKHOAN"]."</td>";
          echo "<td>".'Admin'."</td>";
           echo "<td>
          
          <a href = 'http://localhost/final/view/delete_user.php?id=".$row['ID']."'>Xóa</a>|
          <a href = 'http://localhost/final/view/update_user.php?id=".$row['ID']."'>Sửa</a>
          </td>";
          echo "</tr>";
          $i++;
        }
     
    ?>
    </table>
    
  </div>
</body>
</html>
