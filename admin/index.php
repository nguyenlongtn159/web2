<?php
require_once("xac_thuc.php");
/*
$cookie_name = "views";
if(isset($_GET["views"])){
    $cookie_value = $_GET["views"];
    setcookie($cookie_name, $cookie_value, time() + 3600, "/");
}
else{
     $cookie_value = "Department";
     setcookie($cookie_name, $cookie_value, time() + 3600, "/");
} */
include_once("../views/navigation/begin_navigation.php");
//echo $_SERVER['HTTP_REFERER'];
//echo $_SERVER['PHP_SELF'];


  if(isset($_SESSION["msg"]))
  {
    echo $_SESSION["msg"];
    unset($_SESSION["msg"]); 
  }
?>
    <meta charset="UTF-8">
    <script type="text/javascript" src="../public/js/thu_vien_ajax.js"></script>
    <div class="container-fluid">Chọn phần muốn xem:<br/>
        <select id="mySelect2" class="btn btn-default" name="gg"onchange="myFunction()">
            <?php
            if ($_COOKIE["view"] == "Employee") {
                echo '<option value="Department">Department</option><option value="Employee" selected>Employee</option>
                 <option value="User">User</option> ';
            } 
            else if($_COOKIE["view"] == "User"){
                echo '<option value="Department">Department</option> 
                <option value="Employee">Employee</option>
                <option value="User" selected>User</option>';
            }
            else {
                echo '<option value="Department" selected>Department</option>
                <option value="Employee">Employee</option>
                <option value="User">User</option> ';
            }
            ?>
            </select>
       <table align="center" width="600px" border="0" cellpading="15px" bgcolor="#FEF3CB">
            <tr>
                <td align="center">
                    <?php
//echo $_SERVER['PHP_SELF'];
//if (substr_count($_SERVER['PHP_SELF'], '/ql_nhan_vien/admin/employee.php') == 1) {
    /*  if (isset($_SERVER['HTTP_REFERER']) && substr_count($_SERVER['HTTP_REFERER'], '/ql_nhan_vien/admin/employee_ajax.php') == 0 && substr_count($_SERVER['HTTP_REFERER'], '/ql_nhan_vien/admin/index.php') == 0){ */
    echo '<div class="form-inline">Tìm nhân viên: 
            <label class="sr-only" for="DepartmentId"></label>
                <select name="department3" class="form-control" id="department_id3" onchange="Tim_employee2();">
                    <option id="myOption" value="all" selected>All</option>';
require_once("../models/m_department.php");
$m_department_2 = new M_department();
        $departments = $m_department_2->Read_full_department();
    foreach ($departments as $phong) {
        echo "<option id='myOption' value='$phong->name'>";
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
    echo '"/>'; ?>
                </td>
            </tr>
        </table> 


        <div id="hienthi"></div>
       <div style="visibility: hidden"> <input type="number" name="page" id="page" value="<?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            if ($page <= 1) {
                $page = 1;
            }
        } else $page = 1;
        echo $page; ?>"/>
        <button type="button" onclick="myFunction()">Đến trang</button> </div>
        
        <script>
            function myFunction() {
                var xx = document.getElementById("mySelect2").selectedIndex;
                var y = document.getElementsByTagName("option")[xx].value;
                if (y == "Department") {
                    showDepartment();
                }
                else if(y == "User"){
                    showUser();
                }
                else {
                    showEmployee();
                }
            }
            myFunction();
        </script>
        <script type="text/javascript">
            function del_employee(id) {
                if (confirm("Bạn muốn xóa bỏ nhân viên này ?")) {
                    window.location = "del_employee.php?id=" + id;
                }
            }
            function del_department(id) {
                if (confirm("Bạn muốn xóa bỏ department này ?")) {
                    window.location = "del_department.php?id=" + id;
                }
            }
        </script>
    </div>

<?php include("../views/navigation/end_navigation.php"); ?>