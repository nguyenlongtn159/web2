
<a href="add_department.php" class="btn btn-success">Thêm phòng ban</a><br><br>

Danh sách phòng ban:
<h3 align="center" style="color:red"><?php if (isset($msg)) {
        echo $msg;
    } ?> </h3>
<table class="table table-hover">
    <tr class="active">
        <td>Mã phòng ban:</td>
        <td>Tên :</td>
        <td>Office phone:</td>
        <td>Manager:</td>
        <td></td>
        <td></td>
    </tr>

    <?php
    $page = $_GET['page'];
    if ($page < 1) {
        $page = 1;
    } else if ($page > $pages) {
        $page = $pages;
    } else {

        include("../models/m_employee.php");
        $m_employ = new M_employee();

        foreach ($department as $phong) {

            //echo "<p id='hienthi".$phong->manager."'>lol</p>";
            echo "<tr><td>" . $phong->id . "</td>";
            echo "<td> " . $phong->name . "</td>";
            echo "<td> " . $phong->office_phone . "</td>";
            echo "<td> " .$m_employ->Get_name_by_id($phong->manager)."</td>";//Lấy tên quản lý theo id
            echo "<td><a href='chi_tiet_employee.php?id=" . $phong->manager . "' id='hienthi" . $phong->manager . "'></a></td>";
            echo "<td><a href='edit_department.php?id=" . $phong->id . "' class='btn btn-info'> Chỉnh sửa </a>
            <a href='javascript:void(0)' onclick='del_department(".$phong->id.")' class='btn btn-danger '> Xóa </a></td></tr>";


        }
    }
    if (substr_count($_SERVER['PHP_SELF'], '/ql_nhan_vien/admin/department_ajax.php') == 0) {
        echo "</table><div class='col-md-4'>" . $lst . "</div>";
    } //echo "</table>".$_SERVER['PHP_SELF'];
    else {
        $page = $_GET['page'];
        if ($page <= 1) {
            $page = 1;
        } else if ($page > $pages) {
            $page = $pages;
        }
        
        echo "</table><a href='?view=Department&page=" . ($page - 1) . "'>&lt;&lt; Trang trước(" . ($page - 1) . ")</a> [" . $page . "] <a href='?view=Department&page=" . ($page + 1) . "'>Trang tiếp(" . ($page + 1) . ")>></a>";
    }

    ?>

    <script type="text/javascript">
        function del_department(id) {
            if (confirm("Bạn muốn xóa bỏ Derpartment này ?")) {
                window.location = "del_department.php?id=" + id;

            }
        }
    </script>