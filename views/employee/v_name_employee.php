<?php 
$name=$employee->name;
if(isset($name) && $name !="" )
{
echo $name;
}

else
{
	echo "Chưa có người quản lý";
}	
?>
