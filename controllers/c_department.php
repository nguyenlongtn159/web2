<?php

//session_start();
class C_department
{
    public function Show_department()
    {
        //thong bao
        $msg = isset($_SESSION["msg"]) ? $_SESSION["msg"] : "";
        if (isset($_SESSION["msg"])) unset($_SESSION["msg"]);
        //end thong bao
        //model
        include("../controllers/Pager.php");
        include("../models/m_department.php");
        $m_department = new M_department();
        $department = $m_department->Read_department(); // muon lay gia tri

        //phan trang
        $p = new pager();
        $limit = 4;
        $count = count($department);
        $vt = $p->findStart($limit);
        $pages = $p->findPages($count, $limit);
        $curpage = $_GET["page"];
        $lst = $p->pageList($curpage, $pages);
        $department = $m_department->Read_department($vt, $limit);
        //view
        include("../views/department/v_admin_department.php");
    }

    public function Show_department_full()
    {
        //thong bao
        $msg = isset($_SESSION["msg"]) ? $_SESSION["msg"] : "";
        if (isset($_SESSION["msg"])) unset($_SESSION["msg"]);
        //end thong bao

        //model
        include("../controllers/Pager.php");
        include("../models/m_department.php");
        $m_department = new M_department();
        $department = $m_department->Read_department(); // muon lay gia tri

        //phan trang
        $p = new pager();
        $limit = 4;
        $count = count($department);
        $vt = $p->findStart($limit);
        $pages = $p->findPages($count, $limit);
        $curpage = $_GET["page"];
        $lst = $p->pageList($curpage, $pages);
        $department = $m_department->Read_department($vt, $limit);
        //view
        include("../views/department/v_admin_department_full.php");
    }

    public function Add_one_department()
    {
        //model
        include("../models/m_department.php");
        if (isset($_POST["Capnhat"])) {
            $name = $_POST["name"];
            $office_phone = $_POST["office_phone"];
            $manager = $_POST["manager"];

            $m_department = new M_department();
            $check = $m_department->Read_all_department_with_name($name);
            if(count($check ) !="") {
                $_SESSION["msg4"] = "<span style='color:crimson'>&nbsp; Lỗi trùng tên !</span>";
            }
            else{
            $kq = $m_department->Add_department($name, $office_phone, $manager);
            if ($kq) // cap nhat thanh cong
            {

                $_SESSION["msg"] = "Thêm phòng ban " . $name . " thành công";


            } else {
                $_SESSION["msg"] = "Thêm phòng ban " . $name . " bị lỗi";
            }
            //chuyen den trang danh sach mon an
            header("location:department.php");
        }
        }
        //view
        include("../views/department/v_admin_add_department.php");
    }

    public function Edit_department()
    {
        //model
        include("../models/m_department.php");
        $id = $_GET["id"];
        $m_department = new M_department();
        $department = $m_department->Read_department_by_id($id);

        //read employee
        include("../controllers/Pager.php");
        $p = new pager();
        $limit = 100;
        $count = count($department);
        $vt = $p->findStart($limit);
        $pages = $p->findPages($count, $limit);
        $curpage = $_GET["page"];
        $lst = $p->pageList($curpage, $pages);
        include("../models/m_employee.php");
        $department_name = $department->name;
        $m_employee = new M_employee();
        $employee = $m_employee->Read_employee_with_department($vt, $limit, $department_name);

        if (isset($_POST["Capnhat"])) {
            $name = $_POST["name"];
            $office_phone = $_POST["office_phone"];
            $manager = $_POST["manager"];

            $m_department = new M_department();
            $kq = $m_department->Edit_department($id, $name, $office_phone, $manager);
            if ($kq) // cap nhat thanh cong
            {
                $_SESSION["msg"] = "Sửa department " . $name . " thành công";
            } else {
                $_SESSION["msg"] = "Sửa department " . $name . " bị lỗi";
            }
            //chuyen den trang danh sach mon an
            header ("Location:department.php");
        }

        //view
        include("../views/department/v_admin_edit_department.php");
    }

    public function Del_department()
    {
        $id = $_GET["id"];
        include("../models/m_department.php");
        $m_department = new M_department();
        $kq = $m_department->Del_department($id);
        if ($kq) {
            $_SESSION["msg"] = "Xóa department thành công ";

        } else {
            $_SESSION["msg"] = "Xóa department không thành công  ";
        }
        //chuyen trang
        header("location:department.php");
    }
}