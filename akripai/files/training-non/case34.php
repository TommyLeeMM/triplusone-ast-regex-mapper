<?php
	session_start();

	$file=fopen("logfile.txt","a") or exit("Unable to open file!");
	$waktu = date("d/m/Y h:i:s A");
	$tulis = $_SESSION['user'] . " LOGOUT AT " . $waktu . "\r\n";
	fwrite($file,$tulis);
	fclose($file);

	session_unset();									// menghapus seluruh session yang telah dibuat
	session_destroy();
		
	header("location:index.php?err=Logout Succeed");	// me-redirect halaman ke halaman index.php
?>