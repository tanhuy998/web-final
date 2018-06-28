<?php 
include '../controller/controller.php'; 
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post"> 
		<table align="center" width="795" border="2" bgcolor="#187eae">
			<tr align="center">
				<td colspan="7"><h2>Thêm sản phẩm mới : </h2></td>
			</tr>
			<tr>
				<td align="right"><b>Tên Sản Phẩm :</b></td>
				<td><input type="text" name="product_name" size="60" required/></td>
			</tr>
			<tr>
				<td align="right"><b>Hình ảnh:</b></td>
				<td><input type="file" name="product_image" /></td>
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
				<td align="right"><b>Tags Sản Phẩm:</b></td>
				<td><input type="text" name="product_tags" size="50" required/></td>
			</tr>
			<tr align="center">
				<td colspan="7"><input type="submit" name="insert_post" value="Thêm sản phẩm này"/></td>
			</tr>
		</table>
	</form>
</body>
</html>