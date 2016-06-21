

<?php
//echo $_SERVER['PHP_SELF'];
if (substr_count($_SERVER['PHP_SELF'], '/admin/employee.php') == 1) {
    /*  if (isset($_SERVER['HTTP_REFERER']) && substr_count($_SERVER['HTTP_REFERER'], '/ql_nhan_vien/admin/employee_ajax.php') == 0 && substr_count($_SERVER['HTTP_REFERER'], '/ql_nhan_vien/admin/index.php') == 0){ */
    echo '<div class="form-inline">
            <label class="sr-only" for="DepartmentId"></label>
                <select name="department3" class="form-control" id="department_id3" onchange="Tim_employee2();">
                    <option id="myOption" value="all" selected>All</option>';

    foreach ($departments as $phong) {
        echo "<option id='myOption' value='$phong->id'>";
        echo $phong->name;
        echo "</option>";
   }


    echo '</select>
                <label class="sr-only" for="Name"></label>
                <input name="name" onkeyup="Tim_employee2();" class="form-control" placeholder="Employee Name" type="text" id="name_employee" value="';
   /* if (isset($_COOKIE["gttim"])) {
        echo $_COOKIE["gttim"];
    } */
  if(isset($_SESSION["gttim"])) { echo $_SESSION["gttim"]; }
    echo '"/>';
           // print_r ($_SESSION);
} //else
 //echo " <span class='panel-body'><h4>Xem/tìm nhân viên theo department: <a href='employee.php'> Sử dụng tìm kiếm</a></h4></span>";
?>

<script type="text/javascript" src="../public/js/thu_vien_ajax.js"></script>
<!--   <button class="btn btn-success" onclick="Tim_employee2()">Search</button>
   <button class="btn btn-default btn-clear" type="button">Clear</button> -->
  <br /><br /> <br /><a href="add_employee.php" class="btn btn-success">Thêm nhân viên</a><br />
<h3>Danh sách nhân viên:</h3>

<div id="hienthi">

    <h3 align="center" style="color:red"><?php if (isset($msg)) {
            echo $msg;
        } ?> </h3>
    <table class="table table-hover">
        <tr class="active">
            <td>Mã nhân viên:</td>
            <td>Tên :</td>
            <td>department:</td>
            <td>Job title:</td>
            <td>email:</td>
            <td>hình:</td>
            <td></td>
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
            foreach ($employee as $nhan_vien) {
                echo "<tr><td>" . $nhan_vien->id . "</td>";
                echo "<td> <a href='chi_tiet_employee.php?id=".$nhan_vien->id."'>" . $nhan_vien->name . "</a></td>";
                echo "<td> " .$m_department_2->Get_name_by_id( $nhan_vien->department). "</td>";
                echo "<td>" . $nhan_vien->job_title . "</td>";
                echo "<td>" . $nhan_vien->email . "</td>";
                echo "<td><img class='empl_img' src='../public/images/employee/" . $nhan_vien->hinh . "' height='150px' /></td>";
                echo "<td><a href='edit_employee.php?id=" . $nhan_vien->id . "' class='btn btn-info'> Chỉnh sửa </a>
            <a href='javascript:void(0)' onclick='del_employee(" . $nhan_vien->id . ")' class='btn btn-danger'> Xóa </a></td></tr>";
            }
        }

        if (substr_count($_SERVER['PHP_SELF'], '/ql_nhan_vien/admin/employee_ajax.php') == 0) {
            echo "</table><div class='col-md-4'>" . $lst . "</div>";
        } else {

            $page = $_GET['page'];

            if ($page <= 1) {
                $page = 1;
            } else if ($page > $pages) {
                $page = $pages;
            }

            echo "</table><a href='index.php?views=Employee&page=" . ($page - 1) . "'>&lt;&lt; Trang trước(" . ($page - 1) . ")</a> [" . $page . "] <a href='index.php?views=Employee&page=" . ($page + 1) . "'>Trang tiếp(" . ($page + 1) . ")>></a>";
        }

        ?>
</div>
<script type="text/javascript">
    function del_employee(id) {
        if (confirm("Bạn muốn xóa bỏ nhân viên này ?")) {
            window.location = "del_employee.php?id=" + id;
        }
    }
</script>
   