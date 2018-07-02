<?php
    require_once '../libs/LoginStatus.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chào Mừng Bạn Đến Với TripleDsShop</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="http://localhost/final/css/owl.carousel.css">
    <link rel="stylesheet" href="http://localhost/final/css/style.css">
    <link rel="stylesheet" href="http://localhost/final/css/responsive.css">
    <link rel="stylesheet" href="http://localhost/final/css/dropstyle.css">
    <script type="text/javascript" src="http://localhost/final/js/lib.js"></script>

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

      <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                        <?php
                            if ($_SESSION['user']->IsAdmin()) {
                                echo "<li><a href=\"http://localhost/final/control/C_Personal_Info.php\"><i class=\"fa fa-user\"></i>".$_SESSION['user']->GetInformation()['TEN']."</a></li>";
                                echo "<li><a href=\"http://localhost/final/view/thanhvien.php\"><i class=\"fa fa-user\"></i> Quản lý thành viên</a></li>";
                                echo "<li><a href=\"http://localhost/final/Product/view/V_ViewProduct.php\"><i class=\"fa fa-user\"></i> Quản lý Sản phẩm</a></li>";
                                echo "<li><a href=\"http://localhost/final/Product/view/V_InsertProduct.php\"><i class=\"fa fa-user\"></i> Thêm sản phẩm</a></li>";
                                echo "<li><a href=\"http://localhost/final/view/order_list.php\"><i class=\"fa fa-user\"></i> Chi tiết hóa đơn</a></li>";


                                echo "<li><a href=\"http://localhost/final/control/C_Logout.php\"><i class=\"fa fa-user\"></i> Đăng xuất</a></li>";
                            }
                            else if ($_SESSION['user']->IsAnonymous()) {
                                echo "<li><a href=\"http://localhost/final/control/C_Login.php\"><i class=\"fa fa-user\"></i> Đăng nhập</a></li>";
                                echo "<li><a href=\"http://localhost/final/control/C_Register.php\"><i class=\"fa fa-user\"></i> Đăng kí</a></li>";
                            }
                            else {
                                echo "<li><a href=\"http://localhost/final/control/C_Personal_Info.php\"><i class=\"fa fa-user\"></i>".$_SESSION['user']->GetInformation()['TEN']."</a></li>";
                                echo "<li><a href=\"http://localhost/final/control/C_Logout.php\"><i class=\"fa fa-user\"></i> Đăng xuất</a></li>";
                            }
                        ?>
                        </ul>
                    </div>
                </div>

                <!-- <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">INR</a></li>
                                    <li><a href="#">GBP</a></li>
                                </ul> 
                            </li>

                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- End header area -->

    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1>
                            <a href="index.html"> <span>TripleDs </span>Fashion</a>
                        </h1>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.html">Giỏ hàng - <span id="#amount" class="cart-amunt">$</span> <i class="fa fa-shopping-cart"></i> <span id="#count" class="product-count"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End site branding area -->

    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.html">TRANG CHỦ</a></li>
                        <li>
                            <div class="dropdown">
                                <button class="dropbtn">SẢN PHẨM</button>
                                <div class="dropdown-content">
                                    <a href="shop-ao.html">ÁO</a>
                                    <a href="shop-quan.html">QUẦN</a>
                                    <a href="shop-giay.html">GIÀY DÉP</a>
                                </div>
                            </div>
                        </li>
                        <li><a href="#">Sản phẩm đơn lẻ</a></li>
                        <li><a href="cart.html">Giỏ hàng</a></li>
                        <li><a href="checkout.html">Thanh toán</a></li>
                        <!-- <li><a href="#">Category</a></li> -->
                        <!-- <li><a href="#">Others</a></li> -->
                        <li>
                            <div class="dropdown">
                                <button class="dropbtn">LIÊN HỆ</button>
                                <div class="dropdown-content">
                                    <a href="#">Facebook</a>
                                    <a href="#">Instagram</a>
                                    <a href="#">Địa chỉ shop</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

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
