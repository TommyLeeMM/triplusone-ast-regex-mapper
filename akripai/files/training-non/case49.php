<?php
	include 'connect.php';
	session_start();

	$username = $_POST["username"];
	$password = $_POST["password"];
	$role = $_POST["role"];

	if(empty($username))
		header('Location:../login.php?msg=Username must be filled');
	else if(empty($password))
		header('Location:../login.php?msg=Password must be filled');
	else
	{
		$result = "";
		if(strcasecmp($role, "Customer")==0)
			$result = mysql_query("SELECT * FROM mscustomer WHERE customerUsername = '$username' AND customerPassword = '".md5($password)."' ");
		else
			$result = mysql_query("SELECT * FROM msemployee WHERE employeeUsername = '$username' AND employeePassword = '".md5($password)."' ");
		
		if( mysql_num_rows($result) == 0 )
			header('Location:../login.php?msg=Wrong username and password combination');
		else
		{
			$row = mysql_fetch_array($result); 
			$id = $row[0];

			$_SESSION['id'] = $id;
			$_SESSION['username']=$username;
			
			if(strcasecmp($role, "Employee")==0)
				$_SESSION['role'] = $row['employeeRole'];
			else 
				$_SESSION['role'] = 'customer';
			if(isset($_POST['remember']))
				setcookie('username', $username);
			

			header('Location:../index.php');
		}
	}

	
?>