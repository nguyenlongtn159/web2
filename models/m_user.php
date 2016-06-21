<?php
require_once("database.php");

class M_user extends database
{
    public function Read_full_user($vt = -1, $limit = -1)
    {
        $sql = "select * from user";
        if ($vt >= 0 && $limit > 0) {
            $sql .= " limit $vt,$limit"; // noi tiep
        }
        $this->setQuery($sql);
        return $this->loadAllRows();
    }

  /* public function Read_user_with_name($name_register)
    {
        $sql = "select * from user where user_name='$name_register'";
        $this->setQuery($sql);
        return $this->loadRow();
    } */
    	  public function Read_user_with_name($name_register)
    {  
        $sql = "select * from user where user_name like '$name_register'";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }


   public function Read_user_with_name_2($name_register)
      {
          $sql = "select * from user where user_name='$name_register'";
          $this->setQuery($sql);
          return $this->loadRow();
    } 

    public function Login($name, $pass)
    {
        $sql = "select * from user where user_name='$name' and password = '$pass' ";

        $this->setQuery($sql);
        return $this->loadAllRows();
    }

    public function Add_user($name, $pass, $email) // chi can ten,mo ta, hinh
    {
        $sql = "INSERT INTO user VALUES(?,?,?,?)";
        $this->setQuery($sql);
        $param = array("NULL", $name, $pass, $email);
        return $this->execute($param); // lay o dau, viet dong tren
    }

    public function Edit_user($id, $name, $pass, $email)
    {
        $sql = "UPDATE user SET user_name=?,password=?,email=? WHERE id=?";
        $this->setQuery($sql);
        $param = array($name, $pass, $email, $id);
        return $this->execute($param);
    }

    public function Del_user($id)
    {
        $sql = "Delete From user Where id=?";
        $this->setQuery($sql);
        $param = array($id);
        return $this->execute($param); // mang tham so (options)
    }

    public function Read_user_by_id($id) //truyen khoa chinh
    {

        $sql = "select * from user where id=?";


        $this->setQuery($sql);
        return $this->loadRow(array($id)); // truyen tham so qua ma loai
    }

    public function Get_pass($user)
    {
        include 'send_mail.php';
        $to = '';
        $subject = '';
        $body = '';

        $m_user = new M_user();
        $member = $m_user->Read_user_with_name_2($_POST["user_name"]);

        if ($member) {
            $m_email = $member->email; //lay email ra tu tai khoan
            $m_pass = $member->password;
            $to = $m_email;                        // nguoi nhan
            $subject = "Your Password:";            // tieu de thu
            $body = "Code here: " . $m_pass;    // noi dung thu
        }

        return Send_Mail($to, $subject, $body);
    }

}


?>
