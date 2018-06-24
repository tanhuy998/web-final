<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ĐĂNG KÝ</title>

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
    <link rel="stylesheet" href="http://localhost/final/css//responsive.css">
    <link rel="stylesheet" href="http://localhost/final/css/dropstyle.css">
    <script type="text/javascript" src="../js/lib.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body onload="CartTotal();PrintProductsToCartTable()">

    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                        <?php
                            if ($_SESSION['user']->IsAdmin()) {
                                echo "<li><a href=\"#\"><i class=\"fa fa-user\"></i> My Account</a></li>";
                                echo "<li><a href=\"#\"><i class=\"fa fa-user\"></i> Quản lý thành viên</a></li>";
                                echo "<li><a href=\"#\"><i class=\"fa fa-user\"></i> Quản lý Sản phẩm</a></li>";
                                echo "<li><a href=\"http://localhost/final/control/C_Logout.php\"><i class=\"fa fa-user\"></i> Đăng xuất</a></li>";
                            }
                            else if ($_SESSION['user']->IsAnonymous()) {
                                echo "<li><a href=\"#\"><i class=\"fa fa-user\"></i> Đăng nhập</a></li>";
                                echo "<li><a href=\"#\"><i class=\"fa fa-user\"></i> Đăng kí</a></li>";
                            }
                            else {
                                echo "<li><a href=\"#\"><i class=\"fa fa-user\"></i> My Account</a></li>";
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
                        <a href="cart.html">Giỏ hàng - <span class="cart-amunt"><?php echo number_format($GLOBALS['cart-total']);?> VNĐ</span> <i class="fa fa-shopping-cart"></i> <span class="product-count"><?php echo $GLOBALS['cart-qty'];?></span></a>
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
                    <li><a href="http://localhost/final/control/C_Index.php">TRANG CHỦ</a></li>
                        <li>
                            <div class="dropdown">
                                <button class="dropbtn">SẢN PHẨM</button>
                                <div class="dropdown-content">
                                  <a href="http://localhost/final/control/C_Product.php?category=ao&page=1">ÁO</a>
                                  <a href="http://localhost/final/control/C_Product.php?category=quan&page=1">QUẦN</a>
                                  <a href="http://localhost/final/control/C_Product.php?category=giay&page=1">GIÀY DÉP</a>
                                </div>
                            </div>
                        </li>
                        <!--<li><a href="#">Single product</a></li> -->
                        <li class="active"><a href="http://localhost/final/control/C_Cart.php">GIỎ HÀNG</a></li>
                        <li><a href="http://localhost/final/control/C_Checkout.php">THANH TOÁN</a></li>
                        <!-- <li><a href="#">Category</a></li> -->
                        <!-- <li><a href="#">Others</a></li> -->
                        <li><a href="#">LIÊN HỆ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End mainmenu area -->
    
    <div class="slider-area">
        <div class = "divdangky">
           
            <form action="http://localhost/final/control/xulydk.php" method="POST" class ="divformdangky">
                 <h1 >Sign Up</h1>
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
           
                 <input type="submit" name="submit" value="Sign Up" class="textbox">


                
            </form>
            
           
        </div>
    </div>
    <!-- End slider area -->


</body>

</html>