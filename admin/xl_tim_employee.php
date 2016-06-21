<?php
$gttim = null;
$depart = null;
require_once("xac_thuc.php");
if(isset($_SERVER['HTTP_REFERER'])){
    if (substr_count($_SERVER['HTTP_REFERER'], '/ql_nhan_vien/admin/xl_tim_employee.php') == 1 || (substr_count($_SERVER['HTTP_REFERER'], 'index.php') == 0 && substr_count($_SERVER['HTTP_REFERER'], '/ql_nhan_vien/admin/employee.php') == 0)) {
include_once("../views/navigation/begin_navigation.php"); }}
class Tim_kiem
{
    public function Tim_kiem()
    {
        if (isset($_POST["gttim"]) && isset($_POST["department2"])) {
            $_SESSION["gttim"] = $_POST["gttim"];
            $_SESSION["department_search"] = $_POST["department2"];
}
            $gttim = $_SESSION["gttim"];
            $depart = $_SESSION["department_search"];
            
            include_once("../models/m_employee.php");
            $m_employee = new M_employee();
            if ($gttim == "") {
            if ($depart != "all") {
                $employee = $m_employee->Read_employee_with_department_name_no_limit($depart);
            } else {
                $employee = $m_employee->Read_full_employee();
            }
        } else if ($depart != "all") {
            $employee = $m_employee->so_luong_kq_timkiem($gttim, $depart);
        } else {
            $employee = $m_employee->Read_all_employee_with_name($gttim);
        }

        include_once("../controllers/Pager.php");
        $p = new pager();
        if($gttim != ""){$limit = 40;}
        else
        {
            $limit = 4;
        }
        $count = count($employee);
        $vt = $p->findStart($limit);
        $pages = $p->findPages($count, $limit);
        $curpage = $_GET["page"];
        $lst = $p->pageList($curpage, $pages);

        $employee2 = $m_employee->timkiem($gttim, $depart, $vt, $limit);
if(isset($_SERVER['HTTP_REFERER'])){
    if (substr_count($_SERVER['HTTP_REFERER'], 'index.php') == 1 ) {
echo '<br /><a href="add_employee.php" class="btn btn-success">Thêm nhân viên</a><br />
<h3>Danh sách nhân viên:</h3>'; }}
       echo '
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
        </tr>';
         $page = $_GET['page'];
        if ($page < 1) {
            $page = 1;
        } else if ($page > $pages) {
            $page = $pages;
        } else {
            include_once("../models/m_department.php");
            $m_employee_3 = new M_department();
            
            foreach ($employee2 as $nhan_vien) { 
                
                echo "<tr><td>" . $nhan_vien->id . "</td>";
                echo "<td> <a href='chi_tiet_employee.php?id=".$nhan_vien->id."'>" . $nhan_vien->name . "</a></td>";
                echo "<td> " .$m_employee_3->Get_name_by_id( $nhan_vien->department). "</td>";
                echo "<td>" . $nhan_vien->job_title . "</td>";
                echo "<td>" . $nhan_vien->email . "</td>";
                echo "<td><img class='empl_img' src='../public/images/employee/" . $nhan_vien->hinh . "' height='150px' /></td>";
                echo "<td><a href='edit_employee.php?id=" . $nhan_vien->id . "' class='btn btn-info'> Chỉnh sửa </a>
            <a href='javascript:void(0)' onclick='del_employee(" . $nhan_vien->id . ")' class='btn btn-danger'> Xóa </a></td></tr>";
            }
        }
        $page = $_GET['page'];
        if ($page <= 1) {
            $page = 1;
        } else if ($page > $pages) {
            $page = $pages;
        }
        echo "</table>";
        echo $lst . "<br />";
    }
}


$t = new Tim_kiem();

?>
<link rel="stylesheet" type="text/css" href="../public/bootstrap/bootstrap.min.css">
