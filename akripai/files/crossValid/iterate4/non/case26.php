<?php		//  - deleting all data	//  - inserting data to trheadertransaction	//  - inserting data to trdetailtransaction			// include the connect.php file	include("connect.php");	session_start();	$userID = "";		if(isset($_SESSION['userID']))		$userID = $_SESSION['userID'];	else if(isset($_COOKIE['userID']))		$userID = $_COOKIE['userID'];			// add data to trheader+detail transaction	$result = mysql_query("SELECT * FROM shoppingcart WHERE UserID = '".$userID."'");	if($row = mysql_fetch_array($result))	{		// generate new ID			$newID = "TR001";			$result1 = mysql_query("SELECT SUBSTRING( TransactionID, 3, 3 ) as TransactionID FROM trheadertransaction ORDER BY TransactionID DESC LIMIT 1 ");						if($id = mysql_fetch_array($result1))			{						$newID = $id['TransactionID']+1;				if($newID<10)					$newID = "TR00".$newID;				else if($newID<100)					$newID = "TR0".$newID;				else					$newID = "TR".$newID;						}		//				$result1 = mysql_query("INSERT INTO trheadertransaction VALUES('".$newID."', '".$userID."', '".date("Y/m/d",time())."')");		do		{			$result1 = mysql_query("INSERT INTO trdetailtransaction VALUES('".$newID."', '".$row[2]."', '".$row[3]."')");		}		while($row = mysql_fetch_array($result));				// using query, update the data		$result = mysql_query("DELETE FROM shoppingcart WHERE UserID = '".$userID."'");	}		header('location: ../successcheckout.php');?>