<?php
//session_start();
include("../models/m_user.php");

class C_user
{

    public function Read_full_user()
    {
        $msg = isset($_SESSION["msg"]) ? $_SESSION["msg"] : "";

        //thong bao

        //end thong bao
        //models
        include("../controllers/Pager.php");
        $m_user = new M_user();
        $users = $m_user->Read_full_user();
        $p = new pager();
        $limit = 4;
        $count = count($users);
        $vt = $p->findStart($limit);
        $pages = $p->findPages($count, $limit);
        $curpage = $_GET["page"];
        $lst = $p->pageList($curpage, $pages);
        $m_user = new M_user();
        $users = $m_user->Read_full_user($vt, $limit);

        //views
        include("../views/user/v_admin_user.php");
        if (isset($_SESSION["msg"]) && strlen($msg) > 0) unset($_SESSION["msg"]);
    }

    public function Register()
    {
        if (isset($_POST["register"])) {
            $name_register = $_POST["name_register"];
            $pass = $_POST["pass"];
            $re_pass = $_POST["re_pass"];
            $email = $_POST["email"];
            //$so_sanh = strcmp($re_pass,$pass);
            if($name_register == "" || $pass == "" || $re_pass =="" || $email == ""){
                echo "Chưa điền thông tin";
            }
            else {
            $m_user = new M_user();
            $user = $m_user->Read_user_with_name($name_register);
			echo $name_register;
			$kq = count($user);
			echo $kq;
            if ($kq == 0) {
                if ($_POST["re_pass"] == $_POST["pass"]) {
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        //$emailErr = "Invalid email format";
                        echo "Email không hợp lệ!";
                    } 
                    else {
                        $_SESSION["msg"] = "Thêm user thành công ";
                        $m_user->Add_user($name_register, $pass, $email);
                        header("Location:user.php");
                    }
                } else {
                    echo "Lỗi xác nhận mật khẩu!";
                }
            } else {
                echo "User name đã tồn tại!";
            }
            }
        }
    }

    public function Login()
    {
        if (isset($_POST["name"])) {
            $name = $_POST["name"];
            $pass = $_POST["pass"];
            $m_user = new M_user();
            $user = $m_user->Login($name, $pass);

            if (count($user) > 0) {//dang nhap thanh cong
                session_start();
                $_SESSION["name"] = $_POST["name"];
                $_SESSION["msg"] = "<h3 style='color:crimson;'><center>Đăng nhập thành công</center></h3>";

                header("Location:index.php");

            } else {
                 $_SESSION["msg2"] = "<span style='color:crimson;'>Sai tên đăng nhập hoặc mật khẩu!</span><br />";
            }

        }
        // views
        include("../views/user/v_admin_login.php");
    }
    public function edit_userd()
    {
        //models
        
        $id = $_GET["id"];
        $m_user = new M_user();
        $kq = $m_user->edit_user($id);
        if($kq){
            echo "Cập nhật thành công";
            header("Location:user.php");
        }
        else {
            echo "Cập nhật thất bại";
            header("location:user.php");
        }
          include("../views/user/edit_user.php"); 
           
    }
    public function edit_user()
	{
		//model
		
		$id = $_GET["id"];
		$m_user = new M_user();
		$user = $m_user->Read_user_by_id($id);
		
		//read employee
		
		
		
		if(isset($_POST["Capnhat"]))
		{

			$name=$_POST["Username"];
			$pass=$_POST["pass"];
			$email=$_POST["email"];
			
			$m_user = new M_user();
			$kq=$m_user->Edit_user($id,$name,$pass,$email);
			if($kq) // cap nhat thanh cong
			{	
				$_SESSION["msg"]="Sửa user ".$name." thành công";
                	header("location:user.php");
			}
			else
			{
				$_SESSION["msg"]="Sửa user ".$name." bị lỗi";
                	header("location:user.php");
			}
            //view
			
			//chuyen den trang danh sach user
			
		}
			include("../views/user/v_admin_edit_user.php");
	}

    public function Del_user()
    {
        $id = $_GET["id"];
        $m_user = new M_user();
        $kq = $m_user->Del_user($id);
        if ($kq) {
            $_SESSION["msg"] = "Xóa user thành công ";
            header("location:user.php");

        } else {
            $_SESSION["msg"] = "Xóa user không thành công  ";
            header("location:user.php");
        }
        //chuyen trang

    }

    public function Get_pass()
    {
        //model
        if (isset($_POST["user_name"])) {
            $m_user = new M_user();

            $_POST["msg"]= $m_user->Get_pass($_POST["user_name"]);
        }

        //views
        include("../views/user/v_admin_get_pass.php");
    }

}


?>


