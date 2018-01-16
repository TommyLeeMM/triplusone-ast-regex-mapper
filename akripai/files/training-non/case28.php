<?php
	//  - insert registration data
	
	// include the connect.php file
	include("connect.php");
	
	// retrieve data from the previous page
	$username = $_REQUEST['tx_user'];
	$password = $_REQUEST['tx_pass'];
	$password1 = $_REQUEST['tx_cpass'];
	$email = $_REQUEST['tx_email'];
	$gender = $_REQUEST['gender'];
	$address = $_REQUEST['tx_addr'];
	
	// if the submitted captcha is wrong, return to the register page and show the error message
	if($username == "")
	{
		// username is empty
		header('location:../register.php?err=Username must be filled');
	}
	else if($password == "")
	{
		// password is empty
		header('location:../register.php?err=Password must be filled');
	}
	else if($password1 != $password)
	{
		// confirm password is not match with password
		header('location:../register.php?err=Password must be the same with confirm password');
	}
	else if($email == "")
	{
		// email is empty
		header('location:../register.php?err=Email must be filled');
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		// email format is invalid
		header('location:../register.php?err=Invalid email format');
	}
	else if($password == "")
	{
		// password is empty
		header('location:../register.php?err=Password must be filled');
	}
	else if($gender == "")
	{
		// password is empty
		header('location:../register.php?err=Gender must be choosen');
	}
	else if($address == "")
	{
		// password is empty
		header('location:../register.php?err=Address must be filled');
	}
	else
	{
		// check whether the username matches with the one in the database
		$result = mysql_query("SELECT * FROM msuser WHERE Username = '".$username."'");
		if($id = mysql_fetch_array($result))
		{
			// username is taken
			header('location:../register.php?err=Username has been taken');
		}
		else
		{
			// generate new ID
			$newID = "US001";
			$result = mysql_query("SELECT SUBSTRING( UserID, 5, 1 ) as UserID FROM msuser ORDER BY UserID DESC LIMIT 1 ");
			
			if($id = mysql_fetch_array($result))
			{		
				$newID = $id['UserID']+1;
		
				if($newID<9)
					$newID = "US00".$newID;
				else if($newID<99)
					$newID = "US0".$newID;
				else
					$newID = "US".$newID;			
			}
			//
			
			
			// encrypt the password
			$password = md5($password);
		
			// insert to the SQL
			mysql_query("INSERT INTO MsUser(UserID, Username, Password, Email, Gender, Address) VALUES('$newID', '$username', '$password', '$email',  '$gender', '$address')");

			header('location:../login.php');
		}
	}
?>