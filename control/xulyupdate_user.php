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
    $id =$_POST['id'];

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
    $sql = "update account set TAIKHOAN = '$tentaikhoan',MATKHAU = ' $matkhau' where account.ID = '$id'";
    $connect->query($sql);
    
    /*$sql = "SELECT ID FROM account WHERE TAIKHOAN = '$tentaikhoan' ";
    $ketqua = $connect->query($sql);
    $row = mysqli_fetch_assoc($ketqua);
    $idtaikhoan = $row['ID'];*/

    $sql = "update account_information set TEN = '$name', NGSINH= '$ngsinh', DC ='$diachi', EMAIL ='$gmail', SDT = '$sdt' where account_information.IDTAIKHOAN = '$id'";
    $connect->query($sql);
    
    
    }
    /********************End tương tác Database*****************************************************************/
    
   
   
 ?>
 <p>Sửa thành công!</p>
<a href="http://localhost/final/view/thanhvien.php/">trở lại</a>