
 <?php
require_once("xac_thuc.php");
include("../controllers/c_user.php");
$c_user = new C_user();
$c_user->Read_full_user();
?>