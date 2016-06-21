<?php
session_start();
    if (!isset($_SESSION["name"])) {
        header("Location:login.php");
    } else if (isset($_SESSION["name"])) {
        echo "
        <div id='xac_thuc' style='position: fixed; top: 15px; right: 15px'>
		    Chào:<span style='color:red'> ". $_SESSION["name"]." </span>
		    <a href='logout.php'> Đăng xuất </a><br />
		    </p>
		</div>";
    }
?>