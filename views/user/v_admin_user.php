  <?php if (substr_count($_SERVER['PHP_SELF'], '/ql_nhan_vien/admin/user_ajax.php') == 0) {include_once("../views/navigation/begin_navigation.php");} ?> 
<h3 align="center" style="color:red"> <?php if(isset($msg)){echo $msg;} ?> </h3>
<link rel="stylesheet" type="text/css" href="../public/bootstrap/bootstrap.min.css">

Danh sách user:
<a href="register.php">[ Thêm user ]</a><br /><br />
<table class="table table-hover"><tr class="active"><td>Mã user: </td><td>Tên :</td><td>Password: </td><td>Email: </td><td></td><td></td></tr>
<?php
    $page = $_GET['page'];
    if ($page < 1) {
        $page = 1;
    } else if ($page > $pages) {
        $page = $pages;
    } else {


foreach($users as $user)
{
	//echo "<p id='hienthi".$phong->manager."'>lol</p>";
	echo "<tr><td>".$user->id."</td>";
	echo "<td> ".$user->user_name."</td>";
	echo "<td> ".$user->password."</td>";
	echo "<td> ".$user->email."</td>";
	//echo "<td><input id='id' type='' value='".$phong->manager."' />";
	//echo "<td><a href='chi_tiet_user.php?id=".$user->id."' id='hienthi".$user->id."' onmouseover='Name_employee(".$phong->id.")' onmouseout='mouseOut(".$phong->id.")'>".$phong->id." [Đưa chuột để xem]</a></td>";
	echo"<td><a href='edit_user.php?id=".$user->id."'> [ Chỉnh sửa ] </a></td>"; 
	echo"<td><a href='javascript:void(0)' onclick='del_user(".$user->id.")'> [ Xóa ] </a></td></tr>"; 
	
	
	
}
}
    if (substr_count($_SERVER['PHP_SELF'], '/ql_nhan_vien/admin/user_ajax.php') == 0) {
        echo "</table><div class='col-md-4'>" . $lst . "</div>";
    } //echo "</table>".$_SERVER['PHP_SELF'];
    else {
        $page = $_GET['page'];
        if ($page <= 1) {
            $page = 1;
        } else if ($page > $pages) {
            $page = $pages;
        }

        echo "</table><a href='?view=User&page=" . ($page - 1) . "'>&lt;&lt; Trang trước(" . ($page - 1) . ")</a> [" . $page . "] <a href='?view=User&page=" . ($page + 1) . "'>Trang tiếp(" . ($page + 1) . ")>></a>";
    }

    ?>


<script type="text/javascript">
function del_user(id)
{
	if(confirm("Bạn muốn xóa bỏ Derpartment này ?"))
	{
		window.location="del_user.php?id=" + id;
		
	}
}
function mouseOut(id)
{
	document.getElementById("hienthi"+ id).innerHTML = id+ " [Đưa chuột để xem]";
}

</script>
<!--<p id="hienthi"></p>
<input type="button" onclick="Name_employee()" />-->
<script type="text/javascript" src="../public/js/thu_vien_ajax.js">
 
</script>

	