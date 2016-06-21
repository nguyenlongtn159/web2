<?php include("../views/navigation/begin_navigation.php"); ?>

<form method="post">
    <h3>Quên mật khẩu: </h3>
    <label>Nhập tên user: </label><br>
    <input type="text" name="user_name"><br>
    <input type="submit" value="Gửi">
    <span class="msg">
        <?php
        if (isset($_POST["msg"])) {
            $msg = $_POST['msg'];
            if($msg==1){
                echo "<p style='color: dodgerblue'>Thư gửi thành công. Xin mời kiểm tra hòm thư!</p>";
            }else{
                echo "<p style='color: crimson'>Lỗi gửi thư - $msg</p>";
            }
        }
        ?>
    </span>
</form>

<?php include("../views/navigation/end_navigation.php"); ?>