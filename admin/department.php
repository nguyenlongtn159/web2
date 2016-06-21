<?php
require_once("xac_thuc.php");

include("../controllers/c_department.php");
$c_department = new C_department();
$c_department->Show_department_full();
?>