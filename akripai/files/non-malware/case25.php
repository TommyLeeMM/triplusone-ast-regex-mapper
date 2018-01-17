<?php	
	//  - inserting single data
		
	// include the connect.php file
	include("connect.php");
		
	// retrieve data taken from the previous page
	$productID = $_REQUEST['id'];
	$qty = $_REQUEST['txtQuantity'];
	
	session_start();
	$userID = "";	
	if(isset($_SESSION['userID']))
		$userID = $_SESSION['userID'];
	else if(isset($_COOKIE['userID']))
		$userID = $_COOKIE['userID'];
	
	if($qty == "")
	{
		header('location:../specials.php?errCart=Quantity must be filled');
	}
	else if(!(int)$qty)
	{
		header('location:../specials.php?errCart=Quantity must be number');
	}
	else
	{
		$rs = mysql_query("SELECT * FROM shoppingcart WHERE ProductID = '".$productID."' AND UserID = '".$userID."'");
		if($res = mysql_fetch_array($rs))
		{
			// there is a data in the shopping cart; add the quantity
			$result = mysql_query("UPDATE shoppingcart SET Quantity = ".($qty+$res[3])." WHERE ProductID = '".$productID."' AND UserID = '".$userID."'");
			
			header('location:../shoppingCart.php');
		}
		else
		{
			// there is no data in the shopping cart; insert data
			
			// generate new ID
				$newID = "SC001";
				$result = mysql_query("SELECT SUBSTRING( ShoppingCartID, 3, 3 ) as ShoppingCartID FROM shoppingcart ORDER BY ShoppingCartID DESC LIMIT 1 ");
				
				if($id = mysql_fetch_array($result))
				{		
					$newID = $id['ShoppingCartID']+1;

					if($newID<10)
						$newID = "SC00".$newID;
					else if($newID<100)
						$newID = "SC0".$newID;
					else
						$newID = "SC".$newID;			
				}
			//
				
			// using query, update the data
			$result = mysql_query("INSERT INTO shoppingcart VALUES ('".$newID."', '".$userID."', '".$productID."', ".$qty.")");
			
			header('location:../shoppingCart.php');
		}
	}
?>