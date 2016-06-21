<?php include("../views/navigation/begin_navigation.php");?>

    <script type="text/javascript">
        function CheckAdd() {
            var name = document.getElementById("name");
            if (name.value == "") {
                alert("Vui lòng nhập tên phòng ban");
                name.focus();
                return false;
            }
            return true;
        }
    </script>
    <h3> Thêm phòng ban</h3> 
    <form method="post" name="frm" enctype="multipart/form-data">
        <table class="table-hover" width="700px" border="0">
            <tr>
                <td class="col-sm-2 control-label" width="40%">Tên phòng ban </td>
                <td width="60%"><input class="form-control" type="text" name="name" id="name" size="30"/></td>
                <td>
                    <?php if(isset($_SESSION["msg4"]))
                {
                    echo $_SESSION["msg4"];
                    unset($_SESSION["msg4"]);
                } ?>
                </td>
            </tr>
            
            <tr>
                <td class="col-sm-2 control-label" width="40%">Office phone</td>
                <td width="60%"><input class="form-control" name="office_phone" id="office_phone"/></td>
            </tr>
            <tr>
                <td class="col-sm-2 control-label" width="40%">Manager</td>
                <td width="60%"><input class="form-control" type="text" name="manager" id="manager" size="30"/></td>
            </tr>
            <tr><td>.</td></tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Cập nhật" name="Capnhat" onclick="return CheckAdd()" class="btn btn-primary"/>
                    <input type="button" value="Bỏ qua" name="Boqua" onclick="window.location='department.php'" class="btn btn-warning"/>
                </td>
            </tr>
        </table>
    </form>

<?php include("../views/navigation/end_navigation.php");?>