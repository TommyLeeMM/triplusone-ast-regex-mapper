<?php
	include("connect.php");
	
	$ID = $_REQUEST['ID'];
	$username = $_REQUEST['txtUsername'];
	$full_name = $_REQUEST['txtFullName'];
	$email = $_REQUEST['txtEmail'];
	$imageLocation = $_FILES['uploadField']['tmp_name'];
	$role = $_REQUEST['cmbRole'];
	
	$dir = "../images/photo/".$_FILES["uploadField"]["name"];
	
	if(empty($_FILES['uploadField']['name']) != 1)
	{
		if($_FILES["uploadField"]["type"] != "image/jpg" && $_FILES["uploadField"]["type"] != "image/jpeg" && $_FILES["uploadField"]["type"] != "image/png")
			header('location:../update_employee.php?errUpdate=Image must be png and jpg&ID='.$ID);
		else
		{
			if (!file_exists($dir))
			{
				move_uploaded_file($imageLocation, $dir);
			}
				
			
			mysql_query("UPDATE msemployee SET employeeUsername='".$username."', employeeFullName='".$full_name."', employeeEmail='".$email."', employeeImage='".$_FILES["uploadField"]["name"]."' WHERE employeeId = ".$ID."");
			
			header('location:../employee.php');
		}
	}
	else
	{
		mysql_query("UPDATE msemployee SET employeeUsername='".$username."', employeeFullName='".$full_name."', employeeEmail='".$email."' WHERE employeeId = ".$ID."");
		header('location:../employee.php');
	}
	
?>