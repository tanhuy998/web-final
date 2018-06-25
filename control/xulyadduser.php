<?php 
function hashCode($str) {
    $str = (string)$str;
    $hash = 0;
    $len = strlen($str);
    if ($len == 0 )
        return $hash;
 
    for ($i = 0; $i < $len; $i++) {
        $h = $hash << 5;
        $h -= $hash;
        $h += ord($str[$i]);
        $hash = $h;
        $hash &= 0xFFFFFFFF;
    }
    return $hash;
}
 ?>
<?php 

    include_once("../model/connect.php");
  	if (isset($_POST['submit'])){
	/********************Start lấy thông tin form**************************************************************/
        $name = $_POST['name'];
        $birthday = $_POST['ns'];
        $ngsinh = date("Y-m-d", strtotime($birthday));
        $diachi = $_POST['dc'];
        $gmail = $_POST['gmail'];
        $sdt = $_POST['sdt'];
        $tentaikhoan = $_POST['tendn'];
        $matkhau = $_POST['mk'];

        $matkhau = hashCode($matkhau);
	/********************End lấy thông tin form******************************************************************/



    /*************************start Kiểm tra thông tin tài khoản*************************************************/
    if (!$name || !$ngsinh || !$diachi || !$gmail || !$sdt || !$tentaikhoan || !$matkhau)
    {
        echo "Vui lòng nhập đầy đủ thông tin. <a href='http://localhost/final/view/add_user.php/'>Trở lại</a>";
        exit;
    }
        $sql = "SELECT TAIKHOAN FROM account WHERE '$tentaikhoan'= TAIKHOAN ";
	    $ketqua = $connect->query($sql);
	    $row = mysqli_fetch_assoc($ketqua);
	
    if($row['TAIKHOAN']){
    	echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='http://localhost/final/view/add_user.php/'>Trở lại</a>";
        exit;
    }
        $sql = "SELECT EMAIL FROM account_information WHERE '$gmail'= EMAIL ";
	    $ketqua = $connect->query($sql);
	    $row = mysqli_fetch_assoc($ketqua);
	
    if($row['EMAIL']){
    	echo "Gmail đã được sử dụng, vui lòng nhập gmail khác ! cảm ơn!. <a href='http://localhost/final/view/add_user.php/'>Trở lại</a>";
        exit;
    }
        $sql = "SELECT SDT FROM account_information WHERE '$sdt'= SDT ";
	    $ketqua = $connect->query($sql);
	    $row = mysqli_fetch_assoc($ketqua);
	
    if($row['SDT']){
    	echo "Số điện thoại đã được sử dụng, vui lòng nhập số điện thoại khác ! cảm ơn!. <a href='http://localhost/final/view/add_user.php/'>Trở lại</a>";
        exit;
    }
    /*************************end Kiểm tra thông tin tài khoản*************************************************/


    /********************Start tương tác Database**************************************************************/
        $sql = "INSERT INTO account(TAIKHOAN,MATKHAU,LOAITK) VALUES ('$tentaikhoan',' $matkhau','2')";
        $connect->query($sql);
    
        $sql = "SELECT ID FROM account WHERE TAIKHOAN = '$tentaikhoan' ";
	    $ketqua = $connect->query($sql);
	    $row = mysqli_fetch_assoc($ketqua);
	    $idtaikhoan = $row['ID'];

   	
        $sqlb = "INSERT INTO account_information(IDTAIKHOAN,TEN,NGSINH,DC,EMAIL,SDT) VALUES ('$idtaikhoan','$name','$ngsinh','$diachi','$gmail','$sdt')";
        $connect->query($sqlb);
    
    }
   	/********************End tương tác Database*****************************************************************/
   
   
   
 ?>
 <p>Thêm thành công!</p>
<a href="http://localhost/final/view/thanhvien.php/">trở lại</a>