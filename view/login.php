<link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="http://localhost:8888/web-test/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="http://localhost:8888/web-test/dropstyle.css">
<!DOCTYPE html>
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
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="http://localhost:8888/web-test/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="http://localhost:8888/web-test/dropstyle.css">
    <script type="text/javascript" src="js/lib.js"></script>


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
                            <li><a href="#"><i class="fa fa-user"></i> Tài khoản </a></li>
                            <!-- <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li> -->
                            <li><a href="cart.html"><i class="fa fa-user"></i> Giỏ hàng</a></li>
                            <li><a href="checkout.html"><i class="fa fa-user"></i> Thanh toán</a></li>
                            <li><a href="#"><i class="fa fa-user"></i> Đăng nhập</a></li>
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
    <!-- End mainmenu area -->

    <div style="background-color: #00f3ff42;; width: 100%; height: 500px;">
        <div style="width: 40%; height: 320px; margin:auto;background-color: #00ff7e; border-radius: 20px; padding: 40px; "><h1 style="text-align: center; " >Login</h1>
          
            
            <form action="http://localhost/final/control/C_Login-Process.php" method="post">
                <input type="text"name="username" placeholder="Tên Đăng Nhập" style="width: 100%" >
                <br>
                <br>
                <input type="password" name="password" placeholder="Nhập Mật Khẩu" style="width: 100%" >
                <br>
                <br>

                 <input type="submit" name="submit" value="Đăng Nhập" class="textbox">
            </form>
            <a href="http://localhost:8888/web-test/dangkythanhvien.php ">Đăng Ký Mới</a>
        </div>
        abc
    </div>
    <!-- End footer bottom area -->

    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>

    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>

    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>

    <!-- Main Script -->
    <script src="js/main.js"></script>
</body>

</html>