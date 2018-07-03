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
                        <li class="active"><a href="#">TRANG CHỦ</a></li>
                        <li >
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
                        <li><a href="http://localhost/final/control/C_Cart.php">GIỎ HÀNG</a></li>
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


    <table>
        <!-- display one data row -->
        <a href="http://localhost/final/control/C_Index.php">Trở về trang chủ</a>
        <br><br>
        <?php
        foreach($pro as $eachPro)
        {
        ?>
            <tr align="center">
                <?php $id = $eachPro->IDSANPHAM ?>
                <td><?php echo $eachPro->ID?></td> 
                <td><?php echo $eachPro->TENSANPHAM;?></td>
                <td><img src="<?php echo "../../img/".$eachPro->DUONGDAN; ?>" width="180" height="180"/></td>
                <td><?php echo $eachPro->GIA;?></td>
                <td><a href="V_UpdateProduct.php?Id_To_Update = <?php echo $id; ?>"> Chỉnh sửa </a></td>
                <td><a href="../controller/C_product.php?delete_product=<?php echo $eachPro->ID; ?>"> <?php if ($eachPro->ACTIVE == 1) {echo 'Cho ngừng kinh doanh';} else {echo 'Kinh doanh lại';}?> </a></td>
    
            </tr>
        <?php } ?>  
        
    </table>
	
	

</body>
</html>

