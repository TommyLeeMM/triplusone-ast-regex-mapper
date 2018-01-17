<?php
	include("connect.php");
	session_start();
	$customerId = $_SESSION['username'];
	$plateNumber = $_SESSION['cartPlate'];
	$userId = $_SESSION['id'];
	$cartPrice = $_SESSION['cartPriceTotal'];
	$totalPrice = $_REQUEST['totalPrice'];
		
	for($i=0 ; $i<count($plateNumber) ; $i++)
	{
		$newID = "SC001";
		$result = mysql_query("SELECT trWashingId FROM trwashing ORDER BY trWashingId DESC LIMIT 1 ");
		
		if($id = mysql_fetch_array($result))
			$newID = $id['trWashingId']+1;
			
		$res = mysql_query("SELECT * FROM MsEmployee WHERE employeeRole = 'washer' ORDER BY RAND() LIMIT 1");
		if($id = mysql_fetch_array($res))
			$empId = $id['employeeId'];
		
		// using query, update the data
		$result = mysql_query("INSERT INTO trwashing(trWashingId, customerId, employeeId, plateNumber, totalPrice) VALUES (".$newID.", ".$userId.",".$empId.", '".$plateNumber[$i]."', ".$cartPrice[$i].")");
		echo "INSERT INTO trwashing(trWashingId, customerId, employeeId, plateNumber, totalPrice) VALUES (".$newID.", ".$userId.",".$empId.", '".$plateNumber[$i]."', ".$cartPrice[$i].")";
		
		$washingTypeId = $_SESSION['cartProductId'][$plateNumber[$i]];
		
		for($j=0 ; $j<count($washingTypeId) ; $j++)
		{
			$result = mysql_query("INSERT INTO trdetail VALUES (".$newID.", ".$washingTypeId[$j].")");
		}
	}
	
	unset($_SESSION['cartPlate']);
	unset($_SESSION['cartProductId']);
	unset($_SESSION['cartPriceTotal']);
	unset($_REQUEST['totalPrice']);
	
	header('location:../view_service.php');
?>