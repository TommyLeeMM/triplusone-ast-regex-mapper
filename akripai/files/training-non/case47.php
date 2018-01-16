<?php
	include("connect.php");
	
	$username = $_REQUEST['txtUsername'];
	$password = $_REQUEST['txtPassword'];
	$full_name = $_REQUEST['txtFullName'];
	$email = $_REQUEST['txtEmail'];
	$gender = $_REQUEST['cmbGender'];
	$imageLocation = $_FILES['uploadField']['tmp_name'];
	$role = $_REQUEST['cmbRole'];
	
	if($username == null || $username == "")
	{
		header('location:../insert_employee.php?errInsert=Username must be filled');
	}
	else if($password == null || $password == "")
	{
		header('location:../insert_employee.php?errInsert=Password must be filled');
	}
	else if($full_name == null || $full_name == "")
	{
		header('location:../insert_employee.php?errInsert=Full Name must be filled');
	}
	else if($email == null || $email == "")
	{
		header('location:../insert_employee.php?errInsert=Email must be filled');
	}
	else if(empty($_FILES['uploadField']['name']) == 1)
	{
		header('location:../insert_employee.php?errInsert=Image must be chosen');
	}
	else
	{
		$password = md5($password);
		if($_FILES['uploadField']['type'] != "image/png" && $_FILES['uploadField']['type'] != "image/jpeg")
		{
			header('location:../insert_employee.php?errInsert=File extension must be .png or .jpg&');
		}
		
		$rs = mysql_query("SELECT * FROM msemployee WHERE employeeUsername = '".$username."'");
		
		if($res=mysql_fetch_array($rs))
		{
			header('location:../insert_employee.php?errInsert=Username Name has been used&user='.$user.'&userID='.$userID);
		}		
		else
		{
			// generate new ID
			$result = mysql_query("SELECT employeeId FROM msemployee ORDER BY employeeId DESC LIMIT 1 ");
			
			if($id = mysql_fetch_array($result))
			{		
				$newID = $id['employeeId']+1;		
			}
			//
				
			// check whether user have to save it on Pets or Product directory
			$dir = "../images/photo/".$_FILES["uploadField"]["name"];
			
			if (!file_exists($dir))
			{
				// if file is not exist, copy file
				move_uploaded_file($imageLocation, $dir);
			}
			
			
			// using query, insert the data
			$result = mysql_query("INSERT INTO msemployee VALUES (".$newID.",'".$username."', '".$password."', '".$full_name."', '".$email."', '".$gender."', '".$_FILES["uploadField"]["name"]."', '".$role."')");
			
			header('location:../insert_employee.php?errInsert=new employee has inserted');
		}
	}
?>