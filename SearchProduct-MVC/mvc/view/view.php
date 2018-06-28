<?php 
include ('controller/controller.php'); 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>

<?php
	
	if(isset($_GET['search'])){
	
	$search_query = $_GET['user_query'];
	
	$get_pro = "select * from product_tag where product.ID = product_tag.IDSanPham and product_tag like '%$search_query%'";

	$run_pro = mysqli_query($con, $get_pro); 
	
	while($row_pro=mysqli_fetch_array($run_pro)){
	
		$pro_id = $row_pro['ID'];
		$pro_title = $row_pro['TENSANPHAM'];
		$pro_price = $row_pro['GIA'];
		$pro_image = $row_pro['HINH'];
	
		echo "
				<div id='single_product'>
				
					<h3>$pro_title</h3>
					

					<img src='hình' width='180' height='180' />
					
					<p><b> $ $pro_price </b></p>
					
					<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
					
					<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
				
				</div>
		";
	}
	}
	?>