<?php
	session_start();
	
	$user = $_REQUEST['txtUsername'];	// mengambil username yang dimasukkan oleh user
	$pass = $_REQUEST['txtPassword'];	// mengambil password yang dimasukkan oleh user
	
	if($user == "")
	{
		header("location:index.php?err=Username must be filled");
	}
	else if($pass == "")
	{
		header("location:index.php?err=Password must be filled");
	}
	else
	{
		$_SESSION['user'] = $user;			// mengeset nilai variable session menjadi username yang telah dimasukkan oleh user
		
		$file=fopen("logfile.txt","a") or exit("Unable to open file!");
		$waktu = date("d/m/Y h:i:s A");
		$tulis = $_SESSION['user'] . " LOGIN AT " . $waktu . "\r\n";
		fwrite($file,$tulis);
		fclose($file);
		
		header("location:home.php");		// me-redirect halaman ke halaman home.php
	}
	
?>