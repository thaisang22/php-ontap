<?php

session_start();
require_once 'xuly.php';

$xuly = new xuly();

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
if ($page == 'download') {

    if (!isset($_SESSION['login'])) {
        echo "Bạn chưa đăng nhập";
        exit;
    }

    if (isset($_GET['file'])) {

        $fileName = $_GET['file'];

        $xuly->downloadFile($fileName);
    }

    exit;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Website</title>

<style type="text/css">

#apDiv1 {
	position: absolute;
	left: 108px;
	top: 21px;
	width: 1105px;
	height: 100px;
	z-index: 1;
	color: #000;
}

#apDiv2 {
    position: absolute;
    width: 1105px;
    height: 100px;
    z-index: 1;
}

</style>

<link 
    href="SpryAssets/SpryMenuBarHorizontal.css" 
    rel="stylesheet" 
    type="text/css" 
/>

<script 
    src="SpryAssets/SpryMenuBar.js" 
    type="text/javascript">
</script>

</head>


<body>

<div id="apDiv1">

    <div id="apDiv2">

        <ul id="MenuBar1" class="MenuBarHorizontal">

            <!-- TRANG CHỦ -->

            <li>
                <a href="index.php?page=home">
                    Trang chủ
                </a>
            </li>


            <?php if (!isset($_SESSION['login'])) { ?>


                <!-- ĐĂNG KÝ -->

                <li>
                    <a href="index.php?page=dangky">
                        Đăng ký
                    </a>
                </li>


                <!-- ĐĂNG NHẬP -->

                <li>
                    <a href="index.php?page=dangnhap">
                        Đăng nhập
                    </a>
                </li>


            <?php } else { ?>


                <!-- UPLOAD -->

                <li>
                    <a href="index.php?page=uploadfile">
                        Upload file
                    </a>
                </li>


                <!-- ĐĂNG XUẤT -->

                <li>
                    <a href="index.php?page=dangxuat">
                        Đăng xuất
                    </a>
                </li>


            <?php } ?>

      </ul>

  </div>

</div>


<br><br><br><br><br>


<?php

switch ($page) {


    // =========================
    // TRANG CHỦ
    // =========================

    case 'home':

        echo "Chào mừng bạn đến trang chủ";

        if (isset($_SESSION['login'])) {

            echo "<br>";

            echo "Xin chào " . $_SESSION['username'];

        }

        break;


    // =========================
    // ĐĂNG KÝ
    // =========================

    case 'dangky':

        require_once('dangky.php');

        break;


    // =========================
    // ĐĂNG NHẬP
    // =========================

    case 'dangnhap':

        require_once('dangnhap.php');

        break;


    // =========================
    // UPLOAD
    // =========================

    case 'uploadfile':

        if (!isset($_SESSION['login'])) {
			echo 'chua dang nhap';


        } else {

            require_once('uploadfile.php');

        }

        break;


    // =========================
    // ĐĂNG XUẤT
    // =========================

    case 'dangxuat':

        $xuly->dangxuat();
		header("Location: index.php?page=home");
        break;


    // =========================
    // KHÔNG TÌM THẤY
    // =========================

    default:

        echo "Không tìm thấy trang";

        break;
}

?>


<script type="text/javascript">

var MenuBar1 = new Spry.Widget.MenuBar(
    "MenuBar1",
    {
        imgDown: "SpryAssets/SpryMenuBarDownHover.gif",
        imgRight: "SpryAssets/SpryMenuBarRightHover.gif"
    }
);

</script>

</body>

</html>