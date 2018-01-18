<?php
	session_start();
	include "connect.php";
	
	$qty = $_REQUEST["txtQty"];
	$id = $_REQUEST['id'];		
	$tot=0;
	
	if($qty == "" || $qty == null)
	{
		$_SESSION['err'] = "Quantity must be filled";
		header("Location:accessory.php");
	}
	else if(is_numeric($qty) == false)
	{
		$_SESSION['err'] = "Quantity must be number";
		header("Location:accessory.php");
	}
	else if($qty<=0)
	{
		$_SESSION['err'] = "Quantity must be equal or greater than 0";
		header("Location:accessory.php");
	}
	else
	{
		$query = mysql_query("select * from cart where username='".$_SESSION['user']."' and accessoryid='".$id."'");
		$row = mysql_fetch_array($query);
		if(mysql_num_rows($query)>0)
		{			
			$tot=$qty+$row['qty'];
			$query = "update cart set qty=".$tot." where accessoryid='".$id."'and username='".$_SESSION['user']."'";	
			//mysql_query($query) or die(mysql_error());
		}
		else
		{
			$query = "insert into cart values ('".$id."','".$_SESSION['user']."','".$qty."')";	
			//mysql_query($query) or die(mysql_error());
		}
		header("Location:cart.php");				
	}						
	
?>