
<?php 
	include_once("../model/connect.php");
	$id = $_GET['id'];
    $connect->query("DELETE  FROM account_information WHERE 
     IDTAIKHOAN = '$id'");
    $kq= $connect->query("DELETE  FROM account WHERE 
     ID = '$id'");
 ?>
 <a href="http://localhost/final/view/thanhvien.php/">Xóa thành công nhấn để trở lại</a>
