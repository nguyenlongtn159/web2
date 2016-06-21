
 <?php
include("../controllers/c_user.php");
$c_user = new C_user();
$c_user->Read_full_user();
if(isset($_GET["views"]) && ($_GET["views"] != $_COOKIE["view"])){
    unset($_COOKIE["view"]);
    $cookie_name = "view";
    $cookie_value = $_GET["views"];
    setcookie($cookie_name, $cookie_value, time() + 3600, "/");
}
//Hi?n th? cookie s? b? ch?m m?t chút.
?>