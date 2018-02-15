<?php
	session_start();
	include "connect.php";
	
	$sql = "select a.accessoryid as ac, qty, name, price from cart a, accessory b where username='".$_SESSION['user']."' and a.accessoryid=b.accessoryid";
			
	$result = mysql_query($sql) or die(mysql_error());
	while($row = mysql_fetch_array($result))
	{
		$tot=$row['price']*$row['qty'];
		$query = "insert into history(accessoryid,qty,total,username) values ('".$row['ac']."',".$row['qty'].",".$tot.",'".$_SESSION['user']."')";	
		//mysql_query($query) or die(mysql_error());
	}
	$query = "delete from cart where username = '".$_SESSION['user']."'";		
	//mysql_query($query) or die(mysql_error());	
	header("Location:history.php");
?>
