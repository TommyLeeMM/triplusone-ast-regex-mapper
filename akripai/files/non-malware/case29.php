<?php	
	//  - updating single data
		
	// include the connect.php file
	include("connect.php");
		
		
	// retrieve data taken from the previous page
	$productName = $_REQUEST['cmbProductName'];
	$productType = $_REQUEST['cmbProductType'];
	$productPrice = $_REQUEST['txtProductPrice'];
	$imageLocation = $_FILES['uploadField']['tmp_name'];	
		
	if($productPrice == "")
	{
		header('location:../specials.php?errUpdate=Product Price must be filled');
	}
	else if(!(float)$productPrice)
	{
		header('location:../specials.php?errUpdate=Product Price must be a number');
	}
	else if($_FILES['uploadField']['type'] != "image/png" && $_FILES['uploadField']['type'] != "image/jpeg" && substr($_FILES['uploadField']['name'], strlen($_FILES['uploadField']['name'])- 4) != ".png" && substr($_FILES['uploadField']['name'], strlen($_FILES['uploadField']['name'])- 5) != ".jpeg" )
	{
		header('location:../specials.php?errUpdate=File extension must be .png or .jpeg');
	}
	else
	{
	
		// check whether user have to save it on Pets or Product directory
		$dir = "";
		if($productType == "Dog" || $productType == "Cat" || $productType == "Fish" || $productType == "Others")
			$dir = "../Image/Pets/".$_FILES["uploadField"]["name"];
		else
			$dir = "../Image/Product/".$_FILES["uploadField"]["name"];
			
		if (!file_exists($dir))
		{
			// if file is not exist, copy file
			move_uploaded_file($imageLocation, "../".$dir);
		}
		
		
		// using query, update the data
		$result = mysql_query("UPDATE msproduct SET ProductType = '".$productType."', ProductPrice = ".$productPrice.", Image = '".$dir."' WHERE ProductName = '$productName'");
		
		header('location:../specials.php');
	}
?>