<?php	
	//  - inserting single data
		
	// include the connect.php file
	include("connect.php");
		
		
	// retrieve data taken from the previous page
	$productName = $_REQUEST['txtProductName'];
	$productType = $_REQUEST['cmbProductType'];
	$productPrice = $_REQUEST['txtProductPrice'];
	$imageLocation = $_FILES['uploadField']['tmp_name'];		
		
	if($productName == "")
	{
		header('location:../specials.php?errInsert=Product Name must be filled');
	}
	else if($productPrice == "")
	{
		header('location:../specials.php?errInsert=Product Price must be filled');
	}
	else if(!(float)$productPrice)
	{
		header('location:../specials.php?errInsert=Product Price must be a number');
	}
	else if($_FILES['uploadField']['type'] != "image/png" && $_FILES['uploadField']['type'] != "image/jpeg" && substr($_FILES['uploadField']['name'], strlen($_FILES['uploadField']['name'])- 4) != ".png" && substr($_FILES['uploadField']['name'], strlen($_FILES['uploadField']['name'])- 5) != ".jpeg" )
	{
		header('location:../specials.php?errInsert=File extension must be .png or .jpeg');
	}
	else
	{
		
		$rs = mysql_query("SELECT * FROM msproduct WHERE ProductName = '".$productName."'");
		echo "SELECT * FROM msproduct WHERE ProductName = '".$productName."'";
		if($res=mysql_fetch_array($rs))
		{
			header('location:../specials.php?errInsert=Product Name has been used');
		}		
		else
		{
			// generate new ID
			$newID = "PR001";
			$result = mysql_query("SELECT SUBSTRING( ProductID, 3, 3 ) as ProductID FROM msproduct ORDER BY ProductID DESC LIMIT 1 ");
			
			if($id = mysql_fetch_array($result))
			{		
				$newID = $id['ProductID']+1;
				
				if($newID<10)
					$newID = "PR00".$newID;
				else if($newID<100)
					$newID = "PR0".$newID;
				else
					$newID = "PR".$newID;			
			}
			//
				
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
			
			
			// using query, insert the data
			$result = mysql_query("INSERT INTO msproduct VALUES ('".$newID."','".$productType."', '".$productName."', '".$productPrice."', '".$dir."')");
			
			header('location:../specials.php');
		}
	}
?>