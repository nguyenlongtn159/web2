<?php include("../views/navigation/begin_navigation.php");?>

    <script type="text/javascript">
        function KiemtraSua() {
            var name = document.getElementById("name");
            if (name.value == "") {
                alert("Nhập tên department");
                name.focus();
                return false;
            }
            return true;
        }
    </script>
    <h3> Sửa thông tin phòng ban: </h3>
    <form method="post" name="frm" enctype="multipart/form-data">
        <table class="table-hover" width="700px" border="0">
            <tr>
                <td class="col-sm-2 control-label" width="40%">Tên phòng ban</td>
                <td width="60%"><input class="form-control" type="text" name="name" id="name" size="30"
                                       value="<?php echo $department->name ?>"/></td>
            </tr>
            <tr>
                <td class="col-sm-2 control-label">Office phone</td>
                <td><input class="form-control" name="office_phone" id="office_phone"
                           value="<?php echo $department->office_phone ?>"/></td>
            </tr>
            <tr>
                <td class="col-sm-2 control-label">Manager</td>

                <td> Chọn Người quản lý ( mặc định là người đầu tiên):
                    <select id="browsers" name="manager" onchange="Read_employee_with_id()">
                        <option><?php //print_r($employee); ?></option>
                        <?php
                        foreach ($employee as $nv) {
                            echo "<option value='";
                            echo $nv->id;
                            echo "'>";
                            echo $nv->name;
                            echo "</option>";
                        }
                        ?>
                    </select>
                    <!--<input class="form-control" type="text" name="manager" id="manager" size="30" value="<?php echo $department->manager ?>" /> -->
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td><td>&nbsp;</td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Cập nhật" name="Capnhat" onclick="return KiemtraSua()" class="btn btn-info"/>
                    <input type="button" value="Bỏ qua" name="Boqua" onclick="window.location='department.php'" class="btn btn-warning"/>
                </td>
            </tr>
        </table>
    </form>


    <div id="hienthi"></div>
    <script type="text/javascript" src="../public/js/thu_vien_ajax.js"></script>

<?php include("../views/navigation/end_navigation.php");?>