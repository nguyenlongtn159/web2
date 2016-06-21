<!--<script type="text/javascript">
function CheckAdd()
{
	var name=document.getElementById("name");
	if(name.value=="")
	{
		alert("Vui lòng nhập tên nhân viên");
		name.focus();
		return false;
	}
	return true;
}
</script> -->
<h3> Thêm nhân viên</h3>

<form method="post" name="frm" enctype="multipart/form-data" onSubmit="return check();">
    <table class="table-hover" width="700px" border="0">
        <tr>
            <td class="col-sm-2 control-label" width="40%">Tên nhân viên</td>
            <td width="60%"><input class="form-control" type="text" name="name" id="name" size="30"/><span
                    style="color:crimson" id="checkUsername"></span></span></td>
        </tr>
        <tr>
            <td class="col-sm-2 control-label" width="40%">Department</td>
            <td width="60%"><select name="department" class="form-control">
                    <option></option>
                    <?php
                    foreach ($departments as $phong) {
                        echo "<option value='".$phong->id."'>";
                        echo $phong->name;
                        echo "</option>";
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td class="col-sm-2 control-label" width="40%">Job title</td>
            <td width="60%"><input class="form-control" name="job_title" id="job_title"/></td>
        </tr>
        <tr>
            <td class="col-sm-2 control-label" width="40%">Email</td>
            <td width="60%"><input class="form-control" type="text" name="email" id="email" size="30"/><span
                    style="color:crimson" id="checkEmail"></span></td>
        </tr>

        <tr>
            <td class="col-sm-2 control-label" width="40%">Hình</td>
            <td width="60%"><input type="file" name="hinh"/></td>
        </tr>

        <tr align="center">
            <td>
                <input type="submit" value="Cap Nhat" name="Capnhat" onclick="return CheckAdd()"/><br/>
                <input type="button" value="Bo qua" name="Boqua" onclick="window.location='employee.php'"/>
            </td>
        </tr>
    </table>
</form>
<script>
    function check() {
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