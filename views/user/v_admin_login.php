<?php include("../views/navigation/begin_navigation.php"); ?>

<form class="form-inline" method="post">
    <div class="form-group">
        <label class="sr-only" for="exampleInputEmail3">User Name</label>
        <input name="name" type="text" class="form-control" id="Username" placeholder="Username">
    </div>
    <div class="form-group">
        <label class="sr-only" for="exampleInputPassword3">Password</label>
        <input name="pass" type="password" class="form-control" id="Password" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-default">Sign in</button>
    <br/>
    <?php if(isset($_SESSION["msg2"]))
  {
    echo $_SESSION["msg2"];
    unset($_SESSION["msg2"]); 
  } ?>Chưa có tài khoản? Liên hệ với quản lý!<br/>
    Quên mật khẩu: <a href="get_pass.php">Lấy lại mật khẩu!</a>
</form>

<?php include("../views/navigation/end_navigation.php"); ?>