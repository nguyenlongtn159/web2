<?php
include("../models/m_employee.php");

//session_start();
class C_employee
{
    public function Hien_thi_employee()
    {
        if(isset($_GET["views"]) && isset($_SESSION["views"])){
            $a = $_GET["views"]; 
          $_SESSION["views"] =  $a;
        //  echo $_GET["views"];
        }
        
        //thong bao
        $msg = isset($_SESSION["msg"]) ? $_SESSION["msg"] : "";
        if (isset($_SESSION["msg"])) unset($_SESSION["msg"]);
        //end thong bao

        //model

        //doc danh sach phong ban
        include("../controllers/Pager.php");
        include("../models/m_department.php");
        $m_department = new M_department();
        $department = $m_department->Read_department(); // muon lay gia tri

        $m_employee = new M_employee();
        $employee = $m_employee->Read_employee();

        $m_department_2 = new M_department();
        $departments = $m_department_2->Read_full_department(); // muon lay gia tri ten

        //phan trang
        $p = new pager();
        $limit = 4;
        $count = count($employee);
        $vt = $p->findStart($limit);
        $pages = $p->findPages($count, $limit);
        $curpage = $_GET["page"];
        

        $lst = $p->pageList($curpage, $pages);
        if (isset($_POST["department"])) {
            $_SESSION["department"] = $_POST["department"];
            if ($_SESSION["department"] == "") {

                $employee = $m_employee->Read_employee($vt, $limit);
            } else if ($_SESSION["department"] != "") {
                $department_name = $_SESSION["department"];
                $employee = $m_employee->Read_employee_with_department($vt, $limit, $department_name);
            }
        } else if (!isset($_POST["department"])) {
            if (isset($_SESSION["department"]) && $_SESSION["department"] == "") {

                $employee = $m_employee->Read_employee($vt, $limit);
            } else if (isset($_SESSION["department"]) && $_SESSION["department"] != "") {
                $department_name = $_SESSION["department"];
                $employee = $m_employee->Read_employee_with_department($vt, $limit, $department_name);
            } else {
                $employee = $m_employee->Read_employee($vt, $limit);
            }
        }

        //views
        include("../views/employee/v_employee.php");
    }

    public function Hien_thi_employee_full()
    {
        //thong bao
        $msg = isset($_SESSION["msg"]) ? $_SESSION["msg"] : "";
        if (isset($_SESSION["msg"])) unset($_SESSION["msg"]);
        //end thong bao

        //model

        //doc danh sach phong ban
        include("../controllers/Pager.php");
        include("../models/m_department.php");
        $m_department = new M_department();
        $department = $m_department->Read_department(); // muon lay gia tri

        $m_employee = new M_employee();
        $employee = $m_employee->Read_employee();

        $m_department_2 = new M_department();
        $departments = $m_department_2->Read_full_department(); // muon lay gia tri ten

        //phan trang
        $p = new pager();
        $limit = 4;
        $count = count($employee);
        $vt = $p->findStart($limit);
        $pages = $p->findPages($count, $limit);
        $curpage = $_GET["page"];
        $lst = $p->pageList($curpage, $pages);
        if (isset($_POST["department"])) {
            $_SESSION["department"] = $_POST["department"];
            if ($_SESSION["department"] == "") {

                $employee = $m_employee->Read_employee($vt, $limit);
            } else if ($_SESSION["department"] != "") {
                $department_name = $_SESSION["department"];
                $employee = $m_employee->Read_employee_with_department($vt, $limit, $department_name);
            }
        } else if (!isset($_POST["department"])) {
            if (isset($_SESSION["department"]) && $_SESSION["department"] == "") {

                $employee = $m_employee->Read_employee($vt, $limit);
            } else if (isset($_SESSION["department"]) && $_SESSION["department"] != "") {
                $department_name = $_SESSION["department"];
                $employee = $m_employee->Read_employee_with_department($vt, $limit, $department_name);
            } else {
                $employee = $m_employee->Read_employee($vt, $limit);
            }
        }

        //views
        include("../views/employee/v_employee_full.php");
    }

    public function Hien_thi_chi_tiet_employee()
    {
        //models
        $id = $_GET["id"];
        if($id>0){
        $m_employee = new M_employee();
        //chua c� m� m�n n?u goi s? loi
        $employee = $m_employee->Read_employee_with_id($id); // ma mon o dau ??..
         include_once("../models/m_department.php");
            $m_employee_3 = new M_department();
        include("../views/employee/v_chi_tiet_employee.php"); }
    }

    public function Name_employee()
    {
        //models
        $id = $_GET["id"];
        $m_employee = new M_employee();
        //chua c� m� m�n n?u goi s? loi
        $employee = $m_employee->Read_employee_with_id($id); // ma mon o dau ??..
        if (isset($employee)) {
            echo count($employee);
        } else echo "fff";

        include("../views/employee/v_name_employee.php");
    }

    public function Add_employee()
    {
        //models doc department , goi Add_employee tu model
        //đọc danh sách phòng ban
        include("../models/m_department.php");
        $m_department_2 = new M_department();
        $departments = $m_department_2->Read_full_department(); // muon lay gia tri
        //model

        if (isset($_POST["Capnhat"])) {
            $name = $_POST["name"];
            $department = $_POST["department"];
            $job_title = $_POST["job_title"];
            $email = $_POST["email"];
            $hinh = $_FILES["hinh"]["error"] == 0 ? $_FILES["hinh"]["name"] : ""; //neu co hinh thi lay ten hinh,: khong thi de rong
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                //$emailErr = "Invalid email format";
                echo "Email không hợp lệ";
            } else {
                $m_employee = new M_employee();
                $kq = $m_employee->Add_employee($name, $department, $job_title, $email, $hinh);
                if ($kq) // cap nhat thanh cong
                {
                    //di chuyen hinh
                    if ($hinh != "") {
                        move_uploaded_file($_FILES["hinh"]["tmp_name"], "../public/images/employee/$hinh");

                    }
                    $_SESSION["msg"] = "Thêm nhân viên thành công";

                } else {
                    $_SESSION["msg"] = "Thêm nhân viên bị lỗi";
                }
                //chuyen den trang danh sach mon an
                header("location:employee.php");
            }
        }
        //views
        include("../views/navigation/begin_navigation.php");
        include("../views/employee/v_admin_add_employee.php");
        include("../views/navigation/end_navigation.php");
    }

    public function Edit_employee()
    {

        //models doc department , goi Add_employee tu model
        //đọc danh sách phòng ban
        include("../models/m_department.php");
        $m_department_2 = new M_department();
        $departments = $m_department_2->Read_full_department(); // muon lay gia tri
        //model
        $id = $_GET["id"];
        $m_employee = new M_employee();
        $employee = $m_employee->Read_employee_with_id($id);


        if (isset($_POST["Capnhat"])) {
            $name = $_POST["name"];
            $department = $_POST["department"];
            $job_title = $_POST["job_title"];
            $email = $_POST["email"];
            $hinh = $_FILES["hinh"]["error"] == 0 ? $_FILES["hinh"]["name"] : $employee->hinh; //neu co hinh thi lay ten hinh,:thi de nguyen

            $m_employee = new M_employee();
            $kq = $m_employee->Edit_employee($id, $name, $department, $job_title, $email, $hinh);
            if ($kq) // cap nhat thanh cong
            {
                //di chuyen hinh
                if ($_FILES["hinh"]["error"] == 0) {
                    move_uploaded_file($_FILES["hinh"]["tmp_name"], "../public/images/employee/$hinh");

                }
                $_SESSION["msg"] = "Sửa Nhân viên " . $name . " thành công";
            } else {
                $_SESSION["msg"] = "Sửa Nhân viên " . $name . " bị lỗi";
            }
            //chuyen den trang danh sach mon an
            header("location:employee.php");
        }
        //view
        include("../views/navigation/begin_navigation.php");
        include("../views/employee/v_admin_edit_employee.php");
        include("../views/navigation/end_navigation.php");

    }

    public function Del_employee()
    {
        $id = $_GET["id"];
        $m_employee = new M_employee();
        $kq = $m_employee->Del_employee($id);
        if ($kq) {
            $_SESSION["msg"] = "Xóa nhân viên thành công ";

        } else {
            $_SESSION["msg"] = "Xóa thất bại ";
        }
        //chuyen trang
        header("location:employee.php");
    }

    public function Hien_thi_tim_employee()
    {
        //models

        //views
        include("../views/employee/v_tim_kiem.php");
    }


}

?>