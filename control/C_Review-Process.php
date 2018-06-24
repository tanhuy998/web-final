<?php
    require_once '../libs/LoginStatus.php';
    session_start();

    if (isset($_POST['review'])) {
        $review = $_POST['review'];
        $pID = $_GET['id'];

        if ($review != '') {
            $_SESSION['user']->LeaveComment($pID, $review);

            $back = $_SERVER['HTTP_REFERER'];

            header("Location: $back");
            exit;
        }
        else {
            $back = $_SERVER['HTTP_REFERER'];

            header("Location: $back&rev-error=1");
            exit;
        }
    }
?>