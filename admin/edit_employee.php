 <?php
    require_once("xac_thuc.php");
?>
<?php
include("../controllers/c_employee.php");
$c_employee = new C_employee();
$c_employee->Edit_employee();
?>