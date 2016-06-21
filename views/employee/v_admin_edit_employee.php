
<script type="text/javascript">
    function KiemtraSua() {
        var Username = document.getElementById('name');
        var email = document.getElementById('email');
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var result = true;

        if (Username.value == "") {
            document.getElementById("checkUsername").innerHTML = "Vui lòng điền tên";
            result = false;
        }

        if (!filter.test(email.value)) {
            document.getElementById("checkEmail").innerHTML = "Vui lòng điền một địa chỉ email";
            //alert('Vui lòng điền một địa chỉ email');
            email.focus;
            result = false;
        }
        return result;
    }
</script>
<h3> Cập nhật thông tin nhân viên</h3>

<form method="post" name="frm" enctype="multipart/form-data">
    <table class="table-hover" width="700px" border="0">
        <tr>
            <td class="col-sm-2 control-label" width="40%">Tên:</td>
            <td width="60%">
                <input class="form-control" type="text" name="name" id="name" size="30" value="<?php echo $employee->name; ?>"/>
                <span id="checkUsername" style="color: crimson"></span>
            </td>
        </tr>
        <tr>
            <td class="col-sm-2 control-label" width="40%">Department:</td>
            <td width="60%"><select name="department" class="form-control">
                    <option>&nbsp;</option>
                    <?php
                    foreach ($departments as $phong) {
                        echo "<option ";
                        if($employee->department==$phong->id){
                            echo "selected value='".$phong->id."'>";
                        } else{
                            echo "value='".$phong->id."'>";
                        }
                        echo $phong->name;
                        echo "</option>";
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td class="col-sm-2 control-label" width="40%">Job title:</td>
            <td width="60%"><input class="form-control" name="job_title" id="job_title"
                                   value="<?php echo $employee->job_title; ?>"/></td>
        </tr>
        <tr>
            <td class="col-sm-2 control-label" width="40%">Email:</td>
            <td width="60%">
                <input class="form-control" type="text" name="email" id="email" size="30" value="<?php echo $employee->email; ?>"/>
                <span id="checkEmail" style="color: crimson"></span>
            </td>
        </tr>

        <tr>
            <td class="col-sm-2 control-label" width="40%">Avatar:</td>
            <td width="60%"><img src="../public/images/employee/<?php echo $employee->hinh; ?>" height="100px"/>
                <input type="file" name="hinh"/></td>
        </tr>
        <tr><td>.</td></tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="Cập nhật" name="Capnhat" onclick="return KiemtraSua()" class="btn btn-primary"/>
                <input type="button" value="Bỏ qua" name="Boqua" onclick="window.location='employee.php'" class="btn btn-warning"/>
            </td>
        </tr>
    </table>
</form>
		

