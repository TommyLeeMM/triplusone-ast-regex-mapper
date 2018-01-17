<?php 
	include 'connect.php';

	function endsWith( $whole, $query )
	{
		if(strlen($whole) < strlen($query))
			return false;

		$whole = strrev($whole);
		$query = strrev($query);
		for ($i=0; $i < strlen($query); $i++) { 
			if($whole[$i] != $query[$i])
				return false;
		}
		return true;
	}

	function checkEmail( $email )
	{
		if(strpos($email, ".")===false || strpos($email, "@")===false)
		{
			return false;
		}
		else if (abs(strpos($email, ".") - strpos($email, "@")) == 1 || strpos($email,".") == 0 || strpos($email,"@")==0)
		{
			return false;
		}
		else if (!endsWith($email, ".com"))
		{
			return false;
		}
		return true;
	}

	$username = $_POST["username"];
	$password = $_POST["password"];
	$confirmPassword = $_POST["confirmPassword"];
	$gender = $_POST["gender"];
	$name = $_POST["name"];
	$email = $_POST["email"];

	if(empty($username))
	{
		header('Location:register.php?msg=Username must be filled');
	}
	else if (empty($password))
	{
		header('Location:register.php?msg=Password must be filled');
	}
	else if (empty($confirmPassword))
	{
		header('Location:register.php?msg=Password Confirmation must be filled');
	}
	else if ($password != $confirmPassword)
	{
		header('Location:register.php?msg=Different pattern of password detected');
	}
	else if (empty($gender))
	{
		header('Location:register.php?msg=Gender must be selected');
	}
	else if (empty($name))
	{
		header('Location:register.php?msg=Name must be filled');
	}
	else if (empty($email))
	{
		header('Location:register.php?msg=Email must be filled');
	}
	else if (!checkEmail($email))
	{
		header('Location:register.php?msg=Wrong email format inputted');
	}
	else
	{
		/*
		$result = executeQuery("SELECT customerId FROM mscustomer ORDER BY customerId DESC LIMIT 1");
		$lastId = mysql_fetch_array($result)['customerId'];
		$lastId++;
		*/
		if(strcasecmp($gender, "Male")==0)
			$gender = "M";
		else
			$gender = "F";
		$password = md5($password);
		mysql_query("INSERT INTO mscustomer(customerUsername, customerPassword, customerFullName, customerEmail, customerGender) 
			VALUES('$username','$password','$name','$email','$gender')");
		header('Location:../register.php?msg=Success Registration');
	}

?>