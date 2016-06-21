<?php 
include("../controllers/c_employee.php");
$c_employee = new C_employee();
$c_employee->Hien_thi_employee();
if(isset($_GET["views"]) && ($_GET["views"] != $_COOKIE["view"])){
    unset($_COOKIE["view"]);
    $cookie_name = "view";
    $cookie_value = $_GET["views"];
    setcookie($cookie_name, $cookie_value, time() + 3600, "/");
}
//Hi?n th? cookie s? b? ch?m m?t chút.
?>