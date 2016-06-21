<?php include_once("../views/navigation/begin_navigation.php"); ?> 

<form class="form-horizontal" method="post" onSubmit="return check();">
    <div class="form-group">
        <label for="Username" class="col-sm-2 control-label">Username</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="Username" name="Username" placeholder="Username"
                   value="<?php echo $user->user_name; ?>">
            <span id="checkUsername"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
            <span id="checkpass"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Nhập lại Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="re_pass" name="re_pass" placeholder="Nhập lại Password">
            <span id="checkre_pass"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="Email" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10" id="checkmail">
            <input type="email" class="form-control" id="Email" name="email" placeholder="Email"
                   value="<?php echo $user->email; ?>"><span id="checkEmail"></span>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="Capnhat" class="btn btn-default">Update</button>
        </div>
    </div>
</form>
<script>
    function check() {
        var Username = document.getElementById('Username');
        var pass = document.getElementById('pass');
        var re_pass = document.getElementById('re_pass');
        var email = document.getElementById('Email');
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (Username.value == "") {
            document.getElementById("checkUsername").innerHTML = "Vui lòng điền tên";
            return false;
        }
        else if (pass.value == "") {
            document.getElementById("checkpass").innerHTML = "Chưa nhập password";
            return false;
        }
        else if (re_pass.value == "") {
            document.getElementById("checkre_pass").innerHTML = "Chưa nhập lại password";
            return false;
        }
        else if (pass.value != re_pass.value) {
            document.getElementById("checkre_pass").innerHTML = "Nhập lại password bị sai";
            return false;
        }
        else if (!filter.test(email.value)) {
            document.getElementById("checkEmail").innerHTML = "Vui lòng điền một địa chỉ email";
            //alert('Vui lòng điền một địa chỉ email');
            email.focus;
            return false;
        }
        else return true;

    }
</script>

<?php include("../views/navigation/begin_navigation.php"); ?>

