<?php 
include ('../controller/C_product.php'); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> </title>

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

</head>
<body>
<div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                        
                        </ul>
                    </div>
                </div>
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
                            <a href="index.html"> <span> TripleDs </span>Fashion</a>
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
	<div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Sản Phẩm</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <form method="post" enctype="multipart/form-data"> 
        <a href="http://localhost/final/control/C_Index.php">Trở về trang chủ</a>

        <br> <br>
		<table align="center" width="795" border="2" bgcolor="#187eae">
			<tr align="center">
				<td colspan="7"><h2> Chỉnh sửa sản phẩm </h2></td>
			</tr>
			<tr>
				<td align="right"><b>ID sản phẩm :</b></td>
				<td><input type="text" name="product_id" size="60" required/></td>
			</tr>
			<tr>
				<td align="right"><b>Tên Sản Phẩm :</b></td>
				<td><input type="text" name="product_name" size="60" required/></td>
			</tr>
			<tr>
				<td align="right"><b>Giá :</b></td>
				<td><input type="text" name="product_price" required/></td>
			</tr>
			<tr>
				<td align="right"><b>Mô tả:</b></td>
				<td><textarea name="product_desc" cols="20" rows="10"></textarea></td>
			</tr>
			<tr>
				<td align="right"><b>Hình ảnh:</b></td>
				<td><input type="file" name="product_image" value="Tải lên" placeholder="Tải lên từ máy tính" /></td>
			</tr>
			<tr>
				<td align="right"><b>Tags Sản Phẩm:</b></td>
				<td><input type="text" name="product_tags" size="50" required/></td>
			</tr>
			<tr align="center">
				<td colspan="7"><input type="submit" name="update_product" value="Cập nhật sản phẩm"/></td>
			</tr>
		</table>
	</form>
	
	

</body>
</html>

