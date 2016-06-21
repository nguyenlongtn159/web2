<?php
require_once("xac_thuc.php");

include("../controllers/c_employee.php");
$c_employee = new C_employee();
$c_employee->Hien_thi_employee_full();// goi phuong thuc hien thi nhan vien
//css/ img mat het ==> lay theo url cua index(mon_an.php)
?>