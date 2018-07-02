<?php
    require_once '../libs/LoginStatus.php';
    session_start();

    if (isset($_POST['submit'])) {
        $newInfo = $_SESSION['user']->GetInformation();

        $newInfo['TEN'] = $_POST['name'];
        $birthday = $_POST['ns'];
        $newInfo['NGSINH'] = date("Y-m-d", strtotime($birthday));
        $newInfo['DC'] = $_POST['dc'];
        $newInfo['EMAIL'] = $_POST['gmail'];
        $newInfo['SDT'] = $_POST['sdt'];
        
        if ($_SESSION['user']->UpdateInformation($newInfo)) {
            echo 'Thay đổi thông tin thành công.  ';
        }
        else {
            echo 'Không thành công trong việc thay đổi thông tin.  ';
        }

        echo '<a href="http://localhost/final/control/C_Index.php">Trở về trang chủ</a>';
    }
?>