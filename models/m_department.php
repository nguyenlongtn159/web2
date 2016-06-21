<?php
require_once("database.php");

class M_department extends database
{
	public function Read_full_department()
	{
		$sql ="select * from department";
		$this->setQuery($sql);
		return $this->loadAllRows();
	}
	public function Read_department($vt=-1, $limit=-1) // them de phan trang
	{
		$sql="select * from department";
		if($vt >=0 && $limit>0)
		{
			$sql .=" limit $vt,$limit"; // noi tiep
		}
		//ke thua
		
		$this->setQuery($sql);
		return $this->loadAllRows();
	} 
		public function Read_department_by_id($id) //truyen khoa chinh
	{
		
		$sql="select * from department where id=?";
		
		
		$this->setQuery($sql);
		return $this->loadRow(array($id)); // truyen tham so qua ma loai
	}
	  public function Read_all_department_with_name($name)
    {  
        $sql = "select * from department where name like '$name'";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
	public function Add_department($name,$office_phone,$manager) // chi can ten,mo ta, hinh
	{
		$sql="INSERT INTO department VALUES(?,?,?,?)";
		$this->setQuery($sql);
		$param=array("NULL",$name,$office_phone,$manager);
		return $this->execute($param); // lay o dau, viet dong tren
	}
	
//sua
	public function Edit_department($id,$name,$office_phone,$manager) 
	
	{
		// ví dụ sql update
	//	UPDATE Customers SET ContactName='Alfred Schmidt', City='Hamburg' WHERE CustomerName='Alfreds Futterkiste';
		$sql="UPDATE department SET name=?,office_phone=?,manager=? WHERE id=?";
		$this->setQuery($sql);
		$param=array($name,$office_phone,$manager,$id); // can than thu tu tham so
		return $this->execute($param);
	}
	//xoa de nhat
	public function Del_department($id)
	{
		$sql = "Delete From department Where id=?";
		$this->setQuery($sql);
		$param = array($id);
		return $this->execute($param); // mang tham so (options)
	}
      public function Get_name_by_id($id){
        $sql = "select * from department where id='$id'";
        $this->setQuery($sql);
        $department= $this->loadRow();
        if(empty($department->name)){
            $result="";
        }else{
            $result= $department->name;
        }
        return $result;
    }
}